#!/usr/bin/php -q
<?php

include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'classes/B2B_Api.php';
$config = include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'foundation.php';
$client = new B2B_Api($config['user'],$config['password'],TRUE);

if( $client->get_error_msg())
{
    exit($client->get_error_msg()."\n");
}

$positions = array(
    array(
        'cat_id' => 'mobile',
        'dev_id' => '5800xm',
        'price' => 360,
        'beznal' => 1,
        'on_stock' => 1,
        'comment' => 'Клевый телефон',
        'delete' => 0
    ),
    array(
        'cat_id' => 'mobile',
        'dev_id' => '5800xm',
        'price' => 300,
        'beznal' => 2,
        'on_stock' => 2,
        'comment' => 'Клевый телефон 2',
        'delete' => 0
    ),
);

$client->edit_position_pack($positions);

$client->commit();

$response = $client->get_pricelist_report($client->get_access_key());

var_dump($response);
