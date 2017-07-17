@extends('app')

@section('content')
	<div class="container">
		<h2>Employee Overview</h2>
		<hr>
		@foreach($map as $item)
			<div class="panel panel-default text-center">
				<div class="panel-heading">
					<h3 class="panel-title">{{$item->getName()}}</h3>
				</div>

				<div class="panel-body">
					<img src="{{$item->getAvatar()}}" alt="image">
					<br/>
					<h4>{{$item->getTitle()}} at {{$item->getCompany()}}</h4>
					<h5>{{$item->getBio()}}</h5>
				</div>
			</div>
		@endforeach
	</div>		
@endsection