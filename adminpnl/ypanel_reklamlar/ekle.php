<? session_start();
$link_inherit="ekle.php";
include("config.php");
if (isset($_SESSION['yonet']))
   {
		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/baglanti.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <!-- Title Page-->
    <title><? echo $title; ?></title>
	<? include ("../inc_kpanel_css.php");?>
	<? /* <style type="text/css">
    body {	background-color: #EFEFEF;	margin-left: 0px;	margin-top: 0px;	margin-right: 0px;	margin-bottom: 0px;}
    .style3 {	color: #132C6A;	font-weight: bold;}.style10 {color: #333333; font-weight: bold; font-size: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; }
    </style>
    <link href="../css/kontrolpanel.css" rel="stylesheet" type="text/css">
    <style type="text/css">.style5 {color: #D24400;	font-weight: bold;}</style>
    <script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>
     */ ?> 
      <script language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></script>  
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <? include ("../inc_kpanel_menusidebar.php");?>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP--> <!-- BREADCRUMB-->
            <? include ("../inc_kpanel_header.php");?>
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <!--<span class="au-breadcrumb-span">You are here:</span> -->
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="<? echo $panel_uzaklik; ?>anaframe2.php">Kontrol Paneli</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item"><a href="kontrol.php">Sliderlar</a> &gt;</li>
                                        </ul>
                                    </div>
                                    <!--<button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END HEADER DESKTOP--><!-- END BREADCRUMB-->
            <!-- STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        
                        
                            <table class="table">
  <tr> 
    <form name="form1" method="post" action="ekle_islem.php" enctype="multipart/form-data">
      <td  valign="top" bordercolor="#C0C0C0" bgcolor="#FFFFFF"   > 
        <table width="100%" border="0" align="center" cellpadding="4" cellspacing="6" style="max-width:923px">
        <tr>
            <td colspan="2" class="anabaslik">Slider Ekle</td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td>
            <font color="#FF0000" size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
			<? 		
            if (isset($_GET['err']))
               {
                    switch($_GET['err'])
                      {
                         case 'eksik_veri':print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
                         case 'yanlis_tarih': print("Tarih Formatında Hata Tesbit Edildi."); break;
                         case 'uzanti': print("Hatalı Resim Formatı"); break;
                         case 'boyut': print("İzin Verilenden Büyük Dosya Boyutu"); break;
                      }
              }
            ?>
            </font>            </td>
          </tr>
          <tr> 
            <td ><font class="baslik"> Adı *</font></td>
            <td bgcolor="#F9F9F9">
            <? if (isset($_SESSION[$tablo_ismi.'n_ad'])) { $ad=$_SESSION[$tablo_ismi.'n_ad']; } ?>
			<input name="ad" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($ad)) {echo $ad; }?>" size="55" >            </td>
          </tr>
          <tr>
            <td><font class="baslik"> Altbilgi</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_altbilgi'])) { $altbilgi=$_SESSION[$tablo_ismi.'n_altbilgi']; } ?>
              <input name="altbilgi" type="text" id="altbilgi"  value="<? if (isset($altbilgi)) {echo $altbilgi; }?>"  class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >           </td>
          </tr>
          <? /**/ ?>
          <tr>
            <td><font class="baslik"> Link</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_link'])) { $link=$_SESSION[$tablo_ismi.'n_link']; } ?>
              <input name="link" type="text" id="link"  value="<? if (isset($link)) {echo $link; }?>"  class="form-control" size="55"  onBlur="pchange(this, 0);" onFocus="pchange(this, 1);" >            </td>
          </tr>
		  
          <tr>
            <td><font class="baslik">Genişlik *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_genislik'])) { $genislik=$_SESSION[$tablo_ismi.'n_genislik']; } ?>
              <input name="genislik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($genislik)) {echo $genislik; }?>" size="10" >
             <? /*  <span class="veri_tarih">Tavsiye Edilen : <? echo $width_of_image; ?>px</span> */ ?> </td>
          </tr>
          <tr>
            <td><font class="baslik">Yükseklik *</font></td>
            <td bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'n_yukseklik'])) { $yukseklik=$_SESSION[$tablo_ismi.'n_yukseklik']; } ?>
              <input name="yukseklik" type="text" class="form-control"  onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" value="<? if (isset($yukseklik)) {echo $yukseklik; }?>" size="10" >
             <? /*  <span class="veri_tarih">Tavsiye Edilen : <? echo $height_of_image; ?>px</span> */ ?></td>
          </tr>
          <tr>
            <td><font class="baslik"> Puan</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_puan'])) { $puan=$_SESSION[$tablo_ismi.'n_puan']; } ?>
                <input name="puan" type="text" class="form-control"  onFocus="pchange(this,1);"  onBlur="pchange(this,0);" value="<? if (isset($puan)) {echo $puan; }?>" size="10" ></td>
          </tr>
          <tr>
            <td><font class="baslik">Dil *</font></td>
            <td bgcolor="#F9F9F9"><? if (isset($_SESSION[$tablo_ismi.'n_dil'])) { $dil=$_SESSION[$tablo_ismi.'n_dil']; } ?>
                <select name="dil" class="form-control">
                 <option value="1" <? if ($dil==1) { ?> selected="selected" <? } ?>>Türkçe </option>
                 <option value="2" <? if ($dil==2) { ?> selected="selected" <? } ?>>İngilizce </option> 
                 <!--<option value="3" <? if ($dil==3) { ?> selected="selected" <? } ?>>Almanca </option> 
                 <option value="4" <? if ($dil==2) { ?> selected="selected" <? } ?>>Rusça </option> --> 
                </select>            </td>
          </tr>
          <tr> 
            <td><font class="baslik">Resim *</font></td>
            <td bgcolor="#F9F9F9">
              <input name="resim" type="file" class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">            </td>
            </tr>
        
        <? /* 
        
          <tr>
            <td><font class="baslik">Ürün Resim</font></td>
            <td bgcolor="#F9F9F9"><input name="resim2" type="file" class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">            </td>
            </tr>
          <tr>
            <td><font class="baslik">Logo/Marka  Resim</font></td>
            <td bgcolor="#F9F9F9"><input name="resim3" type="file" class="form-control" onFocus="pchange(this, 1);"  onBlur="pchange(this, 0);" size="46">            </td>
            </tr>
            
          */ ?>  
            
          <tr> 
            <td height="32">&nbsp;</td>
            <td>
              <input name="Submit" type="button" class="btn btn-success btn-sm" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" class="btn btn-info btn-sm" value="Geri Dön" onClick="javascript:history.back()">            </td>
          </tr>
          <tr>
            <td height="32">&nbsp;</td>
            <td>                                        <div align="left">
                                            <span style="font-size:12px">Önerilen Ölçüler: <strong><? print $width_of_image ?>px * <? print $height_of_image ?>px</strong></span> 
											<span style="font-size:12px">Max. Dosya Boyutu: <strong><? print $max_file_size ?> kb</strong></span>
                                        </div></td>
          </tr>
         <? /*  <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr valign="bottom" bordercolor="#FFFFFF"> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle" >
				    <div align="left"><span class="veri_tarih">Max. Dosya Boyutu: <strong><? print $max_file_size ?> kb</strong></span></div></td>
                </tr>
            </table>            </td>
         </tr> */ ?>
      </table>
      </td>
    </form>
  </tr>
