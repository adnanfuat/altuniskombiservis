<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
set_time_limit(600);
if (isset($_SESSION['yonet']))
   {
	   	include($uzaklik."inc_s/baglanti.php");
		include($uzaklik."inc_s/thumbnail.php");
		$kategori=$_SESSION["kategori"];
		$numara=$_POST["gizli"];
		$ad=$_POST["ad"];
		$kaynak=$_POST["kaynak"];
		$durum=$_POST["durum"];
		$puan=$_POST["puan"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (isset($_FILES["video"]) && strlen($_FILES["video"]["name"])!=0)// && $_FILES["video"]["type"]=="application/octet-stream"
    	    {
				$dosya_gecici_isim=$_FILES["video"]["tmp_name"];
				$dosya_isim=$_FILES["video"]["name"];
				$dosya_tip=$_FILES["video"]["type"];
				//echo $dosya_tip;
			   $dosya_size=$_FILES["video"]["size"];		
			   if ($dosya_size>$max_file_size)
				  {	
					   $err='boyut'; 
				  }
			   else
				  {				 
						if  (count($recordset)<>0)
							{	  
								$video=$recordset[0]["video_adres"];
								if (strlen($video)>0)
								   {
									  $dosya_gecici_isim=$video_dizini.$video;
									  if (file_exists($dosya_gecici_isim)) 
										 {
											 $parametre2=$dosya_gecici_isim; @chmod($parametre2,0755); @unlink($parametre2);
										 }
									}
							}
						$dosya_gecici_isim=$_FILES["video"]["tmp_name"];
						$dosya_isim = $_FILES["video"]["name"];
						$dosya_tip = $_FILES["video"]["type"];
						@move_uploaded_file($_FILES["video"]["tmp_name"] , $video_dizini.$video);
						$video_ekle="Update $tablo_ismi  Set video_adres='$video',ad='$ad',kaynak='$kaynak',durum='$durum',kategori='$kategori',puan='$puan' where numara=$numara";
						@$baglanti->query($video_ekle)->fetchAll(PDO::FETCH_ASSOC);
				 }
			}			 
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
						   if   (count($recordset)<>0)
								{	  
									$resim=$recordset[0]["resim_adres"];
									if (strlen($resim)>0)
									   {
										  $dosya_gecici_isim=$resim_dizini.$resim;
										  if (file_exists($dosya_gecici_isim)) 
											 {
												 $parametre2=$dosya_gecici_isim; @chmod($parametre2,0755); @unlink($parametre2);
											 }
										}
								 }
							$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$numara")->fetchAll(PDO::FETCH_ASSOC);
							$buyuk_resim=$resim_ogren[0]["resim_adres"];
							//echo $buyuk_resim;
							$dosya_gecici_isim=$_FILES["resim"]["tmp_name"];
							$dosya_isim = $_FILES["resim"]["name"];
							$dosya_tip = $_FILES["resim"]["type"];
							$dosya_isim2= $_FILES["resim"]["name"];
							$uzanti_bul=strrpos($dosya_isim2,".");
							$uzanti=substr($dosya_isim2,$uzanti_bul+1);
							$dosya2="resim".$numara.".".$uzanti;
							@move_uploaded_file($_FILES["resim"]["tmp_name"] , $resim_dizini.$dosya2);
							$resim_ekle="Update $tablo_ismi  Set resim_adres='$dosya2',ad='$ad',kaynak='$kaynak',durum='$durum',kategori='$kategori',puan='$puan' where numara=$numara";
							@$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);
							//$resim_ogren=@$baglanti->query("Select * from $tablo_ismi where numara=$numara")->fetchAll(PDO::FETCH_ASSOC);
							//$buyuk_resim=$resim_ogren[0]["resim_adres"];
							Thumbnail($resim_dizini,$dosya2,$resim_dizini,$kck_m_w,$kck_m_h);
						}
		   }
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$ad;
				$_SESSION[$tablo_ismi.'kaynak']=$kaynak;
				$_SESSION[$tablo_ismi.'durum']=$durum;
				$_SESSION[$tablo_ismi.'puan']=$puan;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		   }
		else
		   {
				$video_ekle="Update $tablo_ismi  Set ad='$ad',kaynak='$kaynak',durum='$durum',kategori='$kategori',puan='$puan' where numara=$numara";
				@$baglanti->query($video_ekle)->fetchAll(PDO::FETCH_ASSOC);
				unset($_SESSION[$tablo_ismi.'ad']);
				unset($_SESSION[$tablo_ismi.'kaynak']);
				unset($_SESSION[$tablo_ismi.'durum']);
				unset($_SESSION[$tablo_ismi.'puan']);
				include("yonlendir.php");
				header("Location:kontrol.php?sayfa_no=$donulecek_sayfa"); 	 
		   }
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }
?>