<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
set_time_limit(600);
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		include("PHPExcel/IOFactory.php");
		$yuklenme_tarihi=date("Y-m-d H:i:s");
		$yuklenecek_dosya_numara=intval($_GET["id"]);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">body {	background-color:#EFEFEF; margin-left:0px;	margin-top:0px;	margin-right:0px;	margin-bottom:0px;} .style3 {color: #132C6A;font-weight: bold;}
.table_border1 { border:1px solid #999999; padding:10px; font-family:Arial, Helvetica, sans-serif; font-size:12px; } 
.table_border2 { border:1px solid #999999;  }
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr> 
    <td class="td_anabaslik" style="padding-left:10px;"><? /*<a href="../anaframe.php" class="td_anabaslik_link" >Kontrol Panel</a> &gt; <a href="kontrol.php"  class="td_anabaslik_link">Bankalar</a> &gt;*/?><? include("../inc_s/inc_diger_menu.php"); ?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
  <tr>
  <td> 
<?
$dosya_adi_ogren=@$baglanti->query("Select dosya from $tablo_ismi where numara='$yuklenecek_dosya_numara'")->fetchAll(PDO::FETCH_ASSOC);
if  (count($dosya_adi_ogren)>0)
	{
		$dosya=$dosya_adi_ogren[0]["dosya"];
		//echo $dosya;
		if  (file_exists($dosya_dizini.$dosya) && $dosya_dizini.$dosya<>$dosya_dizini)
			{
				//echo "Borç tablosundaki eski veriler siliniyor"."<br><br><br><br><br>"; 
				//$tum_verileri_sil=@$baglanti->query("Delete from borc_listesi");
				
				$eklenme_tarihi=date("Y-m-d H:i:s");
				$html="<table  border='0' cellpadding='0' cellspacing='0' width='100%' class='table_border2'>";
				$html.="<tr class='veri_baslik'>";
				$html.="<td class='table_border1'><strong> Eklenme Tarihi </strong></td>";
				$html.="<td class='table_border1'><strong> Öğrenci Adı </strong></td>";
				$html.="<td class='table_border1'><strong> Öğrenci Soyadı </strong></td>";
				$html.="<td class='table_border1'><strong> Öğrenci TC Kimlik </strong></td>";
				$html.="<td class='table_border1'><strong> Şifre </strong></td>";
				$html.="<td class='table_border1'><strong> Baba Adı Soyadı </strong></td>";
				$html.="<td class='table_border1'><strong> Baba GSM </strong></td>";
				$html.="</tr>";
				
				$objPHPExcel=PHPExcel_IOFactory::load($dosya_dizini.$dosya);
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
					{
						$highestRow=$worksheet->getHighestRow();
						for ($row=2; $row<=$highestRow; $row++)
							{
								$ogrenci_adi=$baglanti->quote($worksheet->getCellByColumnAndRow(1,$row)->getValue(),$baglanti);
								$ogrenci_soyadi=$baglanti->quote($worksheet->getCellByColumnAndRow(2,$row)->getValue(),$baglanti);
								$ogrenci_tckimlik=$baglanti->quote($worksheet->getCellByColumnAndRow(3,$row)->getValue(),$baglanti);
								$baba_adi_soyadi=$baglanti->quote($worksheet->getCellByColumnAndRow(4,$row)->getValue(),$baglanti);
								$baba_gsm=$baglanti->quote($worksheet->getCellByColumnAndRow(5,$row)->getValue(),$baglanti);
								//echo "x: ".$borc_tutari."<br>";
								//$borc_tutari=str_replace(",",".",$borc_tutari);
								
								//echo "y: ".$borc_tutari."<br>";
								$bu_tckimlik_kayitlimi=@$baglanti->query("Select * from uyeler where tckimlik='$ogrenci_tckimlik'")->fetchAll(PDO::FETCH_ASSOC);
								if  (count($bu_tckimlik_kayitlimi)==0) // Bu TC kimlik sisteme kayıtlı degil ise kayıt edilecek (s)
									{
										$tckimlik_md5=md5($ogrenci_tckimlik);
										$sifre_baslangic=rand(0,12);
										$sifre_uzunluk=rand(12,15);
										$sifre_degeri=substr($tckimlik_md5,$sifre_baslangic,$sifre_uzunluk);
										//$adres="Baba Adı Soyadı: ".$baba_adi_soyadi."<br>"."Baba GSM: ".$baba_gsm;
								
										$insert_sql="Insert into uyeler (ad, soyad, tckimlik, faks, telefon, eklenme_tarihi, sifre, aktif) Values ('$ogrenci_adi', '$ogrenci_soyadi', '$ogrenci_tckimlik', '$baba_adi_soyadi', '$baba_gsm', '$eklenme_tarihi', '$sifre_degeri', '1')";
										//echo $insert_sql;
										@$baglanti->query($insert_sql)->fetchAll(PDO::FETCH_ASSOC);
										
										$html.="<tr class='veri_baslik'>";
										$html.="<td class='table_border1'> ".$eklenme_tarihi." </td>";
										$html.="<td class='table_border1'> ".$ogrenci_adi." </td>";
										$html.="<td class='table_border1'> ".$ogrenci_soyadi." </td>";
										$html.="<td class='table_border1'> ".$ogrenci_tckimlik." </td>";
										$html.="<td class='table_border1'> ".$sifre_degeri." </td>";
										$html.="<td class='table_border1'> ".$baba_adi_soyadi." </td>";
										$html.="<td class='table_border1'> ".$baba_gsm." </td>";
										$html.="</tr>";
									}
								else
									{

										$ogrenci_adi=$bu_tckimlik_kayitlimi[0]["ad"];
										$eklenme_tarihi=$bu_tckimlik_kayitlimi[0]["eklenme_tarihi"];
										$ogrenci_soyadi=$bu_tckimlik_kayitlimi[0]["soyad"];
										$ogrenci_tckimlik=$bu_tckimlik_kayitlimi[0]["tckimlik"];
										$ogrenci_sifre=$bu_tckimlik_kayitlimi[0]["sifre"];
										$baba_adi_soyadi=$bu_tckimlik_kayitlimi[0]["faks"];
										$baba_gsm=$bu_tckimlik_kayitlimi[0]["telefon"];
									
										
										$html.="<tr class='veri_baslik'>";
										$html.="<td class='table_border1'> ".$eklenme_tarihi." </td>";
										$html.="<td class='table_border1' > ".$ogrenci_adi." </td>";
										$html.="<td class='table_border1'> ".$ogrenci_soyadi." </td>";
										$html.="<td class='table_border1' > ".$ogrenci_tckimlik." </td>";
										$html.="<td class='table_border1'> ".$ogrenci_sifre." </td>";
										$html.="<td class='table_border1'> ".$baba_adi_soyadi." </td>";
										$html.="<td class='table_border1'> ".$baba_gsm." </td>";
										$html.="</tr>";
									}
								
							}
					
					}
				$html.="</table>";
				echo $html."<br><br><br>";
				echo "<span class='veri_baslik'><strong>Dosya başarı ile veritabanına aktarıldı</span></strong>"; 
				$update=@$baglanti->query("Update $tablo_ismi set yuklenme_tarihi='$eklenme_tarihi' where numara='$yuklenecek_dosya_numara'");
?>


<? 
			}
		else
			{
?>
				<? echo "Sistemde $dosya isimli dosya bulunamadı"; ?>
<? 
			}
?>
<?			
	}
else
	{
?>
<? echo "Bu kritere uygun kayıt bulunamadı"; ?>
<? 
	}
?>
</td>
</tr>
</table>
</body>
</html>
<? 
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>