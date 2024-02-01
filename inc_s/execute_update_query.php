<?
if (isset($_SESSION['yonet']))
   {
		switch ($tablo_ismi) 
			{
				//**************************************************************************************************************************
				// (s) bayiler tablosunu update etmek i�in
				case "bayiler":
				$duzenle="Update $tablo_ismi Set ad='$ad', detay='$detay',icerik='$icerik', siralama='$siralama',
				yer='$yer', kategori='$kategori', link='$link', dil='$dil' where numara='$numara'";
				break;
				//**************************************************************************************************************************
				//**************************************************************************************************************************
				// (s) Referasnlar tablosunu update etmek i�in
				case "referanslar":
				$duzenle="Update $tablo_ismi Set ad='$ad', detay='$detay',icerik='$icerik', siralama='$siralama',
				yer='$yer', kategori='$kategori', link='$link',dil='$dil' where numara='$numara'";
				break;
				//**************************************************************************************************************************
				// (s) Markalar tablosunu update etmek i�in
				case "markalar":
				$duzenle="Update $tablo_ismi Set ad='$ad', detay='$detay',icerik='$icerik', siralama='$siralama',
				yer='$yer', kategori='$kategori', link='$link' where numara='$numara'";
				break;
				//**************************************************************************************************************************
				// (s)Referans-Kategori tablosunu update etmek i�in
				case "referans_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', dil='$dil', htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) Referans-Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) referans_resim tablosunu update etmek i�in
				case "referans_resim":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama',htaccess_etiket='$htaccess_etiket', ad='$ad' where numara='$numara'";
				break;
				// (f) referans_resim tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Belgeler tablosunu update etmek i�in
				case "belgeler":
				$duzenle="Update $tablo_ismi Set ad='$ad', detay='$detay',icerik='$icerik', siralama='$siralama',
				yer='$yer', kategori='$kategori' where numara='$numara'";
				break;
				//**************************************************************************************************************************
				// (s)belgeler-Kategori tablosunu update etmek i�in
				case "belgeler_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', dil='$dil' where numara='$numara'";
				break;
				// (f) Belgeler-Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************

				//**************************************************************************************************************************
				// (s)Galeri_Kategori tablosunu update etmek i�in
				case "galeri_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', altkategorilimi='$altkategorilimi', dil='$dil', htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) Galeri_Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Galeri_Altkategori altkategoritablosunu update etmek i�in
				case "galeri_altkategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', siralama='$siralama', htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) Galeri_Altkategori altkategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Galeri_detay tablosunu update etmek i�in
				case "galeri_detay":
					$duzenle="Update $tablo_ismi Set ad='$adi', puan='$puan',aciklama='$aciklama', htaccess_etiket='$htaccess_etiket', deger='$deger' where numara='$numara'";
				break;
				// (f) Galeri-detay tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Haber_detay tablosunu update etmek i�in
				case "haber_detay":
				$duzenle="Update $tablo_ismi Set icerik='$icerik',radiobutton='$radyo' where numara='$numara'";
				break;
				// (f) Haber_detay tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Haberler ozel tablosunu update etmek i�in
				case "haberler":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) kampanyalar tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) Haberler ozel tablosunu update etmek i�in
				case "acenteler":
					$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil',puan='$puan',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
					break;
					// (f) kampanyalar tablosunu update etmek i�in
					// (s) Haberler ozel tablosunu update etmek i�in
				case "etiketler":
					$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
					break;
					// (f) kampanyalar tablosunu update etmek i�in
					//**************************************************************************************************************************
				// (s) Haber_detay tablosunu update etmek i�in
				case "etiket_detay":
				$duzenle="Update $tablo_ismi Set icerik='$icerik',radiobutton='$radyo' where numara='$numara'";
				break;
				// (f) Haber_detay tablosunu update etmek i�in
				// (s) Haberler ozel tablosunu update etmek i�in
				case "kampanyalar":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil',htaccess_etiket='$htaccess_etiket', eski_fiyat='$eski_fiyat', yeni_fiyat='$yeni_fiyat' where numara='$numara'";
				break;
				// (f) Haberler tablosunu update etmek i�in
				
				//**************************************************************************************************************************
				// (s) Yazilar ozel tablosunu update etmek i�in
				case "yazilar":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) Yazilar tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) etkinlik_detay tablosunu update etmek i�in
				case "etkinlik_detay":
				$duzenle="Update $tablo_ismi Set icerik='$icerik',radiobutton='$radyo' where numara='$numara'";
				break;
				// (f) etkinlik_detay tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) etkinlikler ozel tablosunu update etmek i�in
				case "etkinlikler":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil',htaccess_etiket='$htaccess_etiket',etkinliktarihi='$etkinliktarihi',gun='$gun',saat='$saat',ay='$ay' where numara='$numara'";
				break;
				// (f) etkinlikler tablosunu update etmek i�in
				// (s) Hakkinda ozel tablosunu update etmek i�in
				case "hakkinda":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil' where numara='$numara'";
				break;
				// (f) hakkinda tablosunu update etmek i�in
				// (s) S�zler ozel tablosunu update etmek i�in
				case "sozler":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet',dil='$dil' where numara='$numara'";
				break;
				// (f) S�zler tablosunu update etmek i�in
				// (s)hizmet_Kategori tablosunu update etmek i�in
				case "sss_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', ozet='$ozet', aciklama='$aciklama', dil='$dil', hizmetkategori='$hizmetkategori', htaccess_etiket='$htaccess_etiket', video='$video' where numara='$numara'";
				break;
				// (f) hizmet_Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) sss_detay tablosunu update etmek i�in
				case "sss_detay":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama',htaccess_etiket='$htaccess_etiket', ad='$ad' where numara='$numara'";
				break;
				// (f) sss_detay tablosunu update etmek i�in
				//**************************************************************************************************************************
				//**************************************************************************************************************************
				// (s) Haber_detay tablosunu update etmek i�in
				case "hakkinda_detay":
				$duzenle="Update $tablo_ismi Set icerik='$icerik',radiobutton='$radyo' where numara='$numara'";
				break;
				// (f) Haber_detay tablosunu update etmek i�in
				// (s) Hakkinda ozel tablosunu update etmek i�in
				case "iletisim":
				$duzenle="Update $tablo_ismi Set ad='$ad', dil='$dil', adres1='$adres1', adres2='$adres2', adres3='$adres3', telefon1='$telefon1', telefon2='$telefon2', telefon3='$telefon3', telefon4='$telefon4', gsm1='$gsm1', gsm2='$gsm2', gsm3='$gsm3', gsm4='$gsm4', eposta1='$eposta1', eposta2='$eposta2', eposta3='$eposta3', calisma_saati1='$calisma_saati1', calisma_saati2='$calisma_saati2', calisma_saati3='$calisma_saati3' where numara='$numara'";
				break;
				// (f) hakkinda tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s)Urun_Kategori tablosunu update etmek i�in
				case "urun_kategori":
				$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', altkategorilimi='$altkategorilimi', aciklama='$aciklama', dil='$dil', htaccess_etiket='$htaccess_etiket'  where numara='$numara'";
				break;
				// (f) Urun_Kategori tablosunu update etmek i�in
				//*****************************************************************************************************************
				// (s) Urun_Altkategori altkategoritablosunu update etmek i�in
				case "urun_altkategori":
				$duzenle="Update $tablo_ismi Set ad='$ad', siralama='$siralama',aciklama='$aciklama', htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) Urun_Altkategori altkategori tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) Urun_detay tablosunu update etmek i�in
				case "urun_detay":
				$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', aciklama='$aciklama', fiyat='$model', link='$link', teknikozellikler='$teknikozellikler', htaccess_etiket='$htaccess_etiket', uzunluk='$uzunluk', yukseklik='$yukseklik', genislik='$genislik', agirlik='$agirlik', guc='$guc', toplama_kapasitesi='$toplama_kapasitesi', gereken_hp='$gereken_hp', toplama_hortumu='$toplama_hortumu', toz_hortumu='$toz_hortumu', saft_mili='$saft_mili', vakum_uzakligi='$vakum_uzakligi', urun_kodu='$urun_kodu'   where numara='$numara'";
				break;
				// (f) Urun-detay tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) Urun_resim tablosunu update etmek i�in
				case "urun_resim":
				$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) Urun-resim tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) Urun_bilgi tablosunu update etmek i�in
				case "urun_bilgi":
				$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) Urun-bilgi tablosunu update etmek i�in
				//******************************************************************************************************************
				//******************************************************************************************************************
				// (s) Urun_plan tablosunu update etmek i�in
				case "urun_plan":
				$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) Urun-plan tablosunu update etmek i�in
				//******************************************************************************************************************
				//**************************************************************************************************************************
				//**************************************************************************************************************************
				// (s)proje_Kategori tablosunu update etmek i�in
				case "proje_kategori":
				$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', altkategorilimi='$altkategorilimi', aciklama='$aciklama', dil='$dil', htaccess_etiket='$htaccess_etiket'  where numara='$numara'";
				break;
				// (f) proje_Kategori tablosunu update etmek i�in
				//*****************************************************************************************************************
				// (s) proje_Altkategori altkategoritablosunu update etmek i�in
				case "proje_altkategori":
				$duzenle="Update $tablo_ismi Set ad='$ad', siralama='$siralama',aciklama='$aciklama',htaccess_etiket='$htaccess_etiket',video_link='$video_link' where numara='$numara'";
				break;
				// (f) proje_Altkategori altkategori tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) proje_detay tablosunu update etmek i�in
				case "proje_detay":
				$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan',aciklama='$aciklama',fiyat='$fiyat',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) proje-detay tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) proje_resim tablosunu update etmek i�in
				case "proje_resim":
				$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) proje-resim tablosunu update etmek i�in
				//******************************************************************************************************************
				// (s) Etiket tablosunu update etmek i�in
				case "etiket":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',ozet='$ozet' where numara='$numara'";
				break;
				// (f) Etiket tablosunu update etmek i�in
				//******************************************************************************************************************
				//******************************************************************************************************************
				//**************************************************************************************************************************
				// (s)hizmet_Kategori tablosunu update etmek i�in
				case "hizmet_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', ozet='$ozet', aciklama='$aciklama', dil='$dil', hizmetkategori='$hizmetkategori', htaccess_etiket='$htaccess_etiket', video='$video', renk='$renk'  where numara='$numara'";
				break;
				// (f) hizmet_Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) hizmet_resim tablosunu update etmek i�in
				case "hizmet_resim":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama',ad='$ad',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) hizmet_resim tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) hizmet_resim tablosunu update etmek i�in
				case "hizmet_icon":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama',htaccess_etiket='$htaccess_etiket' where numara='$numara'";
				break;
				// (f) hizmet_resim tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s)hizmet_Kategori tablosunu update etmek i�in
				case "bilgibankasi_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', ozet='$ozet', aciklama='$aciklama', dil='$dil', bilgikategori='$bilgikategori'  where numara='$numara'";
				break;
				// (f) hizmet_Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) hizmet_resim tablosunu update etmek i�in
				case "bilgibankasi_resim":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) hizmet_resim tablosunu update etmek i�in
				//**************************************************************************************************************************
				//**************************************************************************************************************************
				// (s) kadro ozel tablosunu update etmek i�in
				case "kadro":
				$duzenle="Update $tablo_ismi Set ad='$ad',icerik='$icerik',dil='$dil',pozisyon='$pozisyon',meslek='$meslek',eposta='$eposta', puan='$puan' where numara='$numara'";
				break;
				// (f) kadro tablosunu update etmek i�in
				// (s) maillist tablosunu update etmek i�in
				case "maillist":
				$duzenle="Update $tablo_ismi Set dil='$dil',eposta='$eposta' where numara='$numara'";
				break;
				// (f) maillist tablosunu update etmek i�in
				// (s) maillist tablosunu update etmek i�in
				case "mail_list":
				$duzenle="Update $tablo_ismi Set dil='$dil',eposta='$eposta' where numara='$numara'";
				break;
				// (f) maillist tablosunu update etmek i�in
				//**************************************************************************************************************************
				// (s) �yeler tablosunu update etmek i�in
				case "uyeler":
				$duzenle="Update $tablo_ismi Set ad='$ad',eposta='$eposta',tel='$telefon',sifre='$sifre',adres='$adres',oda='$oda',sicil='$sicil'  where numara='$numara'";
				break;
				// (f) �yeler tablosunu update etmek i�in
				
					//**************************************************************************************************************************
				// (s) slider_resim tablosunu update etmek i�in
				case "slider_resim":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) slider_resim tablosunu update etmek i�in
				//**************************************************************************************************************************
				
				
				//**************************************************************************************************************************
				// (s)restoran_Kategori tablosunu update etmek i�in
				case "restoran_kategori":
					$duzenle="Update $tablo_ismi Set ad='$ad', puan='$puan', ozet='$ozet', aciklama='$aciklama', dil='$dil', hizmetkategori='$hizmetkategori', htaccess_etiket='$htaccess_etiket', video='$video', renk='$renk', baslik1='$baslik1', baslik2='$baslik2', gorsel='$gorsel', link='$link', insta_baslik='$insta_baslik', insta_token='$insta_token' where numara='$numara'";
				break;
				// (f) restoran_Kategori tablosunu update etmek i�in
				//**************************************************************************************************************************
				//**************************************************************************************************************************
				// (s) restoran_resim tablosunu update etmek i�in
				case "restoran_resim":
					$duzenle="Update $tablo_ismi Set aciklama='$aciklama',siralama='$siralama' where numara='$numara'";
				break;
				// (f) restoran_resim tablosunu update etmek i�in
				//**************************************************************************************************************************

				
				
			//echo $duzenle;	

			}						
		//if  (@$baglanti->query($duzenle)->fetchAll(PDO::FETCH_ASSOC)){ } else {	$err='veritabani'; }	

		if  (@$baglanti->query($duzenle)) { } else { $err='veritabani'; }
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  header("Location:../error/err3.php"); 
   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>