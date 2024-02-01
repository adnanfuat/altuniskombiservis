<?  session_start();
$link_inherit="ekle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
	    include($uzaklik."inc_s/baglanti.php");
		/*$syonetim=$_SESSION["siteyonetici"];
		$boyut_ogren=@$baglanti->query("Select galeri_altkategori_genislik, galeri_altkategori_yukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		if  ($boyut_ogren_sayi>0)
			{
				$kck_m_w=$boyut_ogren[0]["galeri_altkategori_genislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_altkategori_yukseklik"];
			}
		else
			{
				$boyut_ogren=@$baglanti->query("Select galeri_altkategori_vgenislik, galeri_altkategori_vyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
				$boyut_ogren_sayi=count($boyut_ogren);
				$kck_m_w=$boyut_ogren[0]["galeri_altkategori_vgenislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_altkategori_vyukseklik"];
			}*/
			
		if  (isset($_POST["ad"]) && $_POST["ad"]<>'') 	
    		{ 	  	 
				$n_ad=$_POST["ad"];
				$ust_kategori_no=$_SESSION["ust_kategori_no"];
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
				$_SESSION[$tablo_ismi.'ad']=$n_ad;
				header("Location:ekle.php?err=$err"); 
	       }
		else
		   {
				/*if  ($insert==0)
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
				if  (count($resim_ogren)>0)	
					{
						$buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  ($buyuk_resim<>"")
							{
								include($uzaklik."inc_s/thumbnail.php");
								///////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
								thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$kck_m_w,$kck_m_h);
								////////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)						
							}	// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
					 }   
				// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
				//////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
				*/
				unset($_SESSION[$tablo_ismi.'ad']);
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