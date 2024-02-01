<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");
if  (isset($_SESSION['yonet']))
    {
	//*********************************************************************************************************************************
	 include($uzaklik."inc_s/baglanti.php");
	 $hizmet=$_SESSION[$tablo_ismi."hizmet"]; echo $hizmet."sdsdsds";
	// $syonetim=$_SESSION["siteyonetici"];
	//*********************************************************************************************************************************
	 if (isset($_POST["ekle"]) || isset($_POST["ekle2"])) 
		{    	
			if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) { unset($_SESSION[$tablo_ismi.'n_aciklama']); }
			if (isset($_SESSION[$tablo_ismi.'n_siralama'])) { unset($_SESSION[$tablo_ismi.'n_siralama']); }
			header("Location:ekle.php");  echo ".";  
		}
	//*********************************************************************************************************************************
	 if (isset($_POST["hekle"]) || isset($_POST["hekle2"])) 
		{    	
			header("Location:hizli_ekle.php");  
		}
	//*********************************************************************************************************************************
	if  (isset($_POST["sil"]) || isset($_POST["sil2"]))
		{     
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $sql="Select * from  $tablo_ismi where kategori='$hizmet' order by siralama asc,numara asc limit $ilkkayit, $bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if (isset($_POST["silinecekler_numara"]))
				{
					$dizim=$_POST["silinecekler_numara"];
					for ($sayac=0; $sayac<$toplam_kayit; $sayac++)
						{
							   $item_numara=$recordset[$sayac]["numara"];
							   $resim=$recordset[$sayac]["resim_adres"];
							   if (isset($dizim["$item_numara"]))
								  {
										$item_sil="Delete  from $tablo_ismi where numara=$item_numara";
										@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);
										$dosya_gecici_isim=$resim_dizini.$resim;
										if (file_exists($dosya_gecici_isim))
										   {
											  @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
										   }
										$dosya_gecici_isim=$thumb_resim_dizini.$resim;
										if (file_exists($dosya_gecici_isim)) 
										   {
											  @chmod($dosya_gecici_isim,0755);  @unlink($dosya_gecici_isim);
										   }
										$dosya_gecici_isim=$ortaboy_resim_dizini.$resim;
										if (file_exists($dosya_gecici_isim)) 
										   {
											   @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
										   }
								 }									
						}  
			   } 
			$sql_cumlesi="select numara from $tablo_ismi where kategori='$hizmet'" ;
			$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
			$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
			include($uzaklik."inc_s/sayfalama.php");
			sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
			if ($sayfa_no>1 && $sayfa_no<=$toplam_sayfa_sayisi)
				{
					header("Location:kontrol.php?sayfa_no=$sayfa_no"); 						
				}
			else
				{
					header("Location:kontrol.php");
				}
		 }// (f) sil
	//*********************************************************************************************************************************
	if  (isset($_POST["aktif"]) || isset($_POST["aktif2"]))
		{ 
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $sql="Select * from  $tablo_ismi where kategori='$hizmet' order by siralama asc,numara asc limit $ilkkayit, $bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if (isset($_POST["onay_no"]))	
				{		
					$dizim=$_POST["onay_no"];
					for ($sayac=0; $sayac<$toplam_kayit; $sayac++)			       
						{    
							  $onay_no=$recordset[$sayac]["numara"];		
							  if   (isset($dizim["$onay_no"]))				    		
								   { 
									   $update_sql="Update $tablo_ismi  Set  aktif=1 where numara=$onay_no";
									   @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);				
								   }
							  elseif   (!isset($dizim["$onay_no"]))
								   {  
									   $update_sql="Update $tablo_ismi Set  aktif=0 where numara=$onay_no";
									   @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);				
								   }
						 } 				   
					} 
				else
					{ // Bütün Click'ler kaldirilmissa o zaman bütün sektorlerin aktivitesini 0 yap
						for ($sayac=0; $sayac<$toplam_kayit; $sayac++)			       
							{    
								  $onay_no=$recordset[$sayac]["numara"];		
								  $update_sql="Update $tablo_ismi Set  aktif=0 where numara=$onay_no";
								  @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);				
							} 				   
					}	
		       header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
		} // (f) aktiflestirme
	//*********************************************************************************************************************************
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>