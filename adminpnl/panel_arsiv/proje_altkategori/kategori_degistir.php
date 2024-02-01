<?  session_start();
$link_inherit="kategori_degistir.php";
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		//include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		$ust_kategori_no=$_SESSION['ust_kategori_no'];
		$ustkategori_ad=@$baglanti->query("Select ad from proje_kategori where numara='$ust_kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_ad=$ustkategori_ad[0]["ad"];

		$diger_kategoriler=@$baglanti->query("Select numara,ad from proje_kategori where numara<>'$ust_kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_sayisi=count($diger_kategoriler);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style1 {font-weight: bold}
</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
<tr>
      <td width="48" class="td_anabaslik style1"><div align="center"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
      <td width="890" class="td_anabaslik">
          <span class="veri_ana_baslik">
		  <a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
		  <a href="../proje_kategori/kontrol.php" class="veri_ana_baslik">Uygulama Kategori (<? echo $ustkategori_ad;?>)</a> > 
		  <a href="kontrol.php" class="veri_ana_baslik"> Uygulama Alt Kategorileri </a> ></span>
      </td>
      </tr>
</table>
<table width="950"  border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td>
     <form name="form1" method="post" action="kategori_degistir_islem.php">
      <table width="948"  border="0" cellpadding="3">
        <tr>
          <td colspan="2" class="anabaslik">Uygulama Kategori Değiştir</td>
        </tr>
        <tr>
          <td colspan="2">
          <select name="menu_kategori" class="table">
		  <? 
		  for ($sayac=0; $sayac<$kategori_sayisi; $sayac++)
			  { 
				$ad=$diger_kategoriler[$sayac]["ad"];
		  		$numara=$diger_kategoriler[$sayac]["numara"]; 		
		  ?>
            <option value="<? echo $numara; ?>"><? echo $ad; ?></option>
		  <? 
		      }
		  ?>
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><input type="submit" name="guncelle" value="Güncelle" class="dugmeler_tasima"></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form></td>
  </tr>
</table>
</body>
</html>
<? 
   	 } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php");
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>