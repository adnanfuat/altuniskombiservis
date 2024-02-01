<? session_start();
$link_inherit="kontrol.php";
include("config.php");
if  (isset($_SESSION['yonet']))
  	{
	  if  (isset($_GET['alt_kategori']))
		  {
	  		  unset($_SESSION['alt_kategori']);	
			  $altkategori=$_GET['alt_kategori'];
			  $_SESSION['alt_kategori']=$altkategori;
		  }
      else
	      {
	    	  $altkategori=$_SESSION['alt_kategori'];
	      }
	  if  (isset($_GET['ust_kategori']))
	  	  {
	  		  unset($_SESSION['ust_kategori_no']); 
			  $ustkategori_no=$_GET['ust_kategori'];
			  $_SESSION['ust_kategori_no']=$ustkategori_no;
		  }
      else
	     {
			$ustkategori_no=$_SESSION['ust_kategori_no'];
	     }
	  include($uzaklik."inc_s/baglanti.php");  
	  //$syonetim=$_SESSION["siteyonetici"];
	  include($uzaklik."inc_s/sayfa_no_belirle.php");
	  include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");	
	  include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
	  unset($_SESSION[$tablo_ismi.'ad']);	
	  unset($_SESSION[$tablo_ismi.'aciklama']);
	  unset($_SESSION[$tablo_ismi.'puan']);	
	  unset($_SESSION[$tablo_ismi.'hata']);
	  $ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=".$ustkategori_no)->fetchAll(PDO::FETCH_ASSOC);
	  $ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
	  $altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=".$altkategori)->fetchAll(PDO::FETCH_ASSOC);
	  $altkategori_adi=$altkategori_adi_ogren[0]["ad"];
	  $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
	  $sql_cumlesi="select numara from $tablo_ismi where altkategori_no='$altkategori'";
	  $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
	  $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
	  include($uzaklik."inc_s/sayfalama.php");
      sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	  $sql_cumlesi="select * from $tablo_ismi where ustkategori_no=$ustkategori_no and altkategori_no=$altkategori order by puan asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
	  $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
   	  $toplam_kayit_sayisi=count($recordset);
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html;  charset=utf-8">
<style type="text/css">body {background-color: #EFEFEF;margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;}.style3 {color: #132C6A;font-weight: bold;}.style5 {color: #D24400;font-weight: bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<script src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik">
	<font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt; <a href="../proje_kategori/kontrol.php" class="veri_ana_baslik">Uygulama Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt;	<a href="../proje_altkategori/kontrol.php" class="veri_ana_baslik">Uygulama Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt;</font>    </td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
<tr> 
	 <form  name="xxxy" action="kontrol_islem.php" method="post">
      <td align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="anabaslik">Uygulamalar</td>
        </tr>
		<?
        if ($toplam_kayit_sayisi>0)
           {
        ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
                <tr>
                  <td colspan="12"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
                <? } else { ?>
                <tr><td colspan="12" height="15"></td></tr>
                <? } ?>
                <tr> 
                  <td height="30" colspan="12">
				  <input name="tasi2" type="submit" id="tasi2" class="dugmeler_tasima" value="Taşı">
				  <input name="aktif2" type="submit" id="aktif2" class="dugmeler_aktif" value="Aktif">
                  <input name="sil2" type="submit" id="sil2" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle2" type="submit" id="ekle2" class="dugmeler_ekle" value="Ekle">
                  <? /*
                  <input name="hekle2" type="submit" id="hekle2" class="dugmeler_ekle" value="Hızlı Ekle">  */ ?>                  </td>
                </tr>
                <tr>
                  <td width="5%"><div align="center"><span class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Taşı </font></span></div></td> 
                 
                  <td width="5%"><div  align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Ak.</font></div></td>
                  <td width="5%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Sil</font></div></td>
                  <td width="29%"><div align="left" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? echo $kategori ?> Adı</font></div></td>
                  <td width="13%"><div align="center"><span class="veri_baslik">
                    <? if ($resim!='resimyok.gif'  && file_exists($resim_dizini_ortaboy.$resim) && 1==2) { ?>
                    <a href="kontrol_islem.php?item=<? print($numara);?>&sayfa=<? echo $sayfa_no; ?>" class="resim_sil">Resim Sil </a>
                    <? } ?>
                  </span></div></td>
                  <td width="5%" align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><span class="style3">Puan</span></font></td>
                  <td width="7%">&nbsp;</td>
                  <td>&nbsp;</td>
                  <td width="8%">&nbsp;</td>
                  <td width="7%">&nbsp;</td>
                  <td width="6%">&nbsp;</td>
                </tr>
				<? $klasor_adi_ortaboy=substr($resim_dizini_ortaboy,strrpos(substr($resim_dizini_ortaboy,0,-1),"/",-1)+1,-1);
				$klasor_adi_thumb=substr($thumb_resim_dizini,strrpos(substr($thumb_resim_dizini,0,-1),"/",-1)+1,-1);
				$klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
                for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                    {
                        $ad=stripcslashes($recordset[$sayac]["ad"]);
                        $resim=$recordset[$sayac]["resim_adres"];
                        $tarih=$recordset[$sayac]["eklenme_tarihi"];
                        $tarih=substr($tarih,6,2)."/".substr($tarih,4,2)."/".substr($tarih,0,4);
                        $numara=$recordset[$sayac]["numara"];	
                        $aktif=$recordset[$sayac]["aktif"];
                        $puan=$recordset[$sayac]["puan"];
						$vitrin=$recordset[$sayac]["vitrin"];
                        if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}	
						$uzanti_baslangic=strrpos($resim,".");
						$uzanti=substr($resim,$uzanti_baslangic+1);
                        if ($resim=='') {$resim='resimyok.gif'; }
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'" bgcolor="<? echo $tr_back; ?>">
                  <td height="45" class="tasima_tdler" align="center"><input  name="tasino[<? print($numara);?>]" id="tasino[<? print($numara);?>]" type="checkbox" value="<? print($numara);?>" class="tselectedid"></td> 
                 
                  <td class="aktif_tdler" align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></td>
                  <td class="sil_tdler" align="center"><input name="silinecekler_numara[<? print($numara);?>]" id="silinecekler_numara[<? print($numara);?>]" type="checkbox" value="<? print($numara);?>" class="sselectedid"></td>
                  <td><font class="veri_baslik">&nbsp;<? echo $ad; ?></font></td>
                  <td><? if (1==1) { ?><div align="center"><a href="../projeresim/kontrol.php?numara=<? print($numara);?>" class="resim_sil"> DİĞER RESİMLERİ</a></div> <? } ?></td>
                  <td ><div align="center"><font class="veri_baslik"><? print($puan); ?></font></div></td>
                  <td><div align="center"><a href="duzenle.php?item=<? print($numara);?>" class="duzenle">
                  <img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0"></a></div></td>
                  <td width="5%" align="center"><span class="veri_baslik">
					<? if ($resim!='resimyok.gif' && file_exists($resim_dizini_ortaboy.$resim)) 
                          { 
                    ?>
                    <a href="<? print($resim_dizini_ortaboy.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.png" width="29" height="29" border="0" title="Resmi Gör"  alt="Resmi Gör"></a>
					<? 
                         } 
                    ?>
                  </span></td>
				  <td width="8%" align="center"><? if ($resim!='resimyok.gif' && file_exists($resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?><a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $byk_m_w; ?>&h=<? echo $byk_m_h; ?>&kat=1.5" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )" class="veri_baslik"><img src="../../rsmlr/crop1.png" width="32" height="33" alt="Büyük Resmi Yeniden Boyutlandır" title="Büyük Resmi Yeniden Boyutlandır" border=0></a><? } } ?></td>
                  <td width="7%" align="center"><? if ($resim!='resimyok.gif' && file_exists($resim_dizini_ortaboy.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?><a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi_ortaboy; ?>&w=<? echo $byk_m_w; ?>&h=<? echo $byk_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop2.png" width="24" height="25" alt="Ortaboy Resmi Yeniden Boyutlandır" title="Ortaboy Resmi Yeniden Boyutlandır" border=0></a><? } } ?></td>
                  <td width="6%" align="center"><? if ($resim<>"resimyok.gif" && file_exists($thumb_resim_dizini.$resim)) { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?><a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi_thumb; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop3.png" width="18" height="19" alt="Küçük Resmi Yeniden Boyutlandır" title="Küçük Resmi Yeniden Boyutlandır" border=0></a><? } } ?></td>
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
                  <table width="384" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="46" height="30" align="center" class="tasima_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="tselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td width="47" align="center" class="aktif_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="aselectall" type="checkbox"></td>
                      <td width="4"></td>
                      <td width="46" align="center" class="sil_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="sselectall" type="checkbox"></td>
                      <td width="5"></td>
                      <td width="233" class="veri_detay"><strong>Tümünü Seç/Seçimi Kaldır</strong></td>
                    </tr>
                  </table>
                  </td>
                </tr>
                <tr> 
                  <td height="46" valign="bottom">
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
				  <input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				  <input name="tasi" type="submit" id="tasi" class="dugmeler_tasima" value="Taşı">
				  <input name="aktif" type="submit" id="aktif" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle">
                  <? /*
                  <input name="hekle" type="submit" id="hekle" class="dugmeler_ekle" value="Hızlı Ekle"> */ ?>
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
                <td height="61" valign="middle" bgcolor="#FFFFFF">
                <div align="center"> 
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır.</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p>
                      <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
                      <input name="ekle" type="submit" class="dugmeler_ekle" id="ekle"  value="Ekle">
                      <input name="hekle" type="submit" class="dugmeler_ekle" id="hekle"  value="Hızlı Ekle">
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
</body>
</html>
<script>
function isChecked(checkboxId) { var id = '#' + checkboxId; return $(id).is(":checked"); }
$('#tselectall').on('click', function() {$('.tselectedid').prop('checked', isChecked('tselectall')); });
$('#vselectall').on('click', function() {$('.vselectedid').prop('checked', isChecked('vselectall')); });
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