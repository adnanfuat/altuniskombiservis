<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
set_time_limit(600);
if (isset($_SESSION['yonet']))
   {
	   	include($uzaklik."inc_s/baglanti.php");
		$n_ad=$_POST["ad"];
		$n_eklenme_tarihi=date("Y-m-d H:i:s");
		if  (isset($_FILES["dosya"]) && strlen($_FILES["dosya"]["name"])!=0)
	        {	echo 1;
				$dosya_gecici_isim=$_FILES["dosya"]["tmp_name"];
				$dosya_isim = $_FILES["dosya"]["name"];
				$dosya_tip = $_FILES["dosya"]["type"];
			    $dosya_size=$_FILES["dosya"]["size"];
			    if   ($dosya_size>$max_file_size)
			    	 {	
				         $err='boyut';  echo 2;
				     }																   
   	            else
	                 {		echo 3;		 
			             $ekle="Insert into $tablo_ismi (ad, eklenme_tarihi, aktif) Values ('$n_ad','$n_eklenme_tarihi','1')";
						 echo  $ekle;
			             @$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);		
					     $numara_bul_sql="Select max(numara) from ".$tablo_ismi;
					     $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
				         $b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
  						 $uzanti_ogren=strrpos($dosya_isim,".");
						 $uzanti=substr($dosya_isim,$uzanti_ogren);
						 $dosya_ismi="dosya".$b_numara.$uzanti;
					     @move_uploaded_file($_FILES["dosya"]["tmp_name"] , $dosya_dizini.$dosya_ismi);
						 $ekle="Update $tablo_ismi set dosya='$dosya_ismi' where numara=$b_numara";
						 @$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);
						 
			         }
			 } 
		 else
			 {
				 $err="eksik_veri";
			 }
	   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	   if    (isset($err))
		     {
				  $_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				  header("Location:ekle.php?err=$err"); 
		     }
	   else
	         {
			      unset($_SESSION[$tablo_ismi.'n_ad']);
				  include("yonlendir.php");
	 		      header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
		     }
	   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////		  
	} 
 else 
    {
		unset($_SESSION['yonet']);
		include('error.php');
	}  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>