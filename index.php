<!DOCTYPE html>
<html lang="">
<head>
            <script src="js/jquery.js"></script>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title></title>
				<style>
                    input[type=text],input[type=file], select {width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;}
                    input[type=submit] {width: 49%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;display: inline-block}
                    #close{text-decoration: none;float: right;padding: 5px;border:1px solid #4CAF50; }
                    #close a{text-decoration: none; }
                    #skip {width: 34%;background-color: #4CAF50;color: white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;display: inline-block;text-decoration: none}
                    div {border-radius: 5px;background-color: #f2f2f2;padding: 20px;}
					.activities{width: 100%;text-align: center}
					.activities li{display: inline-block}
					.activities li a{display: block;width: 200px;background-size: 100% !important;color: #000;text-decoration: none;border: 2px solid lightblue;padding: 250px 10px 0 10px;margin: 2%;font-weight: bold}
                    .upload{display: none;width: 300px;position: fixed;top: 40%;right: 0;left: 0;margin: 0 auto;}
					span{display: block}
					.activities li.sep a{background: url(images/saperate.png) no-repeat center center/cover}
					.activities li.test a{background: url(images/texting.jpg) no-repeat center center/cover}
					.activities li.convet a{background: url(images/convert.png) no-repeat center center/cover}
				</style>
</head>
<body>
<?php
    if(isset($_REQUEST['error'])){
            if($_REQUEST['error']=='success') {
            header("Location: xmlconvertwr-version6-working-progress.php");
            }else{
                echo "<h3 class='success'>Failed to upload Please select only XML file extensions only</h3>";
            }
        }
    ?>
<ul class="activities">
	<li class="sep"><a href="separatepages-from-fullhtmp-version5.php"><span>Separate Pages</span></a></li>
	<li class="test"><a href="xmlconvertwr-version6-testing.php"><span>Testing Output</span></a></li>
	<li class="convet"><a href="javascript:void(0)" id="button"><span>Html Convertion</span></a></li>
<!--	xmlconvertwr-version6-working%20progress.php-->
</ul>
		<div class="clear" style="clear:both">
		    
		</div>
		<p><a href="output/html-file.html" target="_blank">Check For OutPut</a></p>
		<p><a href="bredcrumchecker.php" target="_blank">Check For Breadcrumb</a></p>
<div class="upload">
   <span id="close"><a  href="javascript:void(0);">X</a></span>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Upload Sitemap XML File Before Proceding
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Xml" name="submit">
        <a id="skip" href="xmlconvertwr-version6-working-progress.php">Skip Uploading</a>
    </form>
</div>
<script>
    $(document).ready(function(){
        $('#button').click(function(){
            $('.upload').show();
        });
        $('#close a').click(function(){
            $('.upload').hide();
        });
    });
</script>		
</body>
</html>
