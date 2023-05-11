<?php
require_once __DIR__ . '/vendor/autoload.php';

use League\Flysystem\Filesystem;
use Ftlh2005\Flysystem\Qiniu\QiniuAdapter;
use League\Flysystem\FilesystemException;
use League\Flysystem\UnableToWriteFile;

$accessKey = '';
$secretKey = '';
$bucket = '';
$domain = ''; // or with protocol: https://xxxx.bkt.clouddn.com

$adapter = new QiniuAdapter($accessKey, $secretKey, $bucket, $domain);

$flysystem = new League\Flysystem\Filesystem($adapter);
try {
    $flysystem->write('file.md', 'contents');
    $s = $adapter->getUrl('file.md');
    var_dump($s);
} catch (FilesystemException | UnableToWriteFile $exception) {
    // handle the error
     var_dump($exception->getMessage());
}