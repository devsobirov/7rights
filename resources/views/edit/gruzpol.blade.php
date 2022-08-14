<div class="row">
				<div class="col">
					<h4>Грузополучатель</h4>
					<fieldset class="form-group">
						<div class="row">
                            @php $gruzPolRadio = get_if_key_exists($data, 'gridRadiosGruzPol') @endphp
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input gruzPolRadio" type="radio" name="gridRadiosGruzPol" id="gruzpol1" data-el = "gruzpol-another" value="0" @if(!$gruzPolRadio) checked @endif>
									<label class="form-check-label" for="gruzpol1"> Покупателем является грузоперевозчик </label>
								</div>
								<div class="form-check">
									<input class="form-check-input gruzPolRadio" type="radio" name="gridRadiosGruzPol" id="gruzpol2" data-el = "gruzpol-another" value="1" @if($gruzPolRadio) checked @endif >
									<label class="form-check-label" for="gruzpol2"> Грузополучатель другая организация </label>
								</div>
							</div>
						</div>
					</fieldset>
					<div id="gruzpol-another" @if(!$gruzPolRadio)  style = "display:none;" @endif>
						<div class="form-group row">
							<label for="sch-pokname" class="col-sm-2 col-form-label">Покупатель</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokname" value="{{ get_if_key_exists($data, 'sch_gruzpolname') }}" name = "sch_gruzpolname" placeholder="ООО Ромашка"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokinn" class="col-sm-2 col-form-label">ИНН</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokinn" value="{{ get_if_key_exists($data, 'sch_gruzpolinn') }}" name = "sch_gruzpolinn" placeholder="1234567890"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokkpp" class="col-sm-2 col-form-label">КПП</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokkpp" value="{{ get_if_key_exists($data, 'sch_gruzpolkpp') }}" name = "sch_gruzpolkpp" placeholder="987654321"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokadress" class="col-sm-2 col-form-label">Адрес</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokadress" value="{{ get_if_key_exists($data, 'sch_gruzpoladress') }}" name = "sch_gruzpoladress" placeholder="г. Москва, ул. Пушкина, д.2"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokphones" class="col-sm-2 col-form-label" >Телефоны</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokphones" value="{{ get_if_key_exists($data, 'sch_gruzpolphones') }}" name = "sch_gruzpolphones" placeholder="+74990100000"> </div>
						</div>
					</div>
				</div>
			</div>
