<?php
include_once("../system/main.php");

use jesuzweq\ZFunctions;

$userInfo = ZFunctions::getUserViaSession();

?>

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>assets/images/bbs.png" alt="" height="10">
            </span>
            <span class="logo-lg">
                <img src="<?= SITEURL ?>assets/images/bbs.png" alt="" height="13">
            </span>
        </a>
        <!-- Light Logo-->
        <a class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= SITEURL ?>assets/images/bbs.png" alt="" height="40">
            </span>
            <span class="logo-lg">
                <style>
                    .logo-lg:hover {
                        transition: 500ms;
                        filter: brightness(0.7);
                        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                        -webkit-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=40)";
                    }

                    .logo-lg {
                        width: 100%;
                        transition: 500ms;
                    }
                </style>
                <img src="<?= SITEURL ?>assets/images/bbs.png" alt="120" height="120">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">

        <div class="container-fluid">
            <div data-simplebar>

                <!-- Sorgu Menu Start -->
                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">
                    <li class="menu-title"><span data-key="t-sorgu">SiberSube</span></li>
                    <li class="nav-item">

                        <a class="nav-link menu-link" href="panel">
                            <i class="ri-home-6-fill"></i> <span data-key="t-panel">Ana Sayfa <span
                                    class="badge rounded-pill badge-soft-light">v2</span></span>
                        </a>
                    </li> <!-- end Sorgu Menu -->

                    <li class="menu-title"><span data-key="t-sorgular">Sorgular</span></li>

                     <!-- SORGULAR SECTION -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarSorgular" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarSorgular">
                            <i class="ri-user-6-fill"></i> <span data-key="adsoyad">Sorgular</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarSorgular">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adsoyad" class="nav-link" data-key="t-adsoyad"> Ad Soyad Sorgu <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>

                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcsorgu" class="nav-link" data-key="t-tcsorgu"> TC Sorgu<span class="badge rounded-pill badge-soft-success">2023</span> </a>
                                </li>
                            </ul>


                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="aile" class="nav-link" data-key="t-aile"> Aile Sorgu <span class="badge rounded-pill badge-soft-success">Pro</span> </a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="sulale" class="nav-link" data-key="t-sulale"> Sülale Sorgu <span class="badge rounded-pill badge-soft-success">Pro</span> </a>
                                </li>

                                <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="soyagaci" class="nav-link" data-key="t-soyagaci"> Soyağacı Sorgu <span class="badge rounded-pill badge-soft-success">Pro</span> </a>
                                </li>
                            

                        </div>

                    </li>

                                         <!-- GSM SECTION -->
                                         <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarGSM" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarDashboards">
                            <i class="ri-phone-fill"></i> <span data-key="gsmsorgu">GSM Sorgu</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarGSM">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="gsmtc" class="nav-link" data-key="t-gsmtc"> GSM->TC Sorgu <span class="badge rounded-pill badge-soft-success">Pro</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcgsm" class="nav-link" data-key="t-tcgsm"> TC->GSM Sorgu <span class="badge rounded-pill badge-soft-success">Pro</span></a>
                                </li>
                            </ul>
                        </div>
						

                    </li>

						 <!-- Adres -->
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebaradres" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebaradres">
                            <i class="ri-user-location-fill"></i> <span data-key="sidebarardes">Adres</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebaradres">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="adres" class="nav-link" data-key="t-sidebaradres"> Adres Sorgu <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>

                        </div>

                    </li>
                    						 <!-- Vesika -->
                                             <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarvesika" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarvesika">
                            <i class="ri-image-2-fill"></i> <span data-key="sidebarardes">Vesika</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarvesika">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="eokulvesika" class="nav-link" data-key="t-sidebarvesika"> -18 Vesika <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ehliyetvesika" class="nav-link" data-key="t-sidebarvesika"> +18 Vesika <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="aolvesika" class="nav-link" data-key="t-sidebarvesika"> AÖL Vesika <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            

                        </div>

                    </li>
                                        						 <!-- Vesika -->
                                                                 <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarokul" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarokul">
                            <i class="ri-book-2-fill"></i> <span data-key="sidebarardes">Okul</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarokul">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="okul" class="nav-link" data-key="t-sidebarokul"> Okul NO - Durum<span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            

                        </div>

                    </li>
						 <!-- Sağlık -->
                         <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarsaglik" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarsaglik">
                            <i class="ri-hospital-fill"></i> <span data-key="sidebarsaglik">Sağlık</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarsaglik">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="ilac" class="nav-link" data-key="t-sidebarsaglik"> İlaç <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="muayene" class="nav-link" data-key="t-sidebarsaglik"> Muayene <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="asi" class="nav-link" data-key="t-sidebarsaglik"> Aşı <span class="badge rounded-pill badge-soft-success">2023</span></a>
                                </li>
                            </ul>
                            

                        </div>

                    </li>
                    <!-- VIP -->
						
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarvip" data-bs-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="sidebarvip">
                            <i class="ri-vip-diamond-fill"></i> <span data-key="sidebarvip">VIP</span>
                        </a>

                        <div class="collapse menu-dropdown" id="sidebarvip">
                        <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="tcdetay" class="nav-link" data-key="t-sidebarvip"> TCDETAY <span class="badge rounded-pill badge-soft-success">ALLAH</span></a>
                                </li>
                            </ul>

                        </div>

                    </li>
                    <!-- GSM SECTION END -->
                    <!-- VESIKA SECTION END -->
                    <?php if($userInfo['userRole'] == 1) {?>
                    <!-- ADMIN SECTION -->
                    <li class="nav-item">
                    <li class="menu-title"><span data-key="t-adminSidebar">ADMIN</span></li>
                    <a class="nav-link menu-link" href="#sidebarAdmin" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-admin-fill"></i> <span data-key="t-adminSidebar">Admin</span>
                    </a>

                    <div class="collapse menu-dropdown" id="sidebarAdmin">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="announcement" class="nav-link" data-key="t-announcementPost"> Duyuru Paylaşımı
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="users" class="nav-link" data-key="t-Kullanıcılar"> Kullanıcılar </a>
                            </li>
                        </ul>
                    </div>
                    </li>

                    <?php } ?>
                    <!-- ADMIN SECTION END -->
                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
<div class="vertical-overlay"></div>