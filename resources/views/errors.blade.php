@extends('app')

@section('content')
	<div class="container text-center" style="margin-top: 20px">
		<div class="alert alert-danger">
  			<strong>Error! Status code is {{ $statusCode }} </strong>
  			<br/>
  			<h6><strong>{{ $message }}</strong></h6>

        @if($statusCode === 401)
          <h6>Your action is unauthorized.</h6>
        @elseif($statusCode === 403)
           <h6>Your action is forbidden.</h6>
        @elseif($statusCode === 404) 
          <h6>Page not found.</h6>
        @elseif($statusCode === 500)
          <h6>Internal server error occured.</h6>
        @endif
		</div>
	</div>
@endsection