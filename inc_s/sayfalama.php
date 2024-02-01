<?		
			function	 sayfala($toplam_kayit_sayisi_calistir_sql,	$bir_sayfadaki_toplam_kayit_sayisi)

					{
									#print("<br>");
									#print "toplam: ".$toplam_kayit_sayisi_calistir_sql;
									global $toplam_sayfa_sayisi	;
									global $su_anki_sayfa_no;																									
									#print("<br>");
			
						$toplam_sayfa_sayisi_virgullu=$toplam_kayit_sayisi_calistir_sql/$bir_sayfadaki_toplam_kayit_sayisi;
  					    $toplam_sayfa_sayisi_virgulsuz=round($toplam_kayit_sayisi_calistir_sql/$bir_sayfadaki_toplam_kayit_sayisi);
																	
																	
            			if ($toplam_sayfa_sayisi_virgullu>$toplam_sayfa_sayisi_virgulsuz && $toplam_sayfa_sayisi_virgullu>1)							
										{																				
											$toplam_sayfa_sayisi_virgulsuz++; // 1.33 ise 2 ye çevir.. 2.46 ise 3 e cevir vs..																				
										}

						elseif ($toplam_sayfa_sayisi_virgullu>$toplam_sayfa_sayisi_virgulsuz && $toplam_sayfa_sayisi_virgullu<1  && $toplam_sayfa_sayisi_virgullu>0)		// Sadece bir sayfayi dolduracak kadar kayit varsa..
																
										{																				
											$toplam_sayfa_sayisi_virgulsuz++; // 1.33 ise 2 ye çevir.. 2.46 ise 3 e cevir vs..																				
										}
																																																																															
					    $toplam_sayfa_sayisi=$toplam_sayfa_sayisi_virgulsuz;
						if ($toplam_sayfa_sayisi==0) { $toplam_sayfa_sayisi=1;} 																	
                         #print "toplam sayfa sayýsý : ".$toplam_sayfa_sayisi;			

			}
?>