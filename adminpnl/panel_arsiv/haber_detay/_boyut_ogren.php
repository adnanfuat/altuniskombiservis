<?
$boyut_ogren=@$baglanti->query("Select haber_detay_kgenislik,haber_detay_kyukseklik,haber_detay_bgenislik,haber_detay_byukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
$boyut_ogren_sayi=count($boyut_ogren);
if  ($boyut_ogren_sayi>0)
	{
		$kck_m_w=$boyut_ogren[0]["haber_detay_kgenislik"];
		$kck_m_h=$boyut_ogren[0]["haber_detay_kyukseklik"];
		$byk_m_w=$boyut_ogren[0]["haber_detay_bgenislik"];
		$byk_m_h=$boyut_ogren[0]["haber_detay_byukseklik"];
	}
else
	{
		$boyut_ogren=@$baglanti->query("Select haber_detay_kvgenislik,haber_detay_kvyukseklik,haber_detay_bvgenislik,haber_detay_bvyukseklik from vparametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		$kck_m_w=$boyut_ogren[0]["haber_detay_kvgenislik"];
		$kck_m_h=$boyut_ogren[0]["haber_detay_kvyukseklik"];
		$byk_m_w=$boyut_ogren[0]["haber_detay_bvgenislik"];
		$byk_m_h=$boyut_ogren[0]["haber_detay_bvyukseklik"];
	}
?>