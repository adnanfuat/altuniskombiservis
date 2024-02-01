<? session_start();
$link_inherit='duzenle.php';
include("config.php");
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
	 	//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");
		//echo $_GET["err"];
		$ustkategori_no=$_SESSION['ust_kategori_no'];
		$altkategori_no=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
	    if (isset($_GET['item']))
		   {
  				unset($_SESSION[$tablo_ismi.'numara']); 
				$numara=$_GET['item'];
				$_SESSION[$tablo_ismi.'numara']=$numara;						
		   }
		elseif (isset($_SESSION[$tablo_ismi.'numara']))
		   {
				$numara=$_SESSION[$tablo_ismi.'numara'];			
		   }
		$kayit_sec=@$baglanti->query("Select * from $tablo_ismi where numara='$numara'")->fetchAll(PDO::FETCH_ASSOC);
		if  (count($kayit_sec)<>0) 
			{ 
				$ad=stripslashes($kayit_sec[0]['ad']);		
				$puan=$kayit_sec[0]['puan'];		
				$aciklama=$kayit_sec[0]['aciklama'];
				$teknikozellikler=$kayit_sec[0]['teknikozellikler']; //echo $teknikozellikler;
				$link=$kayit_sec[0]['link'];	 //echo $link;					
				$resim=$kayit_sec[0]['resim_adres'];
				$resim2=$kayit_sec[0]['resim_adres2'];
				$resim3=$kayit_sec[0]['resim_adres3'];
				$resim4=$kayit_sec[0]['resim_adres4'];
				$htaccess_etiket=$kayit_sec[0]['htaccess_etiket'];		
			    if ($resim=='') {$resim='resimyok.gif'; }
				resim_yeniden_boyutlandir($resim_dizini,$resim,$kck_m_h,$kck_m_w);
				$model=$kayit_sec[0]["fiyat"];
				$urun_kodu=$kayit_sec[0]['urun_kodu'];
				$uzunluk=$kayit_sec[0]["uzunluk"];
				$yukseklik=$kayit_sec[0]["yukseklik"];
				$genislik=$kayit_sec[0]["genislik"];
				$agirlik=$kayit_sec[0]["agirlik"];
				$guc=$kayit_sec[0]["guc"];
				$toplama_kapasitesi=$kayit_sec[0]["toplama_kapasitesi"];
				$gereken_hp=$kayit_sec[0]["gereken_hp"];
				$toplama_hortumu=$kayit_sec[0]["toplama_hortumu"];
				$toz_hortumu=$kayit_sec[0]["toz_hortumu"];
				$saft_mili=$kayit_sec[0]["saft_mili"];
				$vakum_uzakligi=$kayit_sec[0]["vakum_uzakligi"];
			}	
		else 
			{
				header('Location:kontrol.php');
			}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
