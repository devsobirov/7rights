<div class = "row">

			<div class = "col">
				<h4>Перечень</h4>
				<div  class = "table-responsive">
					<table class = "table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th scope = "col">#</th>
								<th scope = "col">Наименование</th>
								<th scope = "col">Ед.Изм</th>
								<th scope = "col">Кол-во (прописью)</th>
								<th scope = "col"></th>
							</tr>
						</thead>
						<tbody id = "gruzList">
							<tr id = "toAppend" style = "display:none;">	
								<td class = "gruzRowCnt"></td>
								<td><input type = "text" name = "gruzName"  class = "gruzName"></td>
								<td><input type = "text" name = "edIzm" class = "edIzm"></td>
								<td><input type = "number" name = "gruzCol" data-calc = "true"  class = "gruzCol"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
							<tr>	
								<td class = "gruzRowCnt">1</td>
								<td><input type = "text" name = "table[1][gruzName]" class = "gruzName[1]"></td>
								<td><input type = "text" name  = "table[1][edIzm]" class = "edIzm"></td>
								<td><input type = "number" name = "table[1][gruzCol]" data-calc = "true" class = "gruzCol"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan = "4"><a id = "addTableRow"><i class="fa-solid fa-plus"></i>Добавить строку</a></td>
							</tr>
						</tfoot>
					</table>

				</div>
				
			</div>
		</div>