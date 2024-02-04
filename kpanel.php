<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Yönetici Girişi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400&display=swap" rel="stylesheet"> 
<script src="https://kit.fontawesome.com/ed9cb73734.js" crossorigin="anonymous"></script>
<style type="text/css">
body { margin:0; 	background:url(_img/lock-screen.jpg) top center #29242a no-repeat; background-size:cover;  }
.kpanel_saat { color:#FFFFFF; font-size:100px; text-align:center;  font-family: 'Lato', sans-serif; font-weight:300; } 
.form_div {  border-radius:10px 0 10px 0; background:rgba(255,255,255,1); max-width:400px; margin:0 auto; padding:30px 0;  height:100%; -webkit-box-shadow: 3px 11px 5px -8px rgba(0,0,0,0.3); -moz-box-shadow: 3px 11px 5px -8px rgba(0,0,0,0.3); box-shadow: 3px 11px 5px -8px rgba(0,0,0,0.3);} 
.form_textbox { background:#e7e7e7; border:2px #e7e7e7 solid; padding:10px; border-radius: 5px; margin-bottom:20px; color:#000000; font-family: 'Ubuntu', sans-serif; font-weight:300; font-size:17px; width:80%; } 
.form_textbox:focus { background:#ffffff; border:2px #fb8028 solid;  } 
.form_buton { background:#f76e0d; border-radius: 5px; color:#FFFFFF; font-family: 'Ubuntu', sans-serif; font-weight:300; font-size:17px; text-align:center; padding:10px; width:50%; cursor:pointer; border:0; }
.form_buton:hover { background:#fb8028; border-radius: 10px; } 
.hata_mesaji_yazi {  font-family: 'Ubuntu', sans-serif; font-weight:300; font-size:17px; color:#06255c; line-height:25px; } 

@media only screen and (max-width :768px) {
.kpanel_saat { color:#FFFFFF; font-size:60px; text-align:center;  font-family: 'Lato', sans-serif; font-weight:300; } 
}
</style>
</head> 
<body  onload="startTime()">
    
    <div>&nbsp;</div>
    <div id="time" class="kpanel_saat"></div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div align="center" class="form_div">
    
    	
      
        <form action="kpanel_kontrol.php" method="post">
            	
                <? if (file_exists("tr/_img/logo.jpg"))  { ?>
                <img src="tr/_img/logo.jpg"  style="max-width:200px" />
                <? } elseif (file_exists("tr/_img/logo.png"))  { ?>
            	<img src="tr/_img/logo2.png"  style="max-width:200px" />
                <? } ?>
            	<!--<img src="_img/user.png" /> --><br /><br /><br />


            	<input name="yoneticiadi" type="text" class="form_textbox" id="yoneticiadi" placeholder="Kullanıcı Adı" />
            
            
            	<input name="yoneticisifresi" type="password" class="form_textbox" id="yoneticisifresi" placeholder="Şifre"/>
          
           
                <input type="hidden" value="yonetici" name="kullanici">
                <button type="submit" class="form_buton"><i class="fas fa-sign-in-alt"></i> GİRİŞ YAP </button><br />
            
				<? 
                    if (isset($_GET["hata"]))
                        {
                            $hata_degeri=$_GET["hata"];
                            if  ($hata_degeri=='sifre') { $mesaj="Şifrenizi yanlış girdiniz"; }
                            elseif  ($hata_degeri=='yonetici') { $mesaj="Kullanıcı adınızı yanlış girdiniz";  }				  
                        }
                    if  (isset($_GET["eksik"]))
                        {
                            $eksik_deger=$_GET["eksik"];
                            if ($eksik_deger=='yoneticisifre') { $mesaj="Kullanıcı adınızı ve şifrenizi girmediniz"; }
                            elseif   ($eksik_deger=='yonetici'){ $mesaj="Kullanıcı adınızı  girmediniz"; }
                            elseif   ($eksik_deger=='sifre')	 { $mesaj="Şifrenizi girmediniz";}
                        }
                ?>
                <?  
                    if  (isset($_GET["eksik"]) || isset($_GET["hata"])) { 
                ?>
            		<div>&nbsp;</div>
                    <div class="hata_mesaji_yazi"><? print($mesaj); ?></div>
            	<? 
					}
				?>
            
        </form>
      
    </div><br />
<br />
<br />


</body>
</html>

<script>
	function startTime() {
		var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		// add a zero in front of numbers<10
		m = checkTime(m);
		s = checkTime(s);
		document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
		t = setTimeout(function () { startTime() }, 500);
	}

	function checkTime(i) {
		if (i < 10) {
			i = "0" + i;
		}
		return i;
	}
</script>