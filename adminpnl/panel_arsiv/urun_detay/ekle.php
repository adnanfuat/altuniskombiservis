<? session_start();
$link_inherit="ekle.php";
include("config.php");		  
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
	 	//include("boyut_ogren.php");
		
		$ustkategori_no=$_SESSION['ust_kategori_no'];
   		$altkategori=$_SESSION['alt_kategori'];
		$max_file_size=substr($max_file_size,0,-3);
		$ustkategori_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_adi where numara=$ustkategori_no")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_adi=$ustkategori_adi_ogren[0]["ad"];
		$altkategori_adi_ogren=@$baglanti->query("Select ad from $altkategori_tablo_adi where numara=$altkategori")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_adi=$altkategori_adi_ogren[0]["ad"];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style6 {font-size: 12px}
.style7 {font-size: 10px}
.style10 {color: #000000}
</style>
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
<body  onLoad="javascript:document.form1.ad.focus()">
<table width="950" border="0" align="center" cellpadding="3" cellspacing="0">
  <tr> 
    <td width="3%" class="td_anabaslik"><div align="left"><img src="../pictures/banner.gif" width="48" height="48"></div></td>
    <td width="97%" class="td_anabaslik">
    <font class="veri_ana_baslik"><a href="../anaframe.php" class="veri_ana_baslik">Kontrol Panel</a> &gt;
	<a href="../urun_kategori/kontrol.php" class="veri_ana_baslik">Ürün Kategorileri (<? print($ustkategori_adi); ?>)</a> &gt;
	<a href="../urun_altkategori/kontrol.php" class="veri_ana_baslik">Ürün Alt Kategorileri (<? print($altkategori_adi);?>)</a> &gt; 
	<a href="kontrol.php" class="veri_ana_baslik">Ürünler</a> &gt;</font>	</td>
  </tr>
</table>
<table width="950" border="0" align="center" bgcolor="#FFFFFF" cellspacing="0">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top"> 
        <div align="center">
          <table width="944" border="0" align="center" cellpadding="4" cellspacing="6">
            <tr>
              <td colspan="2" class="anabaslik">Ürün Ekle</td>
            </tr>
            <tr> 
              <td>&nbsp;</td>
              <td width="725">
              <font class="hata1"> 
			  <? 		
					if  (isset($_GET['err']))
					    {
							switch($_GET['err'])
							  {
								 case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
								 case 'resimboyut':print("Büyük Dosya Boyutu ya da Desteklenmeyen Resim Formatı"); break;
								 case 'yanlis_tarih':print("Tarih Formatında Hata Tesbit Edildi."); break;
								 case 'uzanti':print("Hatalı Resim Formatı");	break;
								 case 'boyut':print("İzin Verilenden Büyük Dosya Boyutu"); break;
								 case 'etiket': print("Bu İsimde Bir Etiket Daha Önce Eklendi, Lütfen Başka Bir İsim Seçin"); break;
							 }
					    }
					if  (isset($_GET["don"])) 
						{ 
							$mesaj="Lütfen daha küçük dosya seçiniz"; print($mesaj);   
						}
             ?>
			 </font>             </td>
            </tr>
            <tr> 
              <td width="185"><span class="baslik"> Ad *</span> </td>
              <td bgcolor="#F9F9F9">
				<?  if (isset($_SESSION[$tablo_ismi.'n_ad'])) {$ad=$_SESSION[$tablo_ismi.'n_ad']; }  ?>                
                <input name="ad" type="text" id="ad"  value="<? if (isset($ad)) { print($ad); }?>" class="textbox1" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" onKeyUp="yoltanimla();">
                <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">              
                <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
                        {
                            $hata=$_SESSION[$tablo_ismi.'n_hata'];	if (isset($hata[1]) && $hata[1]==1 ) { echo 'Ürün Adını Giriniz';}
                        }
                ?>
                </font>                </td>
            </tr>
            <tr> 
            <td width="127" class="baslik">Htaccess Etiket *</td>
            <td bgcolor="#F9F9F9">
			<? if (isset($_SESSION[$tablo_ismi.'htaccess_etiket'])) { $htaccess_etiket=$_SESSION[$tablo_ismi.'htaccess_etiket']; } ?>
            <input name="htaccess_etiket" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($htaccess_etiket)) {echo $htaccess_etiket; }?>" size="55">              </td>
          </tr>
            <tr>
              <td><span class="baslik">Sıralama Puanı</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_puan'])) {$puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
              <input name="puan" type="text" id="puan" value="<? if (isset($puan)) { print($puan); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="10" >
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
			  <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
                    {
                          $hata=$_SESSION[$tablo_ismi.'n_hata'];	if (isset($hata[4]) && $hata[4]==1 ) { echo 'Ürün Puanını Giriniz';}
                    }
              ?>
              </font></td>
            </tr>
            
         <? /*   <tr>
              <td class="baslik">Açıklama</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_aciklama'])) {$aciklama=$_SESSION[$tablo_ismi.'n_aciklama']; } ?>
              <textarea name="aciklama" cols="80" rows="25" class="mceAdvanced"><? if (isset($aciklama)) { print $aciklama; } ?></textarea>
              <font size="1" face="Verdana, Arial, Helvetica, sans-serif" color="#FF0000">
                <? if (isset($_SESSION[$tablo_ismi.'n_hata'])) 
					  {
							$hata=$_SESSION[$tablo_ismi.'n_hata'];
							if (isset($hata[6]) && $hata[6]==1 ) { echo 'Ürün Açıklamasını Giriniz';}
					  }
				?>
              </font>              </td>
            </tr>  */ ?>
           
            <tr> 
            <td width="185"><strong class="baslik">Ürün Kodu</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_urun_kodu'])) { $urun_kodu=$_SESSION[$tablo_ismi.'n_urun_kodu']; } ?>
			  <input name="urun_kodu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($urun_kodu)) {echo $urun_kodu; }?>"   size="55">            </td>
          </tr>
           
            <tr> 
            <td width="185"><strong class="baslik">Barkod Numarası</strong></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_fiyat'])) { $fiyat=$_SESSION[$tablo_ismi.'n_fiyat']; } ?>
              <input name="fiyat" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($fiyat)) {echo $fiyat; }?>"  size="55" ></td>
          </tr>
          
         	<tr> 
                <td width="185"><strong class="baslik">Hammadde</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_uzunluk'])) { $uzunluk=$_SESSION[$tablo_ismi.'n_uzunluk']; } ?>
                  <input name="uzunluk" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($uzunluk)) {echo $uzunluk; }?>" size="55">                </td>
           </tr>

            <tr> 
                <td width="185"><strong class="baslik"> Koli İçi Adet</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'n_yukseklik']; } ?>
                  <input name="yukseklik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="55">                </td>
            </tr>
           
            <tr> 
                <td width="185"><strong class="baslik"> Paket Ölçüleri</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_genislik'])) { $genislik=$_SESSION[$tablo_ismi.'n_genislik']; } ?>
                  <input name="genislik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="55">                </td>
           </tr>
           
            <tr> 
                <td width="185"><strong class="baslik"> Koli Ağırlığı</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_agirlik'])) { $agirlik=$_SESSION[$tablo_ismi.'n_agirlik']; } ?>
                  <input name="agirlik" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($agirlik)) { echo $agirlik; }?>" size="55">                </td>
            </tr>
        <? if (1==2) { ?>      
            <tr> 
                <td width="185"><strong class="baslik">Güç</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_guc'])) { $guc=$_SESSION[$tablo_ismi.'n_guc']; } ?>
                  <input name="guc" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($guc)) { echo $guc; }?>" size="55">                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toplama Kapasitesi</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toplama_kapasitesi'])) { $toplama_kapasitesi=$_SESSION[$tablo_ismi.'n_toplama_kapasitesi']; } ?>
                  <input name="toplama_kapasitesi" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_kapasitesi)) { echo $toplama_kapasitesi; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Gereken HP</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_gereken_hp'])) { $gereken_hp=$_SESSION[$tablo_ismi.'n_gereken_hp']; } ?>
                  <input name="gereken_hp" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($gereken_hp)) { echo $gereken_hp; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toplama Hortumu</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toplama_hortumu'])) { $toplama_hortumu=$_SESSION[$tablo_ismi.'n_toplama_hortumu']; } ?>
                  <input name="toplama_hortumu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toplama_hortumu)) { echo $toplama_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Toz Hortumu</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_toz_hortumu'])) { $toz_hortumu=$_SESSION[$tablo_ismi.'n_toz_hortumu']; } ?>
                  <input name="toz_hortumu" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($toz_hortumu)) { echo $toz_hortumu; }?>" >                </td>
            </tr>
            
            <tr> 
                <td width="185"><strong class="baslik">Şaft Mili</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_saft_mili'])) { $saft_mili=$_SESSION[$tablo_ismi.'n_saft_mili']; } ?>
                  <input name="saft_mili" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($saft_mili)) { echo $saft_mili; }?>" >                </td>
            </tr>
            
               <tr> 
                <td width="185"><strong class="baslik">Vakum Uzaklığı</strong></td>
                <td bgcolor="#F9F9F9">
                  <? if (isset($_SESSION[$tablo_ismi.'n_vakum_uzakligi'])) { $vakum_uzakligi=$_SESSION[$tablo_ismi.'n_vakum_uzakligi']; } ?>
                  <input name="vakum_uzakligi" type="text" class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($vakum_uzakligi)) { echo $vakum_uzakligi; } ?>" >                </td>
              </tr>
            
            
                      
            
            
            
          
            
            
         <tr>
              <td><span class="baslik">Depolama ve Ambalaj Bilgileri</span></td>
              <td bgcolor="#F9F9F9">
			  <? if (isset($_SESSION[$tablo_ismi.'n_link'])) {$link=$_SESSION[$tablo_ismi.'n_link']; } ?>
             <? /* <input name="link" type="text" id="link" value="<? if (isset($link)) { print($link); }?>"  class="textbox1"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55" > */ ?>
			<textarea name="link" cols="80" rows="25" class="mceAdvanced"><? if (isset($link)) { print $link; } ?></textarea>            </td>
            </tr> 
           <? } ?>
           
           
       <? /*     <tr>
                <td valign="top"><span class="baslik">Fiyat</span></td>
                <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_fiyat'])) {$fiyat=$_SESSION[$tablo_ismi.'n_fiyat']; } ?>
                <input name="fiyat" type="text" id="fiyat" value="<? if (isset($fiyat)) { print($fiyat); }?>"   class="textbox1"  onfocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="15"> 
                <span class="veri_baslik">TL</span>
                </td>
            </tr>             
            
            <tr>
              <td class="baslik">Teknik Değerler</td>
              <td bgcolor="#F9F9F9">
                <? if (isset($_SESSION[$tablo_ismi.'n_teknikozellikler'])) {$teknikozellikler=$_SESSION[$tablo_ismi.'n_teknikozellikler']; } ?>
              <textarea name="teknikozellikler" cols="80" rows="25" class="mceAdvanced"><? if (isset($teknikozellikler)) { print $teknikozellikler; } ?></textarea>
              </td>
            </tr>*/ ?>

            
            <tr> 
              <td width="185"><span class="baslik">Büyük İçi Resim </span></td>
              <td bgcolor="#F9F9F9">
              <input name="resim" type="file"  class="textbox1" id="resim"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
			  <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span>              </td>
            </tr>
            <tr>
              <td><span class="baslik">Küçük Ön Resim </span></td>
              <td><input name="resim2" type="file"  class="textbox1" id="resim2"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            
            
            <tr>
              <td><span class="baslik">Detay Resim 1</span></td>
              <td><input name="resim3" type="file"  class="textbox1" id="resim3"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            
            <tr>
              <td><span class="baslik">Detay  Resim 2</span></td>
              <td><input name="resim4" type="file"  class="textbox1" id="resim4"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="55">
                <span class="veri_tarih"> Örnek Boyutlar: <? echo $byk_m_w; ?>px*<? echo $byk_m_h; ?>px ve katları </span> </td>
            </tr>
            
            <tr>
              <td colspan="2">&nbsp;</td>
            </tr>
            <tr> 
              <td></td>
              <td><input name="kaydet" type="button" class="dugmeler_ekle" value="Kaydet"  onClick="kontrol()">
                <input name="Submit2" type="button" class="dugmeler_sil" value="Geri Dön" onClick="javascript:history.back()"></td>
            </tr>
            <tr> 
              <td colspan="2">
              <table width="924" border="0" align="center" cellpadding="2" cellspacing="4">
                  <tr> 
                    <td width="719" valign="middle"></td>
                    <td width="185" valign="middle"><font class="veri_tarih">Max. Dosya Boyutu: <strong> <? print $max_file_size ?> kb </strong></font></td>
                  </tr>
              </table>              </td>
            </tr>
          </table>
      </div>
      </td>
    </form>
  </tr>
</table>
</body>
</html>
<script>
function kontrol() { document.form1.submit(); }
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
     } 
  else 
	 {
		  unset($_SESSION['yonet']);
		  include("error.php"); 
	 }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadir.
?>