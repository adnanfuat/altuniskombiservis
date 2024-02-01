<?
$kategori_ad='Etiket';
$title='Etiketler';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/etiketler/";
$thumb_resim_dizini=$uzaklik."rsmlr/etiketthumb/";
$altkategori_resim_dizini=$uzaklik."rsmlr/etiket_detay/";
$altkategori_thumb_resim_dizini=$uzaklik."rsmlr/etiket_detay_thumb/";
$tablo_ismi='etiketler';
$altkategori_tablo_ismi='etiket_detay';
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