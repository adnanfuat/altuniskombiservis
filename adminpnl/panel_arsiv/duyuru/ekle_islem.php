<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
   	    include($uzaklik."inc_s/baglanti.php");
		$n_dil=$_POST["dil"];
		if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0)
			{
				$n_ad=addslashes($_POST["ad"]); $n_hata[1]=0;
			}
		else
			{
				$n_ad=''; $n_hata[1]=1;
			}
		if (isset($_POST["icerik"]) && strlen($_POST["icerik"])<>0)
			{
				$n_icerik=addslashes($_POST["icerik"]); $n_hata[2]=0;
			}
		else
			{
				$n_icerik=''; $n_hata[2]=1;
			}				
		if  ($n_hata[1]==1 || $n_hata[2]==1)
			{
				$err="eksik_veri"; 
			} 
		else 
			{ 
				include("ekle_sql.php");
			}	
		////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla.. (s)
		if  (isset($err))
			{
				$_SESSION[$tablo_ismi."n_ad"]=$n_ad; 
				$_SESSION[$tablo_ismi."n_icerik"]=$n_icerik;	
				$_SESSION[$tablo_ismi."n_hata"]=$n_hata;	
				$_SESSION[$tablo_ismi."n_dil"]=$n_dil;		
				header("Location:ekle.php?err=$err"); 
			}
		else
			{
				unset($_SESSION[$tablo_ismi.'n_ad']);	
				unset($_SESSION[$tablo_ismi.'n_icerik']);
				unset($_SESSION[$tablo_ismi.'n_hata']);
				unset($_SESSION[$tablo_ismi.'n_dil']);
			} 
		////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla..	 (f)
?>
<? include("yonlendir.php"); ?>
<form name="formumuz">
<input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>">
</form>
<script>
var sonuc=window.confirm("Yeni Bir Duyuru Eklemek Istiyor musunuz?");
if (sonuc)
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
   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadr.
?>
