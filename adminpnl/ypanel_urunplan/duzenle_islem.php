<? session_start();
$link_inherit='duzenle_islem.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
		$urun_numara=$_SESSION[$tablo_ismi."urun_numara"];
		$numara=$_POST['gizli'];
		$aciklama=$_POST["aciklama"];
		$siralama=$_POST["siralama"];
		include($uzaklik."inc_s/resim_islem.php");	
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;
				$_SESSION[$tablo_ismi.'siralama']=$siralama;
				header("Location:duzenle.php?don=$err"); 
		   }
		else
		   {
				 if ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
					{
						$b_numara=$_POST['gizli'];
					}
				 else
					{
						$numara_bul_sql="Select max(numara) from $tablo_ismi";
						$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
						$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
					}	// En son eklenen kaydin numarasi ogreniliyor (f)
				$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
				if  (count($resim_ogren)>0)
					{
						$buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  ($buyuk_resim<>"")
							{
								copy($resim_dizini.$buyuk_resim,$thumb_resim_dizini.$buyuk_resim);
								copy($resim_dizini.$buyuk_resim,$resim_dizini.$buyuk_resim);
								/*include($uzaklik."inc_s/thumbnail.php");
								// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
								if  (file_exists($thumb_resim_dizini.$buyuk_resim))
									{
										@chmod($thumb_resim_dizini.$buyuk_resim,0777);
										@unlink($thumb_resim_dizini.$buyuk_resim);
									}
								if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<>$resim_dizini)
								    {
										thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
										thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$byk_m_w,$byk_m_h);
									}*/
								// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)
							}// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
					}   
						// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
					//////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'aciklama']);
				unset($_SESSION[$tablo_ismi.'siralama']);
				include("yonlendir.php");
				header("Location:kontrol.php"); 	 
		   }	 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
	   } 
  else 
	   {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>