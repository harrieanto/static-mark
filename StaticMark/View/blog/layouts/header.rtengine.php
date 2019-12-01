<div class="menu-close-button margin-24 text-center" style="top:0;">
    <div class="menu-icon-line-1 menu-icon-line bg-red"></div>
    <div class="menu-icon-line-2 menu-icon-line bg-red"></div>
    <div class="menu-icon-line-3 menu-icon-line bg-red"></div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-12 margin-top text-center">
			@yield('site-link')
		</div>
		<div class="col-12">
			<ul class="navigation">
				<li>
					<ul class="dropdown">
					   <a href="javascript:;" class="dropdown-button text-red ion-ios-person-outline text-xxlarge"></a>
						<li class="dropdown-collapse bg-semiclouds text-semiclouds">
							<ul>
								@if($isLogged)
								<li><a href="@{{ $logout = route('logout') }}" class="link"><i class="icon ion-ios-person margin-right"></i>Logout</a></li>
								@endif
								
								@if(!$isLogged)
								<li><a href="@{{ $login = route('login') }}" class="link"><i class="icon ion-ios-person margin-right"></i>Login</a></li>
								@endif
							</ul>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;" class="site-search-open"><i class="icon text-xxlarge text-red ion-ios-search"></i></a>
					@yield('site-search')
				</li>
			</ul>
		</div>
	</div>
</div>