</table>
                            
                        </div>
                    </div>
                </div>
            </section>



            
          
          
            
            
            <!-- END STATISTIC-->
			<? /* 
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-8">
                                <!-- RECENT REPORT 2-->
                                <div class="recent-report2">
                                    <h3 class="title-3">recent reports</h3>
                                    <div class="chart-info">
                                        <div class="chart-info__left">
                                            <div class="chart-note">
                                                <span class="dot dot--blue"></span>
                                                <span>products</span>
                                            </div>
                                            <div class="chart-note">
                                                <span class="dot dot--green"></span>
                                                <span>Services</span>
                                            </div>
                                        </div>
                                        <div class="chart-info-right">
                                            <div class="rs-select2--dark rs-select2--md m-r-10">
                                                <select class="js-select2" name="property">
                                                    <option selected="selected">All Properties</option>
                                                    <option value="">Products</option>
                                                    <option value="">Services</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                            <div class="rs-select2--dark rs-select2--sm">
                                                <select class="js-select2 au-select-dark" name="time">
                                                    <option selected="selected">All Time</option>
                                                    <option value="">By Month</option>
                                                    <option value="">By Day</option>
                                                </select>
                                                <div class="dropDownSelect2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="recent-report__chart">
                                        <canvas id="recent-rep2-chart"></canvas>
                                    </div>
                                </div>
                                <!-- END RECENT REPORT 2             -->
                            </div>
                            <div class="col-xl-4">
                                <!-- TASK PROGRESS-->
                                <div class="task-progress">
                                    <h3 class="title-3">task progress</h3>
                                    <div class="au-skill-container">
                                        <div class="au-progress">
                                            <span class="au-progress__title">Web Design</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="90">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">HTML5/CSS3</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="85">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">WordPress</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="95">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">Support</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="95">
                                                    <span class="au-progress__value js-value"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TASK PROGRESS-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>type</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role admin">admin</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role user">user</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option value="">Full Control</option>
                                                                <option value="" selected="selected">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>lori lynch</h6>
                                                            <span>
                                                                <a href="yeni_panel_assets/#">johndoe@gmail.com</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="role member">member</span>
                                                    </td>
                                                    <td>
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                <option selected="selected">Full Control</option>
                                                                <option value="">Post</option>
                                                                <option value="">Watch</option>
                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="more">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            <div class="col-xl-6">
                                <!-- MAP DATA-->
                                <div class="map-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-map"></i>map data</h3>
                                    <div class="filters">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Worldwide</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="map-wrap m-t-45 m-b-80">
                                        <div id="vmap" style="height: 284px;"></div>
                                    </div>
                                    <div class="table-wrap">
                                        <div class="table-responsive table-style1">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>United States</td>
                                                        <td>$119,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Australia</td>
                                                        <td>$70,261.65</td>
                                                    </tr>
                                                    <tr>
                                                        <td>United Kingdom</td>
                                                        <td>$46,399.22</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="table-responsive table-style1">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Germany</td>
                                                        <td>$20,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>France</td>
                                                        <td>$10,366.96</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Russian</td>
                                                        <td>$5,366.96</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MAP DATA-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
			*/ ?>
            <? include ("../inc_kpanel_footer.php");?>
            <!-- END PAGE CONTAINER-->
        </div>
    </div>
	<? include ("../inc_kpanel_js.php");?>
</body>
</html>
<!-- end document-->




<script>
function kontrol()
	{
		if (document.form1.ad.value=="" || document.form1.resim.value=="")
			{																
				alert("L�tfen Gerekli Alanlar� Giriniz");
			}
		else if (document.form1.genislik.value != parseInt(document.form1.genislik.value))
			{
				alert("L�tfen  Geni�lik De�erini Kontrol Ediniz");	
			}		
		else if ( document.form1.yukseklik.value != parseInt(document.form1.yukseklik.value))
			{
				alert("L�tfen  Y�lseklik De�erini Kontrol Ediniz");	
			}
		else
			{
				document.form1.submit();
			}		
	}
</script>
<?
	 }
  else 
	 {
		 unset($_SESSION['yonet']);
		 include('error.php');
	 }  //  (f)izinsiz girisleri engellemek i�in  kullanilmaktadir.
?>