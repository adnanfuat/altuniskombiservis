<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$ad=addslashes($_POST["ad"]);
		$ozet=addslashes($_POST["ozet"]);
		$icerik=addslashes($_POST["icerik"]);
		$dil=$_POST["dil"];
		$eski_fiyat=addslashes($_POST["eski_fiyat"]);
		$yeni_fiyat=addslashes($_POST["yeni_fiyat"]);
		$htaccess_etiket=$_POST["htaccess_etiket"];
		//$puan=$_POST["puan"];
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$numara=$_POST["gizli"];
		if  ($_POST["ad"]<>'' && $_POST["icerik"]<>'') 	
   		    { 	
			echo 1;	  	 
				include($uzaklik."inc_s/resim_islem.php");
		    } 
		else 
		   { 
				$err="eksik_veri"; 
		   }	
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
  		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'icerik']=$icerik;
				$_SESSION[$tablo_ismi.'ozet']=$ozet;
				$_SESSION[$tablo_ismi.'eski_fiyat']=$eski_fiyat;
				$_SESSION[$tablo_ismi.'yeni_fiyat']=$yeni_fiyat;
				$_SESSION[$tablo_ismi.'dil']=$dil;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
			}
		else
	        {
				unset($_SESSION[$tablo_ismi.'ad']);
				unset($_SESSION[$tablo_ismi.'icerik']);
				unset($_SESSION[$tablo_ismi.'ozet']);
				unset($_SESSION[$tablo_ismi.'eski_fiyat']);
				unset($_SESSION[$tablo_ismi.'yeni_fiyat']);
				unset($_SESSION[$tablo_ismi.'dil']);
				unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
				if  (isset($_FILES["icon"]) && strlen($_FILES["icon"]["name"])!=0)	// icon Gelmis mi?																															
						   {
							   $dosya_size=$_FILES["icon"]["size"];		
						   		if ($dosya_size>$max_file_size)	  
									{	
										//$err='boyut'; 
									}
	          	           		else
						           {				 
										$dosya_gecici_isim=$_FILES["icon"]["tmp_name"];
					                    $dosya_isim = $_FILES["icon"]["name"];
										$dosya_tip = $_FILES["icon"]["type"];

										if    ($dosya_tip=='image/jpeg' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg') // Eger jpeg ya da bmp ise islem yap
											  {  						
												 if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													if ($insert==0) {$numara=$_POST['gizli'];} //print "numara deger gizliden alindi <br> numara: ".$numara;
													 else {
															 $numara_bul_sql="Select max(numara) from ".$tablo_ismi;
															 $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
															 $numara=$numara_bul_sql_calistir[0]["max(numara)"]; 	//print("yeni kampanya no: : ".$kampanya_no." <br>") ;																																																						
														  }
															 $dosya="icon".$numara.".".$uzanti; // bir dosya ismi oluþtur...																			  
														
														// (s)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															  if (file_exists($icon_dizini."icon".$numara.".jpg"))    {  chmod($icon_dizini."icon".$numara.".jpg",0777); unlink($icon_dizini."icon".$numara.".jpg");}
															  if (file_exists($icon_dizini."icon".$numara.".gif"))    {  chmod($icon_dizini."icon".$numara.".gif",0777); unlink($icon_dizini."icon".$numara.".gif");}
														// (f)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															
															
																
													move_uploaded_file($_FILES["icon"]["tmp_name"] , $icon_dizini.$dosya);
													if (file_exists($icon_dizini.$dosya))    {  chmod($icon_dizini.$dosya,0644); }

													$icon_ekle="Update $tablo_ismi Set  icon_adres='$dosya' where numara=$numara";
													@$baglanti->query($icon_ekle)->fetchAll(PDO::FETCH_ASSOC);		
													//print $dosya;
											  }																												       											
										else
											 {																							   
												//$err='uzanti';																							   
											 }
					  
             					 } // icon geldi mi ?
																		 
							}	// eger resim geldiyse
							
							
			   if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0) 
					{
						if  ($insert==0)
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
					   if   (count($resim_ogren)>0)	
						    {
								$buyuk_resim=$resim_ogren[0]["resim_adres"];
								if  ($buyuk_resim<>"")
									{
										include($uzaklik."inc_s/thumbnail.php");
										// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
									    if  (file_exists($thumb_resim_dizini.$buyuk_resim))     
											{  
												@chmod($thumb_resim_dizini.$buyuk_resim,0777); @unlink($thumb_resim_dizini.$buyuk_resim);
											}
										Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
										// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)					
									} // Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
			
							}   
						// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
						// Eger buyuk ve kucuk resim ayni boyuttaysa buyuk resim siliniyor (s)
						if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<>$resim_dizini && file_exists($thumb_resim_dizini.$buyuk_resim) && $thumb_resim_dizini.$buyuk_resim<>$thumb_resim_dizini)
							{
								$kucuk=getimagesize($thumb_resim_dizini.$buyuk_resim);
								$buyuk=getimagesize($resim_dizini.$buyuk_resim);
								$b_width=$buyuk[0];
								$k_width=$kucuk[0];							
								if  ($b_width==$k_width)
									{
									    if  (file_exists($resim_dizini.$buyuk_resim))    
											{  
												@chmod($resim_dizini.$buyuk_resim,0777); 
												@unlink($resim_dizini.$buyuk_resim);
											}
										else
											{
												Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$byk_m_w,$byk_m_h);
											}
									}
							}
						// Eger buyuk ve orta resim ayni boyuttaysa buyuk resim siliniyor (f)
					} // eger resim geldiyse				
							
					/////////////////////////////////////////////////////////////////////////////////////////////
					///////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
					include("yonlendir.php");
		 		    header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
			}
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
   } 
else 
   {
	    unset($_SESSION['yonet']);
	    include('error.php');
    }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>