@extends('layouts.app')
@section('content')

		@foreach($doc as $d)
		<div class = "card">
			<div class = "card-header">Редактирование документа {{$d->name}}</div>
			<div class = "card-body">
				<p>{{$d->name }}</p>
				<textarea>{{$d->document}}</textarea>
			</div>
			<div class = "card-body">
				<div class = "row">
					<div class = "col">
						<button class = "btn btn-primary">Сохранить</button>
					</div>
					<div class = "col text-right">
						<button class = "btn btn-primary">Печать</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach

@endsection