<style>span.endpg {display: block;}</style>
<?php
error_reporting(0);
ini_set('max_execution_time', 1800);
$doc = new DOMDocument();
$doc->load('xml-file.xml');
$x = new DOMXpath($doc);
$x->registerNamespace("wx", "http://schemas.microsoft.com/office/word/2003/auxHint");
$xpath = new DOMXpath($doc);
$xpath->registerNamespace("w", "http://schemas.openxmlformats.org/wordprocessingml/2006/main");
$count = $x->evaluate("//wx:sect/w:p")->length;
echo 'total: '.$count;
echo '<div id="progress" style="width:500px;border:1px solid #ccc;"></div>';
echo '<div id="information" style="width"></div>';
$htmltext = null;
$currentHeading = null;
$bredcrumbtext = null;
$bredgrumFiles = array();
$headings = "";
 echo '<script language="javascript">
    confirm("Are you sure you want to Start Convertions");
    </script>';
for($i=0;$i<$count;$i++){
	$completion =  intval($i/($count-1) * 100)."%";
	 echo '<script language="javascript">
    document.getElementById("progress").innerHTML="<div style=\"width:'.$completion.';background-color:#ddd;\">&nbsp;</div>";
    document.getElementById("information").innerHTML="'.$i.' row(s) processed.";
    </script>';
	$completion = ($i/$count)*100;
	?>
	<script>		
	$('p.loading').text('');
	</script>	
	<?php
//	li type 1 existance Conditions
	$li_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:listPr/w:ilvl")->item(0)->attributes[0]->nodeValue;	
	$Previousli_existance=$x->evaluate("//wx:sect/w:p[".($i)."]/w:pPr/w:listPr/w:ilvl")->item(0)->attributes[0]->nodeValue;
	$Previousli_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i)."]/w:pPr/w:listPr")->length;
	$nextli_existance=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr/w:listPr/w:ilvl")->item(0)->attributes[0]->nodeValue;
	$nextli_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr/w:listPr")->length;		
	$nextli_existance_double_confirmation=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr")->length;	
//	li type 3 existance Conditions
	$li_type3_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:numPr/w:ilvl")->item(0)->attributes[0]->nodeValue;
	$Previousli_type3_existance=$x->evaluate("//wx:sect/w:p[".($i)."]/w:pPr/w:numPr/w:ilvl")->item(0)->attributes[0]->nodeValue;		
	$Previousli_type3_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i)."]/w:pPr/w:numPr")->length;
	$nextli_type3_existance=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr/w:numPr/w:ilvl")->item(0)->attributes[0]->nodeValue;	
	$nextli_type3_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr/w:numPr")->length;		
	$nextli_type3_existance_double_confirmation=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:pPr")->length;			
//	li type 2 existance Conditions
	$li_type2_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r/w:tab")->length;		
	$Previousli_li_type2_existance=$x->evaluate("//wx:sect/w:p[".($i)."]/w:r/w:tab")->length;		
	$nextli_li_type2_existance=$x->evaluate("//wx:sect/w:p[".($i+2)."]/w:r/w:tab")->length;	
//	li type 4 existance Conditions
    $li_type4_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
    if (strpos($li_type4_existance, '•') !== false) {
        $li_type4_existance=1;
    }
    else{$li_type4_existance=0;}
    $Previousli_type4_existance=$x->evaluate("//wx:sect/w:p[".($i)."]")->item(0)->nodeValue;
    if (strpos($Previousli_type4_existance, '•') !== false) {
        $Previousli_type4_existance=1;
    }
    else{$Previousli_type4_existance=0;}
    $nextli_type4_existance=$x->evaluate("//wx:sect/w:p[".($i+2)."]")->item(0)->nodeValue;
    if (strpos($nextli_type4_existance, '•') !== false) {
        $nextli_type4_existance=1;
    }
    else{$nextli_type4_existance=0;}    
//	h2 existance Conditions	
	$h3_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:rPr/w:b")->length;
	$h3_more_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:rPr/b-cs")->length;
	$h3_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:rPr/w:b")->length;
	$h3_existance_more_confirmation=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:rPr/b-cs")->length;
	$h3_existance_thriple_confirmation=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r/w:rPr/w:b")->length;
	$h3_existance_double_confirmation=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:rPr/w:szCs")->item(0)->attributes[0]->nodeValue;
	$h3_existance_double_confirmation_type2=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:rPr/w:sz-cs")->item(0)->attributes[0]->nodeValue;
	$h3_existance_double_confirmation_type3=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
    //	h3 existance Conditions	
	$h4_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:rPr/w:highlight")->length;
