<?php
include("pChart2.1.4/class/pData.class.php");
include("pChart2.1.4/class/pDraw.class.php");
include("pChart2.1.4/class/pImage.class.php");

//Create new pData object
$data = new pData();

$db = get_mysql_connection();
$query = 'select btn_name as button, count(*) as amount from EventTypes where btn_name="bread-button" or btn_name="brownie-button" or btn_name="cookie-button" or btn_name="muffin-button" group by btn_name;';
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_row($result)){
    $name = $row[0];
    $amount = $row[1];

    $data->addPoints($name, "Bread Type");
    $data->addPoints($amount, "Amount Sold");

    $myPicture = new pImage(90,60,660,190);

    $myPicture->setGraphArea(90,60,660,190); 
    $myPicture->drawText(350,55,"My chart title",array( "FontSize"=>20,"Align"=>TEXT_ALIGN_BOTTOMMIDDLE));
    $myPicture->drawFilledRectangle(90,60,660,190,array( "R"=>255, "G"=>255, "B"=>255, "Surrounding"=>-200 ,"Alpha"=>10)) ; 

    /* Compute and draw the scale */
    $myPicture->drawScale(array("DrawYLines"=>array(0)));
}