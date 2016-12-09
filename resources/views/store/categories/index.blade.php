@extends ('layouts.admin')
@section ('contenido')
		
	<div class="row">
		
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Categories List <a href="categories/create"><button class="btn btn-success">New</button></a></h3>
			@include('store/categories/search')
		</div>

	</div>

	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Options</th>
					</thead>
					@foreach ($categories as $cat)
					<tr>
						<td>{{$cat->id}}</td>
						<td>{{$cat->name}}</td>
						<td>{{$cat->description}}</td>
						<td>
							<a href=""><button class="btn btn-info">Edit</button></a>
							<a href=""><button class="btn btn-danger">Delete</button></a>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			{{$categories->render()}}

		</div>

	</div>
@endsection