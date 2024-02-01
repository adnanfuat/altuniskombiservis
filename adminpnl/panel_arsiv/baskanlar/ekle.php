<? session_start();
$link_inherit="ekle.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/baglanti.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style4 {color: #666666}</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/ana_dok.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; 
    <a href="kontrol.php"  class="veri_ana_baslik">Şube Başkanları</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
        <tr>
            <td colspan="3" class="anabaslik">Başkan Ekle </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td colspan="2">
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
            if (isset($_GET['err']))
               {
                    switch($_GET['err'])
                      {
                         case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
                         case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
                         case 'uzanti': print("Hatalı Resim Formatı"); break;
                         case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
                      }
              }
            ?>
            </font>            </td>
          </tr>
          <tr> 
            <td width="188"><font class="baslik">Adı *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			<input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" >            </td>
          </tr>
          
          
          
          <tr> 
            <td width="188"><font class="baslik">Şube</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_sube'])) { $sube=$_SESSION[$tablo_ismi.'n_sube']; } ?>
			<input name="sube" type="text" class="textbox1" id="sube"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($sube)) {echo $sube; }?>" size="55" >            </td>
          </tr>




          <tr> 
            <td width="188"><font class="baslik">Adres</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_adres'])) { $adres=$_SESSION[$tablo_ismi.'n_adres']; } ?>
			<input name="adres" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($adres)) {echo $adres; }?>" size="55" >            </td>
          </tr>



          <tr> 
            <td width="188"><font class="baslik">Telefon</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_telefon'])) { $telefon=$_SESSION[$tablo_ismi.'n_telefon']; } ?>
			<input name="telefon" type="text" class="textbox1" id="telefon"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($telefon)) {echo $telefon; }?>" size="55" >            </td>
          </tr>



          <tr> 
            <td width="188"><font class="baslik">Web</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_web'])) { $web=$_SESSION[$tablo_ismi.'n_web']; } ?>
			<input name="web" type="text" class="textbox1" id="web"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($web)) {echo $web; }?>" size="55" >            </td>
          </tr>

     
          
         <? /* 
          <tr>
            <td><font class="baslik"><? echo $kategori ?> Altbilgi</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_altbilgi'])) { $altbilgi=$_SESSION[$tablo_ismi.'n_altbilgi']; } ?>
              <input name="altbilgi" type="text" id="altbilgi"  value="<? if (isset($altbilgi)) {echo $altbilgi; }?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >           </td>
          </tr>
          <tr>
            <td><font class="baslik"><? echo $kategori ?> Link</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_link'])) { $link=$_SESSION[$tablo_ismi.'n_link']; } ?>
              <input name="link" type="text" id="link"  value="<? if (isset($link)) {echo $link; }?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >            </td>
          </tr> 
          <tr>
            <td><font class="baslik">Resim Genişlik *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_genislik'])) { $genislik=$_SESSION[$tablo_ismi.'n_genislik']; } ?>
              <input name="genislik" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="10" >
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px</span></td>
          </tr>
          <tr>
            <td><font class="baslik">Resim Yükseklik *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'n_yukseklik']; } ?>
              <input name="yukseklik" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="10" >
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_h; ?>px</span></td>
          </tr>*/ ?>
          <tr>
            <td><font class="baslik">Sıralama Puanı</font></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
                <input name="puan" type="text" class="textbox1"  onfocus="pchange(this,1);"  onblur="pchange(this,0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10" ></td>
          </tr>
         <? /* <tr> 
            <td><font class="baslik">Resim *</font></td>
            <td width="523" bgcolor="#F9F9F9">
              <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">            </td>
            <td width="185" bgcolor="#F9F9F9">
			<table width="185"  border="0">
                <tr>
                  <td width="54" height="20"><div align="center"><span  class="veri_tarih">*.swf</span></div></td>
                  <td width="58" height="20"><div align="center" class="veri_tarih"><span  class="veri_tarih">*.jpg</span></div></td>
                  <td width="59" height="20"><div align="center"><span  class="veri_tarih">*.gif</span></div></td>
                </tr>
                <tr>
                  <td><div align="center"><img src="../../rsmlr/swf.gif" width="43" height="43"></div></td>
                  <td><div align="center"><img src="../../rsmlr/jpeg.gif" width="43" height="43"></div></td>
                  <td><div align="center"><img src="../../rsmlr/gif.gif" width="43" height="43"></div></td>
                </tr>
            </table></td></tr> */ ?>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle" >
				    <div align="left"><span class="veri_tarih">Max. Dosya Boyutu: <strong><? print $max_file_size ?> kb</strong></span></div></td>
                </tr>
            </table>            </td>
         </tr>
      </table>
      </td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script>
function kontrol()
	{
		if (document.form1.ad.value=="")
			{																
				alert("Lütfen Gerekli Alanları Giriniz");
			}
		else
			{
				document.form1.submit();
			}		
	}
</script>
<?
	 }
  else 
	 {
		 unset($_SESSION['yonet']);
		 include('error.php');
	 }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>