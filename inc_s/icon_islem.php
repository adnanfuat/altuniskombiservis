
<?
/* İcon için kontrol (s) */

//******************************* (s) İcon için ---------Ya Guncelleme Yapiliyor ya da Yeni Kayit Ekleniyor *******************************************//

	
		   if  ((isset($_FILES["icon"]) && strlen($_FILES["icon"]["name"])!=0 &&  ($_FILES["icon"]["type"]=='image/gif' || $_FILES["icon"]["type"]=='image/jpg' || $_FILES["icon"]["type"]=='image/pjpeg' || $_FILES["icon"]["type"]=='image/jpeg') && $_FILES["icon"]["size"]$max_file_size)	  {	$err='boyut'; }																   
	          	           else
						           {				 
										$dosya_gecici_isim=$_FILES["icon"]["tmp_name"];
					                    $dosya_isim = $_FILES["icon"]["name"];
										$dosya_tip = $_FILES["icon"]["type"];

										if ($dosya_tip=='image/jpeg' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg') // Eger jpeg ya da bmp ise islem yap
											  {  						
												 if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													if ($insert==0) {$numara=$_POST['gizli'];} //print "numara deger gizliden alindi $max_file_size)	  {	$err='boyut'; }																   
	          	           else
						           {				 
										$dosya_gecici_isim=$_FILES["icon"]["tmp_name"];
					                    $dosya_isim = $_FILES["icon"]["name"];
										$dosya_tip = $_FILES["icon"]["type"];

										if ($dosya_tip=='image/jpeg' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg') // Eger jpeg ya da bmp ise islem yap
											  {  						
												 if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													if ($insert==0) {$numara=$_POST['gizli'];} //print "numara deger gizliden alindi <$max_file_size ) && ($insert=='1'))																															
	             { include($uzaklik."inc_s/execute_insert_query.php"); } 	// icon Gelmis. Dosya Boyutu Normal. Ekleme Sayfasindan Gelinmis

		  else if  ( strlen($_FILES["icon"]["name"])==0 &&($insert=='1'))																															
	             { include($uzaklik."inc_s/execute_insert_query.php"); 	} 	// icon Gelmemis.  Ekleme Sayfasindan Gelinmis

		  else if  ((isset($_FILES["icon"]) && strlen($_FILES["icon"]["name"])!=0  &&  ($_FILES["icon"]["type"]=='image/gif' || $_FILES["icon"]["type"]=='image/jpg' || $_FILES["icon"]["type"]=='image/pjpeg' || $_FILES["icon"]["type"]=='image/jpeg') && $_FILES["icon"]["size"]<$max_file_size)&&($insert=='0'))																															
	             {  include($uzaklik."inc_s/execute_update_query.php");	} 	// icon Gelmis. Dosya Boyutu Normal. Düzenleme Sayfasindan Gelinmis
		  else if  (strlen($_FILES["icon"]["name"])==0 &&($insert=='0'))	
	             {   include($uzaklik."inc_s/execute_update_query.php");	} 	// icon Gelmemis.  Düzenleme Sayfasindan Gelinmis
				 
//******************************* (f) İcon için---------Ya Guncelleme Yapiliyor ya da Yeni Kayit Ekleniyor *******************************************//
		 
 // Buna bir önceki sayfadan alinan insert degerine bakilarak karar veriliyor....	
		
		   if  (isset($_FILES["icon"]) && strlen($_FILES["icon"]["name"])!=0)	// icon Gelmis mi?																															
	             {
						   $dosya_size=$_FILES["icon"]["size"];		
						   if ($dosya_size>$max_file_size)	  {	$err='boyut'; }																   
	          	           else
						           {				 
										$dosya_gecici_isim=$_FILES["icon"]["tmp_name"];
					                    $dosya_isim = $_FILES["icon"]["name"];
										$dosya_tip = $_FILES["icon"]["type"];

										if ($dosya_tip=='image/jpeg' ||  $dosya_tip=='image/jpg' ||  $dosya_tip=='image/pjpeg') // Eger jpeg ya da bmp ise islem yap
											  {  						
												 if ($dosya_tip=='image/gif') {$uzanti='gif'; } else {$uzanti='jpg';}
													// Eger ki Update Sayfasindan Gelinmisse Numara Degerini Sektor Duzenle Sayfasindan Alinacak
													if ($insert==0) {$numara=$_POST['gizli'];} //print "numara deger gizliden alindi <br> numara: ".$numara;} 
													 else {
															 $numara_bul_sql="Select max(numara) from ".$tablo_ismi;
															 $numara_bul_sql_calistir=@$baglanti->query($numara_bul_sql)->fetchAll(PDO::FETCH_ASSOC);
															 $numara=$numara_bul_sql_calistir[0]["max(numara)"]; 	//print("yeni kampanya no: : ".$kampanya_no." <br>") ;																																																						
														  }
															 $dosya="icon".$numara.".".$uzanti; // bir dosya ismi oluþtur...																			  
														
														// (s)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															  if (file_exists($icon_dizini."icon".$numara.".jpg"))    {  chmod($icon_dizini."icon".$numara.".jpg",0777); unlink($icon_dizini."icon".$numara.".jpg");}
															  if (file_exists($icon_dizini."icon".$numara.".gif"))    {  chmod($icon_dizini."icon".$numara.".gif",0777); unlink($icon_dizini."icon".$numara.".gif");}
														// (f)  Daha Önce Ayni Adda Bir icon Varsa Sil 
															
															
																
													move_uploaded_file($_FILES["icon"]["tmp_name"] , $icon_dizini.$dosya);
													if (file_exists($icon_dizini.$dosya))    {  chmod($icon_dizini.$dosya,0644); }

													$icon_ekle="Update $tablo_ismi Set  icon_adres='$dosya' where numara=$numara";
													@$baglanti->query($icon_ekle)->fetchAll(PDO::FETCH_ASSOC);		
													//print $dosya;
											  }																												       											
									else
											 {																							   
												$err='uzanti';																							   
											 }
					  
					 if (!isset($uzanti) || $uzanti=='' ) // 		Eger her uc uzantidan biri degilse; dogru eve..					 					  																																		  
							{									
		   						$err='uzanti';																							   
							}
              } // icon geldi mi ?
																		 
		}	
		
		
/* İcon için kontrol (f) */
?>