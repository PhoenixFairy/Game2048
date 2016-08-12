<?php
include 'php/Main.php';
include 'php/web/page.class.inc';
include 'php/web/contants.inc';
$data = array(
    'title' => "Game2048",
    'scripts' => array(
    	'js/display-array.js',
        'js/ajax-functions.js',
        'js/key-listener.js',
    	'js/index-initial.js'
    ),
    'body' => BODY_IN_INDEX,
    'style' => STYLE_IN_INDEX
);
$page = new Page($data);
$page->do_html();
?>