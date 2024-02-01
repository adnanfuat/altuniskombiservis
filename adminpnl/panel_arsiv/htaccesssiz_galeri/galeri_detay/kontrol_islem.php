<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
	 include($uzaklik."inc_s/baglanti.php");
 	 //$syonetim=$_SESSION["siteyonetici"];
	 $ustkategori_no=$_SESSION['ust_kategori_no'];
	 $altkategori_no=$_SESSION['alt_kategori'];
	 if  (isset($_GET["item"]) && 1==2)
		 { 
			  $item=$_GET["item"];
			  $sayfa_no=$_GET["sayfa"];																		 	  
			  $dosya_gecici_isim=$resim_dizini_ortaboy."resim".$item;
			  if (file_exists($dosya_gecici_isim.".jpg")) 
			     {
					 $parametre2=$dosya_gecici_isim.".jpg";	 @chmod($parametre2,0755); @unlink($parametre2);
				 }
			  if (file_exists($dosya_gecici_isim.".gif")) 
				 {
					 $parametre2=$dosya_gecici_isim.".gif";	 @chmod($parametre2,0755); @unlink($parametre2);
			     }												  
			  $dosya_gecici_isim=$resim_dizini."resim".$item;
		      if (file_exists($dosya_gecici_isim.".jpg")) 
				 {
					 $parametre2=$dosya_gecici_isim.".jpg";	 @chmod($parametre2,0755);	 @unlink($parametre2);
				 }
			  if (file_exists($dosya_gecici_isim.".gif")) 
				 {
					 $parametre2=$dosya_gecici_isim.".gif"; @chmod($parametre2,0755); @unlink($parametre2);
			     }
			 $resim_sil=@$baglanti->query("Update $tablo_ismi set resim_adres='' where numara='$item'");
			 header("Location:kontrol.php?sayfa_no=$sayfa_no");
	     } // (f) Resim Sil linkiyle gelindiyse ilgili kaydin resmi ve veritabanindaki resim bilgisi siliniyor..   
	 //************************************************************************************************************
	 if  (isset($_POST["tasi"]) || isset($_POST["tasi2"]))
		 {
			 $ilkkayit=$_POST["ilkkayit"];
			 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no and altkategori_no='$altkategori_no' order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if (isset($_POST["tasino"]))
				{
					$dizim=$_POST['tasino'];
					if (isset($_SESSION['tasi_ekart'])){ unset($_SESSION['tasi_ekart']); }
					$_SESSION['tasi_ekart']=$dizim;
					if (isset($_SESSION["menu_ust_kategori"])) { unset($_SESSION["menu_ust_kategori"]); }
					if (isset($_SESSION["menu_alt_kategori"])) { unset($_SESSION["menu_alt_kategori"]); }
					header("Location:kategori_degistir.php");
				}	
			else 
				{  
					header("Location:kontrol.php");
				}
		 } //(f) tasima
	 //**************************************************************************************************************************************
	 if  (isset($_POST["ekle"]) || isset($_POST["ekle2"]))   
		 {    	
			if (isset($_SESSION[$tablo_ismi.'n_ad'])){ unset($_SESSION[$tablo_ismi.'n_ad']); }
			if (isset($_SESSION[$tablo_ismi.'n_aciklama'])){unset($_SESSION[$tablo_ismi.'n_aciklama']); }
			if (isset($_SESSION[$tablo_ismi.'n_puan'])){unset($_SESSION[$tablo_ismi.'n_puan']); }
			if (isset($_SESSION[$tablo_ismi.'n_ekleyen']))	{unset($_SESSION[$tablo_ismi.'n_ekleyen']); }
			if (isset($_SESSION[$tablo_ismi.'n_hata'])){unset($_SESSION[$tablo_ismi.'n_hata']); }
			header("Location:ekle.php");  echo ".";  
		 }
	  //********************************************************************************************************************************
	  if (isset($_POST["hekle"]) || isset($_POST["hekle2"]))   
		 {    	
			header("Location:hizli_ekle.php");  echo ".";  
		}
	  //**************************************************************************************************************************************
	  if (isset($_POST["sil"]) || isset($_POST["sil2"]))
		 {  
		   $sayfa_no=$_POST["page"];
		   $ilkkayit=$_POST["ilkkayit"];
		   $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no and altkategori_no='$altkategori_no' order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
		   $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		   $toplam_kayit=count($recordset);
		   if (isset($_POST["silinecekler_numara"])) 
			  {
					$dizim=$_POST["silinecekler_numara"]; 
					for ($sayac=0; $sayac<$toplam_kayit; $sayac++)
						{    
							   $item_numara=$recordset[$sayac]["numara"];
							   $resim=$recordset[$sayac]["resim_adres"];
							   if   (isset($dizim["$item_numara"]))   
									{
										$item_sil="Delete  from $tablo_ismi where numara=$item_numara";
										@$baglanti->query($item_sil)->fetchAll(PDO::FETCH_ASSOC);		
										include("icerik_sil.php");																	
										// (s)  Resmi Sil 				
										$dosya_gecici_isim=$resim_dizini_ortaboy.$resim;
										if (file_exists($dosya_gecici_isim)) 
										   {
												 @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
										   }
										$dosya_gecici_isim=$resim_dizini.$resim;
										if (file_exists($dosya_gecici_isim)) 
										   {
											   @chmod($dosya_gecici_isim,0755); @unlink($dosya_gecici_isim);
										   }
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
	//**************************************************************************************************************************************
	if   (isset($_POST["aktif"]) || isset($_POST["aktif2"]))
		 { 
			 $ilkkayit=$_POST["ilkkayit"];
			 $sayfa_no=$_POST["page"];
			 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no and altkategori_no='$altkategori_no' order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
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
	//**************************************************************************************************************************************
	if   (isset($_POST["vitrin"]) || isset($_POST["vitrin2"]))
		 { 
			 $ilkkayit=$_POST["ilkkayit"];
			 $sayfa_no=$_POST["page"];
			 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no and altkategori_no='$altkategori_no' order by puan asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if (isset($_POST["vitrin_no"]))	
				{		
						$dizim=$_POST["vitrin_no"];
						for ($sayac=0; $sayac<$toplam_kayit; $sayac++)			       
							{    
								  $onay_no=$recordset[$sayac]["numara"];		
								  if   (isset($dizim["$onay_no"]))				    		
									   { 
										   $update_sql="Update $tablo_ismi  Set  vitrin=1 where numara=$onay_no";
										   @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);				
									   }
								  elseif   (!isset($dizim["$onay_no"]))
									   {  
										   $update_sql="Update $tablo_ismi Set  vitrin=0 where numara=$onay_no";
										   @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);		
									   }
							 } 				   
				 } 
			 else
				 { // Bütün Click'ler kaldirilmissa o zaman bütün sektorlerin aktivitesini 0 yap
					for ($sayac=0; $sayac<$toplam_kayit; $sayac++)			       
						{    
						   $onay_no=$recordset[$sayac]["numara"];		
						   $update_sql="Update $tablo_ismi Set  vitrin=0 where numara=$onay_no";
						   @$baglanti->query($update_sql)->fetchAll(PDO::FETCH_ASSOC);	
						} 				   
				 }	
			 header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
		  } // (f) aktiflestirme
		//**************************************************************************************************************************************
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>