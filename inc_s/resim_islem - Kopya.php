<?
//** Kader UZUN (kerkoc@hotmail.com) 12.12.2004
//**
//** RESIM ISLEM SAYFASI 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 
//** Bu Sayfada Gelen Bilgilere Göre Ekleme ya da Update Yapiliyor
//** Sonra Eger Resim Gelmisse O da Sisteme SQL-Update Yoluyla Ekleniyor
//** Varsa Eskiden Kalan Benzer Isimdeki Dosyalar Siliniyor
//** 
	
    // Maximum Dosya Boyutunu Ögrenmek Için include çagirimi ve fonksiyon isletimi yapiyoruz
	// include("../../inc_s/parameter_supplier.php");				// parameter supplying									  
    // function_parameter_supplier($link_inherit,$baglanti);  									  

//******************************* (s) Ya Guncelleme Yapiliyor ya da Yeni Kayit Ekleniyor *******************************************//

	
		   if  ((isset($_FILES["resim"]) && strlen($_FILES["resim"]["name"])!=0 &&  ($_FILES["resim"]["type"]=='image/gif' || $_FILES["resim"]["type"]=='image/jpg' || $_FILES["resim"]["type"]=='image/pjpeg' || $_FILES["resim"]["type"]=='image/jpeg') && $_FILES["resim"]["size"]<$max_file_size ) && ($insert=='1'))																															
	             { include($uzaklik."inc_s/execute_insert_query.php"); } 	// Resim Gelmis. Dosya Boyutu Normal. Ekleme Sayfasindan Gelinmis

		  else if  ( strlen($_FILES["resim"]["name"])==0 &&($insert=='1'))																															
	             { include($uzaklik."inc_s/execute_insert_query.php"); 	} 	// Resim Gelmemis.  Ekleme Sayfasindan Gelinmis

		  else if  ((isset($_FILES["resim"]) && strlen($_FILES["resim"]["name"])!=0  &&  ($_FILES["resim"]["type"]=='image/gif' || $_FILES["resim"]["type"]=='image/jpg' || $_FILES["resim"]["type"]=='image/pjpeg' || $_FILES["resim"]["type"]=='image/jpeg') && $_FILES["resim"]["size"]<$max_file_size)&&($insert=='0'))																															
	             {  include($uzaklik."inc_s/execute_update_query.php");	} 	// Resim Gelmis. Dosya Boyutu Normal. Düzenleme Sayfasindan Gelinmis
			else if  (strlen($_FILES["resim"]["name"])==0 &&($insert=='0'))	
	             {   include($uzaklik."inc_s/execute_update_query.php");	} 	// Resim Gelmemis.  Düzenleme Sayfasindan Gelinmis
				 
//******************************* (f) Ya Guncelleme Yapiliyor ya da Yeni Kayit Ekleniyor *******************************************//
// Buna bir önceki sayfadan alinan insert degerine bakilarak karar veriliyor....	
		
		   if  (isset($_FILES["resim"]) && strlen($_FILES["resim"]["name"])!=0)	// Resim Gelmis mi?																															
	             {
						   $dosya_size=$_FILES["resim"]["size"];		
						   if ($dosya_size>$max_file_size)	  {	$err='boyut'; }																   
	          	           else
						           {				 
										$dosya_gecici_isim=$_FILES["resim"]["tmp_name"];
					                    $dosya_isim = $_FILES["resim"]["name"];
										$dosya_tip = $_FILES["resim"]["type"];

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
			 																     $dosya="resim".$numara.".".$uzanti; // bir dosya ismi oluþtur...																			  
																			
																			// (s)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
																				  if (file_exists($resim_dizini."resim".$numara.".jpg"))    {  chmod($resim_dizini."resim".$numara.".jpg",0777); unlink($resim_dizini."resim".$numara.".jpg");}
																				  if (file_exists($resim_dizini."resim".$numara.".gif"))    {  chmod($resim_dizini."resim".$numara.".gif",0777); unlink($resim_dizini."resim".$numara.".gif");}
																			// (f)  Daha Önce Ayni Adda Bir Resim Varsa Sil 
																				
																				
																					
																		move_uploaded_file($_FILES["resim"]["tmp_name"] , $resim_dizini.$dosya);
																	    if (file_exists($resim_dizini.$dosya))    {  chmod($resim_dizini.$dosya,0644); }

																        $resim_ekle="Update $tablo_ismi Set  resim_adres='$dosya' where numara=$numara";
  																        @$baglanti->query($resim_ekle)->fetchAll(PDO::FETCH_ASSOC);		
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
              } // resim geldi mi ?
																		 
		}										 

?>