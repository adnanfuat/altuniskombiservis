<? session_start();
$link_inherit="kontrol.php";
include("config.php");
if  (isset($_SESSION['yonet']))
   	{
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'link'])) {unset($_SESSION[$tablo_ismi.'link']);}
		if (isset($_SESSION[$tablo_ismi.'siralama'])) {unset($_SESSION[$tablo_ismi.'siralama']);}
		if (isset($_SESSION[$tablo_ismi.'detay'])) {unset($_SESSION[$tablo_ismi.'detay']);}
		if (isset($_SESSION[$tablo_ismi.'dil'])) {unset($_SESSION[$tablo_ismi.'dil']); }
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
		$sql_cumlesi="select * from $tablo_ismi order by siralama asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
	    $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
        $toplam_kayit_sayisi=count($recordset);
?>	
<SCRIPT language=JavaScript1.2 src="<? echo $uzaklik; ?>js/feedback.js"></SCRIPT>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/link.css" rel="stylesheet" type="text/css">
<style type="text/css">
body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
.style3 {color: #132C6A;font-weight: bold;}
.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="48" class="td_anabaslik"><div align="left"><img src="../pictures/muht.gif" width="48" height="48"></div></td>
    <td width="890" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</span></td>
  </tr>
</table>
<table width="950" align="center" cellpadding="5" cellspacing="5"  class="table">
<tr> 
      <form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF"  ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
<?
    if  ( $toplam_kayit_sayisi>0)
        {
?>
                <tr>
                  <td colspan="9">
                    <table width="100%" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                      <tr bgcolor="#EBEBEB">
                        <td height="25" valign="bottom" bgcolor="#FFFFFF"><div align="right">
                        <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? include("navigation.php"); ?></font></div></td>
                        </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td width="4%"><div align="left" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                  <img src="../../rsmlr/next.gif" width="6" height="9"> Ak.</font></div></td>
                  <td width="4%"><div align="center" class="style3">
                    <div align="left"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                    <img src="<? echo $uzaklik; ?>rsmlr/next.gif" width="6" height="9"> Sil</font></div>
                  </div></td>
                  <td colspan="2"><img src="<? echo $uzaklik; ?>rsmlr/next.gif" width="6" height="9">
                  <font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? echo $kategori ?> Adı </strong></font></td>
                  <td colspan="3"><? /* <img src="<? echo $uzaklik; ?>rsmlr/next.gif" width="6" height="9">
                  <font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong><? echo $kategori ?>  Detay </strong></font> */ ?> &nbsp;</td>
                  <td width="4%"><img src="<? echo $uzaklik; ?>rsmlr/next.gif" width="6" height="9"> 
                  <font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Puan </strong></font></td>
                  <td width="16%">&nbsp;</td>
                </tr>
				<?
                   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                         {
                            $ad=$recordset[$sayac]["ad"];
                            $detay=$recordset[$sayac]["detay"];		
                            $resim=$recordset[$sayac]["resim_adres"];
                            $aktif=$recordset[$sayac]["aktif"];
							$siralama=$recordset[$sayac]["siralama"];
                            $numara=$recordset[$sayac]["numara"];				
							$dil=$recordset[$sayac]["dil"]; //echo $dil;
							switch ($dil)
								   {		
										case 1: $dil_aciklama="Türkçe"; break;
										case 2: $dil_aciklama="İngilizce"; break;
								   }

                            if  ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}	
							if  (strlen($detay)>350)
								{
									$detay=substr($detay,0,350)."..	";
								}
							if ($resim=='') {$resim='resimyok.gif'; }
							resim_yeniden_boyutlandir($thumb_resim_dizini,$resim,$height_of_image,$width_of_image);
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td height="43" class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>">
                  </div></td>
                  <td class="sil_tdler"><div align="center">
                  <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                  </div></td>
                  <td width="33%" valign="middle" ><div align="left"><font class="veri_baslik"><strong>
                  <img src="<? echo $uzaklik; ?>rsmlr/gri_nokta.gif" width="12" height="12" align="absmiddle"> 
                      <? print($ad); ?></strong></font> </div></td>
                  <td width="9%" align="center" valign="middle" class="veri_baslik"><? print ($dil_aciklama);?></td>
                  <td width="23%" valign="middle" ><font class="veri_detay"><? //print(nl2br($detay)); ?></font> </td>
                  <td colspan="2" valign="middle" ><div align="center">
                  <a href="duzenle.php?numara=<? print($numara);?>"><img src="<? echo $uzaklik; ?>rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0" align="absbottom"></a>
                  </div></td>
                  <td valign="middle" class="veri_detay"><div align="center"><? echo $siralama; ?></div></td>
                  <td valign="middle"><div align="center">
				  <span class="style10">
				   <? if ($resim<>$default_resim) {   ?>
				   <a href="<? print($thumb_resim_dizini.$resim); ?>" rel="external"></a>
				   <img src="../../rsmlr/icon_video.gif" width="20" height="14">
				   <? } ?>
				   </span>
			      </div></td>
			    </tr>
				<?
                      }
                ?>
            </table> </td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				    <input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
				    <input name="sil" type="submit" id="sil"  class="dugmeler_sil" value="Sil">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle">
                  </td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF">
                  <td valign="middle" style="border-left-width: 1; border-right-width: 1; border-top-width: 1; border-bottom-style: solid; border-bottom-width: 1">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td>
 <?
    }  
 elseif  ( $toplam_kayit_sayisi==0)
    {
?>
                <div align="center">
                <table width="100%" height="65">
                  <tr> 
                    <td  height="61" valign="middle" bgcolor="#FFFFFF">
                    <div align="center"> 
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır.</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p>
                          <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >
						  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle" >
                        </p>
                    </div>
                </td>
              </tr>
            </table></div>
<?
    }
?>
               </td>
          </tr>
        </table> </td>
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