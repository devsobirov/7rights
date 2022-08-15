@extends('layouts.app')
@section('content')
    @php $data = !empty($data) ? $data : []; @endphp
<div class="card">
	<div class="card-header"><strong>Редактирование документа: </strong>{{$doc->name}}</div>

	<form method = "POST" class = "docForm" action="{{ route('docs.open', $doc_id) }}">

		@csrf
		<div class = "row">
			<!--<button class = "btn btn-primary formPutDemo">Заполнить демо</button>-->
			<div class="col text-right p-3">
				<button class = "btn btn-warning mr-3 formClear">Очистить</button>
			</div>
		</div>
		<input type = "hidden" name = "doc_id" value = "{{$doc_id}}">
		<input type = "hidden" name = "editable_id" value = "{{!empty($editable_id) ? $editable_id : null}}">
		<div class="card-body">
			<div class="form-group row">
				<div class="col">
					<label for="sch-number">Счёт на оплату №</label>
					<input type="text" class="form-control" placeholder="255" name = "sch_number" value="{{ get_if_key_exists($data, 'sch_number') }}" id="sch-number">
                </div>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" name = "sch_date" value="{{ get_if_key_exists($data, 'sch_date') }}" id="sch-date">
                </div>
			</div>
			<div class="form-group row">
				<label for="sch-nazn" class="col-sm-2 col-form-label">Назначение платежа</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="sch-nazn" placeholder="Назначение платежа" name = "sch_nazn" value="{{ get_if_key_exists($data, 'sch_nazn') }}">
                </div>
			</div>
			<hr>
			@include('edit.orginfo');
			<hr>
			@include('edit.bank-reqs');
			<hr>
			@include('edit.buyer');
			<hr>

			@include('edit.gruzpol');
		</div>
		<hr>
			@include('tables.schet-na-oplatu');
		<hr>
			@include('edit.dopinfo');
		<hr>
		<div class="row p-2">
            <div class="col">
            @if(request()->routeIs('my-docs.edit'))
                <button class="btn btn-primary mx-1 updateDoc">Обновить</button>
				<button class="btn btn-primary mx-1 saveDoc">Сохранить как новый</button>
            @else
                <button class="btn btn-primary saveDoc">Сохранить</button>
            @endif
            </div>

			<div class="col text-right">
				<button class="btn btn-primary">Печать</button>
			</div>
		</div>
</form>
</div>
 @endsection
