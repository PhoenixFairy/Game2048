<?php
include 'php/Main.php';
include 'php/web/page.class.inc';
$data = array(
    'title' => "Game2048",
    'scripts' => array(
    	'js/display-array.js',
        'js/ajax-functions.js',
        'js/key-listener.js',
    	'js/index-initial.js'
    ),
    'css' => array(
    	'css/index-style.css'
	),
    'body' => Page::get_html_table(array(
        'tr' => array(
            array("","","",""),
            array('','','',''),
            array('','','',''),
            array('','','',''),
        ),
        'id' => 'display',
        'align' => 'center'
    )),
);
$page = new Page($data);
$page->do_html();
?>