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
     
	<SCRIPT language=JavaScript1.2 src="<? print $uzaklik; ?>_js/feedback.js"></SCRIPT>
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
                                            <li class="list-inline-item"><a href="../ypanel_proje_kategori/kontrol.php">Proje Kategorileri (<? echo $ust_kategori_adi; ?>)</a> &gt;</li>
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
                                        <i class="fas fa-boxes"></i>Proje Alt Kategorileri</h3>
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
                                                                <input type="hidden" name="ilkkayit" value="<? print $limit_ilk_deger; ?>" >				   
                                                                <input type="hidden" name="page" value="<? print $sayfa_no; ?>" >
                                                                <input name="tasi" id="tasi" type="submit" class="btn btn-primary btn-sm" value="Taşı">
                                                                <input name="aktiflestirme" type="submit" id="aktiflestirme" class="btn btn-danger btn-sm"  value="Aktif" >
                                                                <input name="sil" type="submit" id="sil" class="btn btn-info btn-sm"  value=" Sil " >
                                                                <input name="ekle" type="submit" id="ekle"  class="btn btn-warning btn-sm" value="Ekle" >
                                                        </td>
                                                      </tr>
                                            </thead>
                                           
                                            <thead>
                                                <tr>
                                                    <td>   <!--<label class="au-checkbox">
                                                            <input type="checkbox">
                                                            <span class="au-checkmark"></span>
                                                        </label> -->
                                                         				<table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:140px; padding:0; margin:0">
                                                                              <tr>
                                                                              	<td width="33%" style="border:0;padding:0; margin:0; ">Taşı</td>
                                                                                <td width="34%" style="border:0;padding:0; margin:0; ">Aktif</td>
                                                                                <td width="33%" style="border:0;padding:0;  margin:0; "> Sil </td>
                                                                          </tr>
                                                                            </table>
                                                        
                                                        
                                                        
                                                        </td>
                                                    
                                                    <td>   Adı </td>
                                                     <td>&nbsp;    </td>
                                                     <td>&nbsp;    </td>
                                                  <td>  Projeler </td>
                                                    <td>  Puan </td>
                                                    <td>  Düzenle </td>
                                                </tr>
                                            </thead>
                                           

                                            
                                            
                                            
                                            <tbody>
                                            
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
                                               
                                                                       <tr>
                                                                        <td>
                                                                            
                                                                            
                                                                           
                                                                            
                                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width:150px; padding:0; margin:">
                                                                              <tr>
                                                                              	<td width="33%" style="border:0;padding:0;  margin:0;  "><label class="au-checkbox">
                                                                                <input type="checkbox"  name="tasino[<? print($numara);?>]" id="tasino[<? print($numara);?>]" value="<? print($numara);?>" class="tselectedid">
                                                                                <span class="au-checkmark"></span>
                                                                            </label></td>
                                                                                <td width="34%" style="border:0;padding:0;  margin:0;  "><label class="au-checkbox">
                                                                                <input type="checkbox" <? if ($aktif=='1')  { print("checked"); }  ?> name="onay_no[<? print($numara);?>]" value="<? print($numara);?>" >
                                                                                <span class="au-checkmark"></span>
                                                                            </label></td>
                                                                                <td width="33%" style="border:0;padding:0;  margin:0;  "> <label class="au-checkbox">
                                                                                <input name="silinecekler_numara[<? print($numara);?>]" type="checkbox" id="silinecekler_numara[<? print($numara);?>]" value="<? print($numara);?>">
                                                                                <span class="au-checkmark"></span>
                                                                            </label></td>
                                                                              </tr>
                                                                            </table>

                                                                           
                                                                         

                                                                        </td>
                                                                        
                                                                        <td>
                                                                            <div class="table-data__info">
                                                                                <span><? print($ad); ?></span>
                                                                                <span> <a href="duzenle.php?alt_kategori=<? print($numara);?>&ust_kategori_no=<? print($ust_kategori_no);?>"  title="Düzenlemek için Tıklayınız"> <i class="fas fa-edit"></i> </a> </span>
                                                                            </div>
                                                                        </td>
                                                                        
                                                                        <td>
                                                                       		<?  
																			if ($resim<>"resimyok.gif") 
																			   { 
																		  ?>
																		  <a href="<? print($resim_dizini.$resim); ?>" target="_blank"> <i class="fas fa-eye"  title="Resmi Gör"  alt="Resmi Gör"></i></a>
																		   <? 
																				} 
																		   ?>
                                                                        </td>
                                                                         <td>
                                                                      
                                                                      
                                                                      <? if ($resim<>"resimyok.gif") { if ($uzanti=="jpeg" || $uzanti=="jpg" || $uzanti=="gif") { ?>
       
                  <a href="../crop2/icrop.php?file=<? echo $resim; ?>&dir=<? echo $klasor_adi; ?>&w=<? echo $kck_m_w; ?>&h=<? echo $kck_m_h; ?>"  target="_blank">
                  <i class="fas fa-crop"  alt="Resmi Yeniden Boyutlandır"  title="Resmi Yeniden Boyutlandır"></i></a><? } } ?>
                                                                      
                                                                      
                                                                        </td>
                                                                        
                                                                        
                                                                        <td>
                                                                            <!--<span class="role admin">aa</span> -->
                                                                            <a href="../ypanel_proje_detay/kontrol.php?alt_kategori=<? print($numara); ?>" class="veri_baslik">Proje Ekle / Düzenle <i class="fas fa-plus"></i></a>
                                                                        </td>
                                                                        <td>
                                                                            <div class="rs-select2--trans rs-select2--sm">
                                                                               <? /*  <select class="js-select2" name="property">
                                                                                    <option selected="selected">Daha Fazla</option>
                                                                                    <option value="">Puan: <? print($puan); ?></option>
                                                                                  <option value="">Dil: <? print($dil_aciklama);?></option> 
                                                                                </select>
                                                                                <div class="dropDownSelect2"></div> */ ?>
                                                                                 <? print($puan); ?>
                                                                            </div>
                                                                        </td>
                                                                       <td>
                                                                            <a href="duzenle.php?alt_kategori=<? print($numara);?>&ust_kategori_no=<? print($ust_kategori_no);?>">
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
                                            
                                           
                                                    
                                                    
                                                    
                                                    
                  									 
                                                    
                                                    <tr> 
                                                        <td style="border:0; ">
                                                                <input name="tasi2" id="tasi2" type="submit" class="btn btn-primary btn-sm" value="Taşı">
                                                                <input name="aktiflestirme2" type="submit" id="aktiflestirme2" class="btn btn-danger btn-sm"  value="Aktif" >
                                                                <input name="sil2" type="submit" id="sil2" class="btn btn-info btn-sm"  value=" Sil " >
                                                                <input name="ekle2" type="submit" id="ekle2"  class="btn btn-warning btn-sm" value="Ekle" >
                                                        </td>
                                                      </tr>
                                         
                                        

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