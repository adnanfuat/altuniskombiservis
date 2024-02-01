<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
   	   	include($uzaklik."inc_s/baglanti.php");	
		$numara=$_POST["gizli"];
		$dil=$_POST["dil"];
		if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0)
			{
				$ad=addslashes($_POST["ad"]);	$hata[1]=0;
			}
		else
			{
				$ad='';	$hata[1]=1;
			}
		if  (isset($_POST["icerik"]) && strlen($_POST["icerik"])<>0)
			{
				$icerik=addslashes($_POST["icerik"]);$hata[2]=0;
			}
		else
			{
				$icerik='';	$hata[2]=1;
			}				
		if  ($hata[1]==1 || $hata[2]==1)
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
				$_SESSION[$tablo_ismi."icerik"]=$icerik;
				$_SESSION[$tablo_ismi."hata"]=$hata;	
				$_SESSION[$tablo_ismi."dil"]=$dil;			
				header("Location:duzenle.php?err=$err&numara=$numara"); 
			}
	    else
	        {
				unset($_SESSION[$tablo_ismi."ad"]); 
				unset($_SESSION[$tablo_ismi."icerik"]);
				unset($_SESSION[$tablo_ismi."hata"]);
				unset($_SESSION[$tablo_ismi."dil"]);			
			    include("yonlendir.php");
	 		    header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
		    }
		////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla..	 (f)
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>