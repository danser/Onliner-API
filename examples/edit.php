#!/usr/bin/php -q
<?php


include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'classes/B2B_Api.php';
$config = include dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR.'foundation.php';
$client = new B2B_Api($config['user'],$config['password']);

$positions = $client->export_price();

foreach ($positions as $pos_id => $values) {
    
      $edit_positions[] = array(
                        'cat_id' => $values['cat_id'],
                        'dev_id' => $values['dev_id'],
                        'pos_id' => $pos_id,
                        'price_id' => 222,
                        'comment' => 'tro-lo-lo',
                    );

}
$client->edit_position_pack($edit_positions);

$client->commit();

$response = $client->get_pricelist_report($client->get_access_key());

var_dump($response);
