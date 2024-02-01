<?
$kategori_ad='Yeni Sayfa';
$title='Yeni Sayfalar';		
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/etiketler/";
$thumb_resim_dizini=$uzaklik."rsmlr/etiketthumb/";
$altkategori_resim_dizini=$uzaklik."rsmlr/etiket_detay/";
$altkategori_thumb_resim_dizini=$uzaklik."rsmlr/etiket_detay_thumb/";
$tablo_ismi='etiketler';
$altkategori_tablo_ismi='etiket_detay';
$bir_sayfadaki_toplam_kayit_sayisi=20;
$max_file_size=5000000;
$byk_m_w=600;
$byk_m_h=450;
$width_of_image=500;
$height_of_image=375;
$kck_m_w=500;
$kck_m_h=375;	
$default_resim="resimyok.gif";	
switch ($link_inherit) 
	{
		case 'ekle_islem.php': $insert='1'; break;	
		case 'duzenle_islem.php': $insert='0'; break;	
	}
?>