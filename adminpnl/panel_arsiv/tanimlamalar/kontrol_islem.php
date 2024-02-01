<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		 include($uzaklik."inc_s/baglanti.php");
		 if  (isset($_GET["item"])) 
			 { 
				$item=$_GET["item"];		
				$sayfa_no=$_GET["sayfa"];																	 	  
				$dosya_gecici_isim=$resim_dizini."resim".$item;
				if (file_exists($dosya_gecici_isim.".jpg")) 
				   {
						$parametre2=$dosya_gecici_isim.".jpg";	@chmod($parametre2,0755); @unlink($parametre2);
				   }
				if (file_exists($dosya_gecici_isim.".gif")) 
				   {
						 $parametre2=$dosya_gecici_isim.".gif"; @chmod($parametre2,0755); @unlink($parametre2);
				   }
				$resim_sil=@$baglanti->query("Update $tablo_ismi set resim_adres='' where numara=$item");
				header("Location:kontrol.php?sayfa_no=$sayfa_no");
			 } // (f) Resim Sil linkiyle gelindiyse ilgili kaydin resmi ve veritabanindaki resim bilgisi siliniyor..   
		 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		 if (isset($_POST["ekle"]))   
			{    
				if (isset($_SESSION[$tablo_ismi.'n_ad'])) {unset($_SESSION[$tablo_ismi.'n_ad']);}
				if (isset($_SESSION[$tablo_ismi.'n_puan'])) {unset($_SESSION[$tablo_ismi.'n_puan']);}
				if (isset($_SESSION[$tablo_ismi.'n_dil'])) {unset($_SESSION[$tablo_ismi.'n_dil']);}
				header("Location:ekle.php");  
			}
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (isset($_POST["sil"]))
		    {     
				 $ilkkayit=$_POST["ilkkayit"];
				 $recordset_bul="Select * from  $tablo_ismi order by dil asc,puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				 $kayit_sayisi=count($recordset);
				 $sayfa_no=$_POST["page"];
				 if (isset($_POST["silinecekler_numara"]))
					{
						$dizim=$_POST["silinecekler_numara"];
		    		    for ($sayac=0; $sayac<$kayit_sayisi ;$sayac++)
	         				{    
						       $numara=$recordset[$sayac]["numara"];
							   $resim=$recordset[$sayac]["resim_adres"];
							   if   (isset($dizim["$numara"]))   
	            				    {
				   	   					$sil="Delete  from $tablo_ismi  where numara=$numara";
									    @$baglanti->query($sil)->fetchAll(PDO::FETCH_ASSOC);	
										include("icerik_sil.php");																		
								 	    $dosya_gecici_isim=$resim_dizini.$resim;
										if (file_exists($dosya_gecici_isim)) 
										   {
			    						     @chmod($dosya_gecici_isim,0755);
										   	 @unlink($dosya_gecici_isim);
										   }
		            	            }									
							}  
                     } 
	 			$sql_cumlesi="select numara from $tablo_ismi";
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
		///////////////////////////////////////////////////////////////////////////////////////////////////////////
		if  (isset($_POST["aktiflestirme"]))
	        { 			
				 $ilkkayit=$_POST["ilkkayit"];
				 $recordset_bul="Select * from  $tablo_ismi order by dil asc,puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				 $kayit_sayisi=count($recordset);
				 $sayfa_no=$_POST["page"];
				 if (isset($_POST["onay_no"]))	
					{		
						$dizim=$_POST["onay_no"];
						for ($sayac=0; $sayac<$kayit_sayisi ;$sayac++)			       
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
					{
						for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)			       
							{    
							   $onay_no=$recordset[$sayac]["numara"];										  
							   $update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
							   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);				
							} 				   
					}	
				header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
			} // (f) aktiflestirme
		///////////////////////////////////////////////////////////////////////////////////////////////////////////
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>