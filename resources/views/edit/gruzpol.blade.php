<div class="row">
				<div class="col">
					<h4>Грузополучатель</h4>
					<fieldset class="form-group">
						<div class="row">
							<div class="col-sm-10">
								<div class="form-check">
									<input class="form-check-input gruzPolRadio" type="radio" name="gridRadiosGruzPol" id="gruzpol1" data-el = "gruzpol-another" value="0" checked>
									<label class="form-check-label" for="gruzpol1"> Покупателем является грузоперевозчик </label>
								</div>
								<div class="form-check">
									<input class="form-check-input gruzPolRadio" type="radio" name="gridRadiosGruzPol" id="gruzpol2" data-el = "gruzpol-another" value="1">
									<label class="form-check-label" for="gruzpol2"> Грузополучатель другая организация </label>
								</div>
							</div>
						</div>
					</fieldset>
					<div id="gruzpol-another" style = "display:none;">
						<div class="form-group row">
							<label for="sch-pokname" class="col-sm-2 col-form-label">Покупатель</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokname" name = "sch_gruzpolname" placeholder="ООО Ромашка"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokinn" class="col-sm-2 col-form-label">ИНН</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokinn" name = "sch_gruzpolinn" placeholder="1234567890"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokkpp" class="col-sm-2 col-form-label">КПП</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokkpp" name = "sch_gruzpolkpp" placeholder="987654321"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokadress" class="col-sm-2 col-form-label">Адрес</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokadress" name = "sch_gruzpoladress" placeholder="г. Москва, ул. Пушкина, д.2"> </div>
						</div>
						<div class="form-group row">
							<label for="sch-pokphones" class="col-sm-2 col-form-label" >Телефоны</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="sch-pokphones" name = "sch_gruzpolphones" placeholder="+74990100000"> </div>
						</div>
					</div>
				</div>
			</div>