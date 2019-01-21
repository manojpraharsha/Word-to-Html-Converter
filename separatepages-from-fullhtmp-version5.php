<?php
ini_set('display_errors', 1);
$names=file('output/html-file.html');
$names2=file('output/bredcrumb-file.html');
file_put_contents('output/report.html', "");
file_put_contents('output/links.html', "");
file_put_contents('output/images.html', "");
$report= null;
// To check the number of lines
$str="<h1>";
$count=0;
$line=0;
$line2=0;
$count3=1;
$linnumber = array();
$bredgrumlinnumber = array();
$bredgrumFiles = array();
$bredgrumlvl = array();
$bredgrums = array();
$pagenames = array();
$pageheading = array();
foreach($names2 as $name)
{ 
	$string= $name;	 
	$string2= string_conversion3($name,$pageheading);
	$string2 = preg_replace("/[\n\r]/","",$string2); 
	array_push($bredgrumFiles, $string2);	
	array_push($bredgrumlinnumber, $line2);
	$line2++;    
}
foreach($names2 as $name)
{ $string= $name;	 
	if (strpos($string, "<h1>") !== false) {			 
		 array_push($bredgrumlvl, "1");
     }
	 else if(strpos($string, "<h2>") !== false) {	  
			 array_push($bredgrumlvl, "2");
		 }
	 else if(strpos($string, "<h3>") !== false) {	  
			 array_push($bredgrumlvl, "3");
		 }
	 else if(strpos($string, "<h4>") !== false) {	  
			 array_push($bredgrumlvl, "4");
		 }
	 else if(strpos($string, "<h5>") !== false) {	  
			 array_push($bredgrumlvl, "5");
		 }
	 else if(strpos($string, "<h6>") !== false) {	  
			 array_push($bredgrumlvl, "6");
		 }
	 else{	  
		 array_push($bredgrumlvl, "1");
	 }    
}

$bredgrumbsize = sizeof($bredgrumFiles);
$Alllinks= "";
$Allimgs= "";


for($k=0;$k<$bredgrumbsize;$k++){   
    $Allinks= string_conversion('<h1>'.$bredgrumFiles[$k].'</h1>',$pagenames);
    $Alllinks.='<li><a href="'.$Allinks.'">'.$bredgrumFiles[$k].'</a></li>';
    $Allimgs.='<div class="pageimg"><img src="3d-images/" alt="'.$bredgrumFiles[$k].'"></div>';
//	echo 'line number '.($bredgrumlinnumber[$k] +1).' has a Headeing: '.$bredgrumFiles[$k].' which holds good heading level : '.$bredgrumlvl[$k].'<br>';
}
foreach($names2 as $name)
{	
	$string= string_conversion3($name,$pageheading);
	$string = preg_replace("/[\n\r]/","",$string); 
		for($k=0;$k<$bredgrumbsize;$k++){
			if($string==$bredgrumFiles[$k]){
				if($bredgrumlvl[$k]=='1'){
					$bred = '<a href="/">Home</a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
				else if($bredgrumlvl[$k]=='2'){	
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='1'){
							$links1= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl1 = $bredgrumFiles[$l];							
							break;
						}
					}
					$bred = '<a href="/">Home</a> &raquo; <a href="'.$links1.'"> '.$levl1.' </a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
				else if($bredgrumlvl[$k]=='3'){
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='2'){
							$links2= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl2 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='1'){
							$links1= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl1 = $bredgrumFiles[$l];							
							break;
						}
					}
					$bred ='<a href="/">Home</a> &raquo; <a href="'.$links1.'"> '.$levl1.' </a> &raquo; <a href="'.$links2.'"> '.$levl2.'  </a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
				else if($bredgrumlvl[$k]=='4'){
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='3'){
							$links3= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl3 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='2'){
							$links2= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl2 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='1'){
							$links1= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl1 = $bredgrumFiles[$l];							
							break;
						}
					}
					$bred ='<a href="/">Home</a> &raquo; <a href="'.$links1.'"> '.$levl1.' </a> &raquo; <a href="'.$links2.'"> '.$levl2.'  </a> &raquo; <a href="'.$links3.'"> '.$levl3.' </a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
				else if($bredgrumlvl[$k]=='5'){					
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='4'){
							$links4= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl4 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='3'){
							$links3= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl3 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='2'){
							$links2= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl2 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='1'){
							$links1= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl1 = $bredgrumFiles[$l];							
							break;
						}
					}
					$bred = '<a href="/">Home</a> &raquo; <a href="'.$links1.'"> '.$levl1.' </a> &raquo; <a href="'.$links2.'"> '.$levl2.'  </a> &raquo; <a href="'.$links3.'"> '.$levl3.' </a> &raquo; <a href="'.$links4.'"> '.$levl4.' </a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					array_push($bredgrums,$bred);
				}
				else if($bredgrumlvl[$k]=='6'){					
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='5'){
							$links5= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl5 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='4'){
							$links4= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl4 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='3'){
							$links3= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl3 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='2'){
							$links2= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl2 = $bredgrumFiles[$l];							
							break;
						}
					}
					for($l=$k;$l > 0;$l--){	
						if($bredgrumlvl[$l]=='1'){
							$links1= string_conversion('<h1>'.$bredgrumFiles[$l].'</h1>',$pagenames);
							$levl1 = $bredgrumFiles[$l];							
							break;
						}
					}
					$bred = '<a href="/">Home</a> &raquo; <a href="'.$links1.'"> '.$levl1.' </a> &raquo; <a href="'.$links2.'"> '.$levl2.'  </a> &raquo; <a href="'.$links3.'"> '.$levl3.' </a> &raquo; <a href="'.$links4.'"> '.$levl4.' </a> &raquo; <a href="'.$links5.'"> '.$levl5.' </a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
				else{
					$bred = '<a href="/">Home</a> &raquo; <span>'.$bredgrumFiles[$k].'</span>';
					 array_push($bredgrums, $bred);
				}
			}
	}	 
}

