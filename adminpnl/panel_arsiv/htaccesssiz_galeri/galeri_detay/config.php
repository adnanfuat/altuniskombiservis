<?
$kategori='Resim';
$title='Resim';
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/galeridetay_buyuk/";
$resim_dizini_ortaboy=$uzaklik."rsmlr/galeridetay/";		
$thumb_resim_dizini=$uzaklik."rsmlr/galerithumb/";
$tablo_ismi='galeri_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=1000000;	
$ustkategori_tablo_adi='galeri_kategori';
$altkategori_tablo_adi='galeri_altkategori';
$byk_m_w=1027;
$byk_m_h=770;
$height_of_image=75;
$width_of_image=100;
$kck_m_w=327;
$kck_m_h=245;				
switch ($link_inherit) 
	{
		case 'ekle_islem.php':$insert='1';break;	
		case 'duzenle_islem.php':$insert='0';break;	
	}
?>