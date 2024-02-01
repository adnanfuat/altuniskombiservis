<?
$kategori='Dokumanyasyon';
$title='Dokumanyasyon';
$uzaklik="../../";
$dosya_dizini=$uzaklik."rsmlr/dokumantasyon/";
$tablo_ismi='dokumantasyon';
$bir_sayfadaki_toplam_kayit_sayisi=50;
$max_file_size=5242880000;
switch ($link_inherit) 
	{ 
		case 'ekle_islem.php':$insert='1'; break;	
		case 'duzenle_islem.php':$insert='0'; break; 
	}
/*$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
$parse = parse_url($actual_link);
$link_adres=$parse['host']; */
?>