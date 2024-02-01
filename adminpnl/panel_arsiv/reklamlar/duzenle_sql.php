<? 
$ek=@$baglanti->query("Select resim_adres, resim_adres2, resim_adres3 from $tablo_ismi where numara=$numara")->fetchAll(PDO::FETCH_ASSOC);
$eski_resim=$ek[0]["resim_adres"];
$eski_resim2=$ek[0]["resim_adres2"];
$eski_resim3=$ek[0]["resim_adres3"];
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
		        if ($dosya_tip=='image/gif' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg' ||  $dosya_tip=='image/jpeg' || $dosya_tip=='application/x-shockwave-flash'  || $dosya_tip=='image/png')
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
		
		

if  (isset($resim2) && $resim2["size"]>0)	// Resim2 Gelmis mi?																															
   	{
		////////////////////////////////////////////////////////////////////////////////
		if  (file_exists($resim_dizini.$eski_resim2) && strlen($eski_resim2)>0)    
			{  
			    @chmod($resim_dizini.$eski_resim2,0777); 
			    @unlink($resim_dizini.$eski_resim2);
		   	}
		////////////////////////////////////////////////////////////////////////////////
	   	$dosya_boyutu2=$resim2["size"];		
		if ($dosya_boyutu2>$max_file_size)	  
	   	   {	
		  	    $err='boyut'; 
		   }																   
    	else
          {				 
				$dosya_gecici_isim2=$resim2["tmp_name"];
	            $dosya_isim2 = $resim2["name"];
				$dosya_tip2 = $resim2["type"];
			    $uzanti_bul2=strpos($resim2["name"],".");
				$uzanti2=substr($resim2["name"],$uzanti_bul2+1);
				$dosya2="ureklam".$numara.".".$uzanti2; 
		        if ($dosya_tip2=='image/gif' ||  $dosya_tip2=='image/jpg' ||  $dosya_tip2=='image/pjpeg' ||  $dosya_tip2=='image/jpeg' || $dosya_tip2=='application/x-shockwave-flash' || $dosya_tip2=='image/png')
				   {
				        if (file_exists($resim_dizini.$dosya2))    
						   {  
					    	   @chmod($resim_dizini.$dosya2,0777); 
							   @unlink($resim_dizini.$dosya2);
				   			}
				    	move_uploaded_file($resim2["tmp_name"] ,$resim_dizini.$dosya2);
					    if  (file_exists($resim_dizini.$dosya2))    
				    	    {  
						   		@chmod($resim_dizini.$dosya2,0644); 
						    }
			       	    $resim_ekle2="Update $tablo_ismi Set  resim_adres2='$dosya2' where numara=$numara";
						@$baglanti->query($resim_ekle2)->fetchAll(PDO::FETCH_ASSOC);		
			        } 
				else
					{
						$err="uzanti";					
					}
			}													 
		}			

if  (isset($resim3) && $resim3["size"]>0)	// Resim3 Gelmis mi?																															
   	{
		////////////////////////////////////////////////////////////////////////////////
		if  (file_exists($resim_dizini.$eski_resim3) && strlen($eski_resim3)>0)    
			{  
			    @chmod($resim_dizini.$eski_resim3,0777); 
			    @unlink($resim_dizini.$eski_resim3);
		   	}
		////////////////////////////////////////////////////////////////////////////////
	   	$dosya_boyutu3=$resim3["size"];		
		if ($dosya_boyutu3>$max_file_size)	  
	   	   {	
		  	    $err='boyut'; 
		   }																   
    	else
          {				 
				$dosya_gecici_isim3=$resim3["tmp_name"];
	            $dosya_isim3 = $resim3["name"];
				$dosya_tip3 = $resim3["type"];
			    $uzanti_bul3=strpos($resim3["name"],".");
				$uzanti3=substr($resim3["name"],$uzanti_bul3+1);
				$dosya3="mreklam".$numara.".".$uzanti3; 
		        if ($dosya_tip3=='image/gif' ||  $dosya_tip3=='image/jpg' ||  $dosya_tip3=='image/pjpeg' ||  $dosya_tip3=='image/jpeg' || $dosya_tip3=='application/x-shockwave-flash' || $dosya_tip3=='image/png')
				   {
				        if (file_exists($resim_dizini.$dosya3))    
						   {  
					    	   @chmod($resim_dizini.$dosya3,0777); 
							   @unlink($resim_dizini.$dosya3);
				   			}
				    	move_uploaded_file($resim3["tmp_name"] ,$resim_dizini.$dosya3);
					    if  (file_exists($resim_dizini.$dosya3))    
				    	    {  
						   		@chmod($resim_dizini.$dosya3,0644); 
						    }
			       	    $resim_ekle3="Update $tablo_ismi Set  resim_adres3='$dosya3' where numara=$numara";
						@$baglanti->query($resim_ekle3)->fetchAll(PDO::FETCH_ASSOC);		
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