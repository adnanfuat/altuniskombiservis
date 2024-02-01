<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
	    $proje_numara=$_SESSION[$tablo_ismi."proje_numara"];
	    $n_aciklama=$_POST["aciklama"];
	    $n_siralama=$_POST["siralama"];
	    include($uzaklik."inc_s/resim_islem.php");	
	    if  (isset($err) && $err<>'')
		    {
				$_SESSION[$tablo_ismi.'n_aciklama']=$n_aciklama;
				$_SESSION[$tablo_ismi.'n_siralama']=$n_siralama;
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
				if  (count($resim_ogren)>0)	
					{
						$buyuk_resim=$resim_ogren[0]["resim_adres"];
						if  ($buyuk_resim<>"")
							{
								
								copy($resim_dizini.$buyuk_resim,$thumb_resim_dizini.$buyuk_resim);
								copy($resim_dizini.$buyuk_resim,$resim_dizini.$buyuk_resim);
								/*include($uzaklik."inc_s/thumbnail.php");
								///////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
								if  (file_exists($thumb_resim_dizini.$buyuk_resim))     
									{  
										@chmod($thumb_resim_dizini.$buyuk_resim,0777); 
										@unlink($thumb_resim_dizini.$buyuk_resim);
									}
								thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
								thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$byk_m_w,$byk_m_h);*/
								////////// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)						
							}	// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
							
					 }   
				// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
				//////////////////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'n_aciklama']);
				unset($_SESSION[$tablo_ismi.'n_siralama']);
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