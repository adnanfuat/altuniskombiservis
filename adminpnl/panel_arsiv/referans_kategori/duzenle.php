<? session_start();
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
				$dil=$recordset[0]["dil"];
				$puan=stripslashes($recordset[0]["puan"]);
				$htaccess_etiket=stripslashes($recordset[0]["htaccess_etiket"]);
				$resim=$recordset[0]["resim_adres"];
				if ($resim=='') {$resim='resimyok.gif'; }
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
<style type="text/css">body {background-color:#EFEFEF;margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom: 0px;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style1 {font-size: 10px}</style>
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
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr>
            <td colspan="3" class="anabaslik">Referans Kategori Düzenle</td>
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
							 case 'eksik_veri':	 print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
							 case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi."); break;
							 case 'uzanti':  print("Hatalı Resim Formatı"); break;
							 case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
						 }
				   }
				if (isset($_GET["don"]))   { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);  }											 
			?>
            </font></td>
          </tr>
          <tr> 
            <td><strong class="baslik"><? echo $kategori ?> Adı *</strong></td>
            <td colspan="2" bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>
			<input name="ad" type="text" id="ad"  value="<? echo $ad ?>"  class="textbox1" size="55"  onblur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">			</td>
          </tr>
          
                    <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
          <tr>
            <td class="baslik">Dil *</td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
            <select name="dil" class="textbox1" id="dil">
              <option value="1">Türkçe</option>
              <option value="2">İngilizce</option>
            </select>
            </td>
          </tr>
          <tr>
            <td><span class="baslik">Sıralama Puanı</span></td>
            <td colspan="2" bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'puan'])) { $puan=$_SESSION[$tablo_ismi.'puan']; } ?>
 		    <input name="puan" type="text"   class="textbox1" id="puan" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? echo $puan ?>" size="10">			</td>
          </tr>
          <tr> 
            <td><span class="baslik">Resim</span></td>
            <td width="58%" bgcolor="#F9F9F9">
            <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="46">
            <span class="veri_tarih"> İdeal Boyut: <? echo $kck_m_w; ?>px - <? echo $kck_m_h; ?> px'in katları olmalıdır.</span></td>
            <td width="21%" bgcolor="#F9F9F9">
			<div align="center">
			<a href="<? print($resim_dizini.$resim); ?>" target="_blank"> 
			<img src="<? print($resim_dizini.$resim); ?>" width="<? print($yeni_genislik);?>" height="<? print($yeni_yukseklik);?>" border="0"></a></div></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="80%" class="veri_tarih">&nbsp;</td>
                  <td width="20%" valign="middle">
				    <div align="left"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></font></div></td>
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
				alert("Tum Alanlari Dogru Bir Sekilde Doldurunuz");
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