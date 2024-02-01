<? 	 session_start();
$link_inherit='kontrol_islem.php';
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
	 //***********************************************************************************************************************
	 if (isset($_POST["ekle"]))   
		{    
			if (isset($_SESSION[$tablo_ismi.'n_ad'])) {unset($_SESSION[$tablo_ismi.'n_ad']); }
			if (isset($_SESSION[$tablo_ismi.'n_mesaj'])) { unset($_SESSION[$tablo_ismi.'n_mesaj']); }
			if (isset($_SESSION[$tablo_ismi.'n_eposta'])) { unset($_SESSION[$tablo_ismi.'n_eposta']); }
			if (isset($_SESSION[$tablo_ismi.'n_telefon'])) { unset($_SESSION[$tablo_ismi.'n_telefon']); }
			if (isset($_SESSION[$tablo_ismi.'n_hata'])) { unset($_SESSION[$tablo_ismi.'n_hata']);	} 												
			header("Location:ekle.php");  
	    }
	//***********************************************************************************************************************
	if  (isset($_POST["sil"]))
	    {     
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $recordset_bul="Select * from  $tablo_ismi order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			 $kayit_sayisi=count($recordset);
			 if (isset($_POST["silinecekler_numara"]))
				{
					$dizim=$_POST["silinecekler_numara"];
					for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
						{    
						   $numara=$recordset[$sayac]["numara"];
						   if   (isset($dizim["$numara"]))   
								{
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
			  if ($sayfa_no>1 && $sayfa_no<=$toplam_sayfa_sayisi)
				 {
					header("Location:kontrol.php?sayfa_no=$sayfa_no"); 						
				 }
			  else
				 {
					header("Location:kontrol.php");
				 }
         }// (f) sil
	  //**************************************************************************************************************
	 if  (isset($_POST["aktiflestirme"]))
	     { 			
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $recordset_bul="Select * from  $tablo_ismi order by numara desc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			 $kayit_sayisi=count($recordset);
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
	 //**********************************************************************************************************
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>