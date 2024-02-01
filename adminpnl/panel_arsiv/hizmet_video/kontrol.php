<?	session_start();
  	$link_inherit="kontrol.php";
	include("config.php");	
    include($uzaklik."inc_s/baglanti.php");
    //$syonetim=$_SESSION["siteyonetici"];
	if (isset($_SESSION['yonet']))
       {
		  unset($_SESSION[$tablo_ismi.'ad']);
		  unset($_SESSION[$tablo_ismi.'kaynak']);
		  unset($_SESSION[$tablo_ismi.'durum']);
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
		  $sql_cumlesi="select numara from $tablo_ismi";
		  $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		  $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		  include($uzaklik."inc_s/sayfalama.php");
		  sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
			$sql_cumlesi="select * from $tablo_ismi where kategori='$kategori' order by numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
			$recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
			$toplam_kayit_sayisi=count($recordset);
			$ust_kategori_adi_ogren=@$baglanti->query("Select ad from hizmet_kategori where numara='$kategori'")->fetchAll(PDO::FETCH_ASSOC);
			if (count($ust_kategori_adi_ogren)>0) 
			   {
				   $ust_kategori_adi=$ust_kategori_adi_ogren[0]["ad"];
			   }
			else
			   {
				   header("Location:../hizmet_kategori/kontrol.php"); 	
			   }
			   

			   
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<style type="text/css"> .style3 { color: #132C6A;font-weight: bold;} .style8 {color: #666666; font-weight: bold;} </style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="center"><img src="../pictures/kultursanat.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><span class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
          <a href="../hizmet_kategori/kontrol.php" class="veri_ana_baslik">Hizmet Kategorisi (<? echo $ust_kategori_adi; ?>) </a> &gt; </font></div> </span></td>
  </tr>
</table>
<table width="950" align="center" cellspacing="0">
  <tr> 
    <form  name="xxx" action="kontrol_islem.php" method="post">
      <td  align="left" valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr><td class="anabaslik">Videolar</td></tr>
		<?
        if  ( $toplam_kayit_sayisi>0)
            {
        ?>
          <tr> 
            <td>
            <table width="99%" border="0" align="center" cellpadding="2" cellspacing="2">
                <tr>
                  <td colspan="5"><div align="center">
                    <table width="100%" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                      <tr bgcolor="#EBEBEB">
                        <td height="25" valign="bottom" bgcolor="#FFFFFF"><div align="right"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                          <? include("navigation.php"); ?>
                        </font></div></td>
                        </tr>
                    </table>
                  </div></td>
                </tr>
                <tr>
                  <td width="5%"><div align="center" class="style3">
                    <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">Aktif</font></div>
                  </div></td> 
                  <td width="5%"><div align="center" class="style3">
                      <div align="center"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Sil</font></div>
                  </div></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> Açıklama</strong></font></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
				 <?
                 for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                     {
                        $resim=$recordset[$sayac]["resim_adres"];
                        $video=$recordset[$sayac]["video_adres"];
                        $aktif=$recordset[$sayac]["aktif"];
                        $ad=$recordset[$sayac]["ad"];
						$kaynak=$recordset[$sayac]["kaynak"];
                        $numara=$recordset[$sayac]["numara"];	
						$durum=$recordset[$sayac]["durum"];
						switch ($durum)
						{		
							case 1: $durum_aciklama="Ana Sayfa - Seçmeler"; break;
							case 2: $durum_aciklama="Ana Sayfa"; break;
						}			
                ?>
                <tr>
                  <td class="aktif_tdler">
                  <div align="center">
                  <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>">
                  </div></td> 
                  <td class="sil_tdler"><div align="center">
                    <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>" >
                  </div></td>
                  <td width="33%" valign="middle"><font class="veri_baslik">&nbsp;<strong>
                  <a href="<? print($video_dizini.$video); ?>" target="_blank" class="link_faaliyet">		
			      <? print($ad); ?></a></strong></font></td>
                  <td width="23%" valign="middle" class="ekle_duzenle_baslik">&nbsp;</td>
                  <td width="34%" valign="middle">
				  <a href="duzenle.php?numara=<? print($numara);?>" class="link_faaliyet" title="Düzenlemek İçin Tıklayınız">
				  <img src="../../rsmlr/duzenle.gif" width="50" height="39" border="0"></a></td>
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
                  <input name="aktiflestirme" type="submit" id="aktiflestirme" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil " >
                  <input name="ekle" type="submit" id="ekle"  class="dugmeler_ekle" value="Ekle" >
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >
				  <input type="hidden" name="page" value="<? print $sayfa_no; ?>" ></td>
                </tr>
                <tr valign="bottom" bordercolor="#FFFFFF"><td valign="middle">&nbsp;</td></tr>
                
                <tr valign="bottom" bordercolor="#FFFFFF">
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
                    <td  height="61" valign="middle" bgcolor="#FFFFFF">
                    <div align="center"> 
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
						  <input type="hidden" name="ilkkayit2" value="<? print $limit_ilk_deger; ?>" >
						</span>
						  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle" >
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
<tr valign="bottom" bordercolor="#FFFFFF">
    <td height="30" valign="middle" class="veri_baslik" style="padding-left:10px;">Videoyu flv formatına çeviren programı indirmek için <a href="http://www.sakaryarehberim.com/temp/videoconverter.zip" target="_blank" class="veri_baslik"><strong>tıklayınız.</strong></a></td>
</tr>
<tr valign="bottom" bordercolor="#FFFFFF">
  <td height="30" valign="middle" class="veri_baslik">&nbsp;</td>
</tr>
      </table> </td>
</form>
  </tr>
</table>
<br>
<br>
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