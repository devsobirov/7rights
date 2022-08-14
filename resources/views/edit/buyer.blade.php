<div class="row">
				<div class="col">
					<h4>Покупатель</h4>
					<div class="form-group row">
						<label for="sch-pokname" class="col-sm-2 col-form-label">Название</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-pokname" value="{{ get_if_key_exists($data, 'sch_pokname') }}" name = "sch_pokname" placeholder="ООО Ромашка"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-pokinn" class="col-sm-2 col-form-label">ИНН</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-pokinn" value="{{ get_if_key_exists($data, 'sch_pokinn') }}" name = "sch_pokinn" placeholder="1234567890"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-pokkpp" class="col-sm-2 col-form-label">КПП</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-pokkpp" value="{{ get_if_key_exists($data, 'sch_pokkpp') }}" name = "sch_pokkpp" placeholder="987654321"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-pokadress" class="col-sm-2 col-form-label">Адрес</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-pokadress" value="{{ get_if_key_exists($data, 'sch_pokadress') }}" name = "sch_pokadress" placeholder="г. Москва, ул. Пушкина, д.2"> </div>
					</div>
					<div class="form-group row">
						<label for="sch-pokphones" class="col-sm-2 col-form-label">Телефоны</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="sch-pokphones" value="{{ get_if_key_exists($data, 'sch_pokphones') }}" name = "sch_pokphones" placeholder="+74990100000"> </div>
					</div>
				</div>
			</div>
