<?  session_start();
$link_inherit="kategori_degistir.php";	
include("config.php");		  
if (isset($_SESSION['yonet'])) 
   {
	  include($uzaklik."inc_s/baglanti.php");
	  //$syonetim=$_SESSION["siteyonetici"];
	  if (isset($_SESSION["menu_ust_kategori"]))
		 {
			$ustkategori_no=$_SESSION["menu_ust_kategori"];
			$ustkategori_ad=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
			$ustkategori_ad=$ustkategori_ad[0]["ad"];
		 }
	  elseif (isset($_SESSION['ust_kategori_no']))
		 {
			$ustkategori_no=$_SESSION['ust_kategori_no'];
			$ustkategori_ad=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
			$ustkategori_ad=$ustkategori_ad[0]["ad"];
		 }
  	  if (isset($_SESSION["menu_alt_kategori"]))
		 {
			$altkategori_no=$_SESSION["menu_alt_kategori"];
			$altkategori_ad=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori_no")->fetchAll(PDO::FETCH_ASSOC);
			$altkategori_ad=$altkategori_ad[0]["ad"];
		 }
	  elseif (isset($_SESSION['alt_kategori']))
		 {
			$altkategori_no=$_SESSION['alt_kategori'];
			$altkategori_ad=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori_no")->fetchAll(PDO::FETCH_ASSOC);
			$altkategori_ad=$altkategori_ad[0]["ad"];
		 }
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
<body>
<table width="950"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><form name="form1" method="post" action="kategori_degistir_islem.php">
      <table width="100%"  border="0" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td width="3%" class="td_anabaslik style1"><div align="center"><img src="../pictures/galeri.gif" width="48" height="48"></div></td>
          <td colspan="2" width="97%" class="td_anabaslik style1"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt;
	<a href="../galeri_altkategori/kontrol.php" class="veri_ana_baslik">Galeri Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Resimler</a> &gt; </font></td>
          </tr>
        <tr>
          <td colspan="3" class="anabaslik">Kategori ve Alt Kategori Değiştir</td>
          </tr>
        <tr>
          <td colspan="2"><font class="ekle_duzenle_baslik">&nbsp;  </font><span class="baslik">Kategori *</span> </td>
          <td width="86%"  ><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
			<?
			$ust_kategoriler=@$baglanti->query("Select numara,ad from $ustkategori_tablo_adi order by ad asc")->fetchAll(PDO::FETCH_ASSOC);
			$ust_kategori_sayisi=count($ust_kategoriler);
			$ilk_ust_kategori=$ust_kategoriler[0]["numara"];
			if (isset($_SESSION['menu_ust_kategori']))
				{
					$secili_ust_kategori=$_SESSION['menu_ust_kategori'];
				}
			elseif (!isset($_SESSION['menu_ust_kategori']) && isset($_SESSION['ust_kategori_no'])) 	
				{
					$secili_ust_kategori=$_SESSION['ust_kategori_no'];
				}
			else
				{
					$secili_ust_kategori=$ilk_ust_kategori;
				}	
			
			?>		 
		    <select name="menu_ust_kategori" onChange="submit()"   class="textbox1" >
			<?  
			for ($sayac=0;$sayac<$ust_kategori_sayisi;$sayac++)
				{
					$ust_kategori_ad=$ust_kategoriler[$sayac]['ad']; 
					$ust_kategori_no=$ust_kategoriler[$sayac]['numara']; 	
			
			?>
						  <option value="<? print($ust_kategori_no); ?>"  <? if (isset($secili_ust_kategori) && $secili_ust_kategori==$ust_kategori_no) { print "selected";} ?> ><? echo $ust_kategori_ad; ?></option>
			<? 
				} 
			?>
            </select>
			</font></td>
        </tr>
        <tr>
          <td colspan="2"><span class="baslik">Alt Kategori *</span> </td>
          <td>
		  <font size="2" face="Verdana, Arial, Helvetica, sans-serif">
			<?  	
			if (isset($_SESSION['menu_alt_kategori']))
				{
					$secili_alt_kategori=$_SESSION['menu_alt_kategori'];
				}
			elseif (!isset($_SESSION['menu_alt_kategori']) && isset($_SESSION['alt_kategori'])) 	
				{
							$secili_alt_kategori=$_SESSION['alt_kategori'];
				}
			if (isset($secili_alt_kategori))
			   {					
				  $secili_ust_kat=$secili_ust_kategori;
				  $alt_kategoriler=@$baglanti->query("Select ad,numara from $altkategori_tablo_adi where ustkategori_no=$secili_ust_kat order by ad asc")->fetchAll(PDO::FETCH_ASSOC);
				  $ustkategori_no=$secili_ust_kat;
				  $altkategori_no=$secili_alt_kategori;
				}
			else
				{
					$ustkategori_no=$_SESSION['ust_kategori_no'];
					$altkategori_no=$_SESSION['alt_kategori'];
					$alt_kategoriler=@$baglanti->query("Select ad,numara from $altkategori_tablo_adi where ustkategori_no=$ustkategori_no and numara<>$altkategori_no  order by ad asc")->fetchAll(PDO::FETCH_ASSOC);
				}			
			$alt_kategori_sayisi=count($alt_kategoriler);				
			?>
            <select name="menu_alt_kategori"   class="textbox1" >
            <? 	
			 for ($sayac=0; $sayac<$alt_kategori_sayisi; $sayac++) 
					{
						$alt_kategori_no=$alt_kategoriler[$sayac]["numara"];
						$alt_kategori_ad=$alt_kategoriler[$sayac]["ad"];
			?>
              <option value="<?  print($alt_kategori_no); ?>" <? if (isset($secili_alt_kategori) && $secili_alt_kategori==$alt_kategori_no) { print ("selected"); }  ?> >
              <?  print($alt_kategori_ad); ?>
              </option>
              <? 		
			  		} 
			  ?>
            </select>
			</font></td>
        </tr>
      </table>
      <p>
        <input type="submit" name="guncelle" value="Güncelle" class="dugmeler_tasima">  
        </p>
    </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
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