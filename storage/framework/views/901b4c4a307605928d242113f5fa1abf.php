<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 21/Sep/2019 12:08:27 AM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Html meta name -->
	

  <title><?php echo   $title  ?></title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="<?php echo   $csrfToken  ?>">
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1.0" name="viewport">


     <!-- Stylesheet -->
    

  <link rel="icon" href="/public/images/repository-icon.png" type="image/png">
  <link rel="apple-touch-icon" href="/public/images/repository-icon.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/public/images/repository-icon.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/public/images/repository-icon.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/public/images/repository-icon.png">
  <link rel="stylesheet" type="text/css" href="/public/build/css/simple-grid.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/simple-bg.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/simple-color.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/layout.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/table.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/modal.css"/>
<link rel="stylesheet" type="text/css" href="/public/build/css/dropdown.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/notify.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/css/animation.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/vendor/highlight/styles/github-gist.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/vendor/select2/select2.css"/>
  <link rel="stylesheet" type="text/css" href="/public/build/vendor/ionicon/css/ionicons.css"/>


<style>
  .ce-block__content {
    background: var(--bg-white);
  }

  .select2-container {
  display: initial;
  }

  .select2-container--default .select2-selection--multiple {
    background-color: white;
    border: none;
    cursor: text; }
</style>


</head>
<body>
    <div class="body-overlay bg-retro"></div>

    <!-- Content conatiner -->
     <main>
        <!-- Content navigation -->
        <nav class="navigation bg-white">
            
<?php $view('bandd/nav') ?>

        </nav>
        <!-- Main content -->
        <div class="main-content col-100-percent bg-white">
            
<?php $view('bandd/header') ?>

         	<div class="container-fluid">
         	  <div class="row">
         	      <div class="col-12">
         	          <div class="padding-medium text-right">
         	              <ul class="breadcrumb">
         	                  
<li><a href="<?php echo   $dashboardHomeLink  ?>"><span class="icon ion-ios-home"></span></a></li>

<?php if(isset($currentPageLocation)): ?>
<?php if(is_array($currentPageLocation)): ?>
<?php foreach($currentPageLocation as $link => $identifier): ?>
<?php if(is_string($link)): ?>
<li><a href="<?php echo   $link  ?>"><?php echo   $identifier  ?></a></li>
<?php endif; ?>

<?php if(!is_string($link)): ?>
<li><a href='javascript:;' class="disabled"><?php echo   $identifier  ?></a></li>
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>

<?php if(!is_array($currentPageLocation)): ?>
<li><a href='javascript:;' class="disabled"><?php echo   $currentPageLocation  ?></a></li>
<?php endif; ?>
<?php endif; ?>

         	              </ul>
         	          </div>
         	      </div>
         	  </div>
        	</div>
            
<?php if(isset($post) || isset($tags)): ?>
<?php $view('blog/index') ?>
<?php endif; ?>

<?php if(isset($post) || isset($tags)): ?>
<?php $view('blog/index') ?>
<?php endif; ?>

<?php if(isset($readPost)): ?>
<?php $view('blog/read') ?>
<?php endif; ?>

<?php if(isset($postListByTag)): ?>
<?php $view('blog/tag') ?>
<?php endif; ?>

<?php if(isset($createPost)): ?>
<?php $view('blog/blog-manager') ?>
<?php endif; ?>

            
<?php if(isset($login)): ?>
<?php $view('blog/login') ?>
<?php endif; ?>

<?php if(isset($addMenu)): ?>
<?php $view('blog/menu-manager') ?>
<?php endif; ?>

<?php if(isset($updateMenu)): ?>
<?php $view('blog/menu-manager') ?>
<?php endif; ?>

<?php if(isset($menuManager)): ?>
<?php echo   $view('blog/menu')  ?>
<?php endif; ?>

<?php if(isset($createAdPost)): ?>
<?php echo   $view('blog/ads-manager')  ?>
<?php endif; ?>

