<? 	session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		//$syonetim=$_SESSION["siteyonetici"];
		$ad=$_POST["ad"];
		$puan=$_POST["puan"];	
		$altkategorilimi=$_POST["altkategorilimi"];
		$dil=$_POST["dil"];	
		$htaccess_etiket=$_POST["htaccess_etiket"];	
   	   	include($uzaklik."inc_s/baglanti.php");
		
		/*$boyut_ogren=@$baglanti->query("Select galeri_kategori_genislik, galeri_kategori_yukseklik from parametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		if  ($boyut_ogren_sayi>0)
			{
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_genislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_yukseklik"];
			}
		else
			{
				$boyut_ogren=@$baglanti->query("Select galeri_kategori_vgenislik, galeri_kategori_vyukseklik from vparametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
				$boyut_ogren_sayi=count($boyut_ogren);
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_vgenislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_vyukseklik"];
			}*/
		$numara=$_POST["gizli"];
		if  (isset($_POST["ad"]))
    		{
				include($uzaklik."inc_s/resim_islem.php");
			}
		else
			{
				$err="eksik_veri";
			}
		////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla.. (s)
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'altkategorilimi']=$altkategorilimi;
				$_SESSION[$tablo_ismi.'puan']=$puan;
				$_SESSION[$tablo_ismi.'dil']=$dil;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		    }
	    else
		    {
				/* if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
					{
						$b_numara=$_POST['gizli'];
					}
				else
					{
						$numara_bul_sql="Select max(numara) from  where yonetim='$syonetim'";
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
				 //////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////*
				 */
			    if  (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
			    if  (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
			    if  (isset($_SESSION[$tablo_ismi.'altkategorilimi'])) {unset($_SESSION[$tablo_ismi.'altkategorilimi']);}
				if  (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
				if  (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) {unset($_SESSION[$tablo_ismi.'htaccess_etiket']);}
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