<?	session_start();
  	$link_inherit="ekle.php";
	include("config.php");		  
    if (isset($_SESSION['yonet']))
	   {
			include($uzaklik."inc_s/baglanti.php");
			$max_file_size=substr($max_file_size,0,-3);
?>
<script language=JavaScript1.2 src="<? echo $uzaklik; ?>js/feedback.js"></script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">body { background-color:#EFEFEF;margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css"> .style1 {font-size: 10px} </style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/muht.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; <span style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;"><font class="veri_ana_baslik"><? echo $title ?></font></span> Ekle</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr > 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data" >
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr> 
            <td>&nbsp;</td>
            <td width="996"><font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
				<? 		
					if (isset($_GET['err']))
					   {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");break;                             
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti': print("Hatalı Resim Formatı"); break;
								 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
							  }
					   }
					if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);}
                ?>
              </font>              </td>
          </tr>
          <tr> 
            <td width="184"><font class="ekle_duzenle_baslik"><strong class="baslik"> <? echo $kategori ?> Adı * </strong></font></td>
            <td bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			  <input name="ad" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" ></td>
          </tr>
           <? if (1==2) { ?>
          <tr>
            <td><font class="baslik">Dil *</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                 
           <? if (1==5) { ?><option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option><? } ?>
                
                </select>
            </td>
          </tr>
           <? }  ?>
           <? if (1==5) { ?>
          <tr> 
            <td valign="top"><strong><font class="baslik"><? echo $kategori ?> Detay</font></strong></td>
            <td bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
            <div align="left" >
			<? if (isset($_SESSION[$tablo_ismi.'n_detay'])) { $detay=$_SESSION[$tablo_ismi.'n_detay']; } ?>
			<textarea name="detay" cols="54" rows="8"  class="textbox1"><? if (isset($detay)) {echo $detay; }?></textarea>
			</div></td>
          </tr>
           <? }  ?>
          <tr>
            <td><font class="ekle_duzenle_baslik"> <strong> </strong><strong> </strong><strong class="baslik"><? echo $kategori ?> Link </strong></font></td>
            <td bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <? if (isset($_SESSION[$tablo_ismi.'n_link'])) { $link=$_SESSION[$tablo_ismi.'n_link']; } ?>
              <input name="link" type="text" class="textbox1" id="link"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($link)) {echo $link; }?>" size="55" >
              <span class="veri_tarih">Örn:http://www.siteismi.com</span></td>
          </tr>
          <tr>
            <td><span class="baslik"><strong>Sıralama Puanı </strong></span></td>
            <td bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <? if (isset($_SESSION[$tablo_ismi.'n_siralama'])) { $siralama=$_SESSION[$tablo_ismi.'n_siralama']; } ?>
              <input name="siralama" type="text"   value="<? echo $siralama ?>"   class="textbox1" size="10"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >           </td>
          </tr>
          <? if (1==1) { ?>
          <tr> 
            <td><font class="ekle_duzenle_baslik"><strong class="baslik">Resim </strong></font></td>
            <td bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <input name="resim" type="file" class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> İdeal Boyut: <? echo $k_m_w; ?>px - <? echo $k_m_h; ?>px'in katları olmalıdır.</span></td>
          </tr>
          <? } ?>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr> 
            <td colspan="2"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">

                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="84%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">&nbsp;</td>
                  <td width="16%" valign="middle" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                  <div align="left" class="veri_tarih"><font face="Verdana, Arial, Helvetica, sans-serif">
                  <span class="style1"><font face="Verdana, Arial, Helvetica, sans-serif">Max. Dosya Boyutu:</font> 
				  <? print $max_file_size ?> kb </span></font></div></td>
                </tr>
              </table></td>
          </tr>
      </table></td>
    </form>
  </tr>
</table>
</body>
</html>
<?
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>
<script>
function kontrol()
	{
		if (document.form1.ad.value=="")
		   {																
				alert("* ile İşaretli Alanların Doldurulması Zorunludur");
		   }
		else
		  {
				document.form1.submit();
		  }		
	}
</script>