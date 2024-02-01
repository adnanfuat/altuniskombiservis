<? 
$ek=@$baglanti->query("Select resim_adres from $tablo_ismi where numara=$numara")->fetchAll(PDO::FETCH_ASSOC);
$eski_resim=$ek[0]["resim_adres"];
/////////////////////////////////////////////////////////////////////////////////////
if  (isset($resim) && $resim["size"]>0)	// Resim Gelmis mi?																															
   	{
		////////////////////////////////////////////////////////////////////////////////
		if  (file_exists($resim_dizini.$eski_resim) && strlen($eski_resim)>0)    
			{  
			    @chmod($resim_dizini.$eski_resim,0777); 
			    @unlink($resim_dizini.$eski_resim);
		   	}
		////////////////////////////////////////////////////////////////////////////////
	   	$dosya_boyutu=$resim["size"];		
		if ($dosya_boyutu>$max_file_size)	  
	   	   {	
		  	    $err='boyut'; 
		   }																   
    	else
          {				 
				$dosya_gecici_isim=$resim["tmp_name"];
	            $dosya_isim = $resim["name"];
				$dosya_tip = $resim["type"];
			    $uzanti_bul=strpos($resim["name"],".");
				$uzanti=substr($resim["name"],$uzanti_bul+1);
				$dosya="reklam".$numara.".".$uzanti; 
		        if ($dosya_tip=='image/gif' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg' ||  $dosya_tip=='image/jpeg' || $dosya_tip=='application/x-shockwave-flash' )
				   {
				        if (file_exists($resim_dizini.$dosya))    
						   {  
					    	   @chmod($resim_dizini.$dosya,0777); 
							   @unlink($resim_dizini.$dosya);
				   			}
				    	move_uploaded_file($resim["tmp_name"] ,$resim_dizini.$dosya);
					    if  (file_exists($resim_dizini.$dosya))    
				    	    {  
						   		@chmod($resim_dizini.$dosya,0644); 
						    }
			       	    $resim_ekle="Update $tablo_ismi Set  resim_adres='$dosya' where numara=$numara";
						@$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);		
			        } 
				else
					{
						$err="uzanti";					
					}
			}													 
		}		
$banner_guncelle=@$baglanti->query("Update $tablo_ismi  Set ad='$ad',yukseklik='$yukseklik',genislik='$genislik',link='$link',
						  altbilgi='$altbilgi',puan='$puan',dil='$dil' where numara=$numara");
?>