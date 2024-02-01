<?		
$boyut_ogren=@$baglanti->query("Select galeri_resim_kgenislik,galeri_resim_kyukseklik,galeri_resim_bgenislik,galeri_resim_byukseklik from parametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["galeri_resim_kgenislik"];
		$kck_m_h=$boyut_ogren[0]["galeri_resim_kyukseklik"];
		$byk_m_w=$boyut_ogren[0]["galeri_resim_bgenislik"];
		$byk_m_h=$boyut_ogren[0]["galeri_resim_byukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select galeri_resim_kvgenislik,galeri_resim_kvyukseklik,galeri_resim_bvgenislik,galeri_resim_bvyukseklik from vparametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["galeri_resim_kvgenislik"];
		$kck_m_h=$boyut_ogren[0]["galeri_resim_kvyukseklik"];
		$byk_m_w=$boyut_ogren[0]["galeri_resim_bvgenislik"];
		$byk_m_h=$boyut_ogren[0]["galeri_resim_bvyukseklik"];
	}
?>