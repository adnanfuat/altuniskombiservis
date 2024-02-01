<? session_start();
$link_inherit='duzenle_islem.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		unset($_SESSION[$tablo_ismi.'ad']);	
		unset($_SESSION[$tablo_ismi.'urun_kodu']);	
		unset($_SESSION[$tablo_ismi.'puan']);
		unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'teknikozellikler']);
		unset($_SESSION[$tablo_ismi.'link']);
		unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
		unset($_SESSION[$tablo_ismi.'hata']);
		unset($_SESSION[$tablo_ismi.'fiyat']);
		unset($_SESSION[$tablo_ismi.'uzunluk']);
		unset($_SESSION[$tablo_ismi.'yukseklik']);
		unset($_SESSION[$tablo_ismi.'genislik']);
		unset($_SESSION[$tablo_ismi.'agirlik']);
		unset($_SESSION[$tablo_ismi.'guc']);
		unset($_SESSION[$tablo_ismi.'toplama_kapasitesi']);
		unset($_SESSION[$tablo_ismi.'gereken_hp']);
		unset($_SESSION[$tablo_ismi.'toplama_hortumu']);
		unset($_SESSION[$tablo_ismi.'toz_hortumu']);
		unset($_SESSION[$tablo_ismi.'saft_mili']);
		unset($_SESSION[$tablo_ismi.'vakum_uzakligi']);

		include($uzaklik."inc_s/baglanti.php");	
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$ustkategori_no=$_SESSION['ust_kategori_no'];
		$altkategori_no=$_SESSION['alt_kategori'];	
		$numara=$_POST['gizli'];
		if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0)
		    {
				$ad=$_POST["ad"];	
				$hata[1]=0;
		    }
	    else
		    {
			    $hata[1]=1; 
				$ad=''; 
		    }
	    if  (isset($_POST["puan"]) && strlen($_POST["puan"])<>0)
  		    {
				$puan=$_POST["puan"]; 
				$hata[4]=0;
		    } 
	    else
		    {
			    $hata[4]=1; 
				$puan=''; 
		    }
	    if  (isset($_POST["aciklama"]) && strlen($_POST["aciklama"])<>0)
   		    {
			    $aciklama=$_POST["aciklama"];	
				$hata[6]=0;
		    } 
	    else
		    {
			    $hata[6]=1; 
				$aciklama='';
		    }
	    $model=$_POST["fiyat"];
		$link=$_POST["link"];
		$urun_kodu=$_POST["urun_kodu"];
		$teknikozellikler=$_POST["teknikozellikler"];
		$htaccess_etiket=$_POST["htaccess_etiket"];
		$uzunluk=$_POST['uzunluk'];
		$yukseklik=$_POST['yukseklik'];
		$genislik=$_POST['genislik'];
		$agirlik=$_POST['agirlik'];
		$guc=$_POST['guc'];
		$toplama_kapasitesi=$_POST['toplama_kapasitesi'];
		$gereken_hp=$_POST['gereken_hp'];
		$toplama_hortumu=$_POST['toplama_hortumu'];
		$toz_hortumu=$_POST['toz_hortumu'];
		$saft_mili=$_POST['saft_mili'];
		$vakum_uzakligi=$_POST['vakum_uzakligi'];
		
		$bu_etikete_sahip_sektor_varmi=@$baglanti->query("Select ad from $tablo_ismi where htaccess_etiket='$htaccess_etiket' and numara<>'$numara' and ustkategori_no='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		if (count($bu_etikete_sahip_sektor_varmi)>0)
		   {
				$err="etiket&numara=$numara"; //echo $err;
				header("Location:duzenle.php?err=etiket&numara=$numara");
		    }
		else
			{
				/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		if  ($hata[1]==1)
			{ 
				$err='eksik_veri'; 
			} 
	    else 
			{ 
				include($uzaklik."inc_s/resim_islem.php"); 
				
				
								//if (1==2) { 
				
				
								/// diger resimler 
								$resim2=$_FILES["resim2"];
							    //$numara_bul_sql2="Select max(numara) from $tablo_ismi";
								//$numara_bul_sql_calistir2=@$baglanti->query($numara_bul_sql2)->fetchAll(PDO::FETCH_ASSOC);
								//$b_numara2=$numara_bul_sql_calistir2[0]["max(numara)"];
								$b_numara2=$_POST['gizli'];
		
								if  (isset($resim2) && strlen($resim2["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size2=$resim2["size"];		
									   if ($dosya_size2>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											  echo "12";
											  $dosya_gecici_isim2=$resim2["tmp_name"]; $dosya_isim2=$resim2["name"];  $dosya_tip2=$resim2["type"]; //echo $dosya_tip;
											  if ($dosya_tip2=='image/gif' ||  $dosya_tip2=='image/jpg' ||  $dosya_tip2=='image/pjpeg' ||  $dosya_tip2=='image/jpeg' ||  $dosya_tip2=='image/png') // Eger jpeg ya da bmp ise islem yap
												 {  						
													echo "xxxx";
													if ($dosya_tip2=='image/gif') { $uzanti2='gif'; } elseif ($dosya_tip2=='image/png') { $uzanti2='png'; } else {$uzanti2='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya2="kresim".$b_numara2.".".$uzanti2; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."kresim".$numara.".jpg")){ chmod($resim_dizini."kresim".$numara.".jpg",0777); unlink($resim_dizini."kresim".$numara.".jpg");}
													if (file_exists($resim_dizini."kresim".$numara.".gif")){ chmod($resim_dizini."kresim".$numara.".gif",0777); unlink($resim_dizini."kresim".$numara.".gif");}
													if (file_exists($resim_dizini."kresim".$numara.".png")){ chmod($resim_dizini."kresim".$numara.".png",0777); unlink($resim_dizini."kresim".$numara.".png");}
													// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													move_uploaded_file($resim2["tmp_name"] , $resim_dizini.$dosya2);
													if (file_exists($resim_dizini.$dosya2)) { chmod($resim_dizini.$dosya2,0644); }
													$resim_ekle2="Update $tablo_ismi Set  resim_adres2='$dosya2' where numara=$b_numara2";
													echo $resim_ekle2;
													@$baglanti->query($resim_ekle2)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   

								
								
								
								/// detay resim 1	
								$resim3=$_FILES["resim3"];
							    //$numara_bul_sql3="Select max(numara) from $tablo_ismi";
								//$numara_bul_sql_calistir3=@$baglanti->query($numara_bul_sql3)->fetchAll(PDO::FETCH_ASSOC);
								//$b_numara3=$numara_bul_sql_calistir3[0]["max(numara)"];
								$b_numara3=$_POST['gizli'];
								if  (isset($resim3) && strlen($resim3["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size3=$resim3["size"];		
									   if ($dosya_size3>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "13";
											  $dosya_gecici_isim3=$resim3["tmp_name"]; $dosya_isim3=$resim3["name"];  $dosya_tip3=$resim3["type"]; //echo $dosya_tip;
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
													move_uploaded_file($resim3["tmp_name"] , $resim_dizini.$dosya3);
													if (file_exists($resim_dizini.$dosya3)) { chmod($resim_dizini.$dosya3,0644); }
													$resim_ekle3="Update $tablo_ismi Set  resim_adres3='$dosya3' where numara=$b_numara3";
													@$baglanti->query($resim_ekle3)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   


								
								
								/// detay resim  2
								$resim4=$_FILES["resim4"];
							    //$numara_bul_sql4="Select max(numara) from $tablo_ismi";
								//$numara_bul_sql_calistir4=@$baglanti->query($numara_bul_sql4)->fetchAll(PDO::FETCH_ASSOC);
								//$b_numara4=$numara_bul_sql_calistir4[0]["max(numara)"];
								$b_numara4=$_POST['gizli'];
								if  (isset($resim4) && strlen($resim4["name"])!=0)// Resim Gelmis mi?																															
								   {
									   $dosya_size4=$resim4["size"];		
									   if ($dosya_size4>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "14";
											  $dosya_gecici_isim4=$resim4["tmp_name"]; $dosya_isim4=$resim4["name"];  $dosya_tip4=$resim4["type"]; //echo $dosya_tip;
											  if ($dosya_tip4=='image/gif' ||  $dosya_tip4=='image/jpg' ||  $dosya_tip4=='image/pjpeg' ||  $dosya_tip4=='image/jpeg' ||  $dosya_tip4=='image/png') // Eger jpeg ya da bmp ise islem yap
												 {  						
													if ($dosya_tip4=='image/gif') { $uzanti4='gif'; } elseif ($dosya_tip4=='image/png') { $uzanti4='png'; } else {$uzanti4='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya4="dresim".$b_numara4.".".$uzanti4; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Ada Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."dresim".$numara.".jpg")){ chmod($resim_dizini."dresim".$numara.".jpg",0777); unlink($resim_dizini."dresim".$numara.".jpg");}
													if (file_exists($resim_dizini."dresim".$numara.".gif")){ chmod($resim_dizini."dresim".$numara.".gif",0777); unlink($resim_dizini."dresim".$numara.".gif");}
													if (file_exists($resim_dizini."dresim".$numara.".png")){ chmod($resim_dizini."dresim".$numara.".png",0777); unlink($resim_dizini."dresim".$numara.".png");}
													// (f)  Daha Önce Ayni Ada Bir Resim Varsa Sil 
													move_uploaded_file($resim4["tmp_name"] , $resim_dizini.$dosya4);
													if (file_exists($resim_dizini.$dosya4)) { chmod($resim_dizini.$dosya4,0644); }
													$resim_ekle4="Update $tablo_ismi Set  resim_adres4='$dosya4' where numara=$b_numara4";
													@$baglanti->query($resim_ekle4)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }
								   


				
				
				
								//}
				
				
				
				
				
				
			}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (isset($err))
			{
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'urun_kodu']=$urun_kodu;
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;
				$_SESSION[$tablo_ismi.'teknikozellikler']=$teknikozellikler;
				$_SESSION[$tablo_ismi.'puan']=$puan;
				$_SESSION[$tablo_ismi.'fiyat']=$model;
				$_SESSION[$tablo_ismi.'link']=$link;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				$_SESSION[$tablo_ismi.'hata']=$hata;
				$_SESSION[$tablo_ismi.'uzunluk']=$nuzunluk;
				$_SESSION[$tablo_ismi.'yukseklik']=$yukseklik;
				$_SESSION[$tablo_ismi.'genislik']=$genislik;
				$_SESSION[$tablo_ismi.'agirlik']=$agirlik;
				$_SESSION[$tablo_ismi.'guc']=$guc;
				$_SESSION[$tablo_ismi.'toplama_kapasitesi']=$toplama_kapasitesi;
				$_SESSION[$tablo_ismi.'gereken_hp']=$gereken_hp;
				$_SESSION[$tablo_ismi.'toplama_hortumu']=$toplama_hortumu;
				$_SESSION[$tablo_ismi.'toz_hortumu']=$toz_hortumu;
				$_SESSION[$tablo_ismi.'saft_mili']=$saft_mili;
				$_SESSION[$tablo_ismi.'vakum_uzakligi']=$vakum_uzakligi;
				
				//$_SESSION[$tablo_ismi.'para_birimi']=$para_birimi;
				header("Location:duzenle.php?don=$err");
		    }
		else
			{
				//  S  T  A  R  T //////////////////////////////////////////////////////////////
				if (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0) 
				   {
					  // Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) 
					  if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
						 {
							$b_numara=$_POST['gizli'];
						 }
					  else
						 {
							$numara_bul_sql="Select max(numara) from $tablo_ismi";
							$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
						 }
					 $resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
					 if (count($resim_ogren)>0)	
						{
							$buyuk_resim=$resim_ogren[0]["resim_adres"];
							if ($buyuk_resim<>"") 
							   {
								  copy($resim_dizini.$buyuk_resim,$resim_dizini_ortaboy.$buyuk_resim);
								  copy($resim_dizini.$buyuk_resim,$thumb_resim_dizini.$buyuk_resim);							   
							    }
					   }   
				 }
				 
				
				if (isset($_FILES["resim2"]) && $_FILES["resim2"]["size"]>0) 
				   {
					  // Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) 
					  if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
						 {
							$b_numara2=$_POST['gizli'];
						 }
					  else
						 {
							$numara_bul_sql2="Select max(numara) from $tablo_ismi";
							$numara_bul_sql_calistir2=@$baglanti->query($numara_bul_sql2)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara2=$numara_bul_sql_calistir2[0]["max(numara)"];
						 }
					 $resim_ogren2=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara2")->fetchAll(PDO::FETCH_ASSOC);
					 if (count($resim_ogren2)>0)	
						{
							$buyuk_resim2=$resim_ogren2[0]["resim_adres2"];
							if ($buyuk_resim2<>"") 
							   {
								  copy($resim_dizini.$buyuk_resim2,$resim_dizini_ortaboy.$buyuk_resim2);
								  copy($resim_dizini.$buyuk_resim2,$thumb_resim_dizini.$buyuk_resim2);							   
							    }
					   }   
				   }			 
				 
				if (isset($_FILES["resim3"]) && $_FILES["resim3"]["size"]>0) 
				   {
					  // Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) 
					  if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
						 {
							$b_numara3=$_POST['gizli'];
						 }
					  else
						 {
							$numara_bul_sql3="Select max(numara) from $tablo_ismi";
							$numara_bul_sql_calistir3=@$baglanti->query($numara_bul_sql3)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara3=$numara_bul_sql_calistir3[0]["max(numara)"];
						 }
					 $resim_ogren3=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara3")->fetchAll(PDO::FETCH_ASSOC);
					 if (count($resim_ogren3)>0)	
						{
							$buyuk_resim3=$resim_ogren3[0]["resim_adres3"];
							if ($buyuk_resim3<>"") 
							   {
								  copy($resim_dizini.$buyuk_resim3,$resim_dizini_ortaboy.$buyuk_resim3);
								  copy($resim_dizini.$buyuk_resim3,$thumb_resim_dizini.$buyuk_resim3);							   
							    }
					   }   
				   }				 
				 
				if (isset($_FILES["resim4"]) && $_FILES["resim4"]["size"]>0) 
				   {
					  // Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) 
					  if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
						 {
							$b_numara4=$_POST['gizli'];
						 }
					  else
						 {
							$numara_bul_sql4="Select max(numara) from $tablo_ismi";
							$numara_bul_sql_calistir4=@$baglanti->query($numara_bul_sql4)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara4=$numara_bul_sql_calistir4[0]["max(numara)"];
						 }
					 $resim_ogren4=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara4")->fetchAll(PDO::FETCH_ASSOC);
					 if (count($resim_ogren4)>0)	
						{
							$buyuk_resim4=$resim_ogren4[0]["resim_adres4"];
							if ($buyuk_resim4<>"") 
							   {
								  copy($resim_dizini.$buyuk_resim4,$resim_dizini_ortaboy.$buyuk_resim4);
								  copy($resim_dizini.$buyuk_resim4,$thumb_resim_dizini.$buyuk_resim4);							   
							    }
					   }   
				   }				 
				 
				 
				 
				 
				 
				 
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			unset($_SESSION[$tablo_ismi.'ad']);
			unset($_SESSION[$tablo_ismi.'urun_kodu']);	
			unset($_SESSION[$tablo_ismi.'aciklama']);
			unset($_SESSION[$tablo_ismi.'puan']);
			unset($_SESSION[$tablo_ismi.'fiyat']);
			unset($_SESSION[$tablo_ismi.'link']);
			unset($_SESSION[$tablo_ismi.'teknikozellikler']);
			unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
			unset($_SESSION[$tablo_ismi.'hata']);
			unset($_SESSION[$tablo_ismi.'uzunluk']);
			unset($_SESSION[$tablo_ismi.'yukseklik']);
			unset($_SESSION[$tablo_ismi.'genislik']);
			unset($_SESSION[$tablo_ismi.'agirlik']);
			unset($_SESSION[$tablo_ismi.'guc']);
			unset($_SESSION[$tablo_ismi.'toplama_kapasitesi']);
			unset($_SESSION[$tablo_ismi.'gereken_hp']);
			unset($_SESSION[$tablo_ismi.'toplama_hortumu']);
			unset($_SESSION[$tablo_ismi.'toz_hortumu']);
			unset($_SESSION[$tablo_ismi.'saft_mili']);
			unset($_SESSION[$tablo_ismi.'vakum_uzakligi']);
			$altkategori=$_SESSION['alt_kategori'];
			include("yonlendir.php");
			header("Location:kontrol.php"); 	 
		 }	 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
			}
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>