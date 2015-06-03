<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Form token base on Chris Shiflett's implementation
 * @see http://phpsecurity.org
*/

/**
 * Generate Form Token
 *
 * @access	public
 * @return	string	unique form token
 *
 */
	function conversion($postvar, $className) {
                $CI =& get_instance();
                $session=unserialize($CI->session->userdata('user_details'));
               
		$object = new $className;
		$rc = new ReflectionClass($className);
		if(!array_key_exists('id',$postvar) || empty($postvar['id']))
                {
                   $postvar['date_added'] = gmdate("Y-m-d H:i:s", time());
                   if($session){
                        $postvar['created_by']=$session->id;
                   }
                }
		$postvar['last_modified'] = gmdate("Y-m-d H:i:s", time());
		 //if(!array_key_exists('ipaddress',$objReturn))
		$postvar['ip_address'] = ipaddress();
		 //if(!array_key_exists('last_modified_by',$objReturn))
		 //{
		
	        //$session=$CI->db_session->userdata('userObj');
			
			
		if($session)
		$postvar['last_modified_by']=$session->id;
                else
                $postvar['last_modified_by']=0;
		
		
		$postVarKeys = array_keys($postvar);
		//$reflect = new ReflectionObject($object);
		foreach ($rc->getProperties(ReflectionProperty::IS_PRIVATE) as $prop) {
                    if(in_array($prop->getName(),$postVarKeys) && $rc->hasMethod("set".ucfirst($prop->getName()))) {
                            $refMethod = new ReflectionMethod($className,"set".ucfirst($prop->getName()));
                             //echo $postvar[$prop->getName()];
                            $refMethod->invokeArgs($object,array(filterString($postvar[$prop->getName()])));
                    }
		}

		//return $object;
		return conversion2($postvar,$object,$check=1); 
	}
    function conversion2($postvar,$obj,$check=1) {
		(object)$objReturn='';
		$rc = new ReflectionClass($obj);
		foreach($rc->getMethods() as $new)
		{

			 if(substr($new->name,'0','3')=='get')
			 {
			  $str=substr($new->name,'3');

			   $member=strtolower(substr($str,0,1)).substr($str,1);
			   $postVarKeys = array_keys($postvar);
			   if(in_array($member,$postVarKeys) or $check==0)
			   {
			   $refMethod = new ReflectionMethod($obj,$new->name);
			   $value=$refMethod->invoke($obj,'');
			   //if($value!='')
			   $objReturn->$member=$value;
			   }
			 }
		}

	//$reflect = new ReflectionObject($object);
	/*foreach ($rc->getProperties(ReflectionProperty::IS_PRIVATE) as $prop) {
			if(in_array($prop->getName(),$postVarKeys) && $rc->hasMethod("set".ucfirst($prop->getName()))) {
			$refMethod = new ReflectionMethod($className,"set".ucfirst($prop->getName()));
			$refMethod->invokeArgs($object,array($postvar[$prop->getName()]));
			}
	}*/


		return $objReturn;
	}

        function arrayMap($data)
        {
            $data2=array();
            if(is_array($data))
            {
                foreach($data as $val)
                {
                  $val=(array)$val;
                 $data2[]=array_map('filterStringDecode',$val);

                }
            }
            return $data2;
            
        }
        function arrayDestring(&$item, $key)
        {
           $item=filterStringDecode($item);
           return $item;
        }

    
    if ( ! function_exists('filterString'))
    {
         function filterString($str)
         {
              if (isset($str) && $str!='' && $str!='0' && !is_array($str) )
              {

                return (trim(htmlentities($str,ENT_QUOTES,'UTF-8')));

              }
              else
                return $str;
         }
    }

 if ( ! function_exists('filterStringDecode'))
{
         function filterStringDecode($str)
         {
              if (isset($str) && $str!='' && $str!='0')
              {
                     $entity=array("&acirc;??","&iexcl;", "&cent;", "&pound;", "&curren;", "&yen;", "&brvbar;", "&sect;", "&uml;",
                         "&copy;", "&ordf;", "&laquo;", "&not;", "&shy;", "&reg;", "&macr;", "&deg;", "&plusmn;",
                         "&sup2;", "&sup3;", "&acute;", "&micro;", "&para;", "&middot;", "&cedil;", "&sup1;",
                         "&ordm;", "&raquo;", "&frac14;", "&frac12;", "&frac34;", "&iquest;", "&Agrave;",
                         "&Aacute;", "&Acirc;", "&Atilde;", "&Auml;", "&Aring;", "&AElig;", "&Ccedil;",
                         "&Egrave;", "&Eacute;", "&Ecirc;", "&Euml;", "&Igrave;", "&Iacute;", "&Icirc;",
                         "&Iuml;", "&ETH;", "&Ntilde;", "&Ograve;", "&Oacute;", "&Ocirc;", "&Otilde;",
                         "&Ouml;", "&times;", "&Oslash;", "&Ugrave;", "&Uacute;", "&Ucirc;", "&Uuml;",
                         "&Yacute;", "&THORN;", "&szlig;", "&agrave;", "&aacute;", "&acirc;", "&atilde;",
                         "&auml;", "&aring;", "&aelig;", "&ccedil;", "&egrave;", "&eacute;", "&ecirc;",
                         "&euml;", "&igrave;", "&iacute;", "&icirc;", "&iuml;", "&eth;", "&ntilde;",
                         "&ograve;", "&oacute;", "&ocirc;", "&otilde;", "&ouml;", "&divide;",
                         "&oslash;", "&ugrave;", "&uacute;", "&ucirc;", "&uuml;", "&yacute;", "&thorn;",
                         "&yuml;", "&fnof;", "&Alpha;", "&Beta;", "&Gamma;", "&Delta;", "&Epsilon;", "&Zeta;", "&Eta;", "&Theta;",
                         "&Iota;", "&Kappa;", "&Lambda;", "&Mu;", "&Nu;", "&Xi;", "&Omicron;", "&Pi;", "&Rho;", "&Sigma;",
                         "&Tau;", "&Upsilon;", "&Phi;", "&Chi;", "&Psi;", "&Omega;", "&alpha;", "&beta;", "&gamma;", "&delta;",
                         "&epsilon;", "&zeta;", "&eta;", "&theta;", "&iota;", "&kappa;", "&lambda;", "&mu;", "&nu;", "&xi;",
                         "&omicron;", "&pi;", "&rho;", "&sigmaf;", "&sigma;", "&tau;", "&upsilon;", "&phi;", "&chi;", "&psi;",
                         "&omega;", "&thetasym;", "&upsih;", "&piv;", "&bull;", "&hellip;", "&prime;", "&Prime;", "&oline;",
                         "&frasl;", "&weierp;", "&image;", "&real;", "&trade;", "&alefsym;", "&larr;", "&uarr;", "&rarr;",
                         "&darr;", "&harr;", "&crarr;", "&lArr;", "&uArr;", "&rArr;", "&dArr;", "&hArr;", "&forall;", "&part;",
                         "&exist;", "&empty;", "&nabla;", "&isin;", "&notin;", "&ni;", "&prod;", "&sum;", "&minus;", "&lowast;",
                         "&radic;", "&prop;", "&infin;", "&ang;", "&and;", "&or;", "&cap;", "&cup;", "&int;", "&there4;", "&sim;",
                         "&cong;", "&asymp;", "&ne;", "&equiv;", "&le;", "&ge;", "&sub;", "&sup;", "&nsub;", "&sube;", "&supe;",
                         "&oplus;", "&otimes;", "&perp;", "&sdot;", "&lceil;", "&rceil;", "&lfloor;", "&rfloor;", "&lang;",
                         "&rang;", "&loz;", "&spades;", "&clubs;", "&hearts;", "&diams;", "&OElig;", "&oelig;", "&Scaron;",
                         "&scaron;", "&Yuml;", "&circ;", "&tilde;", "&ensp;", "&emsp;", "&thinsp;",
                         "&zwnj;", "&zwj;", "&lrm;", "&rlm;", "&ndash;",
                         "&mdash;", "&lsquo;", "&rsquo;", "&sbquo;", "&ldquo;", "&rdquo;", "&bdquo;", "&dagger;", "&Dagger;",
                         "&permil;", "&lsaquo;", "&rsaquo;", "&euro;");
                     $entity_replace=array('&#039;', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', );
                    $str=str_replace($entity,$entity_replace,$str);
                return trim(html_entity_decode($str,ENT_QUOTES,'UTF-8'));
              // return $str;
              }
              else
              return $str;
          
         }
}    