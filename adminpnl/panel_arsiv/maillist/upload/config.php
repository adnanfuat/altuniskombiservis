<?
$kategori='Dosyalar';
$title='Dosya';
$uzaklik="../../";
$dosya_dizini=$uzaklik."upfiles/";
$tablo_ismi='upload';
$bir_sayfadaki_toplam_kayit_sayisi=100;
$max_file_size=10485760;
switch ($link_inherit) 
	{ 
		case 'ekle_islem.php':$insert='1'; break;	
		case 'duzenle_islem.php':$insert='0'; break; 
	}
?>