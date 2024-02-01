<?	session_start();
$link_inherit="kontrol.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
		if (isset($_SESSION[$tablo_ismi.'ozet'])) {unset($_SESSION[$tablo_ismi.'ozet']);}
		if (isset($_SESSION[$tablo_ismi.'aciklama'])) {unset($_SESSION[$tablo_ismi.'aciklama']);}
		if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
	    include($uzaklik."inc_s/baglanti.php");
		include($uzaklik."inc_s/sayfa_no_belirle.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		//$syonetim=$_SESSION["siteyonetici"];
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		$sql_cumlesi="select numara from $tablo_ismi'";
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
<style type="text/css">body {background-color: #EFEFEF;margin-left: 0px;margin-top: 0px;margin-right: 0px;margin-bottom: 0px;}.style3 {color: #132C6A;font-weight: bold;}.style5 {color: #D24400;font-weight: bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</font></td>
  </tr>
</table>
<table width="950" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
     <form  name="xxx" action="kontrol_islem.php" method="post">
      <td  align="left" valign="top">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		  <td class="anabaslik">Bilgiler</td>
		</tr>
         <?
            if  ( $toplam_kayit_sayisi>0)
                {
         ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="3" cellpadding="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
                <tr>
                  <td colspan="8"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
                <? } else { ?>
                <tr><td colspan="8" height="15"></td></tr>
                <?  } ?>
                <tr> 
                  <td height="30" colspan="8">
					<input name="aktiflestirme2" type="submit" id="aktiflestirme2" class="dugmeler_aktif" value="Aktif">
                    <input name="sil2" type="submit" id="sil2"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle2" type="submit" id="ekle2"  class="dugmeler_ekle" value="Ekle">                  </td>
                </tr>
                <tr> 
                  <td width="5%"><div align="left" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ak.</font></div></div></td>
                  <td width="5%"><div align="center" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></div></td>
                  <td colspan="3"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? echo $kategori ?> Adı </strong></font></td>
                  <td colspan="2">&nbsp;</td>
                  <td width="7%">&nbsp;</td>
                </tr>
				 <?
                   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                         {
                            $ad=$recordset[$sayac]["ad"];
                            $detay=$recordset[$sayac]["detay"];		
                            $detay=stripslashes($detay);
                            $resim=$recordset[$sayac]["resim_adres"];
                            $aktif=$recordset[$sayac]["aktif"];
                            $numara=$recordset[$sayac]["numara"];
							$dil=$recordset[$sayac]["dil"];
							switch ($dil)
								{		
									case 1: $dil_aciklama="Türkçe"; break;
									case 2: $dil_aciklama="İngilizce"; break;
								} 
							$bilgikategori=$recordset[$sayac]["bilgikategori"];
							switch ($bilgikategori)
								{		
									case 1: $bilgikategori_aciklama="Mühendislik ve Danışmanlık"; break;
									case 2: $bilgikategori_aciklama="Tip Onay ve Araç Proje"; break;
									case 3: $bilgikategori_aciklama="Çevre Danışmanlık"; break;
									case 4: $bilgikategori_aciklama="İnşaat ve Taahhüt"; break;
									case 5: $bilgikategori_aciklama="Eğitim ve Belgelendirme"; break;
									case 6: $bilgikategori_aciklama="Araç Kiralama"; break;
								}
                            if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}				
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td class="aktif_tdler"><div align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]"  id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" class="sselectedid"></div></td>
                  <td width="36%" valign="middle" ><font class="veri_baslik"><? print($ad); ?></font></td>
                  <td width="23%" align="center" valign="middle" ><font class="veri_baslik"><strong><? print($dil_aciklama); ?> </strong><br>
<? print($bilgikategori_aciklama); ?></font></td>
                  <td width="9%" valign="middle"><? if (1==5) {  ?><div align="center"><a href="../bilgi_resim/kontrol.php?kategori=<? print($numara); ?>" class="veri_baslik"><strong>RESİMLER</strong></a></div><? } ?></td>
                  <? 
					if ($resim=='') {$resim='resimyok.gif'; }
					resim_yeniden_boyutlandir($resim_dizini,$resim,$height_of_image,$width_of_image);	
					?>
				  <td width="6%"><div align="center">
                  <? if ($resim<>'resimyok.gif') { ?>
                  <a href="<? print($resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/icon_video.gif" width="20" height="14" border="0"></a>
                  <? } ?>
                  </div></td>
                  <td width="9%">
				  <? if ($resim<>'resimyok.gif'){ ?><a href="kontrol_islem.php?item=<? print($numara);?>&sayfa=<? echo $sayfa_no; ?>" class="resim_sil">Resim Sil</a><? } ?></td>
                  <td><div align="center">
                  <a href="duzenle.php?numara=<? print($numara);?>" class="duzenle"><img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0"></a></div></td>
                </tr>
				<?
                         }
                ?>
            </table></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="3" cellspacing="3">
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
					<input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle">                  </td>
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