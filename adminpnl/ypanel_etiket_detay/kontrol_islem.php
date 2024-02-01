<? session_start();
$link_inherit='kontrol_islem.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
	 include($uzaklik."inc_s/baglanti.php");
   	 $haber_no=$_SESSION[$tablo_ismi.'haber_no'];
	 //$syonetim=$_SESSION["siteyonetici"];
	 //*****************************************************************************************************************
	 if   (isset($_GET["item"]))
	 	  {
			  $item=$_GET["item"];
			  $sayfa_no=$_GET["sayfa"];
			  $recordset_bul="Select resim_adres from  $tablo_ismi where numara='$item'";
			  $recordset=@$baglanti->query($recordset_bul)->fetchAll(PDO::FETCH_ASSOC);
			  $resim_adres=$recordset[0]["resim_adres"];
			  if (file_exists($resim_dizini.$resim_adres) && $resim_dizini.$resim_adres<>$resim_dizini) 
			  	 { 
				 	 @chmod($resim_dizini.$resim_adres,0755); @unlink($resim_dizini.$resim_adres);
				 }
			  if (file_exists($kategori_thumb_resim_dizini.$resim_adres) && $kategori_thumb_resim_dizini.$resim_adres<>$kategori_thumb_resim_dizini) 
			  	 { 
				 	 @chmod($kategori_thumb_resim_dizini.$resim_adres,0755); @unlink($kategori_thumb_resim_dizini.$resim_adres);
				 }
			  $resim_sil=@$baglanti->query("Update $tablo_ismi set resim_adres=NULL where numara=$item");
			  header("Location:kontrol.php?sayfa_no=$sayfa_no");
          } // (f) Resim Sil linkiyle gelindiyse ilgili kaydin resmi ve veritabanindaki resim bilgisi siliniyor..   
	  //***********************************************************************************************
	  if  (isset($_POST["ekle"]) || isset($_POST["ekle2"]))   
		  {    
			  if (isset($_SESSION[$tablo_ismi.'n_icerik'])) {unset($_SESSION[$tablo_ismi.'n_icerik']);}
			  if (isset($_SESSION[$tablo_ismi.'n_radio'])) {unset($_SESSION[$tablo_ismi.'n_radio']);}
			  header("Location:ekle.php");  
	      }
	 //*********************************************************************************************************************************
	 if  (isset($_POST["sil"]) || isset($_POST["sil2"]))
		 {     
			 $sayfa_no=$_POST["page"];
			 $ilkkayit=$_POST["ilkkayit"];
			 $sql="Select * from  $tablo_ismi where haber_no=$haber_no order by numara asc limit $ilkkayit,$bir_sayfadaki_toplam_kayit_sayisi ";
			 $recordset=@$baglanti->query($sql)->fetchAll(PDO::FETCH_ASSOC);
			 $toplam_kayit=count($recordset);
			 if  (isset($_POST["silinecekler_numara"]))
				 {
					$dizi=$_POST["silinecekler_numara"]; 
	    		    for ($sayac=0; $sayac<$toplam_kayit; $sayac++)
         				{    
					       $altkategori=$recordset[$sayac]["numara"];
						   $resim_adres=$recordset[$sayac]["resim_adres"];
						   if   (isset($dizi[$altkategori]))   
            				    {
									  $kategori_sil="Delete  from $tablo_ismi  where numara=$altkategori";
									  @$baglanti->query($kategori_sil)->fetchAll(PDO::FETCH_ASSOC);	
									  //include("icerik_sil.php");																		
									  if (file_exists($resim_dizini.$resim_adres) && $resim_dizini.$resim_adres<>$resim_dizini) 
										 { 
											 @chmod($resim_dizini.$resim_adres,0755); @unlink($resim_dizini.$resim_adres);
										 }
									  if (file_exists($kategori_thumb_resim_dizini.$resim_adres) && $kategori_thumb_resim_dizini.$resim_adres<>$kategori_thumb_resim_dizini) 
										 { 
											 @chmod($kategori_thumb_resim_dizini.$resim_adres,0755); @unlink($kategori_thumb_resim_dizini.$resim_adres);
										 }
		                        }									
						 }  
                    } 
	 			$sql_cumlesi="select numara from $tablo_ismi where haber_no='$haber_no'";
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
		//**********************************************************************************************************
    } 
else 
    {
	  unset($_SESSION['yonet']);
	  include("error.php");
	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>