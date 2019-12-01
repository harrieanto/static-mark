<?php

/**
 *
 * Author : harrieanto31@yahoo.com | Web:http://bandd.web.id
 * -----------------------------------------------------------------
 * Created : 28/Nov/2019 11:04:45 PM
 * This view has been produced by RTE Template Engine
 * automaticly
 * As Repository PHP Framework Components
 * -----------------------------------------------------------------
 * Github : https://github.com/harrieanto
 *
 **/


require_once __DIR__.'/../../../vendor/autoload.php';

?>

    <script type="text/javascript" src="/public/js/bandd.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-105835542-1"></script>
<script>
  ready(function () {
      window.Sharer.init();
      
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-105835542-1');
  })
</script>

<?php if(isset($readPost)): ?>
    <script>
  ready(function () {
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
        */
        var disqus_config = function () {
        this.page.url = "<?php echo   $blog = route('blog')  ?>";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "<?php echo   $readPost['slug']  ?>"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://harrieanto.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
      })
    </script>
    <?php endif; ?>
