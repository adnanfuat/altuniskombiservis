
<header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="<? echo $panel_uzaklik; ?>anaframe2.php">
                                    <img src="<? echo $panel_uzaklik; ?>yeni_panel_assets/images/icon/proweb_logo2.png" style="max-width:150px" alt="Proweb Mühendislik Web Site Yönetim Paneli" />
                                </a>
                            </div>
                            <div class="header-button2">
                                
                                
                                <? /* 
                                <div class="header-button-item js-item-menu">
                                    <i class="zmdi zmdi-search"></i>
                                    <div class="search-dropdown js-dropdown">
                                        <form action="">
                                            <input class="au-input au-input--full au-input--h65" type="text" placeholder="Search for datas &amp; reports..." />
                                            <span class="search-dropdown__icon">
                                                <i class="zmdi zmdi-search"></i>
                                            </span>
                                        </form>
                                    </div>
                                </div>
                                <div class="header-button-item has-noti js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have 3 Notifications</p>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-email-open"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a email notification</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c2 img-cir img-40">
                                                <i class="zmdi zmdi-account-box"></i>
                                            </div>
                                            <div class="content">
                                                <p>Your account has been blocked</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__item">
                                            <div class="bg-c3 img-cir img-40">
                                                <i class="zmdi zmdi-file-text"></i>
                                            </div>
                                            <div class="content">
                                                <p>You got a new file</p>
                                                <span class="date">April 12, 2018 06:50</span>
                                            </div>
                                        </div>
                                        <div class="notifi__footer">
                                            <a href="yeni_panel_assets/#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
								*/ ?>
                                
                                
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <? if ($slider_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                           <a href="<? echo $panel_uzaklik; ?>ypanel_reklamlar/kontrol.php">
                                                <i class="fas fa-images"></i>Slider Yönetimi</a>
                                        </div>
                                        <? } ?> 
                                        <? if ($urun_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_urun_kategori/kontrol.php">
                                            <i class="fas fa-boxes"></i>Ürün Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($hizmet_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_hizmet_kategori/kontrol.php">
                                            <i class="fas fa-cog"></i> Hizmet Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($galeri_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_galeri_kategori/kontrol.php">
                                            <i class="fas fa-images"></i>Foto Galeri Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($referans_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                           <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_referanslar/kontrol.php">
                                                <i class="fas fa-briefcase"></i>Referans Yönetimi</a>
                                        </div>
										<? } ?>
                                        <? if ($maillist_modulu==1) { ?>
										<div class="account-dropdown__item">
                                           <a href="<?  echo $panel_uzaklik; ?>ypanel_mail_list/kontrol.php" >
                                                <i class="fas fa-list"></i>Maillist Yönetimi</a>
                                        </div>
                                        <? } ?>
										<? if ($proje_modulu==1) { ?>
										<div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_proje_kategori/kontrol.php">
                                            <i class="fas fa-boxes"></i>Proje Yönetimi</a>
                                        </div>
										<? } ?>
                                        <? if ($ekatalog_modulu==1) { ?>
                                         <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon/kontrol.php">
                                                <i class="fas fa-file-pdf"></i>e-Katalog Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($dosya_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon2/kontrol.php">
                                                <i class="fas fa-link"></i> Dosya Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($iletisim_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                           <a href="<?  echo $panel_uzaklik; ?>ypanel_iletisim/kontrol.php" >
                                                <i class="fas fa-phone"></i>İletişim Bilgileri Yönetimi</a>
                                        </div>
										<? } ?>
                                        <? if ($formmail_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_maillist/kontrol.php">
                                                <i class="fas fa-envelope"></i>Form Mail Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($haber_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_haberler/kontrol.php">
                                                <i class="fas fa-file-alt"></i>Haber Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($yenisayfa_etiket_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_etiketler/kontrol.php">
                                                <i class="fas fa-file-alt"></i>Yeni Sayfa Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($video_modulu==1) { ?>
                                        <div class="account-dropdown__item">
                                           <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_video/kontrol.php">
                                                <i class="fas fa-file-video"></i>Video Yönetimi</a>
                                        </div>
                                        <? } ?>
                                        <? if ($ziyaretci_defteri_modulu==1) { ?>
                                         <div class="account-dropdown__item">
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_ziyaretci_defteri/kontrol.php">
                                                <i class="fas fa-pencil-alt"></i> Ziyaretçi Defteri</a>
                                        </div>
										<? } ?>
                                        <? if ($kullanici_modulu==1) { ?>
                                       <div class="account-dropdown__item">
                                             <a href="#"  style="color:#CCCCCC">
                                                <i class="fas fa-users"></i>Kullanıcı Yetkilendirme</a>
                                        </div> 
                                        <? } ?>
                                        
                                    </div>
                                   <? /*  <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="yeni_panel_assets/#">
                                                <i class="zmdi zmdi-globe"></i>Language</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="yeni_panel_assets/#">
                                                <i class="zmdi zmdi-pin"></i>Location</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="yeni_panel_assets/#">
                                                <i class="zmdi zmdi-email"></i>Email</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="yeni_panel_assets/#">
                                                <i class="zmdi zmdi-notifications"></i>Notifications</a>
                                        </div>
                                    </div> */ ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="yeni_panel_assets/#">
                        <img src="<? echo $panel_uzaklik; ?>yeni_panel_assets/images/icon/proweb_logo2.png" alt="" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<? echo $panel_uzaklik; ?>yeni_panel_assets/images/icon/avatar-big-01.jpg" alt="" />
                        </div>
                        <h4 class="name">&nbsp;</h4>
                        <!--<a href="yeni_panel_assets/#">Çıkış</a> -->
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="active has-sub">
                                <a class="js-arrow" href="yeni_panel_assets/#">
                                    <i class="fas fa-tachometer-alt"></i>Bölümler
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display:block;">
                                       <? if ($slider_modulu==1) { ?>
                                       	<li>
                                             <a href="<? echo $panel_uzaklik; ?>ypanel_reklamlar/kontrol.php">
                                                <i class="fas fa-images"></i>Slider Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($urun_modulu==1) { ?>
                                        <li>
                                        <a href="<? echo $panel_uzaklik; ?>ypanel_urun_kategori/kontrol.php">
                                            <i class="fas fa-boxes"></i>Ürün Yönetimi</a> 
                                        </li>
                                        <? } ?>
                                        <? if ($hizmet_modulu==1) { ?>
                                        <li>
                                               <a href="<? echo $panel_uzaklik; ?>ypanel_hizmet_kategori/kontrol.php">
                                                <i class="fas fa-cog"></i>Hizmet Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($galeri_modulu==1) { ?>
                                         <li>
                                             <a href="<? echo $panel_uzaklik; ?>ypanel_galeri_kategori/kontrol.php">
                                                <i class="fas fa-images"></i>Foto Galeri Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($referans_modulu==1) { ?>
                                         <li>
                                             <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_referanslar/kontrol.php">
                                                <i class="fas fa-briefcase"></i>Referans Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($video_modulu==1) { ?>
                                         <li>
                                           <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_video/kontrol.php">
                                                <i class="fas fa-file-video"></i>Video Yönetimi</a>
                                        </li>
                                        <? } ?>
                                       	<? if ($proje_modulu==1) { ?>  
                                        <li>
                                        <a href="<? echo $panel_uzaklik; ?>ypanel_proje_kategori/kontrol.php">
                                            <i class="fas fa-boxes"></i>Proje Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($maillist_modulu==1) { ?>   
                                        <li>
                                           <a href="<?  echo $panel_uzaklik; ?>ypanel_mail_list/kontrol.php" >
                                                <i class="fas fa-list"></i>Maillist Yönetimi</a>
                                        </li>
										<? }  ?>
                                        <? if ($ekatalog_modulu==1) { ?>
                                        <li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon/kontrol.php">
                                                <i class="fas fa-file-pdf"></i>e-Katalog Yönetimi</a>
                                        </li>
                                     	<? } ?>
                                        <? if ($dosya_modulu==1) { ?>
                                        <li>
                                        <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon2/kontrol.php">	<i class="fas fa-link"></i>Dosya Yönetimi</a>
                                        </li>
                                        <? } ?>
                                         <? if ($iletisim_modulu==1) { ?>
                         				 <li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_iletisim/kontrol.php" >
                                                <i class="fas fa-phone"></i>İletişim Bilgileri Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($formmail_modulu==1) { ?>
                                         <li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_maillist/kontrol.php">
                                                <i class="fas fa-envelope"></i>Form Mail Yönetimi</a>
                                        </li>
                                        <? } ?>
                                        <? if ($haber_modulu==1) { ?>
                                         <li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_haberler/kontrol.php">
                                                <i class="fas fa-file-alt"></i>Haber Yönetimi</a>
                                  		</li>
                                        <? } ?>
                                        <? if ($yenisayfa_etiket_modulu==1) { ?>
                                         <li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_etiketler/kontrol.php">
                                                <i class="fas fa-file-alt"></i>Yeni Sayfa Yönetimi</a>
                                 		 </li>
                                         <? } ?>
                                        
                                   		<? if ($ziyaretci_defteri_modulu==1) { ?>
                               			<li>
                                            <a href="<? echo $panel_uzaklik; ?>ypanel_ziyaretci_defteri/kontrol.php">
                                            <i class="fas fa-pencil-alt"></i> Ziyaretçi Defteri</a>
                                        </li>
		                                 <? } ?>
                                        
                                      <? if ($kullanici_modulu==1) { ?>
                                      <li>
                                            <a href="#"  style="color:#CCCCCC">
                                                <i class="fas fa-users"></i>Kullanıcı Yetkilendirme</a>
                                        </li>
                                      <? } ?>
                              </ul>
                            </li>
                           
                            <? /* 
                           
                            <li>
                                <a href="yeni_panel_assets/inbox.html">
                                    <i class="fas fa-chart-bar"></i>Inbox</a>
                                <span class="inbox-num">3</span>
                            </li>
                            <li>
                                <a href="yeni_panel_assets/#">
                                    <i class="fas fa-shopping-basket"></i>eCommerce</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="yeni_panel_assets/#">
                                    <i class="fas fa-trophy"></i>Features
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="yeni_panel_assets/table.html">
                                            <i class="fas fa-table"></i>Tables</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/form.html">
                                            <i class="far fa-check-square"></i>Forms</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/#">
                                            <i class="fas fa-calendar-alt"></i>Calendar</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/map.html">
                                            <i class="fas fa-map-marker-alt"></i>Maps</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="yeni_panel_assets/#">
                                    <i class="fas fa-copy"></i>Pages
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="yeni_panel_assets/login.html">
                                            <i class="fas fa-sign-in-alt"></i>Login</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/register.html">
                                            <i class="fas fa-user"></i>Register</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/forget-pass.html">
                                            <i class="fas fa-unlock-alt"></i>Forget Password</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="yeni_panel_assets/#">
                                    <i class="fas fa-desktop"></i>UI Elements
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="yeni_panel_assets/button.html">
                                            <i class="fab fa-flickr"></i>Button</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/badge.html">
                                            <i class="fas fa-comment-alt"></i>Badges</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/tab.html">
                                            <i class="far fa-window-maximize"></i>Tabs</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/card.html">
                                            <i class="far fa-id-card"></i>Cards</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/alert.html">
                                            <i class="far fa-bell"></i>Alerts</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/progress-bar.html">
                                            <i class="fas fa-tasks"></i>Progress Bars</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/modal.html">
                                            <i class="far fa-window-restore"></i>Modals</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/switch.html">
                                            <i class="fas fa-toggle-on"></i>Switchs</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/grid.html">
                                            <i class="fas fa-th-large"></i>Grids</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/fontawesome.html">
                                            <i class="fab fa-font-awesome"></i>FontAwesome</a>
                                    </li>
                                    <li>
                                        <a href="yeni_panel_assets/typo.html">
                                            <i class="fas fa-font"></i>Typography</a>
                                    </li>
                                </ul>
                            </li>
							
							*/ ?>
                            
                            
                            
                            
                        </ul>
                    </nav>
                </div>
            </aside>
            