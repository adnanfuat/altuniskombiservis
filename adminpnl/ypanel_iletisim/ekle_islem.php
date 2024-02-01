<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		$n_ad=$_POST["ad"];
		
		$n_adres1=$_POST["adres1"];
		$n_adres2=$_POST["adres2"];
		$n_adres3=$_POST["adres3"];
		$n_telefon1=$_POST["telefon1"];
		$n_telefon2=$_POST["telefon2"];
		$n_telefon3=$_POST["telefon3"];
		$n_telefon4=$_POST["telefon4"];
		$n_gsm1=$_POST["gsm1"];
		$n_gsm2=$_POST["gsm2"];
		$n_gsm3=$_POST["gsm3"];
		$n_gsm4=$_POST["gsm4"];
		$n_eposta1=$_POST["eposta1"];
		$n_eposta2=$_POST["eposta2"];
		$n_eposta3=$_POST["eposta3"];
		$n_calisma_saati1=$_POST["calisma_saati1"];
		$n_calisma_saati2=$_POST["calisma_saati2"];
		$n_calisma_saati3=$_POST["calisma_saati3"];

		$n_dil=$_POST["dil"];
		
		//$n_icerik=$_POST["icerik"];
		//$n_ozet=$_POST["ozet"];
		//$n_puan=$_POST["puan"];
		if  ($_POST["ad"]<>'')  	
    		{ 	  	 
				$n_eklenme_tarihi=date('Y-m-d');
				include($uzaklik."inc_s/resim_islem.php");					
			} 
		else
			{
				$err="eksik_veri";
   		    }	
		///////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
		if  (isset($err))
			{
				$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				$_SESSION[$tablo_ismi.'n_dil']=$n_dil;
				
				$_SESSION[$tablo_ismi.'n_adres1']=$n_adres1;
				$_SESSION[$tablo_ismi.'n_adres2']=$n_adres2;
				$_SESSION[$tablo_ismi.'n_adres3']=$n_adres3;
				$_SESSION[$tablo_ismi.'n_telefon1']=$n_telefon1;
				$_SESSION[$tablo_ismi.'n_telefon2']=$n_telefon2;
				$_SESSION[$tablo_ismi.'n_telefon3']=$n_telefon3;
				$_SESSION[$tablo_ismi.'n_telefon4']=$n_telefon4;
				$_SESSION[$tablo_ismi.'n_gsm1']=$n_gsm1;
				$_SESSION[$tablo_ismi.'n_gsm2']=$n_gsm2;
				$_SESSION[$tablo_ismi.'n_gsm3']=$n_gsm3;
				$_SESSION[$tablo_ismi.'n_gsm4']=$n_gsm4;
				$_SESSION[$tablo_ismi.'n_eposta1']=$n_eposta1;
				$_SESSION[$tablo_ismi.'n_eposta2']=$n_eposta2;
				$_SESSION[$tablo_ismi.'n_eposta3']=$n_eposta3;
				$_SESSION[$tablo_ismi.'n_calisma_saati1']=$n_calisma_saati1;
				$_SESSION[$tablo_ismi.'n_calisma_saati2']=$n_calisma_saati2;
				$_SESSION[$tablo_ismi.'n_calisma_saati3']=$n_calisma_saati3;
				
				//$_SESSION[$tablo_ismi.'n_icerik']=$n_icerik;
				//$_SESSION[$tablo_ismi.'n_ozet']=$n_ozet;
				//$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
				header("Location:ekle.php?err=$err"); 
			 }
		else
			{
				//unset($_SESSION[$tablo_ismi.'n_ad']);	
				//unset($_SESSION[$tablo_ismi.'n_icerik']);	
				//unset($_SESSION[$tablo_ismi.'n_ozet']); 
				//unset($_SESSION[$tablo_ismi.'n_dil']); 
				//unset($_SESSION[$tablo_ismi.'n_puan']); 
				if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0) 
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
										// thumb u olusturmak icin //////////////////////////////////////////////////////////// (s)
									    if  (file_exists($thumb_resim_dizini.$buyuk_resim))     
											{  
												@chmod($thumb_resim_dizini.$buyuk_resim,0777); @unlink($thumb_resim_dizini.$buyuk_resim);
											}
										Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
										// thumb u olusturmak icin //////////////////////////////////////////////////////////// (f)					
									} // Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
			
							}   
						// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) /////////////////////////////////////////////////////////
						// Eger buyuk ve kucuk resim ayni boyuttaysa buyuk resim siliniyor (s)
						if  (file_exists($resim_dizini.$buyuk_resim) && $resim_dizini.$buyuk_resim<>$resim_dizini && file_exists($thumb_resim_dizini.$buyuk_resim) && $thumb_resim_dizini.$buyuk_resim<>$thumb_resim_dizini)
							{
								$kucuk=getimagesize($thumb_resim_dizini.$buyuk_resim);
								$buyuk=getimagesize($resim_dizini.$buyuk_resim);
								$b_width=$buyuk[0];
								$k_width=$kucuk[0];							
								if  ($b_width==$k_width)
									{
									    if  (file_exists($resim_dizini.$buyuk_resim))    
											{  
												@chmod($resim_dizini.$buyuk_resim,0777); 
												@unlink($resim_dizini.$buyuk_resim);
											}
										else
											{
												Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini,$byk_m_w,$byk_m_h);
											}
									}
							}
						// Eger buyuk ve orta resim ayni boyuttaysa buyuk resim siliniyor (f)
					} // eger resim geldiyse
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_dil']);
				
				unset($_SESSION[$tablo_ismi.'n_adres1']);
				unset($_SESSION[$tablo_ismi.'n_adres2']);
				unset($_SESSION[$tablo_ismi.'n_adres3']);
				unset($_SESSION[$tablo_ismi.'n_telefon1']);
				unset($_SESSION[$tablo_ismi.'n_telefon2']);
				unset($_SESSION[$tablo_ismi.'n_telefon3']);
				unset($_SESSION[$tablo_ismi.'n_telefon4']);
				unset($_SESSION[$tablo_ismi.'n_gsm1']);
				unset($_SESSION[$tablo_ismi.'n_gsm2']);
				unset($_SESSION[$tablo_ismi.'n_gsm3']);
				unset($_SESSION[$tablo_ismi.'n_gsm4']);
				unset($_SESSION[$tablo_ismi.'n_eposta1']);
				unset($_SESSION[$tablo_ismi.'n_eposta2']);
				unset($_SESSION[$tablo_ismi.'n_eposta3']);
				unset($_SESSION[$tablo_ismi.'n_calisma_saati1']);
				unset($_SESSION[$tablo_ismi.'n_calisma_saati2']);
				unset($_SESSION[$tablo_ismi.'n_calisma_saati3']);
				
				
				
			} 
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
<? include("yonlendir.php"); ?><form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
<script>
var sonuc=window.confirm("Yeni Bir Haber Eklemek Istiyor musunuz?");
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