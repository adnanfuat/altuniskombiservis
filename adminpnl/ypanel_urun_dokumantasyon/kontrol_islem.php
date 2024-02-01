<? 	 session_start();
$link_inherit='kontrol_islem.php'; 
include("config.php");		  
if  (isset($_SESSION['yonet']))
    {
		 include($uzaklik."inc_s/baglanti.php");
		 $urun_numara=$_SESSION[$tablo_ismi."urun_numara"];
		 
		 //print_r ($_POST);
		 //************************************************************************************************************
		 if (isset($_POST["ekle"])) {  header("Location:ekle.php");  }
		 //************************************************************************************************************			
		 if (isset($_POST["sil"]))
		    {     
				$sayfa_no=$_POST["page"];
				$ilkkayit=$_POST["ilkkayit"];
				$recordset_bul="Select * from  $tablo_ismi where urun_no='$urun_numara' order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				$recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				$kayit_sayisi=count($recordset);
				if (isset($_POST["silinecekler_numara"]))
				   {
						$dizim=$_POST["silinecekler_numara"];
		    		    for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
	         				{    
						       $numara=$recordset[$sayac]["numara"];
							   $dosya=$recordset[$sayac]["dosya"];
							   if   (isset($dizim["$numara"]))   
	            				    {
				   	   					$sil="Delete  from $tablo_ismi  where numara=$numara";
										@$baglanti->query($sil)->fetchAll(PDO::FETCH_ASSOC);	
								 	    $dosya_gecici_isim=$dosya_dizini.$dosya;
									    if (file_exists($dosya_gecici_isim)) 
									       {
											  @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
										   }
			                        }									
							}  
	                 } 
   				 header("Location:kontrol.php"); 						
	    	  }// (f) sil
		 ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  
		  if  (isset($_POST["aktiflestirme"]))
			  { 			
				 //echo 11111;
				 $ilkkayit=$_POST["ilkkayit"];
				 $recordset_bul="Select * from  $tablo_ismi where urun_no='$urun_numara' order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				 //echo "Select * from  $tablo_ismi urun_no='$urun_numara' order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
				 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
				 $kayit_sayisi=count($recordset);
				 $sayfa_no=$_POST["page"];
				 
				 if (isset($_POST["onay_no"]))	
					{		
						$dizim=$_POST["onay_no"];
						for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)			       
							{    
								  //echo 0;
								  $onay_no=$recordset[$sayac]["numara"];										  
								  if   (isset($dizim["$onay_no"]))				    		
									   { 
										   $update="Update $tablo_ismi  Set  aktif=1   where numara=$onay_no and urun_no='$urun_numara'";
										   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);		
										  // echo 1;		
									   }
								  elseif   (!isset($dizim["$onay_no"]))
									   {  
										   $update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no and urun_no='$urun_numara'";
										   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);	
										  // echo 2;			
									   }
							 } 				   
					} 
				else
					{
						//echo 3;	
						for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)			       
							{    
							   $onay_no=$recordset[$sayac]["numara"];										  
							   $update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
							   @$baglanti->query($update)->fetchAll(PDO::FETCH_ASSOC);	
							    //echo 4;				
							} 				   
					}	
			header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
			} // (f) aktiflestirme
		  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////			  
	 } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>