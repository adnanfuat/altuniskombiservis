<?	session_start();
$link_inherit="kontrol.php";
include("config.php");
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'eposta'])) {unset($_SESSION[$tablo_ismi.'eposta']);}
		if (isset($_SESSION[$tablo_ismi.'mesaj'])) {unset($_SESSION[$tablo_ismi.'mesaj']);}
		if (isset($_SESSION[$tablo_ismi.'telefon'])) {unset($_SESSION[$tablo_ismi.'telefon']);}
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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
.style3 {
	color: #132C6A;
	font-weight: bold;
}
.style5 {
	color: #D24400;
	font-weight: bold;
}
.style6 {
	color: #333333;
	font-weight: bold;
	font-size: 10px;
}
.style8 {color: #666666; font-weight: bold; }
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="48" class="td_anabaslik"><div align="right"><img src="../pictures/zdefter.gif" width="48" height="48"></div></td>
    <td width="904" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; </span></td>
  </tr>
</table>
<table width="950" align="center"  class="table">
  <tr> 
<form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top">
	  <table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
if  ( $toplam_kayit_sayisi>0)
    {
 ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td colspan="3" class="anabaslik">Ziyaretçi Defteri</td>
                </tr>
				<? if ($toplam_sayfa_sayisi>1) { ?>
				<tr>
                  <td colspan="3"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
				<? } ?>
                <tr> 
                  <td width="5%" height="25"><div align="left" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                      Ak.</font></div>
                  </div></td>
                  <td width="5%"><div align="center" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div>
                  </div></td>
                  <td width="90%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? echo $kategori ?></strong></font></td>
                </tr>
				<?
				for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					{
						$ad=$recordset[$sayac]["ad"];
						$aktif=$recordset[$sayac]["aktif"];
						$numara=$recordset[$sayac]["numara"];
						$eposta=$recordset[$sayac]["eposta"];
						$mesaj=$recordset[$sayac]["mesaj"];
						$telefon=$recordset[$sayac]["telefon"];
						$dil=$recordset[$sayac]["dil"];
						switch ($dil)
							   {		
							   		case 1: $dil_aciklama="Türkçe"; break;
									case 2: $dil_aciklama="İngilizce"; break;
									case 3: $dil_aciklama="Almanca"; break;
									case 4: $dil_aciklama="Rusça"; break;
							   		default: $dil_aciklama="Türkçe"; break;
							   }		
				?>
                <tr> 
                  <td class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>">
                  </div></td>
                  <td class="sil_tdler"><div align="center">
				  <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                    </div>
                  </td>
                  <td height="30" valign="top"><table width="100%" border="0">
                    <tr>
                      <td width="81%" height="25"><font><img src="<? print $uzaklik; ?>rsmlr/gri_nokta.gif" width="12" height="12" align="absmiddle"><strong>
				  <a href="duzenle.php?numara=<? print($numara);?>" class="veri_baslik" title="Düzenlemek İçin Tıklayınız"><? print(stripslashes($mesaj)); ?></a></strong></font></td>
                      <td width="19%" rowspan="2" align="center" valign="middle" class="veri_baslik"><? echo $dil_aciklama; ?></td>
                    </tr>
                    <tr>
                      <td class="veri_tarih">Gönderen: <? if (strlen($ad)>0) { echo $ad; } else { echo "-"; } ?> <? if (strlen($eposta)>0) { ?>(<? echo "E-posta: ".$eposta; ?>)<? } ?></td>
                      </tr>
                  </table>
                  </td>
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
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>">
					<input name="aktiflestirme"  type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                    <input name="sil" type="submit" id="sil"  class="dugmeler_sil"  value="  Sil  ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle"  value="Ekle">
				 </td>
                </tr>
                <tr>
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr>
                  <td valign="middle">&nbsp;</td>
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
                        <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                        <p class="style5">&nbsp;</p>
                        <p class="style5">&nbsp;</p>
                        <p class="style5">&nbsp;</p>
                        <p>                          
						<input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
						<input name="ekle" type="submit" id="ekle" class="dugmeler_ekle"  value="Ekle">
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