@{{ $target = route('dashboard.upload.post')|unechoable }}

<div class="col-6">
	<div class="label">Upload Markdown Post</div>
	<form enctype="multipart/form-data" method="post" action="@{{ $target }}" class="form-group">
		<input type="hidden" name="_token" value="@{{ $csrfToken }}"/>
		<div class="col-12">
	 		<button type="submit" class="button bg-redlighter right margin-right text-white">Upload Post</button>
	  	</div>
	  	<div class="col-12">
	  		<div class="form">
	  			<input type="file" name="attachment" class="form-input text-large text-red"/>
	  		</div>
	  	</div>
	 </form>
</div>

@{{ $target = route('dashboard.upload.image')|unechoable }}

<div class="col-6">
	<div class="label">Upload Image</div>
	<form enctype="multipart/form-data" method="post" action="@{{ $target }}" class="form-group">
		<input type="hidden" name="_token" value="@{{ $csrfToken }}"/>
		<div class="col-12">
			<button type="submit" class="button bg-redlighter right margin-right text-white">Upload Image</button>
		</div>
		<div class="col-12">
			<div class="form">
				<input type="file" name="attachment" class="form-input text-large text-red"/>
			</div>
		</div>
	</form>
</div>