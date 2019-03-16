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


$weekDays = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$breadList = array("brownie", "cookie", "muffin", "bananabread"); 


$data = array();
$brownie = array();
$cookie = array();
$muffin = array();
$bananabread= array();
foreach($weekDays as $day) {
	$list = array();
	
	foreach($breadList as $bread) {
		$sql = "select COUNT(*) from MissedSales where DAYNAME(timestamp)='$day'
		        and type='$bread' and YEARWEEK(timestamp)=YEARWEEK(NOW())" ;

		$result = $conn->query($sql);

		foreach ($result as $row) {
			$count = $row["COUNT(*)"];
			$list[$bread] = $count;
			$data[$day] = $list;

			switch($bread) {
				case "brownie":
					$brownie[] = $count;
					break;
				case "cookie":
					$cookie[] = $count;
					break;
				case "muffin":
					$muffin[] = $count;
					break;
				case "bananabread":
					$bananabread[] = $count;
					break;
				default:
					break;
			}
		}
		$result->close();
	}
}

$conn->close();

$myPicture = new pDraw(500,230);

/* Populate the pData object */
$myPicture->myData->addPoints($brownie,"Brownie");
$myPicture->myData->addPoints($cookie,"Cookie");
$myPicture->myData->addPoints($muffin,"Muffin");
$myPicture->myData->addPoints($bananabread, "Banana Bread");
$myPicture->myData->setAxisName(0,"Sales");
$myPicture->myData->addPoints($weekDays,"Labels");
$myPicture->myData->setSerieDescription("Labels","Weekdays");
$myPicture->myData->setAbscissa("Labels");

/* Draw the background */
$myPicture->drawFilledRectangle(0,0,700,230,["Color"=>new pColor(170,183,87)]);

/* Overlay with a gradient */
$myPicture->drawGradientArea(0,0,700,230,DIRECTION_VERTICAL, ["StartColor"=>new pColor(219,231,139,50),"EndColor"=>new pColor(1,138,68,50)]);
$myPicture->drawGradientArea(0,0,700,20, DIRECTION_VERTICAL, ["StartColor"=>new pColor(0,0,0,80),"EndColor"=>new pColor(50,50,50,80)]);

/* Write the chart title */ 
$myPicture->setFontProperties(["FontName"=>"/pChart/pChart/fonts/Forgotte.ttf","FontSize"=>11]);
$myPicture->drawText(250,55,"Weekly Missed Sales",["FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE]);

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
