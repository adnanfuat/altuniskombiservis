<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {  echo 1;
      include($uzaklik."inc_s/baglanti.php");
	  $n_ad=$_POST["ad"];
	  $n_dil=$_POST["dil"];
	  $n_puan=$_POST["puan"];
	  if ($_POST["ad"]<>'' ||  $_POST["puan"]<>'')
    	 { 	  	 
			include($uzaklik."inc_s/resim_islem.php");	echo 2;				
		 } 
	  else
		 {
			$err="eksik_veri"; echo 3;
	   	 }	
	  ////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
	  if (isset($err))
		 {
			$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
			$_SESSION[$tablo_ismi.'n_dil']=$n_dil;
			$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
			header("Location:ekle.php?err=$err");  echo 4;
		 }
	  else
		 {
			unset($_SESSION[$tablo_ismi.'n_puan']);
			unset($_SESSION[$tablo_ismi.'n_ad']);
			unset($_SESSION[$tablo_ismi.'n_dil']); echo 5;
		 } 
	  ////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
<? include("yonlendir.php"); ?><form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
<script>
var sonuc=window.confirm("Yeni Bir Kayit Eklemek Istiyor musunuz?");
if  (sonuc)
	{
		window.location="ekle.php";
	}
else
	{
		deger=document.formumuz.gizli.value;
		window.location="kontrol.php?sayfa_no="+deger;
	}		
</script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>