<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$ustkategori_no=$_SESSION['ust_kategori_no'];
   	    $altkategori=$_SESSION['alt_kategori'];
   		$n_fiyat=$_POST['fiyat'];
		$n_urun_kodu=$_POST['urun_kodu'];
		$n_uzunluk=$_POST['uzunluk'];
		$n_yukseklik=$_POST['yukseklik'];
		$n_genislik=$_POST['genislik'];
		$n_agirlik=$_POST['agirlik'];
		$n_guc=$_POST['guc'];
		$n_link=$_POST['link'];
		$n_toplama_kapasitesi=$_POST['toplama_kapasitesi'];
		$n_gereken_hp=$_POST['gereken_hp'];
		$n_toplama_hortumu=$_POST['toplama_hortumu'];
		$n_toz_hortumu=$_POST['toz_hortumu'];
		$n_saft_mili=$_POST['saft_mili'];
		$n_vakum_uzakligi=$_POST['vakum_uzakligi'];
		$n_aciklama=$_POST['aciklama'];
		$n_teknikozellikler=$_POST['teknikozellikler']; //echo $n_teknikozellikler;
        $n_tarih=date('Ymd');
		
		$n_htaccess_etiket=$_POST['htaccess_etiket'];
		$bu_etikete_sahip_sektor_varmi=@$baglanti->query("Select ad from $tablo_ismi where htaccess_etiket='$n_htaccess_etiket' and ustkategori_no='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		/*Normal sartlarda bu tabloya hiç ayni isimli etiket eklenmemli bu siteye özel  and ustkategori_no='$ustkategori_no' sorgusu ekelenerek, ayni isimli etiketin eklenmesi saglandi - Zülal*/
		if  (count($bu_etikete_sahip_sektor_varmi)>0)
			{ 
				//echo 1;
				$err="etiket";
				header("Location:ekle.php?err=etiket");
				
			}
		else
			{
					if (isset($_POST["ad"]) && strlen($_POST["ad"])<>0) 	
						{ 	  	 
							$n_ad=$_POST["ad"];
							$n_hata[1]=0;			
						} 
					else
						{ 
							$n_hata[1]=1; 
							$n_ad='';
						}
					$n_puan=$_POST["puan"];
					$link_inherit="ekle_islem.php";
						if ($n_hata[1]==1)	
						{ 
							$err='eksik_veri'; 
						} 
					else 
						{ 
							include($uzaklik."inc_s/resim_islem.php");
							
							
							
							    /// diger resimler 
								$n_resim2=$_FILES["resim2"];
								
								
							    $numara_bul_sql2="Select max(numara) from $tablo_ismi";
								$numara_bul_sql_calistir2=@$baglanti->query($numara_bul_sql2)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara2=$numara_bul_sql_calistir2[0]["max(numara)"];
		
								if  (isset($n_resim2) && strlen($n_resim2["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size2=$n_resim2["size"];		
									   if ($dosya_size2>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "12";
											  $dosya_gecici_isim2=$n_resim2["tmp_name"]; $dosya_isim2=$n_resim2["name"];  $dosya_tip2=$n_resim2["type"]; //echo $dosya_tip;
											  if ($dosya_tip2=='image/gif' ||  $dosya_tip2=='image/jpg' ||  $dosya_tip2=='image/pjpeg' ||  $dosya_tip2=='image/jpeg' ||  $dosya_tip2=='image/png') // Eger jpeg ya da bmp ise islem yap
												 {  						
													if ($dosya_tip2=='image/gif') { $uzanti2='gif'; } elseif ($dosya_tip2=='image/png') { $uzanti2='png'; } else {$uzanti2='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya2="kresim".$b_numara2.".".$uzanti2; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."kresim".$numara.".jpg")){ chmod($resim_dizini."kresim".$numara.".jpg",0777); unlink($resim_dizini."kresim".$numara.".jpg");}
													if (file_exists($resim_dizini."kresim".$numara.".gif")){ chmod($resim_dizini."kresim".$numara.".gif",0777); unlink($resim_dizini."kresim".$numara.".gif");}
													if (file_exists($resim_dizini."kresim".$numara.".png")){ chmod($resim_dizini."kresim".$numara.".png",0777); unlink($resim_dizini."kresim".$numara.".png");}
													// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													move_uploaded_file($n_resim2["tmp_name"] , $resim_dizini.$dosya2);
													if (file_exists($resim_dizini.$dosya2)) { chmod($resim_dizini.$dosya2,0644); }
													$resim_ekle2="Update $tablo_ismi Set  resim_adres2='$dosya2' where numara=$b_numara2";
													@$baglanti->query($resim_ekle2)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   
								$resim_ogren2=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara2")->fetchAll(PDO::FETCH_ASSOC);
								if  (count($resim_ogren2)>0)	
									{
										$buyuk_resim2=$resim_ogren2[0]["resim_adres2"];
										if  ($buyuk_resim2<>"")
											{
												include_once($uzaklik."inc_s/thumbnail.php");
												Thumbnail($resim_dizini,$buyuk_resim2,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
												if  (file_exists($thumb_resim_dizini.$buyuk_resim2)) {  @chmod($thumb_resim_dizini.$buyuk_resim2,0777); @unlink($thumb_resim_dizini.$buyuk_resim2); }
												Thumbnail($resim_dizini,$buyuk_resim2,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
												if   (file_exists($resim_dizini.$buyuk_resim2) && $buyuk_resim2<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim2)) 
													 {
														$buyuk_resim_boyut2=getimagesize($resim_dizini.$buyuk_resim2); $buyuk_resim_yukseklik2=$buyuk_resim_boyut2[1]; $buyuk_resim_genislik2=$buyuk_resim_boyut2[0];	
														$ortaboy_resim2=getimagesize($resim_dizini_ortaboy.$buyuk_resim2); $ortaboy_resim_yukseklik2=$ortaboy_resim2[1]; $ortaboy_resim_genislik2=$ortaboy_resim2[0];							
														if  ($buyuk_resim_yukseklik2<=$ortaboy_resim_yukseklik2 && $buyuk_resim_genislik2<=$ortaboy_resim_genislik2) { @chmod($resim_dizini.$buyuk_resim2,0777); @unlink($resim_dizini.$buyuk_resim2); }							 								 
													 }
											}
									}  										 
  								
								
								
								/// detay resim 1
								$n_resim3=$_FILES["resim3"];
							    $numara_bul_sql3="Select max(numara) from $tablo_ismi";
								$numara_bul_sql_calistir3=@$baglanti->query($numara_bul_sql3)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara3=$numara_bul_sql_calistir3[0]["max(numara)"];
		
								if  (isset($n_resim3) && strlen($n_resim3["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size3=$n_resim3["size"];		
									   if ($dosya_size3>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "13";
											  $dosya_gecici_isim3=$n_resim3["tmp_name"]; $dosya_isim3=$n_resim3["name"];  $dosya_tip3=$n_resim3["type"]; //echo $dosya_tip;
											  if ($dosya_tip3=='image/gif' ||  $dosya_tip3=='image/jpg' ||  $dosya_tip3=='image/pjpeg' ||  $dosya_tip3=='image/jpeg' ||  $dosya_tip3=='image/png') // Eger jpeg ya da bmp ise islem yap
												 {  						
													if ($dosya_tip3=='image/gif') { $uzanti3='gif'; } elseif ($dosya_tip3=='image/png') { $uzanti3='png'; } else {$uzanti3='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya3="ddresim".$b_numara3.".".$uzanti3; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."ddresim".$numara.".jpg")){ chmod($resim_dizini."ddresim".$numara.".jpg",0777); unlink($resim_dizini."ddresim".$numara.".jpg");}
													if (file_exists($resim_dizini."ddresim".$numara.".gif")){ chmod($resim_dizini."ddresim".$numara.".gif",0777); unlink($resim_dizini."ddresim".$numara.".gif");}
													if (file_exists($resim_dizini."ddresim".$numara.".png")){ chmod($resim_dizini."ddresim".$numara.".png",0777); unlink($resim_dizini."ddresim".$numara.".png");}
													// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													move_uploaded_file($n_resim3["tmp_name"] , $resim_dizini.$dosya3);
													if (file_exists($resim_dizini.$dosya3)) { chmod($resim_dizini.$dosya3,0644); }
													$resim_ekle3="Update $tablo_ismi Set  resim_adres3='$dosya3' where numara=$b_numara3";
													@$baglanti->query($resim_ekle3)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   
								$resim_ogren3=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara3")->fetchAll(PDO::FETCH_ASSOC);
								if  (count($resim_ogren3)>0)	
									{
										$buyuk_resim3=$resim_ogren3[0]["resim_adres3"];
										if  ($buyuk_resim3<>"")
											{
												include_once($uzaklik."inc_s/thumbnail.php");
												Thumbnail($resim_dizini,$buyuk_resim3,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
												if  (file_exists($thumb_resim_dizini.$buyuk_resim3)) {  @chmod($thumb_resim_dizini.$buyuk_resim3,0777); @unlink($thumb_resim_dizini.$buyuk_resim3); }
												Thumbnail($resim_dizini,$buyuk_resim3,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
												if   (file_exists($resim_dizini.$buyuk_resim3) && $buyuk_resim3<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim3)) 
													 {
														$buyuk_resim_boyut3=getimagesize($resim_dizini.$buyuk_resim3); $buyuk_resim_yukseklik3=$buyuk_resim_boyut3[1]; $buyuk_resim_genislik3=$buyuk_resim_boyut3[0];	
														$ortaboy_resim3=getimagesize($resim_dizini_ortaboy.$buyuk_resim3); $ortaboy_resim_yukseklik3=$ortaboy_resim3[1]; $ortaboy_resim_genislik3=$ortaboy_resim3[0];							
														if  ($buyuk_resim_yukseklik3<=$ortaboy_resim_yukseklik3 && $buyuk_resim_genislik3<=$ortaboy_resim_genislik3) { @chmod($resim_dizini.$buyuk_resim3,0777); @unlink($resim_dizini.$buyuk_resim3); }							 								 
													 }
											}
									} 
									
							   
							    /// detay resim 2	
							   	$n_resim4=$_FILES["resim4"];
							    $numara_bul_sql4="Select max(numara) from $tablo_ismi";
								$numara_bul_sql_calistir4=@$baglanti->query($numara_bul_sql4)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara4=$numara_bul_sql_calistir4[0]["max(numara)"];
		
								if  (isset($n_resim4) && strlen($n_resim4["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size4=$n_resim4["size"];		
									   if ($dosya_size4>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "14";
											  $dosya_gecici_isim4=$n_resim4["tmp_name"]; $dosya_isim4=$n_resim4["name"];  $dosya_tip4=$n_resim4["type"]; //echo $dosya_tip;
											  if ($dosya_tip4=='image/gif' ||  $dosya_tip4=='image/jpg' ||  $dosya_tip4=='image/pjpeg' ||  $dosya_tip4=='image/jpeg' ||  $dosya_tip4=='image/png') // Eger jpeg ya da bmp ise islem yap
												 {  						
													if ($dosya_tip4=='image/gif') { $uzanti4='gif'; } elseif ($dosya_tip4=='image/png') { $uzanti4='png'; } else {$uzanti4='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya4="dresim".$b_numara4.".".$uzanti4; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."dresim".$numara.".jpg")){ chmod($resim_dizini."dresim".$numara.".jpg",0777); unlink($resim_dizini."dresim".$numara.".jpg");}
													if (file_exists($resim_dizini."dresim".$numara.".gif")){ chmod($resim_dizini."dresim".$numara.".gif",0777); unlink($resim_dizini."dresim".$numara.".gif");}
													if (file_exists($resim_dizini."dresim".$numara.".png")){ chmod($resim_dizini."dresim".$numara.".png",0777); unlink($resim_dizini."dresim".$numara.".png");}
													// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													move_uploaded_file($n_resim4["tmp_name"] , $resim_dizini.$dosya4);
													if (file_exists($resim_dizini.$dosya4)) { chmod($resim_dizini.$dosya4,0644); }
													$resim_ekle4="Update $tablo_ismi Set  resim_adres4='$dosya4' where numara=$b_numara4";
													@$baglanti->query($resim_ekle4)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   
								$resim_ogren4=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara4")->fetchAll(PDO::FETCH_ASSOC);
								if  (count($resim_ogren4)>0)	
									{
										$buyuk_resim4=$resim_ogren4[0]["resim_adres4"];
										if  ($buyuk_resim4<>"")
											{
												include_once($uzaklik."inc_s/thumbnail.php");
												Thumbnail($resim_dizini,$buyuk_resim4,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
												if  (file_exists($thumb_resim_dizini.$buyuk_resim4)) {  @chmod($thumb_resim_dizini.$buyuk_resim4,0777); @unlink($thumb_resim_dizini.$buyuk_resim4); }
												Thumbnail($resim_dizini,$buyuk_resim4,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
												if   (file_exists($resim_dizini.$buyuk_resim4) && $buyuk_resim4<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim4)) 
													 {
														$buyuk_resim_boyut4=getimagesize($resim_dizini.$buyuk_resim4); $buyuk_resim_yukseklik4=$buyuk_resim_boyut4[1]; $buyuk_resim_genislik4=$buyuk_resim_boyut4[0];	
														$ortaboy_resim4=getimagesize($resim_dizini_ortaboy.$buyuk_resim4); $ortaboy_resim_yukseklik4=$ortaboy_resim4[1]; $ortaboy_resim_genislik4=$ortaboy_resim4[0];							
														if  ($buyuk_resim_yukseklik4<=$ortaboy_resim_yukseklik4 && $buyuk_resim_genislik4<=$ortaboy_resim_genislik4) { @chmod($resim_dizini.$buyuk_resim4,0777); @unlink($resim_dizini.$buyuk_resim4); }							 								 
													 }
											}
									}
									
							   

		
							   	
							
							
							
						}
					if (isset($err) && $err<>'')
						{
							$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
							$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
							$_SESSION[$tablo_ismi.'n_urun_kodu']=$n_urun_kodu;
							$_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
							$_SESSION[$tablo_ismi.'n_teknikozellikler']=$n_teknikozellikler;		
							$_SESSION[$tablo_ismi.'n_fiyat']=$n_fiyat;
							$_SESSION[$tablo_ismi.'n_hata']=$n_hata;
							$_SESSION[$tablo_ismi.'n_htaccess_etiket']=$n_htaccess_etiket;
							$_SESSION[$tablo_ismi.'n_link']=$n_link;
							$_SESSION[$tablo_ismi.'n_uzunluk']=$n_uzunluk;
							$_SESSION[$tablo_ismi.'n_yukseklik']=$n_yukseklik;
							$_SESSION[$tablo_ismi.'n_genislik']=$n_genislik;
							$_SESSION[$tablo_ismi.'n_agirlik']=$n_agirlik;
							$_SESSION[$tablo_ismi.'n_guc']=$n_guc;
							$_SESSION[$tablo_ismi.'n_toplama_kapasitesi']=$n_toplama_kapasitesi;
							$_SESSION[$tablo_ismi.'n_gereken_hp']=$n_gereken_hp;
							$_SESSION[$tablo_ismi.'n_toplama_hortumu']=$n_toplama_hortumu;
							$_SESSION[$tablo_ismi.'n_toz_hortumu']=$n_toz_hortumu;
							$_SESSION[$tablo_ismi.'n_saft_mili']=$n_saft_mili;
							$_SESSION[$tablo_ismi.'n_vakum_uzakligi']=$n_vakum_uzakligi;
						}
					else
						{
							if  ($insert==0)
								{
								} 
							else 
								{
									$numara_bul_sql="Select max(numara) from $tablo_ismi";
									$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
									$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
								}
								
							$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
							if  (count($resim_ogren)>0)	
								{
									$buyuk_resim=$resim_ogren[0]["resim_adres"];
									if  ($buyuk_resim<>"")
										{
											copy($resim_dizini.$buyuk_resim,$resim_dizini_ortaboy.$buyuk_resim);
											copy($resim_dizini.$buyuk_resim,$thumb_resim_dizini.$buyuk_resim);
										}
								} 
									
									  
							unset($_SESSION[$tablo_ismi.'n_ad']);
									unset($_SESSION[$tablo_ismi.'n_urun_kodu']);
									unset($_SESSION[$tablo_ismi.'n_puan']);
									unset($_SESSION[$tablo_ismi.'n_resim']);
									unset($_SESSION[$tablo_ismi.'n_aciklama']);
									unset($_SESSION[$tablo_ismi.'n_teknikozellikler']);
									unset($_SESSION[$tablo_ismi.'n_fiyat']);
									unset($_SESSION[$tablo_ismi.'n_hata']);
									unset($_SESSION[$tablo_ismi.'n_link']);
									unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']);
									unset($_SESSION[$tablo_ismi.'n_uzunluk']);
									unset($_SESSION[$tablo_ismi.'n_yukseklik']);
									unset($_SESSION[$tablo_ismi.'n_genislik']);
									unset($_SESSION[$tablo_ismi.'n_agirlik']);
									unset($_SESSION[$tablo_ismi.'n_guc']);
									unset($_SESSION[$tablo_ismi.'n_toplama_kapasitesi']);
									unset($_SESSION[$tablo_ismi.'n_gereken_hp']);
									unset($_SESSION[$tablo_ismi.'n_toplama_hortumu']);
									unset($_SESSION[$tablo_ismi.'n_toz_hortumu']);
									unset($_SESSION[$tablo_ismi.'n_saft_mili']);
									unset($_SESSION[$tablo_ismi.'n_vakum_uzakligi']);
						}	 	 
			}
?>
<? include("yonlendir.php"); ?><form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
<script>
var sonuc=window.confirm("Yeni Bir Kayit Eklemek Istiyor musunuz?");
if  (sonuc)
	{
		window.location="ekle.php";
	}
else
	{
		if  (document.all)
			{
				deger=document.formumuz.gizli.value;
				window.location.href="kontrol.php?sayfa_no="+deger; 
			}
		else
			{
				window.location.href="kontrol.php";
			}
	}	
</script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>