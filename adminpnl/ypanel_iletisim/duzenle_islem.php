<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$ad=$_POST["ad"];
		$dil=$_POST["dil"];
		
		$adres1=$_POST["adres1"];
		$adres2=$_POST["adres2"];
		$adres3=$_POST["adres3"];
		$telefon1=$_POST["telefon1"];
		$telefon2=$_POST["telefon2"];
		$telefon3=$_POST["telefon3"];
		$telefon4=$_POST["telefon4"];
		$gsm1=$_POST["gsm1"];
		$gsm2=$_POST["gsm2"];
		$gsm3=$_POST["gsm3"];
		$gsm4=$_POST["gsm4"];
		$eposta1=$_POST["eposta1"];
		$eposta2=$_POST["eposta2"];
		$eposta3=$_POST["eposta3"];
		$calisma_saati1=$_POST["calisma_saati1"];
		$calisma_saati2=$_POST["calisma_saati2"];
		$calisma_saati3=$_POST["calisma_saati3"];
		
		
		
		//$ozet=$_POST["ozet"];
		//$icerik=$_POST["icerik"];
		//$puan=$_POST["puan"];
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$numara=$_POST["gizli"];
		if  ($_POST["ad"]<>'') 	
   		    { 	  	 
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
				$_SESSION[$tablo_ismi.'dil']=$dil;
				
				$_SESSION[$tablo_ismi.'adres1']=$adres1;
				$_SESSION[$tablo_ismi.'adres2']=$adres2;
				$_SESSION[$tablo_ismi.'adres3']=$adres3;
				$_SESSION[$tablo_ismi.'telefon1']=$telefon1;
				$_SESSION[$tablo_ismi.'telefon2']=$telefon2;
				$_SESSION[$tablo_ismi.'telefon3']=$telefon3;
				$_SESSION[$tablo_ismi.'telefon4']=$telefon4;
				$_SESSION[$tablo_ismi.'gsm1']=$gsm1;
				$_SESSION[$tablo_ismi.'gsm2']=$gsm2;
				$_SESSION[$tablo_ismi.'gsm3']=$gsm3;
				$_SESSION[$tablo_ismi.'gsm4']=$gsm4;
				$_SESSION[$tablo_ismi.'eposta1']=$eposta1;
				$_SESSION[$tablo_ismi.'eposta2']=$eposta2;
				$_SESSION[$tablo_ismi.'eposta3']=$eposta3;
				$_SESSION[$tablo_ismi.'calisma_saati1']=$calisma_saati1;
				$_SESSION[$tablo_ismi.'calisma_saati2']=$calisma_saati2;
				$_SESSION[$tablo_ismi.'calisma_saati3']=$calisma_saati3;
				
				
				header("Location:duzenle.php?err=$err&numara=$numara"); 
			}
		else
	        {
				unset($_SESSION[$tablo_ismi.'ad']);
				unset($_SESSION[$tablo_ismi.'dil']);
				
				unset($_SESSION[$tablo_ismi.'adres1']);
				unset($_SESSION[$tablo_ismi.'adres2']);
				unset($_SESSION[$tablo_ismi.'adres3']);
				unset($_SESSION[$tablo_ismi.'telefon1']);
				unset($_SESSION[$tablo_ismi.'telefon2']);
				unset($_SESSION[$tablo_ismi.'telefon3']);
				unset($_SESSION[$tablo_ismi.'telefon4']);
				unset($_SESSION[$tablo_ismi.'gsm1']);
				unset($_SESSION[$tablo_ismi.'gsm2']);
				unset($_SESSION[$tablo_ismi.'gsm3']);
				unset($_SESSION[$tablo_ismi.'gsm4']);
				unset($_SESSION[$tablo_ismi.'eposta1']);
				unset($_SESSION[$tablo_ismi.'eposta2']);
				unset($_SESSION[$tablo_ismi.'eposta3']);
				unset($_SESSION[$tablo_ismi.'calisma_saati1']);
				unset($_SESSION[$tablo_ismi.'calisma_saati2']);
				unset($_SESSION[$tablo_ismi.'calisma_saati3']);
				
				
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
					   if (count($resim_ogren)>0)	
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
														@chmod($resim_dizini.$buyuk_resim,0777); @unlink($resim_dizini.$buyuk_resim);
													}
											}
										else
											{
												Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$byk_m_w,$byk_m_h);
											}
									}
								// Eger buyuk ve orta resim ayni boyuttaysa buyuk resim siliniyor (f)
							}   
							// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) //////////////////////////////////
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