//	p existance Conditions	
	$p_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr")->length;
	$p_existance_confirmation=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->length;
//	ahref existance Conditions	
	$ahref_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;	
	$ahref_existance_confirmation=null;
	if($ahref_existance>1){
				$original=$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
				if (strpos($original, 'HYPERLINK') !== false) {					
					$ahref_existance_confirmation=1;					
				}
	}
//    table checking
    $p_existance=$x->evaluate("//wx:sect/w:tbl")->length;    
//	Bredcrumb
	$bredcrum_existance_check=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue;
	$bredgrumbsize = sizeof($bredgrumFiles);
	$bredcrum_existance_doublecheck=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".(9)."]")->item(0)->nodeValue;
	$bredcrum_existance_value=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".(6)."]")->item(0)->nodeValue;
//	other existance Conditions		
	$linebreak_existance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;	
	$no_of_childs =  $x->evaluate("//wx:sect/w:p")->item($i)->childNodes->length;
	$no_of_childs2 =  $x->evaluate("//wx:sect/w:p")->item($i+1)->childNodes->length;	
	$nodeValueExistance = $x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
	$nodeValueExistance = preg_replace('!\s+\s+!', '', $nodeValueExistance);
	$length = strlen($nodeValueExistance);    
	if((!empty($nodeValueExistance))&&(($nodeValueExistance)!="")){
			if($no_of_childs>2){
				if (strpos($bredcrum_existance_doublecheck, 'PAGEREF') !== false) {		
					if($bredcrum_existance_check == 'a10'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);							
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h1>".$bredcrum_existance_value."</h1>\n";
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
					if($bredcrum_existance_check == 'a11'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);				
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h2>".$bredcrum_existance_value."</h2>\n";                       
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
					if($bredcrum_existance_check == 'a12'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);							
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h3>".$bredcrum_existance_value."</h3>\n";
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
					if($bredcrum_existance_check == 'a13'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);							
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h4>".$bredcrum_existance_value."</h4>\n";
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
					if($bredcrum_existance_check == 'a14'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);							
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h5>".$bredcrum_existance_value."</h5>\n";
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
					if($bredcrum_existance_check == 'a15'){
						if(!empty($bredgrumFiles)){									$bredcrum_existance_value=bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles);							
						}
						array_push($bredgrumFiles, $bredcrum_existance_value);
						$original = "<h6>".$bredcrum_existance_value."</h6>\n";
						$original = preg_replace('!\s+\s+!', '', $original);
						$bredcrumbtext.= $original;
					}
				}
				else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==2)&&($length<100)){
					$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
					$original = preg_replace('!\s+\s+!', '', $original);
                    $currentHeading = $original;
                    $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
                    
					}
					else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==3)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
						$original = preg_replace('!\s+\s+!', '', $original);
                        $currentHeading = $original;
                         $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
					}
					else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==4)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
						$original = preg_replace('!\s+\s+!', '', $original);
                        $currentHeading = $original;
                         $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
					}
					else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==5)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
						$original = preg_replace('!\s+\s+!', '', $original);
                        $currentHeading = $original;
                         $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
					}
				else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==6)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
						$original = preg_replace('!\s+\s+!', '', $original);
                        $currentHeading = $original;
                     $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
					}
				else if((($x->evaluate("//wx:sect/w:p[".($i+1)."]/w:pPr/w:pStyle")->item(0)->attributes[0]->nodeValue)==7)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p[".($i+1)."]")->item(0)->nodeValue;
						$original = preg_replace('!\s+\s+!', '', $original);
                        $currentHeading = $original;
                     $headings.="<h1>".$original."</h1>\n";
						$htmltext.= "<h1>".$original."</h1>\n";
					}
					else if($h4_existance==1){
						 $length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}		
                        $finaltags =  "<h3>".$original."</h3>\n";
				        $finaltags = preg_replace('!\s+\s+!', '', $finaltags);
						$htmltext.= $finaltags;
					}

                    else if((($h3_existance==1)||($h3_existance_thriple_confirmation==1)||($h3_existance_confirmation==1)||($h3_existance_double_confirmation==24)||($h3_existance_double_confirmation_type2==24)||($h3_more_existance==1)||($h3_existance_more_confirmation==1))&&($li_existance==null)&&($length<100)){
						$original =$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
                        $length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}		
                        $finaltags =  "<h2>".$original."</h2>\n";
				         if (strpos($finaltags, '<strong>') !== false) {$finaltags = str_replace("<strong>", "", $finaltags);}
				         if (strpos($finaltags, '<strong>') !== false) {$finaltags = str_replace("<strong>", "", $finaltags);}
                        if (strpos($finaltags, '</strong>') !== false) {$finaltags = str_replace("</strong>", "", $finaltags);}
                        if (strpos($finaltags, '</strong>') !== false) {$finaltags = str_replace("</strong>", "", $finaltags);}
				        $finaltags = preg_replace('!\s+\s+!', '', $finaltags);
						$htmltext.= $finaltags;
					}
					else if(($li_existance!=null)||($li_type3_existance!=null)){                        
						if(($Previousli_existance==null)&&($nextli_existance_confirmation==0)){	
				            $original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}							
							$finaltags =  "<ul><li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else if($Previousli_existance==null){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
								$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<ul><li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else if(($nextli_existance==null)||($nextli_existance_confirmation==0)||($nextli_existance_double_confirmation==0)){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}						
						else if(($nextli_existance_double_confirmation==0)){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else if($no_of_childs2<=3){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
								$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else {
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
								$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
					}
					else if((($h3_existance==1)||($h3_existance_thriple_confirmation==1)||($h3_existance_confirmation==1)||($h3_existance_double_confirmation==24)||($h3_existance_double_confirmation_type2==24)||($h3_more_existance==1)||($h3_existance_more_confirmation==1))&&($li_existance==null)&&($length<100)&&($h3_existance_double_confirmation_type3<2)){
						$original =$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;						
						$original = preg_replace('!\s+\s+!', '', $original);
						$htmltext.= "<h2>".$original."</h2>\n";
					}
                                    else if($li_type4_existance){
						if(($Previousli_type4_existance)&&($nextli_type4_existance)){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<ul><li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else if($Previousli_type4_existance){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<ul><li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
						else if($nextli_type4_existance){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}	
						else {
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
					}
                
//					else if($li_type2_existance!=0){
//						if(($Previousli_li_type2_existance==0)&&($nextli_li_type2_existance==0)){
//							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
//							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
//							if($length>0){
//								$original= "";							
//								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
//							}
//							$finaltags =  "<ul><li>".$original."</li></ul>";
//							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
//							$htmltext.=  $finaltags."\n";
//						}
//						else if($Previousli_li_type2_existance==0){
//							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
//							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
//							if($length>0){
//								$original= "";							
//								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
//							}
//							$finaltags =  "<ul><li>".$original."</li>";
//							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
//							$htmltext.=  $finaltags."\n";
//						}
//						else if($nextli_li_type2_existance==0){
//							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
//							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
//							if($length>0){
//								$original= "";							
//								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
//							}
//							$finaltags =  "<li>".$original."</li></ul>";
//							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
//							$htmltext.=  $finaltags."\n";
//						}	
//						else {
//							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
//							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
//							if($length>0){
//								$original= "";							
//								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
//							}
//							$finaltags =  "<li>".$original."</li>";
//							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
//							$htmltext.=  $finaltags."\n";
//						}
//					}
					else if($p_existance==0){	
						$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
						$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
						if($length>0){
							$original= "";							
							$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
						}
						$finaltags =  "<p>".$original."</p>";		
						$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
						$htmltext.=  $finaltags."\n";
					}
					else if($p_existance_confirmation==0){	
						$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
						$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;						
						if($length>0){ 
							$original= "";
							$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
						 }
						$finaltags =  "<p>".$original."</p>";
						$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
						$htmltext.=  $finaltags."\n";
					}
					else {	
						$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
						$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
						if($length>0){ 
							$original= "";
							$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
						}
							$finaltags =  "<p>".$original."</p>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							$htmltext.=  $finaltags."\n";
						}
			}
		else{
			if($li_type4_existance){
						if(($Previousli_type4_existance)&&($nextli_type4_existance)){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<ul><li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							echo  $finaltags."\n";
						}
						else if($Previousli_type4_existance){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<ul><li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							echo  $finaltags."\n";
						}
						else if($nextli_type4_existance){
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li></ul>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							echo  $finaltags."\n";
						}	
						else {
							$original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
							$length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
							if($length>0){
								$original= "";							
								$original =  htmlTagsChecking($length,$i,$x,$currentHeading);
							}
							$finaltags =  "<li>".$original."</li>";
							$finaltags = preg_replace('!\s+\s+!', '', $finaltags);
							echo  $finaltags."\n";
						}
					}
			else{
                $original=$x->evaluate("//wx:sect/w:p")->item($i)->nodeValue;
                $length=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r")->length;
                if($length>0){ 
                    $original= "";
                    $original = htmlTagsChecking($length,$i,$x,$currentHeading);
                }
                $finaltags =  "<p>".$original."</p>";
                $finaltags = preg_replace('!\s+\s+!', '', $finaltags);
                echo  $finaltags."\n";
            }
		}
	}
}	
echo '<p><a href="index.php">Go Back</a></p>';
//function for checking bold , italic, images, href and spaces
   function htmlTagsChecking($length,$i,$x,$currentHeading) {	
   for($j=0;$j<=$length;$j++){
				$boldOccurance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]/w:rPr/w:b")->length;
				$italicOccurance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]/w:rPr/w:i")->length;
				$linkValueOccurance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j-2)."]/w:instrText")->length;
				$linkOccurance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]/w:instrText")->length;
				$pictureOccurance=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]/w:pict")->length;
				if($linkOccurance>0){} 
				else if($pictureOccurance>0){
                    $original.='<div class="pageimg"><img src="images/" alt="'.$currentHeading.'"></div>';
                } 
				else if($linkValueOccurance>0){
					$original1=$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j-2)."]")->item(0)->nodeValue;
					$original1 = preg_replace('!\s+\s+!', '', $original1);
					if (strpos($original1, '\t "') !== false) {$original1 = str_replace('\t "', '',$original1);}
					if (strpos($original1, '\o "') !== false) {$original1 = str_replace('\o "', '',$original1);}
					if (strpos($original1, '_blank "') !== false) {$original1 = str_replace('_blank "', '',$original1);}
					if (strpos($original1, '_blank"') !== false) {$original1 = str_replace('_blank"', '',$original1);}
					if (strpos($original1, '\l "') !== false) {$original1 = str_replace('\l "', '',$original1);}
					if (strpos($original1, 'syk_references "') !== false) {$original1 = str_replace('syk_references "', '',$original1);}
					if (strpos($original1, 'syk_references"') !== false) {$original1 = str_replace('syk_references"', '',$original1);}
					if (strpos($original1, '_new "') !== false) {$original1 = str_replace('_new "', '',$original1);}
					if (strpos($original1, 'HYPERLINK ') !== false) {$original1 = str_replace("HYPERLINK ", "", $original1);}
					if (strpos($original1, 'HYPERLINK ') !== false) {$original1 = str_replace("HYPERLINK ", "", $original1);}
					if (strpos($original1, 'HYPERLINK') !== false) {$original1 = str_replace("HYPERLINK", "", $original1);}
					$original.='&nbsp;<a href='.$original1.'>'.$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]")->item(0)->nodeValue.'</a>&nbsp;';
				}
				else if($boldOccurance>0){
					$original.="&nbsp;<strong>".$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]")->item(0)->nodeValue."</strong>&nbsp;";
                    $original = preg_replace('/“/i', '"', $original);
                    $original = preg_replace('/”/i', '"', $original);
                    $original = preg_replace("/’/i", "'", $original);                    
				}
	   			else if($italicOccurance>0){
					$original.="&nbsp;<em>".$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]")->item(0)->nodeValue."</em>&nbsp;";
                    $original = preg_replace('/“/i', '"', $original);
                    $original = preg_replace('/”/i', '"', $original);
                    $original = preg_replace("/’/i", "'", $original);
				}
				else{                    
					$original.="&nbsp;".$x->evaluate("//wx:sect/w:p[".($i+1)."]/w:r[".($j)."]")->item(0)->nodeValue."&nbsp;";                    
                    $original = preg_replace('/“/i', '"', $original);
//                    if (strpos($original, '“') !== false) {$original = str_replace('“', '"', $original);}
                    $original = preg_replace('/”/i', '"', $original);
//                    if (strpos($original, '”') !== false) {$original = str_replace('”', '"', $original);}
                    $original = preg_replace("/’/i", "'", $original);
//                    if (strpos($original, "’") !== false) {$original = str_replace("’", "'", $original);}
				}
			}
	return $original;
}
function bredcrumb_repeating_checking($bredgrumbsize,$bredcrum_existance_value,$bredgrumFiles){
	for($k=0;$k<$bredgrumbsize;$k++){
		if($bredcrum_existance_value==$bredgrumFiles[$k]){
			$bredcrum_existance_value=$bredcrum_existance_value.'1';
		}
		else{
			$bredcrum_existance_value=$bredcrum_existance_value;
		}
	}
	return $bredcrum_existance_value;
}
echo $bredcrumbtext;
echo $htmltext;
file_put_contents("output/html-file.html", "");
file_put_contents("output/bredcrumb-file.html", "");
 $fp = fopen('output/html-file.html', 'a+');
 fwrite($fp, $htmltext);
	$fp = fopen('output/bredcrumb-file.html', 'a+');
 fwrite($fp,  $headings);
?>