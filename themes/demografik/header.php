<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package demografik
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="section section__header">
        <div class="header--top">
            <div class="wrapper">

                <div class="top-nav">

                    <div class="stm-header__row stm-header__row_top">
                        <div class="stm-header__cell stm-header__cell_left">
                            <div class="stm-header__element stm-header__element_">

                                <div class="stm-logo lang-uz logo-uz">
                                    <a href="/">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/demo_logo.png" class="attachment-full size-full">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="stm-header__cell stm-header__cell_center">
                            <div class="stm-header__element stm-header__element_">
                                <div class="stm-icontext ">
                                    <div class="languages">
                                        <ul>
                                            <li><a href="#" class="link top-bar__help top-bar__link">Oʻz</a></li>
                                            <li><a href="#" class="link top-bar__help top-bar__link">Ўз</a></li>
                                            <li><a href="#" class="link top-bar__help top-bar__link">Ру</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="stm-header__element stm-header__element_icon_only">
                                <div class="stm-socials">
                                    <a href="#" class="stm-socials__icon icon_16px stm-socials__icon_icon_only" target="_blank">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#" class="stm-socials__icon icon_16px stm-socials__icon_icon_only" target="_blank">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                    <a href="#" class="stm-socials__icon icon_16px stm-socials__icon_icon_only" target="_blank">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                    <a href="#" class="stm-socials__icon icon_16px stm-socials__icon_icon_only" target="_blank">
                                        <i class="fa fa-paper-plane"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="stm-header__element stm-header__element_">
                                <div class="stm-text fwn">
                                    <a href="#" id="bvi-panel-show" class=" link top-bar__blind top-bar__link">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="stm-header__cell stm-header__cell_right">
                            <div class="stm-header__element stm-header__element_">
                                <div class="stm-logo ">
                                    <a href="https://moiti.uz/">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/moiti_logo.svg" class="attachment-full size-full">
                                        <span>“Mahalla va oila” ilmiy-tadqiqot instituti</span>
                                    </a>
                                </div>
                            </div>
                            <div class="stm-header__element stm-header__element_">
                                <div class="stm-logo">
                                    <a href="https://www.unfpa.org/">
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/unfpa_logo.png" class="attachment-full size-full">
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="header--bottom">

            <div class="wrapper">
                <nav class="nav-main">
                    <button class="nav__close" style="display: none;">

                        <span class="content">

                            <span class="text">Yopish</span>

                            <span class="icon__container">

                                <svg version="1.1" class="icon icon__close" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="4.9px"
                                    height="4.9px" viewBox="0 0 4.9 4.9" style="enable-background:new 0 0 4.9 4.9;"
                                    xml:space="preserve">

                                    <polygon class="st0"
                                        points="4.3,0 2.4,1.8 0.6,0 0,0.6 1.8,2.4 0,4.3 0.6,4.9 2.4,3 4.3,4.9 4.9,4.3 3,2.4 4.9,0.6 ">

                                    </polygon>

                                </svg>

                            </span>

                        </span>

                    </button>

                    <ul id="menu-primary-navigation" class="nav nav-pills">

                        <li class="menu-projects"><a href="#">Demografik passport</a></li>
                        <li class="menu-projects"><a href="#">Interaktiv xarita</a></li>
                        <li class="menu-projects dropdown">

                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" aria-expanded="false">Raqamli kutubxona</a>

                            <ul class="dropdown-menu dropdown-menu__primary">
                                <li id="menu-item-182" class="dropdown menu-about">
                                    <ul class="dropdown-menu dropdown-menu__secondary">
                                        <li class="menu-media-center"><a href="#">Raqamli kutubxona</a></li>
                                        <li class="menu-media-center"><a href="#">Xalqaro demografiya jurnali</a></li>
                                    </ul>

                                </li>

                            </ul>

                        </li>
                        <li class="menu-projects"><a href="#">Infografik materiallar</a></li>
                        <li class="menu-projects"><a href="#">Onlayn kurslar</a></li>
                        <li class="dropdown menu-about">
                            <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="#" aria-expanded="false">Biz haqimizda</a>

                            <ul class="dropdown-menu dropdown-menu__primary">
                                <li id="menu-item-182" class="dropdown menu-about">
                                    <ul class="dropdown-menu dropdown-menu__secondary">
                                        <li class="menu-media-center"><a href="#">Demografiya haqida</a></li>
                                        <li class="menu-media-center"><a href="#">Hamkorlik aloqalari</a></li>
                                        <li class="menu-contact-prb"><a href="#">Biz bilan bog'lanish</a></li>
                                    </ul>

                                </li>

                            </ul>

                        </li>



                    </ul>

                </nav>

            </div>

        </div>

        <button class="menu-toggle">Menu</button>

    </header>