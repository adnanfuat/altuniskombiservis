<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>Ne Dediler? | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik  hakkında yorum bırakın"/>
<link rel="shortcut icon" href="<? echo $seo_uzaklik; ?>_img/fav.png"/>
<link rel="canonical" href="//<? echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
<meta name="publisher" content="Altuniş Teknik  "/>
<meta name="author" content="Altuniş Teknik  "/>
<meta name="copyright" content="Altuniş Teknik  "/>
<meta name="creation_Date" content="22/12/2023"/>
<meta name="robots" content="index, follow">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="alternate" hreflang="tr" href="//<? echo $_SERVER['SERVER_NAME']; ?>"/>
<? @include ("inc_sosyal.php"); ?>
<? @include ("inc_script_css.php"); ?>
</head>
<body>
<? include ("inc_header.php"); ?>
<div class="index_margin" > 
<? // içerik (s) ?>
<!--<div class="hakkimizda_antet_bg flex_genel_1 index_max_w_2" style="justify-content:space-around;">

	<div>
    	<div align="center" class="antet_yazi_1">"Doğadan gelen çözümler"</div>
    	<div align="center" class="antet_yazi_2">Yılların Tecrübesiyle Hizmetinizdeyiz</div>
    </div>

</div> -->
<div style="  min-height:800px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    

    
    <div class="index_max_w_2">
        
        <h1>  Yorum Bırakın </h1>

        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div  class="index_max_w_2">
   

