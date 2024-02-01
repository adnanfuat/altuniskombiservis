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
       $n_tarih=date('Ymd');
   	   
	   $link_inherit="hizli_ekle_islem.php";
	   
		for ($sayac=1; $sayac<=20; $sayac++)
			{
				$n_ad=$_POST["ad".$sayac.""];
				$n_resim=$_FILES["resim".$sayac.""];
				$n_puan=$_POST["puan".$sayac.""];
				if (strlen(trim($n_ad))>0)
				   {
						$ekle_duzenle_sql="Insert into $tablo_ismi(ustkategori_no, ad, altkategori_no, aktif, eklenme_tarihi, puan, hit, aciklama) 
													Values ('$ustkategori_no', '$n_ad', '$altkategori', '1', '$n_tarih', '$n_puan', '0', '')";
						if  (@$baglanti->query($ekle_duzenle_sql)->fetchAll(PDO::FETCH_ASSOC))
							{
								$numara_bul_sql="Select max(numara) from $tablo_ismi";
								$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
								$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
		
								if  (isset($n_resim) && strlen($n_resim["name"])!=0)	// Resim Gelmis mi?																															
								   {
									   $dosya_size=$n_resim["size"];		
									   if ($dosya_size>$max_file_size)
										  {	
											  $err='boyut';  //echo "11";
										  }
									   else
										  {
											   //echo "12";
											   $dosya_gecici_isim=$n_resim["tmp_name"]; $dosya_isim = $n_resim["name"];  $dosya_tip =$n_resim["type"]; //echo $dosya_tip;
											  if ($dosya_tip=='image/gif' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg' ||  $dosya_tip=='image/jpeg') // Eger jpeg ya da bmp ise islem yap
												 {  						
													if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													$dosya="resim".$b_numara.".".$uzanti; // bir dosya ismi oluþtur...																			  
													// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													if (file_exists($resim_dizini."resim".$numara.".jpg")){ chmod($resim_dizini."resim".$numara.".jpg",0777); unlink($resim_dizini."resim".$numara.".jpg");}
													if (file_exists($resim_dizini."resim".$numara.".gif")){ chmod($resim_dizini."resim".$numara.".gif",0777); unlink($resim_dizini."resim".$numara.".gif");}
													// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
													move_uploaded_file($n_resim["tmp_name"] , $resim_dizini.$dosya);
													if (file_exists($resim_dizini.$dosya)) { chmod($resim_dizini.$dosya,0644); }
													$resim_ekle="Update $tablo_ismi Set  resim_adres='$dosya' where numara=$b_numara";
													@$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);		
												 }																												       											
										  } // resim geldi mi ?
								   }										 
								$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
								if  (count($resim_ogren)>0)	
									{
										$buyuk_resim=$resim_ogren[0]["resim_adres"];
										if  ($buyuk_resim<>"")
											{
												include_once($uzaklik."inc_s/thumbnail.php");
												Thumbnail($resim_dizini,$buyuk_resim,$resim_dizini_ortaboy,$byk_m_w,$byk_m_h);
												if  (file_exists($thumb_resim_dizini.$buyuk_resim)) {  @chmod($thumb_resim_dizini.$buyuk_resim,0777); @unlink($thumb_resim_dizini.$buyuk_resim); }
												Thumbnail($resim_dizini,$buyuk_resim,$thumb_resim_dizini,$kck_m_w,$kck_m_h);
												if   (file_exists($resim_dizini.$buyuk_resim) && $buyuk_resim<>'' && file_exists($resim_dizini_ortaboy.$buyuk_resim)) 
													 {
														$buyuk_resim_boyut=getimagesize($resim_dizini.$buyuk_resim); $buyuk_resim_yukseklik=$buyuk_resim_boyut[1]; $buyuk_resim_genislik=$buyuk_resim_boyut[0];	
														$ortaboy_resim=getimagesize($resim_dizini_ortaboy.$buyuk_resim); $ortaboy_resim_yukseklik=$ortaboy_resim[1]; $ortaboy_resim_genislik=$ortaboy_resim[0];							
														if  ($buyuk_resim_yukseklik<=$ortaboy_resim_yukseklik && $buyuk_resim_genislik<=$ortaboy_resim_genislik) { @chmod($resim_dizini.$buyuk_resim,0777); @unlink($resim_dizini.$buyuk_resim); }							 								 
													 }
											}
									}   
							}
					}
				unset($_SESSION[$tablo_ismi.'n_ad'.$sayac.""]);
				unset($_SESSION[$tablo_ismi.'n_puan'.$sayac.""]);
			}
?>
<? include("yonlendir.php"); ?><form name="formumuz"><input name="gizli" type="hidden" value="<? echo $donulecek_sayfa ?>"></form>
<script>
var sonuc=window.confirm("Yeni Kayit Eklemek Istiyor musunuz?");
if  (sonuc)
	{
		window.location="hizli_ekle.php";
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