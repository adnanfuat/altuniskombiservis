<?


								function resim_yeniden_boyutlandir($logo_dizini,$logo_adresi,$yuks,$genl)
								
											{
											
										global $logo_adres	;
										global $yukseklik;
										global $genislik;


																					//	print ">> ".$logo_adresi;
										
													$logo_adres=$logo_dizini.$logo_adresi;
													
	
	if (file_exists($logo_adres))
			
				{
													//print ("dosyayi buldum... ");
													$logo=getimagesize($logo_adres);
													$yukseklik=$logo[1];
													$genislik=$logo[0];
													//echo $logo_adres;
													resim_yeniden_boyutlandir_motor($yukseklik,$genislik,$yuks,$genl);
				}
	else
	
				{
					  //print "dosya yok";
				      global $yeni_yukseklik,$yeni_genislik;
				      global $yukseklik,$genislik;
					  
					  $yeni_yukseklik=1;
					  $yeni_genislik=1;
					  
					   $yukseklik=1;
					   $genislik=1;
					  				
				
				}												
											
											
											}
											
?>