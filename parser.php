<?php
require __DIR__ . '/vendor/autoload.php';
$Parsedown = new Parsedown();
$isPost = $_SERVER["REQUEST_METHOD"] === "POST";
$recievedData = json_decode(file_get_contents("php://input"));
if($isPost){
    echo $Parsedown->text($recievedData);
}else{
    die("Error: invalid request");
}
?>
