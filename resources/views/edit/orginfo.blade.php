<div class="row">
				<div class="col">
					<h4>Информация об организации</h4>
					<div class="form-group row">
						<label for="sch-name" class="col-sm-2 col-form-label">Название</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-name" value="{{ get_if_key_exists($data, 'sch_name') }}" name = "sch_name" placeholder="ИП Иванов"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-inn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-inn" value="{{ get_if_key_exists($data, 'sch_inn') }}" name = "sch_inn" placeholder="0123456789"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-kpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-kpp" value="{{ get_if_key_exists($data, 'sch_kpp') }}" name = "sch_kpp" placeholder="КПП"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-adress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-adress" value="{{ get_if_key_exists($data, 'sch_adress') }}" name = "sch_adress" placeholder="г.Москва, ул. Пушкина, д. 1"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-phones" class="col-sm-2 col-form-label">Телефоны</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-phones" value="{{ get_if_key_exists($data, 'sch_phones') }}" name = "sch_phones" placeholder="+74950000000"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-fax" class="col-sm-2 col-form-label">Факс</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-fax" value="{{ get_if_key_exists($data, 'sch_fax') }}" name = "sch_fax" placeholder="+74950000000"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-ruk" class="col-sm-2 col-form-label">Руководитель</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-ruk" value="{{ get_if_key_exists($data, 'sch_ruk') }}" name = "sch_ruk" placeholder="Петров Пётр Петрович"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-buh" class="col-sm-2 col-form-label">Главный бухгалтер</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-buh" value="{{ get_if_key_exists($data, 'sch_buh') }}" name = "sch_buh" placeholder="Семёнов Семён Семёнович"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-nds" class="col-sm-2 col-form-label">Ставка НДС</label>

						<div class="col-sm-5">
                            @php $nds =  get_if_key_exists($data, 'nds') @endphp
							<select id="sch-nd" name = "nds" class="form-control">
								<option value="none">Без НДС</option>
								<option value="0" @if($nds == 0) selected @endif>0%</option>
								<option value="10" @if($nds == 10) selected @endif>10%</option>
								<option value="13" @if($nds == 13) selected @endif>18%</option>
								<option value="20" @if($nds == 20) selected @endif>20%</option>
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
