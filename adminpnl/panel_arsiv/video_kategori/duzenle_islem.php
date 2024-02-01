<? 	session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$ad=$_POST["ad"];
		$puan=$_POST["puan"];	
   	   	include($uzaklik."inc_s/baglanti.php");
		$numara=$_POST["gizli"];
		if  (isset($_POST["ad"]))
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
				$_SESSION[$tablo_ismi.'puan']=$puan;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		  }
	  else
		  {
			    if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
			    if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
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