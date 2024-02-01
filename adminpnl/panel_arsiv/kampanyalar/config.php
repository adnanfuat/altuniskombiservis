<?
$kategori_ad='Etkinlik';
$title='Etkinlikler';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/kampanyalar/";
$icon_dizini=$uzaklik."rsmlr/kampanyathumb/";
$thumb_resim_dizini=$uzaklik."rsmlr/kampanyathumb/";
$thumb_icon_dizini=$uzaklik."rsmlr/kampanyathumb/";

$altkategori_resim_dizini=$uzaklik."rsmlr/kampanya_detay/";
$altkategori_thumb_resim_dizini=$uzaklik."rsmlr/kampanya_detay_thumb/";
$tablo_ismi='kampanyalar';
$altkategori_tablo_ismi='kampanya_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=5000000;
$byk_m_w=600;		
$byk_m_h=450;		
$height_of_image=100;
$width_of_image=75;	
$kck_m_w=600;
$kck_m_h=450;	
$default_resim="resimyok.gif";	
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1'; break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>