</head>
<script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
<script language="javascript" type="text/javascript" src="<? print $uzaklik; ?>/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	editor_selector : "mceAdvanced",
	plugins : "table,save,advhr,advimage,advlink,emotions,insertdatetime,preview,zoom,contextmenu",
	theme_advanced_buttons1_add : "fontselect,fontsizeselect",
	theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,zoom,separator,forecolor,backcolor",
	theme_advanced_buttons2_add_before: "cut,copy,paste,separator",
	theme_advanced_buttons3_add_before : "tablecontrols,separator",
	theme_advanced_buttons3_add : "emotions,advhr",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_path_location : "bottom",
	plugin_insertdate_dateFormat : "%Y-%m-%d",
	plugin_insertdate_timeFormat : "%H:%M:%S",
	extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
	external_link_list_url : "example_data/example_link_list.js",
	external_image_list_url : "example_data/example_image_list.js",
	flash_external_list_url : "example_data/example_flash_list.js"
});
</script>
<body onLoad="document.form1.ad.focus();">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" height="26"  class="td_anabaslik"><div align="left"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%"  class="td_anabaslik">
	<font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Ürünler</a> &gt;</font>	</td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Ürün Düzenle</td>
            </tr>
            <tr> 
              <td width="185" class="baslik">&nbsp;</td>
              <td width="725">
              <font class="hata1"> 
			        <? 
                if (isset($_GET["don"])&& $_GET["don"]=="resimboyut"){ $mesaj="Resim: Uygunsuz Format ya da Büyük Dosya Boyutu";  print($mesaj);}											 
                if (isset($_GET["don"])&& $_GET["don"]=="eksik_veri"){ $mesaj="Lütfen gerekli alanları doldurunuz"; print($mesaj);}	
                if (isset($_GET["err"])&& $_GET["err"]=="etiket"){ $mesaj="Bu İsimde Bir Etiket Daha Önce Eklendi, Lütfen Başka Bir İsim Seçin"; print($mesaj);}											 
                
             ?>
              </font>
			  <input name="gizli" type="hidden" value="<? print($numara); ?>">              </td>
            </tr>
            <tr> 
              <td class="baslik">Ürün  Adı * </td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'ad'])) {$ad=$_SESSION[$tablo_ismi.'ad'];   } ?>			  
              <input name="ad" type="text" class="textbox1" id="ad"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? print($ad); ?>" size="55" onKeyUp="yoltanimla();">
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                      {
                        $hata=$_SESSION[$tablo_ismi.'hata'];	
                        if (isset($hata[1]) && $hata[1]==1 ) { echo 'Ürün Adını Giriniz';}
                     }	
                ?>
              </font></td>
            </tr>
            <tr> 
            <td class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9" colspan="2">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>			  
           <input name="htaccess_etiket" type="text" id="htaccess_etiket"  value="<? echo $htaccess_etiket ?>"  class="textbox1" size="55" onBlur="pchange(this, 0);" onFocus="pchange(this, 1);"></td>
          </tr>
            <tr> 
              <td><span class="baslik">Sıralama Puanı</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'puan'])) {$puan=$_SESSION[$tablo_ismi.'puan']; } ?>             
			  <input name="puan" type="text" id="puan" value="<? print($puan); ?>" class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">  
                <? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                    {
                        $hata=$_SESSION[$tablo_ismi.'hata']; if (isset($hata[4]) && $hata[4]==1 ) { echo 'Ürün Puanını Giriniz';}
                    }
                ?>
                </font>             </td>
            </tr>
            
          <? /*  <tr>
              <td valign="middle" class="baslik">Açıklama </td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'aciklama']; } ?>
	              <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? echo $aciklama; ?></textarea>
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
				<? if (isset($_SESSION[$tablo_ismi.'hata'])) 
                    {
                        $hata=$_SESSION[$tablo_ismi.'hata']; if (isset($hata[6]) && $hata[6]==1 ) { echo 'Ürün Açıklamasını Giriniz';}
                    }
                ?>
              </font>
              </td>
            </tr> */ ?>
            
           
            
            <tr> 
            <td width="185"><strong class="baslik">Ürün Kodu</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'urun_kodu'])) { $urun_kodu=$_SESSION[$tablo_ismi.'urun_kodu']; } ?>
			  <input name="urun_kodu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($urun_kodu)) {echo $urun_kodu; }?>"  size="55">            </td>
          </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Barkod Numarası</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'fiyat'])) { $model=$_SESSION[$tablo_ismi.'fiyat']; } ?>
                  <input name="fiyat" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($model)) {echo $model; }?>" size="55">                </td>
              </tr>
              
         	<tr> 
                <td width="185"><strong class="baslik">Hammadde</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'uzunluk'])) { $uzunluk=$_SESSION[$tablo_ismi.'uzunluk']; } ?>
                  <input name="uzunluk" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($uzunluk)) {echo $uzunluk; }?>" size="55">                </td>
           </tr>

            <tr> 
                <td width="185"><strong class="baslik"> Koli İçi Adet</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'yukseklik']; } ?>
                  <input name="yukseklik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="55">                </td>
            </tr>
           
            <tr> 
                <td width="185"><strong class="baslik"> Koli Ölçüleri</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'genislik'])) { $genislik=$_SESSION[$tablo_ismi.'genislik']; } ?>
                  <input name="genislik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="55">                </td>
           </tr>
           
            <tr> 
                <td width="185"><strong class="baslik"> Koli Ağırlığı</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'agirlik'])) { $agirlik=$_SESSION[$tablo_ismi.'agirlik']; } ?>
                  <input name="agirlik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($agirlik)) { echo $agirlik; }?>" size="55">                </td>
            </tr>
           <? if (1==2) { ?>  
            <tr> 
                <td width="185"><strong class="baslik">Güç</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'guc'])) { $guc=$_SESSION[$tablo_ismi.'guc']; } ?>
                  <input name="guc" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($guc)) { echo $guc; }?>" size="55">                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toplama Kapasitesi</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toplama_kapasitesi'])) { $toplama_kapasitesi=$_SESSION[$tablo_ismi.'toplama_kapasitesi']; } ?>
                  <input name="toplama_kapasitesi" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_kapasitesi)) { echo $toplama_kapasitesi; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Gereken HP</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'gereken_hp'])) { $gereken_hp=$_SESSION[$tablo_ismi.'gereken_hp']; } ?>
                  <input name="gereken_hp" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($gereken_hp)) { echo $gereken_hp; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toplama Hortumu</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toplama_hortumu'])) { $toplama_hortumu=$_SESSION[$tablo_ismi.'toplama_hortumu']; } ?>
                  <input name="toplama_hortumu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_hortumu)) { echo $toplama_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toz Hortumu</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'toz_hortumu'])) { $toz_hortumu=$_SESSION[$tablo_ismi.'toz_hortumu']; } ?>
                  <input name="toz_hortumu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toz_hortumu)) { echo $toz_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Şaft Mili</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'saft_mili'])) { $saft_mili=$_SESSION[$tablo_ismi.'saft_mili']; } ?>
                  <input name="saft_mili" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($saft_mili)) { echo $saft_mili; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Vakum Uzaklığı</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'vakum_uzakligi'])) { $vakum_uzakligi=$_SESSION[$tablo_ismi.'vakum_uzakligi']; } ?>
                  <input name="vakum_uzakligi" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($vakum_uzakligi)) { echo $vakum_uzakligi; } ?>" >                </td>
              </tr>
              
            
            
          <tr> 
              <td><span class="baslik">Depolama ve Ambalaj Bilgileri</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'link'])) {$link=$_SESSION[$tablo_ismi.'link']; } ?>             
			  <? /* <input name="link" type="text" id="link" value="<? print($link); ?>" class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55"> */ ?>
              <textarea name="link" cols="80" rows="25" class="mceAdvanced"><? echo $link; ?></textarea>             </td>
            </tr>
           <? } ?>  
            
            
      <? /*      <tr>
              <td class="baslik">Fiyat</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'fiyat'])) {$fiyat=$_SESSION[$tablo_ismi.'fiyat']; } ?>
                <input name="fiyat" type="text" id="fiyat" value="<? print($fiyat); ?>"  class="textbox1" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>                </td>
            </tr> 
            
            
            <tr>
              <td valign="middle" class="baslik">Teknik Değerler</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'teknikozellikler'])) {$teknikozellikler=$_SESSION[$tablo_ismi.'teknikozellikler']; } ?>
	              <textarea name="teknikozellikler" cols="80" rows="25" class="mceAdvanced"><? echo $teknikozellikler; ?></textarea>

              </td>
            </tr>*/ ?>
            
            <tr>
              <td class="baslik">Büyük İç Resim </td>
              <td bgcolor="#F9F9F9">
              <a href="<? print($thumb_resim_dizini.$resim); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim); ?>" border="0" width="100" ></a>              </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9">
              <input name="resim" type="file"   class="textbox1" id="resim"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
			  <font class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font>              </td>
            </tr>
            <tr>
              <td class="baslik">Küçük Ön Resim </td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim2); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim2); ?>" alt="" width="100" border="0" ></a>
               </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim2" type="file"   class="textbox1" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <font class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr>
            <tr>
              <td class="baslik">Detay Resim 1</td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim3); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim3); ?>" alt="" width="100" border="0" ></a> </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim3" type="file"   class="textbox1" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <font class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr>
            <tr>
              <td class="baslik">Detay Resim 2</td>
              <td bgcolor="#F9F9F9"><a href="<? print($thumb_resim_dizini.$resim4); ?>" target="_blank"><img src="<? print($thumb_resim_dizini.$resim4); ?>" alt="" width="100" border="0" ></a> </td>
            </tr>
            <tr>
              <td class="baslik"></td>
              <td bgcolor="#F9F9F9"><input name="resim4" type="file"   class="textbox1" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">
                  <font class="veri_tarih">Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve  katları</font> </td>
            </tr>
            <tr> 
              <td height="32" class="baslik">&nbsp;</td>
              <td>
              <input name="kaydet" type="button" id="kaydet2" class="dugmeler_ekle" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit22"  class="dugmeler_sil"  value="Geri Dön" onClick="javascript:history.back()">            </td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="924" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="719">&nbsp;</td>
                    <td width="185" valign="middle">
					<div align="left"><font class="veri_tarih">Max. Dosya Boyutu: <strong> <? print $max_file_size ?> kb </strong></font></div></td>
                  </tr>
              </table></td>
            </tr>
          </table>
      </div></td>
    </form>
  </tr>