//generate lin numbers of h1 headings
foreach($names as $name)
{
   $string= $name;
	 if (strpos($string, $str) !== false) {			
		 $count++;
		 array_push($linnumber, $line);
      }
	$line++;
}
$count3 = sizeof($linnumber);
$line3=0;

//generate page headings and page names
foreach($names as $name)
{   
	for($line2=0;$line2<$count3;$line2++){
		if($linnumber[$line2]==$line3){
			$string2= string_conversion2($name,$pageheading);
			$string2 = preg_replace("/[\n\r]/","",$string2); 
			array_push($pageheading, $string2);
			$string= string_conversion($name,$pagenames);
			array_push($pagenames, $string);			
		}
	}
 	$line3++;
}

//line number count for html file
$file="output/html-file.html";
$linecount = 0;
$handle = fopen($file, "r");
while(!feof($handle)){
  $line = fgets($handle);
  $linecount++;
}
fclose($handle);
$lines= file('output/html-file.html');
for($p=0; $p<$count3; $p++){
	if(isset($linnumber[$p+1])){
		$j=$linnumber[$p+1];
	}
	else{
		$j=$linecount;
	}
	$string3=null;

$string='<!DOCTYPE html>
<html lang="en">

<head>
    <title>'.$pageheading[$p].' | Project Name</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--	Start Head-->
    <!--#include file="includes/head.shtml"-->   
    <!--	End Head-->
</head>

<body>
    <div class="mainWrapper">
        <!--	Start Header-->
        <!--#include file="includes/header.shtml"-->
        <!--	End Header-->
        <div class="clear"></div>
        <!--	Start Banner-->
        <!--#include file="includes/banner.shtml"-->        
        <!--	End Banner-->
        <div class="clear"></div>
        <main>
            <div class="gridWrapper">
                <section>
                    <article class="ypocms textMain" id="skip-to-content" data-skip="Content">
                        <!-- Our regular content goes here -->
                        <div class="breadcrumbs">';
						for($m=0;$m<$bredgrumbsize;$m++){
							if($pageheading[$p]==$bredgrumFiles[$m]){
								$string.=$bredgrums[$m];
								$string3= $bredgrums[$m];
							}							
						}
						if(($string3==null)||($string3=="")){
                            $string3= '<a href="/">Home</a> &raquo; <span>'.$pageheading[$p].'</span>';
                            $string.=$string3;
                        }
						$string.='</div>';
                    for ($line=$linnumber[$p]; $line < $j ; $line++) {
				        $string.=$lines[$line];
			                     }
			$string.='</article>
                    <aside id="sidebar" data-skip="Sidebar">
                        <!--	Start Aside-->
                        <!--#include file="includes/aside.shtml"-->                        
                        <!--	End Aside-->
                    </aside>
                </section>
            </div>
        </main>
        <!--	Start Footer-->
        <!--#include file="includes/footer.shtml"-->
        <!--	End Footer-->
    </div>
</body>

</html>

';
	$string2 = preg_replace('/\s+/', '', $pagenames[$p]);
	file_put_contents('output/files/'.$string2, "");	
	$fp = fopen('output/files/'.$string2, 'a+');
 	fwrite($fp, $string);
	echo "<strong>file no:</strong> ".$p." '".$string2."' created succefull from line no: ".$linnumber[$p]." to line no: ".$j."<br> <strong>With  Bredcrumb :</strong>".$string3."<br><br></p>";
	$report.= "<p><strong>file no:</strong> ".$p." '".$string2."' created succefull from line no: ".$linnumber[$p]." to line no: ".$j."<br> <strong>With  Bredcrumb :</strong>".$string3."<br><br></p>
    ";
	
}
$fp1 = fopen('output/report.html', 'a+');
	fwrite($fp1, "");
	fwrite($fp1, $report);
$fp2 = fopen('output/links.html', 'a+');
	fwrite($fp2, "");
	fwrite($fp2, $Alllinks);
$fp3 = fopen('output/images.html', 'a+');
	fwrite($fp3, "");
	fwrite($fp3, $Allimgs);
