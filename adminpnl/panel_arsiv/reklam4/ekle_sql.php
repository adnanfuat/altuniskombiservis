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
		        if  ($dosya_tip=='image/gif' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg' ||  $dosya_tip=='image/jpeg' || $dosya_tip=='application/x-shockwave-flash' )
					{

						$banner_ekle=@$baglanti->query("Insert into $tablo_ismi (ad,
									  aktif,
									  genislik,
									  yukseklik,
									  link,
									  altbilgi,puan
									  )
									Values
									  ('$n_ad',
									   '1',
									   '$n_genislik',
									   '$n_yukseklik', '$n_link', '$n_altbilgi', '$n_puan')")->fetchAll(PDO::FETCH_ASSOC); 
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
		        }
			else
				{
					$err="uzanti";
				} 
		}
	}		
?>