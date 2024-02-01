<? session_start();
$link_inherit='kontrol_islem.php'; 
include("config.php");		  
if  (isset($_SESSION['yonet']))
    {
		 include($uzaklik."inc_s/baglanti.php");
		 $recordset_bul="Select * from  $tablo_ismi";
		 $urun_numara=$_SESSION[$tablo_ismi."urun_numara"];
		 
		 //$urun_numara=$_SESSION['urun_numara'];
		 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
		 $kayit_sayisi=count($recordset);
		 //************************************************************************************************************
		 if  (isset($_POST["ekle"])) 
		 	 {  
			    unset($_SESSION[$tablo_ismi.'n_ad']);
			    unset($_SESSION[$tablo_ismi.'n_kaynak']);
				unset($_SESSION[$tablo_ismi.'n_durum']);
				header("Location:ekle.php");  
			}
		 //************************************************************************************************************			
		 if (isset($_POST["sil"]))
		    {     
				$sayfa_no=$_POST["page"];
				$ilkkayit=$_POST["ilkkayit"];
				$recordset_bul="Select * from  $tablo_ismi where kategori=$urun_numara order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				$recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				$kayit_sayisi=count($recordset);
				if (isset($_POST["silinecekler_numara"]))
				   {
						$dizim=$_POST["silinecekler_numara"];
		    		    for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
	         				{    
						       $numara=$recordset[$sayac]["numara"];
							   $resim_adres=$recordset[$sayac]["resim_adres"];
							   $video_adres=$recordset[$sayac]["video_adres"];
							   if   (isset($dizim["$numara"]))   
	            				    {
				   	   					$sil="Delete  from $tablo_ismi  where numara=$numara";
										@$baglanti->query($sil)->fetchAll(PDO::FETCH_ASSOC);	
								 	    $dosya_gecici_isim=$resim_dizini.$resim_adres;
									    if (file_exists($dosya_gecici_isim)) 
									       {
											  $parametre2=$dosya_gecici_isim; @chmod($parametre2,0755); @unlink($parametre2);
										   }
								 	    $dosya_gecici_isim2=$video_dizini.$video_adres;
									    if (file_exists($dosya_gecici_isim2)) 
									       {
											  $parametre2=$dosya_gecici_isim2; @chmod($parametre2,0755); @unlink($parametre2);
										   }
			                        }									
							}  
                   } 
   			     header("Location:kontrol.php"); 						
	        }// (f) sil
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (isset($_POST["aktiflestirme"]))
			{ 			
					$sayfa_no=$_POST["page"];
					$ilkkayit=$_POST["ilkkayit"];
					$recordset_bul="Select * from  $tablo_ismi where kategori=$urun_numara order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
					$recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
					$kayit_sayisi=count($recordset);
					if  (isset($_POST["onay_no"]))	
						{		
							$dizim=$_POST["onay_no"];
							for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)			       
								{    
									$onay_no=$recordset[$sayac]["numara"];										  
									if   (isset($dizim["$onay_no"]))				    		
										 { 
											   $update="Update $tablo_ismi  Set  aktif=1 where numara=$onay_no";
											   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);				
										 }
									elseif   (!isset($dizim["$onay_no"]))
										 {   
											   $update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
											   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);				
										  }
								 } 				   
							} 
						else
							{ // Bütün Click'ler kaldirilmissa o zaman bütün sektorlerin aktivitesini 0 yap
								for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)			       
									{    
										  $onay_no=$recordset[$sayac]["numara"];										  
										  $update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
										  @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);				
									} 				   
							}	
						header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
			  } // (f) aktiflestirme
		 //**************************************************************************************************************************************
	 } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>