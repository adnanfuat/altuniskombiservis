<? session_start();
$link_inherit="kontrol.php";
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/sayfa_no_belirle.php");
		if  (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if  (isset($_SESSION[$tablo_ismi.'icerik'])) {unset($_SESSION[$tablo_ismi.'icerik']);}
		if  (isset($_SESSION[$tablo_ismi.'ozet'])) {unset($_SESSION[$tablo_ismi.'ozet']);}
		//$syonetim=$_SESSION["siteyonetici"];
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		$sql_cumlesi="select numara from $tablo_ismi";
		$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		include($uzaklik."inc_s/sayfalama.php");
	    sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	    $sql_cumlesi="select * from $tablo_ismi order by numara desc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
   	    $toplam_kayit_sayisi=count($recordset);
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.style3 {color: #132C6A;font-weight:bold;}.style5 {color: #D24400;font-weight:bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><img src="../pictures/ana_dok.gif" width="48" height="48"></td>
    <td width="902" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;</span></td>
  </tr>
</table>
<table width="950" align="center" cellspacing="0" bgcolor="#FFFFFF">
    <tr> 
	  <form  name="xxx" action="kontrol_islem.php" method="post">
      <td  align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td class="anabaslik">Hakkında</td>
	  </tr>
			<?
			if  ( $toplam_kayit_sayisi>0)
				{
			?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="10"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? } else { ?>
                <tr><td colspan="10" height="15"></td></tr>
                <? } ?>
                <tr> 
                  <td width="4%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ak.</font></div></td>
                  <td width="4%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></td>
                  <td colspan="3"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Hakkında Başlığı</strong></font></td>
                  <td colspan="3">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
				<? $klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
				$klasor_adi_thumb=substr($thumb_resim_dizini,strrpos(substr($thumb_resim_dizini,0,-1),"/",-1)+1,-1);
				for  ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					 {
						$ad=$recordset[$sayac]["ad"];
						$resim=$recordset[$sayac]["resim_adres"];
						$aktif=$recordset[$sayac]["aktif"];
						$puan=$recordset[$sayac]["puan"];
						$numara=$recordset[$sayac]["numara"];
						$dil=$recordset[$sayac]["dil"]; //echo $dil;
						switch ($dil)
							   {		
									case 1: $dil_aciklama="Türkçe"; break;
									case 2: $dil_aciklama="İngilizce"; break;
							   }						
						if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}				
						$uzanti_baslangic=strrpos($resim,".");
						$uzanti=substr($resim,$uzanti_baslangic+1);
				?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'" bgcolor="<? echo $tr_back; ?>"> 
                  <td class="aktif_tdler"><div align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" class="sselectedid"></div></td>
                  <td width="35%" height="30" valign="middle"><font class="veri_baslik"><? echo $ad; ?></font></td>
                  <td width="7%" align="center" valign="middle"><font class="veri_baslik"><? print ($dil_aciklama);?></font></td>
                  <td width="7%" valign="middle" align="center"><a href="duzenle.php?numara=<? print($numara);?>"><img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0"></a></td>                  <td width="9%" valign="middle">
  				  <div align="center">
    				<?
					if  ($resim=='') {$resim=$default_resim; }
					if  ($resim<>$default_resim) 
					    { 
					?> 
                    <a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.png" width="29" height="29" border="0"></a>
                    <? 
						} 
					?>
  </div></td>
 <td width="6%" align="center" valign="middle"><? if ($resim!='resimyok.gif' && file_exists($resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
                    <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $byk_m_w; ?>&h=<? echo $byk_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="veri_baslik"><img src="../../rsmlr/crop2.png"  alt="B&uuml;y&uuml;k Resmi Yeniden Boyutlandır" width="24" height="25" title="B&uuml;y&uuml;k Resmi Yeniden Boyutlandır" border=0></a>
                    <? } } ?></td>
                  <td width="7%" align="center" valign="middle"><? if ($resim<>"resimyok.gif" && file_exists($thumb_resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
                    <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi_thumb; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop3.png" width="18" height="19" alt="K&uuml;&ccedil;&uuml;k Resmi Yeniden Boyutlandır" title="K&uuml;&ccedil;&uuml;k Resmi Yeniden Boyutlandır" border=0></a>
                  <? } } ?></td>
                  <td width="8%" valign="middle">
					<? 
					if  ($resim<>$default_resim) 
						{ 
					?>
					<a href="kontrol_islem.php?item=<? print($numara);?>&page=<? print $sayfa_no; ?>" class="resim_sil">Resim Sil</a>
					<? 
						} 
					?>				</td>
                  <td width="13%" valign="middle"><div align="center">
                  <a href="../hakkinda_detay/kontrol.php?haber_no=<? print($numara); ?>"><font class="altkategori">HAKKINDA DETAY</font></a></div></td>
				</tr>
				<?
					  }
				?>
              </table>
            </td>
          </tr>
          <tr> 
            <td><table width="942" border="0" cellpadding="3" cellspacing="3">
                <tr>
                  <td height="46" valign="bottom"><table width="292" border="0" cellspacing="0" cellpadding="0">
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
					<input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil"   value=" Sil ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle"   value="Ekle">
                   </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
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
                  <tr> 
                    <td height="61" valign="middle" bgcolor="#FFFFFF"><div align="center">
                      <p>&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p>
                        <input name="ilkkayit" type="hidden" id="ilkkayit" value="<? print $limit_ilk_deger; ?>">
                        <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle"  value="Ekle">
                      </p>
                      <p>&nbsp; </p>
                    </div></td>
                  </tr>
              </table>
            </div> 
            </td>
          </tr>
<?
      }
?>
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
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>