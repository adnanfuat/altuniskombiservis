<? session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$max_file_size=round($max_file_size/1024);	
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$kategori=$_SESSION['kategori'];
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from hizmet_kategori where numara=$kategori")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if (count($recordset)<>0)
		   {
				$resim=$recordset[0]["resim_adres"];
				$ad=$recordset[0]["ad"];
				$kaynak=$recordset[0]["kaynak"];
				$video=$recordset[0]["video_adres"];
				$puan=$recordset[0]["puan"];
				$durum=$recordset[0]["durum"];	
				switch ($durum)
				{		
					case 1: $durum_aciklama="Ana Sayfa - Seçmeler"; break;
					case 2: $durum_aciklama="Ana Sayfa"; break;
				}
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
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<style type="text/css">.style3 {font-size: 10px}</style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/kultursanat.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
		<a href="../hizmet_kategori/kontrol.php" class="veri_ana_baslik">Hizmet Kategorisi (<? print $ustkategori_adi; ?>)</a> &gt; 
	<a href="kontrol.php?kategori=<? print $kategori; ?>"  class="veri_ana_baslik">Videolar</a> &gt;</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF"> 
        <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="2" class="anabaslik">Video Düzenle</td>
          </tr>
          <tr> 
            <td width="185"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td width="725">
            	<font  class="hata1"> 
				<? 		
                if (isset($_GET['err']))
                   {
                         switch($_GET['err'])
                            {
                               case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
                               case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edurumdi."); break;
                               case 'uzanti':print("Hatalı Resim Formatı"); break;
                               case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
                            }
                   }
                ?>
                </font>             </td>
          </tr>
        
        
   <? /*      <tr>
            <td><span class="baslik"><strong>Durum *</strong></span></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'durum'])) { $durum=$_SESSION[$tablo_ismi.'durum']; } ?>
                <select name="durum" class="textbox1">
                  <option value="1" <? if ($durum==1) { ?> selected="selected" <? } ?>>Ana Sayfa - Seçmeler</option>
                  <option value="2" <? if ($durum==2) { ?> selected="selected" <? } ?>>Ana Sayfa</option>


              </select></td>
          </tr> */ ?>
          <tr>
            <td><span class="baslik">Sıralama Puanı</span></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'puan'])) { $puan=$_SESSION[$tablo_ismi.'puan']; } ?>
 		    <input name="puan" type="text"   class="textbox1" id="puan" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? echo $puan ?>" size="10">
			</td>
          </tr>
          <tr>
            <td class="baslik">Açıklama *</td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
          <tr> 
            <td><strong class="baslik">Resim Seç </strong></td>
            <td bgcolor="#F9F9F9">
           <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
           <a href="<? echo $resim_dizini.$resim; ?>" target="_blank"><? echo $resim; ?></a> <span class="veri_tarih">Tavsiye Edurumen Boyut: 240px*180px</span></td>
          </tr>
          <tr>
            <td><strong class="baslik">Video Seç **</strong></td>
            <td bgcolor="#F9F9F9">
              <input name="video" type="file" id="video"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
			  <a href="<? echo $video_dizini.$video; ?>" target="_blank"><? echo $video; ?></a></td>
          </tr>
          <tr>
            <td class="baslik">veya</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td><strong class="baslik">Video Kaynağı **</strong></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'kaynak'])) { $kaynak=$_SESSION[$tablo_ismi.'kaynak']; } ?>
			<textarea name="kaynak" cols="80" rows="10" class="textbox1" id="kaynak"><? echo $kaynak; ?></textarea>            </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td bgcolor="#F9F9F9" class="veri_tarih">Dış kaynaklardan video kullanmak için video sitesinden alacağınız video EMBED kodunu yukarıya giriniz.</td>
          </tr>
          <tr>
            <td height="32" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr> 
            <td colspan="2">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="81%">&nbsp;</td>
                  <td width="19%" valign="middle">
				  <div align="left"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size/1024; ?> Mb</strong></font></div>                  </td>
                </tr>
              </table>              </td>
          </tr>
      </table>
      </td>
    </form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<script> function kontrol() { if  (document.form1.ad.value=="") { alert("Lütfen Açıklamayı Giriniz");  } else { document.form1.submit(); } }</script>
<?
     }
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }
?>