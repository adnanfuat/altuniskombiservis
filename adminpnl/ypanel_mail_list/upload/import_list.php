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
				echo "<span class='veri_baslik'><strong>Borç tablosundaki eski veriler siliniyor!</strong></span>"."<br><br><br><br><br>"; 
				$tum_verileri_sil=@$baglanti->query("Delete from borc_listesi");
				
				$html="<table border='0' cellpadding='0' cellspacing='0' width='100%' class='table_border2'>";
				$objPHPExcel=PHPExcel_IOFactory::load($dosya_dizini.$dosya);
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
					{
						$highestRow=$worksheet->getHighestRow();
						for ($row=2; $row<=$highestRow; $row++)
							{
								$html.="<tr class='veri_baslik'>";
								$ogrenci_adi=$baglanti->quote($worksheet->getCellByColumnAndRow(1,$row)->getValue(),$baglanti);
								$ogrenci_soyadi=$baglanti->quote($worksheet->getCellByColumnAndRow(2,$row)->getValue(),$baglanti);
								$ogrenci_tckimlik=$baglanti->quote($worksheet->getCellByColumnAndRow(3,$row)->getValue(),$baglanti);
								$ogrenci_sinif=$baglanti->quote($worksheet->getCellByColumnAndRow(4,$row)->getValue(),$baglanti);
								$ogrenci_sube=$baglanti->quote($worksheet->getCellByColumnAndRow(5,$row)->getValue(),$baglanti);
								$veli_tckimlik=$baglanti->quote($worksheet->getCellByColumnAndRow(6,$row)->getValue(),$baglanti);
								$veli_adisoyadi=$baglanti->quote($worksheet->getCellByColumnAndRow(7,$row)->getValue(),$baglanti);
								$borc_turu_numara=$baglanti->quote($worksheet->getCellByColumnAndRow(8,$row)->getValue(),$baglanti);
								$borc_turu_ad=$baglanti->quote($worksheet->getCellByColumnAndRow(9,$row)->getValue(),$baglanti);
								$borc_tutari=$baglanti->quote($worksheet->getCellByColumnAndRow(10,$row)->getValue(),$baglanti);
								//echo "x: ".$borc_tutari."<br>";
								//$borc_tutari=str_replace(",",".",$borc_tutari);
								
								//echo "y: ".$borc_tutari."<br>";
								
								$insert_sql="Insert into borc_listesi (ogrenci_adi, ogrenci_soyadi, ogrenci_tckimlik, ogrenci_sinif, ogrenci_sube, veli_adi_soyadi, veli_tckimlik, borc_turu, borc_turu_kategori_numara, yuklenme_tarihi, borc_miktari) Values ('$ogrenci_adi', '$ogrenci_soyadi', '$ogrenci_tckimlik', '$ogrenci_sinif', '$ogrenci_sube', '$veli_adisoyadi', '$veli_tckimlik', '$borc_turu_ad', '$borc_turu_numara', '$yuklenme_tarihi', '$borc_tutari')";
								//echo $insert_sql;
								@$baglanti->query($insert_sql)->fetchAll(PDO::FETCH_ASSOC);
								$html.="<td class='table_border1' ><strong>".$ogrenci_adi."</strong></td>";
								$html.="<td class='table_border1'><strong>".$ogrenci_soyadi."</strong></td>";
								$html.="<td class='table_border1'>".$ogrenci_tckimlik."</td>";
								$html.="<td class='table_border1'>".$ogrenci_sinif."</td>";
								$html.="<td class='table_border1'>".$ogrenci_sube."</td>";
								$html.="<td class='table_border1'>".$veli_tckimlik."</td>";
								$html.="<td class='table_border1'>".$veli_adisoyadi."</td>";
								$html.="<td class='table_border1'>".$borc_turu_numara."</td>";
								$html.="<td class='table_border1'><strong>".$borc_turu_ad."</strong></td>";
								$html.="<td class='table_border1'><strong>".$borc_tutari."</strong></td>";
								$html.="</tr>";
								
							}
					
					}
				$html.="</table>";
				echo $html."<br><br><br><br><br>";
				echo "Dosya başarı ile veritabanına aktarıldı"; 
				$update=@$baglanti->query("Update $tablo_ismi set yuklenme_tarihi='$yuklenme_tarihi' where numara='$yuklenecek_dosya_numara'");
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