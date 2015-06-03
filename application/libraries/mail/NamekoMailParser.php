<?php
//NamekoMailParser.php :: 20070705.058
/* Nameko - Copyright (C) 2004-2007 Wiz's Shelf
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * See http://www.gnu.org/licenses/gpl.html for the complete text of the license.
 *
 * See http://www.nameko.org for other information about Nameko
 */
/*===========================================================================
- Class: NamekoMailParser
- This class parse an e-mail and return its components (texts, attachments, ...)
- in an array
- Public methods:
-   *contructor: see the __contruct() method description
-   parseMessage(): parse the message and return an array with the mail unfolded
-   getVersion(): (static) return the version of the class
===========================================================================*/
class NamekoMailParser {
  private $message = array();
  private $parentPartId = "";

  private $mailParts = array();

  private $defaultCharset = "iso-8859-1";

  private $contentTypes = array("text", "image", "video", "audio", "application", "multipart", "message", "related");
  private $contentTransferEncodings = array("7bit", "8bit", "binary", "quoted-printable", "base64", "delivery-status", "rfc822", "report");
  private $contentDispositions = array("inline", "attachment");

  private static $version = array(
    "name" => "NamekoMailParser",
    "web" => "Wiz's Shelf",
    "url" => "http://www.nameko.org/",
    "major" => "1.3",
    "minor" => "1",
    "build" => "20070703.057",
  );


  /*---------------------------------------------------------------------------
  - Method: __construct
  - Description: contructor of the class (see class description)
  - Parameters:
      {string} $message: the message to parse
      {string} $parentPartId: the id of the parent part (optional; default: empty string)
  ---------------------------------------------------------------------------*/
  function __construct ($message, $parentPartId="") {
//  echo "2,";
    $this->message = $message;
    $this->parentPartId = $parentPartId;
  }


/*===========================================================================
-
- PUBLIC METHODS
-
===========================================================================*/

  /*---------------------------------------------------------------------------
  - Method: parseMessage
  - Description: parse the message and return its parts
  - Parameters:
      {none}
  - Returned value:
      {array} $this->mailParts
        [$partId] => {array} {
          "parentPartId" => {string} parent part id
          "contentType" => {array} content type for the part (see _parseContentType() method description)
          "header" => {array of strings} header content, one element per header (see _parseHeader() method description)
          "body" => {mixed} body content, type according to the kind of content (text or binary data); false if the part is composite
          "charset" => {string} charset of the mail; if the mail doesn't say its charset, this is set to the default value
        }
      }
  ---------------------------------------------------------------------------*/
  public function parseMessage() {
    $parsedMessage = array();

    $message = $this->_splitMessage($this->message);
    $message["header"] = $this->_parseHeader($message["header"]);

	$content_disposition="";
	if(isset($message["header"]["content-disposition"]))
	$content_disposition=$message["header"]["content-disposition"];


	$content_description="";
	if(isset($message["header"]["content-description"]))
	$content_description=$message["header"]["content-description"];

	
    $message["contentType"] = $this->_parseContentType($message["header"]["content-type"], $message["header"]["content-transfer-encoding"],$content_disposition,$content_description);
    $message["charset"] = $this->_getCharset($message["header"]["content-type"]);

    $partId = md5(uniqid("", true));
    $parsedMessage[$partId] = array(
      "parentPartId" => $this->parentPartId,
      "header" => $message["header"],
      "contentType" => $message["contentType"],
      "charset" => $message["charset"],
    );

    if($this->_isCompositeMessage($message["contentType"])) {
      $parsedMessage[$partId]["body"] = false;
      if($this->_isMultipartMessage($message["contentType"]["type"])) {
        $message["bodyParts"] = $this->_splitBodyParts($message["body"], $message["contentType"]["boundary"]);
      } else {
        $message["bodyParts"][] = $message["body"];
      }
      foreach($message["bodyParts"] as $bodyPart) {
        $childParts = new NamekoMailParser($bodyPart, $partId);
        $parsedMessage = array_merge($parsedMessage, $childParts->parseMessage());
      }
    } else {
      $parsedMessage[$partId]["body"] = $this->_decodeBody($message["body"], $message["contentType"]);
    }

    return $parsedMessage;
  }


  /*---------------------------------------------------------------------------
  - Method: getVersion
  - Description: return the version of the class
  - Parameters:
      {none}
  - Returned value:
      {array of strings} version data
  ---------------------------------------------------------------------------*/
  public static function getVersion() {
    return NamekoMailParser::$version;
  }


/*===========================================================================
-
- PRIVATE METHODS
-
===========================================================================*/