//file name conventions
function string_conversion($original,$pagenames) {	
		if (strpos($original, '<h1> ') !== false) {$original = str_replace('<h1> ', '', $original);}					
		if (strpos($original, '<h1>') !== false) {$original = str_replace('<h1>', '', $original);}					
		if (strpos($original, '<h1>') !== false) {$original = str_replace('<h1>', '', $original);}						
		if (strpos($original, '.') !== false) {$original = str_replace('.', '', $original);}	
		if (strpos($original, '</h1>') !== false) {$original = str_replace('</h1>', '-orthopedic-surgeon-frankfort-mokena-new-lenox.html', $original);}
		if (strpos($original, '</h1>') !== false) {$original = str_replace('</h1>', '-orthopedic-surgeon-frankfort-mokena-new-lenox.html', $original);}	
		if (strpos($original, '(') !== false) {$original = str_replace('(', '', $original);}						
		if (strpos($original, '?') !== false) {$original = str_replace('?', '', $original);}						
		if (strpos($original, ')') !== false) {$original = str_replace(')', '', $original);}						
		if (strpos($original, ',') !== false) {$original = str_replace(',', '', $original);}						
		if (strpos($original, '“') !== false) {$original = str_replace('“', '', $original);}						
		if (strpos($original, '”') !== false) {$original = str_replace('”', '', $original);}						
		if (strpos($original, "'") !== false) {$original = str_replace("'", "", $original);}						
		if (strpos($original, "'") !== false) {$original = str_replace("'", "", $original);}						
		if (strpos($original, '"') !== false) {$original = str_replace('"', '', $original);}						
		if (strpos($original, '/') !== false) {$original = str_replace('/', '-', $original);}						
		if (strpos($original, ':') !== false) {$original = str_replace(':', '-', $original);}						
		if (strpos($original, '&') !== false) {$original = str_replace('&', '-', $original);}						
		if (strpos($original, ' and ') !== false) {$original = str_replace(' and ', '-', $original);}				
		if (strpos($original, ' for ') !== false) {$original = str_replace(' for ', '-', $original);}				
		if (strpos($original, ' the ') !== false) {$original = str_replace(' the ', '-', $original);}				
		if (strpos($original, ' the ') !== false) {$original = str_replace(' of ', '-', $original);}				
		if (strpos($original, ' is ') !== false) {$original = str_replace(' is ', '-', $original);}				
		if (strpos($original, ' ') !== false) {$original = str_replace(' ', '-', $original);}					
		if (strpos($original, '--') !== false) {$original = str_replace('--', '-', $original);}
		if (strpos($original, '--') !== false) {$original = str_replace('--', '-', $original);}
		if (strpos($original, ' ') !== false) {$original = str_replace(' ', '', $original);}					
		if (strpos($original, '®') !== false) {$original = str_replace('®', '', $original);}					
		if (strpos($original, '◊') !== false) {$original = str_replace('◊', '', $original);}					
		$original = strtolower($original);
			if (in_array($original, $pagenames)) {
				if (strpos($original, '.html') !== false) {
					$original = str_replace('.html', '1.html', $original);}	
					return $original;
			}
		else{
			return $original;
			}	
//		return $original;
	} 
function string_conversion2($original,$pageheading) {
	if (strpos($original, '<h1> ') !== false) {$original = str_replace('<h1> ', '', $original);}				
		if (strpos($original, '<h1>') !== false) {$original = str_replace('<h1>', '', $original);}				
		if (strpos($original, '</h1>') !== false) {$original = str_replace(' </h1>', '', $original);}
		if (strpos($original, '</h1>') !== false) {$original = str_replace('</h1>', '', $original);}
		if (strpos($original, '/') !== false) {$original = str_replace('/', ' ', $original);}
		if (strpos($original, ' and ') !== false) {$original = str_replace(' and ', ' & ', $original);}
		if (strpos($original, '“') !== false) {$original = str_replace('“', '"', $original);}					
		if (strpos($original, '”') !== false) {$original = str_replace('”', '"', $original);}	
		if (strpos($original, "'") !== false) {$original = str_replace("'", "'", $original);}	
		if (strpos($original, '\n') !== false) {$original = str_replace("\n", "", $original);}	
	if (in_array($original, $pageheading)) {
		return $original.'1';
	}
	else{
		return $original;
		}		
		
	} 
	function string_conversion3($original,$pageheading) {
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
		if (strpos($original, '/') !== false) {$original = str_replace('/', ' ', $original);}
		if (strpos($original, ' and ') !== false) {$original = str_replace(' and ', ' & ', $original);}
		if (strpos($original, '“') !== false) {$original = str_replace('“', '"', $original);}					
		if (strpos($original, '”') !== false) {$original = str_replace('”', '"', $original);}	
		if (strpos($original, "'") !== false) {$original = str_replace("'", "'", $original);}	
		if (strpos($original, '\n') !== false) {$original = str_replace("\n", "", $original);}	
	if (in_array($original, $pageheading)) {
		return $original.'1';
	}
	else{
		return $original;
		}		
		
	} 

?>