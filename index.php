<?php
include 'php/Main.php';
include 'php/web/page.class.inc';
include 'php/web/contants.inc';
$data = array(
    'title' => "Game2048",
    'scripts' => array(
        'js/ajax-functions.js',
        'js/key-listener.js'
    ),
    'body' => BODY_IN_INDEX,
    'style' => STYLE_IN_INDEX
);
$page = new Page($data);
$page->do_html();
?>