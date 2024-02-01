<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		$ad=$_POST["ad"];
		$puan=$_POST["puan"];
		$genislik=$_POST["genislik"];
		$yukseklik=$_POST["yukseklik"];
		$link=$_POST["link"];
		$altbilgi=$_POST["altbilgi"];
		$dil=$_POST["dil"];
		$resim=$_FILES["resim"];
		$resim2=$_FILES["resim2"]; //print_r ($resim2);
		$resim3=$_FILES["resim3"]; //print_r ($resim3);
   	   	include($uzaklik."inc_s/baglanti.php");
		$numara=$_POST["gizli"];
		if (isset($_POST["ad"]) && strlen($_POST["ad"])<>0 && (isset($_FILES["resim"]) || isset($_FILES["resim2"]) || isset($_FILES["resim3"])))  	
   		   { 	  	 
				include("duzenle_sql.php");
				//echo 1;
				
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
				$_SESSION[$tablo_ismi.'genislik']=$genislik;
				$_SESSION[$tablo_ismi.'yukseklik']=$yukseklik;
				$_SESSION[$tablo_ismi.'link']=$link;
				$_SESSION[$tablo_ismi.'altbilgi']=$altbilgi;
				$_SESSION[$tablo_ismi.'dil']=$dil;
				header("Location:duzenle.php?err=$err&numara=$numara");
				//echo 2; 
		   }
	    else
    	   {
				if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
				if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
				if (isset($_SESSION[$tablo_ismi.'resim'])) {unset($_SESSION[$tablo_ismi.'resim']);}
				if (isset($_SESSION[$tablo_ismi.'resim2'])) {unset($_SESSION[$tablo_ismi.'resim2']);}
				if (isset($_SESSION[$tablo_ismi.'resim3'])) {unset($_SESSION[$tablo_ismi.'resim3']);}
				if (isset($_SESSION[$tablo_ismi.'yukseklik'])) {unset($_SESSION[$tablo_ismi.'yukseklik']);}
				if (isset($_SESSION[$tablo_ismi.'genislik'])) {unset($_SESSION[$tablo_ismi.'genislik']);}
				if (isset($_SESSION[$tablo_ismi.'link'])) {unset($_SESSION[$tablo_ismi.'link']);}
				if (isset($_SESSION[$tablo_ismi.'altbilgi'])) {unset($_SESSION[$tablo_ismi.'altbilgi']);}
				if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
				include("yonlendir.php");
		 		header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 
				//echo 3;	 
		   }
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
	} 
else 
    {
		  unset($_SESSION['yonet']);
		  include('error.php');
  	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>