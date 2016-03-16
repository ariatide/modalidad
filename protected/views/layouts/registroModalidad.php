<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
    <!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
    <!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
        <head>

            <meta charset="utf-8" />
            <title>Modalidades de Graduación</title>
            <meta name="description" content="">
                <meta name="author" content="">
                    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/base.css" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/skeleton.css" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/layout.css" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/child.css" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/jquery.ui.autocomplete.css" />
                    <link media="screen" charset="utf-8" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/jquery.ui.datepicker.css" />
                    <link href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/nivo-slider.css" rel="stylesheet" type="text/css" />
                    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/animate.min.css" type="text/css" media="screen" charset="utf-8" />
                    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />



                    <!--[if (IE 6)|(IE 7)]>
                        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/ie.css" type="text/css" media="screen" />
                    <![endif]-->
                    <!--[if lt IE 9]>
                        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                    <![endif]-->

                    <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery-1-8-2.js"></script>
                    <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery-1.8.2.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/default.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.easing.1.3.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.carousel.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.color.animation.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.nivo.slider.pack.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery-ui.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.ui.datepicker.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.ui.autocomplete.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.prettyPhoto.js" charset="utf-8"></script>

                    <!-- color pickers -->
                    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/colorpicker.css" />
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/colorpicker.js"></script>
                    <!-- end of color pickers -->


                    </head>

                    <body><div class="page-wrapper">
                            <div class="slug-pattern slider-expand"><div class="overlay"><div class="slug-cut"></div></div></div>
                            <div class="header">
                                <div class="nav">
                                    <div class="container">
                                        <!-- Standard Nav (x >= 768px) -->
                                        <div class="standard">

                                            <div class="five column alpha">

                                            </div>

                                            <div class="eleven column omega tabwrapper">
                                                <div class="menu-wrapper">
                                                    <ul class="tabs menu">

                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl('../'); ?>" > Modalidades de Graduacion</a>
                                                        </li>

                                                        <li>
                                                            <?php if (!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('encargado')) { ?>
                                                                <a href="<?php echo Yii::app()->createUrl('administrador'); ?>"> Admin  </a>
                                                            <?php }
                                                            ?>
                                                        </li>

                                                        <li>
                                                            <?php if (Yii::app()->user->isGuest) { ?>
                                                                <a href="<?php echo Yii::app()->user->ui->loginUrl ?>"> Login  </a>
                                                            <?php }
                                                            ?>
                                                        </li>
                                                        <li>
                                                            <?php if (!Yii::app()->user->isGuest) { ?>
                                                                <a href="<?php echo Yii::app()->user->ui->logoutUrl ?>"> Logout  </a>
                                                            <?php }
                                                            ?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Standard Nav Ends, Start of Mini -->

                                        <div class="mini">

                                            <div class="twelve column alpha omega navagation-wrapper">
                                                <select class="navagation">
                                                    <option value="" selected="selected">MENU</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- Start of Mini Ends -->
                                    </div> 

                                </div>

                                <div class="shadow"></div>
                                <div class="container">
                                    <div class="page-title">
                                        <div class="rg"></div>
                                        <h1>Modalidades</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="body">
                                <div class="body-round"></div>
                                <div class="body-wrapper">
                                    <div class="side-shadows"></div>
                                    <div class="content">


                                        <div class="callout-hr"></div>                        
                                        <div class="container">


                                            <?php echo $content; ?>

                                            <div class="four columns">
                                                <div class="sidebar">
                                                    <div class="sideborder"></div>
                                                    <h5>Tipos de Titulacion</h5>
                                                    <ul class="blogs">
                                                        <li>
                                                            <div class="border">
                                                                <img src=<?php echo Yii::app()->request->baseUrl . "/images/modalidades/tesis.png"; ?> />
                                                                <a class='link' href=<?php echo Yii::app()->createUrl("/modalidades/tesisDescarga") ?> /></a>
                                                            </div>
                                                            <p>
                                                                <a href=<?php echo Yii::app()->createUrl("/modalidades/tesisDescarga") ?> />Tesis</a>
                                                                ...................
                                                                <span>September 27, 2012</span>
                                                            </p>
                                                            <div class="clear"></div>
                                                        </li>

                                                        <li>
                                                            <div class="border">
                                                                <img src=<?php echo Yii::app()->request->baseUrl . "/images/modalidades/TD.png"; ?> />
                                                                <a class='link' href=<?php echo Yii::app()->createUrl("/modalidades/dirigidoDescarga") ?> /></a>
                                                            </div>
                                                            <p>
                                                                <a href=<?php echo Yii::app()->createUrl("/modalidades/dirigidoDescarga") ?> />Trabajo dirigido</a>
                                                               ...................
                                                                <span>Noviembre, 2013</span>
                                                            </p>
                                                            <div class="clear"></div>
                                                        </li>

                                                        <li>
                                                            <div class="border">
                                                                <img src=<?php echo Yii::app()->request->baseUrl . "/images/modalidades/ADS.png"; ?> />
                                                                <a class='link' href=<?php echo Yii::app()->createUrl("/modalidades/adscripcionDescarga") ?> /></a>
                                                            </div>
                                                            <p>
                                                                <a href=<?php echo Yii::app()->createUrl("/modalidades/adscripcionDescarga") ?> />Adscripcion</a>
                                                                ....................
                                                                <span>Noviembre, 2013</span>
                                                            </p>
                                                            <div class="clear"></div>
                                                        </li>
                                                    </ul>

                                                    <?php
                                                    if (Yii::app()->user->checkAccess('auxiliar') ||
                                                            Yii::app()->user->checkAccess('encargado')) {
                                                        ?>
                                                        <ul>
                                                            <h5>Registrar</h5>
                                                            <div class="standard-form compressed" >
                                                                <div class="sdt_box">
                                                                    <?php
                                                                    $carreras = Carrera::model()->findAll();
                                                                    foreach ($carreras as $carrera):
                                                                        ?>

                                                                        <div class="row">

                                                                            <h5><strong><a class="label" href="#"><?php echo $carrera->NOMBRE_CARRERA; ?></a><br></strong></h5>
                                                                            <a href="<?php echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Tesis')); ?>">Tesis</a><br>
                                                                                <a href="<?php echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Adscripcion')); ?>">Adscripcion</a><br>
                                                                                    <a href="<?php echo Yii::app()->createUrl('wizard/Proyecto', array('step' => 'postulante', 'carrera' => $carrera->ID_CARRERA, 'modalidad' => 'Trabajo Dirigido')); ?>">Trabajo Dirigido</a>
                                                                                    </div>
                                                                                <?php endforeach; ?>
                                                                                </div>
                                                                                </div>

                                                                                </ul>

                                                                            <?php } ?>
                                                                            <h5>Del Portafolio</h5>
                                                                            <ul class="img-list">
                                                                                <li class="nosp"><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-mountain.jpg" /></a></div></li>
                                                                                <li><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-beach.jpg" /></a></div></li>
                                                                                <li><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-train.jpg" /></a></div></li>
                                                                                <li class="nosp"><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-beach.jpg" /></a></div></li>
                                                                                <li><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-train.jpg" /></a></div></li>
                                                                                <li><div class="border"><a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-mountain.jpg" /></a></div></li>
                                                                                <div class="clear"></div>
                                                                            </ul>
                                                                            <div class="clear"></div>

                                                                            <div class="tabbed-area">  
                                                                                <ul class="tabs">  
                                                                                    <li><a href="#" title="content_1" class="tab active">Mas vistos</a></li>  
                                                                                    <li><a href="#" title="content_2" class="tab">Recentes</a></li>
                                                                                    <div class="clear"></div>
                                                                                </ul>  

                                                                                <div id="content_1" class="tcontent">  
                                                                                    <ul class="blogs">
                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-train.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">...............</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>

                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-mountain.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">...............</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>

                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-beach.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">...............</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>  
                                                                                <div id="content_2" class="tcontent">  
                                                                                    <ul class="blogs">
                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-beach.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">..................</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>

                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-train.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">...........................</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>

                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-mountain.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">....................</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>

                                                                                        <li>
                                                                                            <div class="border">
                                                                                                <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/sidebar-train.jpg" /></a>
                                                                                            </div>
                                                                                            <p>
                                                                                                <a href="#">Titulo</a>
                                                                                                <span>Noviembre, 2013</span>
                                                                                            </p>
                                                                                            <div class="clear"></div>
                                                                                        </li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>

                                                                            </div>
                                                                            </div>

                                                                            <div class="sixteen columns">
                                                                                <span class="hr lip-quote"></span>
                                                                            </div>

                                                                            </div>
                                                                            </div>
                                                                            </div>
                                                                        </div><div class="footer style-2">
                                                                        <div class="background"><div class="stitch"></div></div>
                                                                        <div class="foot-nav-bg"></div>
                                                                        <div class="content">
                                                                            <div class="patch"></div>
                                                                            <div class="blur"></div>
                                                                            <div class="pattern">
                                                                                <div class="container">
                                                                                    <div class="stitch"></div>
                                                                                    <div class="sixteen columns">
                                                                                        <div class="first column alpha">
                                                                                            <!-- espacio para lado izq del footer-->
                                                                                            !
                                                                                        </div>
                                                                                        <div class="column ct">
                                                                                            <h5>Tweets recientes:</h5>
                                                                                            <ul class="twitter" id="twitter_update_list"><li>Twitter esta cagando</li></ul>
                                                                                        </div>
                                                                                        <div class="last column omega">
                                                                                            <h5>Unirse a la lista de correos</h5>

                                                                                            <div class="input-wrapper">
                                                                                                <input type="text" placeholder="Email..." id="email" name="email" />
                                                                                            </div>
                                                                                            <div class="right">
                                                                                                <a href="#" class="button color"><span>Unirse</span></a>
                                                                                            </div>
                                                                                            <div class="clear"></div>
                                                                                            <span class="hr"></span>
                                                                                            <h5>Mantengase en contacto</h5>
                                                                                            <ul class="sm foot">
                                                                                                <li class="facebook"><a href="#facebook">Facebook</a></li>
                                                                                                <li class="twitter"><a href="#twitter">LinkedIn</a></li>
                                                                                                <li class="linkedin"><a href="#linkedin">Pinterest</a></li>
                                                                                                <li class="pinterest"><a href="#pinterest">Pinterest</a></li>
                                                                                                <li class="dribbble"><a href="#dribbble">Pinterest</a></li>
                                                                                                <li class="flickr"><a href="#flickr">Pinterest</a></li>
                                                                                                <li class="flavors"><a href="#flavors">Pinterest</a></li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clear"></div>
                                                                                </div>
                                                                                <div class="sixteen columns alpha omega">
                                                                                    <div class="foot-nav-bg"></div>
                                                                                    <div class="foot-nav">
                                                                                        <div class="copy">
                                                                                            Copyright © 2013 
                                                                                        </div>
                                                                                        <div class="nav">
                                                                                            <a href="<?php echo Yii::app()->createUrl(''); ?>">Inicio</a>
                                                                                            <a href="<?php echo Yii::app()->createUrl('/estructura'); ?>">Estructura</a>
                                                                                            <a href="<?php echo Yii::app()->createUrl('/directorio'); ?>">Directorio</a>
                                                                                            <a href="<?php echo Yii::app()->createUrl('/unidades'); ?>">Unidades</a>
                                                                                            <a href="<?php echo Yii::app()->createUrl('/proyectos'); ?>">Proyectos</a>
                                                                                            <a href="<?php echo Yii::app()->createUrl('/contacto'); ?>">Contacto</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    </div>



                                                                    <script type="text/javascript">
                                                                        <!--
                                                                            $(window).load(function() {
                                                                            $(".nivo.hide").fadeIn(1000);
                                                                            // Setup Slider
                                                                            $('.nivo').nivoSlider({
                                                                                effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
                                                                                slices: 15, // For slice animations
                                                                                boxCols: 8, // For box animations
                                                                                boxRows: 4, // For box animations
                                                                                animSpeed: 500, // Slide transition speed
                                                                                pauseTime: 6000, // How long each slide will show
                                                                                startSlide: 0, // Set starting Slide (0 index)
                                                                                directionNav: true, // Next & Prev navigation
                                                                                controlNav: false, // 1,2,3... navigation
                                                                                controlNavThumbs: false, // Use thumbnails for Control Nav
                                                                                pauseOnHover: true, // Stop animation while hovering
                                                                                manualAdvance: false, // Force manual transitions
                                                                                prevText: 'Prev', // Prev directionNav text
                                                                                nextText: 'Next', // Next directionNav text
                                                                                randomStart: false, // Start on a random slide
                                                                                beforeChange: function() {
                                                                                }, // Triggers before a slide transition
                                                                                afterChange: function() {
                                                                                }, // Triggers after a slide transition
                                                                                slideshowEnd: function() {
                                                                                }, // Triggers after all slides have been shown
                                                                                lastSlide: function() {
                                                                                }, // Triggers when last slide is shown
                                                                                afterLoad: function() {
                                                                                } // Triggers when slider has loaded
                                                                            });
                                                                            $("a[class^='prettyPhoto']").prettyPhoto({social_tools: ''});
                                                                        });
                                                                        $(document).ready(function() {
                                                                            $('.slidewrap, .slidewrap2').carousel({
                                                                                slider: '.slider',
                                                                                slide: '.slide',
                                                                                slideHed: '.slidehed',
                                                                                nextSlide: '.next',
                                                                                prevSlide: '.prev',
                                                                                addPagination: false,
                                                                                addNav: false
                                                                            });
                                                                            $('.slide.testimonials').contentSlide({'nav': false});
                                                                        });
                                                                        // -->
                                                                    </script>

                                                                    <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                                                                    <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>
                                                                    </div>
                                                                    </body>

                                                                    </html>