<?php
//NamekoPop3Interface.php :: 20070703.037
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
- Class: NamekoPop3Interface
- This class perform a POP3 connection to a server to retrieve message(s) from
- the remote mailbox. You can retrieve stats about the mailbos (how many messages
- there are, and how much space they use), only headers, or complete messages, specifying
- how many messages retrieve (only one or a range).
- Public methods:
-   *contructor: see the __contruct() method description
-   getPop3ConnectionStatus(): get the status of the POP3 connection and some information about the mailbox
-   getMessage(): get message(s) from the mailbox
-   deleteMessage(): delete message(s) from the POP3 server
-   getVersion(): (static) return the version of the class
===========================================================================*/
class NamekoPop3Interface {
  private $pop3Connection = array("isValid"=>false, "socket"=>false, "errorCode"=>0, "numberOfMessages"=>0, "sizeOfMailbox"=>0);
  private $serverAddress = "";
  private $serverPort = 0;
  private $authMethod = "pop3";
  private $username = "";
  private $password = "";

  private $validAuthMethods = array("pop3", "apop");

  private $pop3ConnectionErrorCodes = array(
    "0" => "No error",
    "1" => "Unable to open the socket (wrong server address?)",
    "2" => "Login failed (wrong password?)",
    "3" => "Cannot stats the mailbox (service not available?)",
  );

  private static $version = array(
    "name" => "NamekoPop3Interface",
    "web" => "Wiz's Shelf",
    "url" => "http://www.nameko.org/",
    "major" => "1.3",
    "minor" => "0",
    "build" => "20070703.037",
  );


  /*---------------------------------------------------------------------------
  - Method: __construct
  - Description: contructor of the class, open POP3 connection (see class description)
  - Parameters:
      {string} $serverAddress: address of the server (domain name or IP address)
      {string} $username: username of the mailbox
      {string} $password: password of the mailbox
      {string} $authMethod: authentication method (optional; can be "pop3" or "apop"; default is "pop3")
      {integer} $serverPort: server port to connect to (optional; default is 110)
  ---------------------------------------------------------------------------*/
  function initiate($serverAddress, $username, $password, $authMethod="pop3", $serverPort=110) {
    $this->serverAddress = $serverAddress;
    $this->username = $username;
    $this->password = $password;
    $this->authMethod = (in_array($authMethod, $this->validAuthMethods)) ? $authMethod : "pop3";
    $this->serverPort = $serverPort;

    $this->pop3Connection = $this->_openPop3Connection();
  }

  /*---------------------------------------------------------------------------
  - Method: __destruct
  - Description: close still-open POP3 connection before to complete the script
  - Parameters:
      {none}
  ---------------------------------------------------------------------------*/
  function __destruct() {
    if($this->pop3Connection["isValid"]) {
      @fputs($this->pop3Connection["socket"], "quit\r\n");
      $rs = trim(@fgets($this->pop3Connection["socket"], 512));
      @fclose($this->pop3Connection["socket"]);
    }
  }


/*===========================================================================
-
- PUBLIC METHODS
-
===========================================================================*/

  /*---------------------------------------------------------------------------
  - Method: getPop3ConnectionStatus
  - Description: return the status of the POP3 connection
  - Parameters:
      {none}
  - Returned value:
      {array} {
        "isValid" => {boolean} true: POP3 connection is estabilished; false: POP3 connection failed
        "errorCode" => {integer} status code
        "errorMessage" => {string} status message
        "numberOfMessages" => {integer} number of messages into the mailbox,
        "sizeOfMailbox" => {integer} size of the mailbox (bytes),
      }
  ---------------------------------------------------------------------------*/
  public function getPop3ConnectionStatus() {
    return array(
      "isValid" => $this->pop3Connection["isValid"],
      "errorCode" => $this->pop3Connection["errorCode"],
      "errorMessage" => $this->pop3ConnectionErrorCodes[$this->pop3Connection["errorCode"]],
      "numberOfMessages" => $this->pop3Connection["numberOfMessages"],
      "sizeOfMailbox" => $this->pop3Connection["sizeOfMailbox"],
    );
  }


  /*---------------------------------------------------------------------------
  - Method: getMessage
  - Description: get message(s) from the mailbox
  - Parameters:
      {integer} $firstMessage: the number of the first message to retrieve
      {integer} $numberOfMessages: the number of messages to retrieve (optional; default is 1)
      {boolean} $reverseOrder: true: get messages from the last (newest); false: get messages from the first (oldest) (optional; default is false)
      {boolean} $onlyHeaders: true: get only headers; false: get the complete message (optional; default is false)
  - Returned value:
      {array} {
        "size" => {integer} size of message in bytes
        "pop3Id" => {integer} the number of the message into the POP3 mailbox
        "data" => {string} the message
      }
  ---------------------------------------------------------------------------*/
  public function getMessage($firstMessage, $numberOfMessages=1, $reverseOrder=false, $onlyHeaders=false) {
    $messages = array();
    if(is_numeric($firstMessage) && ($firstMessage > 0) && is_numeric($numberOfMessages) && is_bool($reverseOrder) && is_bool($onlyHeaders)) {
      if($reverseOrder) {
        $startingMessage = $this->pop3Connection["numberOfMessages"] - $firstMessage + 1;
        $nextMessageIncrement = -1;
      } else {
        $startingMessage = $firstMessage;
        $nextMessageIncrement = 1;
      }

      for($i=$startingMessage; $numberOfMessages>0; $numberOfMessages--) {
        if($reverseOrder && ($i < 1)) break;
        if(!$reverseOrder && ($i > $this->pop3Connection["numberOfMessages"])) break;

        $messages[$i] = array();
        @fputs($this->pop3Connection["socket"], "list $i\r\n");
        $rs = explode(" ", trim(@fgets($this->pop3Connection["socket"], 512)));
        if($rs[0] == "+OK") {
          $messages[$i]["pop3Id"] = $i;
          $messages[$i]["size"] = $rs[2];
          $pop3Command = ($onlyHeaders) ? "top $i 0" : "retr $i";
          @fputs($this->pop3Connection["socket"], "$pop3Command\r\n");
          $rs = explode(" ", trim(@fgets($this->pop3Connection["socket"], 512)));
          if($rs[0] == "+OK") {
            while($rs = @fgets($this->pop3Connection["socket"], 512)) {
              $rs = rtrim($rs);
              if($rs == ".") break;
              $messages[$i]["data"] .= $rs . "\n";
           // print_r($rs);
			}
          }
        }
        $i += $nextMessageIncrement;
      }
    }
    return $messages;
  }