<?php if(isset($createBlogPost) || isset($updateBlogPost) || isset($blogPostManager)): ?>
<?php $view('blog/blog-manager') ?>
<?php endif; ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 bg-white">
                        <img src="/home/public/images/book.jpg" class="img-responsive"/>
                    </div>
                    <div class="col-8 bg-white">
                        <h1 class="text-center text-black">Special Diskon 30%</h1>
                        <h2 class="text-center text-black">"The Home Green PHP Aplikasi Framework"</h2>
                    </div>
                    <div class="col-12">
                    <div class="container bg-white text-black">
                        <p>Sebuah buku yang akan memandu Anda step by step membangun LARAVEL framework Anda sendiri. Penasaran bagimana framework LARAVEL dibangun?</p>
                        <p>Melalui buku ini Anda akan menemukan jawabannya. Tidak hanya itu. Melalui buku ini Anda akan menemukan teori dan praktek yang akan membuat pondasi Anda dalam membangun aplikasi khususnya web aplikasi semakin kokoh.</p>
                        <h2>Apa saja ilmu yang akan saya dapatkan dari buku ini?</h2>
                        <p>
                        Pertanyaan yang sangat bagus sekali. Jika saya menjadi Anda maka saya juga akan menanyakan hal yang sama seperti yang Anda tanyakan saat ini. Jangan sampai Anda membeli kucing dalam karung!
                        </p>
                        <p>
                        Melalui buku ini Anda akan belajar bagaimana membangun web aplikasi secara SOLID, sehingga aplikasi yang Anda bangun jauh lebih adapatable dengan perubahan yang pasti terjadi. Dengan membangun aplikasi dengan pondasi yang SOLID, maka aplikasi Anda dapat menyesuaikan perubahan-perubahan yang terjadi dimasa mendatang tanpa banyak melakukan perombakan secara masal atau bahkan menulis ulang aplikasi yang sudah Anda bangun.
                        </p>
                        <h2>
                        Pernahkan Anda mengalami keadaan dimana Anda kesulitan hanya untuk melakukan perubahan kecil?
                        </h2>
                        <blockquote>Sekalinya Anda merubah sebagian kecil dari code program aplikasi Anda seketika itu pula seluruh Aplikasi Anda tidak dapat berjalan!
                        </blockquote>
                        <p>
                        Seiring berjalannya waktu Aplikasi kita akan terus bertumbuh. Entah apapun alasannya pasti akan ada suatu situasi dimana kita ingin berpindah dari framework lama ke framework baru, mengganti infrastruktur database seperti RDBMS ke NoSQL atau malah ingin menggunakan API web service secara keseluruhan. Jika aplikasi kita tidak kita design dengan cara yang baik maka proses perpindahan atau transition tersebut aka sangat sulit kita lakukan!
                        </p>
                        <p>
                        Aplikasi yang Anda bangun dan develop merupakan sebuah investasi jangka panjang. Jika Anda menginvestasikan uang, tenaga, waktu dan pikiran Anda untuk membangun aplikasi berdasarkan pondasi yang rapuh, maka Anda sedang menanam investasi yang salah! Cepat atau lambat Anda akan kesulitan melakukan perubahan pada aplikasi Anda ketika Aplikasi Anda mulai berkembang menjadi lebih besar.
                        </p>
                        <p>Melalui buku ini Anda akan diajak mengenal dan memahami bagaimana membangun web aplikasi secara SOLID sehingga Anda tidak perlu khawatir pada perubahan yang akan terjadi dimasa mendatang. Didalam buku ini Anda akan diajak belajar mulai dari:
                        <ul>
                        <li>Mengenali STUPID Design Architecure sampai bagaimana membangun aplikasi dengan SOLID Architecure.</li>
                        <li>Anda akan belajar code coupling, apa itu code coupling dan bagaimana menghindarinya.</li>
                        <li>Anda akan belajar tentang sejumlah design pattern yang akan sering kita gunakan untuk menulis code program yang readable dan maintainable. Selain itu kita juga akan menerapkan bagaimana sejumlah design pattern tersebut diaplikasi dalam membngun Aplikasi Framwork.</li>
                        <li>
                        Anda akan diajak untuk merubah sudut pandang Anda dari Traditional Architecture/MVC kedalam environment Clean Architecure. Disini Anda akan berkenalan dengan Domain Driven Design atau yang lebih dikenal dengan DDD dan Onion Architecure untuk menciptakan lingkungan/pondasi aplikasi yang clean/bersih/solid.
                        </li>
                        </ul>
                        </p>
                        <h1 class="text-center"><strike class="text-black">Rp 420.000,00</strike></h1>
                        <p class="text-center text-black">Tidak. Karena hari ini adalah hari teman, Anda tidak perlu membayar sebesar itu. Hari ini Anda cukup berinvestasi sebesar:</p>
                        <h1 class="text-center">Rp 294.000,00</h1>
                        <p class="text-center">Dan Anda sudah bisa membawa pulang ebook yang sudah Anda tunggu-tunggu untuk menjadi mastah programmer.</p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Triangle SVG -->
    <div style="fill: #fff;position:relative;top:-0.2%;">
       	<svg xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1950 150">
       		<path d="M 0,150 0,0 2000,0"></path>
       	</svg>
    </div>
     <!-- /Triangle SVG -->

     <!-- Fixed footer -->
    
<?php $view('bandd/fixed-footer') ?>


     <!-- Scroll to top navigation -->
    <div class="to-top bg-whitelighter">
    	<div class="to-top-content">
    		<div class="tooltip">
    			<a href="#" id="toTop">
    				<span class="icon ion-ios-arrow-up text-xxlarge"></span>
    			</a>
    			<span class="tooltip-text tooltip-top text-white">back to top</span>
    		</div>
    	</div>
    </div>

</body>
<!-- Javascript -->

<?php $view('partials/js') ?>

</html>