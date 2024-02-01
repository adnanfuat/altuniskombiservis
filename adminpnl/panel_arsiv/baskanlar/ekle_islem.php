<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
    	include($uzaklik."inc_s/baglanti.php");
		$n_ad=$_POST["ad"];
		$n_sube=$_POST["sube"];
		$n_adres=$_POST["adres"];
		$n_telefon=$_POST["telefon"];
		$n_web=$_POST["web"];
		$n_vno=$_POST["vno"];
		$n_puan=$_POST["puan"];
		$n_resim=$_FILES["resim"];
		$n_genislik=$_POST["genislik"];
		$n_yukseklik=$_POST["yukseklik"];
		$n_link=$_POST["link"];
		$n_altbilgi=$_POST["altbilgi"];
	    if  (isset($_POST["ad"]) && $_POST["ad"]<>'') // && isset($_FILES["resim"]) &&  strlen($_FILES["resim"]["name"])!=0 	
			{ 	
				$eklenme_tarihi=date('Ymd'); include("ekle_sql.php");					
			} 
		else
			{
				$err="eksik_veri";
		    }	
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if (isset($err))
 		   {
				$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				$_SESSION[$tablo_ismi.'n_sube']=$n_sube;
				$_SESSION[$tablo_ismi.'n_adres']=$n_adres;
				$_SESSION[$tablo_ismi.'n_telefon']=$n_telefon;
				$_SESSION[$tablo_ismi.'n_web']=$n_web;
				$_SESSION[$tablo_ismi.'n_vno']=$n_vno;
				$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
				$_SESSION[$tablo_ismi.'n_resim']=$n_resim;
				$_SESSION[$tablo_ismi.'n_genislik']=$n_genislik;
				$_SESSION[$tablo_ismi.'n_yukseklik']=$n_yukseklik;
				$_SESSION[$tablo_ismi.'n_link']=$n_link;
				$_SESSION[$tablo_ismi.'n_altbilgi']=$n_altbilgi;
				//header("Location:ekle.php?err=$err"); 
		   }
		else
  		   {
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_sube']);
				unset($_SESSION[$tablo_ismi.'n_adres']);
				unset($_SESSION[$tablo_ismi.'n_telefon']);
				unset($_SESSION[$tablo_ismi.'n_web']);
				unset($_SESSION[$tablo_ismi.'n_vno']);
				unset($_SESSION[$tablo_ismi.'n_puan']);
				unset($_SESSION[$tablo_ismi.'n_yukseklik']);
				unset($_SESSION[$tablo_ismi.'n_genislik']);
				unset($_SESSION[$tablo_ismi.'n_resim']);
				unset($_SESSION[$tablo_ismi.'n_link']);
				unset($_SESSION[$tablo_ismi.'n_altbilgi']);
			} 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
		<? include("yonlendir.php"); ?>
        <form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
        <script>
        var sonuc=window.confirm("Yeni Bir Reklam Eklemek Istiyor musunuz?");
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