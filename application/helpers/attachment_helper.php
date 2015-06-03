<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 function attachment($new_file_names,$orig_file_names,$temp=false)
 {
          $atts = array('width'=> '500','height'=> '400','scrollbars' => 'yes','status'=> 'yes','resizable'  => 'yes','screenx' => '0','screeny' =>'0');
           
            if($temp==true)
            {
            $link=base_url()."temp_attach/";
            $downloadLink=site_url('fileupload/download/temp_attach')."/";
            }
            else
            {
            $link=base_url()."uploads/";
            $downloadLink=site_url('fileupload/download/uploads')."/";
            }
            
                $newWindow=array('pdf','PDF');
                $newPop=array('jpg','JPG','jpeg','JPEG','gif','GIF','PNG','png','bmp','BMP','TIFF','tiff');
                $newDownload=array('docx','xlsx','doc','xls','csv','zip','gz','rar');
                $display=array();
            
            if(is_array($new_file_names) && is_array($orig_file_names))
            {
              

		for($i=0;$i<count($new_file_names);$i++)
		{
                  if(!empty($new_file_names[$i]))
                  {
                      $ext=explode(".",$new_file_names[$i]);
                      
                      if(in_array($ext[count($ext)-1],$newWindow))
                      {
                       $display[]=anchor($link.$new_file_names[$i],filterStringDecode($orig_file_names[$i]),array('target'=>'_blank'));
                      }
                      else if(in_array($ext[count($ext)-1],$newPop))
                      {
                        $display[]=anchor_popup($link.$new_file_names[$i],filterStringDecode($orig_file_names[$i]),$atts);
                      }
                      else
                      {
                       $display[]=anchor($downloadLink.$new_file_names[$i],filterStringDecode($orig_file_names[$i]));
                      }
                  }

		}
              }
              else if(!empty($new_file_names) && !empty($orig_file_names))
              {
                     $ext=explode(".",$new_file_names);
                      
                      if(in_array($ext[count($ext)-1],$newWindow))
                      {
                        $display[]=anchor($link.$new_file_names,filterStringDecode($orig_file_names),array('target'=>'_blank'));
                      }
                      else if(in_array($ext[count($ext)-1],$newPop))
                      {
                         $display[]=anchor_popup($link.$new_file_names,filterStringDecode($orig_file_names),$atts);
                      }
                      else
                      {
                       $display[]=anchor($downloadLink.$new_file_names,filterStringDecode($orig_file_names));
                      }

                 }

                 //print_r($display);
                 return implode(', ',$display);
	    

 }

