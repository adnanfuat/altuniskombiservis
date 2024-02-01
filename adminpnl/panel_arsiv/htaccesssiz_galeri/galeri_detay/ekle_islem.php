<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$ustkategori_no=$_SESSION['ust_kategori_no'];
   	    $altkategori=$_SESSION['alt_kategori'];
		if  (isset($_POST['aciklama'])) 
			{
				$n_aciklama=$_POST['aciklama'];
			} 
		else 
			{
				$n_aciklama="";
			}
        $n_tarih=date('Ymd');
	    if  (isset($_POST["ad"]) && strlen($_POST["ad"])<>0) 	
	   		{ 	  	 
				$n_ad=$_POST["ad"]; $n_hata[1]=0;			
			} 
		else
			{ 
				$n_hata[1]=1; $n_ad='';
			}
		$n_puan=$_POST["puan"];
	   	$link_inherit="ekle_islem.php";
		if  ($n_hata[1]==1)
			{					
				$err='eksik_veri';
			}
		else
			{
				$ad=addslashes($ad);
				$aciklama=addslashes($aciklama);	
			    include($uzaklik."inc_s/resim_islem.php");	
			}
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if (isset($err) && $err<>'')
		   {
			 $_SESSION[$tablo_ismi.'n_ad']=$n_ad;
			 $_SESSION[$tablo_ismi.'n_puan']=$n_puan;
			 $_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;		
			 $_SESSION[$tablo_ismi.'n_hata']=$n_hata;
			 header("Location:ekle.php?err=$err"); 
		  }
	  else
		  {
				//  S  T  A  R  T ///////////////////////////////////////////////////////////////
				// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) //////////////////////////////////
				if  ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
					{
						// $b_numara=$_POST['gizli']; bu kodu duzenle_islemde kullaniyor..
					} 
			   else 
					{
						$numara_bul_sql="Select max(numara) from $tablo_ismi";
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
							/*include($uzaklik."inc_s/thumbnail.php");
							// ortaboy resmi boyutlandirip olusturmak icin /////////////////////////////// (s)
							Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
							// ortaboy resmi boyutlandirip olusturmak icin /////////////////////////////// (f)						
							// thumb u olusturmak icin ///////////////////////////////////////////////// (s)
							if (file_exists($thumb_resim_dizini.$buyuk_resim))     
								{  
									@chmod($thumb_resim_dizini.$buyuk_resim,0777); 
									@unlink($thumb_resim_dizini.$buyuk_resim);
								}
							Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
							//// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)						
							/* buyuk resim orta boy resimden büyük degilse, büyük resmi sil (s) */
							/* if (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim)) 
							   {
									$buyuk_resim_boyut=getimagesize($resim_dizini.$buyuk_resim);
									$buyuk_resim_yukseklik=$buyuk_resim_boyut[1];
									$buyuk_resim_genislik=$buyuk_resim_boyut[0];	
									$ortaboy_resim=getimagesize($resim_dizini_ortaboy.$buyuk_resim);
									$ortaboy_resim_yukseklik=$ortaboy_resim[1];
									$ortaboy_resim_genislik=$ortaboy_resim[0];							
									if  ($buyuk_resim_yukseklik<=$ortaboy_resim_yukseklik && $buyuk_resim_genislik<=$ortaboy_resim_genislik)
										{
											@chmod($resim_dizini.$buyuk_resim,0777); 
											@unlink($resim_dizini.$buyuk_resim);
										}							 
								}*/
						}// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
				  }   
			 // Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) //
			 ///////////////////////////////////////////////////////////////////
			 //  F  I  N  I  S  H  //////////////////////////////////////////////////////////
			 unset($_SESSION[$tablo_ismi.'n_ad']);
			 unset($_SESSION[$tablo_ismi.'n_puan']);
			 unset($_SESSION[$tablo_ismi.'n_aciklama']);
			 unset($_SESSION[$tablo_ismi.'n_hata']);
			 unset($_SESSION[$tablo_ismi.'n_ekleyen']);
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