@extends('app')

@section('content')
	<div class="container text-center" style="margin-top: 20px">
		<div class="alert alert-danger">
			<h5>Error!</h5>
  			<h6><strong>{{ $message }}</strong></h6>
		</div>
	</div>
@endsection