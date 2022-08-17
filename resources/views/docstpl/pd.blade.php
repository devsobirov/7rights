@extends('layouts.app')
@section('content')
    @php $data = !empty($data) ? $data : []; @endphp
<div class="card">
	<div class="card-header"><strong>Редактирование документа: </strong>{{$doc->name}}</div>

	<form method = "POST" class = "docForm" action="{{ route('docs.open', $doc_id) }}">

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
					<label for="sch-number">Счёт-фактурау №</label>
					<input type="text" class="form-control" placeholder="255" name = "sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" name = "sch_date" id="sch-date"> </div>
			</div>
			<hr>
			<div class="form-group row">
				<label for="sch-nazn" class="col-sm-2 col-form-label">На авансовый платёж</label>
				<div class="col-sm-10">
					<fieldset class="form-group">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input sch_avance" type="radio" name= "sch_avance" id="avance" data-el = "sch_avance_yes" value="0" checked>
									<label class="form-check-label" for="avance"> Да </label>
								</div>
								<div class="form-check">
									<input class="form-check-input sch_avance" type="radio" name="sch_avance" id="avance2" data-el = "sch_avance_nor" value="1">
									<label class="form-check-label" for="avance2"> Нет </label>
								</div>
							</div>
						</div>
					</fieldset>

				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label for="sch-nazn" class="col-sm-2 col-form-label">Исправления</label>
				<div class="col-sm-10">
					<fieldset class="form-group">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input sch_corrects" type="radio" name= "sch_corrects" id="corrects" data-el = "sch_corrects_info" value="0" checked>
									<label class="form-check-label" for="corrects"> Не вносились </label>
								</div>
								<div class="form-check">
									<input class="form-check-input sch_corrects" type="radio" name= "sch_corrects" id="corrects2" data-el = "sch_corrects_info" value="1">
									<label class="form-check-label" for="corrects2"> Вносились </label>
								</div>
							</div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class = "form-group row" id = "sch_corrects_info" style = "display:none;">
				<divv class="col">
						<label for="sch-ncorrects-number">Исправлениеу №</label>
						<input type="text" class="form-control" placeholder="255" name = "sch_corrects_number" id="sch-corrects-number">
				</divv>
				<div class="col">
						<label for="sch-date">От</label>
						<input type="text" class="form-control dateForm" placeholder="21.06.2022" name = "sch_corrects_date" id="sch-corrects-date">
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label for="sch-pokname" class="col-sm-2 col-form-label">Тип документа</label>
				<div class="col-sm-10">
					<select class = "form-control" name = "sch_doc_type">
						<option value = "1">Счёт-фактура и передаточный документ (акт)</option>
						<option value = "2">Передаточный документ (акт)</option>
					</select>
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<label for="sch-pokname" class="col-sm-2 col-form-label">Валюта документа</label>
				<fieldset class="form-group">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input sch_money_type" type="radio" name= "sch_money_type" id="money_type_1" data-el = "sch_money_type" value="0" checked>
									<label class="form-check-label" for="sch_money_type"> Руб </label>
								</div>
								<div class="form-check">
									<input class="form-check-input sch_money_type" type="radio" name= "sch_money_type" id="sch_money_type2" data-el = "sch_corrects_info" value="1">
									<label class="form-check-label" for="sch_money_type2"> USD </label>
								</div>
								<div class="form-check">
									<input class="form-check-input sch_money_type" type="radio" name= "sch_money_type" id="sch_money_type3" data-el = "sch_corrects_info" value="1">
									<label class="form-check-label" for="sch_money_type3"> EUR </label>
								</div>
								<div class="form-check">
									<input class="form-check-input sch_money_type" type="radio" name= "sch_money_type" id="sch_money_type4" data-el = "sch_corrects_info" value="1">
									<label class="form-check-label" for="sch_money_type4"> Другое </label>
								</div>
							</div>
						</div>
				</fieldset>
			</div>
			<hr>
			<div class="form-group row">
				<div class="col">
					<label for="sch_money_name">Наименование</label>
					<input type="text" class="form-control" placeholder="RU" name = "sch_money_name" id="sch_money_name"> </div>
				<div class="col">
					<label for="sch_money_code">От</label>
					<input type="text" class="form-control" placeholder="Рубль" name = "sch_money_code" id="sch_money_code"> </div>
			</div>
			<hr>
			@include('tables.prd');
			<hr>
			@include('edit.seller-info');
		</div>
        <div class="row p-2">
            @if(auth()->id())
                @if(request()->routeIs('my-docs.edit'))
                    <div class="col">
                        <button class="btn btn-primary mx-1 updateDoc">Обновить</button>
                        <button class="btn btn-primary mx-1 saveDoc">Сохранить как новый</button>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary saveAndOpen">Обновить и печатать</button>
                        <button class="btn btn-primary openTemporary">Печатать только изменения</button>
                    </div>
                @else
                    <div class="col">
                        <button class="btn btn-primary saveDoc">Сохранить</button>
                    </div>
                    <div class="col text-right">
                        <button class="btn btn-primary saveAndOpen">Сохранить и печатать</button>
                    </div>
                @endif
            @else
                <div class="col text-center text-danger">Сохранение и печать документов доступно только для авторизованных пользователей</div>
            @endif
        </div>
	</form>
</div>
@endsection
