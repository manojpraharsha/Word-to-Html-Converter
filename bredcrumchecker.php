<?php  
$bredgrums = array();
$names2=file('output/bredcrumb-file.html');
foreach($names2 as $name)
{
    $string= $name;	 
    if (strpos($string, "<h1>") !== false) {	
        $string = string_conversion3($string);
		 array_push($bredgrums, $string);
     }
	 else if(strpos($string, "<h2>") !== false) {	  
$string = string_conversion3($string);
			 array_push($bredgrums, $string);
		 }
	 else if(strpos($string, "<h3>") !== false) {	  
$string = string_conversion3($string);
			 array_push($bredgrums, $string);
		 }
	 else if(strpos($string, "<h4>") !== false) {	  
$string = string_conversion3($string);
			 array_push($bredgrums, $string);
		 }
	 else if(strpos($bredgrums, "<h5>") !== false) {	  
			 array_push($bredgrumlvl, "5");
		 }
	 else if(strpos($string, "<h6>") !== false) {	  
$string = string_conversion3($string);
			 array_push($bredgrums, $string);
		 }
	 else{	  
$string = string_conversion3($string);
		 array_push($bredgrums, $string);
	 }    
	
}
$bredgrumbsize = sizeof($bredgrums);
$new_array = array();
foreach ($bredgrums as $key => $value) {
    if(isset($new_array[$value]))
        $new_array[$value] += 1;
    else
        $new_array[$value] = 1;
}
foreach ($new_array as $fruit => $n) {
//    echo $fruit;
    if($n > 1)
        echo $fruit." ($n)"."<br />";
}
//print_r(array_count_values($bredgrums));


function string_conversion3($original) {
		if (strpos($original, '<h1> ') !== false) {$original = str_replace('<h1> ', '', $original);}				
		if (strpos($original, '<h2> ') !== false) {$original = str_replace('<h2> ', '', $original);}				
		if (strpos($original, '<h3> ') !== false) {$original = str_replace('<h3> ', '', $original);}				
		if (strpos($original, '<h4> ') !== false) {$original = str_replace('<h4> ', '', $original);}				
		if (strpos($original, '<h5> ') !== false) {$original = str_replace('<h5> ', '', $original);}				
		if (strpos($original, '<h6> ') !== false) {$original = str_replace('<h6> ', '', $original);}				
		if (strpos($original, '<h1>') !== false) {$original = str_replace('<h1>', '', $original);}				
		if (strpos($original, '<h2>') !== false) {$original = str_replace('<h2>', '', $original);}				
		if (strpos($original, '<h3>') !== false) {$original = str_replace('<h3>', '', $original);}				
		if (strpos($original, '<h4>') !== false) {$original = str_replace('<h4>', '', $original);}				
		if (strpos($original, '<h5>') !== false) {$original = str_replace('<h5>', '', $original);}				
		if (strpos($original, '<h6>') !== false) {$original = str_replace('<h6>', '', $original);}				
		if (strpos($original, '</h1>') !== false) {$original = str_replace(' </h1>', '', $original);}
		if (strpos($original, '</h2>') !== false) {$original = str_replace(' </h2>', '', $original);}
		if (strpos($original, '</h3>') !== false) {$original = str_replace(' </h3>', '', $original);}
		if (strpos($original, '</h4>') !== false) {$original = str_replace(' </h4>', '', $original);}
		if (strpos($original, '</h5>') !== false) {$original = str_replace(' </h5>', '', $original);}
		if (strpos($original, '</h6>') !== false) {$original = str_replace(' </h6>', '', $original);}
		if (strpos($original, '</h1>') !== false) {$original = str_replace('</h1>', '', $original);}
		if (strpos($original, '</h2>') !== false) {$original = str_replace('</h2>', '', $original);}
		if (strpos($original, '</h3>') !== false) {$original = str_replace('</h3>', '', $original);}
		if (strpos($original, '</h4>') !== false) {$original = str_replace('</h4>', '', $original);}
		if (strpos($original, '</h5>') !== false) {$original = str_replace('</h5>', '', $original);}
		if (strpos($original, '</h6>') !== false) {$original = str_replace('</h6>', '', $original);}	
	
		return $original;
		
	} 

?>