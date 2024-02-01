<? session_start();
$link_inherit='duzenle_islem.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		unset($_SESSION[$tablo_ismi.'ad']);
		unset($_SESSION[$tablo_ismi.'deger']);
		unset($_SESSION[$tablo_ismi.'puan']);
		unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'hata']);
		unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
		//  (f) Firma bilgileri daha önce session degiskenleri ile alinmissa o degerler unregister ediliyor...
	    //if(isset($_POST['kaydet']))
	    //{	
		include($uzaklik."inc_s/baglanti.php");
	 	$ustkategori_no=$_SESSION['ust_kategori_no'];
		$altkategori_no=$_SESSION['alt_kategori'];
		$numara=$_POST['gizli'];
		if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0) 	
   			{ 	  	 
				$adi=$_POST["ad"];	$hata[1]=0;				
			} 
		else
			{   
			    $hata[1]=1; $adi=''; 
			}
		$puan=$_POST["puan"];
		$htaccess_etiket=$_POST["htaccess_etiket"];
		if  (isset($_POST['aciklama'])) 
			{
				$aciklama=$_POST['aciklama'];
			} 
		else 
			{
				$aciklama="";
			}
		if  (isset($_POST['deger'])) 
			{
				$deger=$_POST['deger'];
			} 
		else 
			{
				$deger="";
			}
		if ($hata[1]==1)
			{
				$err='eksik_veri';
			}
		else
			{
				$adi=addslashes($adi);
				$aciklama=addslashes($aciklama);	
				include($uzaklik."inc_s/resim_islem.php");	
			}
		//} 	//- - - Kaydet Butonuna Basilarak Gelinmisse - -      -      - (f)
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$adi;
				$_SESSION[$tablo_ismi.'deger']=$deger;
				$_SESSION[$tablo_ismi.'aciklama']=$aciklama;													
				$_SESSION[$tablo_ismi.'puan']=$puan;		
				$_SESSION[$tablo_ismi.'hata']=$hata;
				$_SESSION[$tablo_ismi.'htaccess_etiket']=$htaccess_etiket;
				header("Location:duzenle.php?don=$err"); 
		   }
	   else
		   {
				///////////////////////  S  T  A  R  T ///////////////////////////////////////////////////////////////
				if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0) 
					{
						// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) ////////////////////////////////
						if  ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
							{
								$b_numara=$_POST['gizli'];
							} 
					   else 
							{
								$numara_bul_sql="Select max(numara) from ".$tablo_ismi;
								$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
							}			// En son eklenen kaydin numarasi ogreniliyor (f)
						$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
						if  (count($resim_ogren)>0)	
							{
								$buyuk_resim=$resim_ogren[0]["resim_adres"];
								if  ($buyuk_resim<>"") // Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(s)
									{
										copy($resim_dizini.$buyuk_resim,$resim_dizini_ortaboy.$buyuk_resim);
										copy($resim_dizini.$buyuk_resim,$thumb_resim_dizini.$buyuk_resim);
									
										include($uzaklik."inc_s/thumbnail.php");
										// ortaboy resmi boyutlandirip olusturmak icin ///////////////////////////////////// (s)
										Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
										// ortaboy resmi boyutlandirip olusturmak icin ////////////////////////////////////// (f)						
										// thumb u olusturmak icin //////////////////////////////////////////////////////// (s)
										if  (file_exists($thumb_resim_dizini.$buyuk_resim))     
											{  
												@chmod($thumb_resim_dizini.$buyuk_resim,0777); @unlink($thumb_resim_dizini.$buyuk_resim);
											}
										Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
										// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)					
										/* buyuk resim orta boy resimden büyük degilse, büyük resmi sil (s) */
										if   (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim)) 
											 {
												$buyuk_resim_boyut=getimagesize($resim_dizini.$buyuk_resim);
												$buyuk_resim_yukseklik=$buyuk_resim_boyut[1];
												$buyuk_resim_genislik=$buyuk_resim_boyut[0];	
												$ortaboy_resim=getimagesize($resim_dizini_ortaboy.$buyuk_resim);
												$ortaboy_resim_yukseklik=$ortaboy_resim[1];
												$ortaboy_resim_genislik=$ortaboy_resim[0];							
												if ($buyuk_resim_yukseklik<=$ortaboy_resim_yukseklik && $buyuk_resim_genislik<=$ortaboy_resim_genislik)
													{
														@chmod($resim_dizini.$buyuk_resim,0777); @unlink($resim_dizini.$buyuk_resim);
													}							 
										     }
								    }// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
							 }   
							// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) //////////////////////////////////////
				} // eger resim geldiyse
			///////////////////////////////////////////////////////////////////////////////////////////////////////////
			//////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
			unset($_SESSION[$tablo_ismi.'ekleyen']);
			unset($_SESSION[$tablo_ismi.'deger']);
			unset($_SESSION[$tablo_ismi.'aciklama']);		
			unset($_SESSION[$tablo_ismi.'puan']);
			unset($_SESSION[$tablo_ismi.'hata']);
			unset($_SESSION[$tablo_ismi.'htaccess_etiket']);
			$altkategori=$_SESSION['alt_kategori'];
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