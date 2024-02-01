<? session_start();
$link_inherit="kontrol.php";
include("config.php");	
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
	  include($uzaklik."inc_s/sayfa_no_belirle.php");
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
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">body {	background-color:#EFEFEF; margin-left:0px;	margin-top:0px;	margin-right:0px;	margin-bottom:0px;} .style3 {color: #132C6A;font-weight: bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
  <tr> 
    <td class="td_anabaslik" style="padding-left:10px;"><? /*<a href="../anaframe.php" class="td_anabaslik_link" >Kontrol Panel</a> &gt; <a href="kontrol.php"  class="td_anabaslik_link">Bankalar</a> &gt;*/?><? include("../inc_s/inc_diger_menu.php"); ?></td>
  </tr>
</table>
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="5" bgcolor="#FFFFFF">
  <tr> 
<form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" class="altkategori"><img src="../_img/panel_19.png" width="38" height="38" align="absmiddle"/> <strong>Dosyalar</strong></td>
        </tr>
<?
if  ( $toplam_kayit_sayisi>0)
    {
?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
				<? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="8" align="center"><div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? include("navigation.php"); ?></font></div></td>
                </tr>
				<? } ?>
                <tr>
                  <td width="3%" align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aktif</font></td> 
                  <td width="3%" align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></td>
                  <td height="25"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Dosya</strong></font></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eklenme Tarihi</strong></font></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Yüklenme Tarihi</strong></font></td>
                  <td height="25">&nbsp;</td>
                  <td height="25">&nbsp;</td>
                  <td height="25">&nbsp;</td>
                </tr>
				 <?
				 for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					 {
						$dosya=$recordset[$sayac]["dosya"];
						$ad=$recordset[$sayac]["ad"];
						$aktif=$recordset[$sayac]["aktif"];
						$numara=$recordset[$sayac]["numara"];
						$eklenme_tarihi=$recordset[$sayac]["eklenme_tarihi"];
						$eklenme_tarihi2=substr($eklenme_tarihi,8,2)."/".substr($eklenme_tarihi,5,2)."/".substr($eklenme_tarihi,0,4)." ".substr($eklenme_tarihi,11,5);
						$yuklenme_tarihi=$recordset[$sayac]["yuklenme_tarihi"];
						if  ($yuklenme_tarihi<>"0000-00-00 00:00:00" && $yuklenme_tarihi<>"")
							{
								$yuklenme_tarihi2=substr($yuklenme_tarihi,8,2)."/".substr($yuklenme_tarihi,5,2)."/".substr($yuklenme_tarihi,0,4)." ".substr($yuklenme_tarihi,11,5);
							}
						else
							{
								$yuklenme_tarihi2="-";
							}
				?>
                <tr>
                  <td class="aktif_tdler" align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>"></td> 
                  <td class="sil_tdler" align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>"></td>
                  <td width="33%" valign="middle" bgcolor="#F7F7F7"><font class="veri_baslik">&nbsp;<strong><? echo $ad; ?></strong></font></td>
                  <td width="15%" valign="middle" bgcolor="#F7F7F7"><font class="veri_baslik">&nbsp;<? echo $eklenme_tarihi2; ?></font></td>
                  <td width="14%" valign="middle" bgcolor="#F7F7F7"><font class="veri_baslik">&nbsp;<? echo $yuklenme_tarihi2; ?></font></td>
                  <td width="7%" valign="middle" bgcolor="#F7F7F7" align="center"><a href="<? print($dosya_dizini.$dosya); ?>" target="_blank" title="İndirmek için tıklayınız"><img src="../_img/downloadicon.png" width="40" height="44" border="0" align="absmiddle"></a></td>
                  <td width="15%" align="center" valign="middle" bgcolor="#F7F7F7" class="veri_detay">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td height="40" align="center"  class="veri_detay" style="cursor:pointer;" title="Listeyi Borç Tablosuna Aktar" onClick="javascript:if (confirm('<? if  ($yuklenme_tarihi<>"0000-00-00") { ?>Sisteme daha önce yüklediğiniz veriler yeniden sisteme borç olarak kaydedilecek. Devam etmek istediğinizden emin misiniz?<? } else { ?>Sisteme yüklediğiniz dosyadaki veriler sisteme borç olarak kaydedilecek. Devam etmek istediğinizden emin misiniz?<? } ?>')) { window.open('import_list.php?id=<? echo $numara; ?>'); }"><strong>Listeyi Borç Tablosuna Aktar</strong></td>
                      </tr>
                      <tr>
                        <td height="40" align="center"  class="veri_detay" style="cursor:pointer;" title="Listeyi Üyeler Tablosuna Yükle" onClick="javascript:if (confirm('<? if  ($yuklenme_tarihi<>"0000-00-00") { ?>Sisteme daha önce yüklediğiniz veriler ile çakışan veriler yeniden sisteme yüklenmeyecek. Devam etmek istediğinizden emin misiniz?<? } else { ?>Sisteme yüklediğiniz dosyadaki veriler üyeler tablosuna kaydedilecek. Devam etmek istediğinizden emin misiniz?<? } ?>')) { window.open('import_uyeler.php?id=<? echo $numara; ?>'); }"><strong>Listeyi Üyeler Tablosuna Aktar</strong></td>
                      </tr>
                  </table></td>
                  <td width="10%" align="center" valign="middle" bgcolor="#F7F7F7"><a href="duzenle.php?numara=<? print($numara);?>" class="link_faaliyet" title="Düzenlemek İçin Tıklayınız">
				  <img src="../_img/edit.png" alt="Düzenle" width="25" height="24" border="0"></a></td>
                </tr>
				<?
				 	 }
				?>
            </table> </td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
                <tr> 
                  <td height="46" valign="bottom"><input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle">
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>"></td>
                </tr>
                <tr>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td height="40" valign="middle" class="veri_detay" style="line-height:18px;"><strong>Not: </strong>Sisteme aktarılcak <strong>.xlsx</strong> formatındaki borç listelerinin sisteme aktarılabilmesi için borçların sistemde tanımlı ödeme kategorilerinin numarası ile ilişkilendirildiği bir sütun eklenmesi gerekmektedir. </td>
                </tr>
                <tr><td valign="middle">&nbsp;</td></tr>
                <tr><td valign="middle">&nbsp;</td></tr>
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
                    <td  height="150" valign="middle" bgcolor="#FFFFFF"><div align="center"> 
                        <p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p><span class="kayit_yok">Bu Kategoride Kayıt Bulunamamıştır</span><br>
						</p>
						<p>&nbsp;</p>
						<p>&nbsp;</p>
						<p><br>
					    </p>
						<p><span class="kayit_yok">
						  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
						</span>
						  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle">
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
      <tr>
        <td><table width="500" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" colspan="2"><strong class="veri_baslik">Mevcut Ödeme Kategorileri</strong></td>
            </tr>
          <tr class="veri_detay">
            <td height="10" colspan="2" align="center" bgcolor="#f9f9f9"></td>
            </tr>
