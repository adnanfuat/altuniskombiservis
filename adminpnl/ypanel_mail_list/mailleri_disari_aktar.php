<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
set_time_limit(600);
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		include("upload/PHPExcel/IOFactory.php");
		$yuklenme_tarihi=date("Y_m_d_H_i_s");
		$dosya_adi=$yuklenme_tarihi."_Mailler.xls";
		//$yuklenecek_dosya_numara=intval($_GET["id"]);
// Create your database query
$query = "SELECT eposta,numara FROM maillist where aktif=1 order by eklenme_tarihi desc";  

// Execute the database query
try{ $recordset = @$baglanti->query($query)->fetchAll(PDO::FETCH_ASSOC); } catch(PDOException $e){ print $e->getMessage(); }// Instantiate a new PHPExcel object 
$kayit_sayisi=count($recordset);
$objPHPExcel = new PHPExcel();  
// Set the active Excel worksheet to sheet 0 
$objPHPExcel->setActiveSheetIndex(0);  
// Initialise the Excel row number 
$rowCount = 1;  

//start of printing column names as names of MySQL fields  
$column = 'A';
/*for ($i = 1; $i < mysql_num_fields($recordset); $i++)  
{
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, mysql_field_name($recordset,$i));
    $column++;
}*/
//$objPHPExcel->getActiveSheet()->setCellValue('A1', "Eposta");
/*$objPHPExcel->getActiveSheet()->setCellValue('B1', "Ödeme Tarihi");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Ödeme Miktarı");
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Ödeme Türü");
$objPHPExcel->getActiveSheet()->setCellValue('E1', "Ödeme Durumu");
$objPHPExcel->getActiveSheet()->setCellValue('F1', "Ödeme Bilgileri");
$objPHPExcel->getActiveSheet()->setCellValue('G1', "Ödeme Kategorileri");*/

//end of adding column names  

