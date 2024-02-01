<?
$kategori='Etkinlik Detay';
$title='Etkinlik Detay';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/etkinlik_detay/";
$ustkategori_resim_dizini=$uzaklik."rsmlr/etkinlikler/";
$thumb_resim_dizini=$uzaklik."rsmlr/etkinlik_thumb/";
$kategori_thumb_resim_dizini=$uzaklik."rsmlr/etkinlik_detay_thumb/";
$tablo_ismi='etkinlik_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=500000;
$ustkategori_tablo_ismi='etkinlikler';
$default_resim='resimyok.gif';
$byk_m_w=500;		
$byk_m_h=480;		
$height_of_image=192;
$width_of_image=200;	
$kck_m_w=281;
$kck_m_h=270;
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1'; break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>