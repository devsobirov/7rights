<div class="row">
				<div class="col">
					<h4>Банковские реквизиты организации</h4>
					<div class="form-group row">
						<label for="sch-bik" class="col-sm-2 col-form-label">БИК</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-bik" value="{{ get_if_key_exists($data, 'sch_bik') }}" name = "sch_bik" placeholder="БИК"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-bankname" class="col-sm-2 col-form-label">Наименование банка</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-bankname" value="{{ get_if_key_exists($data, 'sch_bankname') }}" name = "sch_bankname" placeholder="ПАО Сбербанк"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-bankplace" class="col-sm-2 col-form-label">Метонахождение</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-bankplace" value="{{ get_if_key_exists($data, 'sch_bankplace') }}" name = "sch_bankplace" placeholder="Местонахождение банка"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-bankkorr" class="col-sm-2 col-form-label">Корр. счёт №</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-bankkorr" value="{{ get_if_key_exists($data, 'sch_bankkorr') }}" name = "sch_bankkorr" placeholder="Корр.счёт"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-bankrash" class="col-sm-2 col-form-label">Расчётный счёт №</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-bankrasch" value="{{ get_if_key_exists($data, 'sch_bankrasch') }}" name = "sch_bankrasch" placeholder="Расчётный счёт"> </div>
					</div>
				</div>
			</div>
