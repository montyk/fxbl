<?php
class DecodeMessage{
        var $header;
        var $body;
        var $fullmessage;
        var $auto_decode = true;
        var $choose_best = true;
        var $best_format = "text/html";
        var $mid;
		var $content_id;
        var $path;
		var $ci_this;
		
        function InitHeaderAndBody($header, $body) {
                $this->header = $header;
                $this->body = $body;
                $this->fullmessage = chop($header)."\t\n\t\n".ltrim($body);
        }
        function Body() {
                return trim($this->body);
        }
        function initMessage($msg,$mid=0,$path=0) {
              	if($mid!=0)
				$this->mid=$mid;
				if($path!='0')
				$this->path=$path;
				
				$i = 0;
                $m = "";
                $messagebody = "";
                $line = explode("\n",trim($msg));        
                
				for ($j=0;$j<count($line);$j++) {                        
                 if (chop($line[$j]) == "" AND $i < 1)
				 {
                 $this->header = $m;
                 $i++;
                  }
                 if ($i > 0)
                 $messagebody .= $line[$j]."\n";        
                 $m .= $line[$j]."\n";
                }
                $this->body = $messagebody;
                $this->fullmessage = $msg;
        }
		
        function Headers($field="") {
                if ($field == "") :
                        return $this->header;
                else :
                        $hd = "";
                        $field = $field.":";
                        $start = 0;
                        $j=0;
                        $header = eregi_replace("\r", "\n", $this->header);
                        $p = explode("\n", $header);
                        do {
                                for ($i=$start;$i<count($p);$i++) {
                                        if (ereg("^($field)", $p[$i])) :
                                                 $position = $i;
                                                 $hd .= ereg_replace("$field", "",$p[$i]);
                                                 break;
                                         endif;
                                }
                                if (ereg("^($field)", $p[$i])) :                 
                        
                                        for ($i=$position+1;$i<count($p);$i++) {
                                                $tok = strtok($p[$i], " ");
                                                if (ereg(":$", $tok) AND (!(eregi("^($field)", $tok))))
                                                        break;
                                                $hd .= ereg_replace("$field", "",$p[$i]);
                                        }
                                        $start=$i+1;        
                                endif;        
                        } while ($j++ < count($p));
                return $hd;
                endif;                
        }
        function ContentType() {
                $c = $this->Headers("Content-Type");
                $ct = ereg_replace("[[:space:]]", "", $c);
                if (!(ereg(";", $ct))) :
                        $content["type"] = trim($ct);
                else :                
                        $p = explode (";", $ct);
                        for ($i=0;$i<count($p);$i++) {
                                if (eregi("^(text)", $p[$i])) :
                                        $content["type"] = $p[$i];
                                elseif (eregi("^(multipart)", $p[$i])) :
                                        $content["type"] = $p[$i];
                                elseif (eregi("^(application)", $p[$i])) :
                                        $content["type"] = $p[$i];
                                elseif (eregi("^(message)", $p[$i])) :
                                        $content["type"] = $p[$i];        
                                elseif (eregi("^(image)", $p[$i])) :
                                        $content["type"] = $p[$i];

                                elseif (eregi("^(audio)", $p[$i])) :
                                        $content["type"] = $p[$i];
                                elseif (eregi("^(charset)", $p[$i])) :
                                        $content["charset"] = eregi_replace("(charset=)|(\")", "", $p[$i]);
                                elseif (eregi("^(report-type)", $p[$i])) :
                                        $content["report-type"] = eregi_replace("(report-type=)|(\")", "", $p[$i]);                        
                                elseif (eregi("^(type)", $p[$i])) :
                                        $content["subtype"] = eregi_replace("(type=)|(\")", "", $p[$i]);                                
                                elseif (eregi("^(boundary)", $p[$i])) :
                                        $content["boundary"] = eregi_replace("(boundary=)|(\")", "", $p[$i]);                                
                                elseif (eregi("^(name)", $p[$i])) :
                                        $content["name"] = eregi_replace("(name=)|(\")", "", $p[$i]);                                
                                elseif (eregi("^(access-type)", $p[$i])) :
                                        $content["access-type"] = eregi_replace("(access-type=)|(\")", "", $p[$i]);                        
                                elseif (eregi("^(site)", $p[$i])) :
                                        $content["site"] = eregi_replace("(site=)|(\")", "", $p[$i]);                                
                                elseif (eregi("^(directory)", $p[$i])) :
                                        $content["directory"] = eregi_replace("(directory=)|(\")", "", $p[$i]);                                
                                elseif (eregi("^(mode)", $p[$i])) :
                                        $content["mode"] = eregi_replace("(mode=)|(\")", "", $p[$i]);                                
                                endif;                
                        }        
                endif;
                return $content;
        }
        function ContentDisposition() {
                $c = $this->Headers("Content-Disposition");
                $c = ereg_replace("[[:space:]]", "", $c);
                if (!(ereg(";", $c))) :
                        $cd["type"] = $c;
                else :
                        $p = explode(";", $c);
                        for ($i=0;$i<count($p);$i++) {
                                if (eregi("^(inline)", $p[$i])) :                
                
                                        $cd["type"] = $p[$i];
                                elseif (eregi("^(attachment)", $p[$i])) :
                                        $cd["type"] = $p[$i];
                                elseif(eregi("^(filename)", $p[$i])) :
                                        $cd["filename"] = eregi_replace("(filename=)|(\")", "", $p[$i]);                                
                                endif;
                        }
                endif;
                return $cd;
        }
        function my_array_shift(&$array) {
                reset($array);
                $key = key($array);
                $val = current($array);
                unset($array[$key]);
                return $val;
        }
        function my_array_compact(&$array) {
                while (list($key, $val) = each($array)) :
                 if (chop($val) == '')
                         unset($array[$key]);
                endwhile;
        }
        function my_in_array($value, $array) {
                while (list($key, $val) = each($array)) :
                 if (strcmp($value, $val) == 0)
                         return true;
                endwhile;
                return false;
        }
        function result() {
                $is_multipart_alternative = false;
                $is_multipart_related = false;
                $found_best = false;
                do {
                        $next_message = "";
					do {
							$next_multipart = "";
							$content = $this->ContentType();
							$cd = $this->ContentDisposition();        
							
					if ( eregi("^(multipart)", $content["type"]) )
					{
					
									if ( eregi("multipart/alternative", $content["type"]) )
									{
									$is_multipart_alternative = true;
									}  
									if ( eregi("multipart/related", $content["type"]) )
									{
									$is_multipart_related = true;
									}                     
									$boundary = "--".$content["boundary"];
									$p = explode($boundary, $this->body);
	
					for ($i=0;$i<count($p);$i++)
					{
	
								
								$this->initMessage($p[$i]);
								$content = $this->ContentType();
								$this->ContentDisposition();
			
								if ($is_multipart_related && (chop($this->Headers("Content-ID")) != ''))
								{
								$cont["id"] = ereg_replace("[<>]","", $this->Headers("Content-ID"));
								$cont["name"] = $content["name"];
								$contentid[] = $cont;
								unset($cont);
								}
								
								if (eregi("multipart", $content["type"]))
								{
								$multiparts[] = $p[$i];
								}else if (eregi("message", $content["type"]))
								{
								$messages[] = $p[$i];
								
								}else if ($this->choose_best && eregi("text/plain", $content["type"]) && $is_multipart_alternative && !($found_best))
								{
								$best = $p[$i];
								}else if ($this->choose_best && eregi($this->best_format, $content["type"]) && $is_multipart_alternative )
								{
								if (eregi("[[:alpha:]]", chop($p[$i])))
								{
								$best = $p[$i];
								$found_best = true;        
								}
								}else if (chop($content["type"]) != '' && chop($this->body) !='')
								{
								$parts[] = $p[$i];
								}
								
					}
			
									if (chop($best) != '')
									{
									$parts[] = $best;
									}
						}else{
						
						
									if (eregi("(message)", $content["type"]))
									{
									$messages[] = $this->fullmessage;
									}else if (chop($this->body) != '')
									{
									$parts[] = $this->fullmessage;
									}}
													
								unset($is_multipart_alternative);
								unset($best);
								unset($found_best);                
								if (count($multiparts) > 0)
								{
									$next_multipart = $this->my_array_shift($multiparts);
									$this->initMessage($next_multipart);
								}
					} while ($next_multipart != "");
							
							$this->set_content_id($contentid);
							//echo $this->get_content_id('25pan10.jpg ');
									if (count($parts) != 0){
								
									for ($i=0;$i<count($parts);$i++) 
									{
									
													$this->initMessage($parts[$i]);                
													$ct = $this->ContentType();
													$cd = $this->ContentDisposition();        
																					
											if (eregi("text/html", $ct["type"]) && count($contentid > 0)){
											for ($k=0;$k<count($contentid);$k++) {
											$cid = $contentid[$k]["id"];
											$cid = ereg_replace("[[:space:]]", "", $cid);
											$this->body = str_replace("cid:", (site_url()."btc_mailer/getimage/".$this->mid."/gia/"), $this->body);
											
											}}
											
									if ($this->auto_decode  && eregi("attachment", $cd["type"]) || eregi("base64", $this->Headers("Content-Transfer-Encoding")))
													{
																							
													$filename = chop($ct["name"]) ? $ct["name"] : $cd["filename"];
											
													if (eregi("base64", $this->Headers("Content-Transfer-Encoding"))){
													$file = base64_decode($this->body);
													}else if(eregi("quoted-printable", $this->Headers("Content-Transfer-Encoding"))){
													$file = quoted_printable_decode($this->body);
													$file = ereg_replace("(=\n)", "", $this->body);
													$file = $this->body;
													}else if(eregi("7bit", $this->Headers("Content-Transfer-Encoding"))){
													$file = $this->body;
													}
									
					if (chop($filename != '')){	
					
											//** my code goes here  *//
											$fn_re=date('Y.m.d.h.i.s').'_'.mt_rand(1, 99999).'_'.$filename;
											$types=explode('/',$ct['type']);
											$cnt_type=$types[0];
											$cnt_stype=$types[1];
											
											$CI =& get_instance();
											$CI->load->helper('file');
											$CI->load->model('Btc_mailer_model');

											$CI->Btc_mailer_model->ci_writefile($CI->config->item('document_root')."cm_attachments/".$this->path."/".$fn_re,$file);//writing att to file											
											$CI->Btc_mailer_model->saveAttchments($this->mid,$filename,$fn_re,trim($this->get_content_id($filename)),$cnt_type,$cnt_stype);
											
											//** my code ends here  *//	
					if (eregi("attachment", $cd["type"]) OR eregi("inline", $cd["type"]))
					{
					$decoded_part["attachments"] = $filename;
					
					}
											}
													}
					
											
					if (eregi("^(text)", $ct["type"] ) && !(eregi("text/html", $ct["type"] ))&& !(eregi("attachment", $cd["type"] )) || (chop($ct["type"]) == ""))
					{
														$decoded_part["body"]["type"] = $ct["type"];
														$decoded_part["body"]["body"] = $this->body;
					}else if (eregi("text/html", $ct["type"] ) && !(eregi("attachment", $cd["type"] )))
					{
														$decoded_part["body"]["type"] = $ct["type"];
														$decoded_part["body"]["body"] = $this->body;
													}
														$dp[] = $decoded_part;
														unset($decoded_part);
									}}
		
							
							
									$message[] = $dp;
									unset($dp);                
									unset($is_multpart_related);
									unset($contentid);                
									unset($parts);        
									
									if (count($messages) > 0){
									$this->my_array_compact($messages);
									$next_message = $this->my_array_shift($messages);
									$this->initMessage($next_message);
									$this->initMessage($this->body);
		}            
                
                } while ($next_message != "");
        return $message;
        }
		function set_content_id($content_array){
		$this->content_id=$content_array;
		//print_r($content_array);
		}
		
		function get_content_id($att_name){
		$cid=0;
		foreach($this->content_id as $id => $name){
		if(strtolower(trim($name['name']))==strtolower(trim($att_name))){
		$cid=$name['id'];
		break;
		}}
		return $cid;
		}
		
		};
?>