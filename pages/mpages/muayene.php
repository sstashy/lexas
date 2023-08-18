<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">MUAYENE Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/illegalekip">SiberSube</a></li>
                        <li class="breadcrumb-item active">MUAYENE Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
<!--<div class="page-content">-->
<!--BAŞLANGIC-->
<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-4" style="color: white !important;">
    MUAYENE SORGU
</h4>
                    <p class="mb-1">
                    <p>
                        Aşı durumunu öğrenmek istediğiniz kişinin TC kimlik numarasını giriniz.</br>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="11" class="form-control" type="text" name="tc" id="tcno" placeholder="TC"><br>
                            
                            </div>
                            <div class="col-xl-6">
                                <div class="mt-0">

                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn w-sm btn-primary waves-effect waves-light" style="float:left;"> Sorgula <span id="sorgulanumber"></span></button>
      </td>
      <td>&nbsp;&nbsp;</td>
      <td>
        <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-light waves-effect"> Temizle </button>

                        </div>
                            </div>
                        </div>
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
    <div class="row">
        <div class="col-lg-12">
<div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sonuç:</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal"class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
<th>KatilimUcreti</th>
<th>ReceteNo</th>
<th>TahsisEdildiMi</th>
<th>TakipNo</th>
<th>TesisAdi</th>

</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									                    <?php
if ($_POST) {
    $tc = $_POST['tc'];
    $asiapiurl = "http://api.stalche.xyz/apiler/muayene.php?auth=qwewqe23&tc=" . $tc;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $asiapiurl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $people_json = curl_exec($ch);

    if ($people_json === false) {
        echo "Curl error: " . curl_error($ch);
    } else {
        $decoded_json = json_decode($people_json, true);
        if ($decoded_json === null) {
            echo "JSON decode error: " . json_last_error_msg();
        } else if (!isset($decoded_json['muayene'])) {
echo "<p style='font-weight:bold; color:red;'>Bu Kişiye Ait Aşı Bilgisi Bulunamadı</p>";
        } else {
            $customers = $decoded_json['muayene'];
            foreach ($customers as $customer) {
							$KatilimUcreti = $customer['KatilimUcreti'];
							$ReceteNo = $customer['ReceteNo'];
							$TahsisEdildiMi = $customer['TahsisEdildiMi'];
							$TakipNo = $customer['TakipNo'];
							$TakipTarihi = $customer['TakipTarihi'];
							$TesisAdi = $customer['TesisAdi'];
							
							echo "<tr style='color:white;'> <th>".$KatilimUcreti."</th><th>".$ReceteNo."</th><th>".$TahsisEdildiMi."</th><th>".$TakipNo."</th><th>".$TakipTarihi."</th><th>".$TesisAdi."</th></tr>";
            }
        }
    }
    curl_close($ch);
}
?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

