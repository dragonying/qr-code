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
use Zxing\QrReader;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\LabelAlignment;

$text = 'hello pwworld';
$fileName = date('YmdHis').'.png';
$dir = './tmp/';

//设置以下文本内容可生成电子名片
//$content='BEGIN:VCARD'."\n";
//$content.='VERSION:2.1'."\n";
//$content.='N:不'."\n";
//$content.='FN:贰过'."\n";
//$content.='ORG:德玛西亚'."\n";
//$content.='TEL;WORK;VOICE:15935675897'."\n";
//$content.='TEL;HOME;VOICE:13827047758'."\n";
//$content.='TEL;TYPE=cell:13987205642'."\n";
//$content.='ADR;HOME:901;东座;时代广场75号;天河北路;广州市;000000;中国'."\n";
//$content.='EMAIL:hys@dld.com'."\n";
//$content.='URL:http://www.hys.com'."\n";
//$content.='END:VCARD'."\n";

############    生成二维码   ############
$qrCode = new QrCode();
$qrCode->setText($text);//设置二维码上的内容
$qrCode->setSize(300);//设置二维码的大小，这里二维码应该是正方形的，所以相当于长宽
$qrCode->setMargin(2);//设置二维码边距
$qrCode->setEncoding('UTF-8');//设置编码格式
$qrCode->setErrorCorrectionLevel(ErrorCorrectionLevel::HIGH()); //设置二维码的纠错率，可以有low、medium、quartile、hign多个纠错率
$qrCode->setWriterByName('png'); //设置输出的二维码图片格式
$qrCode->setForegroundColor(['r' => 125, 'g' => 125, 'b' => 0, 'a' => 50]); //设置二维码的rgb颜色和透明度a，这里是红色
$qrCode->setBackgroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]); //设置二维码图片的背景底色，这里是黑色
$qrCode->setLabelFontPath(__DIR__.'/assets/fonts/noto_sans.otf'); //字体路径
$qrCode->setLabel('二维码下方的文字'); //文字
$qrCode->setLabelFontSize(16); //字体大小
$qrCode->setLabelMargin(['t'=>3]); //设置标签边距 array('t' => 10,'r' => 20,'b' => 10,'l' => 30)

//或统一用setLabel('二维码下方的文字','字体大小','字体路径','对齐方式')来设置
//$qrCode->setLabel('二维码下方的文字2', 16, __DIR__.'/vendor/endroid/qr-code/assets/fonts/noto_sans.otf', LabelAlignment::CENTER());

//如果要加上logo水印，则在调用setLogoPath和setLogoSize方法
$qrCode->setLogoPath(__DIR__.'/assets/images/symfony.png'); //logo水印图片的所在的路径
$qrCode->setLogoSize(50, 50); //设置logo水印的大小，单位px ，参数如果是一个int数字等比例缩放

$qrCode->writeFile($dir.$fileName); //保存文件

//输出二维码
//header('Content-Type: '.$qrCode->getContentType());
//exit($qrCode->writeString());

die;

$file = __DIR__.'/tmp/sp.jpg';
$image = file_get_contents($file);

$reader = new QrReader($image, QrReader::SOURCE_TYPE_BLOB);
print_r($reader->text());

die;
//$test = new QrCodeTest();
//
//$test->testReadable('hello world');
//$test->testWriteQrCodeByWriterName('eps','wooord');
//$test->testSetLogo();
//
//

$str = <<<"ABC"

ABC;
;
$qrCode = new QrCode($str);
$qrCode->writeFile('./tmp/'.$fileName);


//header('Content-Type: '.$qrCode->getContentType());
//echo $qrCode->writeString();