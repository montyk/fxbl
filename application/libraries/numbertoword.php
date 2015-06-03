<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Numbertoword {

public function convertIntegerToWords($x)
	{

	$nwords = array(    'Zero', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 
	                     'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 
	                     'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 
	                     'Nineteen', 'Twenty', 30 => 'Thirty', 40 => 'Forty', 
	                     50 => 'Fifty', 60 => 'Sixty', 70 => 'Seventy', 80 => 'Eighty', 
	                     90 => 'Ninety' );

	     if($x=='0' || $x=='00' || $x=='000' || $x=='0000')
		 {
			$w='Zero ';
		 }else
		 if(!is_numeric($x)) 
	     { 
	         $w = '#'; 
	     }else if(fmod($x, 1) != 0) 
	     { 
	         $w = '#'; 
	     }else{ 
	         if($x < 0) 
	         { 
	             $w = 'minus '; 
	             $x = -$x; 
	         }else{ 
	             $w = ''; 
	         } 
	         if($x < 21) 
	         { 
	             $w .= $nwords[$x]; 
	         }else if($x < 100) 
	         { 
	             $w .= $nwords[10 * floor($x/10)]; 
	             $r = fmod($x, 10); 
	             if($r > 0) 
	             { 
	                 $w .= '-'. $nwords[$r]; 
	             } 
	         } else if($x < 1000) 
	         { 
	             $w .= $nwords[floor($x/100)] .' hundred'; 
	             $r = fmod($x, 100); 
	             if($r > 0) 
	             { 
	                 $w .= ' and '. $this->convertIntegerToWords($r); 
	             } 
	         } else if($x < 1000000) 
	         { 
	             $w .= $this->convertIntegerToWords(floor($x/1000)) .' thousand'; 
	             $r = fmod($x, 1000); 
	             if($r > 0) 
	             { 
	                 $w .= ' '; 
	                 if($r < 100) 
	                 { 
	                     $w .= 'and'; 
	                 } 
	                 $w .= $this->convertIntegerToWords($r); 
	             } 
	         } else { 
	             $w .= $this->convertIntegerToWords(floor($x/1000000)) .' million'; 
	             $r = fmod($x, 1000000); 
	             if($r > 0) 
	             { 
	                 $w .= ' '; 
	                 if($r < 100) 
	                 { 
	                     $word .= 'and '; 
	                 } 
	                 $w .= $this->convertIntegerToWords($r); 
	             } 
	         } 
	     } 
	     return $w; 
	}

	public function convertCurrencyToWords($number)
	{
		$currencylabelsarray = array('dollars' => 'dollars', 'cents' => 'cents');
		if(!is_numeric($number)) return false;
		$nums = explode('.', $number);
		if(isset($nums[0]) && ($nums[0]>0))
		$out = $this->convertIntegerToWords($nums[0]) . ' dollars';
		if(isset($nums[1])) {
		if($nums[0]!='0' && $nums[0]!='00' && $nums[0]!='000')
		{
		$out .= ' and ';
		}
		$out.= $this->convertIntegerToWords($nums[1]) .' cents';
		}
		return $out;
	}
	
	}
	
	?>