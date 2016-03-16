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
                    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/animate.min.css" type="text/css" media="screen" charset="utf-8" />
                    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/prettyPhoto.css" type="text/css" media="screen" charset="utf-8" />
                    <!--[if (IE 6)|(IE 7)]>
                        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/ie.css" type="text/css" media="screen" />
                    <![endif]-->
                    <!--[if lt IE 9]>
                        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                    <![endif]--><script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery-1-8-2.js"></script>
                    <script type="text/javascript" language="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery-1.8.2.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/default.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.easing.1.3.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.carousel.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.color.animation.js"></script>
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/jquery.prettyPhoto.js" charset="utf-8"></script>


                    <!-- color pickers -->
                    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/mod_css/colorpicker.css" />
                    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/mod_js/colorpicker.js"></script>
                    <!-- end of color pickers -->

                    </head>

                    <body><div class="page-wrapper">
                            <div class="slug-pattern"><div class="overlay"><div class="slug-cut"></div></div></div>
                            <div class="header">
                                <div class="nav">


                                    <div class="container">

                                        <!-- Standard Nav (x >= 768px) -->
                                        <div class="standard">

                                            <div class="five column alpha">
                                                <div class="logo">
                                                    <a href=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/mod_images/logo.png" /></a><!-- Large Logo -->
                                                </div>
                                            </div>

                                            <div class="eleven column omega tabwrapper">
                                                <div class="menu-wrapper">
                                                    <ul class="tabs menu">
                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl(''); ?>" >INICIO</a>

                                                        </li>
                                                        <li><a href="<?php echo Yii::app()->createUrl('/estructura'); ?>" >ESTRUCTURA</a>

                                                        </li>
                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl('/directorio'); ?>">DIRECTORIO</a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl('/unidades'); ?>" > UNIDADES </a>
                                                            <ul class="child">
                                                                <li><a href="<?php echo Yii::app()->createUrl('/modalidades'); ?>">Modalidades de titulación</a></li>
                                                                <?php $unidad = UnidadInvest::model()->NombreUnidades() ?>
                                                                <?php foreach ($unidad as $uni): ?>
                                                                    <li><a href="<?php echo Yii::app()->createUrl('/unidades/uni/' . $uni->ID_UNIDAD_INVEST); ?>"><?php echo $uni->NOMBRE_UNIDAD_INVEST ?></a></li>
                                                                <?php endforeach; ?>

                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl('/proyectos'); ?>">PROYECTOS</a>
                                                            <ul class="child">
                                                                <?php $proy = ProyInvest::model()->NombreProy() ?>
                                                                <?php foreach ($proy as $model): ?>
                                                                    <li><a href="<?php echo Yii::app()->createUrl('/proyectoInvest/pro/' . $model->ID_PROY_INVEST); ?>"><?php echo $model->TEMA_PROY_INVEST ?></a></li>
                                                                <?php endforeach; ?>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo Yii::app()->createUrl('/contacto'); ?>" class="active"><span>CONTACTO</span></a> 
                                                        </li>

                                                        <li>
                                                            <?php if (!Yii::app()->user->isGuest && Yii::app()->user->checkAccess('xxx')) { ?>
                                                                <a href="<?php echo Yii::app()->createUrl('en/admin'); ?>"> Admin  </a>
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
                                        <h1>Contacto</h1>
                                    </div>
                                </div>
                            </div>

                            <div class="body">
                                <div class="body-round"></div>
                                <div class="body-wrapper">
                                    <div class="side-shadows"></div>
                                    <div class="content">
                                        <div class="container">
                                            <div class="sixteen map columns"> 
                                                <iframe width="100%" height="260" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?hl=en&ll=-17.394709,-66.148682&spn=0.011876,0.016737&doflg=ptk&mra=mr&t=m&z=16"></iframe>
                                            </div>
                                            <div class="sixteen columns"><span class="hr mapdv"></span></div>
                                            <div class="five columns">
                                                <h5 class="semi">About Us</h5>
                                                <p>In id odio justo, eu aliquet odio, nunc viverra ligula</p>

                                                <h5 class="semi">Contact Info</h5>
                                                <p>
                                                    12345 Random Rd,<br />
                                                    Baltimore MD, 21212
                                                    <span class="hr"></span>
                                                    Phone: 1.800.555.6789<br />                          
                                                    Fax: 1.800.555.6789<br />                 
                                                    Email: example@ex.com<br />                           
                                                    Web: www.ex.com
                                                </p>

                                                <h5 class="semi">Testimonials</h5>
                                                <ul class="slide testimonials clr overlap">
                                                    <li>
                                                        <p>Mia Web Designs' willingness to help make the best website for us was outstanding. We highly recommend Mia Web Designs.
                                                            <strong>Nico Tigulis</strong>                               	</p>
                                                    </li>
                                                    <li>
                                                        <p>I got the HTML files&hellip; Thank you so much, I appreciate your quick response and attention. I recommend you! A++ Service! 
                                                            <strong>movilwebs - ThemeForest Member</strong>                                </p>
                                                    </li>
                                                    <li>
                                                        <p>Great business, was very prompt to my request. Your templates are great. Strongly recommended to anyone looking for a great website.
                                                            <strong>Chris Fale</strong>                              </p>
                                                    </li>
                                                </ul>

                                            </div>
                                            <div class="contact eleven columns">
                                                <div class="standard-form compressed">
                                                    <h4 class="semi">Contact Form</h4>
                                                    <div class="form-result"></div>
                                                    <form action="#" class="contactForm" id="contactus" name="contactus">
                                                        <input type="text" class="input" id="name" name="name" placeholder="Name *" />
                                                        <input type="text" class="input" id="email" name="email" placeholder="Email *" />
                                                        <input type="text" class="input extend" id="subject" name="subject" placeholder="Subject" />
                                                        <textarea name="comment" id="comment" rows="10" cols="65" placeholder="Message *" ></textarea>
                                                        <div class="submit">
                                                            <a class="button color" href="javascript:contactUsSubmit();"><span>Submit</span></a>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="footer style-2">
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
                                                        <h5>Recent Tweets:</h5>
                                                        <ul class="twitter" id="twitter_update_list"><li>Twitter is loading</li></ul>
                                                    </div>
                                                    <div class="last column omega">
                                                        <h5>Unirse a la lista de correos</h5>

                                                        <div class="input-wrapper">
                                                            <input type="text" placeholder="Email..." id="email" name="email" />
                                                        </div>
                                                        <div class="right">
                                                            <a href="#" class="button color"><span>Join</span></a>
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
                                    $('.slide.testimonials').contentSlide();
                                });
                                // -->
                            </script>
                            <script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
                            <script type="text/javascript" src="http://api.twitter.com/1/statuses/user_timeline/EmpiricalThemes.json?callback=twitterCallback2&count=2"></script>
                        </div>
                    </body>

                    </html>