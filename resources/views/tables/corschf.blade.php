@php
    $tovs = get_if_key_exists($data, 'tovs');
    $tovs = is_array($tovs) ? $tovs : [];
    $nextRow = count_if_array($tovs) + 1;
@endphp
<div class="row">
	<div class="col">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover table-sm" style = "width: 100%;
  table-layout: fixed; vertical-align: middle;" id = "tovs">
				<thead>
					<tr>
						<td rowspan="2">#</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Наименование</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Показатели связи с изменением стоимости отгруженных товаров</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Код вида товара</td>
						<td colspan="2" style = "text-align: center; vertical-align: middle;">Единица изм.</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Кол-во</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Цена</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Стоимость товаров</td>
						<td rowspan="2" style = "text-align: center; vertical-align: middle;">Акциз</td>
						<td rowspan="2"> X </td>
					</tr>
					<tr>
						<td style = "text-align: center; vertical-align: middle;">Код</td>
						<td style = "text-align: center; vertical-align: middle;">Усл.обозн.</td>
					</tr>
				</thead>
				<tbody class = 'corrBody'>

					<tr style = "display:none;" class = "clone1">
						<td rowspan="4" class = "rowCount" style = "text-align: center;"></td>
						<td rowspan = "4"><textarea style = "height: 100%;" class = "form-control" data-id = "Naim"></textarea></td>
						<td style = "text-align: center; vertical-align: middle;">А (до изменения)</td>
						<td><input type = "text" class = "form-control" data-id = "a_at"></td>
						<td><input type = "text" class = "form-control" data-id = "a_code"></td>
						<td><input type = "text" class = "form-control" data-id = "a_obozn"></td>
						<td><input type = "text" class = "form-control" data-id = "a_col"></td>
						<td><input type = "text" class = "form-control" data-id = "a_price"></td>
						<td><input type = "text" class = "form-control" data-id = "a_sum"></td>
						<td><input type = "text" class = "form-control" data-id = "a_akc"></td>
						<td rowspan="4"></td>
					</tr>
					<tr style = "display:none;" class = "clone2">
						<td style = "text-align: center; vertical-align: middle;">Б (после изменения)</td>
						<td><input type = "text" class = "form-control" data-id = "b_past"></td>
						<td><input type = "text" class = "form-control" data-id = "b_code"></td>
						<td><input type = "text" class = "form-control" data-id = "b_obozn"></td>
						<td><input type = "text" class = "form-control" data-id = "b_col"></td>
						<td><input type = "text" class = "form-control" data-id = "b_price"></td>
						<td><input type = "text" class = "form-control" data-id = "b_sum"></td>
						<td><input type = "text" class = "form-control" data-id = "b_akx"></td>
					</tr>
					<tr style = "display:none;" class = "clone3">
						<td style = "text-align: center; vertical-align: middle;">В ( увеличение )</td>
						<td><input type = "text" class = "form-control" data-id = "v_grow"></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><input type = "text" class = "form-control" data-id = "v_sum"></td>
						<td><input type = "text" class = "form-control" data-id = "v_akc"></td>
					</tr>
					<tr style = "display:none;" class = "clone4">
						<td style = "text-align: center; vertical-align: middle;">Г ( уменьшение )</td>
						<td><input type = "text" class = "form-control" data-id = "g_um"></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><input type = "text" class = "form-control" data-id = "g_sum"></td>
						<td><input type = "text" class = "form-control" data-id = "g_akc"></td>
					</tr>

                    @forelse($tovs as $row)
					<tr>
						<td rowspan="4" class = "rowCount" style = "text-align: center;">{{$loop->iteration}}</td>
						<td rowspan = "4"><textarea style = "height: 100%;"  class = "form-control" data-id = "Naim" name = "tovs[{{$loop->iteration}}][naim]"></textarea>{{ get_if_key_exists($row, 'naim') }}</td>
						<td style = "text-align: center; vertical-align: middle;">А (до изменения)</td>
						<td><input type = "text" class = "form-control" data-id = "a_at" name = "tovs[{{$loop->iteration}}][a_at]" value="{{ get_if_key_exists($row, 'a_at') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_code" name = "tovs[{{$loop->iteration}}][a_code]" value="{{ get_if_key_exists($row, 'a_code') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_obozn" name = "tovs[{{$loop->iteration}}][a_obozn]" value="{{ get_if_key_exists($row, 'a_obozn') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_col" name = "tovs[{{$loop->iteration}}][a_col]" value="{{ get_if_key_exists($row, 'a_col') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_price" name = "tovs[{{$loop->iteration}}][a_price]" value="{{ get_if_key_exists($row, 'a_price') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_sum" name = "tovs[{{$loop->iteration}}][a_sum]" value="{{ get_if_key_exists($row, 'a_sum') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "a_akc" name = "tovs[{{$loop->iteration}}][a_akc]" value="{{ get_if_key_exists($row, 'a_akc') }}"></td>
						<td rowspan="4"></td>
					</tr>
					<tr>
						<td>Б (после изменения)</td>
						<td><input type = "text" class = "form-control" data-id = "b_past" name = "tovs[{{$loop->iteration}}][b_past]" value="{{ get_if_key_exists($row, 'b_past') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_code" name = "tovs[{{$loop->iteration}}][b_code]" value="{{ get_if_key_exists($row, 'b_code') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_obozn" name = "tovs[{{$loop->iteration}}][b_obozn]" value="{{ get_if_key_exists($row, 'b_obozn') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_col" name = "tovs[{{$loop->iteration}}][b_col]" value="{{ get_if_key_exists($row, 'b_col') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_price" name = "tovs[{{$loop->iteration}}][b_price]" value="{{ get_if_key_exists($row, 'b_price') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_sum" name = "tovs[{{$loop->iteration}}][b_sum]" value="{{ get_if_key_exists($row, 'b_sum') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "b_akc" name = "tovs[{{$loop->iteration}}][b_akc]" value="{{ get_if_key_exists($row, 'b_akc') }}"></td>
					</tr>
					<tr>
						<td style = "text-align: center; vertical-align: middle;">В ( увеличение )</td>
						<td><input type = "text" class = "form-control" data-id = "v_grow" name = "tovs[{{$loop->iteration}}][v_grow]" value="{{ get_if_key_exists($row, 'v_grow') }}"></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><input type = "text" class = "form-control" data-id = "v_sum" name = "tovs[{{$loop->iteration}}][v_sum]" value="{{ get_if_key_exists($row, 'v_sum') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "v_akc" name = "tovs[{{$loop->iteration}}][v_akc]" value="{{ get_if_key_exists($row, 'v_akc') }}"></td>
					</tr>
					<tr>
						<td style = "text-align: center; vertical-align: middle;">Г ( уменьшение )</td>
						<td><input type = "text" class = "form-control" data-id = "g_um" name = "tovs[{{$loop->iteration}}][g_um]" value="{{ get_if_key_exists($row, 'g_um') }}"></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><p style = "text-align: center;">X</p></td>
						<td><input type = "text" class = "form-control" data-id = "g_sum" name = "tovs[{{$loop->iteration}}][g_sum]" value="{{ get_if_key_exists($row, 'g_sum') }}"></td>
						<td><input type = "text" class = "form-control" data-id = "g_akc" name = "tovs[{{$loop->iteration}}][g_akc]" value="{{ get_if_key_exists($row, 'g_akc') }}"></td>
					</tr>
                    @empty
                        <tr>
                            <td rowspan="4">1</td>
                            <td rowspan="4"><textarea style="height: 100%;" class="form-control" data-id="Naim" name="tovs[0][naim]"></textarea></td>
                            <td style="text-align: center; vertical-align: middle;">А (до изменения)</td>
                            <td><input type="text" class="form-control" data-id="a_at" name="tovs[0][a_at]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_code" name="tovs[0][a_code]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_obozn" name="tovs[0][a_obozn]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_col" name="tovs[0][a_col]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_price" name="tovs[0][a_price]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_sum" name="tovs[0][a_sum]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="a_akc" name="tovs[0][a_akc]" autocomplete="off"></td>
                            <td rowspan="4"></td>
                        </tr>
                        <tr>
                            <td>Б (после изменения)</td>
                            <td><input type="text" class="form-control" data-id="b_past" name="tovs[0][b_past]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_code" name="tovs[0][b_code]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_obozn" name="tovs[0][b_obozn]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_col" name="tovs[0][b_col]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_price" name="tovs[0][b_price]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_sum" name="tovs[0][b_sum]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="b_akc" name="tovs[0][b_akc]" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">В ( увеличение )</td>
                            <td><input type="text" class="form-control" data-id="v_grow" name="tovs[0][v_grow]" autocomplete="off"></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><input type="text" class="form-control" data-id="v_sum" name="tovs[0][v_sum]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="v_akc" name="tovs[0][v_akc]" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">Г ( уменьшение )</td>
                            <td><input type="text" class="form-control" data-id="g_um" name="tovs[0][g_um]" autocomplete="off"></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><p style="text-align: center;">X</p></td>
                            <td><input type="text" class="form-control" data-id="g_sum" name="tovs[0][g_sum]" autocomplete="off"></td>
                            <td><input type="text" class="form-control" data-id="g_akc" name="tovs[0][g_akc]" autocomplete="off"></td>
                        </tr>
                    @endforelse

				</tbody>
				<tfoot>
					<tr>
						<td>
							<a id = "shfCorAddRow"><i class="fa-solid fa-plus"></i>Добавить строку</a>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
