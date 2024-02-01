<? 
if  (isset($n_resim) && $n_resim["size"]>0)
    {
	   $dosya_boyutu=$n_resim["size"];
	   
	   if ($dosya_boyutu>$max_file_size)	  
	   	  {	
		  	    $err='boyut'; 
		  }																   
       else
          {				 
				$dosya_gecici_isim=$n_resim["tmp_name"];
                $dosya_isim = $n_resim["name"];
				$dosya_tip = $n_resim["type"];
				
				$dosya_gecici_isim2=$n_resim2["tmp_name"];
                $dosya_isim2 = $n_resim2["name"];
				$dosya_tip2 = $n_resim2["type"];
				
				$dosya_gecici_isim3=$n_resim3["tmp_name"];
                $dosya_isim3 = $n_resim3["name"];
				$dosya_tip3 = $n_resim3["type"];
				//echo $dosya_tip."<br>";
				//echo $dosya_tip2."<br>";
				//echo $dosya_tip3."<br>";
		        
				if  ($dosya_tip=='image/gif' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg' ||  $dosya_tip=='image/jpeg'   ||  $dosya_tip=='image/png' || $dosya_tip=='application/x-shockwave-flash' )
					{
//echo $dosya_tip;
						$banner_ekle=@$baglanti->query("Insert into $tablo_ismi (ad,
									  aktif,
									  genislik,
									  yukseklik,
									  link,
									  altbilgi,puan,dil
									  )
									Values
									  ('$n_ad',
									   '1',
									   '$n_genislik',
									   '$n_yukseklik', '$n_link', '$n_altbilgi', '$n_puan', '$n_dil')")->fetchAll(PDO::FETCH_ASSOC); 
						$numara_bul_sql="Select max(numara) from $tablo_ismi";
					    $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
				        $numara=$numara_bul_sql_calistir[0]["max(numara)"]; 	
				        $uzanti_bul=strrpos($n_resim["name"],".");
						$uzanti=substr($n_resim["name"],$uzanti_bul+1);
						$dosya="reklam".$numara.".".$uzanti; 
				        if  (file_exists($resim_dizini.$dosya))    
						    {  
						       @chmod($resim_dizini.$dosya,0777); @unlink($resim_dizini.$dosya);
					   		}
					    move_uploaded_file($n_resim["tmp_name"] ,$resim_dizini.$dosya);
					    if  (file_exists($resim_dizini.$dosya))    
					        {  
						   		@chmod($resim_dizini.$dosya,0644); 
						    }
			            $resim_ekle="Update $tablo_ismi Set  resim_adres='$dosya' where numara=$numara";
			            @$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);		
						
						
						if  ($dosya_tip2=='image/gif' ||  $dosya_tip2=='image/jpg' ||  $dosya_tip2=='image/pjpeg' ||  $dosya_tip2=='image/jpeg'   ||  $dosya_tip2=='image/png' || $dosya_tip2=='application/x-shockwave-flash'  || $dosya_tip2=='')
							{
						
									$uzanti_bul2=strrpos($n_resim2["name"],".");
									$uzanti2=substr($n_resim2["name"],$uzanti_bul2+1);
									$dosya2="ureklam".$numara.".".$uzanti2; 
									if  (file_exists($resim_dizini.$dosya2))    
										{  
										   @chmod($resim_dizini.$dosya2,0777); @unlink($resim_dizini.$dosya2);
										}
									move_uploaded_file($n_resim2["tmp_name"] ,$resim_dizini.$dosya2);
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
						
						
						if  ($dosya_tip3=='image/gif' ||  $dosya_tip3=='image/jpg' ||  $dosya_tip3=='image/pjpeg' ||  $dosya_tip3=='image/jpeg'   ||  $dosya_tip3=='image/png' || $dosya_tip3=='application/x-shockwave-flash' || $dosya_tip3=='' )
							{
						
									$uzanti_bul3=strrpos($n_resim3["name"],".");
									$uzanti3=substr($n_resim3["name"],$uzanti_bul3+1);
									$dosya3="mreklam".$numara.".".$uzanti3; 
									if  (file_exists($resim_dizini.$dosya3))    
										{  
										   @chmod($resim_dizini.$dosya3,0777); @unlink($resim_dizini.$dosya3);
										}
									move_uploaded_file($n_resim3["tmp_name"] ,$resim_dizini.$dosya3);
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
			else
				{
					$err="uzanti";
				} 
		}
	}


		
?>