<div class = "row">

			<div class = "col">
				<h4>К платёжно-расчётному документу</h4>
				<div  class = "table-responsive">
					<table class = "table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th scope = "col">#</th>
								<th scope = "col">№ документа</th>
								<th scope = "col">Дата</th>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
						</thead>
						<tbody id = "gruzList">
							<tr id = "toAppend" style = "display:none;">	
								<td class = "gruzRowCnt"></td>
								<td><input type = "text" name = "docName"  class = "docName"></td>
								<td><input type = "text" name = "date" class = "dateForm"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
							<tr>	
								<td class = "gruzRowCnt">1</td>
								<td><input type = "text" name = "table[1]docName"  class = "docName"></td>
								<td><input type = "text" name = "table[1]date" class = "dateForm"></td>
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