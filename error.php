<?php
/******************************************************************************
* http://placepuppy.it
* Copyright (C) 2012 Cristian Consonni <cristian.consonni@gmail.com>.
*
* This program is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 3 of the License, or
* (at your option) any later version.
*
* This program is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with this program (see COPYING).  
* If not, see <http://www.gnu.org/licenses/>.
*
* See README for further details.
*
******************************************************************************/
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" xml:lang="en-US"><meta charset="utf-8">
 <head> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="imagetoolbar" content="no">

    <!-- Standard Metadata -->
    <title>Placepuppy</title>
    <link rel="canonical" href="http://placepuppy.it/error" />
   <link rel="shortlink" href="http://placepuppy.it/error" />
   <meta name="generator" content="Bluefish 2.0.3" />
   <meta name="description" content="placepuppy.it are puppy placeholder images for developers">
   <meta name="abstract" content="placepuppy.it serves images of cute puppies to placehold your designs or code. Web developers and designers can use it in their works to show fancier pictures than dull white boxes " />
   <meta name="author" content="Cristian Consonni" >
   <meta name="keywords" content="puppy, placeholder, images, pictures, dog, pixel, breed, pet, hound">
   <meta name="copyright" content="Cristian Consonni et al.">
   <meta name="viewport" content="width=device-width; initial-scale=1.0;">
   <meta name="MobileOptimized" content="width" />
   <meta name="HandheldFriendly" content="true" />
   <meta name="apple-mobile-web-app-capable" content="yes" />
   
    <!-- Dublin Core Metadata -->
    <meta name="DC.identifier" content="http://placepuppy.it/error" />
    <meta name="DC.creator" lang="en" content="Cristian Consonni">
    <meta name="DC.date.created" lang="en" content="2012-12-16">
    <meta name="DC.format" lang="en" content="text/html">
    <meta name="DC.language" content="en">

    <!-- Open Graph Metadata -->
    <meta property="og:site_name" content="placepuppy">
    <meta property="og:title" content="placepuppy">
    <meta property="og:description" content="Puppy placeholder images for developers">
    <meta property="og:type" content="website">
    <meta property="og:image" content="http://placepuppy.it/100/100">
    <meta property="og:url" content="http://placepuppy.it">

    <!-- Navigation -->
    <link rel="home" href="/">

    <!-- Icons -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/png" />
 
    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/placepuppy.css">

    <!-- Analytics -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-22736537-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</head>
<body class="page-error">
  <div id="container">
    <div id="header" style="width:100%;">       
        <a href="./"><img id="image-h" src="./images/homepage/dog_track_logo.png" align="left" width="64" height="64" alt=""></a>
        <h1>placepuppy</h1>
    </div>

    <div id="error-content">
        <h2>Something went wrong!</h2>
        <p>
        <img id="image-error" src="./images/homepage/6.jpg" alt="Démon le rottweiler">
        </p>
        <br />
        <p id="error-notice">
        Your request
        <span style="font-weight:bold">
          <a href="/<?php echo $_SESSION['request']; ?>">http://placepuppy.it/<?php echo $_SESSION['request']; ?></a>
        </span>
        could not be processed due to an internal
        error.
        <p>

        <p>
        Please, <a href="/<?php echo $_SESSION['request']; ?>">try again</a> or procede happily back to the <a href="/">home page</a>.
        If the problem persists you may want to drop a line to the 
        <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;&#99;&#114;&#105;&#115;&#116;&#105;&#97;&#110;&#46;&#99;&#111;&#110;&#115;&#111;&#110;&#110;&#105;&#64;&#103;&#109;&#97;&#105;&#108;&#46;&#99;&#111;&#109;">author</a>.
        Thanks for your patience.
        </p>
    </div>
    <div id="footer" role="contentinfo">
      <p>Created by Cristian Consonni <span class="amp">&amp;</span> Melian del Doriath.</p>
      <p>This site should be mobile-friendly, for those who need some puppy-cuteness while on the move.
      You can also grab a complete copy of the site on <a href="/github">github</a>. The code is released under the <a href="http://www.gnu.org/licenses/gpl.html">GNU GPL license</a>, happy hacking! 
      The text are released under the <a href="creativecommons.org/licenses/by/3.0/">Creative Commons 3.0 - Attribution license</a>.
      This mean that you can reuse the text provided you cite placepuppy.it.
      Remember that any feedback is appreciated.
      </p>
      <p>Image attribution: <a href="attribution">attribution</a> &amp; <a href="attribution#acknowledgements">acknowlegdements</a> &dash; documentation: <a href="/doc">docs</a>.</p>
      <div id="ascii-puppy">
            <pre>
    _.-.
  '( ^{_}    (
    `~\`-----'\
       )_)---)_)</pre>This site is dedicated to Silvia "il cane" Tilly.
        </div>
        </div><!-- /#footer -->
  </div>  
</body>
</html>w

<?php
session_destroy();
?>