<? session_start();
$link_inherit="kontrol.php";
include("config.php");		  
include($uzaklik."inc_s/baglanti.php");
//print_r ($_GET);
if  (isset($_SESSION['yonet']))
    {
	  	if  (isset($_GET['haber_no']))
		  	{
		  		unset($_SESSION[$tablo_ismi.'haber_no']);	
				$haber_no=$_GET['haber_no'];
				$_SESSION[$tablo_ismi.'haber_no']=$haber_no;
			}
     	else
		    {
		    	$haber_no=$_SESSION[$tablo_ismi.'haber_no'];
		    }
		  include($uzaklik."inc_s/sayfa_no_belirle.php");
		 // $syonetim=$_SESSION["siteyonetici"];
		  if (isset($_SESSION[$tablo_ismi.'icerik'])) {unset($_SESSION[$tablo_ismi.'icerik']);}
		  if (isset($_SESSION[$tablo_ismi.'radyo'])) {unset($_SESSION[$tablo_ismi.'radyo']);}
		  include($uzaklik."inc_s/resim_yeniden_boyutlandir_motor.php");
		  include($uzaklik."inc_s/resim_yeniden_boyutlandir.php");
		  $limit_ilk_deger=($sayfa_no-1)*$bir_sayfadaki_toplam_kayit_sayisi;
		  $sql_cumlesi="select numara from $tablo_ismi where haber_no='$haber_no'";
		  $calistir_sql=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);																																																			
		  $toplam_kayit_sayisi_calistir_sql=count($calistir_sql);
		  include($uzaklik."inc_s/sayfalama.php");
		  sayfala($toplam_kayit_sayisi_calistir_sql,$bir_sayfadaki_toplam_kayit_sayisi);
		  $sql_cumlesi="select * from $tablo_ismi where haber_no='$haber_no' order by numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi ";
		  //echo "select * from $tablo_ismi where haber_no='$haber_no' order by numara asc limit $limit_ilk_deger,$bir_sayfadaki_toplam_kayit_sayisi";
		  $recordset=@$baglanti->query($sql_cumlesi)->fetchAll(PDO::FETCH_ASSOC);
		  $toplam_kayit_sayisi=count($recordset);
		  $kategori_no=$_SESSION[$ustkategori_tablo_ismi."kategori"];
		  $haber_adi_ogren=@$baglanti->query("Select ad from $ustkategori_tablo_ismi where numara='$haber_no'")->fetchAll(PDO::FETCH_ASSOC);
		  if (count($haber_adi_ogren)>0) 
			 {
					$haber_adi=$haber_adi_ogren[0]["ad"];
			 }
		  else
			 {
				  header("Location:../haberler/kontrol.php"); 	
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
     
<script type="text/javascript" src="<? echo $uzaklik; ?>_js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<? echo $uzaklik; ?>highslide/highslide-with-html.js"></script>
<link rel="stylesheet" type="text/css" href="<? echo $uzaklik; ?>highslide/highslide.css" />
<script type="text/javascript">hs.graphicsDir = '<? echo $uzaklik; ?>highslide/graphics/'; hs.outlineType = 'rounded-white'; hs.objectWidth=screen.width-70; hs.width=screen.width-100;
	hs.objectHeight=screen.height-120; hs.height=screen.height-150;</script>
       
</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <? include ("../inc_kpanel_menusidebar.php");?>
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP--> <!-- BREADCRUMB-->
            <?  include ("../inc_kpanel_header.php");?>
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
                                            <li class="list-inline-item"><a href="../ypanel_haberler/kontrol.php" >Haberler (<? echo stripslashes($haber_adi); ?>)</a> &gt; </li>
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
                                        <i class="far fa-images"></i> Haber Detay Resimleri</h3>
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
                                                        		<div align="left" style="padding-left:40px"><font size="1" face="Verdana, Arial, Helvetica, sans-serif"><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
                                                        		  <? include("navigation.php"); ?>
                                                        		</font></font></div>
                                     <? } ?>
                                       
                                        <table class="table">
                                            <thead>
                                                    <tr> 
                                                        <td style="border:0; ">
                                                                <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >				   
                                                                <input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
                                                                <!--<input name="tasi" id="tasi" type="submit" class="btn btn-primary btn-sm" value="Taşı"> -->
                                                                <!--<input name="vitrin" type="submit" id="vitrin" class="btn btn-primary btn-sm" value="Yeni" style="background:#009966"> -->
                                                             <? /*  <input name="aktif" type="submit" id="aktif" class="btn btn-danger btn-sm"  value="Aktif" >
                                                                   
                                                                
                                                                <button  name="ekle" type="submit" id="ekle"  class="btn btn-warning btn-sm" title="Ekle"> <i class="fas fa-plus"></i> </button> */ ?>
                                                                
                                                                
                                                                <input name="sil" type="submit" id="sil" class="btn btn-info btn-sm"  value=" Sil " >


                                                                <input name="ekle" type="submit" id="ekle"  class="btn btn-warning btn-sm" value="Ekle" >                                                     </td>
                                                      </tr>
                                            </thead>
                                           
                                            <thead>
                                                <tr>
                                                    <td>   <!--<label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label> -->
                                                         				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:65px; padding:0; margin:0">
                                                                              <tr>
                                                                              	<!--<td width="25%" style="border:0;padding:0; margin:0; ">Aktif</td> -->
                                                                                <td width="25%" style="border:0;padding:0;  margin:0; "> Sil </td>
                                                                          </tr>
                                                                            </table>                                                  </td>
                                                    
                                                    <td>   Adı </td>
                                                    <td>   Resimler </td>
                                                 
                                                   <!-- <td>  Diğer Detaylar </td> -->
                                                    <td>  Düzenle </td>
                                                </tr>
                                            </thead>
                                           

                                            
                                            
                                            
                                            <tbody>
                                            
                                            			<? $klasor_adi=substr($resim_dizini,strrpos(substr($resim_dizini,0,-1),"/",-1)+1,-1);
				$klasor_adi_thumb=substr($kategori_thumb_resim_dizini,strrpos(substr($kategori_thumb_resim_dizini,0,-1),"/",-1)+1,-1);
				for ($sayac=0; $sayac<$toplam_kayit_sayisi; $sayac++)
					{
						$icerik=$recordset[$sayac]["icerik"]; if (strlen($icerik)>400) { $icerik=substr($icerik,0,400).".."; }
						$resim=$recordset[$sayac]["resim_adres"];
						$numara=$recordset[$sayac]["numara"];
						if ($resim=='') {$resim=$default_resim; }
						if ($sayac%2==0) {$tr_back="#F5F5F5";} else {$tr_back="#FFFFFF";}	
						$uzanti_baslangic=strrpos($resim,".");
						$uzanti=substr($resim,$uzanti_baslangic+1);
															?>
                                               
                                                                       <tr id="kayit_div_<? print($numara);?>">
                                                                        <td>
                                                                            
                                                                            
                                                                           
                                                                            
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:75px; padding:0; margin:">
                                                                              <tr>
                                                                              <? if (1==2) {  ?>	<td width="25%"  style="border:0;padding:0;  margin:0;  ">
                                                                                
                                                                                
                                                                                <? /* <label class="au-checkbox">
                                                                                <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                                                                                <span class="au-checkmark"></span>
                                                                            </label>*/ ?>
                                                                             <label class="switch">
                                                                                  <input type="checkbox" <? if ($aktif=='1')  { ?>checked<? } else {   ?> <? } ?> 
                                                                                  name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" id="aktif_<? print($numara);?>" onClick="aktif_pasif('<? print($numara);?>','<? echo $tablo_ismi?>')">
                                                                                  <span class="slider round"></span>
                                                                                </label>
                                                                            
                                                                            
                                                                            </td> <? } ?>
                                                                                <td  width="25%" style="border:0;padding:0;  margin:0;  "> 
                                                                                
                                                                                <label class="au-checkbox">
                                                                                <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                                                                                <span class="au-checkmark"></span>
                                                                            </label>
                                                                            
                                                                            <? /*   <i class="fas fa-trash-alt" onClick="kayit_sil('<? echo $tablo_ismi; ?>','<? echo $numara; ?>','<? echo $resim_dizini; ?>')" 
                                                                                style="color:#666666; cursor:pointer;" title="Sil"></i>*/ ?>
                                                                            
                                                                            </td>
                                                                              </tr>
                                                                            </table>                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <div class="table-data__info">
                                                                                <span><? print(stripslashes($icerik)); ?></span>
                                                                                <span> <a href="duzenle.php?detay_no=<? print($numara);?>"  title="Düzenlemek için Tıklayınız"> <i class="fas fa-edit"></i> </a> </span>                                                                            </div> 
                                                                                
                                                                                <td>
                                                                            <div class="table-data__info">
                                                                           
                    <img src="<? print $kategori_thumb_resim_dizini.$resim; ?>" height="<? print $yeni_yukseklik; ?>" style="max-width:100px" border="0">                                                                          </div> 
                                                                                
                                                                                 </td>
                                                                       
                                                                      <? /*  <td>
                                                                            <div class="rs-select2--trans rs-select2--sm">
                                                                              <select class="js-select2" name="property">
                                                                                <option selected="selected">Daha Fazla</option>
                                                                                <option value="">Puan: <? echo $siralama; ?></option>
                                                                                <!--<option value="">Barkod <? echo $fiyat; ?></option>  -->
                                                                              </select>
                                                                              <div class="dropDownSelect2"></div>
                                                                            </div>                                                                        </td> */ ?>
                                                                       <td>
                                                                            <a href="duzenle.php?detay_no=<? print($numara);?>">
                                                                            <span class="more">
                                                                                <i class="fas fa-edit"></i>                                                                            </span>                                                                            </a>                                                                        </td> 
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
                                                                <a >johndoe@gmail.com</a>
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
                                                                <a >johndoe@gmail.com</a>
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
                                                                <a >johndoe@gmail.com</a>
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
                                                                <a >johndoe@gmail.com</a>
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
function isChecked(checkboxId) { var id = '#' + checkboxId; return $(id).is(":checked"); }
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