<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
      include($uzaklik."inc_s/baglanti.php");
	  //$syonetim=$_SESSION["siteyonetici"];
	  //include("boyut_ogren.php");
	  $n_ad=addslashes($_POST["ad"]);
	  $n_gorsel=$_POST["gorsel"];
	  $n_referans=$_POST["referans"];
	  $n_puan=$_POST["puan"];
	  $n_dil=$_POST["dil"];
	  $n_hizmetkategori=$_POST["hizmetkategori"];
	  $n_ozet=addslashes($_POST["ozet"]);
	  $n_aciklama=addslashes($_POST["aciklama"]);
	  $n_htaccess_etiket=$_POST["htaccess_etiket"];
	  $n_renk=$_POST["renk"];
	  $n_radiobutton=$_POST["radyo"];
	  if ( $_POST["ad"]<>'' ||  $_POST["puan"]<>'') 	
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
			  $_SESSION[$tablo_ismi.'n_puan']=$n_puan;
			  $_SESSION[$tablo_ismi.'n_ozet']=$n_ozet;
			  $_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
			  $_SESSION[$tablo_ismi.'n_dil']=$n_dil;
			  $_SESSION[$tablo_ismi.'n_hizmetkategori']=$n_hizmetkategori;
			  $_SESSION[$tablo_ismi.'n_htaccess_etiket']=$n_htaccess_etiket;
			  $_SESSION[$tablo_ismi.'n_radyo']=$n_radiobutton;
			  $_SESSION[$tablo_ismi.'n_gorsel']=$n_gorsel;
			  $_SESSION[$tablo_ismi.'n_referans']=$n_referans;
			  $_SESSION[$tablo_ismi.'n_renk']=$n_renk;
			  header("Location:ekle.php?err=$err"); 
		 }
	  else
		 {
			  unset($_SESSION[$tablo_ismi.'n_puan']);
			  unset($_SESSION[$tablo_ismi.'n_ad']);
			  unset($_SESSION[$tablo_ismi.'n_ozet']);
			  unset($_SESSION[$tablo_ismi.'n_aciklama']);
			  unset($_SESSION[$tablo_ismi.'n_dil']);
			  unset($_SESSION[$tablo_ismi.'n_referans']);
			  unset($_SESSION[$tablo_ismi.'n_gorsel']);
			  unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']);
			  unset($_SESSION[$tablo_ismi.'n_hizmetkategori']);
			  unset($_SESSION[$tablo_ismi.'n_renk']);
			  unset($_SESSION[$tablo_ismi.'n_radyo']);
			  include($uzaklik."inc_s/thumbnail.php");
			  $numara_bul_sql="Select max(numara) from $tablo_ismi";
			  $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
			  $b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
			  if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0)
				  {
					if  ($insert==0)
						{
							$b_numara=$_POST['gizli'];
						} 
					else 
						{
							$numara_bul_sql="Select max(numara) from $tablo_ismi";
							$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara=$numara_bul_sql_calistir[0]["max(numara)"]; 
						}
					$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
					$buyuk_resim=$resim_ogren[0]["resim_adres"];
					Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$kck_m_w,$kck_m_h);
				 }
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
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>