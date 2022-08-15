<div class = "row">
    @php
        $plat = get_if_key_exists($data, 'plat');
        $plat = is_array($plat) ? $plat : [];
        $nextRow = count_if_array($plat) + 1;
    @endphp
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
                    @forelse($plat as $row)
                        <tr>
                            <td class = "tblRowCount">{{$loop->iteration}}</td>
                            <td><input type = "text" name = "plat[{{$loop->iteration}}][number]" value="{{ get_if_key_exists($row, 'number') }}" data-id="number"></td>
                            <td><input type = "text" name  = "plat[{{$loop->iteration}}][date]" value="{{ get_if_key_exists($row, 'date') }}" data-id = "date" class = "dateForm"></td>
                            <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                    @empty
                    <tr>
                        <td class = "tblRowCount">1</td>
                        <td><input type = "text" name = "plat[1][number]" data-id="number"></td>
                        <td><input type = "text" name  = "plat[1][date]" data-id = "date" class = "dateForm"></td>
                        <td><a class = "delRow"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                    @endforelse
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
