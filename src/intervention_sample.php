<?php

// include composer autoload
require 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));

// to finally create image instances
$img = $manager->make('images/faces.jpg');

// now you are able to resize the instance
$img->resize(320, 240);

// and insert a watermark for example
$img->insert('images/cat.jpg');

// finally we save the image as a new file
$img->save('results/face_cat.jpg');

$img->crop(50, 50, 50, 50);
$img->save('results/face_cat_trim.jpg');
