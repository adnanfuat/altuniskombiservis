<? session_start();
$link_inherit="ekle_islem.php";
include("config.php");		  
set_time_limit(600);
$dosya_gecici_isim=$_FILES["video"]["tmp_name"];
$dosya_isim=$_FILES["video"]["name"];
$dosya_tip=$_FILES["video"]["type"];
$dosya_gecici_isim2=$_FILES["resim"]["tmp_name"];
$dosya_isim2=$_FILES["resim"]["name"];
$dosya_tip2=$_FILES["resim"]["type"];
if (isset($_SESSION['yonet']))
   {
	   	include($uzaklik."inc_s/baglanti.php");
	    include($uzaklik."inc_s/thumbnail.php");
		$n_ad=$_POST["ad"];
		$n_durum=$_POST["durum"];
		$n_kaynak=$_POST["kaynak"];
		$n_puan=$_POST["puan"];
		$kategori=$_SESSION["kategori"]; //echo "1111 ". $kategori;
		if  (isset($_FILES["video"]) && strlen($_FILES["video"]["name"])!=0) //  && $_FILES["video"]["type"]=="application/octet-stream"
	        {
			   $dosya_size=$_FILES["video"]["size"];
			   $dosya_size2=$_FILES["resim"]["size"];
			   if ($dosya_size>$max_file_size || $dosya_size2>$max_file_size)
			   	  {	
				       $err='boyut'; 
				  }																   
   	           else
	              {		
			            $ekle="Insert into $tablo_ismi (ad,kaynak,aktif,durum,kategori,puan) Values ('$n_ad','$n_kaynak','1','$n_durum','$kategori','$n_puan')";
			            @$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);		// echo $ekle;
					    $numara_bul_sql="Select max(numara) from ".$tablo_ismi;
						$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
				        $b_numara=$numara_bul_sql_calistir[0]["max(numara)"];
						
						$dosya_gecici_isim=$_FILES["video"]["tmp_name"];
        	            $dosya_isim = $_FILES["video"]["name"];
						$dosya_tip = $_FILES["video"]["type"];
						if (file_exists($video_dizini.$dosya_isim)) 
					       {
								 $parametre2=$video_dizini.$dosya_isim; @chmod($parametre2,0755); @unlink($parametre2);
						   }
				        $uzanti_bul=strrpos($dosya_isim,".");
						$uzanti=substr($dosya_isim,$uzanti_bul+1);
						$dosya="video".$b_numara.".".$uzanti;
						@move_uploaded_file($_FILES["video"]["tmp_name"] , $video_dizini.$dosya);
			            $ekle="Update $tablo_ismi set video_adres='$dosya' where numara='$b_numara'";
			            @$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);		
			     }
			} 
		else if (strlen($n_kaynak)>0)
			{
				$ekle="Insert into $tablo_ismi (ad,kaynak,aktif,durum,kategori,puan) Values ('$n_ad','$n_kaynak','1','$n_durum','$kategori','$n_puan')";
				@$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);		
			}
		else
			{
				$err="eksik_veri";
			}
		if  (!isset($err))
			{			
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				if  (isset($_FILES["resim"]) && strlen($_FILES["resim"]["name"])!=0 &&  ($_FILES["resim"]["type"]=='image/jpeg' ||  $_FILES["resim"]["type"]=='image/jpg' ||  $_FILES["resim"]["type"]=='image/pjpeg'))
					{
						   $dosya_size=$_FILES["resim"]["size"];		
						   if ($dosya_size>$max_file_size)
							  {	
								   $err='boyut'; 
							  }
						   else
							  {				 
									$numara_bul_sql="Select max(numara) from $tablo_ismi";
									$numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
									$b_numara=$numara_bul_sql_calistir[0]["max(numara)"];

									$dosya_gecici_isim2=$_FILES["resim"]["tmp_name"];
									$dosya_isim2= $_FILES["resim"]["name"];
									$dosya_tip2= $_FILES["resim"]["type"];
									if  (file_exists($resim_dizini.$dosya_isim2)) 
										{
											 $parametre2=$resim_dizini.$dosya_isim2; @chmod($parametre2,0755); @unlink($parametre2);
										}
									$uzanti_bul=strrpos($dosya_isim2,".");
									$uzanti=substr($dosya_isim2,$uzanti_bul+1);
									$dosya2="resim".$b_numara.".".$uzanti;
									@move_uploaded_file($_FILES["resim"]["tmp_name"] , $resim_dizini.$dosya2);

									$resim_ekle="Update $tablo_ismi  Set resim_adres='$dosya2' where numara=$b_numara";
									@$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);
									$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$b_numara")->fetchAll(PDO::FETCH_ASSOC);
									$buyuk_resim=$resim_ogren[0]["resim_adres"];
									Thumbnail($resim_dizini,$dosya2,$resim_dizini,$kck_m_w,$kck_m_h);
							 }
					 }
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		  }
	   if (isset($err))
		  {
				$_SESSION[$tablo_ismi.'n_ad']=$n_ad;
				$_SESSION[$tablo_ismi.'n_kaynak']=$n_kaynak;
				$_SESSION[$tablo_ismi.'n_durum']=$n_durum;
				$_SESSION[$tablo_ismi.'n_puan']=$n_puan;
				header("Location:ekle.php?err=$err"); 
		  }
	   else
	      {
			   unset($_SESSION[$tablo_ismi.'n_ad']);
			   unset($_SESSION[$tablo_ismi.'n_kaynak']);
			   unset($_SESSION[$tablo_ismi.'n_durum']);
			   unset($_SESSION[$tablo_ismi.'n_puan']);
			   include("yonlendir.php");
	 		  header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
		  }
	} 
 else 
    {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>