//start while loop to get data  
$rowCount = 1;  
//rowCount = 2; 
/*while($row = mysql_fetch_row($recordset))  
{  
    $column = 'A';
    for($j=1; $j<mysql_num_fields($recordset);$j++)  
    {  
        if(!isset($row[$j]))  
            $value = NULL;  
        elseif ($row[$j] != "")  
            $value = strip_tags($row[$j]);  
        else  
            $value = "";  

        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
        $column++;
    }  
    $rowCount++;
} */
for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
	{
		$rowCount=$sayac+1; 
		//$rowCount=$sayac+2; 

		$numara=$recordset[$sayac]["numara"];
		$eposta=$recordset[$sayac]["eposta"];
		/*$odeme_tarihi=$recordset[$sayac]["odeme_tarihi"];
		
		$ref_no=$recordset[$sayac]["ref_no"];
		$odeme_turu=$recordset[$sayac]["odeme_turu"];
		$banka_hesap=$recordset[$sayac]["banka_hesap"];
		$odeme_aciklama=$recordset[$sayac]["odeme_aciklama"];
		
		$diger_bilgiler=$recordset[$sayac]["diger_bilgiler"];
		$odeme_turu=$recordset[$sayac]["odeme_turu"];
		if  ($odeme_turu=="bt") { $odeme_turu_ad="Havale"; }
		if  ($odeme_turu=="kk") { $odeme_turu_ad="Kredi Kartı"; }
		if  ($odeme_turu=="mo") { $odeme_turu_ad="Mail Order"; }
		if  ($odeme_turu=="payu") { $odeme_turu_ad="Payu"; }
		if  ($odeme_turu=="paytr") { $odeme_turu_ad="Paytr"; }
		if  ($odeme_turu=="paratika") { $odeme_turu_ad="Paratika"; }
		if  ($odeme_turu=="wirecard") { $odeme_turu_ad="Wirecard"; }
		if  ($odeme_turu=="turkpos") { $odeme_turu_ad="Turkpos"; }
		if  ($odeme_turu=="turkpos2") { $odeme_turu_ad="Turkpos"; }
		
		$durumu=$recordset[$sayac]["durumu"];
		$siparis_durumu_ogren=@$baglanti->query("Select ad from odeme_durumu where numara='$durumu'")->fetchAll(PDO::FETCH_ASSOC);
		$siparis_durumu_ad=$siparis_durumu_ogren[0]["ad"];
		
		$banka_hesap=$recordset[$sayac]["banka_hesap"];
		if  ($odeme_turu=="bt") 
			{
				$hesap_ogren=@$baglanti->query("Select banka,hesap_no,sube_kodu from banka_hesaplari where numara='$banka_hesap'")->fetchAll(PDO::FETCH_ASSOC);
				$hesap_banka=$banka_hesaplari[$sayac]["banka"];
				$banka_ad_ogren=@$baglanti->query("Select ad from banka where numara='$hesap_banka'")->fetchAll(PDO::FETCH_ASSOC);
				$banka_ad=$banka_ad_ogren[0]["ad"];
				$hesap_no=$banka_hesaplari[$sayac]["hesap_no"];
				$sube_kodu=$banka_hesaplari[$sayac]["sube_kodu"];
				$hesap_tanim=$banka_ad;
				if  (strlen($sube_kodu)>0)
					{
						$hesap_tanim=$hesap_tanim." Şube Kodu: ".$sube_kodu;
					}
				if  (strlen($hesap_no)>0)
					{
						$hesap_tanim=$hesap_tanim." Hesap No: ".$hesap_no;
					}
			}

		if  ($odeme_turu=="kk" || $odeme_turu=="mo")
			{
				$kredi_karti=$recordset[$sayac]["kredi_karti"];
				if  ($kredi_karti==0)
					{
						$kredi_karti_ad="Diğer Kartlar"; 
					}
				else
					{
						$kredi_karti_ad_ogren=@$baglanti->query("Select ad from pos_hesaplari where numara='$kredi_karti'")->fetchAll(PDO::FETCH_ASSOC);
						//echo "Select ad from pos_hesaplari where numara='$kredi_karti'";
						$kredi_karti_ad=$kredi_karti_ad_ogren[0]["ad"];
					}
			}
		if  ($odeme_turu=="kk" || $odeme_turu=="mo")
			{
				$kredi_karti_taksit=$recordset[$sayac]["kredi_karti_taksit"];
				if  ($kredi_karti_taksit>1)
					{
						$kredi_karti_ek_aciklama="/ $kredi_karti_taksit Taksit";
					}
				else
					{
						$kredi_karti_ek_aciklama="/ Tek Ödeme";
					}
			}
		$komisyon=$recordset[$sayac]["komisyon"];
		$tutar=$recordset[$sayac]["tutar"];
		$tutar2=$komisyon+$tutar;
		$kargo_ucreti=$recordset[$sayac]["kargo_ucreti"];
		$havale_ara_toplam=$recordset[$sayac]["havale_ara_toplam"];
		$havale_kdv_toplam=$recordset[$sayac]["havale_kdv_toplam"];
		if  ($odeme_turu=="bt")
			{
				$genel_toplam=$havale_ara_toplam+$kargo_ucreti+$havale_kdv_toplam;
			}
		else
			{
				$genel_toplam=$ara_toplam+$kargo_ucreti+$kdv_toplam;
			}
			
		if  (($odeme_turu=="kk" || $odeme_turu=="mo"))
			{
				if  ($kredi_karti_komisyon>0)
					{
						$komisyon_dahil_toplam=($ara_toplam+$kargo_ucreti+$kdv_toplam)*(100+$kredi_karti_komisyon)/100;
					}
				else
					{
						$komisyon_dahil_toplam=$ara_toplam+$kargo_ucreti+$kdv_toplam;
					}
			}
		$odeme_son_aciklama=$recordset[$sayac]["odeme_son_aciklama"];
		
		$odeme_kategori_adlari="";
		$odeme_kategori=$recordset[$sayac]["odeme_kategori"];
		$odeme_kategorileri=explode(",",$odeme_kategori);
		$odeme_kategorileri_sayi=count($odeme_kategorileri);
		for ($isayac=0; $isayac<$odeme_kategorileri_sayi; $isayac++)
			{
				$odeme_kategori_ogren=@$baglanti->query("Select ad from odeme_altkategorileri where numara='".$odeme_kategorileri[$isayac]."'")->fetchAll(PDO::FETCH_ASSOC);
				$odeme_kategori_ad=$odeme_kategori_ogren[0]["ad"];
				$odeme_kategori_adlari=$odeme_kategori_adlari.$odeme_kategori_ad;
				if  ($isayac<$odeme_kategorileri_sayi-1)
					{
						$odeme_kategori_adlari=$odeme_kategori_adlari.", ";
					}
			}
		for ($isayac=1; $isayac<=15; $isayac++)
			{
				$etiket{$isayac}=$recordset[$sayac]["etiket".$isayac];
				$deger{$isayac}=$recordset[$sayac]["deger".$isayac];
				$etiket{$isayac."_numara"}=$recordset[$sayac]["etiket".$isayac."_numara"];
			}
			
		  $odeme_bilgileri="";
		  for ($isayac=1; $isayac<=15; $isayac++)
			  {
		  		if (strlen($etiket{$isayac})>0) {   $odeme_bilgileri.=$etiket{$isayac}.": "; $odeme_bilgileri.=$deger{$isayac}; if ($isayac<15) { $odeme_bilgileri.=", "; }  }
			  }
		  if (strlen($odeme_aciklama)>0) { $odeme_bilgileri.=", Açıklama: ".$odeme_aciklama; }	
		  
		  if (strlen($odeme_son_aciklama)>0) {  $odeme_kategori_adlari.=" Son Açıklama: ".$odeme_son_aciklama; }	
		  $odeme_turu_aciklama=$odeme_turu_ad; 
		  if ($odeme_turu=="bt") {  $odeme_turu_aciklama.=" ".$hesap_tanim;  } else if  ($odeme_turu=="kk" || $odeme_turu=="mo"){  $odeme_turu_aciklama.=" ".$kredi_karti_ad;  $odeme_turu_aciklama.=" ".$kredi_karti_ek_aciklama;  } 	*/
			

	   //$objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $numara);
	   $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $eposta);
	   /*$objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount, $odeme_tarihi);
	   $objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, number_format($tutar2,2,",",""));
	   $objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $odeme_turu_aciklama);
	   $objPHPExcel->getActiveSheet()->setCellValue('e'.$rowCount, $siparis_durumu_ad);
	   $objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $odeme_bilgileri);
	   $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $odeme_kategori_adlari);*/
	}


// Redirect output to a client’s web browser (Excel5) 
header('Content-Type: application/vnd.ms-excel'); 
header('Content-Disposition: attachment;filename="'.$dosya_adi.'"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
$objWriter->save('php://output');
?>
<? 
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>