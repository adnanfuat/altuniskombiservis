<?
$kategori='Galeri Kategori';
$title='Galeri Kategori';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/galerikategori/";
$tablo_ismi='galeri_kategori';
$altkategori_resim_dizini=$uzaklik."rsmlr/galerialtkategori/";
$detay_buyuk_resim_dizini=$uzaklik."rsmlr/galeridetay_buyuk/";
$detay_resim_dizini_ortaboy=$uzaklik."rsmlr/galeridetay/";		
$thumb_resim_dizini=$uzaklik."rsmlr/galerithumb/";
$altkategori_tablo_ismi='galeri_altkategori';
$detay_tablo_ismi='galeri_detay';
$ustkategori_tablo_adi='galeri_kategori';
$altkategori_tablo_adi='galeri_altkategori';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$height_of_image=200;
$width_of_image=150;
$kck_m_w=548;
$kck_m_h=411;	
$max_file_size=2500000;
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1';	break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>