<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('/',function(){
	echo '成功！';
});

Macaw::get('home','HomeController@home');
Macaw::get('pull','HomeController@pull');
Macaw::get('page','HomeController@page');

Macaw::dispatch('WebView@process');