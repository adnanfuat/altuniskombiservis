<? session_start();
$link_inherit="kontrol.php";
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
if  (isset($_SESSION['yonet']))
    {
	  	if  (isset($_GET['haber_no']))
		  	{
		  		unset($_SESSION[$tablo_ismi.'haber_no']);	
				$haber_no=$_GET['haber_no'];
				$_SESSION[$tablo_ismi.'haber_no']=$haber_no;
			}
     	else
		    {
		    	$haber_no=$_SESSION[$tablo_ismi.'haber_no'];
		    }
		  include($uzaklik."inc_s/sayfa_no_belirle.php");
		 // $syonetim=$_SESSION["siteyonetici"];
		  if (isset($_SESSION[$tablo_ismi.'icerik'])) {unset($_SESSION[$tablo_ismi.'icerik']);}
		  if (isset($_SESSION[$tablo_ismi.'radyo'])) {unset($_SESSION[$tablo_ismi.'radyo']);}
		  include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		  include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		  $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		  $sql_cumlesi="select numara from $tablo_ismi where haber_no='$haber_no'";
		  $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		  $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		  include($uzaklik."inc_s/sayfalama.php");
		  sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
		  $sql_cumlesi="select * from $tablo_ismi where haber_no='$haber_no' order by numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
		  $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		  $toplam_kayit_sayisi=count($recordset);
		  $kategori_no=$_SESSION[$ustkategori_tablo_ismi."kategori"];
		  $haber_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_ismi where numara='$haber_no'")->fetchAll(PDO::FETCH_ASSOC);
		  if (count($haber_adi_ogren)>0) 
			 {
					$haber_adi=$haber_adi_ogren[0]["ad"];
			 }
		  else
			 {
				  header("Location:../haberler/kontrol.php"); 	
			 }	
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? print($title); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style1 {color: #FF6600;font-weight: bold;}.style3 {color: #132C6A;font-weight: bold;}.style5 {color: #D24400;font-weight: bold;}.style6 {color: #333333;font-weight: bold;font-size: 10px;}
.style8 {color: #666666;font-weight: bold;}.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif;}</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="center"><img src="../pictures/ana_dok.gif" width="48" height="48"></div></td>
    <td width="902" valign="middle" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../hakkinda/kontrol.php" class="veri_ana_baslik">Hakkında (<? echo $haber_adi; ?>)</a> &gt;</font></td>
  </tr>
</table>
<table width="950" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
<tr> 
    <td  align="left" valign="top">
	<form  name="xxx" action="kontrol_islem.php" method="post">	  
	<table width="942" border="0" cellpadding="0" cellspacing="0">
     <tr><td class="anabaslik">Hakkında Detayları</td></tr>
	<?
	if  ($toplam_kayit_sayisi>0)
		{
	?>
		  <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="7"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? } else { ?>
				<tr>
                  <td colspan="7" height="15"></td>
                </tr>
				<? } ?>
                <tr> 
                  <td height="30" colspan="7">
					<input name="sil2" type="submit" id="sil2" class="dugmeler_sil"   value=" Sil ">
                    <input name="ekle2" type="submit" id="ekle2" class="dugmeler_ekle"   value="Ekle">
                  </td>
                </tr>
                <tr>
                  <td width="5%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></td> 
                  <td width="60%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Hakkında Detayları</strong></font></td>
                  <td width="8%">&nbsp;</td>
                  <td colspan="3">&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                </tr>
				<? $klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
				$klasor_adi_thumb=substr($kategori_thumb_resim_dizini,strrpos(substr($kategori_thumb_resim_dizini,0,-1),"/",-1)+1,-1);
				for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					{
						$icerik=$recordset[$sayac]["icerik"]; if (strlen($icerik)>400) { $icerik=substr($icerik,0,400).".."; }
						$resim=$recordset[$sayac]["resim_adres"];
						$numara=$recordset[$sayac]["numara"];
						if ($resim=='') {$resim=$default_resim; }
						if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}	
						$uzanti_baslangic=strrpos($resim,".");
						$uzanti=substr($resim,$uzanti_baslangic+1);
				?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>">
                  <td class="sil_tdler"><div align="center">
                    <input name="silinecekler_numara[<? print($numara);?>]" id="silinecekler_numara[<? print($numara);?>]" type="checkbox" value="<? print($numara);?>" class="sselectedid">
                  </div></td>
                  <td valign="middle"><font class="veri_baslik"><? print(strip_tags($icerik)); ?></font></td>
                  <td valign="middle" bgcolor="#FFFFFF"><div align="center"><a href="duzenle.php?detay_no=<? print($numara);?>"><img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0"></a></div></td>
                  <td valign="middle"><div align="center">
                    <? if  ($resim=='') {$resim=$default_resim; }
					if  ($resim<>$default_resim) 
					    { 
					?>
                    <a href="<? print($kategori_thumb_resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.png" width="29" height="29" border="0"></a>
                    <? 
						} 
					?>
                  </div></td>
                  <td align="center"><? if ($resim!='resimyok.gif' && file_exists($resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
                    <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $byk_m_w; ?>&h=<? echo $byk_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="veri_baslik"><img src="../../rsmlr/crop2.png"  alt="B&uuml;y&uuml;k Resmi Yeniden Boyutlandır" width="24" height="25" title="B&uuml;y&uuml;k Resmi Yeniden Boyutlandır" border=0></a>
                    <? } } ?></td>
                  <td align="center"><? if ($resim<>"resimyok.gif" && file_exists($kategori_thumb_resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
                    <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi_thumb; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop3.png" width="18" height="19" alt="K&uuml;&ccedil;&uuml;k Resmi Yeniden Boyutlandır" title="K&uuml;&ccedil;&uuml;k Resmi Yeniden Boyutlandır" border=0></a>
                  <? } } ?></td>
				  <td><? if ($resim<>$default_resim) { ?>
                    <a href="kontrol_islem.php?item=<? print($numara);?>&sayfa=<? echo $sayfa_no; ?>" class="resim_sil"> Resim Sil </a>
                    <? } ?></td>
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
                  <td height="46" valign="bottom"><table width="246" border="0" cellspacing="0" cellpadding="0">
                    <tr>
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
					<input name="sil" type="submit" id="sil" class="dugmeler_sil"   value=" Sil ">
                    <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle"   value="Ekle">
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
                  <tr> 
                    <td  height="61" valign="middle" bgcolor="#FFFFFF">
					<div align="center">
                      <p>&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır.</p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p>
                        <input name="ilkkayit" type="hidden" id="ilkkayit" value="<? print $limit_ilk_deger; ?>">
                        <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle"  value="Ekle">
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
        </table> 
	  </form>
      </td>
  </tr>
</table>
<br>
<br>
</body>
</html>
<script>
function isChecked(checkboxId) { var id = '#' + checkboxId; return $(id).is(":checked"); }
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