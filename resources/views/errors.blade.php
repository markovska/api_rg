@extends('app')

@section('content')
	<div class="container text-center" style="margin-top: 20px">
		<div class="alert alert-danger">
  			<strong>Error! </strong>
  			<br/>
  			<h6><strong>{{ $message }}</strong></h6>
		</div>
	</div>
@endsection