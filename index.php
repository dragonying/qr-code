<?php
/**
 * Created by PhpStorm.
 * User: fangying.zhong
 * Date: 2020-06-30
 * Time: 17:45
 */

require_once __DIR__.'/vendor/autoload.php';
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Tests\QrCodeTest;

$test = new QrCodeTest();

//$test->testReadable('hello world');
//$test->testWriteQrCodeByWriterName('eps','wooord');
$test->testSetLogo();
die;
$qrCode = new QrCode('http://shop.2dan88.com/');
$fileName = date('YmdHis').'.png';
$qrCode->writeFile('./tmp/'.$fileName);
print_r($qrCode->getData());


//header('Content-Type: '.$qrCode->getContentType());
//echo $qrCode->writeString();