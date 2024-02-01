<? session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		/*$syonetim=$_SESSION["siteyonetici"];
		$boyut_ogren=@$baglanti->query("Select galeri_altkategori_genislik, galeri_altkategori_yukseklik from parametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		if  ($boyut_ogren_sayi>0)
			{
				$kck_m_w=$boyut_ogren[0]["galeri_altkategori_genislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_altkategori_yukseklik"];
			}
		else
			{
				$boyut_ogren=@$baglanti->query("Select galeri_altkategori_vgenislik, galeri_altkategori_vyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
				$boyut_ogren_sayi=count($boyut_ogren);
				$kck_m_w=$boyut_ogren[0]["galeri_altkategori_vgenislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_altkategori_vyukseklik"];
			}
		*/
		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$ustkategori_no=$_SESSION['ust_kategori_no'];
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		if (isset($_GET["alt_kategori"]))
			{
				$altkategori_no=$_GET["alt_kategori"];
				$_SESSION['altkategori_no']=$altkategori_no;
			}
		else
			{
				$altkategori_no=$_SESSION['altkategori_no'];
			}
		$sql_cumlesi="select * from $tablo_ismi where numara='$altkategori_no'";																	
		$alt_kategori=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($alt_kategori)<>0)
			{	  
				$ad=$alt_kategori[0]["ad"];
				$siralama=$alt_kategori[0]["siralama"];
				$resim=$alt_kategori[0]["resim_adres"];
				if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);
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
<style type="text/css">
.style1 {font-size: 10px}
.style3 {color: #666666}
</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="center"><img src="../pictures/galeri.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; 
	<a href="../galeri_kategori/kontrol.php" class="veri_ana_baslik">Galeri Kategori(<? print $ustkategori_adi; ?>)</a> &gt; 
	<a href="kontrol.php?ust_kategori_no=<? print $ustkategori_no; ?>"  class="veri_ana_baslik">Alt Kategoriler</a> &gt; 
	</font></td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table width="100%" border="0" align="center" cellpadding="3" cellspacing="5">
          <tr>
            <td colspan="3" class="anabaslik">Galeri Alt Kategori Düzenle </td>
          </tr>
          <tr> 
            <td width="21%">
			<input name="gizli" type="hidden" id="gizli" value="<? echo $altkategori_no; ?>">
            <input name="gizli2_ust_kategori_no" type="hidden" id="gizli2_ust_kategori_no" value="<? echo $ustkategori_no; ?>">
			</td>
            <td colspan="2">
			<font color="#FF0000" class="hata1"> 
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
				if (isset($_GET["don"])) { $mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj); }											 
			?>
              </font></td>
          </tr>
          <tr> 
            <td><font  class="baslik"><? echo $kategori ?> Adı *</font></td>
            <td width="58%" bgcolor="#F9F9F9">
		    <? if (isset($_SESSION[$tablo_ismi.'ad'])) { $ad=$_SESSION[$tablo_ismi.'_ad']; }  ?>			
			<input name="ad" type="text" id="ad"  value="<? echo $ad ?>"  class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);">
			</td>
            <td width="21%" rowspan="2" bgcolor="#F9F9F9">
			<div align="center"><a href="<? print($resim_dizini.$resim); ?>" target="_blank"><img src="<? print($resim_dizini.$resim); ?>" width="<? print($yeni_genislik);?>" height="<? print($yeni_yukseklik);?>" border="0"></a></div></td>
          </tr>
          <tr>
            <td align="left"><strong class="baslik">Sıralama Puanı</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'siralama'])) { $siralama=$_SESSION[$tablo_ismi.'siralama']; } ?>
			  <input name="siralama" type="text" id="siralama"  value="<? echo $siralama ?>"  class="textbox1" size="10"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >
            </td>
          </tr>
          <tr> 
            <td align="left"><strong class="baslik">Resim </strong></td>
            <td colspan="2">
              <input name="resim" type="file" id="resim"  class="textbox1" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="45">
              <span class="veri_tarih">Tavsiye Edilen Boyut: <? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px</span></td>
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()">
		   </td>
          </tr>
          <tr> 
            <td colspan="3"><table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle">
				    <div align="left"><font class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></font></div></td>
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
<script> function kontrol(){	if (document.form1.ad.value=="" ){ alert("Lütfen Bir Ad Giriniz. ");} else { document.form1.submit(); }	} </script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php");
	}  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>