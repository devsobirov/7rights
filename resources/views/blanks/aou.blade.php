<html>
<head>
<title>Акт об оказании услуг</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
* {font-family: "DejaVu Sans", sans-serif;/*font-size: 12px;/*line-height: 14px;*/}
	.podch{

	}
	strong{

	}
</style>
</head>
<h1 style = "text-decoration: underline; padding-bottom: 15px;">Акт № {{$sch_number}} от {{ $sch_date}}</h1>

<p>Исполнитель: <strong> {{ $sch_name }}, ИНН/КПП: {{ $sch_inn }}/{{ $sch_kpp}}, {{ $sch_adress }} </strong></p>
<p>Заказчик: <strong> {{ $sch_pol_name }}, ИНН.КПП {{ $sch_pol_inn }}/{{ $sch_pol_kpp }}, {{ $sch_pol_adress }}</strong> </p>

<table style = "width: 100%; padding-top: 10px;  border-spacing: 0px; border-collapse: collapse;">
	<thead>
		<tr>
			<th style = "width: 10%; text-align: center; border: 1px solid #000;">№</th>
			<th style = "width:40%; text-align:center; border: 1px solid #000;">Наименование товара</th>
			<th style = "width: 10%; text-align:right; border: 1px solid #000;">Ед.Изм</th>
			<th style = "width:10%; text-align: right; border: 1px solid #000;">Кол-во</th>
			<th style = "width:15%; text-align: center; border: 1px solid #000;">Цена</th>
			<th style = "width: 15%; text-align:center; border: 1px solid #000;">Сумма</th>
		</tr>
	</thead>
	@php 
	$sum = 0;
	@endphp
	<tbody>
		@foreach ($table as $t)
		<tr>
			<td style = "border: 1px solid #000; text-align: center;">{{ $loop->iteration }}</td>
			<td style = "border: 1px solid #000;">{{ $t['gruzName'] }}</td>
			<td style = "border: 1px solid #000; text-align: center;">{{ $t['edIzm'] }}</td>
			<td style = "border: 1px solid #000; text-align: center;">{{ $t['gruzCount'] }}</td>
			<td style = "border: 1px solid #000; text-align: right;">{{ $t['gruzPrice'] }}</td>
			<td style = "border: 1px solid #000; text-align: right">{{ $t['gruzCount'] * $t['gruzPrice'] }}</td>
		</tr>
		@php
		$sum = $sum + $t['gruzCount'] * $t['gruzPrice'];
		@endphp
		@endforeach
	</tbody>


	<tfoot>
			<tr>
				<th colspan="5" style = "text-align: right;">Итого: </th>
				<th style = "text-align: right;">{{ $sum }}</th>
			</tr>
			@if ($nds_calc == 'up')
			<tr>
				<th colspan="5" style = "text-align: right;">Итого НДС ({{  $nds_perc}}%):</th>
				<th style = "text-align: right;">{{$sum / 100 * $nds_perc}}</th>
				@php
				$sum = $sum+$nds;
				@endphp
			</tr>
			@endif
			@if($nds_calc == 'summ')
			<tr>
				<th colspan="5" style = "text-align: right;">В том числе НДС ({{ $nds_perc}}%):</th>
				<th style = "text-align: right;">{{ $sum / 100 * $nds_perc }}</th>
			</tr>
			@endif
			<tr>
				<th colspan="5" style = "text-align: right;">Всего к оплате:</th>
				<th style = "text-align: right;">{{ $sum }}</th>
			</tr>
	</tfoot>

	</table>

	<table  style = "width: 100%; padding-top: 25px; empty-cells: show;">
		<tr>
			<td colspan = "2" style= "width: 40%;"><strong>Исполнитель:</strong></td>
			<td style = "width: 20%;"></td>
			<td colspan = "2" style = "width:40%;"><strong>Заказчик:</strong></td>
		</tr>
		<tr>
			<td colspan = "2" style = "border-bottom: 1px solid #000; text-align: center;"> {{ $sch_dolg }}</td>
			<td></td>
			<td colspan = "2" style = "border-bottom: 1px solid #000; text-align: center;"> {{ $sch_pol_dolg }}</td>
		</tr>
		<tr>
			<td colspan = "2" style = "text-align: center; font-size: 10px;"><small>Должность</small></td>
			<td></td>
			<td  colspan = "2" style = "text-align: center; font-size: 10px;"><small>Должность</small></td>
		</tr>
		<tr>
			<td style = "border-bottom: 1px solid #000; min-height: 15px; height:15px;"></td>
			<td style = "border-bottom: 1px solid #000; text-align: center;">{{ $sch_put }}</td>
			<td></td>
			<td style = "border-bottom: 1px solid #000;"></td>
			<td style = "border-bottom: 1px solid #000; text-align: center">{{ $sch_pol_get }}</td>
		</tr>
		<tr>
			<td style = "text-align:center; font-size: 10px;">Подпись</td>
			<td style = "text-align:center; font-size: 10px;">Расшифровка подписи</td>
			<td></td>
			<td  style = "text-align:center; font-size: 10px;">Подпись</td>
			<td style = "text-align:center; font-size: 10px;">Расшифровка подписи</td>
		</tr>
		<tr>
			<td colspan = "2" style = "text-align: center;">М.П</td>
			<td></td>
			<td colspan = "2" style = "text-align: center;">М.П</td>
		</tr>
	</table>	