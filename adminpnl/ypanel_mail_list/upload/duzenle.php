<?	session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		$max_file_size=round($max_file_size/1024);	
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if (count($recordset)<>0)
		   {
				$ad=$recordset[0]["ad"];
				$dosya=$recordset[0]["dosya"];
			}
		else
			{
				header('Location:kontrol.php');
			}
?>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">body {background-color: #EFEFEF;margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}</style>
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr> 
    <td class="td_anabaslik" style="padding-left:10px;"><? /*<a href="../anaframe.php" class="td_anabaslik_link" >Kontrol Panel</a> &gt; <a href="kontrol.php"  class="td_anabaslik_link">Bankalar</a> &gt;*/?><? include("../inc_s/inc_diger_menu.php"); ?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td height="30" colspan="2"  class="altkategori"><img src="../_img/panel_19.png" width="38" height="38" align="absmiddle"/> <strong>Dosya Düzenle</strong></td>
          </tr>
          <tr> 
            <td width="13%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td width="87%">
			<font  class="hata1"> 
			<? 		
			if (isset($_GET['err']))
			   {
				 switch($_GET['err'])
					{
					   case 'eksik_veri': print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
					   case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
					   case 'uzanti': print("Hatalı Resim Formatı"); break;
					   case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu");break;
				    }
			   }
			?>
              </font></td>
          </tr>
          <tr> 
            <td><font class="baslik"> Konu/Başlık *</font></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>
            <input name="ad" type="text" class="textbox1" id="ad" value="<? echo $ad; ?>" size="55"></td>
          </tr>
          <tr>
            <td><font class="baslik">Dosya</font></td>
            <td bgcolor="#F9F9F9">
              <input name="dosya" type="file" id="dosya"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
			  <a href="<? echo $dosya_dizini.$dosya; ?>" target="_blank"><? echo $dosya; ?></a>
            </td>
          </tr>
          <tr>
            <td height="32" colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
			</td>
          </tr>
          <tr> 
            <td colspan="2"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="81%" >&nbsp;</td>
                  <td width="19%" valign="middle">
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
<script> function kontrol() {document.form1.submit(); } </script>
<?
     }
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }
?>
