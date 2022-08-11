<div class = "row">
			<div class = "col">
				<div  class = "table-responsive">
					<table class = "table table-striped table-bordered table-hover table-sm" style = "width: 100%;
  table-layout: fixed;" id = "tovs">
						<thead style = "text-align: center;">
							<tr>
								<th scope = "col" rowspan = "2">#</th>
								<th scope = "col" rowspan = "2">Наименование</th>
								<th scope = "col" rowspan = "2">Код вида товара</th>
								<th scope = "col" colspan = "2">Единица изм.</th>
								<th scope = "col" rowspan = "2">Кол-во</th>
								<th scope = "col" rowspan = "2">Цена</th>
								<th scope = "col" rowspan = "2">Сумма</th>
								<th scope = "col" rowspan = "2">Акциз</th>
								<th scope = "col" colspan = "2">Страна</th>
								<th scope = "col" rowspan = "2">№ ГТЦ</th>
								<th scope = "col" rowspan = "2"><i class="fa-solid fa-trash"></i></th>
							</tr>
							<tr>
								<th scope = "col">Код</th>
								<th scope = "col">усл. обозн.</th>
								<th scope = "col">Код</th>
								<th scope = "col">кратк.наим</th>
							</tr>
						</thead>
						<tbody id = "gruzList" class = "tableBody" class = "qwe">
							<tr id = "toInsert" class = "clone" style = "display:none;">	
								<td class = "tblRowCount" style = "text-align: center;"></td>
								<td><input type = "text" class = "form-control" data-id = "Naim"></td>
								<td><input type = "text" class = "form-control" data-id = "TovCode"></td>
								<td><input type = "text" class = "form-control" data-id = "IzmCode" ></td>
								<td><input type = "text" class = "form-control" data-id = "IzmObozn"></td>
								<td><input type = "text" class = "form-control" class = "Cnt" data-id = "Cnt"></td>
								<td><input type = "text" class = "form-control" class = "Crice" data-id = "Price"></td>
								<td><input type = "text" class = "form-control" class = "Sum" data-id = "Sum"></td>
								<td><input type = "text" class = "form-control" data-id = "Akc"></td>
								<td><input type = "text" class = "form-control" data-id = "CountryCode"></td>
								<td><input type = "text" class = "form-control" data-id = "CountryShortName"></td>
								<td><input type = "text" class = "form-control" data-id = "GTC"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
							
							<tr>	
								<td class = "tblRowCount" style = "text-align: center;">1</td>
								<td><input type = "text" class = "form-control" data-id = "Naim" name = "tovs[0][Naim]"></td>
								<td><input type = "text" class = "form-control" data-id = "TovCode" name = "tovs[0][TovCode]"></td>
								<td><input type = "text" class = "form-control" data-id = "IzmCode" name = "tovs[0][IzmCode]"></td>
								<td><input type = "text" class = "form-control" data-id = "IzmObozn" name = "tovs[0][IzmObozn]"></td>
								<td><input type = "text" class = "form-control" class = "Cnt" data-id = "Cnt" name = "tovs[0][Cnt]"></td>
								<td><input type = "text" class = "form-control" class = "price" data-id = "Price" name = "tovs[0][Price]"></td>
								<td><input type = "text" class = "form-control" class = "sum" data-id = "Sum" name = "tovs[0][Sum]"></td>
								<td><input type = "text" class = "form-control" data-id = "Akc" name = "tovs[0][Akc]"></td>
								<td><input type = "text" class = "form-control" data-id = "CountryCode" name = "tovs[0][CountryCode]"></td>
								<td><input type = "text" class = "form-control" data-id = "CountryShortName" name = "tovs[0][CountryShortName]"></td>
								<td><input type = "text" class = "form-control" data-id = "GTC" name = "tovs[0][GTC]"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
					
							
						</tbody>
						<tfoot>
							<tr>
								<td colspan = "4"><a class = "tableAddRows"><i class="fa-solid fa-plus"></i>Добавить строку</a></td>
							</tr>
						</tfoot>
					</table>

				</div>
				
			</div>
		</div>