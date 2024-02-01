<?  session_start();
$link_inherit='duzenle.php';
include("config.php");	
if (isset($_SESSION['yonet']))
   {
		include($uzaklik."inc_s/baglanti.php");
		//$syonetim=$_SESSION["siteyonetici"];
		//include("boyut_ogren.php");

		$max_file_size=substr($max_file_size,0,-3);
		include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		$haber_no=$_SESSION[$tablo_ismi.'haber_no'];
		$haber_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_ismi where numara='$haber_no'")->fetchAll(PDO::FETCH_ASSOC);
		$haber_adi=$haber_adi_ogren[0]["ad"];
		if (isset($_GET["detay_no"]))
		   {
				unset($_SESSION[$tablo_ismi."detay_no"]);	
				$detay_no=$_GET["detay_no"];
				$_SESSION[$tablo_ismi."detay_no"]=$detay_no;
		   }
		else
		   {
				$detay_no=$_SESSION[$tablo_ismi."detay_no"];
		   }
		$sql_cumlesi="select * from $tablo_ismi where numara='$detay_no'";																	
		$detay=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		if  (count($detay)<>0)
			{	  
				$icerik=stripslashes($detay[0]["icerik"]);
				$resim=$detay[0]["resim_adres"];
				$radyo_deger=$detay[0]["radiobutton"];			
				if ($resim=='') {$resim=$default_resim; }
				resim_yeniden_boyutlandir($kategori_thumb_resim_dizini,$resim,$kck_m_h,$kck_m_w);				
			}
		else
			{
				header('Location:kontrol.php');
			}																			
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
<script language="javascript">
function textCounter(field, countfield, maxlimit) 
	{
		if  (field.value.length > maxlimit)
			{
				field.value = field.value.substring(0, maxlimit);
			}
		else 
			{
				countfield.value = maxlimit - field.value.length;
			}
	}
</script>
<!--<script language="javascript" type="text/javascript" src="<? // print $uzaklik; ?>/tiny_mce/tiny_mce.js"></script>
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
</script> -->
</head>
<body class="animsition" onLoad="document.form1.ad.focus();">
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
                                            <li class="list-inline-item"><a href="kontrol.php"> Haber Detay Resimleri </a> &gt;</li>
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
                        <div class="row" style="background:#FFFFFF">
                        
                        
                            <table  class="table" border="0" align="center" bgcolor="#FFFFFF">
  <tr> 
    <form name="form1" method="post" action="duzenle_islem.php" enctype="multipart/form-data">
      <td valign="top"> 
        <table  border="0" align="center" cellpadding="3" cellspacing="5" style="max-width:923px">
          <tr>
            <td colspan="3" class="anabaslik">Haber Detay Resim Düzenle</td>
          </tr>
          <tr> 
            <td width="185"><input name="gizli" type="hidden" id="gizli" value="<? echo $detay_no; ?>">
            <input name="gizli2_ust_kategori_no" type="hidden" id="gizli2_ust_kategori_no" value="<? echo $haber_no; ?>"></td>
            <td colspan="2">
			<font color="#FF0000" class="hata1"> 
				<? 		
				if  (isset($_GET['err']))
				    {
						switch($_GET['err'])
						  {
							 case 'eksik_veri':  print("Tüm Alanları Doğru Bir Şekilde Doldurunuz!"); break;
							 case 'yanlis_tarih':  print("Tarih Formatında Hata Tesbit Edildi."); break;
							 case 'uzanti': print("Hatalı Resim Formatı"); break;
							 case 'boyut':  print("İzin Verilenden Büyük Dosya Boyutu"); break;
						  }
				   }
				if (isset($_GET["don"]))  { $mesaj="Lütfen daha küçük dosya seçiniz";   print($mesaj) ;  }											 
				?>
              </font></td>
          </tr>
         
          <tr>
            <td><span class="baslik">Ad</span></td>
            <td colspan="2" bgcolor="#F9F9F9">
              <? if (isset($_SESSION[$tablo_ismi.'icerik'])) {$icerik=$_SESSION[$tablo_ismi.'icerik'];   } ?>
              <? /* <textarea name="icerik" cols="90" rows="25" class="mceAdvanced"><? echo stripslashes($icerik); ?></textarea> */ ?>
              <input name="icerik" type="text" class="form-control"id="icerik"  onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" value="<? print($icerik); ?>" size="55" >            </td>
          </tr>
           <? if (1==2) { ?> 
          <tr>
            <td><strong class="baslik">Resmi Yasla </strong></td>
            <? if (isset($_SESSION[$tablo_ismi.'radyo'])) { $radyo_deger=$_SESSION[$tablo_ismi.'radyo'];} ?>
            <td colspan="2" bgcolor="#F9F9F9">
			<span class="form-control"> Sola Yasla </span>
                <input name="radyo" type="radio" value="Left" <? if ($radyo_deger=="Left"){ print "checked"; } ?>>
                <span class="form-control">Sağa Yasla</span>
                <input name="radyo" type="radio" value="Right"  <? if ($radyo_deger=="Right"){ print "checked"; } ?>>
                <span class="form-control">Aşağı Yasla</span>
                <input name="radyo" type="radio" value="Bottom"  <? if ($radyo_deger=="Bottom"){ print "checked"; } ?>></td>
          </tr>
          <? } ?>
          <tr>
            <td align="left" valign="middle">Resim</td>
            <td width="527" valign="middle"; bgcolor="#F9F9F9"> 
            <input name="resim" type="file" id="resim"  class="form-control" onFocus="pchange(this, 1);"  onblur="pchange(this, 0);" size="35">
            
            <span class="veri_tarih"><? echo $kck_m_w; ?>px*<? echo $kck_m_h; ?>px ve katları</span><br>

            <a href="<? print($kategori_thumb_resim_dizini.$resim); ?>" target="_blank">
            <img src="<? print($kategori_thumb_resim_dizini.$resim); ?>" width="400" border="0"></a> 
            </td>
           
          </tr>
          <tr> 
            <td height="32">&nbsp;</td>
            <td colspan="2">
              <input name="Submit" type="button" id="Submit" class="btn btn-success btn-sm" value="Kaydet" onClick="kontrol()">
              <input name="Submit2" type="button" id="Submit2"class="btn btn-info btn-sm"  value="Geri Dön" onClick="javascript:history.back()">			  </td>
          </tr>
         <? /*  <tr> 
            <td colspan="3">
            <table width="100%" border="0" align="center" cellpadding="2" cellspacing="4">
                <tr> 
                  <td width="79%">&nbsp;</td>
                  <td width="21%" valign="middle"><div align="left"><span class="veri_tarih">Max. Dosya Boyutu:<strong> <? print $max_file_size ?> kb </strong></span></div></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td valign="middle">&nbsp;</td>
                </tr>
              </table></td>
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
    <script src="<?   print $uzaklik; ?>ckeditor5/ckeditor.js"></script>
<!--<link type="text/css" href="<?  // print $uzaklik; ?>ckeditor5/sample/css/sample.css" rel="stylesheet" media="screen" /> -->
<script>
	ClassicEditor
		.create( document.querySelector( '#editor' ), {
			// toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
		} )
		.then( editor => {
			window.editor = editor;
		} )
		.catch( err => {
			console.error( err.stack );
		} );
</script>
</body>
</html>
<!-- end document-->


<script> function kontrol()	{document.form1.submit();}</script>
<?
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include("error.php");
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>