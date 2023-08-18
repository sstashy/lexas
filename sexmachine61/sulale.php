<?php 
header("Content-type: application/json; charset=utf-8");
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$db = "101m";
$conn = new mysqli($servername, $username, $password, $db);
$conn->set_charset("utf8mb4");

//fuck sql injection smd
function clean($string) {
  $string = str_replace(' ', '-', $string);
  return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}



//form content
$tc = $_GET['tc'] ?? "";

header('Content-Type: application/json; charset=UTF-8');

//queries
$hsyssql = "SELECT * FROM `101m` WHERE `TC` LIKE '" . clean($tc) . "'";
$resulthsys = $conn->query($hsyssql);

//int
$idkardes = 1;
$idnumara = 1;

//check if conn failed
if ($conn->connect_error) {
  die("connection failed");
}

  //if tc was set
  if (isset($tc) ? $tc :'') {
    $arrall = array();
    $arrallno = array();
    $arranne = array();
    $arrbaba = array();
        if ($resulthsys->num_rows > 0) {
          while($rowhsys = $resulthsys->fetch_assoc()) {
            $kendisiget = array('YAKINLIK' => 'Kendisi', 'TC' => $rowhsys["TC"], 'ADI' => $rowhsys["ADI"], 'SOYADI' => $rowhsys["SOYADI"], 'DOGUMTARIHI' => $rowhsys["DOGUMTARIHI"], 'NUFUSIL' => $rowhsys["NUFUSIL"], 'NUFUSILCE' => $rowhsys["NUFUSILCE"], 'ANNEADI' => $rowhsys["ANNEADI"], 'ANNETC' => $rowhsys["ANNETC"], 'BABAADI' => $rowhsys["BABAADI"],  'BABATC' => $rowhsys["BABATC"],  'UYRUK' => $rowhsys["UYRUK"]);
            $idkardes += 1;
            array_push($arrall, $kendisiget);
            $annetc = $rowhsys["ANNETC"];
            $babatc = $rowhsys["BABATC"];
            $annetcquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $annetc . "' AND `TC` NOT LIKE '" . $tc . "'";// AND `ANNETC` NOT LIKE NULL";
            $resultannetc = $conn->query($annetcquery);
            $cocukquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowhsys["TC"] . "' OR `BABATC` LIKE '" . $rowhsys["TC"] . "'";
            $resultcocuk = $conn->query($cocukquery);
            if ($resultcocuk->num_rows > 0) {
              while ($rowcocuk = $resultcocuk->fetch_assoc()) {
                $cocuktcget = array('YAKINLIK' => 'Çocugu', 'TC' => $rowcocuk["TC"], 'ADI' => $rowcocuk["ADI"], 'SOYADI' => $rowcocuk["SOYADI"], 'DOGUMTARIHI' => $rowcocuk["DOGUMTARIHI"], 'NUFUSIL' => $rowcocuk["NUFUSIL"], 'NUFUSILCE' => $rowcocuk["NUFUSILCE"], 'ANNEADI' => $rowcocuk["ANNEADI"], 'ANNETC' => $rowcocuk["ANNETC"], 'BABAADI' => $rowcocuk["BABAADI"],  'BABATC' => $rowcocuk["BABATC"],  'UYRUK' => $rowcocuk["UYRUK"]);
                $idkardes += 1;
                array_push($arrall, $cocuktcget);
                $esquery = "SELECT * FROM `101m` WHERE `TC` NOT LIKE '" . $tc . "' AND TC LIKE '" . $rowcocuk["ANNETC"] . "' OR `TC` LIKE '" . $rowcocuk["BABATC"] . "' AND `TC` NOT LIKE '" . $tc . "' LIMIT 1";
                $resultes = $conn->query($esquery);
                if ($resultes->num_rows > 0) {
                  while ($rowes = $resultes->fetch_assoc()) {
                    $estcget = array('YAKINLIK' => 'Eşi', 'TC' => $rowes["TC"], 'ADI' => $rowes["ADI"], 'SOYADI' => $rowes["SOYADI"], 'DOGUMTARIHI' => $rowes["DOGUMTARIHI"], 'NUFUSIL' => $rowes["NUFUSIL"], 'NUFUSILCE' => $rowes["NUFUSILCE"], 'ANNEADI' => $rowes["ANNEADI"], 'ANNETC' => $rowes["ANNETC"], 'BABAADI' => $rowes["BABAADI"],  'BABATC' => $rowes["BABATC"],  'UYRUK' => $rowes["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $estcget);
                  }
                }
              }
            }
            if($resultannetc->num_rows > 0) {
              while ($rowannetc = $resultannetc->fetch_assoc()) {
                $kardestc = $rowannetc["TC"];
                $kardessql = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $kardestc . "'";
                $resultkardestc = $conn->query($kardessql);
                $annetcget = array('YAKINLIK' => 'Kardeşi', 'TC' => $rowannetc["TC"], 'ADI' => $rowannetc["ADI"], 'SOYADI' => $rowannetc["SOYADI"], 'DOGUMTARIHI' => $rowannetc["DOGUMTARIHI"], 'NUFUSIL' => $rowannetc["NUFUSIL"], 'NUFUSILCE' => $rowannetc["NUFUSILCE"], 'ANNEADI' => $rowannetc["ANNEADI"], 'ANNETC' => $rowannetc["ANNETC"], 'BABAADI' => $rowannetc["BABAADI"],  'BABATC' => $rowannetc["BABATC"],  'UYRUK' => $rowannetc["UYRUK"]);
                $idkardes += 1;
                array_push($arrall, $annetcget);
              }
            }
            $annequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $annetc . "'";
            $babaquery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $babatc . "'";
            $resultannequery = $conn->query($annequery);
            $resultbabaquery = $conn->query($babaquery);
            if ($resultannequery->num_rows > 0) {
              while($rowanne = $resultannequery->fetch_assoc()) {
                $anneget = array('YAKINLIK' => 'Annesi', 'TC' => $rowanne["TC"], 'ADI' => $rowanne["ADI"], 'SOYADI' => $rowanne["SOYADI"], 'DOGUMTARIHI' => $rowanne["DOGUMTARIHI"], 'NUFUSIL' => $rowanne["NUFUSIL"], 'NUFUSILCE' => $rowanne["NUFUSILCE"], 'ANNEADI' => $rowanne["ANNEADI"], 'ANNETC' => $rowanne["ANNETC"], 'BABAADI' => $rowanne["BABAADI"],  'BABATC' => $rowanne["BABATC"],  'UYRUK' => $rowanne["UYRUK"]);
                $idkardes += 1;
                array_push($arrall, $anneget);
                $anneannequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowanne["ANNETC"] . "'";
                $dedequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowanne["BABATC"] . "'";
                $resultanneannequery = $conn->query($anneannequery);
                $resultdedequery = $conn->query($dedequery);
                if ($resultanneannequery->num_rows > 0) {
                  while($rowanneanne = $resultanneannequery->fetch_assoc()) {
                    $anneanneget = array('YAKINLIK' => 'AnneAnnesi', 'TC' => $rowanneanne["TC"], 'ADI' => $rowanneanne["ADI"], 'SOYADI' => $rowanneanne["SOYADI"], 'DOGUMTARIHI' => $rowanneanne["DOGUMTARIHI"], 'NUFUSIL' => $rowanneanne["NUFUSIL"], 'NUFUSILCE' => $rowanneanne["NUFUSILCE"], 'ANNEADI' => $rowanneanne["ANNEADI"], 'ANNETC' => $rowanneanne["ANNETC"], 'BABAADI' => $rowanneanne["BABAADI"],  'BABATC' => $rowanneanne["BABATC"],  'UYRUK' => $rowanneanne["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $anneanneget);
                    $annekardesquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowanneanne["TC"] . "' AND `TC` NOT LIKE '" . $rowanne["TC"] . "'";
                    $resultannekardesquery = $conn->query($annekardesquery);
                    if ($resultannekardesquery->num_rows > 0) {
                      while ($rowannekardes = $resultannekardesquery->fetch_assoc()) {
                        $annekardesget = array('YAKINLIK' => 'Dayı/Teyze', 'TC' => $rowannekardes["TC"], 'ADI' => $rowannekardes["ADI"], 'SOYADI' => $rowannekardes["SOYADI"], 'DOGUMTARIHI' => $rowannekardes["DOGUMTARIHI"], 'NUFUSIL' => $rowannekardes["NUFUSIL"], 'NUFUSILCE' => $rowannekardes["NUFUSILCE"], 'ANNEADI' => $rowannekardes["ANNEADI"], 'ANNETC' => $rowannekardes["ANNETC"], 'BABAADI' => $rowannekardes["BABAADI"],  'BABATC' => $rowannekardes["BABATC"],  'UYRUK' => $rowannekardes["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $annekardesget);
                        $annekuzenquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowannekardes["TC"] . "' OR  `BABATC` LIKE '" . $rowannekardes["TC"] . "'";
                        $resultannekuzenquery = $conn->query($annekuzenquery);
                        if ($resultannekuzenquery->num_rows > 0) {
                          while ($rowannekuzen = $resultannekuzenquery->fetch_assoc()) {
                            $annekuzenget = array('YAKINLIK' => 'Anne Tarafı Kuzen', 'TC' => $rowannekuzen["TC"], 'ADI' => $rowannekuzen["ADI"], 'SOYADI' => $rowannekuzen["SOYADI"], 'DOGUMTARIHI' => $rowannekuzen["DOGUMTARIHI"], 'NUFUSIL' => $rowannekuzen["NUFUSIL"], 'NUFUSILCE' => $rowannekuzen["NUFUSILCE"], 'ANNEADI' => $rowannekuzen["ANNEADI"], 'ANNETC' => $rowannekuzen["ANNETC"], 'BABAADI' => $rowannekuzen["BABAADI"],  'BABATC' => $rowannekuzen["BABATC"],  'UYRUK' => $rowannekuzen["UYRUK"]);
                            $idkardes += 1;
                            array_push($arrall, $annekuzenget);
                          }
                      }
                      }
                    }
                  }
                }
                if ($resultdedequery->num_rows > 0) {
                  while($rowdede = $resultdedequery->fetch_assoc()) {
                    $dedeget = array('YAKINLIK' => 'Dedesi', 'TC' => $rowdede["TC"], 'ADI' => $rowdede["ADI"], 'SOYADI' => $rowdede["SOYADI"], 'DOGUMTARIHI' => $rowdede["DOGUMTARIHI"], 'NUFUSIL' => $rowdede["NUFUSIL"], 'NUFUSILCE' => $rowdede["NUFUSILCE"], 'ANNEADI' => $rowdede["ANNEADI"], 'ANNETC' => $rowdede["ANNETC"], 'BABAADI' => $rowdede["BABAADI"],  'BABATC' => $rowdede["BABATC"],  'UYRUK' => $rowdede["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $dedeget);
                  }
              }
            }
          }
            if ($resultbabaquery->num_rows > 0) {
              while($rowbaba = $resultbabaquery->fetch_assoc()) {
                $babaget = array('YAKINLIK' => 'Babası', 'TC' => $rowbaba["TC"], 'ADI' => $rowbaba["ADI"], 'SOYADI' => $rowbaba["SOYADI"], 'DOGUMTARIHI' => $rowbaba["DOGUMTARIHI"], 'NUFUSIL' => $rowbaba["NUFUSIL"], 'NUFUSILCE' => $rowbaba["NUFUSILCE"], 'ANNEADI' => $rowbaba["ANNEADI"], 'ANNETC' => $rowbaba["ANNETC"], 'BABAADI' => $rowbaba["BABAADI"],  'BABATC' => $rowbaba["BABATC"],  'UYRUK' => $rowbaba["UYRUK"]);
                $idkardes += 1;
                array_push($arrall, $babaget);
                $anneannequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowbaba["ANNETC"] . "'";
                $dedequery = "SELECT * FROM `101m` WHERE `TC` LIKE '" . $rowbaba["BABATC"] . "'";
                $resultbabaannequery = $conn->query($anneannequery);
                $resultdedequery = $conn->query($dedequery);
                if ($resultbabaannequery->num_rows > 0) {
                  while($rowbabaanne = $resultbabaannequery->fetch_assoc()) {
                    $babaanneget = array('YAKINLIK' => 'BabaAnnesi', 'TC' => $rowbabaanne["TC"], 'ADI' => $rowbabaanne["ADI"], 'SOYADI' => $rowbabaanne["SOYADI"], 'DOGUMTARIHI' => $rowbabaanne["DOGUMTARIHI"], 'NUFUSIL' => $rowbabaanne["NUFUSIL"], 'NUFUSILCE' => $rowbabaanne["NUFUSILCE"], 'ANNEADI' => $rowbabaanne["ANNEADI"], 'ANNETC' => $rowbabaanne["ANNETC"], 'BABAADI' => $rowbabaanne["BABAADI"],  'BABATC' => $rowbabaanne["BABATC"],  'UYRUK' => $rowbabaanne["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $babaanneget);
                    $babakardesquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowbabaanne["TC"] . "' AND `TC` NOT LIKE '" . $rowbaba["TC"] . "'";
                    $resultbabakardesquery = $conn->query($babakardesquery);
                    if ($resultbabakardesquery->num_rows > 0) {
                      while ($rowbabakardes = $resultbabakardesquery->fetch_assoc()) {
                        $babakardesget = array('YAKINLIK' => 'Amca/Hala', 'TC' => $rowbabakardes["TC"], 'ADI' => $rowbabakardes["ADI"], 'SOYADI' => $rowbabakardes["SOYADI"], 'DOGUMTARIHI' => $rowbabakardes["DOGUMTARIHI"], 'NUFUSIL' => $rowbabakardes["NUFUSIL"], 'NUFUSILCE' => $rowbabakardes["NUFUSILCE"], 'ANNEADI' => $rowbabakardes["ANNEADI"], 'ANNETC' => $rowbabakardes["ANNETC"], 'BABAADI' => $rowbabakardes["BABAADI"],  'BABATC' => $rowbabakardes["BABATC"],  'UYRUK' => $rowbabakardes["UYRUK"]);
                        $idkardes += 1;
                        array_push($arrall, $babakardesget);
                        $babakuzenquery = "SELECT * FROM `101m` WHERE `ANNETC` LIKE '" . $rowbabakardes["TC"] . "' OR  `BABATC` LIKE '" . $rowbabakardes["TC"] . "'";
                        $resultbabakuzenquery = $conn->query($babakuzenquery);
                        if ($resultbabakuzenquery->num_rows > 0) {
                          while ($rowbabakuzen = $resultbabakuzenquery->fetch_assoc()) {
                            $babakuzenget = array('YAKINLIK' => 'Baba Tarafı Kuzen', 'TC' => $rowbabakuzen["TC"], 'ADI' => $rowbabakuzen["ADI"], 'SOYADI' => $rowbabakuzen["SOYADI"], 'DOGUMTARIHI' => $rowbabakuzen["DOGUMTARIHI"], 'NUFUSIL' => $rowbabakuzen["NUFUSIL"], 'NUFUSILCE' => $rowbabakuzen["NUFUSILCE"], 'ANNEADI' => $rowbabakuzen["ANNEADI"], 'ANNETC' => $rowbabakuzen["ANNETC"], 'BABAADI' => $rowbabakuzen["BABAADI"],  'BABATC' => $rowbabakuzen["BABATC"],  'UYRUK' => $rowbabakuzen["UYRUK"]);
                            $idkardes += 1;
                            array_push($arrall, $babakuzenget);
                          }
                      }
                      }
                    }
                  }
                }
                if ($resultdedequery->num_rows > 0) {
                  while($rowdede = $resultdedequery->fetch_assoc()) {
                    $dedeget = array('YAKINLIK' => 'Dedesi', 'TC' => $rowdede["TC"], 'ADI' => $rowdede["ADI"], 'SOYADI' => $rowdede["SOYADI"], 'DOGUMTARIHI' => $rowdede["DOGUMTARIHI"], 'NUFUSIL' => $rowdede["NUFUSIL"], 'NUFUSILCE' => $rowdede["NUFUSILCE"], 'ANNEADI' => $rowdede["ANNEADI"], 'ANNETC' => $rowdede["ANNETC"], 'BABAADI' => $rowdede["BABAADI"],  'BABATC' => $rowdede["BABATC"],  'UYRUK' => $rowdede["UYRUK"]);
                    $idkardes += 1;
                    array_push($arrall, $dedeget);
                  }
              }
            }
            }
          }
        } else {
          $arraserror = array('error' => 'sonuc bulunamadi.');
          echo json_encode($arraserror, JSON_UNESCAPED_UNICODE);
          die();
        }
      echo json_encode(array_values(array_unique($arrall, SORT_REGULAR)), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
      }
      if ($tc == '') {
        $arrgsmerror = array('error' => 'sonuc bulunamadi.');
        echo json_encode($arrgsmerror, JSON_UNESCAPED_UNICODE);
      }
  
$conn->close();
?>