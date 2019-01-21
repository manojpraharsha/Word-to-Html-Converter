<?php 
$doc = new DOMDocument();
$doc->load('xml-file.xml');
$xml = new DOMXpath($doc);
$xml->registerNamespace("w", "http://schemas.microsoft.com/office/word/2003/auxHint");
//$xml = simplexml_load_file('xml-file.xml'); // your xml
echo "Started <br/>";
foreach($xml->product as $url) {
     echo "hi";
    $url = (string) $url->image;
    echo $url;
    $filename = basename($url); // get the filename
    if(file_exists($filename)) {
        echo "file <strong>$filename</strong> already exists <br/>";
    } else {
        $img = file_get_contents($url); // get the image from the url
        file_put_contents($filename, $img); // create a file and feed the image
        echo "file <strong>$filename</strong> created <br/>";
    }
}

?>