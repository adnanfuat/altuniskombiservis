<?	session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		$max_file_size=round($max_file_size/1024);
		include($uzaklik."inc_s/baglanti.php");
?>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">body {background-color: #EFEFEF;margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}</style>
<style type="text/css">
.style1 {font-size: 10px}
</style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr> 
    <td class="td_anabaslik" style="padding-left:10px;"><? /*<a href="../anaframe.php" class="td_anabaslik_link" >Kontrol Panel</a> &gt; <a href="kontrol.php"  class="td_anabaslik_link">Bankalar</a> &gt;*/?><? include("../inc_s/inc_diger_menu.php"); ?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td height="30" colspan="2"  class="altkategori"><img src="../_img/panel_19.png" width="38" height="38" align="absmiddle"/> <strong>Dosya Ekle</strong></td>
          </tr>
          <tr> 
            <td width="200"></td>
            <td>
			<font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<?
			if (isset($_GET['err']))
			   {
					switch($_GET['err'])
					  {
						 case 'eksik_veri':	 print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");break;
						 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
						 case 'uzanti': print("Hatalı  Format"); break;
						 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu");break;
					  }
			  }
			?>
           </font></td>
          </tr>
          <tr>
            <td><font class="baslik">Konu/Başlık *</font></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Dosya *</strong></td>
            <td bgcolor="#F9F9F9">
            <input name="dosya" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
			</td>
          </tr>
          <tr>
            <td height="26" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
			  </td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="86%">&nbsp;</td>
                  <td width="14%" valign="middle">
				  <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb</strong></span></div></td>
                </tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table></td>
          </tr>
      </table></td>
    </form>
  </tr>
</table>
</body>
</html>
<script>
function kontrol()
	{
		if (document.form1.dosya.value=="" || document.form1.ad.value=="" ) { alert("Lütfen Gerekli Alanları Giriniz"); }	else { document.form1.submit();	}		
	}
</script>
<?
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>