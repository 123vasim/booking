<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script> 
	<title>Condition</title>
</head>
<body>
@include('layouts.master');
<form method="post" action="/condition/store">
	@csrf
	<nav class="main-header">
		<div class="col-lg-12"style="margin-top: 40px;">
			<div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title p-2">Term&Condition </h3>
				</div>
				<div class="p-4">
					<div>
						<label>Product Name</label>
						<select name="product_id" class="form-control">
							@foreach($data as $value)
		                  		<option value="{{$value->id}}">{{$value->name}}</option>
		                  	@endforeach 
						</select>				
					</div>				
					<div class="mt-3">
						<label>Term & Condition</label>
						<textarea class="form-control" id="editor" name="condition" type="text"></textarea>
						<span class="text-danger">{{ $errors->first('condition') }}</span>
					</div>
					<div class=" mb-4 mt-3  col-lg-8 d-flex mx-auto">
		            	<button type="submit" name="submit" value="submit" class="col-lg-6 form-control btn btn-success">Submit</button>
		            	<a class="col-lg-6" href="/condition/index"><button type="button" name="back" value="back" class="col-lg-12 form-control btn btn-primary">Back</button></a>
		        	</div>
		       	</div>
	       	</div>
       	</div>
   	</nav>			
</form>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
<script>CKEDITOR.replace('editor');</script>
</body>
</html>