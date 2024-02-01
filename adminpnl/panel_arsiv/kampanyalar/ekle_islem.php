<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		$n_ad=addslashes($_POST["ad"]);
		$n_icerik=addslashes($_POST["icerik"]);
		$n_ozet=addslashes($_POST["ozet"]);
		$n_dil=$_POST["dil"];
		$n_eski_fiyat=addslashes($_POST["eski_fiyat"]);
		$n_yeni_fiyat=addslashes($_POST["yeni_fiyat"]);
		$n_htaccess_etiket=$_POST["htaccess_etiket"];
		//$n_puan=$_POST["puan"];
		if  ($_POST["ad"]<>'' && $_POST["icerik"]<>'')  	
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
				$_SESSION[$tablo_ismi.'n_icerik']=$n_icerik;
				$_SESSION[$tablo_ismi.'n_ozet']=$n_ozet;
				$_SESSION[$tablo_ismi.'n_dil']=$n_dil;
				$_SESSION[$tablo_ismi.'n_eski_fiyat']=$n_eski_fiyat;
				$_SESSION[$tablo_ismi.'n_yeni_fiyat']=$n_yeni_fiyat;
				$_SESSION[$tablo_ismi.'n_htaccess_etiket']=$n_htaccess_etiket;
				//$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
				header("Location:ekle.php?err=$err"); 
			 }
		else
			{
				unset($_SESSION[$tablo_ismi.'n_ad']);	
				unset($_SESSION[$tablo_ismi.'n_icerik']);	
				unset($_SESSION[$tablo_ismi.'n_ozet']); 
				unset($_SESSION[$tablo_ismi.'n_dil']); 
				unset($_SESSION[$tablo_ismi.'n_yeni_fiyat']); 
				unset($_SESSION[$tablo_ismi.'n_eski_fiyat']); 
				unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']); 
				//unset($_SESSION[$tablo_ismi.'n_puan']); 
				if  (isset($_FILES["icon"]) && $_FILES["icon"]["size"]>0) 
					{
						$dosya_size=$_FILES["icon"]["size"];		
						   		if ($dosya_size>$max_file_size)	  
									{	
										//$err='boyut'; 
									}
	          	           		else
						           {				 
										$dosya_gecici_isim=$_FILES["icon"]["tmp_name"];
					                    $dosya_isim = $_FILES["icon"]["name"];
										$dosya_tip = $_FILES["icon"]["type"];

										if    ($dosya_tip=='image/jpeg' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg') // Eger jpeg ya da bmp ise islem yap
											  {  						
												 if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													if ($insert==0) {$numara=$_POST['gizli'];} //print "numara deger gizliden alindi <br> numara: ".$numara; 
													 else {
															 $numara_bul_sql="Select max(numara) from ".$tablo_ismi;
															 $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
															 $numara=$numara_bul_sql_calistir[0]["max(numara)"]; 	//print("yeni kampanya no: : ".$kampanya_no." <br>") ;																																																						
														  }
														  
															 $dosya="icon".$numara.".".$uzanti; // bir dosya ismi oluþtur...																			  
														
														// (s)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															  if (file_exists($icon_dizini."icon".$numara.".jpg"))    {  chmod($icon_dizini."icon".$numara.".jpg",0777); unlink($icon_dizini."icon".$numara.".jpg");}
															  if (file_exists($icon_dizini."icon".$numara.".gif"))    {  chmod($icon_dizini."icon".$numara.".gif",0777); unlink($icon_dizini."icon".$numara.".gif");}
														// (f)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															
															
																
													move_uploaded_file($_FILES["icon"]["tmp_name"] , $icon_dizini.$dosya);
													if (file_exists($icon_dizini.$dosya))    {  chmod($icon_dizini.$dosya,0644); }

													$icon_ekle="Update $tablo_ismi Set  icon_adres='$dosya' where numara=$numara";
													@$baglanti->query($icon_ekle)->fetchAll(PDO::FETCH_ASSOC);		
													//print $dosya;
											  }																												       											
										else
											 {																							   
												//$err='uzanti';																							   
											 }
					} // eger resim geldiyse
				////////////////////////////////////////////////////////////////////////////////////////////////////////
				///////////////////////  F  I  N  I  S  H  //////////////////////////////////////////////////////////
				unset($_SESSION[$tablo_ismi.'n_ad']);
				unset($_SESSION[$tablo_ismi.'n_icerik']);
				unset($_SESSION[$tablo_ismi.'n_ozet']);
				unset($_SESSION[$tablo_ismi.'n_dil']);
				unset($_SESSION[$tablo_ismi.'n_yeni_fiyat']); 
				unset($_SESSION[$tablo_ismi.'n_eski_fiyat']); 
				unset($_SESSION[$tablo_ismi.'n_htaccess_etiket']);
			} 
			
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
			 }
		////////////////////////////////////// Geri Dönülecekse Onlari Ayarla..	 (f)
?>
<? include("yonlendir.php"); ?><form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
<script>
var sonuc=window.confirm("Yeni Bir Kampanya Eklemek Istiyor musunuz?");
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