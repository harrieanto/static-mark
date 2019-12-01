<div class="container">
  <div class="row">
    <div class="col-12">
    
    	@yield('flash')
    	
    	<div class="col-12">
    		<h2>Do Upload</h2>
    	</div>
    	@{{ $view('dashboard/posts/add') }}
    	
    	<div class="col-12 margin-top-32">
    		<h2>Manage Posts</h2>
    	</div>
    	
    	@if(isset($post) && $post->isAvailable())
      <div class="col-12">
      	<center>
      		<table class="table">
      			<thead>
      				<th>#</th>
      					<th>Title</th>
      					<th>Slug</th>
      					<th colspan=1>Action</th>
      				</thead>
      			<tbody>
      				@yield('post-table')
      			</tbody>
      		</table>
        </center>
      </div>
    	@endif
    	
    	<div class="col-12">
    		@yield('no-content')
    	</div>
    	
    	<div class="col-12">
    		@yield('pagination')
    	</div>
  	 </div>
  </div>
</div>