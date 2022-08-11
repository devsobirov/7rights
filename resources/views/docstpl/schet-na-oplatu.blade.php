@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header"><strong>Редактирование документа: </strong>{{$doc->name}}</div>
	
	<form method = "POST" class = "docForm">
	
		@csrf
		<div class = "row">
			<!--<button class = "btn btn-primary formPutDemo">Заполнить демо</button>-->
			<div class = "col  text-right">
				<button class = "btn btn-warning formClear">Очистить</button>
			</div>
		</div>
		<input type = "hidden" name = "doc_id" value = "{{$doc_id}}">
		<div class="card-body">
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">Счёт на оплату №</label>
					<input type="text" class="form-control" placeholder="255" name = "sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" name = "sch_date" id="sch-date"> </div>
			</div>
			<div class="form-group row">
				<label for="sch-nazn" class="col-sm-2 col-form-label">Назначение платежа</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="sch-nazn" placeholder="Назначение платежа" name = "sch_nazn"> </div>
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
		<div class="row">
			<div class="col">
				<button class="btn btn-primary saveDoc">Сохранить</button>
			</div>
			<div class="col text-right">
				<button class="btn btn-primary">Печать</button>
			</div>
		</div>
</div>
</form>
</div>
 @endsection