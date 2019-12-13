<?php

$target = '/home/timsmekc/domains/timsmek.com.ng/storage/app/public_html';
$link = '/home/timsmekc/domains/timsmek.com.ng/public_html/storage';
symlink($target, $link);

echo readlink($link);
echo "Storage Linked Well!";
?>