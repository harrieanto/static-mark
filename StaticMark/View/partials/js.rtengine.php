@extend('partials/layouts/js')

@section('js-source')
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
	
	@{{ if(isset($readPost)):|unechoable }}
    <script>
	  ready(function () {
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
        */
        var disqus_config = function () {
        this.page.url = "@{{ $blog = route('blog') }}";  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = "@{{ $readPost['slug'] }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://harrieanto.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
      })
    </script>
    @{{ endif;|unechoable }}
@stop