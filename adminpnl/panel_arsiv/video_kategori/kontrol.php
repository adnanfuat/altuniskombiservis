<? session_start();
$link_inherit="kontrol.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
	    include($uzaklik."inc_s/baglanti.php");
		include($uzaklik."inc_s/sayfa_no_belirle.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
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
<style type="text/css">.style3 {color: #132C6A;font-weight: bold;}
.style5 {color: #D24400;font-weight: bold;}
.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="center"><img src="../pictures/encumen.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</span></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
	  <form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top">
	  <table width="100%" border="0" cellspacing="5" cellpadding="5">
<?
    if  ( $toplam_kayit_sayisi>0)
        {
?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
               <tr>
                 <td colspan="9" class="anabaslik">Video Kategorileri</td>
               </tr>
			   <? if ($toplam_sayfa_sayisi>0) { ?>
				<tr>
                  <td colspan="9"><div align="center">
                    <table width="100%">
                      <tr>
                        <td height="25"><div align="right"><? include("navigation.php"); ?></div></td>
                        </tr>
                    </table>
                  </div></td>
                </tr>
				<? } ?>
                <tr> 
                  <td width="5%"><div align="left" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Ak.</font></div>
                  </div></td>
                  <td width="5%"><div align="center" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div>
                  </div></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Kategori Adı </strong></font></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  
                  <td width="17%">&nbsp;</td>
                </tr>
				<?
				   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
						 {
							$ad=$recordset[$sayac]["ad"];
							$resim=$recordset[$sayac]["resim_adres"];
				    		if ($resim=='') {$resim='resimyok.gif'; }
							resim_yeniden_boyutlandir($resim_dizini,$resim,$height_of_image,$width_of_image);
							$aktif=$recordset[$sayac]["aktif"];
							$puan=$recordset[$sayac]["puan"];
							$numara=$recordset[$sayac]["numara"];
							if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}				
				?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td height="40" class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                    </div>                    </td>
                  <td width="29%" valign="middle"><font class="veri_baslik"><strong><? print($ad); ?></strong></font></td>
                  <td width="6%" valign="middle"><div align="center" class="veri_detay"><? echo $puan; ?></div></td>
				  <td width="21%" valign="middle"><div align="center"><span class="style10"> <a href="../video/kontrol.php?kategori=<? print($numara); ?>" class="veri_baslik">VİDEOLAR</a></span></div></td>
				  <td width="7%"><div align="center"><a href="<? print($resim_dizini.$resim); ?>" target="_blank">
				  <img src="<? print($resim_dizini.$resim); ?>" width="<? print($yeni_genislik);?>" height="<? print($yeni_yukseklik);?>" border="0"></a></div></td>
                  <td width="10%">
                  <div align="center"><? if ($resim!='resimyok.gif') { ?>
				  <a href="kontrol_islem.php?item=<? print($numara);?>&sayfa=<? echo $sayfa_no; ?>" class="resim_sil">Resim Sil </a><? } ?></div>				  </td>
                  <td><div align="center"><a href="duzenle.php?numara=<? print($numara);?>" class="duzenle">
				  <img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0">
				  </a></div></td>
                </tr>
					<?
						  }
					?>
            </table> 
            </td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>">
					<input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle">
				  </td>
                </tr>
                <tr>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="middle">&nbsp;</td>
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
                    <td height="61"><div align="center">
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
                    </div></td>
                  </tr>
                </table>
              </div> </td>
          </tr>
<?
   }
?>
      </table>
      </td>
</form>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<? 
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include('error.php');
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>