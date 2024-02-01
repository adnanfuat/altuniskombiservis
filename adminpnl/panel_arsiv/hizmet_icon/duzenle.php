<? session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$hizmet=$_SESSION[$tablo_ismi."hizmet"];
		$max_file_size=substr($max_file_size,0,-3);	
		$hizmet_ogren=@$baglanti->query("Select ad from hizmet_kategori where numara='$hizmet'")->fetchAll(PDO::FETCH_ASSOC);
		$hizmet_ad=$hizmet_ogren[0]["ad"];
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		if (isset($_GET['item']))
		   {
				unset($_SESSION[$tablo_ismi.'numara']);
				$numara=$_GET['item'];
				$_SESSION[$tablo_ismi.'numara']=$numara;						
		   }
	   elseif (isset($_SESSION[$tablo_ismi.'numara']))
		   {
				$numara=$_SESSION[$tablo_ismi.'numara'];			
		   }
	   $kayit_sec=@$baglanti->query("Select * from $tablo_ismi where numara='$numara'")->fetchAll(PDO::FETCH_ASSOC);
	   if (count($kayit_sec)<>0) 
		  { 
				$aciklama=stripslashes($kayit_sec[0]['aciklama']);
				$ad=stripslashes($kayit_sec[0]['ad']);
				$htaccess_etiket=$kayit_sec[0]['htaccess_etiket'];			
				$resim=$kayit_sec[0]['resim_adres'];
				$siralama=$kayit_sec[0]['siralama'];
				if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);			
		  }
	  else 
		  {
			    header('Location:kontrol.php');
		  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
<script language="javascript" type="text/javascript" src="<? print $uzaklik; ?>/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	editor_selector : "mceAdvanced",
	plugins : "table,save,advhr,advimage,advlink,emotions,insertdatetime,preview,zoom,contextmenu",
	theme_advanced_buttons1_add : "fontselect,fontsizeselect",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
	theme_advanced_buttons2_add_before: "cut,copy,paste,separator",
	theme_advanced_buttons3_add_before : "tablecontrols,separator",
	theme_advanced_buttons3_add : "emotions,advhr",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style9 {font-size: 10px} </style>
</head>
<body onLoad="document.form1.aciklama.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" height="26"  class="td_anabaslik"><div align="left"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%"  class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt; <a href="../hizmet_kategori/kontrol.php" class="veri_ana_baslik">Hizmet Kategorileri (<? echo $hizmet_ad; ?>)</a> &gt; 
	<a href="kontrol.php"  class="veri_ana_baslik">Hizmet İconlar</a> &gt; </font>
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Hizmet İcon Düzenle</td>
          </tr>
            <tr> 
              <td width="184" class="baslik">&nbsp;</td>
              <td width="726">
              <font class="hata1"> 
				<? 
				if (isset($_GET["don"])&& $_GET["don"]=="resimboyut") { $mesaj="Resim: Uygunsuz Format ya da Büyük Dosya Boyutu";  print($mesaj); }											 
				if (isset($_GET["don"])&& $_GET["don"]=="eksik_veri") { $mesaj="Lütfen gerekli alanları doldurunuz"; print($mesaj); }											 
				?>
				<input name="gizli" type="hidden" value="<? print($numara); ?>"> 
              </font></td>
            </tr>
            <? if(1==2) { ?>
            <tr> 
              <td class="baslik">Resim Ad</td>
              <td>
			  <? if (isset($_SESSION[$tablo_ismi.'ad'])) {$ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			  <input name="ad" type="text" class="textbox1" id="ad"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? print($ad); ?>" size="55" onKeyUp="yoltanimla();">              </td>
            </tr>
            
            <tr> 
            <td class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9" colspan="2">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>			  
           <input name="htaccess_etiket" type="text" id="htaccess_etiket"  value="<? echo $htaccess_etiket ?>"  class="textbox1" size="55" onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
          </tr>
            <tr> 
              <td class="baslik">Açıklama</td>
              <td>
			  <? if (isset($_SESSION[$tablo_ismi.'aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'aciklama']; } ?>			  
			  <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? echo $aciklama; ?></textarea>              </td>
            </tr>
            <? } ?>
            <tr>
              <td class="baslik">Resim *</td>
              <td>
              &nbsp;&nbsp; <a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim); ?>"  border="0"></a></td>
            </tr>
            <? if(1==2) { ?>
            <tr>
              <td class="baslik">Sıralama</td>
              <td>
			  <? if (isset($_SESSION[$tablo_ismi.'siralama'])) {$siralama=$_SESSION[$tablo_ismi.'siralama']; } ?>
              <input name="siralama" type="text" class="textbox1" id="siralama"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? print($siralama); ?>" size="55">              </td>
            </tr>
            <? } ?>
            <tr>
              <td class="baslik">&nbsp;</td>
              <td>
              <div align="left">
              <input name="resim" type="file" id="resim"   class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="45">
              <span class="veri_tarih">Örn: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları</span></div></td>
            </tr>
            <tr> 
              <td height="32" class="baslik">&nbsp;</td>
              <td>
			  <input name="kaydet" type="button" id="kaydet2" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()" >
			  <input name="Submit2" type="button" id="Submit22"  class="dugmeler_sil"  value="Geri Dön" onClick="javascript:history.back()">              </td>
            </tr>
            <tr> 
              <td colspan="2"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr valign="bottom" bordercolor="#FFFFFF"> 
                    <td width="79%">
					<span class="veri_detay">Not:</span><span class="veri_detay">En küçük sıralama değerine sahip resim öncelikle görüntülenir. </span></td>
                    <td width="21%" valign="middle">
					<div align="left" class="veri_tarih">Max. Dosya Boyutu: <strong><? print $max_file_size ?> kb</strong></div></td>
                  </tr>
              </table>              </td>
            </tr>
            <tr>
              <td colspan="2" class="baslik">&nbsp;</td>
            </tr>
          </table>
        </div>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script language="javascript"> function kontrol(){ form1.submit();} 
function lower(str) 
	{
    	var letters=new Array(12)
		for (i=0; i <12; i++)
		letters[i]=new Array(2)
		letters[0][0]='İ'; letters[0][1]='i';
		letters[1][0]='Ç'; letters[1][1]='c';
		letters[2][0]='Ğ'; letters[2][1]='g';
		letters[3][0]='Ö'; letters[3][1]='o';
		letters[4][0]='Ş'; letters[4][1]='s';
		letters[5][0]='Ü'; letters[5][1]='u';
		letters[6][0]='ı'; letters[6][1]='i';
		letters[7][0]='ç'; letters[7][1]='c';
		letters[8][0]='ğ'; letters[8][1]='g';
		letters[9][0]='ö'; letters[9][1]='o';
		letters[10][0]='ş'; letters[10][1]='s';
		letters[11][0]='ü'; letters[11][1]='u';
		for ( i = 0; i < letters.length; i++ ) {
        var idx = str.indexOf( letters[i][0] );

        while ( idx > -1 ) {
            str = str.replace( letters[i][0], letters[i][1] ); 
            idx = str.indexOf( letters[i][0] );
        }
    }
    return str;
}
function yoltanimla()
	{
		yol_deger=document.form1.ad.value.replace(/\s/g, "-");
		yol_deger=lower(yol_deger);
		document.form1.htaccess_etiket.value=yol_deger.toLowerCase();
	}
</script>
<?	 
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>
