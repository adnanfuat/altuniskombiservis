<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
   	  include($uzaklik."inc_s/baglanti.php");
	  $kategori=$_SESSION["kategori"];
	  $n_ad=$_POST["ad"];
	  $n_yer=$_POST["yer"];
	  $n_detay=$_POST["detay"];
	  $n_icerik=$_POST["icerik"];
	  $n_siralama=$_POST["siralama"];
	  if ( $_POST["ad"]<>'') 	
   		 { 	  	 
			include($uzaklik."inc_s/resim_islem.php");					
		 } 
 	  else
		 {
			$err="eksik_veri";
   		 }	
	  ////////////////////////////////////// Geri Dönülecekse Onlari Ayarla.. (s)
	  if (isset($err))
		 {
			$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
			$_SESSION[$tablo_ismi.'n_icerik']=$n_icerik;
			$_SESSION[$tablo_ismi.'n_yer']=$n_yer;
			$_SESSION[$tablo_ismi.'n_detay']=$n_detay;				
			$_SESSION[$tablo_ismi.'n_siralama']=$n_siralama;
			header("Location:ekle.php?err=$err"); 
		 }
	  else
		 {
			if  (isset($_FILES["resim"]) && $_FILES["resim"]["size"]>0)
				{
					//////////////////////////////////////////////////////  S  T  A  R  T ///////////////////////////////////
					// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (s) //////////////////////////////////////
					if  ($insert==0)  // En son eklenen kaydin numarasi ogreniliyor (s)
						{
							$b_numara=$_POST['gizli'];
						} 
				   else 
						{
							$numara_bul_sql="Select max(numara) from ".$tablo_ismi;
							$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
							$b_numara=$numara_bul_sql_calistir[0]["max(numara)"]; 
						}
				   $resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
				   if (count($resim_ogren)>0)	
					  {
						  $buyuk_resim=$resim_ogren[0]["resim_adres"];
						  include($uzaklik."inc_s/thumbnail.php");
						  /////////////////////////////////////// Thumb olusturuluyor   //////////////////////////////////(s)
						  if ($buyuk_resim<>"") // Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(s)
							 {
								if  (file_exists($thumb_resim_dizini.$buyuk_resim))    
									{  
										@chmod($thumb_resim_dizini.$buyuk_resim,0777); 
										@unlink($thumb_resim_dizini.$buyuk_resim);
									}
								Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$k_m_w,$k_m_h);
							 }				// Eger gecerli bir resim eklenmisse bu resmin thumb u olusturuluyor(f)
						  //////////////////////////////////// Thumb olusturuluyor   //////////////////////////////////(f)
						  /* buyuk resim orta boy resimden büyük degilse, büyük resmi sil (s) */
						  if (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($thumb_resim_dizini.$buyuk_resim)) 
						     {
								$buyuk_resim_boyut=getimagesize($resim_dizini.$buyuk_resim);
								$buyuk_resim_yukseklik=$buyuk_resim_boyut[1];
								$buyuk_resim_genislik=$buyuk_resim_boyut[0];	
								$thumb_resim=getimagesize($thumb_resim_dizini.$buyuk_resim);
								$thumb_resim_yukseklik=$thumb_resim[1];
								$thumb_resim_genislik=$thumb_resim[0];							
								if  ($buyuk_resim_yukseklik<=$thumb_resim_yukseklik && $buyuk_resim_genislik<=$thumb_resim_genislik)
									{
										@chmod($resim_dizini.$buyuk_resim,0777); 
										@unlink($resim_dizini.$buyuk_resim);
									}							 
							 }
						  /* buyuk resim orta boy resimden büyük degilse, büyük resmi sil (f) */
						}   
					// Eger	gecerli bir kayit eklenmise resmin thumb unu ekliyoruz (f) //////////////////////////////////////
					//////////////////////////////////  F  I  N  I  S  H  //////////////////////////////////////
					}
				unset($_SESSION[$tablo_ismi.'n_detay']);
				unset($_SESSION[$tablo_ismi.'n_icerik']);
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_yer']);
				unset($_SESSION[$tablo_ismi.'n_siralama']);		
			} 
		   ////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
<? include("yonlendir.php"); ?>
<form name="formumuz">
<input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>">
</form>
<script>
var sonuc=window.confirm("Yeni Bir Referans Eklemek Istiyor musunuz?");
if  (sonuc)
	{
		window.location="ekle.php";
	}
else
	{
		deger=document.formumuz.gizli.value;
		window.location="kontrol.php?sayfa_no="+deger;
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