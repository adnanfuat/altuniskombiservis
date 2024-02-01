<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$ad=$_POST["ad"];
		$puan=$_POST["puan"];
		$dil=$_POST["dil"];	
		$hizmetkategori=$_POST["hizmetkategori"];	 //echo $hizmetkategori;
		$ozet=$_POST["ozet"];	 
		$aciklama=$_POST["aciklama"];
		$htaccess_etiket=$_POST["htaccess_etiket"];
		$radyo=$_POST["radyo"]; echo $radyo;
   	   	include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php"); //echo $kck_m_h;

		$numara=$_POST["gizli"];
		if  (isset($_POST["ad"]))
    		{
				if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0)
				    {
						if  ($insert==0)
							{
								$b_numara=$_POST['gizli'];
							} 
						else 
							{
								$numara_bul_sql="Select max(numara) from $tablo_ismi'";
								$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara=$numara_bul_sql_calistir[0]["max(numara)"]; 
							}
					    $resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
					    $buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  (file_exists($resim_dizini.$buyuk_resim))
							{
								@chmod($resim_dizini.$buyuk_resim,0777);
								@unlink($resim_dizini.$buyuk_resim);
							}
					}
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
				$_SESSION[$tablo_ismi.'ozet']=$ozet;
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;
				$_SESSION[$tablo_ismi.'dil']=$dil;
				$_SESSION[$tablo_ismi.'hizmetkategori']=$hizmetkategori;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				$_SESSION[$tablo_ismi.'radyo']=$radyo;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		  }
	  else
		  {
			    if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
			    if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
				if (isset($_SESSION[$tablo_ismi.'aciklama'])) {unset($_SESSION[$tablo_ismi.'aciklama']);}
				if (isset($_SESSION[$tablo_ismi.'ozet'])) {unset($_SESSION[$tablo_ismi.'ozet']);}
				if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
				if (isset($_SESSION[$tablo_ismi.'hizmetkategori'])) {unset($_SESSION[$tablo_ismi.'hizmetkategori']);}
				if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) {unset($_SESSION[$tablo_ismi.'htaccess_etiket']);}
				if (isset($_SESSION[$tablo_ismi.'radyo'])) {unset($_SESSION[$tablo_ismi.'radyo']);}
			    include($uzaklik."inc_s/thumbnail.php");
				if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0)
				    {
						if  ($insert==0)
							{
								$b_numara=$_POST['gizli'];
							} 
						else 
							{
								$numara_bul_sql="Select max(numara) from $tablo_ismi'";
								$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara=$numara_bul_sql_calistir[0]["max(numara)"]; 
							}
					    $resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
					    $buyuk_resim=$resim_ogren[0]["resim_adres"];
						Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$kck_m_w,$kck_m_h);
					}
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