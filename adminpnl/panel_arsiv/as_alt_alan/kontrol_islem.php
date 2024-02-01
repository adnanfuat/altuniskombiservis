<? 	 session_start();
$link_inherit='kontrol_islem.php';
include("config.php");		  
if  (isset($_SESSION['yonet']))
    {
		 include($uzaklik."inc_s/baglanti.php");
		 //***************************************************************************************************************
		 if (isset($_POST["ekle"]))   
			{    
				if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
				if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
				if (isset($_SESSION[$tablo_ismi.'yukseklik'])) {unset($_SESSION[$tablo_ismi.'yukseklik']);}
				if (isset($_SESSION[$tablo_ismi.'genislik'])) {unset($_SESSION[$tablo_ismi.'genislik']);}
				if (isset($_SESSION[$tablo_ismi.'resim'])) {unset($_SESSION[$tablo_ismi.'resim']);}
				if (isset($_SESSION[$tablo_ismi.'link'])) {unset($_SESSION[$tablo_ismi.'link']);}
				if (isset($_SESSION[$tablo_ismi.'altbilgi'])) {unset($_SESSION[$tablo_ismi.'altbilgi']);}
				header("Location:ekle.php");  print "aa"; 
		    }
		 //***************************************************************************************************************
		 if    (isset($_POST["sil"]))
		    {     
				$sayfa_no=$_POST["page"];
				$ilkkayit=$_POST["ilkkayit"];
				$recordset_bul="Select * from  $tablo_ismi order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				$recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				$kayit_sayisi=count($recordset);
				if (isset($_POST["silinecekler_numara"]))
				   {
						$dizim=$_POST["silinecekler_numara"];
		    		    for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
	         				{    
						       $numara=$recordset[$sayac]["numara"];
							   $dosya=$recordset[$sayac]["resim_adres"];
							   if   (isset($dizim["$numara"]))   
	            				    {
								 	    $dosya_gecici_isim=$resim_dizini.$dosya;
								        if (file_exists($resim_dizini.$dosya))    
										   {  
										       @chmod($resim_dizini.$dosya,0777); @unlink($resim_dizini.$dosya);
									   	   }
				   	   					$sil="Delete  from $tablo_ismi  where numara=$numara";
										@$baglanti->query($sil)->fetchAll(PDO::FETCH_ASSOC);	
			                        }									
							}  
                    } 
	 			$sql_cumlesi="select numara from $tablo_ismi";
				$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
				$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
				include($uzaklik."inc_s/sayfalama.php");
				sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
				if  ($sayfa_no>1 && $sayfa_no<=$toplam_sayfa_sayisi)
					{
			   			header("Location:kontrol.php?sayfa_no=$sayfa_no"); 						
					}
				else
					{
						header("Location:kontrol.php");
					}
	        }// (f) sil
		 //***************************************************************************************************************
		if (isset($_POST["aktiflestirme"]))
		   { 			
			  $ilkkayit=$_POST["ilkkayit"];
			  $sayfa_no=$_POST["page"];
			  $recordset_bul="Select * from  $tablo_ismi order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			  $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			  $kayit_sayisi=count($recordset);
			  if (isset($_POST["onay_no"]))	
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
		 //***************************************************************************************************************
   } 
else 
   {
		  unset($_SESSION['yonet']);
		  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>