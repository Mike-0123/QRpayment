<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator</title>
  <link rel="stylesheet" href="qr.css">  
</head>
<body>
    <?php
$price=200;
$services="Transport";

if(isset($_POST["btnsubmit"])){
    $price=$_POST["price"];
    $services=$_POST["services"];


    /*echo "<pre>";
    var_dump($_POST);
    echo "</pre>";*/

}
?> 
<div class="all">
    <fieldset>
        <legend>User information</legend>
        <form action="indexqr.php" method="post">
<label>Price </label><input type="number" name=" price" class="one" value="<?php echo $price;?>"><br>
<label>Service You Offer </label><input type="text" name="services"  class="one"  value="<?php echo $services;?>"><br>
<input type="submit" name="btnsubmit" value="Generate QR Code "  class="btn1">

</form>
</div>

<?php
include "phpqrcode/qrlib.php";
$PNG_TEMP_DIR = 'temp/';
if(!file_exists($PNG_TEMP_DIR))
mkdir($PNG_TEMP_DIR);

$filename = $PNG_TEMP_DIR  . 'test.png';

if (isset($_POST["btnsubmit"])){
    $codeString = $_POST["price"]."\n";
    $codeString .= $_POST["services"] ."\n";

$filename = $PNG_TEMP_DIR  .'test'. 
md5($codeString). '.png';

QRcode::png($codeString, $filename);

echo '<img src="' .$PNG_TEMP_DIR . 
basename($filename) . '"  /><hr/>';


}




?>

    </fieldset>
</body>
</html>