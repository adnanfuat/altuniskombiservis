<? session_start();
	  	$link_inherit="ekle.php";
		include("config.php");
		if (isset($_SESSION['yonet']))
		   {
				include($uzaklik."inc_s/baglanti.php");
			 	//$syonetim=$_SESSION["siteyonetici"];
				//include("boyut_ogren.php");
			
				$urun_numara=$_SESSION[$tablo_ismi."urun_numara"];
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
<style type="text/css">
body { 	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style7 {font-size: 10px}
.style17 {color: #000000}
</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body  onLoad="javascript:document.form1.aciklama.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="49" class="td_anabaslik"><div align="left"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="1181" class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? echo $kategori_ad; ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? echo $altkategori_ad; ?>)</a> &gt; 
	<a href="../urun_detay/kontrol.php"  class="veri_ana_baslik"><? echo $urun_ad; ?></a> &gt;	
	<a href="kontrol.php"  class="veri_ana_baslik">Boyut Resimleri </a> &gt;</font>    
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td height="297"  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
			<tr>
              <td colspan="2" class="anabaslik">Boyut Ekle</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td width="724">
			  <font class="hata1"> 
			  <? 		
                if (isset($_GET['err']))
                   {
                        switch($_GET['err'])
                          {
                             case 'eksik_veri':	   print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!");   break;
                             case 'resimboyut':	   print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı");   break;
                             case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi.");   break;
                             case 'uzanti':   print("Hatalı Resim Formatı");   break;
                             case 'boyut':   print("İzin Verilenden Büyük Dosya Boyutu");  break;
                         }
                  }
                if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz";    print($mesaj) ; }											 
              ?>
              </font>
              </td>
            </tr>
            <tr> 
              <td width="186"><span class="baslik">Resim Açıklama </span></td>
              <td bgcolor="#f9f9f9">
			  <?  if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; }  ?>
			 <input name="aciklama" type="text" id="aciklama"  value="<? if (isset($aciklama)) { print($aciklama); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" ></td>
            </tr>
            <tr> 
              <td width="186" valign="top"><span class="baslik">Resim * </span></td>
              <td bgcolor="#f9f9f9">
                <input name="resim" type="file" id="resim"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="44">
                <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px</span></td>
            </tr>
            <tr>
              <td><span class="baslik">Sıralama </span></td>
              <td bgcolor="#f9f9f9">
			  <?  if (isset($_SESSION[$tablo_ismi.'n_siralama'])) {$siralama=$_SESSION[$tablo_ismi.'n_siralama']; }  ?>
              <input name="siralama" type="text" id="siralama"  value="<? if (isset($siralama)) { print($siralama); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" ></td>
            </tr>
            <tr> 
              <td height="32">&nbsp;</td>
              <td>
				  <input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet"  onClick="kontrol()">
				  <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr valign="bottom" bordercolor="#FFFFFF"> 
                    <td width="79%" class="veri_tarih">Not: Ürün sayfalarında en küçük sıralama değerine sahip resim öncelikle görüntülenir. </td>
                    <td width="21%" valign="middle">
				    <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></span></div></td>
                  </tr>
                </table></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </form>
  </tr>
</table>
</body>
</html>
<script language="javascript">
function kontrol()
	{
		if (form1.resim.value==""){	alert("Lütfen Resim Seçiniz");} else {	document.form1.submit();}
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