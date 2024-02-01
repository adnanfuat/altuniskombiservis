<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
   	   	include($uzaklik."inc_s/baglanti.php");	
		$numara=$_POST["gizli"];
		$dil=$_POST["dil"];
		$puan=$_POST["puan"];
		if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0 )
			{
				$ad=addslashes($_POST["ad"]);	$hata[1]=0;
			}
		else
			{
				$ad='';	$hata[1]=1;
			}
		if  (isset($_POST["eposta"]) && strlen($_POST["eposta"])<>0)
			{
				$eposta=$_POST["eposta"]; $hata[2]=0;
			}
		else
			{
				$eposta='';	$hata[2]=1;
			}				
		if  (isset($_POST["mesaj"]) && strlen($_POST["mesaj"])<>0)
			{
				$mesaj=addslashes($_POST["mesaj"]); $hata[3]=0;
			}
		else
			{
				$mesaj='';	$hata[3]=1;
			}				
		if  (isset($_POST["telefon"]) && strlen($_POST["telefon"])<>0)
			{
				$telefon=$_POST["telefon"]; $hata[6]=0;
			}
		else
			{
				$telefon='';	$hata[6]=1;
			}				
		if  ($hata[1]==1 || $hata[2]==1 || $hata[3]==1 || $hata[6]==1)
			{
				$err="eksik_veri"; 
			} 
		else 
			{ 
				include("duzenle_sql.php");
			}	
	    ////////////////////////////////////////////////////////////////////////
		if  (isset($err))
		 	{
				$_SESSION[$tablo_ismi."ad"]=$ad; 
				$_SESSION[$tablo_ismi."eposta"]=$eposta;
				$_SESSION[$tablo_ismi."mesaj"]=$mesaj;
				$_SESSION[$tablo_ismi."telefon"]=$telefon;
				$_SESSION[$tablo_ismi."puan"]=$puan;
				$_SESSION[$tablo_ismi."dil"]=$dil;
				$_SESSION[$tablo_ismi."hata"]=$hata;			
				header("Location:duzenle.php?err=$err&numara=$numara"); 
			}
	    else
	        {
				unset($_SESSION[$tablo_ismi."ad"]); 
				unset($_SESSION[$tablo_ismi."eposta"]);
				unset($_SESSION[$tablo_ismi."mesaj"]);
				unset($_SESSION[$tablo_ismi."telefon"]);
				unset($_SESSION[$tablo_ismi."puan"]);
				unset($_SESSION[$tablo_ismi."dil"]);
				unset($_SESSION[$tablo_ismi."hata"]);			
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