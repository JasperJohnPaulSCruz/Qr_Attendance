<?php

//These for qr generator
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\Writer\PngWriter;


//Required files
require 'vendor/autoload.php';

function qrGenerate($itemid, $itemname){
    $data = $itemid.$itemname;
    $qr_code = QrCode::create($data)
    ->setSize(600)
    ->setMargin(40);

    // $logo = Logo::create("assets/img/bsulogotranparent.png");
    $writer = new PngWriter;
    $result = $writer->write($qr_code);

    $directory = 'avatar/faculty/qrs/'.$itemid.'/';

    if (!file_exists($directory)) {
        mkdir($directory, 0755, true);
    }

    $file = $directory.$itemname.'.png';
    $result->saveToFile($file);

    // Get QR code image as a string
    $qrCodeString = $result->getDataUri();

    return $qrCodeString;
}

