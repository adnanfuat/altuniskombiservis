<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
        include($uzaklik."inc_s/baglanti.php");
		/*$syonetim=$_SESSION["siteyonetici"];
		$boyut_ogren=@$baglanti->query("Select galeri_kategori_genislik, galeri_kategori_yukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		if  ($boyut_ogren_sayi>0)
			{
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_genislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_yukseklik"];
			}
		else
			{
				$boyut_ogren=@$baglanti->query("Select galeri_kategori_vgenislik, galeri_kategori_vyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
				$boyut_ogren_sayi=count($boyut_ogren);
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_vgenislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_vyukseklik"];
			}*/
	  $n_altkategorilimi=$_POST["altkategorilimi"];
	  $n_ad=$_POST["ad"];
	  $n_puan=$_POST["puan"];
	  $n_dil=$_POST["dil"];
	  if ($_POST["ad"]<>'' ||  $_POST["puan"]<>'')
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
			 $_SESSION[$tablo_ismi.'ad']=$ad;
			 $_SESSION[$tablo_ismi.'puan']=$puan;
			 $_SESSION[$tablo_ismi.'dil']=$dil;
			 $_SESSION[$tablo_ismi.'alkategorilimi']=$altkategorilimi;
			 header("Location:ekle.php?err=$err"); 
		 }
	  else
		 {
			/* if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
				{
					$b_numara=$_POST['gizli'];
				}
			else
				{
					$numara_bul_sql="Select max(numara) from $tablo_ismi where yonetim='$syonetim'";
					$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
					$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
				}	// En son eklenen kaydin numarasi ogreniliyor (f)
			$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
			if  (count($resim_ogren)>0)
				{
					$buyuk_resim=$resim_ogren[0]["resim_adres"];
					if  ($buyuk_resim<>"")
						{
							include($uzaklik."inc_s/thumbnail.php");
							// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
							if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<> $resim_dizini)
								{
									thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$kck_m_w,$kck_m_h);
								}
							// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)
						}// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
				 }   
			 // Eger gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
			 //////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////
			 */
			unset($_SESSION[$tablo_ismi.'puan']);
			unset($_SESSION[$tablo_ismi.'ad']);
			unset($_SESSION[$tablo_ismi.'alkategorilimi']);
			unset($_SESSION[$tablo_ismi.'dil']);		
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