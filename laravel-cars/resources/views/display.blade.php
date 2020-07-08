@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="row justify-content-center">

			<div class="col-md-10 col-10 col-sm-10">
				
				<table class="table table-bordered table-stripped">

					<thead>
						<th scope="col">ID</th>
						<th scope="col">Make</th>
						<th scope="col">Model</th>
						<th scope="col">Year</th>
						<th scope="col">Image</th>
						<th></th>
					</thead>

					<tbody>
						

						@foreach( $data as $car )

						<tr>
							
							<td>{{ $car->id }}</td>
							<td>{{ $car->make }}</td>
							<td>{{ $car->model }}</td>
							<td>{{ $car->year }}</td>
							<td>{{ $car->image }}</td>
							<td></td>
							<td></td>

						</tr>

						@endforeach

					</tbody>
					
				</table>

			</div>
			
		</div>
		
	</div>

@endsection
