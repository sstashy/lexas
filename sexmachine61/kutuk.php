<?php 
header("Content-type: application/json; charset=utf-8");
require("ipkontrol.php");
error_reporting(0);

$auth_key = "DaimonCanimBenim";

if ($_GET['auth_key'] != $auth_key) {
      echo json_encode(array("success" => false, "message" => "Daimon Api Korumasi Siker Atar :D | Daimon#1337"));
      die();
}
    ini_set("display_errors", 0);
    
    ?>
            <?php
            $baglanti = new mysqli('localhost', 'root', '', '101m');
         
                $str = $_GET["tc"];
                $sth = $baglanti->prepare("SELECT * FROM `101m`");
            // Cok Elleme Yarram Veritabanini Seç
			$sql = "SELECT * FROM `101m` WHERE `TC` = '$str'";
            $baglanti->set_charset("utf8");
			$result = $baglanti->query($sql);
echo("[");
            // HzKenan
			while($row = $result->fetch_assoc()) {
                
                    echo json_encode(["ID"=>"1","Yakınlık" => "Kendisi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                  
                    

                $sqlcocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                $resultcocugu = $baglanti->query($sqlcocugu);

                $sqlkardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                $resultkardesi = $baglanti->query($sqlkardesi);
                $sqlbabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                $resultbabasi = $baglanti->query($sqlbabasi);
                $sqlanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                $resultanasi = $baglanti->query($sqlanasi);

                $sqlkendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                $resultkendicocugu = $baglanti->query($sqlkendicocugu);
                while($row = $resultkendicocugu->fetch_assoc()) {
                    echo(",");
                    echo json_encode(["ID"=>"2", "Yakınlık" => "Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                    
                     $sqlkendikendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resultkendikendicocugu = $baglanti->query($sqlkendikendicocugu);    
                    while($row = $resultkendikendicocugu->fetch_assoc()) {
                        echo(",");
                        echo json_encode(["ID"=>"3", "Yakınlık" => "Torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                        
                        $sqlkendikendikendicocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultkendikendikendicocugu = $baglanti->query($sqlkendikendikendicocugu);    
                        while($row = $resultkendikendikendicocugu->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"4", "Yakınlık" => "Torunun çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                           
                        }
                    }
                }
                while($row = $resultkardesi->fetch_assoc()) {
                    echo(",");
                    echo json_encode(["ID"=>"5", "Yakınlık" => "Kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                   
                    $sqlkardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                    $resultkardescocugu = $baglanti->query($sqlkardescocugu);
                    while($row = $resultkardescocugu->fetch_assoc()) {
                        echo(",");
                        echo json_encode(["ID"=>"6", "Yakınlık" => "Kardeşinin Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                       
                        $sqlkardeskardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultkardeskardescocugu = $baglanti->query($sqlkardeskardescocugu);    
                        while($row = $resultkardeskardescocugu->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"7", "Yakınlık" => "Kardeşinin Torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                           
                             $sqlkardeskardeskardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultkardeskardeskardescocugu = $baglanti->query($sqlkardeskardeskardescocugu);    
                            while($row = $resultkardeskardeskardescocugu->fetch_assoc()) {
                                echo(",");
                                echo json_encode(["ID"=>"8", "Yakınlık" => "Kardeşinin Torununun çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            }
                        }
                    }
    
                }
    # bak buralarda cok oynama hazir hersey
                while($row = $resultbabasi->fetch_assoc()) {
                    echo(",");
                echo json_encode(["ID"=>"9", "Yakınlık" => "Babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                   
                    $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                    $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                    $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                    $resultbabababasi = $baglanti->query($sqlbabababasi);
                    $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                    $resultbabaanasi = $baglanti->query($sqlbabaanasi);
    
                    while($row = $resultbabakardesi->fetch_assoc()) {
                        echo(",");
                       echo json_encode(["ID"=>"10", "Yakınlık" => "Babasının kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                       
                        $sqlbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                        $resultbabakardescocugu = $baglanti->query($sqlbabakardescocugu);
                        while($row = $resultbabakardescocugu->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"11", "Yakınlık" => "Babasının Kardeşinin çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                           
                             $sqlbabakardesbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            
                            $resultbabakardesbabakardescocugu = $baglanti->query($sqlbabakardesbabakardescocugu);    
                            while($row = $resultbabakardesbabakardescocugu->fetch_assoc()) {
                                echo(",");
                                echo json_encode(["ID"=>"12", "Yakınlık" => "Babasının kardeşinin torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                #buralarda hazir
                               $sqlbabakardesbabakardesbabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabakardesbabakardesbabakardescocugu = $baglanti->query($sqlbabakardesbabakardesbabakardescocugu);    
                                while($row = $resultbabakardesbabakardesbabakardescocugu->fetch_assoc()) {
                                    echo(",");
                                    echo json_encode(["ID"=>"13", "Yakınlık" => "Babasının Kardeşinin Torununun Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                        
                                }
                            }

                        }
                    }
            
                        while($row = $resultbabababasi->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"14", "Yakınlık" => "Babasının Babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                            
                           $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                            $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                            $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                            $resultbabababasi = $baglanti->query($sqlbabababasi);
                            $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                            $resultbabaanasi = $baglanti->query($sqlbabaanasi);
            
                            while($row = $resultbabakardesi->fetch_assoc()) {
                                echo(",");
                                   echo json_encode(["ID"=>"15", "Yakınlık" => "Babasının Babasının Kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                      
                                $sqlbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabababakardescocugu = $baglanti->query($sqlbabababakardescocugu);
                                while($row = $resultbabababakardescocugu->fetch_assoc()) {
                                    echo(",");
                                    echo json_encode(["ID"=>"16", "Yakınlık" => "Babasının Babasının Kardeşinin Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                       #ananin amina kadar cikar yani
                                    $sqlbabababakardesbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultbabababakardesbabababakardescocugu = $baglanti->query($sqlbabababakardesbabababakardescocugu);    
                                    while($row = $resultbabababakardesbabababakardescocugu->fetch_assoc()) {
                                        echo(",");
                                        echo json_encode(["ID"=>"17", "Yakınlık" => "Babasının Babasının Kardeşinin torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                           
                                        $sqlbabababakardesbabababakardesbabababakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultbabababakardesbabababakardesbabababakardescocugu = $baglanti->query($sqlbabababakardesbabababakardesbabababakardescocugu);    
                                        while($row = $resultbabababakardesbabababakardesbabababakardescocugu->fetch_assoc()) {
                                            echo(",");
                                            echo json_encode(["ID"=>"18", "Yakınlık" => "Babasının Babasının Kardeşinin Torununun Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                                
                                               
                                        }
                                    }
                                }
                            }
                
                            while($row = $resultbabababasi->fetch_assoc()) {

                                echo(",");
                                echo json_encode(["ID"=>"19", "Yakınlık" => "Babasının Babasının Babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                #sen hele burayi gör
                            }
                            while($row = $resultbabaanasi->fetch_assoc()) {
    
                                echo(",");
                                echo json_encode(["ID"=>"20", "Yakınlık" => "Babasının Babasının Annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                
                            }

                        }
                        while($row = $resultbabaanasi->fetch_assoc()) {
                            
                            echo(","); 
                            echo json_encode(["ID"=>"21", "Yakınlık" => "Babasının Annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                            $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                            $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                            $resultbabababasi = $baglanti->query($sqlbabababasi);
                            $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                            $resultbabaanasi = $baglanti->query($sqlbabaanasi);
            
                            while($row = $resultbabakardesi->fetch_assoc()) {
               
                                echo(","); 
                                echo json_encode(["ID"=>"22", "Yakınlık" => "Babasının Annesinin Kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                $sqlbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultbabaannekardescocugu = $baglanti->query($sqlbabaannekardescocugu);
                                while($row = $resultbabaannekardescocugu->fetch_assoc()) {
         
                                    echo(","); 
                                    echo json_encode(["ID"=>"23", "Yakınlık" => "Babasının Annesinin Kardeşinin Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                       
                                    $sqlbabaannekardesbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultbabaannekardesbabaannekardescocugu = $baglanti->query($sqlbabaannekardesbabaannekardescocugu);    
                                    while($row = $resultbabaannekardesbabaannekardescocugu->fetch_assoc()) {

                                        echo(",");
                                        echo json_encode(["ID"=>"24", "Yakınlık" => "Babasının Annesinin Kardeşinin Torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                           
                                        $sqlbabaannekardesbabaannekardesbabaannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultbabaannekardesbabaannekardesbabaannekardescocugu = $baglanti->query($sqlbabaannekardesbabaannekardesbabaannekardescocugu);    
                                        while($row = $resultbabaannekardesbabaannekardesbabaannekardescocugu->fetch_assoc()) {
   
                                            echo(",");
                                            echo json_encode(["ID"=>"25", "Yakınlık" => "Babasının Annesinin Kardeşinin Torununun Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                               
                                            
                                        }
                                    }
                                }

                            }
                
                            while($row = $resultbabababasi->fetch_assoc()) {

                                echo(","); 
                                echo json_encode(["ID"=>"26", "Yakınlık" => "Babasının Annesinin Babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                
                            }
                            while($row = $resultbabaanasi->fetch_assoc()) {
     
                                echo(",");
                                echo json_encode(["ID"=>"27", "Yakınlık" => "Babasının Annesinin Annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                
                            }
    
                        }
                    }
                }
                while($row = $resultanasi->fetch_assoc()) {
                    echo(",");
                    echo json_encode(["ID"=>"28", "Yakınlık" => "Annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                   
                    $sqlannekardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                    $resultannekardesi = $baglanti->query($sqlannekardesi);
                    $sqlannebabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                    $resultannebabasi = $baglanti->query($sqlannebabasi);
                    $sqlanneanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                    $resultanneanasi = $baglanti->query($sqlanneanasi);
    
                    while($row = $resultannekardesi->fetch_assoc()) {
                        echo(",");
                        echo json_encode(["ID"=>"29", "Yakınlık" => "Annesinin Kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                       
                        $sqlannekardescocugu = "SELECT * FROM `101m` WHERE `BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ";
                        $resultannekardescocugu = $baglanti->query($sqlannekardescocugu);
                        while($row = $resultannekardescocugu->fetch_assoc()) {
   
                            echo(","); 
                            echo json_encode(["ID"=>"30", "Yakınlık" => "Annesinin Kardeşinin Çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            $sqlannekardesannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultannekardesannekardescocugu = $baglanti->query($sqlannekardesannekardescocugu);    
                            while($row = $resultannekardesannekardescocugu->fetch_assoc()) {
               
                                echo(",");
                                echo json_encode(["ID"=>"31", "Yakınlık" => "Annesinin Kardeşinin Torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                $sqlannekardesannekardesannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultannekardesannekardesannekardescocugu = $baglanti->query($sqlannekardesannekardesannekardescocugu);    
                                while($row = $resultannekardesannekardesannekardescocugu->fetch_assoc()) {
           
                                    echo(",");
                                   echo json_encode(["ID"=>"32", "Yakınlık" => "Annesinin kardeşinin torunun çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                       
                                    
                                }
                            }

                        }
                    }
        
                    while($row = $resultannebabasi->fetch_assoc()) {
                        echo(",");
                        echo json_encode(["ID"=>"33", "Yakınlık" => "Annesinin Babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                       
                        $sqlbabakardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                        $resultbabakardesi = $baglanti->query($sqlbabakardesi);
                        $sqlbabababasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                        $resultbabababasi = $baglanti->query($sqlbabababasi);
                        $sqlbabaanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                        $resultbabaanasi = $baglanti->query($sqlbabaanasi);
        
                        while($row = $resultbabakardesi->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"34", "Yakınlık" => "Annesinin babasının kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                           
                            $sqlannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultannebabakardescocugu = $baglanti->query($sqlannebabakardescocugu);
                            while($row = $resultannebabakardescocugu->fetch_assoc()) {
                   
                                echo(",");
                                echo json_encode(["ID"=>"35", "Yakınlık" => "Annesinin babasının kardeşinin çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                $sqlannebabakardesannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultannebabakardesannebabakardescocugu = $baglanti->query($sqlannebabakardesannebabakardescocugu);    
                                while($row = $resultannebabakardesannebabakardescocugu->fetch_assoc()) {
             
                                    echo(",");
                                    echo json_encode(["ID"=>"36", "Yakınlık" => "Annesinin babasının kardeşinin torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                       
                                    $sqlannebabakardesannebabakardesannebabakardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultannebabakardesannebabakardesannebabakardescocugu = $baglanti->query($sqlannebabakardesannebabakardesannebabakardescocugu);    
                                    while($row = $resultannebabakardesannebabakardesannebabakardescocugu->fetch_assoc()) {
                            
                                        echo(",");
                                        echo json_encode(["ID"=>"37", "Yakınlık" => "Annesinin babasının kardeşinin torununun çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                           
                                        
                                    }
                                }

                            }
                        }
            
                        while($row = $resultbabababasi->fetch_assoc()) {
                   
                            echo(",");
                            echo json_encode(["ID"=>"38", "Yakınlık" => "Annesinin babasının babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            
                        }
                        while($row = $resultbabaanasi->fetch_assoc()) {
                     
                            echo(",");
                            echo json_encode(["ID"=>"39", "Yakınlık" => "Annesinin babasının annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            
                        }
                    }
                    while($row = $resultanneanasi->fetch_assoc()) {
                    
                        echo(",");
                        echo json_encode(["ID"=>"40", "Yakınlık" => "Annesinin annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                           
                        $sqlannekardesi = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["BABATC"] ."' OR `ANNETC` = '" . $row["ANNETC"] ."' ) ";
                        $resultannekardesi = $baglanti->query($sqlannekardesi);
                        $sqlannebabasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["BABATC"] ."' ";
                        $resultannebabasi = $baglanti->query($sqlannebabasi);
                        $sqlanneanasi = "SELECT * FROM `101m` WHERE `TC` = '" . $row["ANNETC"] ."' ";
                        $resultanneanasi = $baglanti->query($sqlanneanasi);
        
                        while($row = $resultannekardesi->fetch_assoc()) {
    
                            echo(",");  
                            echo json_encode(["ID"=>"41", "Yakınlık" => "Annesinin Annesinin Kardeşi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            $sqlanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                            $resultanneannekardescocugu = $baglanti->query($sqlanneannekardescocugu);
                            while($row = $resultanneannekardescocugu->fetch_assoc()) {
                          
                                echo(","); 
                                echo json_encode(["ID"=>"42", "Yakınlık" => "Annesinin annesinin kardeşinin çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                   
                                $sqlanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                $resultanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardescocugu);    
                                while($row = $resultanneannekardesanneannekardescocugu->fetch_assoc()) {
                               
                                    echo(","); 
                                    echo json_encode(["ID"=>"43", "Yakınlık" => "Annesinin annesinin kardeşinin torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                       
                                    $sqlanneannekardesanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                    $resultanneannekardesanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardesanneannekardescocugu);    
                                    while($row = $resultanneannekardesanneannekardesanneannekardescocugu->fetch_assoc()) {
                           
                                        echo(",");
                                        echo json_encode(["ID"=>"44", "Yakınlık" => "Annesinin annesinin kardeşinin torununun çocuğu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                           
                                        $sqlanneannekardesanneannekardesanneannekardesanneannekardescocugu = "SELECT * FROM `101m` WHERE NOT `TC` = '". $row["TC"] ."'  AND (`BABATC` = '" . $row["TC"] ."' OR `ANNETC` = '" . $row["TC"] ."' ) ";
                                        $resultanneannekardesanneannekardesanneannekardesanneannekardescocugu = $baglanti->query($sqlanneannekardesanneannekardesanneannekardesanneannekardescocugu);    
                                        while($row = $resultanneannekardesanneannekardesanneannekardesanneannekardescocugu->fetch_assoc()) {
                                   
                                            echo(",");
                                            echo json_encode(["ID"=>"45", "Yakınlık" => "Annesinin annesinin kardeşinin torununun torunu", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                                               
                                                
                                    }

                                }
                            }

                        }
            
                        while($row = $resultannebabasi->fetch_assoc()) {
                    
                            echo(",");
                            echo json_encode(["ID"=>"46", "Yakınlık" => "Annesinin Annesinin babası", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                               
                            
                        }
                        while($row = $resultanneanasi->fetch_assoc()) {
                            echo(",");
                            echo json_encode(["ID"=>"46", "Yakınlık" => "Annesinin Annesinin annesi", "TcKm" => $row["TC"], "Adı" => $row["ADI"], "Soyadı" => $row["SOYADI"], "DoğumGünü" => $row["DOGUMTARIHI"], "Nufüsil" => $row["NUFUSIL"],  "Nufüsilçe" => $row["NUFUSILCE"]], JSON_UNESCAPED_UNICODE);
                        }
                        }
                    }
    
                }
            
               
                echo("]");
            ?>




