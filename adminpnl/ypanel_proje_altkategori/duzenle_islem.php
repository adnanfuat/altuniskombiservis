<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
  	   	include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$numara=$_POST["gizli"];
		$ad=$_POST["ad"];
		$aciklama=$_POST["aciklama"];
		$siralama=$_POST["siralama"];
		$htaccess_etiket=$_POST["htaccess_etiket"];
		$arkaplan=$_POST["arkaplan"];
		$video_link=$_POST["video_link"]; //echo $video_link;
		
		$bu_etikete_sahip_sektor_varmi=@$baglanti->query("Select ad from $tablo_ismi where htaccess_etiket='$htaccess_etiket' and numara<>'$numara'")->fetchAll(PDO::FETCH_ASSOC);
		if (count($bu_etikete_sahip_sektor_varmi)>0)
			{
				$err="etiket&numara=$numara"; //echo $err;
				header("Location:duzenle.php?err=etiket&numara=$numara");
			}
		else
			{
				if (isset($_POST["ad"]))
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
			  $_SESSION[$tablo_ismi.'aciklama']=$aciklama;
			  $_SESSION[$tablo_ismi.'siralama']=$siralama;
			  $_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
			  $_SESSION[$tablo_ismi.'arkaplan']=$arkaplan;
			  $_SESSION[$tablo_ismi.'video_link']=$video_link;
			  header("Location:duzenle.php?err=$err&alt_kategori=$numara"); 
		 }
	  else
    	 {
				 if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
					{
						$b_numara=$_POST['gizli'];
					}
				else
					{
						$numara_bul_sql="Select max(numara) from $tablo_ismi";
						$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
						$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
					}	// En son eklenen kaydin numarasi ogreniliyor (f)
				$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
				if  (count($resim_ogren)>0)
					{
						$buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  ($buyuk_resim<>"")
							{
								include($uzaklik."inc_s/thumbnail.php");
								// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
								if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<> $resim_dizini)
								    {
										thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$kck_m_w,$kck_m_h);
									}
								// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)
							}// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
					}   
						// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
					//////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////
			 unset($_SESSION[$tablo_ismi.'ad']); 
			 unset($_SESSION[$tablo_ismi.'siralama']);
			 unset($_SESSION[$tablo_ismi.'aciklama']);
			 unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
			 unset($_SESSION[$tablo_ismi.'arkaplan']);
			 unset($_SESSION[$tablo_ismi.'video_link']);
			 include("yonlendir.php");
 			 header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
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