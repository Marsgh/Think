<?php

use NoahBuscher\Macaw\Macaw;

Macaw::get('',function(){
	echo '成功！';
});

Macaw::get('/home','HomeController@home');

Macaw::dispatch();