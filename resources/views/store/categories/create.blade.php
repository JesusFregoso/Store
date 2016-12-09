@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-xs-12">
			<h3>New Categorie</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>$error</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'store/categories','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Name ...">
				<label for="description">Description</label>
				<input type="text" name="description" class="form-control" placeholder="Description ..."> 
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Save</button>
				<button class="btn btn-danger" type="reset">Cancel</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop