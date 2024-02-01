<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");		  
if  (isset($_SESSION['yonet']))
	{
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//*************************************************************************************************
		if (isset($_GET["item"])) 
	 	   { 
			  $item=$_GET["item"];
			  $sayfa_no=$_GET["page"];
			  $recordset_bul="Select resim_adres from  $tablo_ismi where numara='$item'";
			  $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			  $resim_adres=$recordset[0]["resim_adres"];
			  if (file_exists($resim_dizini.$resim_adres) && $resim_dizini.$resim_adres<>$resim_dizini) 
			  	 { 
				 	 @chmod($resim_dizini.$resim_adres,0755); @unlink($resim_dizini.$resim_adres);
				 }
			  if (file_exists($thumb_resim_dizini.$resim_adres) && $thumb_resim_dizini.$resim_adres<>$thumb_resim_dizini) 
			  	 { 
				 	 @chmod($thumb_resim_dizini.$resim_adres,0755); @unlink($thumb_resim_dizini.$resim_adres);
				 }
			  $resim_sil=@$baglanti->query("Update $tablo_ismi set resim_adres=NULL where numara=$item");
			  header("Location:kontrol.php?sayfa_no=$sayfa_no");
          } // (f) Resim Sil linkiyle gelindiyse ilgili kaydin resmi ve veritabanindaki resim bilgisi siliniyor..   
	  //********************************************************************************************************
      if (isset($_POST["ekle"]) || isset($_POST["ekle2"]))   
		 {    
			if (isset($_SESSION[$tablo_ismi."n_ad"])) { unset($_SESSION[$tablo_ismi."n_ad"]); }
			if (isset($_SESSION[$tablo_ismi."n_icerik"])) { unset($_SESSION[$tablo_ismi."n_icerik"]); }
			if (isset($_SESSION[$tablo_ismi."n_ozet"])) { unset($_SESSION[$tablo_ismi."n_ozet"]); }
			if (isset($_SESSION[$tablo_ismi."n_dil"])) { unset($_SESSION[$tablo_ismi."n_dil"]); }
			//if (isset($_SESSION[$tablo_ismi."n_puan"])) { unset($_SESSION[$tablo_ismi."n_puan"]); }
			header("Location:ekle.php");  
	     }
	//*********************************************************************************************************
    if  (isset($_POST["sil"]) || isset($_POST["sil2"]))
		{     
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $recordset_bul="Select * from $tablo_ismi order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			 $kayit_sayisi=count($recordset);
			 if (isset($_POST["silinecekler_numara"]))  
				{
					$dizim=$_POST["silinecekler_numara"];
	    		    for ($sayac=0; $sayac<$kayit_sayisi; $sayac++)
         				{    
					       $numara=$recordset[$sayac]["numara"];
						   $resim_adres=$recordset[$sayac]["resim_adres"];
						   if   (isset($dizim["$numara"]))   
            				    {
			   	   					  $sil="Delete  from $tablo_ismi  where numara=$numara";
									  @$baglanti->query($sil)->fetchAll(PDO::FETCH_ASSOC);
									  include("icerik_sil.php");
									  if (file_exists($resim_dizini.$resim_adres) && $resim_dizini.$resim_adres<>$resim_dizini) 
										 { 
											 @chmod($resim_dizini.$resim_adres,0755); @unlink($resim_dizini.$resim_adres);
										 }
									  if (file_exists($thumb_resim_dizini.$resim_adres) && $thumb_resim_dizini.$resim_adres<>$thumb_resim_dizini) 
										 { 
											 @chmod($thumb_resim_dizini.$resim_adres,0755); @unlink($thumb_resim_dizini.$resim_adres);
										 }
		                         }									
						 }  
                    } 
				$sql_cumlesi="select numara from $tablo_ismi";
				$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
				$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
				include($uzaklik."inc_s/sayfalama.php");
				sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
				echo 0;
				if  ($sayfa_no>1 && $sayfa_no<=$toplam_sayfa_sayisi)
					{
						echo 1;
						header("Location:kontrol.php?sayfa_no=$sayfa_no"); 	
											
					}
				else
					{
						echo 2;
						header("Location:kontrol.php");
					}
	       }// (f) sil
		//*****************************************************************************************************
		if (isset($_POST["aktiflestirme"]) || isset($_POST["aktiflestirme2"]))
    	   { 			
				 $sayfa_no=$_POST["page"];
				 $ilkkayit=$_POST["ilkkayit"];
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
		//************************************************************************************************************
    } 
 else 
    {
	    unset($_SESSION['yonet']);
	    include('error.php');
    }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>