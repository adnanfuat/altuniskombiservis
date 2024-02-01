<?
$boyut_ogren=@$baglanti->query("Select hizmet_resim_kgenislik,hizmet_resim_kyukseklik,hizmet_resim_bgenislik,hizmet_resim_byukseklik from parametreler")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["hizmet_resim_kgenislik"];
		$kck_m_h=$boyut_ogren[0]["hizmet_resim_kyukseklik"];
		$byk_m_w=$boyut_ogren[0]["hizmet_resim_bgenislik"];
		$byk_m_h=$boyut_ogren[0]["hizmet_resim_byukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select hizmet_resim_kvgenislik,hizmet_resim_kvyukseklik,hizmet_resim_bvgenislik,hizmet_resim_bvyukseklik from vparametreler")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["hizmet_resim_kvgenislik"];
		$kck_m_h=$boyut_ogren[0]["hizmet_resim_kvyukseklik"];
		$byk_m_w=$boyut_ogren[0]["hizmet_resim_bvgenislik"];
		$byk_m_h=$boyut_ogren[0]["hizmet_resim_bvyukseklik"];
	}
?>