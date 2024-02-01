<? session_start();
include("inc_s/baglanti.php");
$yoneticiad=$_POST["yoneticiadi"];
$yoneticisifre=$_POST["yoneticisifresi"];
if (strlen($yoneticiad)==0  && strlen($yoneticisifre)==0)
   {
       //print("Yönetici adini ve þifrenizi girmediniz");
	   header("Location:kpanel.php?eksik=yoneticisifre");
   }
elseif (strlen($yoneticiad)==0)
   {
       //print("Yonetici adinizi girmediniz");
       header("Location:kpanel.php?eksik=yonetici");
   }
elseif (strlen($yoneticisifre)==0)
   {
        //print("Sifrenizi girmediniz");
	    header("Location:kpanel.php?eksik=sifre");
   }
else
   {
		  //veritabanindan cekilen kullanici adi ve sifresi degerlerine gore yonetici adi ve sifresi belirleniyor...
		  $yonetici_adi_sifresi_ogren="Select kullanici,sifre from yonetim where id=1";
		  $yonetici_adi_sifresi=@$baglanti->query($yonetici_adi_sifresi_ogren)->fetchAll(PDO::FETCH_ASSOC);
		  $yonetici_adi=$yonetici_adi_sifresi[0]["kullanici"];
		  $yonetici_sifresi=$yonetici_adi_sifresi[0]["sifre"];
		  if  ($yoneticisifre==$yonetici_sifresi && $yoneticiad==$yonetici_adi) 
			  {
				  $yonet='yonet';
				  $_SESSION['yonet']=$yonet; 
				  header("Location:adminpnl/anaframe2.php");
				  //header("Location:adminpnl/anaframe.php");
				  //header("Location:adminpnl/frameset.php");
			 }
		 elseif ($yoneticiad!=$yonetici_adi)
			 {
				 //kullanici adi yanlis girilmisse
				  header("Location:kpanel.php?hata=yonetici");
			 }
		 elseif ($yoneticisifre!=$yonetici_sifresi)
			 {
					//sifre yanlis girilmisse
				  header("Location:kpanel.php?hata=sifre");
			 }
		 else 
			 {
				  header("Location:kpanel.php?eksik=yoneticisifre");					
			 }
   }
?>