  /*---------------------------------------------------------------------------
  - Method: _splitMessage
  - Description: split a message into its header and body parts
  - Parameters:
      {array} $messageLines: contents of the message, a line for each array element
  - Returned value:
      {array} {
        "header" => {array of strings} content of header, a line for each array element
        "body" => {array of strings} content of the body, a line for each array element
      }
  ---------------------------------------------------------------------------*/
  private function _splitMessage($messageLines) {
	$split=explode("\n\n", $messageLines, 2);
	if(count($split)!=2)
	$split=explode("\n\r\n", $messageLines, 2);
    list($message["header"], $message["body"]) = $split;
    $message["header"] = explode("\n", $message["header"]);
    return $message;
  }


  /*---------------------------------------------------------------------------
  - Method: _parseHeader
  - Description: parse header information
  - Parameters:
      {array} $headerLines: contents of the header, a line for each array element
  - Returned value:
      {array} an element for each header name/value {
        {string} header name => {string} header value
      }
  ---------------------------------------------------------------------------*/
  private function _parseHeader($headerLines) {
    $messageHeaders = array();

    //Parse header lines
    foreach($headerLines as $hl) {
      if($hl == ltrim($hl)) {
        //No white-space char at the beginnin of the line => new header line
        $hl = explode(":", $hl, 2);
        $lastParsedHeaderName = strtolower(trim($hl[0]));
        $messageHeaders[$lastParsedHeaderName][] = trim($hl[1]);
        $lastParsedHeaderValueIndex = count($messageHeaders[$lastParsedHeaderName]) - 1;
      } else {
        //White-space char at the beginnin of the line => folded header line => attach to the last parsed header name
        $messageHeaders[$lastParsedHeaderName][$lastParsedHeaderValueIndex] .= " " . trim($hl);
      }
    }

    //Implode headers content naris here change--1
//*************************************************************************************************************************************    
//	foreach($messageHeaders as &$mh) $mh = implode("\n", &$mh);
	
	 foreach($messageHeaders as $mh =>$key) {
	 $key = implode("\n", $key);
	 $messageHeaders1[$mh]=$key;
	 }
	 $messageHeaders= $messageHeaders1;
	
//************************************************************************************************************************************* 

    //Decode encoded headers
    foreach($messageHeaders as $headName=>$headValue) {
      $numberOfEncodedParts = preg_match_all("/=\?(.*)\?(.*)\?(.*)\?=/U", $headValue, $encodedParts);
      if($numberOfEncodedParts > 0) {
        $transEncodedParts = array();
        for($i=0; $i<$numberOfEncodedParts; $i++) {
          $transEncodedParts[$encodedParts[0][$i]] = $this->_decodeHeaderPart($encodedParts[3][$i], $encodedParts[2][$i]);
        }
        $messageHeaders[$headName] = strtr($messageHeaders[$headName], $transEncodedParts);
      }
    }

    return $messageHeaders;
  }


  /*---------------------------------------------------------------------------
  - Method: _decodeHeaderPart
  - Description: decode encoded text into header values
  - Parameters:
      {string} $encodedText: text encoded
      {string] $encodeMethod: encode method
  - Returned value:
      {string} $decodedText: text decoded
  ---------------------------------------------------------------------------*/
  private function _decodeHeaderPart($encodedText, $encodeMethod) {
    switch(strtolower($encodeMethod)) {
      case "b":
        $decodedText = base64_decode($encodedText);
        break;
      case "q":
      default:
        $decodedText = quoted_printable_decode($encodedText);
        $decodedText = str_replace("_", " ", $decodedText);
        break;
    }
    return $decodedText;
  }


  /*---------------------------------------------------------------------------
  - Method: _parseContentType
  - Description: parse content-type (with content-transfer-encoding and content-disposition if needed/available) value
  - Parameters:
      {string} $contentType: content-type value
      {string} $contentTransferEncoding: content-transfer-encoding value
      {string} $contentDisposition: content-disposition value
      {string} $contentDescription: content-description value
  - Returned value:
      {array} "contentType" => {array} {
        "type" => {string} content-type type
        "subtype" => {string} content-type subtype
        "name" => {string} filename from content-type (filename priority 2, optional)
        "transferEncoding" => {string} data encoding method
        "disposition" => {string} content disposition
        "filename" => {string} filename from content-disposition (filename priority 1, optional)
        "description" => {string} part description (optional)
      }
  ---------------------------------------------------------------------------*/
  private function _parseContentType($contentType, $contentTransferEncoding, $contentDisposition, $contentDescription) {
    $contentTypeData = array();

    //Analyzing content-type
    $contentType = explode(";", $contentType);
    $typeAndSubtype = explode("/", $contentType[0]);
    $contentTypeData["subtype"] = strtolower(trim($typeAndSubtype[1]));
    $contentTypeData["type"] = strtolower(trim($typeAndSubtype[0]));
    if(!in_array($contentTypeData["type"], $this->contentTypes)) $contentTypeData["type"] = $contentTypeData["subtype"] = "unknown";
    for($i=(count($contentType) - 1); $i>0; $i--) {
      $ct = explode("=", $contentType[$i], 2);
      $ct[1] = trim($ct[1]);
      if($ct[1][0] == "\"") $ct[1] = substr($ct[1], 1);
      if($ct[1][(strlen($ct[1]) - 1)] == "\"") $ct[1] = substr($ct[1], 0, -1);
      if(strtolower(trim($ct[0])) != "type") $contentTypeData[strtolower(trim($ct[0]))] = $ct[1];
    }

    //Analyzing transfer-encoding
    $contentTypeData["transferEncoding"] = strtolower(trim($contentTransferEncoding));
    if(!in_array($contentTypeData["transferEncoding"], $this->contentTransferEncodings)) $contentTypeData["transferEncoding"] = "unknown";

    //Analyzing content-disposition
    $contentDisposition = explode(";", $contentDisposition);
    $contentTypeData["disposition"] = strtolower(trim($contentDisposition[0]));
    if(!in_array($contentTypeData["disposition"], $this->contentDispositions)) $contentTypeData["disposition"] = "unknown";
    for($i=(count($contentDisposition) - 1); $i>0; $i--) {
      $cd = explode("=", $contentDisposition[$i], 2);
      $cd[1] = trim($cd[1]);
      if($cd[1][0] == "\"") $cd[1] = substr($cd[1], 1);
      if($cd[1][(strlen($cd[1]) - 1)] == "\"") $cd[1] = substr($cd[1], 0, -1);
      $contentTypeData[strtolower(trim($cd[0]))] = $cd[1];
    }

    //Analyzing content-description
    $contentTypeData["description"] = trim($contentDescription);

    return $contentTypeData;
  }


