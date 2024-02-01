<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
	    include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		$n_altkategorilimi=$_POST["altkategorilimi"];
		$n_ad=$_POST["ad"];
		$n_aciklama=$_POST["aciklama"];
		$n_puan=$_POST["puan"];
		$n_dil=$_POST["dil"];
		$n_htaccess_etiket=$_POST["htaccess_etiket"];
		$n_arkaplan=$_POST["arkaplan"];
		$bu_etikete_sahip_sektor_varmi=@$baglanti->query("Select ad from $tablo_ismi where htaccess_etiket='$n_htaccess_etiket'")->fetchAll(PDO::FETCH_ASSOC);
		if  (count($bu_etikete_sahip_sektor_varmi)>0)
		    { 
				//echo 1;
				$err="etiket";
				header("Location:ekle.php?err=etiket");
				
		    }
		else
		  	{
				//echo 2;
				if ($_POST["ad"]<>'' && $_POST["htaccess_etiket"]<>'')
					{ 	  	 
						$n_eklenme_tarihi=date('Ymd'); 
						include($uzaklik."inc_s/resim_islem.php");					
					} 
				else
					{
						$err="eksik_veri";
					}	
				////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
			   if  (isset($err))
				   {
						 $_SESSION[$tablo_ismi.'n_ad']=$n_ad;
						 $_SESSION[$tablo_ismi.'n_puan']=$n_puan;
						 $_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
						 $_SESSION[$tablo_ismi.'n_alkategorilimi']=$n_altkategorilimi;
						 $_SESSION[$tablo_ismi.'n_dil']=$n_dil;
						 $_SESSION[$tablo_ismi.'n_htaccess_etiket']=$n_htaccess_etiket;
						 $_SESSION[$tablo_ismi.'n_arkaplan']=$n_arkaplan;
						 header("Location:ekle.php?err=$err"); 
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
								/*$buyuk_resim=$resim_ogren[0]["resim_adres"];
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
								*/
							}   
								// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
							//////////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////
						unset($_SESSION[$tablo_ismi.'n_puan']);
						unset($_SESSION[$tablo_ismi.'n_aciklama']);
						unset($_SESSION[$tablo_ismi.'n_ad']);
						unset($_SESSION[$tablo_ismi.'n_alkategorilimi']);
						unset($_SESSION[$tablo_ismi.'n_dil']);
						unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']);
						unset($_SESSION[$tablo_ismi.'n_arkaplan']);
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