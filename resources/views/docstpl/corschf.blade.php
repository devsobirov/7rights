@extends('layouts.app')
@section('content')
    @php $data = !empty($data) ? $data : []; @endphp
<div class="card">
	<div class="card-header"><strong>Редактирование документа: </strong> {{ $doc->name }}</div>
	<div class="card-body">
		<form method="POST" class="docForm" action="{{ route('docs.open', $doc_id) }}">
			@csrf
			<div class="row">
				<!--<button class = "btn btn-primary formPutDemo">Заполнить демо</button>-->
				<div class="col  text-right">
					<button class="btn btn-warning formClear">Очистить</button>
				</div>
				<input type="hidden" name="doc_id" value="{{$doc_id}}">
				<input type="hidden" name="orientation_horizontal" value="2">
                <input type = "hidden" name = "editable_id" value = "{{!empty($editable_id) ? $editable_id : null}}">
			</div>
			<hr>
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">Корректировочный счёт-фактурау №</label>
					<input type="text" class="form-control" placeholder="255" value="{{ get_if_key_exists($data, 'sch_number') }}" name="sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name="sch_date" id="sch-date"> </div>
			</div>
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">Исправлениеу №</label>
					<input type="text" class="form-control" placeholder="255" value="{{ get_if_key_exists($data, 'sch_number') }}" name="sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name="sch_date" id="sch-date"> </div>
			</div>
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">КК счёту-фактурау №</label>
					<input type="text" class="form-control" placeholder="255" value="{{ get_if_key_exists($data, 'sch_number') }}" name="sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name="sch_date" id="sch-date"> </div>
			</div>
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">Исправлениеу №</label>
					<input type="text" class="form-control" placeholder="255" value="{{ get_if_key_exists($data, 'sch_number') }}" name="sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name="sch_date" id="sch-date"> </div>
			</div>
			<hr>

            <div class="row">
                <div class="col">
                    @php $wallet = get_if_key_exists($data, 'wallet') @endphp
                    <h3>Валюта документа</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="rub" name="wallet" value="rub" data-el="#some-wallet" data-func="hide"
                               @if($wallet == 'rub' || !$wallet) checked @endif>
                        <label class="form-check-label showHideEl" for="rub">Руб</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="usd" name="wallet" value="usd" data-el="#some-wallet" data-func="hide"
                               @if($wallet == 'usd') checked @endif>
                        <label class="form-check-label showHideEl" for="usd">USD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="eur" name="wallet" value="eur" data-el="#some-wallet" data-func="hide"
                               @if($wallet == 'eur') checked @endif>
                        <label class="form-check-label showHideEl" for="eur">EUR</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="some_eallet" name="wallet" value="some" data-el="#some-wallet" data-func="show"
                               @if($wallet == 'some') checked @endif>
                        <label class="form-check-label showHideEl" for="some_wallet">Другое</label>
                    </div>
                </div>
            </div>
            <div class="form-group row" id="some-wallet" style="display:none;">
                <div class="col">
                    <label for="sch-number">Наименование</label>
                    <input type="text" class="form-control" placeholder="Наименование валюты" name="sch_some_wallet_name" id="sch-number"
                           value="{{get_if_key_exists($data, 'sch_some_wallet_name')}}">
                </div>
                <div class="col">
                    <label for="sch-date">Код</label>
                    <input type="text" class="form-control" placeholder="911" name="sch_some_wallet_code" id="sch-date"
                           value="{{get_if_key_exists($data, 'sch_some_wallet_code')}}">
                </div>
            </div>
            <hr>
			<hr>
			<div class="row">
				<div class="col">
                    @php $sch_orgtype = get_if_key_exists($data, 'sch_orgtype') @endphp
                    <h3>Информация о продавце</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="sch-orgtype-org" name="sch_orgtype" value="org" data-show="#org-group" data-hide="#ip-group" data-func="showhide"
                               @if ($sch_orgtype == 'org' || !$sch_orgtype) checked @endif>
                        <label class="form-check-label showHideEl" for="sch-orgtype-org">Организация</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input showHideEl" type="radio" id="sch-orgtype-ip" name="sch_orgtype" value="ip" data-hide="#org-group" data-show="#ip-group" data-func="showhide"
                               @if ($sch_orgtype == 'ip') checked @endif >
                        <label class="form-check-label showHideEl" for="sch-orgtype-ip">ИП</label>
                    </div>

                    <div id="org-group">
                        <div class="form-group row">
                            <label for="org_naimr" class="col-sm-2 col-form-label">Наименование</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_naim" name="org_naim" value="{{ get_if_key_exists($data, 'org_naim') }}" placeholder="ООО Василёк"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_inn" class="col-sm-2 col-form-label">ИНН</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_inn" name="org_inn" value="{{ get_if_key_exists($data, 'org_inn') }}" placeholder="123456789"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_kpp" class="col-sm-2 col-form-label">КПП</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_kpp" name="org_kpp" value="{{ get_if_key_exists($data, 'org_kpp') }}" placeholder="123456789"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_adress" class="col-sm-2 col-form-label">Адрес</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_adress" name="org_adress" value="{{ get_if_key_exists($data, 'org_adress') }}" placeholder="12345, г. Москва, ул. Пушкина, стр 1."> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_ruk" class="col-sm-2 col-form-label">Руководитель</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_ruk" name="org_ruk" value="{{ get_if_key_exists($data, 'org_ruk') }}" placeholder="Петров П.П."> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_buh" class="col-sm-2 col-form-label">Главный бухгалтер</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="org_buh" name="org_buh" value="{{ get_if_key_exists($data, 'org_buh') }}" placeholder="Сидоров С.С."> </div>
                        </div>
                    </div>
                    <div id="ip-group" style="display:none;">
                        <div class="form-group row">
                            <label for="ip_fio" class="col-sm-2 col-form-label">Ф.И.О полностью</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ip_fio" name="ip_fio" value="{{ get_if_key_exists($data, 'ip_fi') }}" placeholder="Петров Пётр Петрович"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="ip_inn" class="col-sm-2 col-form-label">ИНН</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ip_inn" name="ip_inn" value="{{ get_if_key_exists($data, 'ip_inn') }}" placeholder="1234567890"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="org_kpp" class="col-sm-2 col-form-label">КПП</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ip_kpp" name="ip_kpp" value="{{ get_if_key_exists($data, 'ip_kpp') }}" placeholder="123456789"> </div>
                        </div>
                        <div class="form-group row">
                            <label for="ip_adress" class="col-sm-2 col-form-label">Адрес регистрации</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ip_adress" name="ip_adress" value="{{ get_if_key_exists($data, 'ip_adress') }}" placeholder="123456, г. Москва, пр. Предпринимателей, 25ч">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ip_req" class="col-sm-2 col-form-label"> Реквизиты свидетельства ИП </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ip_req" name="ip_req" value="{{ get_if_key_exists($data, 'ip_req') }}" placeholder="Св-во № 111 от 21.01.2001"> </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class = "col">
                            <h3>Информация о клиенте</h3>
                            <div class="form-group row">
                                <label for="pok_name" class="col-sm-2 col-form-label">Наименование</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pok_name" placeholder="ООО Цветоек" value="{{get_if_key_exists($data, 'pok_name')}}" name = "pok_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pok_inn" class="col-sm-2 col-form-label">ИНН</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pok_inn" placeholder="1234567890" value="{{get_if_key_exists($data, 'pok_inn')}}" name = "pok_inn">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pok_kpp" class="col-sm-2 col-form-label">КПП</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pok_kpp" placeholder="0987654321" value="{{get_if_key_exists($data, 'pok_kpp')}}" name = "pok_kpp">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pok_adress" class="col-sm-2 col-form-label">Адрес</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="pok_adress" placeholder="Адрес" value="{{get_if_key_exists($data, 'pok_adress')}}" name = "pok_adress">
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<hr>
			<div class="form-group row">
				<div class = "col">
					<h3>Информация о клиенте</h3>
					<div class="form-group row">
						<label for="pok_name" class="col-sm-2 col-form-label">Наименование</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pok_name" placeholder="ООО Цветоек" value="{{ get_if_key_exists($data, 'sch_number') }}" name = "pok_name">
						</div>
					</div>
					<div class="form-group row">
						<label for="pok_inn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pok_inn" placeholder="1234567890" value="{{ get_if_key_exists($data, 'sch_number') }}" name = "pok_inn">
						</div>
					</div>
					<div class="form-group row">
						<label for="pok_kpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pok_kpp" placeholder="0987654321" value="{{ get_if_key_exists($data, 'sch_number') }}" name = "pok_kpp">
						</div>
					</div>
					<div class="form-group row">
						<label for="pok_adress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="pok_adress" placeholder="Адрес" value="{{ get_if_key_exists($data, 'sch_number') }}" name = "pok_adress">
						</div>
					</div>
				</div>
			</div>
			<hr>
			@include('tables.corschf');

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
