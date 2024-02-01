<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
	 //$syonetim=$_SESSION["siteyonetici"];
	 include($uzaklik."inc_s/baglanti.php");
  	 $ustkategori_no=$_SESSION['ust_kategori_no'];
	 //*********************************************************************************************************************
	 if  (isset($_GET["item"]))
	  	 {
			  $item=$_GET["item"];
			  $sayfa_no=$_GET["sayfa"];
			  $dosya_gecici_isim=$resim_dizini."resim".$item;
			  if (file_exists($dosya_gecici_isim.".jpg"))
			     {
					 $parametre2=$dosya_gecici_isim.".jpg"; @chmod($parametre2,0755); @unlink($parametre2);
				 }
			  if (file_exists($dosya_gecici_isim.".gif"))
				 {
					 $parametre2=$dosya_gecici_isim.".gif"; @chmod($parametre2,0755); @unlink($parametre2);
			     }
			  $resim_sil=@$baglanti->query("Update $tablo_ismi set resim_adres='' where numara=$item");
			  header("Location:kontrol.php?sayfa_no=$sayfa_no");
        } // (f) Resim Sil linkiyle gelindiyse ilgili kaydin resmi ve veritabanindaki resim bilgisi siliniyor..
	//*****************************************************************************************************************************
    if  (isset($_POST["tasi"]) || isset($_POST["tasi2"]))
	    {
			 $ilkkayit=$_POST["ilkkayit"];
			 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no order by siralama asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if (isset($_POST["tasino"]))
				{
					$dizim=$_POST['tasino'];
					if  (isset($_SESSION[$tablo_ismi.'tasi_altkategori']))
						{
							unset($_SESSION[$tablo_ismi.'tasi_altkategori']);
						}
					$_SESSION[$tablo_ismi.'tasi_altkategori']=$dizim;
					header("Location:kategori_degistir.php");
				}
			else
				{
					header("Location:kontrol.php");
				}
		} //(f) tasima
	//****************************************************************************************************************************
    if  (isset($_POST["ekle"]) || isset($_POST["ekle2"]))
		{
			if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
			if (isset($_SESSION[$tablo_ismi.'siralama'])) {unset($_SESSION[$tablo_ismi.'siralama']);}
			header("Location:ekle.php");
		}
	//****************************************************************************************************************************
    if (isset($_POST["sil"]) || isset($_POST["sil2"]))
       {
		 $sayfa_no=$_POST["page"];
		 $ilkkayit=$_POST["ilkkayit"];
		 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no order by siralama asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi ";
		 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		 $toplam_kayit=count($recordset);
		 if (isset($_POST["silinecekler_numara"]))
			{
				$dizi=$_POST["silinecekler_numara"];
	   		    for ($sayac=0; $sayac<$toplam_kayit; $sayac++)
       				{
						$altkategori=$recordset[$sayac]["numara"];
						$resim=$recordset[$sayac]["resim_adres"];
						if   (isset($dizi[$altkategori]))
							 {
								 $kategori_sil="Delete  from $tablo_ismi  where numara=$altkategori";
								 @$baglanti->query($kategori_sil)->fetchAll(PDO::FETCH_ASSOC);
								 include("icerik_sil.php");
								 $dosya_gecici_isim=$resim_dizini.$resim;
								 if (file_exists($dosya_gecici_isim))
									{
										 @chmod($dosya_gecici_isim,0755);  	 @unlink($dosya_gecici_isim);
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
	//**************************************************************************************************************************************
	if    (isset($_POST["aktiflestirme"]) || isset($_POST["aktiflestirme2"]))
	      { 			
			 $ilkkayit=$_POST["ilkkayit"];
			 $sayfa_no=$_POST["page"];
			 $sql="Select * from  $tablo_ismi where ustkategori_no=$ustkategori_no order by siralama asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi ";
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
									   $altsektor_update="Update $tablo_ismi  Set  aktif=1 where numara=$onay_no";
			                	       @$baglanti->query($altsektor_update)->fetchAll(PDO::FETCH_ASSOC);				
                			       }
							  elseif   (!isset($dizim["$onay_no"]))
				    	           {  
									   $altsektor_update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
			                	       @$baglanti->query($altsektor_update)->fetchAll(PDO::FETCH_ASSOC);				
			                       }
						 } 				   
				 } 
			 else
				{ // Bütün Click'ler kaldirilmissa o zaman bütün sektorlerin aktivitesini 0 yap
				    for ($sayac=0; $sayac<$toplam_kayit; $sayac++)			       
				        {    
						       $onay_no=$recordset[$sayac]["numara"];										  
							   $altsektor_update="Update $tablo_ismi  Set  aktif=0 where numara=$onay_no";
	                	       @$baglanti->query($altsektor_update)->fetchAll(PDO::FETCH_ASSOC);				
						} 				   
				 }	
	          header("Location:kontrol.php?sayfa_no=$sayfa_no"); 			
		   } // (f) aktiflestirme
		//***********************************************************************************************************
	 } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php");
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>