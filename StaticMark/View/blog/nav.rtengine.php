@extend('blog/layouts/nav')

@section('index')
<div class="nav">
	<div class="nav-header text-center">
		<span class="nav-header-text bg-white text-red text-center">
			@{{ $name = app_env('APP_NAME') }}
		</span>
		<div class="nav-header-line bg-red"></div>
 	</div>

 	<div class="nav-content">
 	  <div class="row center">
 	    @foreach($defaultMenus as $name => $menu)
 	    <div class="nav-menu text-left">
 	      @{{ $icon = 'ion-ios-arrow-right'|unechoable }}
 	      
 	      @{{ if(isset($menu['icon'])):|unechoable }}
 	        @{{ $icon = $menu['icon']|unechoable }}
 	      @{{ endif;|unechoable }}

 	      @{{ $slug = ''|unechoable }}
 	      
 	      @{{ if(isset($menu['slug'])):|unechoable }}
 	        @{{ $slug = $menu['slug']|unechoable }}
 	      @{{ endif;|unechoable }}
 	      
 	      <a href="@{{ $slug }}" class="text-black">
 	        <i class="icon margin-right @{{ $icon }}"></i><span class="font-regular text-large link">@{{ $name }}<span>
 	      </a>
 	    </div>
 	    @endforeach
 	    
 	    @if($isLogged)
   	    @foreach($adminMenus as $name => $menu)
   	    <div class="nav-menu text-left">
   	      @{{ $icon = 'ion-ios-arrow-right'|unechoable }}
 	      
   	      @{{ if(isset($menu['icon'])):|unechoable }}
   	        @{{ $icon = $menu['icon']|unechoable }}
   	      @{{ endif;|unechoable }}

   	      @{{ $slug = ''|unechoable }}
 	      
   	      @{{ if(isset($menu['slug'])):|unechoable }}
   	        @{{ $slug = $menu['slug']|unechoable }}
   	      @{{ endif;|unechoable }}
 	      
   	      <a href="@{{ $slug }}" class="text-black">
   	        <i class="icon @{{ $icon }}  margin-right"></i><span class="font-regular text-large link">@{{ $name }}<span>
   	      </a>
   	    </div>
   	    @endforeach
 	    @endif
    </div>
  </div>
 	
 	<div class="nav-content">
 	  <div class="row center">
    </div>
  </div>
  
  <div class="container">
    <div class="menu-icon-line bg-red"></div>
  </div>
@stop