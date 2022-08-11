<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	
	<style type="text/css">
	/*font-family: */	
	/*font-family: arial;*/
	/*"DejaVu Sans", sans-serif*/
	* {font-family: "DejaVu Sans", sans-serif;font-size: 12px;/*line-height: 14px;*/}
	table {margin: 0 0 15px 0;width: 100%;border-collapse: collapse;border-spacing: 0; border:1px;}		
	table th {padding: 5px;font-weight: bold;}        
	table td {padding: 5px;}	
	.header {margin: 0 0 0 0;padding: 0 0 15px 0;font-size: 12px;line-height: 12px;text-align: center;}
	h1 {margin: 0 0 10px 0;padding: 10px 0;border-bottom: 2px solid #000;font-weight: bold;font-size: 20px;}
		
	/* Реквизиты банка */
	.details td {padding: 3px 2px;border: 1px solid #000000;font-size: 12px;line-height: 12px;vertical-align: top;}
 
	/* Поставщик/Покупатель */
	.contract th {padding: 3px 0;vertical-align: top;text-align: left;font-size: 13px;line-height: 15px;}	
	.contract td {padding: 3px 0;}		
 
	/* Наименование товара, работ, услуг */
	.list thead, .list tbody  {border: 2px solid #000;}
	.list thead th {padding: 4px 0;border: 1px solid #000;vertical-align: middle;text-align: center;}	
	.list tbody td {padding: 0 2px;border: 1px solid #000;vertical-align: middle;font-size: 11px;line-height: 13px;}	
	.list tfoot th {padding: 3px 2px;border: none;text-align: right;}	
 
	/* Сумма */
	.total {margin: 0 0 20px 0;padding: 0 0 10px 0;border-bottom: 2px solid #000;}	
	.total p {margin: 0;padding: 0;}
		
	/* Руководитель, бухгалтер */
	.sign {position: relative;}
	.sign table {width: 60%;}
	.sign th {padding: 40px 0 0 0;text-align: left;}
	.sign td {padding: 40px 0 0 0;border-bottom: 1px solid #000;text-align: right;font-size: 12px;}
	.sign-1 {position: absolute;left: 149px;top: -44px;}	
	.sign-2 {position: absolute;left: 149px;top: 0;}	
	.printing {position: absolute;left: 271px;top: -15px;}
	.companyname{
		text-decoration: underline;
		padding-bottom: 5px;
	}
	</style>
</head>
<body>
	<p class="header">
		{!! $dopinfo !!}
	</p>
	<h1>{{ $sch_name }}</h1>
 	<h2>Адрес: адрес орг, тел: тел орг, факс: факсорг</h2>
 	<p style = "text-align:center;"><strong>Образец заполнения платёжного документа</strong></p>
	<table class="docinfoetails" style = "border:1px solid #000;">
		<tbody>
			<tr>
				<td colspan="2" style="border-bottom: none;">ЗАО "БАНК", г.Москва</td>
				<td style = "border:1px solid #000;">БИК</td>
				<td style="border-bottom: none;">000000000</td>
			</tr>
			<tr>
				<td colspan="2" style="border:1px solid #000;border-top: none; font-size: 10px;">Банк получателя</td>
				<td style = "border:1px solid #000;">Сч. №</td>
				<td style="border-top: none;">00000000000000000000</td>
			</tr>
			<tr>
				<td width="25%" style = "border:1px solid #000;">ИНН 0000000000</td>
				<td width="30%" style = "border:1px solid #000;">КПП 000000000</td>
				<td width="10%" style = "border:1px solid #000;"rowspan="3">Сч. №</td>
				<td width="35%" style = "border:1px solid #000;" rowspan="3">00000000000000000000</td>
			</tr>
			<tr>
				<td colspan="2" style="border-bottom: none;">ООО "Компания"</td>
			</tr>
			<tr>
				<td colspan="2" style="border-top: none; font-size: 10px;">Получатель</td>
			</tr>
			<tr></tr>
			<tr>
				<td colspan = "4" style = "border-top: 1px solid #000;border-bottom:none;">Назначение платежа:</td>
				
			</tr>
			<tr>
				<td colspan="4" style = "border-top:none;">{{$sch_nazn}}</td>
			</tr>
		</tbody>
	</table>
 
	<h1 style = "text-align:center;">Счет на оплату № {{$sch_number}} от {{$sch_date}}</h1>
 
	<table class="contract">
		<tbody>
			<tr>
				<td width="15%">Плательщик:</td>
				<th width="85%">{{$sch_pokname}}, ИНН {{$sch_pokinn}}, КПП {{$sch_pokkpp}}, {{$sch_pokadress}}</th>
			</tr>
			<tr>
				<td>Грузополучатель:</td>
				<th>{{$sch_gruzpolname}}, ИНН {{$sch_gruzpolinn}}, КПП {{$sch_gruzpolkpp}}, {{$sch_gruzpoladress}}
				</th>
			</tr>
		</tbody>
	</table>
 
	<table class="list">
		<thead>
			<tr>
				<th width="5%">№</th>
				<th width="54%">Наименование товара, работ, услуг</th>
				<th width="8%">Кол-во</th>
				<th width="5%">Ед.изм.</th>
				<th width="14%">Цена</th>
				<th width="14%">Сумма</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($table as $t)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $t['gruzName'] }}</td>
					<td>{{ $t['edIzm'] }}</td>
					<td>{{ $t['gruzCount'] }}</td>
					<td>{{ $t['gruzPrice'] }}</td>
					<td>{{ $t['gruzCount']*$t['gruzPrice']}}
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<th colspan="5">Итого: </th>
				<th>{{$gruzSum}}</th>
			</tr>
			@if ($nds_calc == 'up')
			<tr>
				<th colspan="5">Итого НДС ({{ $nds_perc}}%):</th>
				<th>{{$nds}}</th>
			</tr>
			@elseif($nds_calc == 'summ')
			<tr>
				<th colspan="5">В том числе НДС ({{ $nds_perc}}%):</th>
				<th>{{$nds_sum}}</th>
			</tr>
			@else
				<br>
			@endif
			<tr>
				<th colspan="5">Всего к оплате:</th>
				<th>Всего</th>
			</tr>
		</tfoot>
	</table>
	
	<div class="total">
		<p>Всего наименований кол-во, на сумму итог-числом руб.</p>
		<p><strong>итог-текстов</strong></p>
	</div>
	
	<div class="sign">
		<table>
			<tbody>
				<tr>
					<th width="30%">Руководитель</th>
					<td width="70%">{{$sch_ruk}}.</td>
				</tr>
				<tr>
					<th>Бухгалтер</th>
					<td>Сидоров {{$sch_buh}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>