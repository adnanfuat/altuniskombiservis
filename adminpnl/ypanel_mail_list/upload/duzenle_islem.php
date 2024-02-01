<? session_start();
$link_inherit="duzenle_islem.php";
include("config.php");		  
set_time_limit(600);
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$numara=$_POST["gizli"];
		$ad=$_POST["ad"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (isset($_FILES["dosya"]) && strlen($_FILES["dosya"]["name"])!=0)
			{
			   $dosya_size=$_FILES["dosya"]["size"];		
			   if ($dosya_size>$max_file_size)
				  {	
					   $err='boyut'; 
				  }
			   else
				  {				 
						if  (count($recordset)>0)
							{	  
								$dosya=$recordset[0]["dosya"];
								if  (strlen($dosya)>0)
								    {
										  $dosya_gecici_isim=$dosya_dizini.$dosya;
										  if (file_exists($dosya_gecici_isim)) 
											 {
												 $parametre2=$dosya_gecici_isim; @chmod($parametre2,0755); @unlink($parametre2);
											 }
								    }
							}
						$dosya_gecici_isim=$_FILES["dosya"]["tmp_name"];
						$dosya_isim = $_FILES["dosya"]["name"];
  						$uzanti_ogren=strrpos($dosya_isim,".");
						$uzanti=substr($dosya_isim,$uzanti_ogren);
						$dosya_ismi="dosya".$numara.$uzanti;
						@move_uploaded_file($_FILES["dosya"]["tmp_name"] , $dosya_dizini.$dosya_ismi);
						$ekle="Update $tablo_ismi Set dosya='$dosya_ismi' where numara=$numara";
						@$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);
				  }
		   }			 
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if (isset($err))
		   {
				$_SESSION[$tablo_ismi.'ad']=$ad;
				header("Location:duzenle.php?err=$err&numara=$numara"); 
		   }
		else
		   {
				$ekle="Update $tablo_ismi set ad='$ad' where numara=$numara";
				@$baglanti->query($ekle)->fetchAll(PDO::FETCH_ASSOC);
				unset($_SESSION[$tablo_ismi.'ad']);
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