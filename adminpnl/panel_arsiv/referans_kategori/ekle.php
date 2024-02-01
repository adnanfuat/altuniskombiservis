<?	session_start();
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
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style1 {font-size: 10px}.style2 {font-size: 9px}</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/encumen.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="kontrol.php"  class="veri_ana_baslik">Referans Kategorileri</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Referans Kategori Ekle</td>
          </tr>
          <tr> 
            <td></td>
            <td width="724">
			<font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
				if (isset($_GET['err']))
				   {
						switch($_GET['err'])
							{
								 case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti': print("Hatalı Resim Formatı"); break;
								 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
							}
				   }
			  if   (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz";  print($mesaj) ; }											 
			  ?>
              </font></td>
          </tr>
          <tr> 
            <td width="184"><strong class="baslik"><? echo $kategori ?> Adı *</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			<input name="ad" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" onKeyUp="yoltanimla();">           </td>
          </tr>
                    <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'n_htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'n_htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
          <tr>
            <td class="baslik">Dil *</td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
            <select name="dil" class="textbox1" id="dil">
            <option value="1" <? if (isset($dil) && $dil==1) { ?> selected<? } ?>>Türkçe</option>
            <option value="2" <? if (isset($dil) && $dil==2) { ?> selected<? } ?>>İngilizce</option>
            </select>
            </td>
          </tr>
          <tr>
            <td><strong class="baslik">Sıralama</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
            <input name="puan" type="text" class="textbox1" id="puan"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10"></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Resim</strong></td>
            <td bgcolor="#F9F9F9">
            <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
            <span class="veri_tarih"> İdeal Boyut: <? echo $kck_m_w; ?>px - <? echo $kck_m_h; ?> px'in katları olmalıdır.</span></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%">
			        <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size ?> kb</strong></span></div></td></tr>
                <tr>
                  <td colspan="2">&nbsp;</td>
                </tr>
            </table>
            </td>
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
		if  (document.form1.ad.value=="")
			{																
				alert("* ile İşaretli Alanların Doldurulması Zorunludur.");
			}
		else
			{
				document.form1.submit();
			}		
	}
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
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>