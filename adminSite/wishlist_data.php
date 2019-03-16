<?php

require_once("/pChart/bootstrap.php");

use pChart\pColor;
use pChart\pDraw;
use pChart\pCharts;

//set the headers to allow CORS
header('Access-Control-Allow-Origin: http://157.230.150.204:2020');
header('Access-Control-Allow-Headers: Content-type');

if ($_SERVER['REQUEST_METHOD'] != 'GET' && 
    $_SERVER['REQUEST_METHOD'] != 'POST') {
    exit();
}

$servername = "localhost";
$username = "reporter";
$password = "reportingpassword1!";
$dbname = "bakery_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
}


$list = array();
$qty = array();
$sql = "select bread, count(*) from Wishlist GROUP BY bread ORDER BY count(*) desc limit 5";
$result = $conn->query($sql);

foreach ($result as $row) {
	$list[] = $row['bread'];
	$qty[] = $row['count(*)'];
}

$result->close();
$conn->close();

$myPicture = new pDraw(500,230);

/* Populate the pData object */
$myPicture->myData->addPoints($qty, "Pastries");
$myPicture->myData->setAxisName(0,"Searches");
$myPicture->myData->addPoints($list,"Labels");
$myPicture->myData->setSerieDescription("Labels","Bread");
$myPicture->myData->setAbscissa("Labels");

/* Draw the background */
$myPicture->drawFilledRectangle(0,0,700,230,["Color"=>new pColor(170,183,87)]);

/* Overlay with a gradient */
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL, ["StartColor"=>new pColor(219,231,139,50),"EndColor"=>new pColor(1,138,68,50)]);
$myPicture->drawGradientArea(0,0,700,20, DIRECTION_VERTICAL, ["StartColor"=>new pColor(0,0,0,80),"EndColor"=>new pColor(50,50,50,80)]);

/* Write the chart title */ 
$myPicture->setFontProperties(["FontName"=>"/pChart/pChart/fonts/Forgotte.ttf","FontSize"=>11]);
$myPicture->drawText(250,55,"Customer Wishlist",["FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE]);

/* Create the pCharts object */
$pCharts = new pCharts($myPicture);

/* Draw the scale and the 1st chart */
$myPicture->setGraphArea(60,60,450,190);
$myPicture->drawFilledRectangle(60,60,450,190,["Color"=>new pColor(255,255,255,10),"Surrounding"=>-200]);
$myPicture->drawScale(["DrawSubTicks"=>TRUE]);
$myPicture->setShadow(TRUE,["X"=>1,"Y"=>1,"Color"=>new pColor(0,0,0,10)]);
$myPicture->setFontProperties(["FontName"=>"/pChart/pChart/fonts/pf_arma_five.ttf","FontSize"=>6]);
$pCharts->drawBarChart(["DisplayValues"=>TRUE,"DisplayType"=>DISPLAY_AUTO]);
$myPicture->setShadow(FALSE);


/* Write the chart legend */
$myPicture->drawLegend(140,210,["Style"=>LEGEND_NOBORDER,"Mode"=>LEGEND_HORIZONTAL]);

/* Render the picture (choose the best way) */
$myPicture->autoOutput("temp/example.drawBarChart.png");
