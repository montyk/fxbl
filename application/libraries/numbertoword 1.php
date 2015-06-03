<?php
function convertIntegerToWords($x)
	{

	$nwords = array(    'zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 
	                     'eight', 'nine', 'ten', 'eleven', 'twelve', 'thirteen', 
	                     'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 
	                     'nineteen', 'twenty', 30 => 'thirty', 40 => 'forty', 
	                     50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 
	                     90 => 'ninety' );

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

	function convertCurrencyToWords($number)
	{
		$currencylabelsarray = array('dollars' => 'dollars', 'cents' => 'cents');
		if(!is_numeric($number)) return false;
		$nums = explode('.', $number);
		$out = $this->convertIntegerToWords($nums[0]) . ' dollars';
		if(isset($nums[1])) {
		$out .= ' and ' . $this->convertIntegerToWords($nums[1]) .' cents';
		}
		return $out;
	}
	
	echo convertCurrencyToWords(324.17);
	?>