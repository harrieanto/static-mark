<?php

$this->group('v1', function ($route) {
	$route->post('blog/finder/page/:digit', "StaticMark\Controllers\FinderController@find");
});