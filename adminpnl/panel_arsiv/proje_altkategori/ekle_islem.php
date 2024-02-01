<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
   	    include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$n_ad=$_POST["ad"];
		$n_aciklama=$_POST["aciklama"];
		$n_siralama=$_POST["siralama"];
		$n_htaccess_etiket=$_POST["htaccess_etiket"];
		$ust_kategori_no=$_SESSION["ust_kategori_no"];	
		if  (isset($_POST["ad"]) && $_POST["ad"]<>'') 	
    		{
				$n_eklenme_tarihi=date('Ymd');
				include($uzaklik."inc_s/resim_islem.php");
			}
		else
			{
				$err="eksik_veri";
   		    }
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
	   if (isset($err))
		  {
			    $_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				$_SESSION[$tablo_ismi.'n_siralama']=$n_siralama;
				$_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$n_htaccess_etiket;
			    header("Location:ekle.php?err=$err"); 
		  }
	  else
		  {
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_siralama']);
				unset($_SESSION[$tablo_ismi.'n_aciklama']);
				unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
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
		if  (document.all)
			{
				deger=document.formumuz.gizli.value;
				window.location.href="kontrol.php?sayfa_no="+deger; 
			}
		else
			{
				window.location.href="kontrol.php";
			}
	}		
</script>
<?
    } 
else 
    {
		unset($_SESSION['yonet']);
		include("error.php");
	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>