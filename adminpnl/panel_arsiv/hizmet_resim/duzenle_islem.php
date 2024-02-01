<? session_start();
$link_inherit='duzenle_islem.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$hizmet=$_SESSION[$tablo_ismi."hizmet"];
		$numara=$_POST['gizli'];
		$aciklama=addslashes($_POST["aciklama"]);
		$htaccess_etiket=$_POST["htaccess_etiket"];
		$ad=addslashes($_POST["ad"]);
		$siralama=$_POST["siralama"];
		include($uzaklik."inc_s/resim_islem.php");	
		////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla.. (s)
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'siralama']=$siralama;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				header("Location:duzenle.php?don=$err"); 
		   }
		else
		   {
				 if ($insert==0)
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
							   if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0)
								   {
										include($uzaklik."inc_s/thumbnail.php");
										// buyuk resmi boyutlandirip olusturmak icin ///////////////////////////////////////////////////////// (s)
										if  (file_exists($ortaboy_resim_dizini.$buyuk_resim))     
											{  
												@chmod($ortaboy_resim_dizini.$buyuk_resim,0777); 
												@unlink($ortaboy_resim_dizini.$buyuk_resim);
											}
										if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<> $resim_dizini)
											{
												thumbnail($resim_dizini,$buyuk_resim,$ortaboy_resim_dizini,$byk_m_w,$byk_m_h);
											}
										if  (file_exists($thumb_resim_dizini.$buyuk_resim))
											{
												@chmod($thumb_resim_dizini.$buyuk_resim,0777);
												@unlink($thumb_resim_dizini.$buyuk_resim);
											}
										if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<> $resim_dizini)
											{
												thumbnail($ortaboy_resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
											}
										/* buyuk resim orta boy resimden b�y�k degilse, b�y�k resmi sil (s) */
										if  (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($ortaboy_resim_dizini.$buyuk_resim))
											{
												@chmod($resim_dizini.$buyuk_resim,0777); @unlink($resim_dizini.$buyuk_resim);
											}
										/* buyuk resim orta boy resimden b�y�k degilse, b�y�k resmi sil (f) */
								    }
						   }// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
				   }   
				// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
				//////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'aciklama']);
				unset($_SESSION[$tablo_ismi.'siralama']);
				unset($_SESSION[$tablo_ismi.'ad']);
				unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
				include("yonlendir.php");
				header("Location:kontrol.php"); 	 
		   }	 
		    ////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla..	 (f)
	   } 
  else 
	   {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>