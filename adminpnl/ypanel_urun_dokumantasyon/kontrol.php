<?	session_start();
$link_inherit="kontrol.php";
include("config.php");	
include($uzaklik."inc_s/baglanti.php");
if (isset($_SESSION['yonet']))
   {
		if (isset($_GET["numara"]))
		   {
			  $urun_numara=$_GET["numara"];  //echo $urun_numara;
			  if (isset($_SESSION[$tablo_ismi."urun_numara"])) { unset($_SESSION[$tablo_ismi."urun_numara"]); }
			  $_SESSION[$tablo_ismi."urun_numara"]=$urun_numara;
		   }
		else
		   {
			  $urun_numara=$_SESSION[$tablo_ismi."urun_numara"]; 
		   }

	  include($uzaklik."inc_s/sayfa_no_belirle.php");
	  $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
	  $sql_cumlesi="select numara from $tablo_ismi where urun_no='$urun_numara'";
	  $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
	  $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
	  include($uzaklik."inc_s/sayfalama.php");
	  sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
	  $sql_cumlesi="select * from $tablo_ismi where urun_no='$urun_numara' order by numara desc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
	  $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
	  $toplam_kayit_sayisi=count($recordset);

	
		$urun_ogren=@$baglanti->query("Select ad,ustkategori_no,altkategori_no from urun_detay where  numara=$urun_numara")->fetchAll(PDO::FETCH_ASSOC);
		$ustkategori_no=$urun_ogren[0]["ustkategori_no"];
		$altkategori_no=$urun_ogren[0]["altkategori_no"];
		$urun_ad=$urun_ogren[0]["ad"]; //echo "aaaa".$urun_ad;
		$kategori_ogren=@$baglanti->query("Select ad from urun_kategori where numara='$ustkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$kategori_ad=$kategori_ogren[0]["ad"];
	
		$altkategori_ogren=@$baglanti->query("Select ad from urun_altkategori where numara='$altkategori_no'")->fetchAll(PDO::FETCH_ASSOC);
		$altkategori_ad=$altkategori_ogren[0]["ad"];

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
     <SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>js/feedback.js"></SCRIPT>  
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
                                           <li class="list-inline-item"><a href="../ypanel_urun_kategori/kontrol.php" >Ürün Kategorileri (<? echo $kategori_ad; ?>)</a> &gt;
	<a href="../ypanel_urun_altkategori/kontrol.php" >Ürün Alt Kategorileri (<? echo $altkategori_ad; ?>)</a> &gt; 
	<a href="../ypanel_urun_detay/kontrol.php"   ><? echo $urun_ad; ?></a> &gt;	
	</li> 
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
                        
                        
                            <div class="col-xl-12">
                                <!-- USER DATA-->
                                <div class="user-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                       <i class="fas fa-file-image"></i> Ürün Dosyaları</h3>
                                       <? /*  <div class="filters m-b-45">
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
                                        </div> */ ?>
                                    <div class="table-responsive table-data">
                                     <form  name="xxx" action="kontrol_islem.php" method="post">
                                       <?
                                                if  ( $toplam_kayit_sayisi>0)
                                                    {
                                       ?> 
                                       
                                       
                                       					<? 
                                                            if ($toplam_sayfa_sayisi>1) {
                                                       ?>
                                                        		<div align="left" style="padding-left:40px">
                                                                    <font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                                                                    	<? include("navigation.php"); ?>
                                                                    </font>
                                                                </div>
                                                        <? } ?>
                                       
                                    <table class="table">
                                            <thead>
                                                    <tr> 
                                                        <td style="border:0; ">
                                                                
                                                                <input name="aktiflestirme" type="submit" id="aktiflestirme" class="btn btn-danger btn-sm" value="Aktif">
                                                                <input name="sil" type="submit" id="sil" class="btn btn-info btn-sm"  value=" Sil " >
                                                                <input name="ekle" type="submit" id="ekle"  class="btn btn-warning btn-sm" value="Ekle" >
                                                                <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >				   
                                                                <input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
                                                        </td>
                                              </tr>
                                            </thead>
                                           
                                            <thead>
                                                <tr>
                                                    <td>   <!--<label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label> -->
                                                         				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:60px; padding:0; margin:0">
                                                                              <tr>
                                                                                <td style="border:0;padding:0; margin:0; ">Aktif</td>
                                                                                <td style="border:0;padding:0;  margin:0; "> Sil </td>
                                                                              </tr>
                                                      </table>
                                                        
                                                        
                                                        
                                                  </td>
                                                    
                                                    <td>  Dosya </td>
                                                    <td>  Link </td>
                                                    <!--<td>  Diğer Detaylar </td> -->
                                                    <td>  Düzenle </td>
                                                </tr>
                                            </thead>
                                           

                                            
                                            
                                            
                                            <tbody>
                                            
																		 <?
                                                                             for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
                                                                                 {
                                                                                    $dosya=$recordset[$sayac]["dosya"];
                                                                                    $ad=$recordset[$sayac]["ad"];
                                                                                    $aktif=$recordset[$sayac]["aktif"];
                                                                                    $numara=$recordset[$sayac]["numara"];	
                                                                                    $dil=$recordset[$sayac]["dil"];
                                                                                    switch ($dil)
                                                                                           {		
                                                                                                case 1: $dil_aciklama="Türkçe"; break;
                                                                                                case 2: $dil_aciklama="İngilizce"; break;
                                                                                           }			
                                                                           ?>
                                               
                                                                       <tr>
                                                                        <td>
                                                                            
                                                                            
                                                                           
                                                                            
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:75px; padding:0; margin:">
                                                                              <tr>
                                                                                <td style="border:0;padding:0;  margin:0;  "><label class="au-checkbox">
                                                                                <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                                                                                
                                                                                <span class="au-checkmark"></span>
                                                                            </label></td>
                                                                                <td style="border:0;padding:0;  margin:0;  "> <label class="au-checkbox">
                                                                                <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                                                                                <span class="au-checkmark"></span>
                                                                            </label></td>
                                                                              </tr>
                                                                            </table>

                                                                           
                                                                         

                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <div class="table-data__info">
                                                                                <span><? print($ad); ?></span>
                                                                                <span> <a href="duzenle.php?numara=<? print($numara);?>"  title="Düzenlemek için Tıklayınız"> <i class="fas fa-edit"></i> </a> </span>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <!--<span class="role admin">aa</span> -->
                                                                            <div align="left"><a href="<? print($dosya_dizini.$dosya); ?>" target="_blank" title="Görmek için tıklayınız">
                                                          					<i class="fas fa-file-image"></i></a> <span><? print $resim; ?></span>
                                                                            </div>
                                                                        </td>
                                                                      <? /*   <td>
                                                                            <div class="rs-select2--trans rs-select2--sm">
                                                                                <select class="js-select2" name="property">
                                                                                    <option selected="selected">Daha Fazla</option>
                                                                                    <option value="">Puan: <? print($puan); ?></option> 
                                                                                    <option value="">Dil: <? print($dil_aciklama);?></option>
                                                                                </select>
                                                                                <div class="dropDownSelect2"></div>
                                                                            </div>
                                                                        </td>  */ ?>
                                                                       <td> 
                                                                            <a href="duzenle.php?numara=<? print($numara);?>">
                                                                            <span class="more">
                                                                                <i class="fas fa-edit"></i>
                                                                            </span>
                                                                            </a>
                                                                        </td> 
                                                                    </tr>
                                              
                                             			<?
                                                              }
                                                        ?>
                                              
                                            </tbody>
                                        

                                        </table>
                                        
                                        <?
                                            }  
                                         elseif  ($toplam_kayit_sayisi==0)
                                           {
                                        ?>
                                                   <div align="center">
                                                    <div align="center">
                                                              <p>&nbsp;</p>
                                                              <p class="style5">&nbsp;</p>
                                                              <p class="kayit_yok">Bu kategoride kayıt bulunamamıştır. </p>
                                                              <p class="style5">&nbsp;</p>
                                                              <p class="style5">&nbsp;</p>
                                                              <p class="style5">&nbsp;</p>
                                                              <p>
                                                                <input name="ilkkayit" type="hidden" id="ilkkayit" value="<? print $limit_ilk_deger; ?>" >
                                                                <input name="ekle" type="submit" id="ekle" class="btn btn-warning btn-sm"  value="Ekle" >
                                                              </p>
                                                              <p>&nbsp;</p>
                                                     </div>
                                       </div>
                                        <?
                                           }
                                        ?>
                                     </form>   
                                    </div>

                                </div>
                                <!-- END USER DATA-->
                            </div>
                            
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






<? 
   } 
else 
   {
	  unset($_SESSION['yonet']);
	  include('error.php');
   }  //  (f)izinsiz girisleri engellemek için  kullanilmaktadr.
?>