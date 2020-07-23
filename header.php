
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="7qVG_hf3Jzi3tm43qkEfXzmt1RYyF_ERNPeRpaXNsnQ" />

        <link rel='shortcut icon' href='http://www.toledolibrary.org/favicon.ico' type='image/x-icon'/ >

        <meta property="og:title" content="Toledo Lucas County Public Library" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://www.toledolibrary.org/" />
                    <meta property="og:image" content="https://toledolibrary.s3.amazonaws.com/uploads/images/_large/tlc-library-central-court.jpg"/>
        
        
                                    <meta property="og:description" content="The Toledo Lucas County Public Library exists to Engage all of our communities, inspire lifelong learning, and provide universal access to a broad range of information, ideas, and entertainment."/>
        <meta name="description" content="The Toledo Lucas County Public Library exists to Engage all of our communities, inspire lifelong learning, and provide universal access to a broad range of information, ideas, and entertainment.">


        <title>Search Across Digital Collections</title>

        <link href="http://www.toledolibrary.org/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://www.toledolibrary.org/css/main.css?v=20" rel="stylesheet">
        <link href="http://www.toledolibrary.org/webfonts/ss-social-circle.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
       
       
       
       
       
       
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
       
       
       
       
       
       
        <script src='https://api.mapbox.com/mapbox-gl-js/v0.39.1/mapbox-gl.js'></script>
        <link href='https://api.mapbox.com/mapbox-gl-js/v0.39.1/mapbox-gl.css' rel='stylesheet' />

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
            n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
            document,'script','https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '642034659306910');
            fbq('track', "PageView");</script>
            <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=642034659306910&ev=PageView&noscript=1"
            /></noscript>
        <!-- End Facebook Pixel Code -->
        
        <style>
        body, h1, h2, h3, h4, h5, h6, p, span, div, form, a, nav, button, strong  {
  font-family: Texta-Regular, Verdana, Geneva, sans-serif !important;  
  font-weight: normal;
 }
 
 .btn-group button {
 margin: 0 .1vw !important;
 font-size:1rem !important;
 }
 
 .btn-group {
 margin:0;
 }
 
 #primary-search-bar {
    font-size: .9rem !important;
  
}

 
</style>
        
    </head>

    
	    <body class="page-home">
        <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-54DB2T"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <main class="page-content" role="main">
                    


<header class="main-header" role="banner">
            <div id="primary-navigation" role="navigation">
            <a href="http://www.toledolibrary.org/" class="logo"><img src="http://www.toledolibrary.org/images/mark.svg" class="img-responsive" alt="Toledo Lucas County Public Library Logo"></a>
            <a href="http://www.toledolibrary.org/" class="btn btn-sunrise" style="float: none; font-size: .8rem; margin-left: 0; font-weight: bold;">Return to ToledoLibrary.org</a>
           
                                                    </div>
                                                    <nav class="mobile-social-media-links">  </nav>
                    </nav>


            </div>
</header>
<section class="content-block page-title-block">
                        <h1>Search Across Digital Collections</h1>
                                            </section>
                                            
                                            <section class="content-block">
	<div class="row library-white">
		<div class="col-md-24 col-lg-24" style="margin-top:0;background:#002B45;">
		
		
	<form class="input-group big-search-bar" style="margin-top:0;background:#002B45;" name='form' method='get' action="results.php">
                    <label class="sr-only" for="primary-search-bar">Keywords</label>
                    <input name="keyword" type="text" placeholder="<?php echo $keyword_to_change; ?>" class="form-control keyword" id="primary-search-bar keyword"  value="<?php echo $keyword_to_change; ?>">
                    <span class="input-group-btn">
                        <label class="sr-only" for="primary-search-submit">Search</label>
                        <button class="btn btn-secondary-search" type="submit" onclick="searchingBody()" id="primary-search-submit"><i class="fa fa-search"></i></button>
                    </span>
                </form>
                
                
</div>
</section>