</table>
</body>
</html>
<script> function kontrol()	{ document.form1.submit(); } 
function lower(str)
    {
        var letters=new Array(12)
        for (i=0; i <12; i++)
        letters[i]=new Array(2)
        letters[0][0]='İ'; letters[0][1]='i';
        letters[1][0]='Ç'; letters[1][1]='c';
        letters[2][0]='Ğ'; letters[2][1]='g';
        letters[3][0]='Ö'; letters[3][1]='o';
        letters[4][0]='Ş'; letters[4][1]='s';
        letters[5][0]='Ü'; letters[5][1]='u';
        letters[6][0]='ı'; letters[6][1]='i';
        letters[7][0]='ç'; letters[7][1]='c';
        letters[8][0]='ğ'; letters[8][1]='g';
        letters[9][0]='ö'; letters[9][1]='o';
        letters[10][0]='ş'; letters[10][1]='s';
        letters[11][0]='ü'; letters[11][1]='u';
        for ( i = 0; i < letters.length; i++ ) {
        var idx = str.indexOf( letters[i][0] );

        while ( idx > -1 ) {
            str = str.replace( letters[i][0], letters[i][1] );
            idx = str.indexOf( letters[i][0] );
        }
    }
    return str;
}
function yoltanimla()
    {
        yol_deger=document.form1.ad.value.replace(/\s/g, "-"); //yol_deger=document.form1.ad.value.replace(/\s/g, "-");
        yol_deger=lower(yol_deger);
        yol_deger=yol_deger.replace(/\++/g,'').replace(/[?\+]/g,'').replace(/[\/\+]/g,'').replace(/\s+/g, '-').replace(/[^\w/-]/g, '').toLowerCase();
        document.form1.htaccess_etiket.value=yol_deger; //document.form1.htaccess_etiket.value=yol_deger.toLowerCase();
    }
