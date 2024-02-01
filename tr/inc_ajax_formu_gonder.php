<? @include ("inc_permalink.php"); ?>
<? @include ("../inc_s/baglanti.php"); ?>
<? 
$mailler=@$baglanti->query("Select * from maillist where dil='1' and aktif='1' order by numara asc")->fetchAll(PDO::FETCH_ASSOC);
$mail_sayisi=count($mailler); // echo $mail_sayisi; 
//$gidecekmail=$mailler[$sayac]["eposta"];
if (isset($_POST['ad'])){$ad=$_POST['ad'];} //echo $adsoyad;
if (isset($_POST['soyad'])){$soyad=$_POST['soyad'];} //echo $soyad;
if (isset($_POST['telefon'])){$telefon=$_POST['telefon'];} //echo $telefon;
if (isset($_POST['eposta'])){ $eposta=$_POST['eposta']; } //echo $eposta;
if (isset($_POST['urun'])){ $urun=addslashes($_POST['urun']);} //echo $mesaj;
if (isset($_POST['form_kontrol'])){ $form_kontrol=$_POST['form_kontrol'];}
if (isset($ad) && $ad<>'' && isset($eposta) && $eposta<>'' && isset($telefon) && $telefon<>'' && isset($form_kontrol) && $form_kontrol=='')
	{
		 $gmusteri_mesaj="Ad Soyad: ".$ad." ".$soyad."<br>Telefon: ".$telefon."<br>".$eposta;
		 //$gmusteri_mesaj="Ad Soyad: ".$ad." ".$soyad."<br>Telefon: ".$telefon."<br>".$eposta."<br>İlgili Ürün: ".$urun;

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
		 $mail->SetFrom("noreply@proweb.com.tr", "Altuniş Teknik Danışmanlık Talebi"); // Mail attigimizda yazacak isim
		 /*$mail->Username = "zulal@sakaryarehberim.com"; 
		 $mail->Password = "";
		 $mail->SetFrom("zulal@sakaryarehberim.com", "Hazavita - Proje Hakkında Bilgi Talebi");*/
		 //$mail->AddAddress($gidecekmail); // Maili gonderecegimiz kisi/ alici


	
		 for ($sayac=0; $sayac<$mail_sayisi; $sayac++)
		 {
			$gidecekmail=$mailler[$sayac]["eposta"];										
			$mail->AddAddress($gidecekmail);
		 }






		 //$mail->AddAddress("zulal@sakaryarehberim.com"); // Maili gonderecegimiz kisi/ alici
		 $mail->Subject = "Altuniş Teknik Bize Ulaşın Formu"; // Konu basligi
		 //$mail->Body = "Mail İçeriği"; // Mailin icerigi
		 $mail->Body = $gmusteri_mesaj;
		 //$mail->Send();
	   if ($mail->Send())   
				{ 
						// e-posta basarili ile gönderildi
						 $err=1;

				}
			else 
				{ 
						$err=2;
						//echo $mail->ErrorInfo;
						//$err=$mail->ErrorInfo."<br><br>";

				} 
	}			
else
	{
			$err=3;
			//$err='Lütfen gerekli alanları doldurunuz.' ;	
	}
echo $err;
?>