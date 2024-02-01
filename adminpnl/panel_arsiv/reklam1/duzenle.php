<?	session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$max_file_size=substr($max_file_size,0,-3);	
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";																	
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($recordset)<>0)
			{	  
				$ad=$recordset[0]["ad"];
				$puan=$recordset[0]["puan"];
				$yukseklik1=$recordset[0]["yukseklik"];
				$genislik1=$recordset[0]["genislik"];
				$resim=$recordset[0]["resim_adres"];
				$altbilgi=$recordset[0]["altbilgi"];
				$link=$recordset[0]["link"];
				if ($resim=='') {$resim=$default_resim; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$height_of_image,$width_of_image);
			}
		else
			{
				header('Location:kontrol.php');
			}																			
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> body { background-color: #EFEFEF;margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;} .style10 {color: #666666}</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/ana_reklam.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; 
    <a href="kontrol.php"  class="veri_ana_baslik">Reklamlar</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="3" class="anabaslik">Reklam Düzenle</td>
          </tr>
          <tr> 
            <td width="21%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td colspan="2">
            <font  class="hata1"> 
				<? 		
                if (isset($_GET['err']))
                   {
                        switch($_GET['err'])
                          {
                             case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
                             case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi."); break;
                             case 'uzanti': print("Hatalı Resim Formatı"); break;
                             case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu");break;
                         }
                   }
                ?>
              </font></td>
          </tr>
          <tr> 
            <td><font class="baslik"><? echo $kategori ?> Adı *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			<input name="ad" type="text" id="ad"  value="<? echo $ad ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);">            </td>
          </tr>
          <tr>
            <td><font class="baslik"><? echo $kategori ?> Altbilgi</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'altbilgi'])) { $altbilgi=$_SESSION[$tablo_ismi.'altbilgi']; } ?>
              <input name="altbilgi" type="text" id="altbilgi"  value="<? echo $altbilgi ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >            </td>
          </tr>
          <tr>
            <td><font class="baslik"><? echo $kategori ?> Link</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'link'])) { $link=$_SESSION[$tablo_ismi.'link']; } ?>
              <input name="link" type="text" id="link"  value="<? echo $link ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" >           </td>
          </tr>
          <tr>
            <td><font class="baslik">Resim Genişlik *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'genislik'])) { $genislik1=$_SESSION[$tablo_ismi.'genislik']; } ?>
              <input name="genislik" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($genislik1)) {echo $genislik1; }?>" size="10" >
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_w; ?>px</span></td>
          </tr>
          <tr>
            <td><font class="baslik">Resim Yükseklik *</font></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'yukseklik'])) { $yukseklik1=$_SESSION[$tablo_ismi.'yukseklik']; } ?>
              <input name="yukseklik" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($yukseklik1)) {echo $yukseklik1; }?>" size="10" >
              <span class="veri_tarih">Tavsiye Edilen: <? echo $kck_m_h; ?>px</span></td>
          </tr>
          <tr>
            <td><font class="baslik">Sıralama Puanı</font></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'puan'])) { $puan=$_SESSION[$tablo_ismi.'puan']; } ?>
            <input name="puan" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10" ></td>
          </tr>
          <tr> 
            <td><font class="baslik">Resim *</font></td>
            <td width="57%" bgcolor="#F9F9F9">
              <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
            <span class="veri_tarih"><a href="<? print($resim_dizini.$resim); ?>" class="textbox_yardim" target="_blank">(<? print($resim); ?>)</a></span>            </td>
            <td width="22%" bgcolor="#F9F9F9">
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="15"><div align="center"><span  class="veri_tarih">*.swf</span></div></td>
                <td height="15"><div align="center"><span  class="veri_tarih">*.jpg</span></div></td>
                <td height="15"><div align="center"><span  class="veri_tarih">*.gif</span></div></td>
              </tr>
              <tr>
                <td><div align="center"><img src="../../rsmlr/swf.gif" width="43" height="43"></div></td>
                <td><div align="center"><img src="../../rsmlr/jpeg.gif" width="43" height="43"></div></td>
                <td><div align="center"><img src="../../rsmlr/gif.gif" width="43" height="43"></div></td>
              </tr>
            </table></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
            </td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle">
				    <div align="left"><span class="veri_tarih">Max. Dosya Boyutu: <strong><? print $max_file_size ?> kb</strong></span></div></td>
                </tr>
              </table></td>
          </tr>
      </table></td>
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
				alert("Tum Alanlari Dogru Bir Sekilde Doldurunuz");
			}
		else if (document.form1.genislik.value != parseInt(document.form1.genislik.value))
			{
				alert("Lütfen  Genişlik Değerini Kontrol Ediniz");	
			}		
	   else if ( document.form1.yukseklik.value != parseInt(document.form1.yukseklik.value))
			{
				alert("Lütfen  Yülseklik Değerini Kontrol Ediniz");	
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

	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>