  /*---------------------------------------------------------------------------
  - Method: _isCompositeMessage
  - Description: check if the message is composite
  - Parameters:
      {string} $contentType: content-type type
  - Returned value:
      {boolean}:
         true: message is composite;
         false: message is not composite
  ---------------------------------------------------------------------------*/
  private function _isCompositeMessage($contentType) {
    if($contentType["type"] == "multipart") return true;
    return false;
  }


  /*---------------------------------------------------------------------------
  - Method: _isMultipartMessage
  - Description: check if the message is multipart (so if it needs to be splitted into its parts)
  - Parameters:
      {string} $contentType: content-type type
  - Returned value:
      {boolean}:
         true: message is multipart;
         false: message is not multipart
  ---------------------------------------------------------------------------*/
  private function _isMultipartMessage($contentType) {
    if($contentType == "multipart") return true;
    return false;
  }


  /*---------------------------------------------------------------------------
  - Method: _splitBodyParts
  - Description: split a composite message into its parts
  - Parameters:
      {array} $bodyLines: contents of the body, a line for each array element
      {string} $bondary: boundary for the body parts
  - Returned value:
      {array} an element for each body part {
        [array of strings}: content of the part, a line for each array element
      }
  ---------------------------------------------------------------------------*/
  private function _splitBodyParts($bodyLines, $boundary) {
    $bps = explode("--" . $boundary, $bodyLines);
    foreach($bps as $bp) {
      $bodyParts[] = trim($bp);
    }
    array_pop($bodyParts);
    return $bodyParts;
  }


  /*---------------------------------------------------------------------------
  - Method: _decodeBody
  - Description: decode the body content according to the encoding method
  - Parameters:
      {array} $bodyLines: contents of the body, a line for each array element
      {array} $contentType: contentType for the body (see _parseContentType() method description)
  - Returned value:
      {mixed,but array} body content decoded
  ---------------------------------------------------------------------------*/
  private function _decodeBody($bodyLines, $contentType) {
    switch($contentType["transferEncoding"]) {
      case "quoted-printable":
        $bodyContent = quoted_printable_decode($bodyLines);
        break;
      case "base64":
        $bodyContent = base64_decode(trim(str_replace("\n", "", $bodyLines), $bodyContent));
        break;
      case "7bit":
      case "8bit":
      case "binary":
      default:
        $bodyContent = $bodyLines;
        break;
    }
    return $bodyContent;
  }


  /*---------------------------------------------------------------------------
  - Method: _getCharset
  - Description: get the charset from the mail content-type
  - Parameters:
      {string} $contentType: content-type of the mail
  - Returned value:
      {strig} charset of the mail
  ---------------------------------------------------------------------------*/
//  naris here change--2
//************************************************************************************************************************************* 
  private function _getCharset($contentType) {
    $mailCharset = $this->defaultCharset;
	//echo "<pre>";
	//print_r($contentType);
	//echo "<br>after<br>";
    
	
	//eregi("(.*)charset=(.*)", $contentType, $tempCharset);
	preg_match("/(.*)charset=(.*)/i", $contentType, $tempCharset);
	
	//print_r($tempCharset);
	//echo "<br>-----------------------------<br>";
    
	$tempCharset = explode(";", $tempCharset[2]);
    if($tempCharset[0]) $mailCharset = $tempCharset[0];
    return $mailCharset;
  }
//************************************************************************************************************************************* 
}
?>