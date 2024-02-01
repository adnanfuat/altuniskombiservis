<? session_start();
$link_inherit="kontrol.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'siralama'])) {unset($_SESSION[$tablo_ismi.'siralama']);}
		if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
		if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) {unset($_SESSION[$tablo_ismi.'htaccess_etiket']);}
	    include($uzaklik."inc_s/baglanti.php");
		include($uzaklik."inc_s/sayfa_no_belirle.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		/*$syonetim=$_SESSION["siteyonetici"];
		$boyut_ogren=@$baglanti->query("Select galeri_kategori_genislik, galeri_kategori_yukseklik from parametreler  where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
		$boyut_ogren_sayi=count($boyut_ogren);
		if  ($boyut_ogren_sayi>0)
			{
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_genislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_yukseklik"];
			}
		else
			{
				$boyut_ogren=@$baglanti->query("Select galeri_kategori_vgenislik, galeri_kategori_vyukseklik from vparametreler where yonetim='$syonetim'")->fetchAll(PDO::FETCH_ASSOC);
				$boyut_ogren_sayi=count($boyut_ogren);
				$kck_m_w=$boyut_ogren[0]["galeri_kategori_vgenislik"];
				$kck_m_h=$boyut_ogren[0]["galeri_kategori_vyukseklik"];
			}*/
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		$sql_cumlesi="select numara from $tablo_ismi";
		$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		include($uzaklik."inc_s/sayfalama.php");
		sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
		$sql_cumlesi="select * from $tablo_ismi order by puan asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		$toplam_kayit_sayisi=count($recordset);
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.style3 {color:#132C6A;font-weight:bold;} .style5 {color:#D24400;font-weight:bold;} .style10 {color:#333333;font-weight:bold;font-size:10px;font-family:Verdana, Arial, Helvetica, sans-serif;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="center"><img src="../pictures/ana_galeri.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;</span></td>
  </tr>
</table>
<table width="950" align="center" bgcolor="#FFFFFF">
  <tr> 
      <form  name="xxx" action="kontrol_islem.php" method="post">
         <td align="left" valign="top">
	       <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr><td class="anabaslik">Galeri Kategorileri</td></tr>

			<?
                if  ( $toplam_kayit_sayisi>0)
                    {
            ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
			   <? 
			   		  if ($toplam_sayfa_sayisi>1) 
					  	 { 
			   ?>
				<tr>
                  <td colspan="8"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? 
						} else { 
				?>
				<tr>
                  <td colspan="8" height="15"></td>
                </tr>
				<? 
						} 
				?>
                <tr> 
                  <td height="30" colspan="8">
					<input name="aktiflestirme2" type="submit" id="aktiflestirme2" class="dugmeler_aktif" value="Aktif" >
                    <input name="sil2" type="submit" id="sil2"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle2" type="submit" id="ekle2"  class="dugmeler_ekle" value="Ekle" >				  </td>
                </tr>
                <tr> 
                  <td width="5%"><div align="left" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Ak.</font></div></div></td>
                  <td width="5%"><div align="center" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></div></td>
                  <td colspan="3"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? echo $kategori ?> Adı </strong></font></td>
                  <td width="11%">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
				<? $klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
				   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
						 {
							$ad=$recordset[$sayac]["ad"];
							$resim=$recordset[$sayac]["resim_adres"];
				    		if ($resim=='') {$resim='resimyok.gif'; }
							resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);
							$tarih=$recordset[$sayac]["eklenme_tarihi"];
							if ($tarih>20041215) {$tarih=substr($tarih,6,2)."/".substr($tarih,4,2)."/".substr($tarih,0,4);}
							$aktif=$recordset[$sayac]["aktif"];
							$numara=$recordset[$sayac]["numara"];
							$dil=$recordset[$sayac]["dil"];
							switch ($dil)
								{		
									case 1: $dil_aciklama="Türkçe"; break;
									case 2: $dil_aciklama="İngilizce"; break;
									case 3: $dil_aciklama="Almanca"; break;
									case 4: $dil_aciklama="Rusça"; break;
								} 
							if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}
							$uzanti_baslangic=strrpos($resim,".");
							$uzanti=substr($resim,$uzanti_baslangic+1);
				?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td height="40" class="aktif_tdler"><div align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]"  id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" class="sselectedid"></div></td>
                  <td width="31%" valign="middle" ><font class="veri_baslik"><? print($ad); ?> </font></td>
                  <td width="7%" valign="middle" ><font class="veri_baslik"><? print($dil_aciklama); ?> </font></td>
                  <td width="19%" valign="middle"><div align="center"><span class="style10"><a href="../galeri_altkategori/kontrol.php?ust_kategori_no=<? print($numara); ?>" class="veri_baslik">ALT KATEGORİLER</a></span></div></td>
                  <td align="center"><a href="duzenle.php?numara=<? print($numara);?>"><img src="../../rsmlr/duzenle.gif" alt="D&uuml;zenle" width="50" height="39" border="0"></a></td>
                  <td width="11%" align="center"><?  if ($resim<>"resimyok.gif") {?>
                    <a href="<? print($resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.png" width="29" height="29" border="0" title="Resmi G&ouml;r"  alt="Resmi G&ouml;r"></a>
                    <? } ?></td>
                  <td width="11%" align="center"><? if ($resim<>"resimyok.gif") {  if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
                    <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop2.png" width="24" height="25" alt="Resmi Yeniden Boyutlandır"  title="Resmi Yeniden Boyutlandır" border=0></a>
                    <? } } ?></td>
			    </tr>
				<?
                      }
                ?>
              </table>
            </td>
          </tr>
          <tr> 
            <td>
            <table width="100%" border="0" cellpadding="0" cellspacing="5">
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
                  </table>
                  </td>
                </tr>
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>">
					<input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif" >
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle"  >
				  </td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <tr><td>&nbsp;</td></tr>
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
                    <td  height="61" valign="middle" bgcolor="#FFFFFF"><div align="center">
                      <p>&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p class="style5">&nbsp;</p>
                      <p>
                        <input name="ilkkayit" type="hidden" id="ilkkayit" value="<? print $limit_ilk_deger; ?>" >
                        <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle"  value="Ekle" >
                      </p>
                      <p>&nbsp;</p>
                    </div>
                    </td>
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
<br>
<br>
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