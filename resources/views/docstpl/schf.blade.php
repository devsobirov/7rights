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
				<div class="col p-2 text-right">
					<button class="btn btn-warning formClear mr-3">Очистить</button>
				</div>
				<input type="hidden" name="doc_id" value="{{$doc_id}}">
				<input type="hidden" name="orientation_horizontal" value="2"> </div>
                <input type = "hidden" name = "editable_id" value = "{{!empty($editable_id) ? $editable_id : null}}">
			<hr>
			<div class="form-group row">
				<dov class="col">
					<label for="sch-number">Счёт-фактурау №</label>
					<input type="text" class="form-control" placeholder="255" value="{{ get_if_key_exists($data, 'sch_number') }}" name="sch_number" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_date') }}" name="sch_date" id="sch-date"> </div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
                    @php $corrects = (get_if_key_exists($data, 'sch_number') == 'yes')@endphp
					<h3>Исправления</h3>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="corrects_no" name="corrects" value="no" data-el="#corrects-number-date"
                               @if(!$corrects) checked @endif data-func="hide">
						<label class="form-check-label" for="corrects_no">Не вносились</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="corrects_yes" name="corrects" value="yes" data-el="#corrects-number-date"
                               @if($corrects) checked @endif data-func="show">
						<label class="form-check-label" for="corrects_yes">Вносились</label>
					</div>
				</div>
			</div>
			<div class="form-group row" id="corrects-number-date" style="display:none;">
				<dov class="col">
					<label for="sch-number">Исправление №</label>
					<input type="text" class="form-control" placeholder="11" value="{{ get_if_key_exists($data, 'sch_corrects_nuber') }}" name="sch_corrects_nuber" id="sch-number"> </dov>
				<div class="col">
					<label for="sch-date-2">От</label>
					<input type="text" class="form-control dateForm" placeholder="21.06.2022" value="{{ get_if_key_exists($data, 'sch_corrects_date') }}" name="sch_corrects_date" id="sch-date-2"> </div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
                    @php $avance = (get_if_key_exists($data, 'avance') == 'yes') @endphp
					<h3>На авансовый платёж</h3>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="avance_yes" name="avance" value="yes"
                               @if($avance) checked @endif>
						<label class="form-check-label" for="avance_yes">Да</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="avance_no" name="avance" value="no"
                               @if(!$avance) checked @endif>
						<label class="form-check-label" for="avance_no">Нет</label>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
                    @php $dog_usl = (get_if_key_exists($data, 'dog_usl') == 'yes') @endphp
					<h3>Счёт-фактура на услуги или по договору</h3>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="dog_yes" name="dog_usl" value="yes"
                               @if($dog_usl) checked @endif>
						<label class="form-check-label" for="dog_yes">Да</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" id="dog_no" name="dog_usl" value="no"
                               @if(!$dog_usl) checked @endif>
						<label class="form-check-label" for="dog_no">Нет</label>
					</div>
				</div>
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
			@include('tables.schf')
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
                        @php $nds = get_if_key_exists($data, 'nds') @endphp
						<label for="sch-nds" class="col-sm-2 col-form-label">Ставка НДС</label>
						<div class="col-sm-5">
							<select id="sch-nd" name="nds" class="form-control">
								<option @if($nds == 'none' || $nds) selected @endif value="none">Без НДС</option>
								<option @if($nds == '0') selected @endif value="0">0%</option>
								<option @if($nds == '10') selected @endif value="10">10%</option>
								<option @if($nds == '13') selected @endif value="13">18%</option>
								<option @if($nds == '20') selected @endif value="20">20%</option>
							</select>
						</div>
                        <div class="col-sm-5">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-sm-10">
                                        @php $nds_calc =  get_if_key_exists($data, 'nds_calc') @endphp
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="nds_calc" id="gridRadios1" value="none" @if(!in_array($nds_calc, ['summ','up'])) checked @endif>
                                            <label class="form-check-label" for="gridRadios1"> Не учитывать </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" @if($nds_calc == 'summ') checked @endif  name="nds_calc" id="gridRadios2" value="summ">
                                            <label class="form-check-label" for="gridRadios2"> В сумме </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" @if($nds_calc == 'up') checked @endif name="nds_calc" id="gridRadios3" value="up">
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
                @php $gruzotp_who = get_if_key_exists($data, 'gruzotp_who') @endphp
				<div class="col">
					<h3>Грузоотправитель</h3>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzotp_he" name="gruzotp_who" value="he" data-el="#gruzotp-some-org" data-func="hide"
                            @if($gruzotp_who == 'he' || !$gruzotp_who) checked @endif>
						<label class="form-check-label showHideEl" for="gruzotp_he">Он же</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzotp_some" name="gruzotp_who" value="some" data-el="#gruzotp-some-org" data-func="show"
                            @if($gruzotp_who == 'some') checked @endif>
						<label class="form-check-label showHideEl" for="gruzotp_some">Другая организация</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzotp_none" name="gruzotp_who" value="none" data-el="#gruzotp-some-org" data-func="hide"
                            @if($gruzotp_who == 'none') checked @endif>
						<label class="form-check-label showHideEl" for="gruotp_none">Не указывать</label>
					</div>
					<div id="gruzotp-some-org" style="display:none;">
						<div class="form-check">
							<label for="gruzpol-some-name" class="form-check-label">Наименование</label>
							<input type="text" value="{{get_if_key_exists($data, 'gruzotp_some_name')}}" name="gruzotp_some_name" class="form-control" id="gruzotp-some-name"> </div>
						<div class="form-check">
							<label for="gruzpol-some-adress" class="form-check-label">Адрес</label>
							<input type="text" value="{{get_if_key_exists($data, 'gruzotp_some_adress')}}" name="gruzotp_some_adress" class="form-control" id="gruzotp-some-adress"> </div>
					</div>
				</div>
			</div>
			<hr>
			<div class="row">
				<div class="col">
                    @php $gruzpol_who = get_if_key_exists($data, 'gruzpol_who') @endphp
					<h3>Грузополучатель</h3>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzpol_he" name="gruzpol_who" value="he" data-el="#gruzpol-some-org" data-func="hide"
                            @if($gruzpol_who == 'he' || !$gruzpol_who) checked @endif>
						<label class="form-check-label showHideEl" for="gruzpol_he">Он же</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzpol_some" name="gruzpol_who" value="some" data-el="#gruzpol-some-org" data-func="show"
                            @if($gruzpol_who == 'some') checked @endif>
						<label class="form-check-label showHideEl" for="gruzpol_some">Другая организация</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input showHideEl" type="radio" id="gruzpol_none" name="gruzpol_who" value="none" data-el="#gruzpol-some-org" data-func="hide"
                            @if($gruzpol_who == 'none') checked @endif>
						<label class="form-check-label showHideEl" for="gruzpol_none">Не указывать</label>
					</div>
					<div id="gruzpol-some-org" style="display:none;">
						<div class="form-check">
							<label for="gruzpol-some-name" class="form-check-label">Наименование</label>
							<input type="text" value="{{get_if_key_exists($data, 'gruzpol_some_name')}}" name="gruzpol_some_name" class="form-control" id="gruzpol-some-name"> </div>
						<div class="form-check">
							<label for="gruzpol-some-adress" class="form-check-label">Адрес</label>
							<input type="text" value="{{get_if_key_exists($data, 'gruzpol_some_adress')}}" name="gruzpol_some_adress" class="form-control" id="gruzpol-some-adress"> </div>
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

			<hr>
			<div class="row">
				<div class="col">
					<h3>Дополнительная информация</h3>
					<p>Документ об отгрузке</p>
				</div>
			</div>
			<div class="form-group row">
				<div class="col">
					<label for="otp-no">№ п/п</label>
					<input type="text" class="form-control" placeholder="1" value="{{get_if_key_exists($data, 'otp_no')}}" name="otp_no" id="otp_no"> </div>
				<div class="col">
					<label for="otp-numdat">№ и дата</label>
					<input type="text" class="form-control" placeholder="123 от 21.06.2022" value="{{get_if_key_exists($data, 'otp_numdat')}}" name="otp_numdat" id="otp-numdat"> </div>
			</div>
			<div class="form-group row">
				<div class="col"> <small>Примечание: номер и дата документа, например: № 111 от 01.07.2021 г. Если документов более одного, то разделить их точкой с запятой (;), пример "№ 1 от 21.02.2022 ; №24 от 12.06.2019"</small> </div>
			</div>
			<div class="form-group row">
				<label for="gos_idn" class="col-sm-2 col-form-label">Идентификатор госконтракта</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="gos_idn" value="{{get_if_key_exists($data, 'gos_idn')}}" name="gos_idn" placeholder=""> </div>
			</div>
			<hr> @include('tables.schf2')
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
</div> @endsection
