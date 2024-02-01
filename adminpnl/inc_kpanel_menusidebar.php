<? include("modul_config.php"); ?>
<aside class="menu-sidebar2">
            <div class="logo">
                <a href="<? echo $panel_uzaklik; ?>anaframe2.php">
                    <img src="<? echo $panel_uzaklik; ?>yeni_panel_assets/images/icon/proweb_logo.png"   />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="<? echo $panel_uzaklik; ?>yeni_panel_assets/images/icon/avatar-big-01.jpg" alt="" />
                    </div>
                    <!--<h4 class="name">john doe</h4> --><!--<br>

                    <a href="yeni_panel_assets/#">Çıkış</a> -->
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Bölümler
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                             <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: block;">
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
                                <? if ($galeri_modulu==1) { ?>
								 <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_galeri_kategori/kontrol.php">
                                        <i class="fas fa-images"></i>Foto Galeri Yönetimi</a>
                                </li>
								<? } ?>
                                <? if ($hizmet_modulu==1) { ?>
                                <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_hizmet_kategori/kontrol.php">
                                        <i class="fas fa-cog"></i> Hizmet Yönetimi</a>
                                </li>
                                <? } ?>
                                <? if ($iletisim_modulu==1) { ?>
                              	<li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_iletisim/kontrol.php">
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
                                        <i class="fas fa-pencil-alt"></i>Ziyaretçi Defteri</a>
                                </li>
                                <? } ?>
                                <? if ($video_modulu==1) { ?>
                                <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_video/kontrol.php">
                                        <i class="fas fa-file-video"></i>Video Yönetimi</a>
                                </li>
                                <? } ?>
                                <? if ($referans_modulu==1) { ?>
                                <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_kategorisiz_referanslar/kontrol.php">
                                        <i class="fas fa-briefcase"></i>Referans Yönetimi</a>
                                </li>
                                <? } ?>
                                <? if ($maillist_modulu==1) { ?> 
								<li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_mail_list/kontrol.php">
                                         <i class="fas fa-list"></i>Maillist Yönetimi</a>
                                </li>
                                <? } ?>
								<? if ($proje_modulu==1) { ?>
								<li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_proje_kategori/kontrol.php">
                                        <i class="fas fa-boxes"></i>Proje Yönetimi</a>
                                </li> 
                                <? } ?>
                                <? if ($ekatalog_modulu==1) { ?>
                                 <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon/kontrol.php">
                                        <i class="fas fa-file-pdf"></i>e-Katalog Yönetimi</a>
                                </li>
                                <? } ?>
                                <? if ($dosya_modulu==1) { ?>
                                <li>
                                    <a href="<? echo $panel_uzaklik; ?>ypanel_dokumantasyon2/kontrol.php">
                                        <i class="fas fa-link"></i>Dosya Yönetimi</a>
                                </li>
                                <? } ?>
                                <? if ($kullanici_modulu==1) { ?>
                                <li>
                                    <a href="#" style="color:#CCCCCC">
                                        <i class="fas fa-users"></i>Kullanıcı Yetkilendirme</a>
                                </li>
                                <? } ?>
                            </ul> 
                       
                       
                        </li>
                        
                        <? /*
                        <li>
                            <a href="#">

                                <i class="fas fa-chart-bar"></i>Ana Sayfa Slider</a>
                            <!--<span class="inbox-num">3</span> -->
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