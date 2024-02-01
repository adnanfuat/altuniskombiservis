<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr">
<head>
<meta charset="UTF-8">
<title>İletişim | Altuniş Teknik  </title>
<meta name="description" content="Altuniş Teknik 'e nasıl ulaşacağınıza dair bilgiler"/>
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
<div style="  min-height:600px; ">
<div>&nbsp;</div><div>&nbsp;</div>
    

    
    <div class="index_max_w_2">
        
        <h1>  İletişim  </h1>

        
    
    </div>
    <div>&nbsp;</div><div>&nbsp;</div>
    <div  class="index_max_w_2">
   
	<div class="genis_flex_container">
                <? 
		
				$inc_iletisim_bilgileri=@$baglanti->query("Select * from iletisim where aktif='1' and dil='1' order by numara desc")->fetchAll(PDO::FETCH_ASSOC);
				$inc_iletisim_bilgileri_sayi=count($inc_iletisim_bilgileri);
				if ($inc_iletisim_bilgileri_sayi>0)
				   {
				   		$ad=$inc_iletisim_bilgileri[0]["ad"];
						$adres1=$inc_iletisim_bilgileri[0]["adres1"];
						$adres2=$inc_iletisim_bilgileri[0]["adres2"];
						$telefon1=$inc_iletisim_bilgileri[0]["telefon1"];
						$telefon2=$inc_iletisim_bilgileri[0]["telefon2"];
						$telefon3=$inc_iletisim_bilgileri[0]["telefon3"];
						$telefon4=$inc_iletisim_bilgileri[0]["telefon4"];
						$gsm1=$inc_iletisim_bilgileri[0]["gsm1"];
						$gsm2=$inc_iletisim_bilgileri[0]["gsm2"];
						$gsm3=$inc_iletisim_bilgileri[0]["gsm3"];
						$gsm4=$inc_iletisim_bilgileri[0]["gsm4"];
						$eposta1=$inc_iletisim_bilgileri[0]["eposta1"];
						$eposta2=$inc_iletisim_bilgileri[0]["eposta2"];
						$eposta3=$inc_iletisim_bilgileri[0]["eposta3"];
						$calisma_saati1=$inc_iletisim_bilgileri[0]["calisma_saati1"];
						$calisma_saati2=$inc_iletisim_bilgileri[0]["calisma_saati2"];
						$calisma_saati3=$inc_iletisim_bilgileri[0]["calisma_saati3"];
						
				   }
		
				?>
                <div class="equal_colsx2" >
<!--                    <h1 class="index_baslik_2">İLETİŞİM BİLGİLERİ</h1>
 -->                    <div>Görüş, soru, öneri ve teklif talepleriniz için aşağıdaki bilgileri
