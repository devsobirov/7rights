@extends('layouts.app')
@section('content')
    @php $data = !empty($data) ? $data : []; @endphp
<div class="card">
	<div class="card-header"><strong>Редактирование документа: </strong> Доверенность на получение товарно-материальных ценностей</div>
	<div class="card-body">
		<form method = "POST" class = "docForm" action="{{ route('docs.open', $doc_id) }}">

			@csrf
			<div class = "row">
				<!--<button class = "btn btn-primary formPutDemo">Заполнить демо</button>-->
				<div class = "col  text-right">
					<button class = "btn btn-warning formClear">Очистить</button>
				</div>

			</div>
			<input type = "hidden" name = "doc_id" value = "{{$doc_id}}">
            <input type = "hidden" name = "editable_id" value = "{{!empty($editable_id) ? $editable_id : null}}">
			<hr>
			<div class = "row">
				<div class = "col">
					<h3>Информация о документе</h3>
					<div class="form-group row">
						<label for="sch_number" class="col-sm-2 col-form-label">Доверенность №</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch_number" value="{{ get_if_key_exists($data, 'sch_number') }}" name = "sch_number" placeholder="123"> </div>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="sch_date">Дата выдачи:</label>
							<input type="text" class="form-control dateForm" placeholder="01.01.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name = "sch_date" id="sch_datenumber"> </div>
						<div class="col">
							<label for="sch_expired">Срок действия до:</label>
							<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_expired') }}" name = "sch_expired" id="sch_expired"> </div>
					</div>
					<div class="form-group row">
						<label for="sch_by" class="col-sm-2 col-form-label">На получение от:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch_by" name = "sch_by" value="{{ get_if_key_exists($data, 'sch_by') }}" placeholder="ООО Ромашка"> </div>
					</div>
					<div class="form-group row">
						<label for="sch_by_doc" class="col-sm-2 col-form-label">По документу:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch_by_doc" name = "sch_by_doc" value="{{ get_if_key_exists($data, 'sch_by_doc') }}" placeholder="Расоряжение о безвозмездной раздаче собственности"> </div>
					</div>
				</div>
			</div>
			<hr>
			<div class = "row">

				<div class = "col">
					<h3>Лицо, получившее доверенность</h3>
					<div class="form-group row">
						<label for="sch_dolg" class="col-sm-2 col-form-label">Должность, ФИО в дат. падеже</label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_dolg" name = "sch_dolg" value="{{ get_if_key_exists($data, 'sch_dolg') }}" placeholder="Старшему выгульщику альпак, Иванову Ивану Ивановичу">
						</div>
					</div>
					<div class="form-group row">
						<div class="col">
							<label for="sch_pass">Серия паспорта:</label>
							<input type="text" class="form-control" placeholder="6411" name = "sch_parr" value="{{ get_if_key_exists($data, 'sch_parr') }}" id="sch_pass"> </div>
						<div class="col">
							<label for="sch_passno">Номер паспорта:</label>
							<input type="text" class="form-control" placeholder="123456" name = "sch_passno" value="{{ get_if_key_exists($data, 'sch_passno') }}" id="sch_passno"> </div>
					</div>
					<div class="form-group row">
						<label for="sch_pass_by" class="col-sm-2 col-form-label">Кем выдан: </label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_pass_by" name = "sch_pass_by" value="{{ get_if_key_exists($data, 'sch_pass_by') }}" placeholder="Отделением УФМС России по Алтайскому краю в гор Барнаул">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_pass_date" class="col-sm-2 col-form-label">Дата выдачи: </label>
						<div class="col-sm-10">
                            <input type="text" class="form-control dateForm" id="sch_pass_date" name = "sch_pass_date" value="{{ get_if_key_exists($data, 'sch_pass_date') }}" placeholder="21.09.1988">
						</div>
					</div>
				</div>


			</div>
			<hr>
			<div class = "row">
				<div class = "col">
					<h3>Информация об организации</h3>
					<div class="form-group row">
						<label for="sch_orgname" class="col-sm-2 col-form-label">Название</label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_orgname" value="{{ get_if_key_exists($data, 'sch_orgname') }}" name = "sch_orgname" placeholder="ООО Ромашка">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_inn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_inn" value="{{ get_if_key_exists($data, 'sch_inn') }}" name = "sch_inn" placeholder="123456">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_kpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_kpp" value="{{ get_if_key_exists($data, 'sch_expired') }}" name = "sch_kpp" placeholder="123456">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_adress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
								<input type="text" class="form-control" id="sch_adress" value="{{ get_if_key_exists($data, 'sch_adress') }}" name = "sch_adress" placeholder="г.Москва, ул. Пушкина, д.1">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_ruk" class="col-sm-2 col-form-label">Руковоитель</label>
						<div class="col-sm-10">
                            <input type="text" class="form-control" id="sch_ruk" value="{{ get_if_key_exists($data, 'sch_ruk') }}" name = "sch_ruk" placeholder="Петров П.П.">
						</div>
					</div>
					<div class="form-group row">
						<label for="sch_buh" class="col-sm-2 col-form-label">Главный бухгалтер</label>
						<div class="col-sm-10">
                            <input type="text" class="form-control" id="sch_buh" value="{{ get_if_key_exists($data, 'sch_buh') }}" name = "sch_buh" placeholder="Сидоров С.С.">
						</div>
					</div>
				</div>
			</div>
			<hr>
			@include('edit.bank-reqs')
			<hr>
			@include('tables.dovtmc')
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
</div>
@endsection
