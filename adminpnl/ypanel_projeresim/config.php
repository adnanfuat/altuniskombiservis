
<?
$kategori='Proje Resimleri';
$title='Proje Resimleri';
$uzaklik="../../";
$resim_dizini=$uzaklik."rsmlr/bproje/";
$thumb_resim_dizini=$uzaklik."rsmlr/kproje/";
$tablo_ismi='proje_resim';
$bir_sayfadaki_toplam_kayit_sayisi=100000;
$max_file_size=10000000;	
$height_of_image=300;
$width_of_image=400;
$byk_m_w=1000;
$byk_m_h=750;
$kck_m_w=800;
$kck_m_h=600;		
switch ($link_inherit)
	{
		case 'ekle_islem.php': $insert='1';	break;	
		case 'duzenle_islem.php': $insert='0';	break;	
	}
?>