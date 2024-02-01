<?
$kategori_ad='Haber';
$title='Haberler';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/haberler/";
$thumb_resim_dizini=$uzaklik."rsmlr/haberthumb/";
$altkategori_resim_dizini=$uzaklik."rsmlr/haber_detay/";
$altkategori_thumb_resim_dizini=$uzaklik."rsmlr/haber_detay_thumb/";
$tablo_ismi='haberler';
$altkategori_tablo_ismi='haber_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=5000000;
$byk_m_w=400;		
$byk_m_h=300;		
$height_of_image=184;
$width_of_image=138;	
$kck_m_w=400;
$kck_m_h=300;	
$default_resim="resimyok.gif";	
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1'; break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>