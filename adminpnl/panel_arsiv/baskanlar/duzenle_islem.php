<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		$ad=$_POST["ad"];
		$sube=$_POST["sube"];
		$adres=$_POST["adres"];
		$telefon=$_POST["telefon"];
		$web=$_POST["web"];
		$vno=$_POST["vno"];
		$puan=$_POST["puan"];
		$genislik=$_POST["genislik"];
		$yukseklik=$_POST["yukseklik"];
		$link=$_POST["link"];
		$altbilgi=$_POST["altbilgi"];
		$resim=$_FILES["resim"];
   	   	include($uzaklik."inc_s/baglanti.php");
		$numara=$_POST["gizli"];
		if (isset($_POST["ad"])) //&& strlen($_POST["ad"])<>0 && isset($_FILES["resim"])  	
   		   { 	  	 
				include("duzenle_sql.php");
		   } 
	    else 
		   { 
				$err="eksik_veri"; 
		   }	
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
	    if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'sube']=$sube;
				$_SESSION[$tablo_ismi.'adres']=$adres;
				$_SESSION[$tablo_ismi.'telefon']=$telefon;
				$_SESSION[$tablo_ismi.'web']=$web;
				$_SESSION[$tablo_ismi.'vno']=$vno;
				$_SESSION[$tablo_ismi.'puan']=$puan;
				$_SESSION[$tablo_ismi.'genislik']=$genislik;
				$_SESSION[$tablo_ismi.'yukseklik']=$yukseklik;
				$_SESSION[$tablo_ismi.'link']=$link;
				$_SESSION[$tablo_ismi.'altbilgi']=$altbilgi;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		   }
	    else
    	   {
				if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
				if (isset($_SESSION[$tablo_ismi.'sube'])) {unset($_SESSION[$tablo_ismi.'sube']);}
				if (isset($_SESSION[$tablo_ismi.'adres'])) {unset($_SESSION[$tablo_ismi.'adres']);}
				if (isset($_SESSION[$tablo_ismi.'il'])) {unset($_SESSION[$tablo_ismi.'il']);}
				if (isset($_SESSION[$tablo_ismi.'vd'])) {unset($_SESSION[$tablo_ismi.'vd']);}
				if (isset($_SESSION[$tablo_ismi.'vno'])) {unset($_SESSION[$tablo_ismi.'vno']);}
				if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
				if (isset($_SESSION[$tablo_ismi.'resim'])) {unset($_SESSION[$tablo_ismi.'resim']);}
				if (isset($_SESSION[$tablo_ismi.'yukseklik'])) {unset($_SESSION[$tablo_ismi.'yukseklik']);}
				if (isset($_SESSION[$tablo_ismi.'genislik'])) {unset($_SESSION[$tablo_ismi.'genislik']);}
				if (isset($_SESSION[$tablo_ismi.'link'])) {unset($_SESSION[$tablo_ismi.'link']);}
				if (isset($_SESSION[$tablo_ismi.'altbilgi'])) {unset($_SESSION[$tablo_ismi.'altbilgi']);}
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