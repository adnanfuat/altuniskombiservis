<?
 if (isset($_SESSION['yonet'])) //  (s)izinsiz girisleri engellemek i�in  kullanilmaktadir.
    {
		switch ($tablo_ismi) 
			{
				// (s) bayiler tablosuna yeni kayit eklemek i�in 
				case "bayiler":
				$yeni_kayit="Insert into $tablo_ismi(ad,
												   detay,
												   icerik,
												   eklenme_tarihi,
												   yer,
												   kategori,
												   siralama,
												   link,
												   dil
												  ) 
											Values 
												  (
												   '$n_ad',
												   '$n_detay',
												   '$n_icerik',
												   '$n_eklenme_tarihi',
												   '$n_yer',
												   '$kategori',
												   '$n_siralama',
												   '$n_link',
												   '$n_dil'
												  )";
				break;
				// (f) bayiler tablosuna yeni kayit eklemek i�in 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "sss_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,eklenme_tarihi,aktif,ozet,aciklama,dil,hizmetkategori,htaccess_etiket,video) 
											Values 
												    ('$n_ad','$n_puan','$n_eklenme_tarihi','1','$n_ozet','$n_aciklama','$n_dil','$n_hizmetkategori','$n_htaccess_etiket','$n_video')";
				break;
				// (f) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
								// (s) Hizmet_resim tablosuna yeni kayit ekleniyor
				case "sss_detay":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama,
												   ad,
												   htaccess_etiket
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$hizmet',
												   '1',
												   '$n_siralama',
												   '$n_ad',
												   '$n_htaccess_etiket'
												  )";
				break;
				// (f) Hizmet_resim tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				// (s) Referanslar tablosuna yeni kayit eklemek i�in 
				case "referanslar":
				$yeni_kayit="Insert into $tablo_ismi(ad,
												   detay,
												   icerik,
												   eklenme_tarihi,
												   yer,
												   kategori,
												   siralama,
												   link,
												   dil
												  ) 
											Values 
												  (
												   '$n_ad',
												   '$n_detay',
												   '$n_icerik',
												   '$n_eklenme_tarihi',
												   '$n_yer',
												   '$kategori',
												   '$n_siralama',
												   '$n_link',
												   '$n_dil'
												  )";
				break;
				// (f) Referanslar tablosuna yeni kayit eklemek i�in 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				// (s) Markalar tablosuna yeni kayit eklemek i�in 
				case "markalar":
				$yeni_kayit="Insert into $tablo_ismi(ad,
												   detay,
												   icerik,
												   eklenme_tarihi,
												   yer,
												   kategori,
												   siralama,
												   link
												  ) 
											Values 
												  (
												   '$n_ad',
												   '$n_detay',
												   '$n_icerik',
												   '$n_eklenme_tarihi',
												   '$n_yer',
												   '$kategori',
												   '$n_siralama',
												   '$n_link'
												  )";
				break;
				// (f) Markalar tablosuna yeni kayit eklemek i�in 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Referans-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "referans_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,aktif,dil) 
											Values 
												    ('$n_ad','$n_puan','1','$n_dil')";
				break;
				// (f) Referans-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				// (s) referans_resim tablosuna yeni kayit ekleniyor
				case "referans_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama,
												   ad,
												   htaccess_etiket
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$kategori',
												   '1',
												   '$n_siralama',
												   '$n_ad',
												   '$n_htaccess_etiket'
												  )";
				break;
				// (f) referans_resim tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) belgeler tablosuna yeni kayit eklemek i�in 
				case "belgeler":
				$yeni_kayit="Insert into $tablo_ismi(ad,
												   detay,
												   icerik,
												   eklenme_tarihi,
												   yer,
												   kategori,
												   siralama,
												   htaccess_etiket
												  ) 
											Values 
												  (
												   '$n_ad',
												   '$n_detay',
												   '$n_icerik',
												   '$n_eklenme_tarihi',
												   '$n_yer',
												   '$kategori',
												   '$n_siralama',
												   '$n_htaccess_etiket'
												  )";
				break;
				// (f) Belgeler tablosuna yeni kayit eklemek i�in 
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) belgeler-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "belgeler_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,aktif,dil) 
											Values 
												    ('$n_ad','$n_puan','1','$n_dil')";
				break;
				// (f) Belgeler-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Galeri-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "galeri_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,eklenme_tarihi,aktif,altkategorilimi,dil,htaccess_etiket) 
											Values 
												    ('$n_ad','$n_puan','$n_eklenme_tarihi','1','$n_altkategorilimi','$n_dil','$n_htaccess_etiket')";
				break;
				// (f) Galeri-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Galeri-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				case "galeri_altkategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,ustkategori_no,eklenme_tarihi,siralama,aktif,htaccess_etiket) 
											Values 
												    ('$n_ad','$ust_kategori_no','$n_eklenme_tarihi','1','1','$n_htaccess_etiket')";
				break;
				// (f) Galeri-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Galeri_detay tablosuna yeni kayit eklemek i�in hazirlik
				case "galeri_detay":
				$yeni_kayit="Insert into $tablo_ismi( ustkategori_no,ad,altkategori_no,aktif,eklenme_tarihi,puan,hit,aciklama,htaccess_etiket,deger) 
											Values 
												    ('$ustkategori_no','$n_ad','$altkategori','1','$n_tarih','$n_puan','0','$n_aciklama','$n_htaccess_etiket','$n_deger')";
				break;				
				// (f)  Galeri_detay tablosuna yeni kayit eklemek i�in hazirlik
				//////////////////////////////////////////////////////////////////////////////////////////////
				case "haber_detay":
				$yeni_kayit="Insert into $tablo_ismi(icerik,haber_no,radiobutton) Values ('$n_icerik','$haber_no','$n_radiobutton')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "haberler":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil,htaccess_etiket) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil','$n_htaccess_etiket')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (f)  Galeri_detay tablosuna yeni kayit eklemek i�in hazirlik
				//////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "acenteler":
					$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil,htaccess_etiket,puan) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil','$n_htaccess_etiket','$n_puan')";
					break;
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
					case "etiketler":
						$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil,htaccess_etiket) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil','$n_htaccess_etiket')";
						break;
						///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////
				case "etiket_detay":
				$yeni_kayit="Insert into $tablo_ismi(icerik,haber_no,radiobutton) Values ('$n_icerik','$haber_no','$n_radiobutton')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "kampanyalar":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil,htaccess_etiket,eski_fiyat,yeni_fiyat) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil','$n_htaccess_etiket','$n_eski_fiyat','$n_yeni_fiyat')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (f)  Galeri_detay tablosuna yeni kayit eklemek i�in hazirlik
				case "etkinlik_detay":
				$yeni_kayit="Insert into $tablo_ismi(icerik,haber_no,radiobutton) Values ('$n_icerik','$haber_no','$n_radiobutton')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "etkinlikler":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil,htaccess_etiket,etkinliktarihi,gun,saat,ay) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil','$n_htaccess_etiket','$n_etkinliktarihi','$n_gun','$n_saat','$n_ay')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "hakkinda":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////
				case "sozler":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet,dil) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet','$n_dil')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				//////////////////////////////////////////////////////////////////////////////////////////////
				case "hakkinda_detay":
				$yeni_kayit="Insert into $tablo_ismi(icerik,haber_no,radiobutton) Values ('$n_icerik','$haber_no','$n_radiobutton')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "iletisim":
				$yeni_kayit="Insert into $tablo_ismi(ad,aktif,eklenme_tarihi,dil,adres1,adres2,adres3,telefon1,telefon2,telefon3,telefon4, gsm1,gsm2,gsm3,gsm4,eposta1,eposta2,eposta3,calisma_saati1,calisma_saati2,calisma_saati3) Values ('$n_ad','1','$n_eklenme_tarihi','$n_dil','$n_adres1','$n_adres2','$n_adres3','$n_telefon1','$n_telefon2','$n_telefon3','$n_telefon4','$n_gsm1','$n_gsm2','$n_gsm3','$n_gsm4','$n_eposta1','$n_eposta2','$n_eposta3','$n_calisma_saati1','$n_calisma_saati2','$n_calisma_saati3')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "yazilar":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,resim_adres,eklenme_tarihi,ozet,htaccess_etiket) Values ('$n_ad','$n_icerik','1','$n_resim','$n_eklenme_tarihi','$n_ozet','$n_htaccess_etiket')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_kategori":
				$yeni_kayit="Insert into $tablo_ismi(
									   ad,
								   	   puan,
								       eklenme_tarihi,
									   aktif,
									   altkategorilimi,
									   aciklama,
									   dil,
									   htaccess_etiket
								      ) 
							    Values 
									  (
									   '$n_ad',
								       '$n_puan',
								       '$n_eklenme_tarihi',
									   '1',
									   '$n_altkategorilimi',
									   '$n_aciklama',
									   '$n_dil',
									   '$n_htaccess_etiket'
								      )";
				break;
				// (f) Urun-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun_resim tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   urun_no,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$urun_numara',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f)  Urun_resim tablosuna yeni kayit eklemek i�in hazirlik
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun_bilgi tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_bilgi":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   urun_no,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$urun_numara',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f)  Urun_bilgi tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun_plan tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_plan":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   urun_no,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$urun_numara',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f)  Urun_plan tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_altkategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,
								   	   ustkategori_no,
								       eklenme_tarihi,
									   siralama,aktif,
									   aciklama,
									   htaccess_etiket
								      ) 
							    Values 
									  (
									   '$n_ad',
								       '$ust_kategori_no',
								       '$n_eklenme_tarihi',
									   '$n_siralama','1',
									   '$n_aciklama',
									   '$n_htaccess_etiket'
								      )";
				break;
				// (f) Urun-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				/////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Urun_detay tablosuna yeni kayit eklemek i�in hazirlik
				case "urun_detay":
				$yeni_kayit="Insert into $tablo_ismi(ustkategori_no,
									   ad,
									   altkategori_no,
									   aktif,
									   eklenme_tarihi,
									   puan,
									   hit,
									   aciklama,
									   fiyat,
									   link,
									   teknikozellikler,
									   htaccess_etiket,
									   uzunluk,
									   yukseklik,
									   genislik,
									   agirlik,
									   guc,
									   toplama_kapasitesi,
									   gereken_hp,
									   toplama_hortumu,
									   toz_hortumu,
									   saft_mili,
									   vakum_uzakligi,
									   urun_kodu
									   ) 
							    Values 
									  (
									   '$ustkategori_no',
								       '$n_ad',
								       '$altkategori',
									   '1',
									   '$n_tarih',
									   '$n_puan',
									   '0',
									   '$n_aciklama',
									   '$n_fiyat',
									   '$n_link',
									   '$n_teknikozellikler',
									   '$n_htaccess_etiket',
									   '$n_uzunluk',
									   '$n_yukseklik',
									   '$n_genislik',
									   '$n_agirlik',
									   '$n_guc',
									   '$n_toplama_kapasitesi',
									   '$n_gereken_hp',
									   '$n_toplama_hortumu',
									   '$n_toz_hortumu',
									   '$n_saft_mili',
									   '$n_vakum_uzakligi',
									   '$n_urun_kodu'
								      )";
				break;
				// (f)  Urun_detay tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s)  etiket tablosuna yeni kayit eklemek i�in hazirlik
				case "etiket":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,hit,ozet) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','0','$n_ozet')";
				break;
				// (s)  etiket tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) proje-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "proje_kategori":
				$yeni_kayit="Insert into $tablo_ismi(
									   ad,
								   	   puan,
								       eklenme_tarihi,
									   aktif,
									   altkategorilimi,
									   aciklama,
									   dil,
									   htaccess_etiket
								      ) 
							    Values 
									  (
									   '$n_ad',
								       '$n_puan',
								       '$n_eklenme_tarihi',
									   '1',
									   '$n_altkategorilimi',
									   '$n_aciklama',
									   '$n_dil',
									   '$n_htaccess_etiket'
								      )";
				break;
				// (f) proje-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) proje_resim tablosuna yeni kayit eklemek i�in hazirlik
				case "proje_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   proje_no,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$proje_numara',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f)  proje_resim tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) proje-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				case "proje_altkategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,
								   	   ustkategori_no,
								       eklenme_tarihi,
									   siralama,aktif,
									   aciklama,
									   htaccess_etiket,
									   video_link
								      ) 
							    Values 
									  (
									   '$n_ad',
								       '$ust_kategori_no',
								       '$n_eklenme_tarihi',
									   '$n_siralama','1',
									   '$n_aciklama',
									   '$n_htaccess_etiket',
									   '$n_video_link'
								      )";
				break;
				// (f) proje-Altkategori altkategori tablosuna yeni kayit eklemek i�in hazirlik
				/////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) proje_detay tablosuna yeni kayit eklemek i�in hazirlik
				case "proje_detay":
				$yeni_kayit="Insert into $tablo_ismi(ustkategori_no,
									   ad,
									   altkategori_no,
									   aktif,
									   eklenme_tarihi,
									   puan,
									   hit,
									   aciklama,
									   fiyat,
									   htaccess_etiket
									   ) 
							    Values 
									  (
									   '$ustkategori_no',
								       '$n_ad',
								       '$altkategori',
									   '1',
									   '$n_tarih',
									   '$n_puan',
									   '0',
									   '$n_aciklama',
									   '$n_fiyat',
									   '$n_htaccess_etiket'
								      )";
				break;
				// (f)  proje_detay tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "hizmet_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,eklenme_tarihi,aktif,ozet,aciklama,dil,hizmetkategori,htaccess_etiket,video,renk) 
											Values 
												    ('$n_ad','$n_puan','$n_eklenme_tarihi','1','$n_ozet','$n_aciklama','$n_dil','$n_hizmetkategori','$n_htaccess_etiket','$n_video','$n_renk')";
				break;
				// (f) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet_resim tablosuna yeni kayit ekleniyor
				case "hizmet_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama,
												   ad,
												   htaccess_etiket
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$hizmet',
												   '1',
												   '$n_siralama',
												   '$n_ad',
												   '$n_htaccess_etiket'
												  )";
				break;
				// (f) Hizmet_resim tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet_icon tablosuna yeni kayit ekleniyor
				case "hizmet_icon":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$hizmet',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f) Hizmet_icon tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "bilgibankasi_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,eklenme_tarihi,aktif,ozet,aciklama,dil,bilgikategori) 
											Values 
												    ('$n_ad','$n_puan','$n_eklenme_tarihi','1','$n_ozet','$n_aciklama','$n_dil','$n_bilgikategori')";
				break;
				// (f) Hizmet-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Hizmet_resim tablosuna yeni kayit ekleniyor
				case "bilgibankasi_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$bilgi',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f) Hizmet_resim tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) tanimlar tablosuna yeni kayit eklemek i�in hazirlik
				case "tanimlar":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,aktif,dil) 
											Values 
												    ('$n_ad','$n_puan','1','$n_dil')";
				break;
				// (f) tanimlar tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "kadro":
				$yeni_kayit="Insert into $tablo_ismi(ad,icerik,aktif,eklenme_tarihi,dil,pozisyon,meslek,eposta,puan) Values ('$n_ad','$n_icerik','1','$n_eklenme_tarihi','$n_dil','$n_pozisyon','$n_meslek','$n_eposta','$n_puan')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "maillist":
				$yeni_kayit="Insert into $tablo_ismi(dil,eposta,aktif) Values ('$n_dil','$n_eposta','1')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "mail_list":
				$yeni_kayit="Insert into $tablo_ismi(dil,eposta,aktif) Values ('$n_dil','$n_eposta','1')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				case "uyeler":
				$yeni_kayit="Insert into $tablo_ismi(ad,eposta,tel,adres,sifre,aktif,eklenme_tarihi,oda,sicil) Values ('$n_ad','$n_eposta','$n_telefon','$n_adres','$n_sifre','1','$n_eklenme_tarihi','$n_oda','$n_sicil')";
				break;
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) slider_resim tablosuna yeni kayit ekleniyor
				case "slider_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$hizmet',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f) slider_resim tablosuna yeni kayit ekleniyor
				
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) Restoran-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				case "restoran_kategori":
				$yeni_kayit="Insert into $tablo_ismi(ad,puan,eklenme_tarihi,aktif,ozet,aciklama,dil,hizmetkategori,htaccess_etiket,video,renk,gorsel,baslik1,baslik2,link,insta_baslik,insta_token) 
											Values 
												    ('$n_ad','$n_puan','$n_eklenme_tarihi','1','$n_ozet','$n_aciklama','$n_dil','$n_hizmetkategori','$n_htaccess_etiket','$n_video','$n_renk','$n_gorsel','$n_baslik1','$n_baslik2','$n_link','$n_insta_baslik','$n_insta_token')";
				break;
				// (f) restoran-Kategori tablosuna yeni kayit eklemek i�in hazirlik
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// (s) restoran_resim tablosuna yeni kayit ekleniyor
				case "restoran_resim":
				$yeni_kayit="Insert into $tablo_ismi(aciklama,
												   kategori,
												   aktif,
												   siralama
												  ) 
											Values 
												  (
												   '$n_aciklama',
												   '$hizmet',
												   '1',
												   '$n_siralama'
												  )";
				break;
				// (f) restoran_resim tablosuna yeni kayit ekleniyor
				///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			}
		//if  (@$baglanti->query($yeni_kayit)->fetchAll(PDO::FETCH_ASSOC)){} else	{ $err='veritabani';  }	

		if (@$baglanti->query($yeni_kayit))	{ } else {  $err='veritabani'; }




		//echo $baglanti->errorInfo();
   } 
else 
   {
	   unset($_SESSION['yonet']);
	   header("Location:../error/err3.php"); 
   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>
