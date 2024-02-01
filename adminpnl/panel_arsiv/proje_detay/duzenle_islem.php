<? session_start();
$link_inherit='duzenle_islem.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		unset($_SESSION[$tablo_ismi.'ad']);	
		unset($_SESSION[$tablo_ismi.'puan']);
		unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'hata']);
		unset($_SESSION[$tablo_ismi.'htaccess_etiket']);

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
	    $fiyat=$_POST["fiyat"];
		$htaccess_etiket=$_POST["htaccess_etiket"];
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
		if  ($hata[1]==1)
			{ 
				$err='eksik_veri'; 
			} 
	    else 
			{ 
				include($uzaklik."inc_s/resim_islem.php"); 
			}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (isset($err))
			{
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;
				$_SESSION[$tablo_ismi.'puan']=$puan;
				$_SESSION[$tablo_ismi.'fiyat']=$fiyat;
				$_SESSION[$tablo_ismi.'hata']=$hata;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
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
								 /* include($uzaklik."inc_s/thumbnail.php");
								  if (file_exists($resim_dizini_ortaboy.$buyuk_resim))     
									 {  
										@chmod($resim_dizini_ortaboy.$buyuk_resim,0777); 
										@unlink($resim_dizini_ortaboy.$buyuk_resim);
									 }
								  Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
								  if (file_exists($thumb_resim_dizini.$buyuk_resim))     
									 {  
										@chmod($thumb_resim_dizini.$buyuk_resim,0777); 
										@unlink($thumb_resim_dizini.$buyuk_resim);
									 }
								 Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
								 if (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim)) 
									{
										$buyuk_resim_boyut=getimagesize($resim_dizini.$buyuk_resim);
										$buyuk_resim_yukseklik=$buyuk_resim_boyut[1];
										$buyuk_resim_genislik=$buyuk_resim_boyut[0];	
										$ortaboy_resim=getimagesize($resim_dizini_ortaboy.$buyuk_resim);
										$ortaboy_resim_yukseklik=$ortaboy_resim[1];
										$ortaboy_resim_genislik=$ortaboy_resim[0];							
										if ($buyuk_resim_yukseklik<=$ortaboy_resim_yukseklik && $buyuk_resim_genislik<=$ortaboy_resim_genislik)
										   { 
										   	    @chmod($resim_dizini.$buyuk_resim,0777); 
												@unlink($resim_dizini.$buyuk_resim); 
										   }
									}*/
							  }
					   }   
				 }
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			unset($_SESSION[$tablo_ismi.'ad']);
			unset($_SESSION[$tablo_ismi.'aciklama']);
			unset($_SESSION[$tablo_ismi.'puan']);
			unset($_SESSION[$tablo_ismi.'fiyat']);
			unset($_SESSION[$tablo_ismi.'hata']);
			unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
			$altkategori=$_SESSION['alt_kategori'];
			include("yonlendir.php");
			header("Location:kontrol.php"); 	 
		 }	 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>