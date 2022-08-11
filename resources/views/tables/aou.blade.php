<div class = "row">

			<div class = "col">
				<h4>Услуги</h4>
				<div  class = "table-responsive">
					<table class = "table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th scope = "col">#</th>
								<th scope = "col">Наименование</th>
								<th scope = "col">Ед.Изм</th>
								<th scope = "col">Кол-во</th>
								<th scope = "col">Цена</th>
								<th scope = "col">Сумма</th>
								<th scope = "col"></th>
							</tr>
						</thead>
						<tbody id = "gruzList">
							<tr id = "toAppend" style = "display:none;">	
								<td class = "gruzRowCnt"></td>
								<td><input type = "text" name = "gruzName"  class = "gruzName"></td>
								<td><input type = "text" name = "edIzm" class = "edIzm"></td>
								<td><input type = "number" name = "gruzCount" data-calc = "true"  class = "gruzCount"></td>
								<td><input type = "number" name = "gruzPrice" data-calc = "true" class = "gruzPrice"></td>
								<td class = "gruzSumm"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
							<tr>	
								<td class = "gruzRowCnt">1</td>
								<td><input type = "text" name = "table[1][gruzName]" class = "gruzName[1]"></td>
								<td><input type = "text" name  = "table[1][edIzm]" class = "edIzm"></td>
								<td><input type = "number" name = "table[1][gruzCount]" data-calc = "true" class = "gruzCount"></td>
								<td><input type = "number" name = "table[1][gruzPrice]"  data-calc = "true" class = "gruzPrice"></td>
								<td class = "gruzSumm"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan = "4"><a id = "addTableRow"><i class="fa-solid fa-plus"></i>Добавить строку</a></td>
								<td><strong>Итого:</strong></td>
								<td colspan = "2" class = "priceRes"></td>
						</tfoot>
					</table>

				</div>
				
			</div>
		</div>