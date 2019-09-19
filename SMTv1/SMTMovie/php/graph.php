<?php
/**
PHP version 7

@category SQL

@package Web_Programming_Project

@author Original Author <mitchel_king@icloud.com>

@license http://www.php.net/license PHP license 7

@link http:/pear.php.net
 **/
/**
Array to store occurences
 **/
$SQLSelect = "SELECT title, SUM(count) AS
    TotalQuantity FROM movies
    GROUP BY title
    ORDER BY SUM(count) DESC
    LIMIT 10;";
$titles;
$occurences;
$count =0;
$data = mysqli_query($connection, $SQLSelect);
while ($dataArray = mysqli_fetch_array($data)) {
    $titles[$count] = $dataArray['title'];
    $occurences[$count] = $dataArray['TotalQuantity'];
    $count++;
}

/**
Image create to show numbers for graph
**/
$userText = "1  2   3  4   5  6  7  8   9  10";
$imageGraph = @imagecreate(300, 40) or die("Cannot init GD stream");
$backGround = imagecolorallocate($imageGraph, 255, 255, 255);
$textColor = imagecolorallocate($imageGraph, 10, 110, 100);
/**
Imagestring to show occurences
**/
$c = 5;
for ($i =0; $i<count($titles); $i++) {
    imagestring($imageGraph, 31, $c, 20, $titles[$i], $textColor);
    $c = $c+30;
}
imagepng($imageGraph, "images/tableText.png");

/**
Graph variables
number of columns for graph from dataArray count
$columns = count($dataArray);
**/
$columns = 10;
/**
Dimensions and padding space between column
**/
$height = 200;
$width = 380;
$padding = 10;
/**
Width
**/
$column_width = $width / $columns;

/**
Colours
**/
$image = @imagecreate($width, $height);
$cyan = imagecolorallocate($image, 10, 110, 100);
$black = imagecolorallocate($image, 0, 0, 0);
$lite_grey = imagecolorallocate($image, 0xee, 0xee, 0xee);
$dark_grey = imagecolorallocate($image, 0x7f, 0x7f, 0x7f);
$white = imagecolorallocate($image, 255, 255, 255);

/**
Array of colours for bars(raps)
**/
$color1 = imagecolorallocate($image, 20, 800, 100);
$color2 = imagecolorallocate($image, 30, 600, 200);
$color3 = imagecolorallocate($image, 40, 700, 100);
$color4 = imagecolorallocate($image, 10, 100, 100);
$color5 = imagecolorallocate($image, 100, 200, 100);
$color6 = imagecolorallocate($image, 70, 300, 100);
$color7 = imagecolorallocate($image, 80, 400, 100);
$color8 = imagecolorallocate($image, 90, 500, 100);
$colourArray = array($color1, $color2, $color3, $color4, $color5,
                    $color6, $color7, $color8, $cyan, $black);

$key = @imagecreate(10, 10);
$colour0 = imagecolorallocate($key, 20, 800, 100);
$colour1 = imagecolorallocate($key, 30, 600, 200);
$colour2 = imagecolorallocate($key, 40, 700, 100);
$colour3 = imagecolorallocate($key, 10, 100, 100);
$colour4 = imagecolorallocate($key, 100, 200, 100);
$colour5 = imagecolorallocate($key, 70, 300, 100);
$colour6 = imagecolorallocate($key, 80, 400, 100);
$colour7 = imagecolorallocate($key, 90, 500, 100);
/**
These two are cyan and grey
Labelled increments for for loop
**/
$colour8 = imagecolorallocate($key, 10, 110, 100);
$colour9= imagecolorallocate($key, 0, 0, 0);
$colourArray2 = array($colour0, $colour1, $colour2, $colour3, $colour4,
                    $colour5, $colour6, $colour7, $colour8, $colour9);
/**
Set background colour
**/
imagefilledrectangle($image, 0, 0, $width, $height, $white);

/**
Get max plot value for graph
**/
$max_num = max($occurences);
/**
Loop to go over array of column count
**/
for ($i=0; $i<$columns; $i++) {   
    /**
    Column height according to each value in array
    **/
    $columnH = ($height / 100) * (($occurences[$i] / $max_num)*100);
    /**
    Co-ordinates
    **/
    $x1 = $i*$column_width;
    $y1 = $height-$columnH;
    $x2 = (($i+1)*$column_width)-$padding;
    $y2 = $height;

    /**
    Draw colour box, save image in folder
    **/
    imagefilledrectangle($key, 0, 0, 10, 10, $colourArray2[$i]);
    imagepng($key, "images/colours/colour{$i}.png");
    /**
    Draw columns over background
    **/
    imagefilledrectangle($image, $x1, $y1, $x2, $y2, $colourArray[$i]);

    /**
    3d shadow on columns
    **/
    imageline($image, $x1, $y1, $x1, $y2, $grey);
    imageline($image, $x1, $y2, $x2, $y2, $lite_grey);
    imageline($image, $x2, $y1, $x2, $y2, $dark_grey);
}
imagepng($image, "images/table.png");
echo"<img src = 'images/table.png'>";
imagedestroy($image);
imagedestroy($imageGraph);
