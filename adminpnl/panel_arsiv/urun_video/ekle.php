<? session_start();
	$link_inherit="ekle.php";
		include("config.php");
		if (isset($_SESSION['yonet']))
		   {
				include($uzaklik."inc_s/baglanti.php");
			 	//$syonetim=$_SESSION["siteyonetici"];
				//include("boyut_ogren.php");
			
				$urun_numara=$_SESSION[$tablo_ismi."urun_numara"]; //echo $urun_numara."aa";
				$max_file_size=substr($max_file_size,0,-3);	
		
				$urun_ogren=@$baglanti->query("Select ad,ustkategori_no,altkategori_no from urun_detay where  numara=$urun_numara")->fetchAll(PDO::FETCH_ASSOC);
				$ustkategori_no=$urun_ogren[0]["ustkategori_no"];
				$altkategori_no=$urun_ogren[0]["altkategori_no"];
				$urun_ad=$urun_ogren[0]["ad"];
				$kategori_ogren=@$baglanti->query("Select ad from urun_kategori where numara='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
				$kategori_ad=$kategori_ogren[0]["ad"];
		
				$altkategori_ogren=@$baglanti->query("Select ad from urun_altkategori where numara='$altkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
				$altkategori_ad=$altkategori_ogren[0]["ad"];
		
				include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
				include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<style type="text/css"> .style1 {font-size: 10px} </style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/kultursanat.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
	<a href="../hizmet_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorisi(<? print $ustkategori_adi; ?>)</a> &gt; 
	<a href="kontrol.php?kategori=<? print $kategori; ?>"  class="veri_ana_baslik">Videolar</a> &gt; </font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Video Ekle</td>
          </tr>
          <tr> 
            <td width="165">&nbsp;</td>
            <td width="757">
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
            if  (isset($_GET['err']))
                {
					switch($_GET['err'])
					  {
						 case 'eksik_veri':	print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
						 case 'yanlis_tarih':print("Tarih Formatında Hata Tesbit Edildi.");break;
						 case 'uzanti':print("Hatalı  Format"); break;
						 case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
					  }
                }
            ?>
              </font></td>
          </tr>
        <? /*   <tr>
            <td><font class="baslik"><strong>Video Durumu*</strong></font></td>
          <td bgcolor="#F9F9F9">
		  		<? if (isset($_SESSION[$tablo_ismi.'n_durum'])) { $durum=$_SESSION[$tablo_ismi.'n_durum']; } ?>
                <select name="durum" class="textbox1">
                  <option value="1" <? if ($durum==1) { ?> selected="selected" <? } ?>>Ana Sayfa - Seçmeler</option>
                  <option value="2" <? if ($durum==2) { ?> selected="selected" <? } ?>>Ana Sayfa</option>
                </select>
            </td>
          </tr>  */ ?>
          <tr>
            <td class="baslik">Açıklama *</td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
         
         <tr>
            <td><strong class="baslik">Sıralama Puanı</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
            <input name="puan" type="text" class="textbox1" id="puan"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10">
            </td>
          </tr>
          <tr>
            <td><strong class="baslik">Resim Seç</strong></td>
            <td bgcolor="#F9F9F9">
            <input name="resim" type="file" class="textbox1" onFocus="pchange(this,1);"  onblur="pchange(this, 0);" size="46"></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Video Seç **</strong></td>
            <td bgcolor="#F9F9F9">
              <input name="video" type="file" class="textbox1" onFocus="pchange(this,1);"  onblur="pchange(this, 0);" size="46">
              <span class="veri_tarih">Tavsiye Edilen Boyut: 240px*180px</span></td>
          </tr>
          <tr>
            <td class="baslik">veya</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong class="baslik">Video Kaynağı **</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_kaynak'])) { $kaynak=$_SESSION[$tablo_ismi.'n_kaynak']; } ?>
            <textarea name="kaynak" cols="80" rows="10" class="textbox1" id="kaynak"><? echo $kaynak; ?></textarea></td>
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
            <tr valign="bottom" bordercolor="#FFFFFF"> 
            <td width="81%">&nbsp;</td>
            <td width="19%">
			<div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size/1024; ?> Mb</strong></span></div>
            </td>
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
				alert("Lütfen Açıklamayı Giriniz");  
			}
		else if (document.form1.video.value=="" && document.form1.kaynak.value=="") 
			{ 
				alert("Lütfen Videoyu Seçiniz veya Video Kaynağını Giriniz");  
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