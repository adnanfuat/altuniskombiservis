<?	session_start();
$link_inherit="kontrol.php";
include("config.php");	  
if  (isset($_SESSION['yonet']))
    {
		if (isset($_GET["numara"]))
		   {
			  $urun_numara=$_GET["numara"];  //echo $urun_numara;
			  if (isset($_SESSION[$tablo_ismi."urun_numara"])) { unset($_SESSION[$tablo_ismi."urun_numara"]); }
			  $_SESSION[$tablo_ismi."urun_numara"]=$urun_numara;
		   }
		else
		   {
			  $urun_numara=$_SESSION[$tablo_ismi."urun_numara"]; 
		   }
	    include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		
	    include($uzaklik."inc_s/sayfa_no_belirle.php");
	    include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
	    include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
	    unset($_SESSION[$tablo_ismi.'resim']);
	    unset($_SESSION[$tablo_ismi.'aciklama']);
	    unset($_SESSION[$tablo_ismi.'hata']);

	    $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
	    $sql_cumlesi="select numara from $tablo_ismi where kategori='$urun_numara'";
	    $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
	    $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
	    include($uzaklik."inc_s/sayfalama.php");
	    sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	
	    $sql_cumlesi="select * from $tablo_ismi where kategori='$urun_numara' order by puan asc,numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
		//echo $sql_cumlesi;
	    $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
	    $toplam_kayit_sayisi=count($recordset);
	
		$urun_ogren=@$baglanti->query("Select ad,ustkategori_no,altkategori_no from urun_detay where  numara=$urun_numara")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_no=$urun_ogren[0]["ustkategori_no"];
		$altkategori_no=$urun_ogren[0]["altkategori_no"];
		$urun_ad=$urun_ogren[0]["ad"]; //echo "aaaa".$urun_ad;
		$kategori_ogren=@$baglanti->query("Select ad from urun_kategori where numara='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_ad=$kategori_ogren[0]["ad"];
	
		$altkategori_ogren=@$baglanti->query("Select ad from urun_altkategori where numara='$altkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_ad=$altkategori_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}.style3 {	color: #132C6A;	font-weight: bold;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/galeri.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? echo $kategori_ad; ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? echo $altkategori_ad; ?>)</a> &gt; 
	<a href="../urun_detay/kontrol.php"  class="veri_ana_baslik"><? echo $urun_ad; ?></a> &gt;	
	<a href="kontrol.php"  class="veri_ana_baslik">Ürün Videosu</a> &gt;</font>    
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
<tr> 
     <form  name="xxxy" action="kontrol_islem.php" method="post">
      <td align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td class="anabaslik">Ürün Video</td>
      </tr>
 <?
    if  ( $toplam_kayit_sayisi>0)
        {
 ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="9"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? } else { ?>
				<tr>
                  <td colspan="9" height="15"></td>
                </tr>
				<? } ?>
                <tr>
                  <td width="5%"><div align="left" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ak.</font></div></div></td> 
                  <td width="5%"><div align="center" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></div></td>
                  <td width="31%"><div align="left"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Açıklama</strong></font></div></td>
                <? /* <td width="26%"><div align="center"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resimler</strong></font></div></td>*/ ?>
                  <td width="6%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sıralama</strong></font></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td width="6%">&nbsp;</td>
                </tr>
					<?
					for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
						  {
								$resim=$recordset[$sayac]["resim_adres"];
								$video=$recordset[$sayac]["video_adres"];
								$aktif=$recordset[$sayac]["aktif"];
								$ad=$recordset[$sayac]["ad"];
								$kaynak=$recordset[$sayac]["kaynak"];
								$numara=$recordset[$sayac]["numara"];	
								$durum=$recordset[$sayac]["durum"];
								$puan=$recordset[$sayac]["puan"];
								switch ($durum)
								{		
									case 1: $durum_aciklama="Ana Sayfa - Seçmeler"; break;
									case 2: $durum_aciklama="Ana Sayfa"; break;
								}	
					?>
                <tr>
                  <td class="aktif_tdler">
                  <div align="center">
                  <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>">
                  </div></td> 
                  <td class="sil_tdler"><div align="center">
                    <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td>
                  <td width="33%" valign="middle"><font class="veri_baslik">&nbsp;<strong>
                  <a href="<? print($video_dizini.$video); ?>" target="_blank" class="link_faaliyet">		
			      <? print($ad); ?></a></strong></font></td>
                  <td width="23%" valign="middle" class="ekle_duzenle_baslik"><? echo $puan; ?></td>
                  <td width="34%" valign="middle">
				  <a href="duzenle.php?numara=<? print($numara);?>" class="link_faaliyet" title="Düzenlemek İçin Tıklayınız">
				  <img src="../../rsmlr/duzenle.gif" width="50" height="39" border="0"></a></td>
                </tr>
					<?
						 }
					?>
            </table>
            </td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="3" cellspacing="3">
                <tr>
                  <td height="46" valign="bottom">
                  <table width="292" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td height="30" align="center" class="aktif_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="aselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td align="center" class="sil_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="sselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td width="200" class="veri_detay"><strong>Tümünü Seç/Seçimi Kaldır</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr> 
                  <td height="46" valign="bottom">
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
				  <input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				  <input name="aktif" type="submit" id="aktif" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle">
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
            </table>
            </td>
          </tr>
 <?
    }  
 elseif  ( $toplam_kayit_sayisi==0)
    {
?>
          <tr>
            <td>
				<div align="center">
				<table width="100%" height="65">
                  <tr > 
                    <td  height="61" valign="middle" bgcolor="#FFFFFF"><div align="center"> 
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p>
                          <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
						  <input name="ekle" type="submit" class="dugmeler_ekle" id="ekle" value="Ekle">
                        </p>
                        <p>&nbsp;</p>
                    </div></td>
                  </tr>
            </table>
            </div>
			</td>
          </tr>
<?
   }
?>               
          <tr>
            <td>&nbsp;</td>
          </tr>
      </table>
      </td>
</form>
  </tr>
</table>
</body>
</html>
<script>
function isChecked(checkboxId) { var id = '#' + checkboxId; return $(id).is(":checked"); }
$('#aselectall').on('click', function() {$('.aselectedid').prop('checked', isChecked('aselectall')); });
$('#sselectall').on('click', function() {$('.sselectedid').prop('checked', isChecked('sselectall')); });
</script>
<? 
	 } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>