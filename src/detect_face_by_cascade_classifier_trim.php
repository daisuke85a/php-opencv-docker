<?php

use CV\CascadeClassifier;
use CV\Scalar;
use function CV\imread;
use function CV\imwrite;
use function CV\cvtColor;
use function CV\equalizeHist;
use function CV\rectangleByRect;
use const CV\{COLOR_BGR2GRAY};

$src = imread("images/faces.jpg");
$gray = cvtColor($src, COLOR_BGR2GRAY);

// face by lbpcascade_frontalface
$faceClassifier = new CascadeClassifier();
$faceClassifier->load('models/lbpcascades/lbpcascade_frontalface.xml');

$faceClassifier->detectMultiScale($gray, $faces);
var_export($faces);

if ($faces) {
    $scalar = new Scalar(0, 0, 255); //blue

    foreach ($faces as $face) {
        rectangleByRect($src, $face, $scalar, 3);
    }
}

// eyes by haarcascade_eye
/*$eyeClassifier = new CascadeClassifier();
$eyeClassifier->load('models/haarcascades/haarcascade_eye.xml');
$eyes = null;
$eyeClassifier->detectMultiScale($gray, $eyes);
var_export($eyes);

if ($eyes) {
    $scalar = new Scalar(0, 0, 255); //red

    foreach ($eyes as $eye) {
        rectangle($src, $eye->x, $eye->y, $eye->x + $eye->width, $eye->y + $eye->height, $scalar, 2);
    }
}*/


imwrite("results/_detect_face_by_cascade_classifier.jpg", $src);


// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));

// to finally create image instances
if ($faces) {
    foreach ($faces as $key =>$face) {
        $img = $manager->make('images/faces.jpg');
        $img->crop($face->width, $face->height, $face->x, $face->y);
        $img->save("results/face_{$key}.jpg");
    }
}
