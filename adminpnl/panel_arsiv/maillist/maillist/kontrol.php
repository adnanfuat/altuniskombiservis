<?	session_start();
$link_inherit="kontrol.php";
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		if (isset($_GET["kategori"]) && is_numeric($_GET["kategori"]) )
		   {
				$kategori=$_GET["kategori"];
				unset($_SESSION[$tablo_ismi."kategori"]);
				$_SESSION[$tablo_ismi."kategori"]=$kategori;
			}
		else
			{
				$kategori=$_SESSION[$tablo_ismi."kategori"];
			}
	    include($uzaklik."inc_s/sayfa_no_belirle.php");
		if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']);}
		if (isset($_SESSION[$tablo_ismi.'eposta'])) {unset($_SESSION[$tablo_ismi.'eposta']);}
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		$sql_cumlesi="select numara from $tablo_ismi";
		$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		include($uzaklik."inc_s/sayfalama.php");
	    sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	    $sql_cumlesi="select * from $tablo_ismi order by numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
		$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
   	    $toplam_kayit_sayisi=count($recordset);
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.style3 {color: #132C6A;	font-weight: bold;}.style5 {color: #D24400;	font-weight: bold;}</style>
<link href="../../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><img src="../../pictures/beyazmasa.gif" width="48" height="48"></td>
    <td width="902" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</span></td>
  </tr>
</table>
<table width="950" align="center" cellspacing="0" bgcolor="#FFFFFF">
<tr> 
	  <form  name="xxx" action="kontrol_islem.php" method="post">
      <td  align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
	  <tr>
	    <td class="anabaslik">Mail Listesi</td>
	  </tr>
			<?
			if  ( $toplam_kayit_sayisi>0)
				{
			?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="6"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? } ?>
                <tr> 
                  <td width="5%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Ak.</font></div></td>
                  <td width="5%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Eposta</strong></font></td>
                  <td width="8%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Dil</strong></font></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
				<?
				for  ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					 {
						$numara=$recordset[$sayac]["numara"];
						$eposta=$recordset[$sayac]["eposta"];
						$dil=$recordset[$sayac]["dil"];	//echo $haberkategori;
						$aktif=$recordset[$sayac]["aktif"];
						switch ($dil)
							   {		
									case 1: $dil_aciklama="Türkçe"; break;
									case 2: $dil_aciklama="İngilizce"; break;
									case 3: $dil_aciklama="Almanca"; break;
									case 4: $dil_aciklama="Rusça"; break;
							   }
						
						if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}				
				?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                    </div></td>
                  <td height="30" valign="middle" ><font class="veri_baslik">&nbsp;<strong>
				  <a href="duzenle.php?numara=<? print($numara);?>"  class="veri_baslik" title="Düzenlemek in Tklaynz">
				  <? print($eposta); ?></a></strong></font></td>
                  <td height="30" valign="middle" class="veri_baslik" ><? echo $dil_aciklama; ?></td>
                  <td width="8%" valign="middle" >
                  <div align="center">
					<?
					if ($resim=='') {$resim=$default_resim; }
					resim_yeniden_boyutlandir($thumb_resim_dizini,$resim,$height_of_image,$width_of_image);
					if ( $resim<>$default_resim) 
					   { 
					?> 
               		<a href="<? print($resim_dizini.$resim); ?>" target="_blank"><img src="../../../rsmlr/icon_video.gif" width="20" height="14" border="0"> </a>
					<? 
						} 
					?>
				  </div></td>
                  <td width="10%" valign="middle">
					<? 
					if  ($resim<>$default_resim) 
						{ 
					?>
					<a href="kontrol_islem.php?item=<? print($numara);?>&page=<? print $sayfa_no; ?>" class="resim_sil">Resim Sil </a>
					<? 
						} 
					?>				</td>
				</tr>
				<?
					  }
				?>
            </table> </td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="2" cellspacing="2">
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
					<input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif"   value="Aktif" >
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil"   value=" Sil " >
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle"   value="Ekle" >
                    <input name="aktar" type="button" id="aktar"  class="dugmeler_ekle" value="Listeyi Dışarı Aktar" onClick="window.location='mailleri_disari_aktar.php';">
                    
                    </td>
                </tr>
                <tr>
                  <td height="19" valign="middle"></td>
                </tr>
                <tr>
                  <td height="29" valign="bottom" class="veri_tarih">&nbsp;</td>
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
            </table> </div>            </td>
          </tr>
<?
   }
?>
      </table> </td>
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
   }  //  (f)izinsiz girisleri engellemek iin  kullanilmaktadr.
?>