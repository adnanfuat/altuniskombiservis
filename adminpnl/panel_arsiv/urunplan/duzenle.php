<? session_start();
$link_inherit='duzenle.php';
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
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body onLoad="document.form1.aciklama.focus();">
<table width="950" border="0" align="center" cellpadding="3">
  <tr> 
    <td width="3%" height="26"  class="td_anabaslik"><div align="left"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%"  class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? echo $kategori_ad; ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? echo $altkategori_ad; ?>)</a> &gt; 
	<a href="../urun_detay/kontrol.php"  class="veri_ana_baslik"><? echo $urun_ad; ?></a> &gt;	
	<a href="kontrol.php"  class="veri_ana_baslik">Boyut Resimleri</a> &gt;</font>
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Boyut Düzenle</td>
            </tr>
            <tr> 
              <td width="186" class="baslik">&nbsp;</td>
              <td width="724">
              <font class="hata1"> 
				<? 
				if (isset($_GET["don"])&& $_GET["don"]=="resimboyut"){ $mesaj="Resim: Uygunsuz Format ya da Büyük Dosya Boyutu";  print($mesaj); }											 
				if (isset($_GET["don"])&& $_GET["don"]=="eksik_veri"){ $mesaj="Lütfen gerekli alanları doldurunuz";   print($mesaj); }											 
				?>
				<input name="gizli" type="hidden" value="<? print($numara); ?>"> 
              </font>
              </td>
            </tr>
            <tr> 
              <td class="baslik">Resim Açıklama</td>
              <td bgcolor="#f9f9f9">
				<? if (isset($_SESSION[$tablo_ismi.'aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'aciklama']; } ?>			  
			  <input name="aciklama" type="text" class="textbox1" id="aciklama"  onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? print($aciklama); ?>" size="55" ></td>
            </tr>
            <tr>
              <td class="baslik">Resim * </td>
              <td bgcolor="#f9f9f9">
              <a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim); ?>"  border="0"></a></td>
            </tr>
            <tr>
              <td class="baslik">Sıralama</td>
              <td bgcolor="#f9f9f9">
			  <? if (isset($_SESSION[$tablo_ismi.'siralama'])) {$siralama=$_SESSION[$tablo_ismi.'siralama']; } ?>
              <input name="siralama" type="text" class="textbox1" id="siralama"  onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? print($siralama); ?>" size="55" ></td>
            </tr>
            <tr>
              <td class="baslik">&nbsp;</td>
              <td bgcolor="#f9f9f9">
			  <div align="left">
              <input name="resim" type="file" id="resim"   class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="45">
              <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px</span></div></td>
            </tr>
            <tr> 
              <td height="32" class="baslik">&nbsp;</td>
              <td>
			  <input name="kaydet" type="button" id="kaydet2" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()" >
			  <input name="Submit2" type="button" id="Submit22"  class="dugmeler_sil"  value="Geri Dön" onClick="javascript:history.back()">
              </td>
            </tr>
            <tr> 
              <td colspan="2">
			  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="79%" class="textbox_yardim">
					  <span class="veri_tarih">Not: Ürün sayfalarında en küçük sıralama değerine sahip resim öncelikle görüntülenir. </span></td>
                    <td width="21%" valign="middle">
                    <div align="center" class="veri_tarih">
                    <div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong><? print $max_file_size ?> kb </strong></span></div>
                    </div></td>
                  </tr>
              </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" class="baslik">&nbsp;</td>
            </tr>
          </table>
      </div></td>
    </form>
  </tr>
</table>
</body>
</html>
<script language="javascript"> function kontrol() { form1.submit();} </script>
<?	 
		unset($_SESSION[$tablo_ismi.'aciklama']);
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>