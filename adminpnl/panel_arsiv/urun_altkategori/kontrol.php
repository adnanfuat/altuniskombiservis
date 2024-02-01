<? session_start();
$link_inherit="kontrol.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		if  (isset($_SESSION[$tablo_ismi.'ad'])) {unset($_SESSION[$tablo_ismi.'ad']); }
		if  (isset($_SESSION[$tablo_ismi.'siralama'])) {unset($_SESSION[$tablo_ismi.'siralama']); }
		if  (isset($_SESSION[$tablo_ismi.'aciklama'])) {unset($_SESSION[$tablo_ismi.'aciklama']); }
	    if  (isset($_GET['ust_kategori_no']))
		  	{
		  		unset($_SESSION['ust_kategori_no']);
				$ust_kategori_no=$_GET['ust_kategori_no'];
				$_SESSION['ust_kategori_no']=$ust_kategori_no;
			}
	     else
		    {
		    	$ust_kategori_no=$_SESSION['ust_kategori_no'];
		    }
		 include($uzaklik."inc_s/baglanti.php");
		 //$syonetim=$_SESSION["siteyonetici"];
		 //include("boyut_ogren.php");
		
		 include($uzaklik."inc_s/sayfa_no_belirle.php");
		 include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		 include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");

		 $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		 $sql_cumlesi="select numara from $tablo_ismi where ustkategori_no='$ust_kategori_no'";
		 $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		 $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		 include($uzaklik."inc_s/sayfalama.php");
	     sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);

		 $sql_cumlesi="select * from $tablo_ismi where ustkategori_no='$ust_kategori_no' order by siralama asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
		 $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
	   	 $toplam_kayit_sayisi=count($recordset);

		 //(s) Sektor adini ogrenmek için olusturulan sorgu
		 $ust_kategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara='$ust_kategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		 if (count($ust_kategori_adi_ogren)>0) 
			{
				$ust_kategori_adi=$ust_kategori_adi_ogren[0]["ad"];
			}
		else
			{ 
				  header("Location:../urun_kategori/kontrol.php"); 	
			}	
		//(f) Sektor adini ogrenmek için olusturulan sorgu
		///////////////////////////////////////////////////////////////////////////////	  
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><? print($title); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">.style3 {color: #132C6A;font-weight: bold;}</style>
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
<body>
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="right"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik"><font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik" >Kontrol Panel</a> &gt; <a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? echo $ust_kategori_adi; ?>)</a> &gt; </font></td>
  </tr>