  /*---------------------------------------------------------------------------
  - Method: deleteMessage
  - Description: delete messages from the POP3 server
  - Parameters:
      #SINGLE MESSAGE OR SEQUENCE
        {integer} $firstMessage: the number of the first message to delete
        {integer} $numberOfMessages: the number of messages to delete (optional; default is 1)
      #MESSAGE LIST
        {string} $firstMessage: the number of the messages to delete, separated by comma
        {string} $numberOfMessages: reserver word "list"
  - Returned value:
      {array} answer of the message deletion, an element for each mail
        "*pop3MailId*" => {boolean} true: mail deleted; false: mail not deleted
  ---------------------------------------------------------------------------*/
  public function deleteMessage($firstMessage, $numberOfMessages=1) {
    $deletedMessages = array();

    if(is_numeric($firstMessage) && is_numeric($numberOfMessages)) {
      for($i=$firstMessage; $numberOfMessages>0; $i++, $numberOfMessages--) {
        if($i > $this->pop3Connection["numberOfMessages"]) break;

        @fputs($this->pop3Connection["socket"], "dele $i\r\n");
        $rs = explode(" ", trim(@fgets($this->pop3Connection["socket"], 512)));
        $deletedMessages[$i] = ($rs[0] == "+OK") ? true : false;
      }
    }

    if(is_string($numberOfMessages) && ($numberOfMessages == "list")) {
      $firstMessage = explode(",", $firstMessage);
      foreach($firstMessage as $msgId) {
        if($i > $this->pop3Connection["numberOfMessages"]) continue;

        @fputs($this->pop3Connection["socket"], "dele $msgId\r\n");
        $rs = explode(" ", trim(@fgets($this->pop3Connection["socket"], 512)));
        $deletedMessages[$msgId] = ($rs[0] == "+OK") ? true : false;
      }
    }

    return $deletedMessages;
  }


  /*---------------------------------------------------------------------------
  - Method: getVersion (static)
  - Description: return the version of the class
  - Parameters:
      {none}
  - Returned value:
      {array of strings} version data
  ---------------------------------------------------------------------------*/
  public static function getVersion() {
    return NamekoPop3Interface::$version;
  }


/*===========================================================================
-
- PRIVATE METHODS
-
===========================================================================*/

  /*---------------------------------------------------------------------------
  - Method: _openPop3Connection
  - Description: open POP3 connection and return major information about the socket/mailbox
  - Parameters:
      {none}
  - Returned value:
      {array} ($pop3Connection structure) {
        "isValid" => {boolean] true: connection estabilished; false: connection failed
        "socket" => {resource} pointer to the socket
        "errorCode" => {integer} code of error occoured
        "numberOfMessages" => {integer} number of messages into the mailbox,
        "sizeOfMailbox" => {integer} size of the mailbox (bytes),
      }
  ---------------------------------------------------------------------------*/
  private function _openPop3Connection() {
    $errorCode = 1;
    $isValid = false;
    $numberOfMessages = 0;
    $sizeOfMailbox = 0;

   $socket = fsockopen($this->serverAddress, $this->serverPort, $errno, $errstr);
 
	if($socket) {

     $rs = trim(@fgets($socket, 587));

      $errorCode = 2;


      switch($this->authMethod) {
        case "apop":
          $rs = explode(" ", $rs);
          $secret = md5(trim($rs[count($rs)-1]) . $this->password);
          @fputs($socket, "apop $this->username $secret\r\n");
          break;
        case "pop3":
        default:
          @fputs($socket, "user $this->username\r\n");
          $rs = trim(@fgets($socket, 512));
          @fputs($socket, "pass $this->password\r\n");
          break;
      }

      $rs = explode(" ", trim(@fgets($socket, 512)), 2);
      if($rs[0] == "+OK") {
        $errorCode = 3;

        @fputs($socket, "stat\r\n");
        $rs = explode(" ", trim(@fgets($socket, 512)));
        if($rs[0] == "+OK") {
          $errorCode = 0;
          $isValid = true;
          $numberOfMessages = $rs[1];
          $sizeOfMailbox = $rs[2];
        }

      }
    }

    return array(
      "isValid" => $isValid,
      "socket" => (($isValid) ? $socket : false),
      "errorCode" => $errorCode,
      "numberOfMessages" => $numberOfMessages,
      "sizeOfMailbox" => $sizeOfMailbox,
    );
  }

}
?>