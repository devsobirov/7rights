@extends('layouts.app')
@section('content')

	
		<div class = "card">
			<div class = "card-header">Список документов</div>
			<div class = "card-body">
				<ul>
				@foreach ($list as $item)
					<li><a href = "new/{{$item->id}}">{{$item->name }}</a></li>
				@endforeach
				</ul>
			</div>
		</div>
	
@endsection