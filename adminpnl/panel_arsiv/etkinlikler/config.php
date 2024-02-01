<?
$kategori_ad='Etkinlik';
$title='Etkinlikler';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/etkinlikler/";
$thumb_resim_dizini=$uzaklik."rsmlr/etkinlikthumb/";
$altkategori_resim_dizini=$uzaklik."rsmlr/etkinlik_detay/";
$altkategori_thumb_resim_dizini=$uzaklik."rsmlr/etkinlik_detay_thumb/";
$tablo_ismi='etkinlikler';
$altkategori_tablo_ismi='etkinlik_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=5000000;
$byk_m_w=500;		
$byk_m_h=480;		
$height_of_image=192;
$width_of_image=200;	
$kck_m_w=281;
$kck_m_h=270;	
$default_resim="resimyok.gif";	
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1'; break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>