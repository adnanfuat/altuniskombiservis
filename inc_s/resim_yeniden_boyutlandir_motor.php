<? 

function resim_yeniden_boyutlandir_motor($yukseklik,$genislik,$max_yukseklik,$max_genislik)
		         {
				      global $yeni_yukseklik,$yeni_genislik;
				      global $yukseklik,$genislik;
					  

					  #print("<br>yukseklik: ".$yukseklik);
					  #print("<br>");
					  #print("max_YUKSEKLİK: ".$max_yukseklik);
					  #print("<br>");
					  #print("<br>");
					  #print("<br>");					  					  
					  #print("<br>");
					  					  

					  #print("genislik: ".$genislik);
					  #print("<br>");					  
					  #print("max_genislik: ".$max_genislik);
					  #print("<br>");
					  #print("<br>");
					  #print("<br>");
					  #print("<br>");
					  
					  
					  if (($max_yukseklik>=$yukseklik && $max_genislik>=$genislik) || ($max_yukseklik==$yukseklik && $max_genislik==$genislik)  )					  					  					  
					  
					  
									
									{
									
									 $yeni_yukseklik=$yukseklik;
									 $yeni_genislik=$genislik;
									 
									 #print("Durum1");									 					  
									 
									 }
					
					
					elseif ($max_genislik<$genislik && $max_yukseklik>$yukseklik)
					
						{ // 		*		*		*		*		*
										
                               $yeni_yukseklik=@round(($max_genislik*$yukseklik)/$genislik);
							   $yeni_genislik=$max_genislik;
									 #print("Durum2");
									#print("<br>");
									#print($yeni_yukseklik); 							   
									#print("<br>");
									#print($yeni_genislik);
									#print("<br>");
		                      
		
						 }// 		*		*		*		*		*
					
					elseif ($max_genislik>$genislik && $max_yukseklik<$yukseklik)
					
						{ // 		*		*		*		*		*
										
                               $yeni_genislik=@round($genislik*$max_yukseklik/$yukseklik);
							   $yeni_yukseklik=$max_yukseklik;
									 #print("Durum3");							   
		                      
		
						 }// 		*		*		*		*		*
					
					elseif ($max_genislik<=$genislik && $max_yukseklik<=$yukseklik)
					
						{ // 		*		*		*		*		*
										
                               if (($genislik/$max_genislik)>($yukseklik/$max_yukseklik))
							      {
                                      $yeni_yukseklik=@round($max_genislik*$yukseklik/$genislik);
		   					          $yeni_genislik=$max_genislik;
									 #print("Durum4");								  
								  }
							  else 
							      {
                                      $yeni_genislik=@round($genislik*$max_yukseklik/$yukseklik);
		       					      $yeni_yukseklik=$max_yukseklik;
									 #print("Durum5");								  
								  }
						}	   
		                      
		
						} // 		*		*		*		*		*
				
											#print  $yeni_genislik."<br>".$yeni_yukseklik;											

?>