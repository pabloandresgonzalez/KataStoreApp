<?php 

return [
	'cliedt_id' => env(key: 'PAYPAL_CLIENT_ID'),
	'secret' => env(key: 'PAYPAL_SECRET'),

	'settings' => [
		'mode' => env(key: 'PAYPAL_MODE', default:'sandbox' ),
		'http.connectionTimeOut' => 30,
		'log.LogEnable' => true,
		'log.FileName' => storage_path( path: '/logs/paypal.log'),
		'log.LogLevel' => 'ERROR'
	]
];