<? 
$odeme_kategorileri=@$baglanti->query("Select * from odeme_kategorileri order by puan asc")->fetchAll(PDO::FETCH_ASSOC);
$odeme_kategorileri_sayi=count($odeme_kategorileri);
for ($sayac=0; $sayac<$odeme_kategorileri_sayi; $sayac++)
	{
		$kategori_numara=$odeme_kategorileri[$sayac]["numara"];
		$kategori_ad=$odeme_kategorileri[$sayac]["ad"];
?>          
          <tr class="veri_detay">
            <td width="28" height="25" align="center" bgcolor="#f9f9f9">&bull;</td>
            <td width="472" height="25" bgcolor="#f9f9f9"><strong><? echo $kategori_ad; ?></strong></td>
          </tr>
<? 
		$odeme_altkategorileri=@$baglanti->query("Select * from odeme_altkategorileri where kategori='$kategori_numara' order by puan asc")->fetchAll(PDO::FETCH_ASSOC);	
		$odeme_altkategorileri_sayi=count($odeme_altkategorileri);
		for ($isayac=0; $isayac<$odeme_altkategorileri_sayi; $isayac++)
			{
				$altkategori_numara=$odeme_altkategorileri[$isayac]["numara"];
				$altkategori_ad=$odeme_altkategorileri[$isayac]["ad"];
?>          
          <tr class="veri_detay">
            <td height="25" bgcolor="#f9f9f9">&nbsp;</td>
            <td height="25" bgcolor="#f9f9f9"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr class="veri_detay">
                <td width="8%"><strong><? echo $altkategori_numara; ?></strong></td>
                <td width="92%" height="25"><? echo $altkategori_ad; ?></td>
              </tr>
            </table></td>
          </tr>
<? 
			}
	}
	
?>          
          <tr class="veri_detay">
            <td height="10" colspan="2" align="center" bgcolor="#f9f9f9"></td>
            </tr>
        </table></td>
      </tr>
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
<? 
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>