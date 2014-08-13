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
date_default_timezone_set('Europe/Rome');

session_start();
require_once( '../log4php/Logger.php' );
Logger::configure('../logger-config.xml');
$logger = Logger::getLogger("code.php");

$x = strtolower($_GET["x"]);
include("color.class.php");

$logger->info("Serving request: $x");

$dimensions = explode('/',$x);
$width = preg_replace('/[^\d]/i', '',$dimensions[0]);
$height = $width;
if (array_key_exists(1, $dimensions)) {
  $height = preg_replace('/[^\d]/i', '',$dimensions[1]);
}
$prop = round($width/$height, 2);

$bg_color = "#000008";
if (array_key_exists('bg' ,$_GET)) {
  $bg_color = $_GET['bg'];
}
$background = new color();
$background->set_name($bg_color);
if(!$background->get_hex()) {
  $background->set_hex($bg_color);
}

$fg_color = "#FFFFFF";
if (array_key_exists('fg' ,$_GET)) {
  $fg_color = $_GET['fg'];
}
$foreground = new color();
$foreground->set_name($fg_color);
if(!$foreground->get_hex()) {
  $foreground->set_hex($fg_color);
}

$img_w = 0;
$img_h = 0;
$error_flag=False;
$ini_array = parse_ini_file("../config.ini");
$dbhost = $ini_array['host'];
$dbuser = $ini_array['user'];
$dbpass = $ini_array['pass'];
$dbname = $ini_array['dbname'];

$mysqli = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
unset($ini_array,$dbhost,$dbuser,$dbpass,$dbname);
if(!$mysqli) {
  $logger->error("MAIL - Cannot connect to DB");
  $error_flag=True;
}

if(!$error_flag) {
  if (array_key_exists('n' ,$_GET)) {
    $number = $_GET['n'];
    $number = preg_replace('/\|/i', "\n", $number);
    if($number < 1 || $number > 28) 
       $number=0;
    $img_name = $number.".jpg";

    $sql_command="SELECT width, height, prop FROM images WHERE name = \"$img_name\"";
    $result = $mysqli->query($sql_command);
    if ($result) {
      $obj = $result->fetch_object();
      $img_w = $obj->width;
      $img_h = $obj->height;
      $img_p = $obj->prop;
    }
    else {
      $logger->error("MAIL - DB error - numbered case");
      $error_flag=True;
    }
  }
  else {
    $sql_command="SELECT name, width, height, prop FROM images WHERE width > $width AND height > $height";
    $result=$mysqli->query($sql_command);
    if($result){
       $result->data_seek(floor(($prop*100)%($result->num_rows)));
       $obj = $result->fetch_object();
       $img_name = $obj->name;
       $img_w = $obj->width;
       $img_h = $obj->height;
       $img_p = $obj->prop;
    }
    else {
      $logger->error("MAIL - DB error - unnumbered case");
      $error_flag=1;
    }
  }
  $mysqli->close();
}

if($error_flag) {
  error_page($x);
  exit(1);
}

$img_path = "images".DIRECTORY_SEPARATOR;
$img_fullname = $img_path.$img_name;
$image = new Imagick($img_fullname);
scale_image($img_p,$height,$width, $image);

if (array_key_exists('text' ,$_GET)) {
  $text = $_GET['text'];
  $text = preg_replace('/\|/i', "\n", $text);
  $pointsize = max(min($width/strlen($text)*1.20, $height*0.20),5);
  $font = "mplus-1c-medium.ttf";
  $draw = new ImagickDraw();
  $draw->setFillColor(new ImagickPixel("#".$foreground->get_hex()));
  $draw->setFont($font);
  $draw->setFontSize($pointsize);
  $draw->setTextUnderColor(new ImagickPixel("#".$background->get_hex()));
  $draw->setGravity(imagick::GRAVITY_SOUTH);
  $image->annotateImage($draw, 0, 0, 0, $text);
}

$image->setFilename("puppy");
$output = $image->getimageblob();
$outputtype = $image->getFormat();

header("Content-type: $outputtype");
echo $output;

function scale_image($img_p,$height,$width, $image) {
  if($img_p > 1) {
    $tmp_w = $height * $img_p;
    $tmp_h = $height;
  }
  else {
    $tmp_w = $width;
    $tmp_h = $width/$img_p;
  }

  //printf("tmp_w: %s, tmp_h: %s<br />", $tmp_w, $tmp_h);
  if($tmp_w >= $width && $tmp_h >= $height) {
    $image->resizeImage($tmp_w, $tmp_h, Imagick::FILTER_SINC, 1);
    $image->extentImage($width, $height, floor(abs(0.5*($tmp_w-$width))), floor(abs(0.5*($tmp_h-$height))));
  }
  else {
    if($tmp_h < $height) {
        $image->thumbnailImage(0, $height);
        $image->extentImage($width, $height, floor(-abs(0.5*($width-$tmp_w))), 0);
    }
    else {
        $image->thumbnailImage($width, 0);
        $image->extentImage($width, $height, 0, floor(-abs(0.5*($height-$tmp_h))));
    }
  }

}

function error_page($x) {
  echo session_id();
  $_SESSION['request'] = $x;
  header("Location: /error");
}
?>
