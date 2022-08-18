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
					<label for="sch-number">Акт оказания услуг №</label>
					<input type="text" class="form-control" placeholder="255" name = "sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" name = "sch_date" id="sch-date"> </div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<h4>Информация об организации</h4>
					<div class="form-group row">
						<label for="sch-name" class="col-sm-2 col-form-label">Название</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-name" name = "sch_name" placeholder="ИП Иванов"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-inn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-inn" name = "sch_inn" placeholder="0123456789"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-kpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-kpp" name = "sch_kpp" placeholder="КПП"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-adress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-adress" name = "sch_adress" placeholder="г.Москва, ул. Пушкина, д. 1"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-phones" class="col-sm-2 col-form-label">Сдал</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-phones" name = "sch_put" placeholder="Петров П.П."> </div>
					</div>
					<div class="form-group row">
						<label for="sch-fax" class="col-sm-2 col-form-label">Должность</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-fax" name = "sch_dolg" placeholder="Главный уборщик"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-nds" class="col-sm-2 col-form-label">Ставка НДС</label>
						<div class="col-sm-5">
							<select id="sch-nd" name = "nds" class="form-control">
								<option value="none">Без НДС</option>
								<option value="0">0%</option>
								<option value="10">10%</option>
								<option value="18">18%</option>
								<option value="20">20%</option>
							</select>
						</div>
						<div class="col-sm-5">
							<fieldset class="form-group">
								<div class="row">
									<div class="col-sm-10">
										<div class="form-check">
											<input class="form-check-input" type="radio" name="nds_calc" id="gridRadios1" value="none" checked>
											<label class="form-check-label" for="gridRadios1"> Не учитывать </label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="nds_calc" id="gridRadios2" value="summ">
											<label class="form-check-label" for="gridRadios2"> В сумме </label>
										</div>
										<div class="form-check">
											<input class="form-check-input" type="radio" name="nds_calc" id="gridRadios3" value="up">
											<label class="form-check-label" for="gridRadios3"> Сверху </label>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
					<h4>Информация о заказчике</h4>
					<div class="form-group row">
						<label for="sch-name" class="col-sm-2 col-form-label">Название</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-name" name = "sch_pol_name" placeholder="ИП Иванов"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-inn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-inn" name = "sch_pol_inn" placeholder="0123456789"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-kpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-kpp" name = "sch_pol_kpp" placeholder="КПП"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-adress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-adress" name = "sch_pol_adress" placeholder="г.Москва, ул. Пушкина, д. 1"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-phones" class="col-sm-2 col-form-label">Принял</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-phones" name = "sch_pol_get" placeholder="Петров П.П."> </div>
					</div>
					<div class="form-group row">
						<label for="sch-fax" class="col-sm-2 col-form-label">Должность</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-fax" name = "sch_pol_dolg" placeholder="Главный уборщик"> </div>
					</div>

				</div>
			</div>

			<hr>


		</div>
		<hr>
			@include('tables.aou');
		<hr>
			@include('edit.dopinfo');
		<hr>
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