kullanarak bizimle iletişime geçebilirsiniz
</div>
                    <div>&nbsp;</div>
                    
                    
                    <div style="max-width:380px">
                    <? if (strlen($adres1)>0) { ?><div><i class="fas fa-map-pin"></i> <? echo $adres1; ?></div><? } ?>
                    <? if (strlen($adres2)>0) { ?><div><i class="fas fa-map-pin"></i> <? echo $adres2; ?></div><? } ?>
                    <? if (strlen($adres3)>0) { ?><div><i class="fas fa-map-pin"></i> <? echo $adres3; ?></div><? } ?>
                    <div>&nbsp;</div>
                    <? if (strlen($telefon1)>0) { ?><div><i class="fas fa-phone"></i> <? echo $telefon1; ?></div><? } ?>
                    <? if (strlen($telefon2)>0) { ?><div><i class="fas fa-phone"></i> <? echo $telefon2; ?></div><? } ?>
                    <? if (strlen($telefon3)>0) { ?><div><i class="fas fa-phone"></i> <? echo $telefon3; ?></div><? }  ?>
					<? if (strlen($telefon4)>0) { ?><div><i class="fas fa-phone"></i> <? echo $telefon4; ?></div><? }  ?>
                    <? if (strlen($gsm1)>0) { ?><div><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;<? echo $gsm1; ?></div><? } ?>
                    <? if (strlen($gsm2)>0) { ?><div><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;<? echo $gsm2; ?></div><? } ?>
                    <? if (strlen($gsm3)>0) { ?><div><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;<? echo $gsm3; ?></div><? } ?>
					<? if (strlen($gsm4)>0) { ?><div><i class="fas fa-mobile-alt"></i>&nbsp;&nbsp;<? echo $gsm4; ?></div><? } ?>
                    
					
					<? if (strlen($gsm2)>0 && 2==6)  { ?> <div>&nbsp;</div>
                    <div><strong style="color:#2cb742">Whatsapp</strong></div>
                    <? /*if (strlen($gsm1)>0) { ?><div onclick="window.location='https://wa.me/9<? echo $gsm1; ?>'" style="cursor:pointer;"><i class="fab fa-whatsapp" style="color:#2cb742"></i>  <? echo $gsm1; ?> </div><? } */?>
                    <div onclick="window.location='https://wa.me/9<? echo $gsm2; ?>'" style="cursor:pointer;"><i class="fab fa-whatsapp" style="color:#2cb742"></i>  <? echo $gsm2; ?> </div><? } ?>
                    <? /*if (strlen($gsm3)>0) { ?><div onclick="window.location='https://wa.me/9<? echo $gsm3; ?>'" style="cursor:pointer;"><i class="fab fa-whatsapp" style="color:#2cb742"></i>  <? echo $gsm3; ?> </div><? } */?>
                    
                    
                    
                    <div>&nbsp;</div>
                    <? if (strlen($eposta1)>0) { ?><div onclick="window.location='mailto:<? echo $eposta1; ?>'"  style="cursor:pointer;"><i class="fas fa-envelope"></i> <? echo $eposta1; ?></div><? } ?>
                    <? if (strlen($eposta2)>0) { ?><div onclick="window.location='mailto:<? echo $eposta2; ?>'"  style="cursor:pointer;"><i class="fas fa-envelope"></i> <? echo $eposta2; ?></div><? } ?>
                    <? if (strlen($eposta3)>0) { ?><div onclick="window.location='mailto:<? echo $eposta3; ?>'"  style="cursor:pointer;"><i class="fas fa-envelope"></i> <? echo $eposta3; ?></div><? } ?>
                    
                    <? if (strlen($calisma_saati1)>0) { ?><div><strong>Hafta içi:</strong>  <? echo $calisma_saati1; ?></div><? } ?>
                    <? if (strlen($calisma_saati2)>0) { ?><div><strong>Cumartesi:</strong>  <? echo $calisma_saati2; ?></div><? } ?>
                    <? if (strlen($calisma_saati3)>0) { ?><div><strong>Pazar:</strong>  <? echo $calisma_saati3; ?></div><? } ?>
                    
                   
					
                     
                    </div>
                    
                
                    
                   
                    
                   
                    
                    
                </div>
                <div class="equal_colsx2" >
                        <div>
        <h1 class="index_baslik_2">HIZLI ERİŞİM FORMU</h1>
		 
		Aşağıdaki formu kullanarak bize ulşabilirsiniz.
		
    </div>
    <div>&nbsp;</div>
           	 		<?  
				$mailler=@$baglanti->query("Select * from maillist where dil='1' and aktif='1' order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
				$mail_sayisi=count($mailler); // echo $mail_sayisi; 
				
				
				if  (!isset($_POST["ad"]) && !isset($_POST["telefon"]) && !isset($_POST["eposta"]) && !isset($_POST["mesaj"]) ) 
                {
            	?>           
           			<form action="<? echo $iletisim_permalink; ?>" method="post" name="iletisim_form_web"  id="iletisim_form_web" onSubmit="return kontrol();">
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
						if (isset($_POST['ad'])){$ad=addslashes($_POST['ad']);} //echo $adsoyad;
						if (isset($_POST['soyad'])){$soyad=addslashes($_POST['soyad']);} //echo $soyad;
						if (isset($_POST['telefon'])){$telefon=addslashes($_POST['telefon']);} //echo $telefon;
						if (isset($_POST['eposta'])){ $eposta=addslashes($_POST['eposta']); } //echo $eposta;
						if (isset($_POST['mesaj'])){ $mesaj=addslashes($_POST['mesaj']);} //echo $mesaj;
						if (isset($_POST['formkontrol'])){ $formkontrol=addslashes($_POST['formkontrol']);}
						if (isset($ad) && $ad<>'' && isset($eposta) && $eposta<>'' && isset($mesaj) && $mesaj<>''  && isset($formkontrol) && $formkontrol=='')
							{
								
								
								$gmesaj="Web sayfanızın iletişim bölümünden aşağıdaki mesaj yollandı.<br><br>Mesaj: ";
								$gmesaj.=$mesaj."<br><br>";
								$gmesaj.="Ad Soyad: ".$ad." ".$soyad."<br>";
								$gmesaj.="E-posta: ".$eposta."<br>";
								$gmesaj.="Telefon: ".$telefon."<br>";

								require_once "mail/PHPMailerAutoload.php";
		  
								$mail = new PHPMailer();
							  
								//$mail->IsSMTP();
								$mail->SMTPDebug = 3; 
								$mail->SMTPAuth = true; //SMTP server'a kullanici adi ile baglanilcagini belirtiyoruz
								$mail->SMTPSecure = false;
								$mail->SMTPAutoTLS = false;
								//$mail->SMTPSecure = 'tls';
								//$mail->Host = 'mail.asoglugrup.com';
								$mail->Host = 'smtp.yandex.com';
								$mail->Port = 587;
								$mail->IsHTML(true);
								$mail->SetLanguage("tr", "phpmailer/language");
								$mail->CharSet ="utf-8";
								$mail->Username = "noreply@proweb.com.tr"; 
								$mail->Password = "Nr13%!prAZLL";
								$mail->SetFrom("noreply@proweb.com.tr", "Altuniş Teknik  İletişim"); // Mail attigimizda yazacak isim
								/*$mail->Username = "zulal@sakaryarehberim.com"; 
								$mail->Password = "";
								$mail->SetFrom("zulal@sakaryarehberim.com", "Hazavita - Proje Hakkında Bilgi Talebi");*/
								//$mail->AddAddress($gidecekmail); // Maili gonderecegimiz kisi/ alici
								//$mail->AddAddress("zulal@sakaryarehberim.com"); // Maili gonderecegimiz kisi/ alici
								
								
								for ($sayac=0; $sayac<$mail_sayisi; $sayac++)
									{
										
										$gidecekmail=$mailler[$sayac]["eposta"];										
										$mail->AddAddress($gidecekmail);
									}

								$mail->Subject = "İletişim Sayfanızdan Bir Mesaj Gönderildi"; // Konu basligi
								//$mail->Body = "Mail İçeriği"; // Mailin icerigi
								$mail->Body = $gmesaj;
								//$mail->Send();
								
								if ($mail->Send()) 
									{ 
											// e-posta basarili ile gönderildi
											//$err=1;
											$err='Mesajınız başarı ile gönderildi. En kısa sürede incelenecektir.';
									}
								else 
									{ 
											//$err=2;
											$err='Mesajınız geçici bir problemden dolayı yollanamadı! <br>	Lütfen daha sonra tekrar deneyiniz.' ; 
											echo $mail->ErrorInfo;
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

    
 
                     

     </div>
  
</div> 
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0754169481743!2d30.40504409022479!3d40.76036596088524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14ccb33f201f1c71%3A0x509fe49685d8d5c3!2sAltuni%C5%9F%20Teknik!5e0!3m2!1str!2str!4v1706095860660!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
	if (document.iletisim_form_web.ad.value=="")
		{
			alert("Lütfen adınızı giriniz"); 
			document.iletisim_form_web.ad.focus();
			return false;
		}
	else if (document.iletisim_form_web.soyad.value=="")
		{
			alert("Lütfen soyadınızı giriniz"); 
			document.iletisim_form_web.soyad.focus();
			return false;
		}
	else if (document.iletisim_form_web.eposta.value=="")
		{
			alert("Lütfen eposta adresinizi giriniz");
			document.iletisim_form_web.eposta.focus();
			return false;
		}
    else if  (document.iletisim_form_web.eposta.length>1 && !checkMail(document.iletisim_form_web.eposta.value))
		{	
			alert("Lütfen e-posta adresinizi kontrol ediniz.");	
			document.iletisim_form_web.eposta.focus();  
			return false; 
		}
	/*else if (document.iletisim_form_web.telefon.value=="")
		{
			alert("Lütfen telefonunuzu giriniz");
			document.iletisim_form_web.telefon.focus();
			return false;
		}*/	
	else if (document.iletisim_form_web.mesaj.value=="")
		{
			alert("Lütfen mesajınızı giriniz");
			document.iletisim_form_web.mesaj.focus();
			return false;
		}
	else
		{   
			 obj=document.forms['iletisim_form'];
			 return true;
		}
}
</script>