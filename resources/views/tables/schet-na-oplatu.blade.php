<div class = "row">
            @php
                $table = get_if_key_exists($data, 'table');
                $table = is_array($table) ? $table : [];
                $nextRow = count_if_array($table) + 1;
                $gruzTotalSum = 0;
            @endphp

			<div class = "col">
				<h4>Груз</h4>
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
                            @foreach($table as $row)
                                @php
                                    $gruzSum = round(intval(get_if_key_exists($row, 'gruzCount')) * floatval(get_if_key_exists($row, 'gruzPrice')), 2);
                                     $gruzTotalSum += $gruzSum;
                                @endphp
                                <tr>
                                    <td class = "gruzRowCnt">{{ $loop->iteration }}</td>
                                    <td><input type = "text" name = "table[{{ $loop->iteration }}][gruzName]" value="{{get_if_key_exists($row, 'gruzName')}}"  class = "gruzName"></td>
                                    <td><input type = "text" name = "table[{{ $loop->iteration }}][edIzm]" value="{{get_if_key_exists($row, 'edIzm')}}" class = "edIzm"></td>
                                    <td><input type = "number" name = "table[{{ $loop->iteration }}][gruzCount]" value="{{get_if_key_exists($row, 'gruzCount')}}" data-calc = "true"  class = "gruzCount"></td>
                                    <td><input type = "number" name = "table[{{ $loop->iteration }}][gruzPrice]" value="{{get_if_key_exists($row, 'gruzPrice')}}" data-calc = "true" class = "gruzPrice"></td>
                                    <td class = "gruzSumm">{{$gruzSum}}</td>
                                    <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                                </tr>
                            @endforeach
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
								<td class = "gruzRowCnt">{{ $nextRow }}</td>
								<td><input type = "text" name = "table[{{ $nextRow }}][gruzName]" class = "gruzName[{{$nextRow}}]"></td>
								<td><input type = "text" name  = "table[{{ $nextRow }}][edIzm]" class = "edIzm"></td>
								<td><input type = "number" name = "table[{{ $nextRow }}][gruzCount]" data-calc = "true" class = "gruzCount"></td>
								<td><input type = "number" name = "table[{{ $nextRow }}][gruzPrice]"  data-calc = "true" class = "gruzPrice"></td>
								<td class = "gruzSumm"></td>
								<td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan = "4"><a id = "addTableRow"><i class="fa-solid fa-plus"></i>Добавить груз</a></td>
								<td><strong>Итого:</strong></td>
								<td colspan = "2" class = "priceRes">{{$gruzTotalSum ? $gruzTotalSum. ' руб.' : ''}}</td>
						</tfoot>
					</table>

				</div>

			</div>
		</div>
