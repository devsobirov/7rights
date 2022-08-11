<div class = "row">

			<div class = "col">
				<h4>К платёжно-расчётному документу</h4>
				<div  class = "table-responsive">
					<table class = "table table-striped table-bordered table-hover table-sm" id = "plat">
						<thead>
							<tr>
								<th scope = "col">#</th>
								<th scope = "col">Номер документа</th>
								<th scope = "col">Дата</th>
								<th scope = "col"></th>
							</tr>
						</thead>
						<tbody class = "tableBody">
							<tr class = "clone" style = "display:none;">	
								<td class = "tblRowCount"></td>
								<td><input type = "text" name = "plat[0][number]"  data-id = "number"></td>
								<td><input type = "text" name = "plat[0][date]" class = "dateForm" data-id = "date"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
							<tr>	
								<td class = "tblRowCount">1</td>
								<td><input type = "text" name = "plat[1][number]" data-id="number"></td>
								<td><input type = "text" name  = "plat[1][date]" data-id = "date" class = "dateForm"></td>
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