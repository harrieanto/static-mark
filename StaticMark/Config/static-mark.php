<?php

$query = "Assalamualaikum...\n";
$query.= "Saya berkunjung ke website bandd.web.id\n";
$query.= "Dan saya tertarik untuk memesan e-book The Home Green PHP Framework";
$query = rawurlencode($query);

$contact = app_env('WHATSAPP_API_HOST') . DS . app_env('APP_CONTACT') . '?text='. $query;

$description = <<<EOT
	Ingin jadi mastah PHP programmer? <br/>
	Cuma disini kamu bisa tau jawabannya.<br/>
EOT;

return array(
	'path' => array(
		'root' => realpath(__DIR__.DS.'..'.DS.'Storage'), 
		'post' => 'Post', 
		'output' => 'Output'
	), 
	'uploader' => array(
	    'path' => ROOT_PATH . DS . 'public/images', 
	), 
	'view' => array(
		'basepath' => realpath(__DIR__.DS.'..'.DS.'View')
	), 
	'navigation' => array(
		'default' => array(
			'Buku Membangun Laravel' => array(
				'icon' => 'ion-ios-book-outline', 
				'slug' => DS, 
			), 
			'Blog' => array(
				'icon' => 'ion-ios-book', 
				'slug' => DS . 'blog'
			), 
			'Creator' => array(
				'icon' => 'ion-ios-person-outline', 
				'slug' => DS . app_env('APP_USERNAME')
			), 
		), 
		'admin' => array(
			'Add Post' => array(
				'icon' => 'ion-ios-compose-outline', 
				'slug' => route('dashboard.post'), 
			), 
		), 
	), 
	'creator' => array(
		'username' => app_env('APP_USERNAME'), 
		'image' => array(
			'path' => '/public/images/harrieanto.jpg'
		), 
		'url' => app_env('APP_HOST').DS.app_env('APP_USERNAME'), 
		'about' => 'Penulis merupakan seorang Web Developer, 
			creator Repository PHP Framework dan juga 
			penulis buku The Home Green PHP Aplikasi Framework.', 
	), 
	'advert' => array(
		'cta' => 'Yuk Klik Sekarang', 
		'title' => 'Siap jadi PHP Developer HANDAL?!', 
		'image' => array(
			'path' => '/public/images/buku_membangun_laravel.jpg'
		), 
		'contact' => app_env('APP_HOST'), 
		'description' => $description
	), 
);
