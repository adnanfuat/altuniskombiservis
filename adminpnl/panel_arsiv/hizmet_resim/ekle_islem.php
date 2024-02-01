<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
	
	    $hizmet=$_SESSION[$tablo_ismi."hizmet"];
		$n_ad=addslashes($_POST["ad"]);
		$n_htaccess_etiket=$_POST["htaccess_etiket"];
	    $n_aciklama=addslashes($_POST["aciklama"]);
	    $n_siralama=$_POST["siralama"];
	    include($uzaklik."inc_s/resim_islem.php");	
		if  (isset($err) && $err<>'')
			{
				$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				$_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
				$_SESSION[$tablo_ismi.'n_siralama']=$n_siralama;
				$_SESSION[$tablo_ismi.'n_htaccess_etiket']=$n_htaccess_etiket;
				header("Location:ekle.php?err=$err"); 
			}
		 else
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
			   if   (count($resim_ogren)>0)	
				    {
						$buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  ($buyuk_resim<>"")
							{
								include($uzaklik."inc_s/thumbnail.php");
								/////////////////////////// ortaboy resmi boyutlandirip olusturmak icin /////////////////// (s)
								thumbnail($resim_dizini,$buyuk_resim,$ortaboy_resim_dizini,$byk_m_w,$byk_m_h);
								/////////////////////////// ortaboy resmi boyutlandirip olusturmak icin ////////////////////// (f)						
								///////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
								if  (file_exists($thumb_resim_dizini.$buyuk_resim))     
									{  
										@chmod($thumb_resim_dizini.$buyuk_resim,0777); 
										@unlink($thumb_resim_dizini.$buyuk_resim);
									}
								thumbnail($ortaboy_resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
								////////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)						
								/* buyuk resim orta boy resimden b�y�k degilse, b�y�k resmi sil (s) */
								 if  (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($ortaboy_resim_dizini.$buyuk_resim))
									 {
										@chmod($resim_dizini.$buyuk_resim,0777); 
										@unlink($resim_dizini.$buyuk_resim);
									 }
								/* buyuk resim orta boy resimden b�y�k degilse, b�y�k resmi sil (f) */
							}	// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
					}   
				// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
				//////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'n_aciklama']);
				unset($_SESSION[$tablo_ismi.'n_siralama']);
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']);
			}	 	 
		 ////////////////////////////////////// Geri D�n�lecekse Onlari Ayarla..	 (f)
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
	}  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>