<div class="equal_colsx2" >
                        <div>
        Aşağıdaki formu kullanarak bizler hakkında yorum bırakabilirsiniz.
    </div>
    <div>&nbsp;</div>
           	 		<?  
				$mailler=@$baglanti->query("Select * from maillist where dil='1' and aktif='1' order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
				$mail_sayisi=count($mailler); // echo $mail_sayisi; 
				
				
				
                if  (!isset($_POST["ad"]) && !isset($_POST["telefon"]) && !isset($_POST["eposta"]) && !isset($_POST["mesaj"]) ) 
                {
            	?>           
           			<form action="<? echo $ziyaretci_defteri_form_permalink; ?>" method="post" name="iletisim_form"  id="iletisim_form" onSubmit="return kontrol();">
                    <div class="genis_flex_container">
                        <div class="equal_colsx2"><input name="ad" type="text" id="ad" class="form-control" placeholder="Adınız *" /></div>
                        <div class="equal_colsx2"><input name="soyad" type="text" id="soyad" class="form-control" placeholder="Soyadınız *" /></div>
                        <div class="equal_colsx2"><input name="eposta" type="text" id="eposta" class="form-control" placeholder="E-Posta Adresiniz *" /> </div>
                        <div class="equal_colsx2"><input name="telefon" type="text" id="telefon" class="form-control" placeholder="Telefon Numaranız" /></div>
                        <div class="genis_flex_container"><textarea name="mesaj"  id="mesaj" class="form-control" placeholder="Mesajınız *"  ></textarea></div>
                        <input name="formkontrol" type="text" id="formkontrol" class="formkontrol"   />
                        <style>.formkontrol { display:none; } </style>
                        <div class="genis_flex_container"><button type="submit" name="submit" id="submit" class="btn-small" >Mesajı Gönder</button></div>
                    </div>
            		</form>
                <?
            		}
				else
				
					{
						if (isset($_POST['ad'])){$ad=addslashes($_POST['ad']);} //echo $ad."<br/>";
						if (isset($_POST['soyad'])){$soyad=addslashes($_POST['soyad']);} //echo $soyad."<br/>";
						if (isset($_POST['telefon'])){$telefon=addslashes($_POST['telefon']);} //echo $telefon;
						if (isset($_POST['eposta'])){ $eposta=addslashes($_POST['eposta']); } //echo $eposta;
						if (isset($_POST['mesaj'])){ $mesaj=addslashes($_POST['mesaj']);} //echo $mesaj;
						if (isset($_POST['formkontrol'])){ $formkontrol=addslashes($_POST['formkontrol']);}
						if (isset($ad) && $ad<>'' && isset($eposta) && $eposta<>'' && isset($mesaj) && $mesaj<>''  && isset($formkontrol) && $formkontrol=='')
							{
								
								$gmesaj="Web sayfanızın ziyaretçi defterinden ".$ad." ".$soyad." tarafından mesaj yollanmıştır.<br><br>Mesaj: ";
								$gmesaj.=$mesaj."<br><br>";
								$gmesaj.="Ad Soyad: ".$ad." ".$soyad."<br>";
								$gmesaj.="E-posta: ".$eposta."<br>";
								$gmesaj.="Telefon: ".$telefon."<br>";

								require_once "mail/PHPMailerAutoload.php";
								$mail = new PHPMailer();
								$mail->IsSMTP();
								// $mail->SMTPDebug = 1; 
								$mail->SMTPAuth = true; //SMTP server'a kullanici adi ile baglanilcagini belirtiyoruz
								$mail->SMTPSecure = false;
								$mail->SMTPAutoTLS = false;
								//$mail->SMTPSecure = 'tls';
								//$mail->Host = 'mail.deflastarim.com';
								$mail->Host = 'smtp.yandex.com';
								$mail->Port = 587;
								$mail->IsHTML(true);
								$mail->SetLanguage("tr", "phpmailer/language");
								$mail->CharSet ="utf-8";
								$mail->Username = "noreply@proweb.com.tr"; 
								$mail->Password = "Nr13%!prAZLL";
								$mail->SetFrom("noreply@proweb.com.tr", "Web Yorumlar"); // Mail attigimizda yazacak isim
								//$mail->AddAddress("zulal@sakaryarehberim.com"); // Maili gonderecegimiz kisi/ alici
								
								for ($sayac=0; $sayac<$mail_sayisi; $sayac++)
									{
										
										$gidecekmail=$mailler[$sayac]["eposta"];										
										$mail->AddAddress($gidecekmail);
									}

								$mail->Subject = "Yorumlar Sayfanizdan Bir Mesaj Gonderildi"; // Konu basligi
								//$mail->Body = "Mail İçeriği"; // Mailin icerigi
								$mail->Body = $gmesaj;
								//$mail->Send();
								
								if ($mail->Send()) 
									{ 
											// e-posta basarili ile gönderildi
											//$err=1;
											//$err='Mesajınız başarı ile gönderildi. En kısa sürede incelenecektir.';
											
											$adsoyad=$ad." ".$soyad;
											$err='Mesajınız başarı ile gönderildi. En kısa sürede incelenecektir.';
											$sql="Insert into ziyaretci_defteri (ad,aktif,eklenme_tarihi,mesaj,telefon,eposta,puan,dil) Values ('$adsoyad','1','','$mesaj','$telefon','$eposta','0','1')";
											//$kayit_ekle=mysql_query($sql,$baglanti);
											$kayit_ekle=@$baglanti->query($kayit_ekle);
									}
								else 
									{ 
											//$err=2;
											//$err='Mesajınız geçici bir problemden dolayı yollanamadı! <br>	Lütfen daha sonra tekrar deneyiniz.' ; 
											$adsoyad=$ad." ".$soyad;
											$err='Mesajınız geçici bir problemden dolayı yollanamadı! <br>	Lütfen daha sonra tekrar deneyiniz.' ;  
											$sql="Insert into ziyaretci_defteri (ad,aktif,eklenme_tarihi,mesaj,telefon,eposta,puan,dil) Values ('$adsoyad','1','','$mesaj','$telefon','$eposta','0','1')";
											//$kayit_ekle=mysql_query($sql,$baglanti);
											$kayit_ekle=@$baglanti->query($kayit_ekle);
											echo $mail->ErrorInfo;
									}
								
								
								
								if (1==2) {				
								
								$baslik="Ne Dediler Sayfanizdan Bir Mesaj Gonderildi";
								//$gidecekmail="zulal@sakaryarehberim.com";
								$gonderen="webform@ylzmuhendislik.com";
								$ustk  = "From: İletişim<$gonderen>". chr(13) . chr(10); 
								$ustk .= "X-Sender:$gonderen". chr(13) . chr(10); 
								$ustk .= "X-Mailer: PHP\n"; 
								$ustk .= "X-Priority: 3\n"; 
								$ustk .= "Return-Path:$gidecekmail". chr(13) . chr(10);  
								$ustk .= "Content-Type: text/html; charset=utf-8". chr(13) . chr(10); 
								$gmesaj="Web sayfan&#305;z&#305;n Ne Dediler? b&ouml;l&uuml;m&uuml;nden ".$ad." ".$soyad." taraf&#305;ndan a&#351;a&#287;&#305;daki mesaj yollanm&#305;&#351;t&#305;r.<br><br>Mesaj: ";
								$gmesaj.=$mesaj."<br><br>";
								$gmesaj.="Ad Soyad: ".$ad." ".$soyad."<br>";
								$gmesaj.="E-posta: ".$eposta."<br>";
								$gmesaj.="Telefon: ".$telefon."<br>";
								/*if (@mail($gidecekmail,$baslik,$gmesaj,$ustk))
										{
											$err='Mesajınız başarı ile gönderildi. En kısa sürede incelenecektir.';
										}	
								else
										{
											$err='Mesajınız geçici bir problemden dolayı yollanamadı! <br>	Lütfen daha sonra tekrar deneyiniz.' ; 
										} */
										
										
										
										
								/*		*/
								//echo $gmesaj."<br/>"."<br/>";
									//echo "aaaaaa".$adsoyad;
								if (preg_match('/viagra|cialis|poker|casino|porn|sexy|sex|adult|girl|hot|sensual|masturbation|orgasm|love|pornhub|finger|dick|cock|breast|vagina|wife|cock|dick|nude|women|videos|movie|gay|winner|spam|junk|free|subscribe|sineup|price|buy|click|open|masturbation|orgasm|finger|breast|vagina|wife|husbund|chance|marketing|Visitourwebsite|win|money|Click here|Order now|kripto|bitcoin|cinsel|cinsellik|seks|sevişme|make love|porno|erotizm|erotic|erotic video|erotic movies/', $_POST['mesaj']))
										   {
												// it's SPAM
												//echo "filtreye takıldım";
										   }
										else
										   {
										

												
												
													for ($sayac=0; $sayac<$mail_sayisi; $sayac++)
														{
															
															$gidecekmail=@mysql_result($mailler,$sayac,"eposta");
															
															if  (@mail($gidecekmail,$baslik,$gmesaj,$ustk))
																{
																	$adsoyad=$ad." ".$soyad;
																	$err='Mesajınız başarı ile gönderildi. En kısa sürede incelenecektir.';
																	$sql="Insert into ziyaretci_defteri (ad,aktif,eklenme_tarihi,mesaj,telefon,eposta,puan,dil) Values ('$adsoyad','1','','$mesaj','$telefon','$eposta','0','1')";
																	$kayit_ekle=mysql_query($sql,$baglanti);

																	
																}	
															else
																{
																	$adsoyad=$ad." ".$soyad;
																	$err='Mesajınız geçici bir problemden dolayı yollanamadı! <br>	Lütfen daha sonra tekrar deneyiniz.' ;  
																	$sql="Insert into ziyaretci_defteri (ad,aktif,eklenme_tarihi,mesaj,telefon,eposta,puan,dil) Values ('$adsoyad','1','','$mesaj','$telefon','$eposta','0','1')";
																	$kayit_ekle=mysql_query($sql,$baglanti);
																}
														}	
															  
										  
										  
										  
										  
										   }
								
								
								}
									
										
											
							}			
						else
							{
								$err='Lütfen gerekli alanları doldurunuz.' ;	
								//$err=3;
							}
				?>
									  <? /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// (s) ?>          
									  
									  
									  
									  
									  <p><? echo  $err;?></p>
									  
									  
									  
									  
									  
									  <? //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// (f) ?>
				  <?
					}
				?>
                  </div>


     </div>
     
     <div>&nbsp;</div><div>&nbsp;</div>
</div>
<? //include ("inc_kurumsal.php"); ?>
<? // içerik (f) ?>    
</div>
<? include ("inc_footer.php"); ?>
</body>
</html>
<script>
function checkMail(sText)
	{
		var x = sText;
		var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if (filter.test(x)) return true;
		else return false;
	}

function isNumber(HangiAlan)
	{
		var inputStr=HangiAlan.value;
		for (var i=0; i<inputStr.length; i++)
			{
				var oneChar=inputStr.substring(i,i+1)
				if (oneChar<"0" || oneChar>"9")
			       {
					   alert("Lütfen 0-9 Arası Sayısal Degerler Giriniz.")
					   HangiAlan.value="";
					   return false;
			       }
			}
		return true;
	}
function kontrol() 
{
	if (document.iletisim_form.ad.value=="")
		{
			alert("Lütfen adınızı giriniz"); 
			document.iletisim_form.ad.focus();
			return false;
		}
	else if (document.iletisim_form.soyad.value=="")
		{
			alert("Lütfen soyadınızı giriniz"); 
			document.iletisim_form.soyad.focus();
			return false;
		}
	else if (document.iletisim_form.eposta.value=="")
		{
			alert("Lütfen eposta adresinizi giriniz");
			document.iletisim_form.eposta.focus();
			return false;
		}
    else if  (document.iletisim_form.eposta.length>1 && !checkMail(document.iletisim_form.eposta.value))
		{	
			alert("Lütfen e-posta adresinizi kontrol ediniz.");	
			document.iletisim_form.eposta.focus();  
			return false; 
		}
	/*else if (document.iletisim_form.telefon.value=="")
		{
			alert("Lütfen telefonunuzu giriniz");
			document.iletisim_form.telefon.focus();
			return false;
		}*/	
	else if (document.iletisim_form.mesaj.value=="")
		{
			alert("Lütfen mesajınızı giriniz");
			document.iletisim_form.mesaj.focus();
			return false;
		}
	else
		{   
			 obj=document.forms['iletisim_form'];
			 return true;
		}
}
</script>