</script>
<?	 
		unset($_SESSION[$tablo_ismi.'ad']);
		unset($_SESSION[$tablo_ismi.'puan']);
		unset($_SESSION[$tablo_ismi.'aciklama']);
		unset($_SESSION[$tablo_ismi.'teknikozellikler']);
		unset($_SESSION[$tablo_ismi.'link']);
		unset($_SESSION[$tablo_ismi.'hata']);
		unset($_SESSION[$tablo_ismi.'fiyat']);
		unset($_SESSION[$tablo_ismi.'uzunluk']);
		unset($_SESSION[$tablo_ismi.'yukseklik']);
		unset($_SESSION[$tablo_ismi.'genislik']);
		unset($_SESSION[$tablo_ismi.'agirlik']);
		unset($_SESSION[$tablo_ismi.'guc']);
		unset($_SESSION[$tablo_ismi.'toplama_kapasitesi']);
		unset($_SESSION[$tablo_ismi.'gereken_hp']);
		unset($_SESSION[$tablo_ismi.'toplama_hortumu']);
		unset($_SESSION[$tablo_ismi.'toz_hortumu']);
		unset($_SESSION[$tablo_ismi.'saft_mili']);
		unset($_SESSION[$tablo_ismi.'vakum_uzakligi']);
   } 
else
   {
	  unset($_SESSION['yonet']);
	  include("error.php"); 
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>