<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Wood Working   
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20110708

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo get_the_title();?>|<?php bloginfo('name');?></title>
<!-- <link href="style.css" rel="stylesheet" type="text/css" media="screen" /> -->
<?php wp_head();?>
</head>
<body>
<div id="wrapper">
    <div id="wrapper-bgbtm">
        <div id="header">
            <div id="logo">
            <!-- conditiotnal (code) -->
                <?php if (is_page('about')) {?>
                    <h1><?php the_custom_logo();?><a href="#">Wood Working (About_page)</a></h1>
                <p>template design by <a href="http://www.freecsstemplates.org/" rel="nofollow">CedCoss.org By Abhishek</a></p>
                <p>In this feild i am trying oto use some conditional tagss.. </p>
            <!-- closing conditional (code) -->
                <?php } else {?>
                <h1><?php the_custom_logo();?><a href="#">Wood Working </a></h1>
                <p>template design by <a href="http://www.freecsstemplates.org/" rel="nofollow">FreeCSSTemplates.org</a></p>
                <?php }?>
            </div>
        </div>
        <!-- end #header -->
        <div id="menu">
            <?php wp_nav_menu(array( 'theme_location' => 'header-menu' ));?>
        </div>
        <!-- end #menu -->