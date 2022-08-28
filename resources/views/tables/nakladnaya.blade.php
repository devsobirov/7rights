<div class = "row">
    @php
        $table = get_if_key_exists($data, 'table');
        $table = is_array($table) ? $table : [];
        $nextRow = count_if_array($table) + 1;
        $gruzTotalSum = 0;
    @endphp

    <div class = "col">
        <h4>Товары/Груз</h4>
        <style>
            /*.table-responsive .table th,*/
            .table-responsive .table td input {
                width: auto;
                max-width: 4rem;
            }
            .table-responsive .table td.td-head input {
                max-width: 7rem;
            }
            .table-responsive .table td.td-md input {
                max-width: 5rem;
            }
            .table-responsive .table td input:focus {
                max-width: auto;
            }
        </style>
        <div  class = "table-responsive">
            <table class = "table table-striped table-bordered table-hover table-sm">
                <thead>
                <tr>
                    <th scope = "col">#</th>
                    <th scope = "col">Наименование</th>
                    <th scope = "col">Ед.Изм</th>
                    <th scope = "col">вид.упак.</th>
                    <th scope = "col">в одном месте</th>
                    <th scope = "col">мест, штук</th>
                    <th scope = "col">Масса Брутто</th>
                    <th scope = "col">Масса Нетто</th>
                    <th scope = "col">Кол-во</th>
                    <th scope = "col">Цена</th>
                    <th scope = "col">Сумма</th>
                    <th scope = "col"></th>
                </tr>
                </thead>
                <tbody id = "gruzList">
                @forelse($table as $row)
                    @php
                        $gruzSum = round(intval(get_if_key_exists($row, 'gruzCount')) * floatval(get_if_key_exists($row, 'gruzPrice')), 2);
                         $gruzTotalSum += $gruzSum;
                    @endphp
                    <tr>
                        <td class = "gruzRowCnt">{{ $loop->iteration }}</td>
                        <td class="td-head"><input type = "text" name = "table[{{ $loop->iteration }}][gruzName]" value="{{get_if_key_exists($row, 'gruzName')}}"  class = "gruzName"></td>
                        <td class="td-md"><input list="edIzm" placeholder="шт" name="table[{{ $loop->iteration }}][edIzm]" value="{{get_if_key_exists($row, 'edIzm')}}"></td>
                        <td><input type="text" name="table[{{$loop->iteration}}][package_type]" value="{{get_if_key_exists($row, 'package_type')}}"></td>
                        <td><input type="text" name="table[{{$loop->iteration}}][package_v_odnom_m]" value="{{get_if_key_exists($row, 'package_v_odnom_m')}}"></td>
                        <td><input type="text" name="table[{{$loop->iteration}}][package_m_sht]" value="{{get_if_key_exists($row, 'package_m_sht')}}"></td>
                        <td><input type="text" name="table[{{$loop->iteration}}][brutto]" value="{{get_if_key_exists($row, 'brutto')}}"></td>
{{--                        <td><input type="text" name="table[{{$loop->iteration}}][netto]" value="{{get_if_key_exists($row, 'netto')}}"></td>--}}
                        <td><input type = "number" name = "table[{{ $loop->iteration }}][gruzCount]" value="{{get_if_key_exists($row, 'gruzCount')}}" data-calc = "true"  class = "gruzCount"></td>
                        <td class="td-md"><input type = "number" name = "table[{{ $loop->iteration }}][gruzPrice]" value="{{get_if_key_exists($row, 'gruzPrice')}}" data-calc = "true" class = "gruzPrice"></td>
                        <td class = "gruzSumm">{{$gruzSum}}</td>
                        <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @empty

                    <tr>
                        <td class = "gruzRowCnt">{{ $nextRow }}</td>
                        <td class="td-head"><input type = "text" name = "table[{{ $nextRow }}][gruzName]" class = "gruzName[{{$nextRow}}]"></td>
                        <td class="td-md"><input list="edIzm" placeholder="шт" name="table[{{ $nextRow }}][edIzm]"></td>
                        <td><input type="text" name="table[{{$nextRow}}][package_type]"></td>
                        <td><input type="text" name="table[{{$nextRow}}][package_v_odnom_m]"></td>
                        <td><input type="text" name="table[{{$nextRow}}][package_m_sht]"></td>
                        <td><input type="text" name="table[{{$nextRow}}][brutto]"></td>
{{--                        <td><input type="text" name="table[{{$nextRow}}][netto]"></td>--}}
                        <td><input type = "number" name = "table[{{ $nextRow }}][gruzCount]" data-calc = "true" class = "gruzCount"></td>
                        <td class="td-md"><input type = "number" name = "table[{{ $nextRow }}][gruzPrice]"  data-calc = "true" class = "gruzPrice"></td>
                        <td class = "gruzSumm"></td>
                        <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                @endforelse
                <tr id = "toAppend" style = "display:none;">
                    <td class = "gruzRowCnt"></td>
                    <td class="td-head"><input type = "text" name = "gruzName"  class = "gruzName"></td>
                    <td class="td-md"><input list="edIzm" name = "edIzm" class = "edIzm"></td>
                    <td><input type="text" name="package_type"></td>
                    <td><input type="text" name="package_v_odnom_m"></td>
                    <td><input type="text" name="package_m_sht"></td>
                    <td><input type="text" name="brutto"></td>
{{--                    <td><input type="text" name="netto"></td>--}}
                    <td><input type = "number" name = "gruzCount" data-calc = "true"  class = "gruzCount"></td>
                    <td class="td-md"><input type = "number" name = "gruzPrice" data-calc = "true" class = "gruzPrice"></td>
                    <td class = "gruzSumm"></td>
                    <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan = "8"><a id = "addTableRow"><i class="fa-solid fa-plus"></i>Добавить груз</a></td>
                    <td><strong>Итого:</strong></td>
                    <td colspan = "3" class = "priceRes">{{$gruzTotalSum ? $gruzTotalSum. ' руб.' : ''}}</td>
                </tfoot>
            </table>
            <datalist id="edIzm">
                @foreach(\App\Helpers\DocumentHelper::OKEI_TYPES as $unit => $code)
                    <option value="{{ $unit }}">
                @endforeach
            </datalist>
        </div>

    </div>
</div>
