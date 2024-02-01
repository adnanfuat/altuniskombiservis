<?	 session_start();
$link_inherit="kontrol.php";
include("config.php");		  
if  (isset($_SESSION['yonet']))
   	{
		if (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']);}
		if (isset($_SESSION[$tablo_ismi.'yer'])) {unset($_SESSION[$tablo_ismi.'yer']);}
		if (isset($_SESSION[$tablo_ismi.'siralama'])) {unset($_SESSION[$tablo_ismi.'siralama']);}
		if (isset($_SESSION[$tablo_ismi.'detay'])) {unset($_SESSION[$tablo_ismi.'detay']);}
		if (isset($_SESSION[$tablo_ismi.'icerik'])) {unset($_SESSION[$tablo_ismi.'icerik']);}
   	    include($uzaklik."inc_s/baglanti.php");
        include($uzaklik."inc_s/sayfa_no_belirle.php");
        include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
        include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		if  (isset($_GET['kategori']))
		  	{
		  		unset($_SESSION['kategori']);
				$kategori=$_GET['kategori'];
				$_SESSION['kategori']=$kategori;
			}
	     else
		    {
		    	$kategori=$_SESSION['kategori'];
		    }
		$limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		$sql_cumlesi="select numara from $tablo_ismi where kategori='$kategori'";
		$calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		$toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		include($uzaklik."inc_s/sayfalama.php");
		sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
		$sql_cumlesi="select * from $tablo_ismi where kategori='$kategori' order by siralama asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
	    $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
        $toplam_kayit_sayisi=count($recordset);
	    $ust_kategori_adi_ogren=@$baglanti->query("Select ad from referans_kategori where numara='$kategori'")->fetchAll(PDO::FETCH_ASSOC);
	    if (count($ust_kategori_adi_ogren)>0) 
		   {
			   $ust_kategori_adi=$ust_kategori_adi_ogren[0]["ad"];
		   }
	    else
	       {
			   header("Location:../referans_kategori/kontrol.php"); 	
		   }	
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
.style3 {color: #132C6A;font-weight: bold;}
</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? echo $uzaklik; ?>js/feedback.js"></SCRIPT>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="50" class="td_anabaslik"><div align="center"><img src="../pictures/encumen.gif" width="48" height="48"></div></td>
    <td width="900" class="td_anabaslik"><div align="left"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt;
          <a href="../belgeler_kategori/kontrol.php" class="veri_ana_baslik">Belge Kategorileri</a> &gt; </font></div></td>
  </tr>
</table>
<table width="950" border="0" align="center" cellpadding="2" cellspacing="2"  class="table">
  <tr> 
<form  name="xxx" action="kontrol_islem.php" method="post">
      <td align="left" valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="anabaslik">Belgeler (<? echo $ust_kategori_adi; ?>)</td>
      </tr>
<?
if  ( $toplam_kayit_sayisi>0)
	{
?>
          <tr> 
            <td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td colspan="7">
                    <table width="100%" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                      <tr bgcolor="#EBEBEB">
                        <td height="25" valign="bottom" bgcolor="#FFFFFF"><div align="right">
                        <font size="1" face="Verdana, Arial, Helvetica, sans-serif"><? include("navigation.php"); ?></font></div></td>
                      </tr>
                    </table></td>
                </tr>
                <tr>
                  <td width="5%"><div align="left" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Taşı</font></div>
                  </div></td> 
                  <td width="5%"><div align="left" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Ak.</font></div>
                  </div></td>
                  <td width="5%"><div align="center" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Sil</font></div>
                  </div></td>
                  <td width="39%"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>  Referans Adı </strong></font></td>
                  <td colspan="2"><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Yer </strong></font></td>
                  <td width="15%">&nbsp;</td>
                </tr>
				<?
                   for   ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                         {
                            $ad=$recordset[$sayac]["ad"];
                            $yer=$recordset[$sayac]["yer"];		
                            $siralama=$recordset[$sayac]["siralama"];
                            $aktif=$recordset[$sayac]["aktif"];
                            $numara=$recordset[$sayac]["numara"];				
                            if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}	
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>">
                  <td class="dugmeler_tasima"><div align="center">
                    <input type="checkbox"  name="tasino[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td> 
                  <td height="43" class="aktif_tdler"><div align="center">
                    <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" > 
                  </div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div>                  </td>
                  <td valign="middle" ><div align="left"><font class="veri_baslik">&nbsp;<strong><img src="<? echo $uzaklik; ?>rsmlr/gri_nokta.gif" width="12" height="12" align="absmiddle"> 
                      <? print($ad); ?></strong></font> </div></td>
                  <td width="22%" valign="middle" ><font class="veri_detay"><? print(nl2br($yer)); ?></font> </td>
                  <td width="9%" valign="middle" class="veri_detay" ><div align="center"><? echo $siralama; ?></div></td>
                  <td valign="middle" ><div align="center"><a href="duzenle.php?numara=<? print($numara);?>"><img src="<? echo $uzaklik; ?>rsmlr/duzenle.gif" alt="D�zenle" width="50" height="39" border="0"></a></div></td>
                </tr>
			   <?
                      }
               ?>
            </table></td>
          </tr>
          <tr> 
            <td><table width="100%" border="0" cellpadding="0" cellspacing="5">
                <tr> 
                  <td height="46" valign="bottom">
				    <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
					<input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				    <input name="tasi" type="submit" class="dugmeler_tasima" value="Taşı">
                    <input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
				    <input name="sil" type="submit" id="sil"  class="dugmeler_sil" value=" Sil ">
                    <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle"></td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF">
                  <td valign="middle">&nbsp;</td>
                </tr>
              </table></td>
          </tr>
 <?
    }  
 		//eger firmanin mesaji yok ise ekrane mesaj yok yazdiriliyor.........
 elseif  ( $toplam_kayit_sayisi==0)
   {
?>
          <tr>
            <td>
                <div align="center">
                <table width="100%" height="65">
                  <tr > 
                    <td  height="61" valign="middle" bgcolor="#FFFFFF"><div align="center"> 
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
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                    </div></td>
                  </tr>
            </table></div>
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
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>