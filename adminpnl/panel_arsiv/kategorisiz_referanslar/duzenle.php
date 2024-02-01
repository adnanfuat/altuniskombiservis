<? session_start();
if (isset($_SESSION['yonet']))
   {
		include("config.php");
		include($uzaklik."inc_s/baglanti.php");
		$link_inherit='duzenle.php';
		$max_file_size=substr($max_file_size,0,-3);	
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$numara=$_GET["numara"];
		$sql_cumlesi="select * from $tablo_ismi where numara='$numara'";																	
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($recordset)<>0)
			{	  
				$ad=$recordset[0]["ad"];
				$detay=$recordset[0]["detay"];
				$siralama=$recordset[0]["siralama"];		
				$link=$recordset[0]["link"];		
				$resim=$recordset[0]["resim_adres"];
				$dil=$recordset[$sayac]["dil"];	//echo $dil;
				switch ($dil)
						{		
							case 1: $dil_aciklama="Türkçe"; break;
							case 2: $dil_aciklama="İngilizce"; break;
						}
				if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$height_of_image,$width_of_image);
			}
		else
			{
				header('Location:kontrol.php');
			}																			
?>
<script language=JavaScript1.2 src="<? echo $uzaklik; ?>js/feedback.js"></script>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body { 	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {font-size: 10px}
.style4 {font-size:11px; color:#666666; font-style:normal; text-decoration:none; font-family: Tahoma;}
.style8 {font-style:normal; text-decoration:none; color: #666666;}
</style>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/muht.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; <font class="veri_ana_baslik"><? echo $title ?></font> Düzenle</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="5" cellspacing="5" bordercolor="#CCCCCC" bgcolor="#FFFFFF" style="border:solid; border-width:1">
  <tr > 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data" >
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF" > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6">
          <tr> 
            <td width="17%"><input name="gizli" type="hidden" id="gizli" value="<? echo $numara; ?>"></td>
            <td colspan="2">
             <font  class="hata1"> 
				<? 		
					if (isset($_GET['err']))
					   {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':   print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");  break;
								 case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi.");  break;
								 case 'uzanti':   print("Hatalı Resim Formatı");   break;
								 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu");  break;
							  }
					  }
					if (isset($_GET["don"]))  { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);}
                ?>
              </font>
             </td>
          </tr>
          <tr> 
            <td><font  class="ekle_duzenle_baslik"><strong class="baslik"><? echo $kategori ?> Adı * </strong></font></td>
            <td colspan="2" bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
			<? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'ad']; } ?>			  
			  <input name="ad" type="text" id="ad"  value="<? echo $ad ?>"  class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">
            </td>
            
            
          </tr>
          <? if (1==2) { ?>
          
          <tr>
            <td><span class="baslik">Dil *</span></td>
            <td colspan="2" bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'dil'])) { $dil=$_SESSION[$tablo_ismi.'dil']; } ?>
                <select name="dil" class="textbox1">
                  <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                  
                  <? if (1==8) { ?>
                  <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option>
				  <? } ?>

              </select></td>
          </tr>
          <? } ?>
          <? if (1==2) { ?>
          <tr> 
            <td valign="top"><font class="ekle_duzenle_baslik"><strong class="baslik"><? echo $kategori ?> Detay </strong> </font></td>
            <td width="66%" bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
            <div align="left">
			<? if (isset($_SESSION[$tablo_ismi.'detay'])) { $detay=$_SESSION[$tablo_ismi.'detay']; } ?>
			<textarea name="detay" cols="54" rows="8" id="detay"  class="textbox1"><? echo($detay) ?></textarea>
            </div></td>
           <? if (1==2) { ?>  <td width="17%" bordercolor="#EAEAEA" bgcolor="#F9F9F9"  style="border-style:solid; border-width:1;">              
              <div align="center"><a href="<? print($resim_dizini.$resim); ?>" rel="external">
            <img src="<? print($resim_dizini.$resim); ?>" width="<? print($yeni_genislik);?>" height="<? print($yeni_yukseklik);?>" border="0" align="absbottom"></a>              </div></td><? } ?>
          </tr>
          <? } ?>
         <? if (1==1) { ?>  <tr>
            <td><font  class="ekle_duzenle_baslik"><strong class="baslik"><? echo $kategori ?> Link </strong></font></td>
            <td colspan="2" bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <? if (isset($_SESSION[$tablo_ismi.'link'])) { $link=$_SESSION[$tablo_ismi.'link']; } ?>
              <input name="link" type="text" id="link"  value="<? echo $link ?>"  class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >
              <span class="veri_tarih">Örn:http://www.siteismi.com</span></td>
          </tr><? } ?>
          <tr>
            <td><span class="baslik"><strong>Sıralama Puanı</strong></span></td>
            <td colspan="2" bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
            <? if (isset($_SESSION[$tablo_ismi.'siralama'])) { $siralama=$_SESSION[$tablo_ismi.'siralama']; } ?>
 		    <input name="siralama" type="text"   value="<? echo $siralama ?>"   class="textbox1" size="10"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >
            </td>
          </tr>
          
          <tr> 
            <td><span class="baslik"><strong>Resim</strong></span> </td>
            <td colspan="2" bgcolor="#F9F9F9"  style="border-bottom-width:1; border-bottom-style:solid;border-top-width:0; border-left-width:0; border-right-width:0;">
              <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
              <span class="veri_tarih"> İdeal Boyut: <? echo $k_m_w; ?>px - <? echo $k_m_h; ?>px'in katları olmalıdır.</span></td>
          </tr>
          
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
            </tr>
            <tr> 
            <td colspan="3"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="84%" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">&nbsp;</td>
                  <td width="16%" valign="middle" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">
                  <div align="left" class="veri_tarih"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
				  <span class="veri_baslik style1">
				  <font face="Verdana, Arial, Helvetica, sans-serif">Max. Dosya Boyutu:</font></span>
                  <font color="#999999" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? print $max_file_size ?> kb </strong></font> </font></div></td>
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