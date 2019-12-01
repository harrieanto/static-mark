<div class="container">
  <div class="row">
    @yield('flash')
    @{{ $route = route('login')|unechoable }}
    <form method="post" action="@{{ $route }}" class="form-group">
        <input type="hidden" name="_token" value="@{{ $csrfToken }}"/>
    	<div class="col-12">
    		<button type="submit" class="button bg-redlighter right margin-right">Login</button>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			<input type="text" name="username" class="form-input text-large"/>
    			<div class="input-text-placeholder">
    				Username
    			</div>
    		</div>
    	</div>
    	<div class="col-6">
    		<div class="form padding-jumbo">
    			<input type="password" name="password" class="form-input text-large"/>
    			<div class="input-text-placeholder">
    				Password
    			</div>
    		</div>
    	</div>
    </form>
  </div>
</div>