</table>
<table width="950" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
   <tr>
      <td align="left" valign="top">
			<form  name="xxx" action="kontrol_islem.php" method="post">
		    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    	      <tr>
        	    <td class="anabaslik">Ürün  Alt Kategorileri</td>
	          </tr>
			<?
            if  ( $toplam_kayit_sayisi>0)
                {
            ?>
          <tr> 
            <td><table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
                <? if ($toplam_sayfa_sayisi>1) { ?>
                <tr>
                  <td colspan="9"><div align="right"><? include("navigation.php"); ?></div></td>
                </tr>
                <? } else { ?>
                <tr><td colspan="9" height="15"></td></tr>
                <? } ?>
                <tr> 
                  <td height="30" colspan="9">
				  <input name="tasi2" id="tasi2" type="submit" class="dugmeler_tasima" value="Taşı">
				  <input name="aktiflestirme2" id="aktiflestirme2" type="submit" class="dugmeler_aktif" value="Aktif">
                  <input name="sil2" type="submit" id="sil2" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle2" type="submit" id="ekle2" class="dugmeler_ekle" value="Ekle">                  </td>
                </tr>
                <tr>
                  <td width="5%"><div align="center"><span class="style3">
                  <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Taşı</font></span></div></td> 
                  <td width="5%"><div align="left" class="style3">
                  <font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Aktif</font></div></td>
                  <td width="5%"><div align="center" class="style3"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> Sil</font>
                  </div></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong> <? echo $kategori ?> Adı </strong></font></td>
                  <td><font color="#132C6A" size="1" face="Verdana, Arial, Helvetica, sans-serif"><strong>Puan</strong></font></td>
                  <td><? if ($resim!='resimyok.gif' && 1==2) { ?>
                    <a href="kontrol_islem.php?item=<? print($numara);?>&sayfa=<? echo $sayfa_no; ?>" class="resim_sil">Resim Sil </a>
                  <? } ?></td>
                  <td>&nbsp;</td>
                  <td width="4%">&nbsp;</td>
                  <td width="5%">&nbsp;</td>
                </tr>
				<? $klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
                for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                    {
                        $ad=$recordset[$sayac]["ad"];
                        $resim=$recordset[$sayac]["resim_adres"];
						$puan=$recordset[$sayac]["siralama"];
                        $tarih=$recordset[$sayac]["eklenme_tarihi"];
                        if ($tarih>20041215) {$tarih=substr($tarih,6,2)."/".substr($tarih,4,2)."/".substr($tarih,0,4);} else {$tarih='---';}
                        $numara=$recordset[$sayac]["numara"];	
                        $aktif=$recordset[$sayac]["aktif"];		
                        if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}					
						$uzanti_baslangic=strrpos($resim,".");
						$uzanti=substr($resim,$uzanti_baslangic+1);
                ?>
                <tr onMouseOver="bgColor='#EEFACB'" onMouseOut="bgColor='<? echo $tr_back; ?>'"   bgcolor="<? echo $tr_back; ?>">
                  <td height="45" class="tasima_tdler"><div align="center"><input type="checkbox"  name="tasino[<? print($numara);?>]" id="tasino[<? print($numara);?>]" value="<? print($numara);?>" class="tselectedid"></div></td> 
                  <td class="aktif_tdler"><div align="center"><input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" id="onay_no[<? print($numara);?>]" value="<? print($numara);?>" class="aselectedid"></div></td>
                  <td class="sil_tdler"><div align="center"><input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" value="<? print($numara);?>" class="sselectedid"></div></td>
                  <td width="48%"><font class="veri_baslik"><strong><? print($ad); ?></strong></font></td>
                  <td width="13%"><font class="veri_baslik"><? print ($puan);?></font></td>
                  <td width="9%"><div align="center">
                   <a href="../urun_detay/kontrol.php?alt_kategori=<? print($numara); ?>"  class="altkategori">ÜRÜNLER</a>
                  </div></td>
				  <? if ($resim=='') {$resim='resimyok.gif'; } ?>
                  <td width="6%" align="center">
                  <a href="duzenle.php?alt_kategori=<? print($numara);?>&ust_kategori_no=<? print($ust_kategori_no);?>" class="duzenle"><img src="../../rsmlr/duzenle.gif" alt="Düzenle" width="50" height="39" border="0"></a></td>
				  <td width="4%"><div align="center">
				  <?  
                    if ($resim<>"resimyok.gif") 
                       { 
                  ?>
				  <a href="<? print($resim_dizini.$resim); ?>" target="_blank"><img src="../../rsmlr/tel.png" width="29" height="29" border="0" title="Resmi Gör"  alt="Resmi Gör"></a>
				   <? 
                        } 
                   ?>				  
				  </div></td>
				  <td align="center"><? if ($resim<>"resimyok.gif") { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
       
                  <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>" onClick="return hs.htmlExpand(this, { objectType: 'iframe' } )"  class="veri_baslik"><img src="../../rsmlr/crop2.png" width="24" height="25" alt="Resmi Yeniden Boyutlandır"  title="Resmi Yeniden Boyutlandır" border=0></a><? } } ?></td>
                </tr>
				<?
                      }
                ?>
            </table>
            </td>
          </tr>
          <tr> 
            <td><table width="940" border="0" cellpadding="3" cellspacing="3">
                <tr>
                  <td height="46" valign="bottom">
                  <table width="338" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="43" height="30" align="center" class="tasima_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="tselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td align="center" class="aktif_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="aselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td align="center" class="sil_tdler" title="Tümünü Seç/Seçimi Kaldır"><input  id="sselectall" type="checkbox"></td>
                      <td width="3"></td>
                      <td width="200" class="veri_detay"><strong>Tümünü Seç/Seçimi Kaldır</strong></td>
                    </tr>
                  </table></td>
                </tr>
                <tr> 
                  <td height="46" valign="bottom">
				  <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
				  <input type="hidden" name="page" value="<? print $sayfa_no; ?>">
				  <input name="tasi" type="submit" class="dugmeler_tasima" value="Taşı">
				  <input name="aktiflestirme" type="submit" class="dugmeler_aktif" value="Aktif">
                  <input name="sil" type="submit" id="sil" class="dugmeler_sil" value=" Sil ">
                  <input name="ekle" type="submit" id="ekle" class="dugmeler_ekle" value="Ekle">
                  </td>
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
                        <p>&nbsp;</p>
                        <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p class="kayit_yok">&nbsp;</p>
                        <p>
                          <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>">
						  <input name="ekle" type="submit" class="dugmeler_ekle"  value="Ekle">
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
	  </form>
      </td>
  </tr>
</table>
<br>
<br>
</body>
</html>
<script>
function isChecked(checkboxId) { var id = '#' + checkboxId; return $(id).is(":checked"); }
$('#tselectall').on('click', function() {$('.tselectedid').prop('checked', isChecked('tselectall')); });
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