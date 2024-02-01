<?
$kategori='Resim';
$title='Resim';
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/galeridetay_buyuk/";
$resim_dizini_ortaboy=$uzaklik."rsmlr/galeridetay/";		
$thumb_resim_dizini=$uzaklik."rsmlr/galerithumb/";
$tablo_ismi='galeri_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=3000000;	
$ustkategori_tablo_adi='galeri_kategori';
$altkategori_tablo_adi='galeri_altkategori';
$byk_m_w=800;
$byk_m_h=600;
$height_of_image=200;
$width_of_image=150;
$kck_m_w=548;
$kck_m_h=411;		
switch ($link_inherit) 
	{
		case 'ekle_islem.php':$insert='1';break;	
		case 'duzenle_islem.php':$insert='0';break;	
	}
?>