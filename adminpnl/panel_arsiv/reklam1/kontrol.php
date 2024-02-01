<?	session_start();
$link_inherit="kontrol.php";
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
if  (isset($_SESSION['yonet']))
    {
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'puan'])) {unset($_SESSION[$tablo_ismi.'puan']);}
		if (isset($_SESSION[$tablo_ismi.'yukseklik'])) {unset($_SESSION[$tablo_ismi.'yukseklik']);}
		if (isset($_SESSION[$tablo_ismi.'genislik'])) {unset($_SESSION[$tablo_ismi.'genislik']);}
		if (isset($_SESSION[$tablo_ismi.'resim'])) {unset($_SESSION[$tablo_ismi.'resim']);}
		if (isset($_SESSION[$tablo_ismi.'link'])) {unset($_SESSION[$tablo_ismi.'link']);}
		if (isset($_SESSION[$tablo_ismi.'altbilgi'])) {unset($_SESSION[$tablo_ismi.'altbilgi']);}
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
<style type="text/css">
body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
.style3 {	color: #132C6A;	font-weight: bold;}.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">.style5 {color: #D24400;	font-weight: bold;}</style>
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" bgcolor="#FFFFFF" class="td_anabaslik"><div align="center"><img src="../pictures/ana_reklam.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;</font></td>
  </tr>
</table>
<table width="950" align="center" cellpadding="3" cellspacing="0">
  <tr> 
	 <form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
		<?
        if  ( $toplam_kayit_sayisi>0)
            {
        ?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td colspan="5" class="anabaslik">Reklam 1</td>
                </tr>
               <? 
			   		if ($toplam_sayfa_sayisi>1) {
			   ?>
                <tr>
                  <td colspan="5"><div align="center">
                    <table width="100%" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                      <tr bgcolor="#EBEBEB">
                        <td height="25" valign="bottom" bgcolor="#FFFFFF">
                        <div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                        <? include("navigation.php"); ?>
                        </font></div></td>
                        </tr>
                    </table>
                   </div></td>
                </tr>
                <? } ?>
                <tr> 
                  <td width="4%"><div align="left" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Aktif</font></div>
                  </div></td>
                  <td width="4%"><div align="center" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Sil</font></div>
                  </div></td>
                  <td width="40%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> Reklam Adı </strong></font></td>
                  <td width="10%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Puan</strong></font></td>
                  <td width="42%">&nbsp;</td>
                </tr>
				<?
                for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                    {
                        $ad=$recordset[$sayac]["ad"];
						$puan=$recordset[$sayac]["puan"];
                        $resim=$recordset[$sayac]["resim_adres"];
                        $aktif=$recordset[$sayac]["aktif"];
                        $numara=$recordset[$sayac]["numara"];			
                        $link=$recordset[$sayac]["link"];
                        $altbilgi=$recordset[$sayac]["altbilgi"];			
                        $uzanti_baslangic=strpos($resim,".");
                        $uzanti=substr($resim,$uzanti_baslangic+1);
                        if ($uzanti=="swf") { $img="swf.gif"; } else if ($uzanti=="gif"){ $img="gif.gif"; } else {$img="jpeg.gif";}
                        if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}
                ?>
                <tr  onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>"> 
                  <td class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td>
                  <td class="sil_tdler"><div align="center">
                  <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                  </div>                  </td>
                  <td valign="middle">
                  <font class="veri_baslik">&nbsp;<strong><img src="<? print $uzaklik; ?>rsmlr/gri_nokta.gif" width="12" height="12" align="absmiddle"> 
				  <a href="duzenle.php?numara=<? print($numara);?>" class="veri_baslik" style="text-decoration:none; " title="D�zenlemek ��in T�klay�n�z">
				  <? print($ad); ?></a>
				  </strong></font></td>
                  <td valign="middle" class="veri_baslik"><? print($puan); ?></td>
                  <td valign="middle"><div align="left"><a href="<? print($resim_dizini.$resim); ?>"  target="_blank">
				  <img src="../../rsmlr/<? print $img;  ?>" hspace="10" border="0" align="absmiddle" ></a><span class="style10"><? print $resim; ?></span></div></td>
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
                    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >				   
                    <input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
				  <input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif"  value="Aktif" >
                    <input name="sil" type="submit" id="sil" class="dugmeler_sil"  value=" Sil " >
                  <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle"  value="Ekle" ></td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF">
                  <td valign="middle">&nbsp;</td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF">
                  <td valign="middle">&nbsp;</td>
                </tr>
             </table>
            </td>
          </tr>
 <?
    }  
 elseif  ($toplam_kayit_sayisi==0)
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
   }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadr.
?>