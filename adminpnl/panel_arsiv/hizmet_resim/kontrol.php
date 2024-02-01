<? session_start();
  $link_inherit="kontrol.php";
  include("config.php");	  
  if  (isset($_SESSION['yonet']))
	  {
		if (isset($_GET["kategori"]))
		   {
			  $hizmet=$_GET["kategori"];
			  if (isset($_SESSION[$tablo_ismi."hizmet"])) { unset($_SESSION[$tablo_ismi."hizmet"]); }
			  $_SESSION[$tablo_ismi."hizmet"]=$hizmet;
		   }
		else
		   {
			  $hizmet=$_SESSION[$tablo_ismi."hizmet"]; 
		   }
	    include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

	    include($uzaklik."inc_s/sayfa_no_belirle.php");
	    include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
	    include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
	    unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'ad']);
	    unset($_SESSION[$tablo_ismi.'hata']);

	    $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
	    $sql_cumlesi="select numara from $tablo_ismi where kategori='$hizmet'";
	    $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
	    $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
	    include($uzaklik."inc_s/sayfalama.php");
	    sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	    $sql_cumlesi="select * from $tablo_ismi where kategori='$hizmet' order by siralama asc,numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
	    $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
	    $toplam_kayit_sayisi=count($recordset);
		$hizmet_ogren=@$baglanti->query("Select ad from hizmet_kategori where numara='$hizmet'")->fetchAll(PDO::FETCH_ASSOC);
		$hizmet_ad=$hizmet_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.style3 {color: #132C6A;	font-weight: bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/ilrehberi.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt; <a href="../hizmet_kategori/kontrol.php" class="veri_ana_baslik">Hizmet Kategorileri (<? echo $hizmet_ad; ?>)</a> &gt; </font>
    </td>
  </tr>
</table>
<table width="950" border="0" align="center" cellspacing="0" bgcolor="#FFFFFF">
  <tr> 
    <form  name="xxxy" action="kontrol_islem.php" method="post">
      <td  align="center" valign="top">
      	<table width="944" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="944" class="anabaslik">İlişkili Hizmetler</td>
          </tr>
          <tr> 
            <td>
            <table width="100%" border="0" cellspacing="3" cellpadding="3">
			<?
                if  ( $toplam_kayit_sayisi>0)
                    {
            ?>
			<?
                if  ( $toplam_sayfa_sayisi>1)
                    {
            ?>
                <tr>
                  <td colspan="7"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
             <? 
					} else {
			 ?>
             <tr><td colspan="7" height="15"></td></tr>
             <?
					}
			 ?>
                <tr>
                <tr> 
                  <td height="30" colspan="7">
				  <input name="aktif2" type="submit" id="aktif2" class="dugmeler_aktif" value="Aktif">
                  <input name="sil2" type="submit" id="sil2" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle2" type="submit" id="ekle2" class="dugmeler_ekle" value="Ekle"></td>
                </tr>
                  <tr><td width="5%"><div align="left" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ak.</font></div></div></td> 
                  <td width="5%"><div align="center" class="style3"><div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></div></td>
                  <td width="25%"><div align="center"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Resim</strong></font></div></td>
                  <td width="25%"><div align="center"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Ad</strong></font></div></td>
                  <td width="6%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Sıralama</strong></font></td>
                  <td width="13%">&nbsp;</td>
                  <td width="21%">&nbsp;</td>
                </tr>
				<?
                   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                         {
                            $aciklama=$recordset[$sayac]["aciklama"];
						              	$ad=$recordset[$sayac]["ad"];
                            $resim=$recordset[$sayac]["resim_adres"];
                            $siralama=$recordset[$sayac]["siralama"];
                            $numara=$recordset[$sayac]["numara"];	
                            $aktif=$recordset[$sayac]["aktif"];	
                            if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"  bgcolor="<? echo $tr_back; ?>">
                  <td class="aktif_tdler"><div align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]"  id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></div></td> 
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" id="silinecekler_numara[<? print($numara);?>]" type="checkbox" value="<? print($numara);?>" class="sselectedid"></div></td>
				  <? resim_yeniden_boyutlandir($thumb_resim_dizini,$resim,$kck_m_h,$kck_m_w); ?>
                  <td>
                    <div align="center">
				    <span class="veri_baslik"><img src="<? print $thumb_resim_dizini.$resim; ?>"  border="0" style="max-width:150px; "></span></div></td>
                  <td align="center" class="veri_detay"><? echo $ad; ?></td>
                  <td class="veri_detay"><div align="center"><? echo $siralama; ?></div></td>
                  <td><div align="center">
				    <span class="veri_baslik">
				    <? if ($resim!='resimyok.gif') { ?>
                    <a href="<? print($ortaboy_resim_dizini.$resim); ?>" target="_blank" >
					<img src="../../rsmlr/icon_video.gif" alt="Resmi Orjinal Boyutunda Görmek İçin Tıklayınız" width="20" height="14" border="0"></a>
                    <? } ?>
				    </span>
				   	  </div></td>
                  <td><div align="center"><a href="duzenle.php?item=<? print($numara);?>" class="duzenle">Düzenle</a></div></td>
                </tr>
				<?
                        }
                ?>
            </table></td>
          </tr>
          <tr> 
            <td><table width="944" border="0" cellpadding="3" cellspacing="3">
                <tr> 
                  <td height="46" valign="bottom">
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
				  <input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				  <input name="aktif" type="submit" id="aktif" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle"></td>
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
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p class="kayit_yok">&nbsp;</p>
                    <p>
                      <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >
                      <input name="ekle" type="submit" class="dugmeler_ekle" id="ekle" value="Ekle" >
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
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>