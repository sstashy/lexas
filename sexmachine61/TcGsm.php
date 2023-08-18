<?php 
header("Content-type: application/json; charset=utf-8");
require("ipkontrol.php");
error_reporting(0);

$auth_key = "DaimonCanimBenim";

if ($_GET['auth_key'] != $auth_key) {
      echo json_encode(array("success" => false, "message" => "Daimon Api Korumasi Siker Atar :D | Daimon#1337"));
      die();
}

$tc = htmlspecialchars($_GET['tc']);

$url = "http://45.141.149.109/aile/test.php?tc=$tc";

$laxty = curl_init($url);
curl_setopt($laxty, CURLOPT_URL, $url);
curl_setopt($laxty, CURLOPT_RETURNTRANSFER, true);
curl_setopt($laxty, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($laxty, CURLOPT_SSL_VERIFYPEER, false);

$sonuc = curl_exec($laxty);


echo "Daimon API Services: Daimon#1337
succes: true 

Numaralar: [";

echo $sonuc;

echo " ]";

