<?php

$target = '/domains/throneofpowerandfireministry.org/storage/app/public_html/';
$link = '/domains/throneofpowerandfireministry.org/public_html/storage';
symlink($target, $link);

echo readlink($link);
echo "hello Emmanuel Chidera";
?>