<html>
<head>
<title>Счёт-фактура</title>
<style>
	table{
		border-spacing: 0px; border-collapse: collapse;
		empty-cells: show;
	}
	body{
		font-size:12px;
	}
</style>
</head>
<body>
<table>
	<tr>
		@if ($corrects == 'yes')
			@php
				$corr_date = $sch_corrects_date;
				$corr_num = $sch_corrects_nuber;
			@endphp
		@else
			@php
				$corr_date = '--';
				$corr_num =  '--';
			@endphp
		@endif
		<td style = "width:80%;">
			<h3>СЧЕТ-ФАКТУРА № {{ $sch_number }} ОТ {{ $sch_date }}<br>
			ИСПРАВЛЕНИЕ № {{ $corr_num }} ОТ {{ $corr_date }}</h3>
		</td>
		<td style = " width: 20%; text-align: right; font-size: 12px;">
			ПРИЛОЖЕНИЕ № 1 к постановлению Правительства
			Российской Федерации от 26 декабря 2011 г. № 1137
			(в ред. Постановления Правительства РФ от 02.04.2021 № 534)
		</td>
	</tr>
	<tr>
		<td colspan = "2">Продавец: {{ ($sch_orgtype == 'org') ? $org_naim : $ip_fio }}</td>
	</tr>
	<tr>
		<td colspan = "2">Адрес: {{ ($sch_orgtype == 'org') ? $org_adress : $ip_adress }}</td>
	<tr>
		<td colspan = "2">ИНН/КПП продава: {{ ($sch_orgtype == 'org') ? $org_inn.'/'.$org_kpp : $ip_inn.'/'.$ip_kpp }}</td>
	</tr>
	<tr>
		<td colspan = "2">Грузоотправитель и его адрес:  
			@if ($gruzotp_who == 'he')
				Он же 
			@elseif ($gruzotp_who == 'some')
				{{$gruzotp_some_name}}, {{$gruzotp_some_adress}}
			@else

			@endif
		</td>
	</tr>
	<tr>
		<td colspan = "2">Грузополучатель и его адрес: 
			@if ($gruzpol_who == 'he')
				Он же 
			@elseif ($gruzpol_who == 'some')
				{{$gruzpol_some_name}}, {{$gruzpol_some_adress}}
			@else

			@endif
		</td>
	</tr>
	<tr>
		<td colspan = "2">К платёжно-расчетному документу: 
		@foreach ($plat as $t)
			№ {{$t['number']}} от {{$t['date']}}
		@endforeach
		</td>
	</tr>
	<tr>
		<td colspan = "2">Документ об отгрузке  № <u>{{ $otp_no }}</u> от <u>{{ $otp_numdat }}  </u></td>
	</tr>
	<tr>
		<td colspan = "2">Покупатель: {{ $pok_name }}</td>
	</tr>
	<tr>
		<td colspan = "2">Адрес: {{ $pok_adress }}</td>
	</tr>
	<tr>
		<td colspan = "2">
			@if (isset($pok_kpp))
				ИНН/КПП покупателя: {{$pok_inn}} / {{ $pok_kpp }}
			@else
				ИНН: {{ $pok_inn }}
			@endif
		</td>
	</tr>
	<tr>
		<td colspan = "2">Валюта: наименование: код: 
			@if ($wallet == 'rub')
				Российский рубль, 643
			@elseif ($wallet == 'usd')
				Доллар США, 840
			@elseif ($wallet == 'eur')
				Евро, 978
			@else
				{{ $sch_some_wallet_name }}, {{ sch_some_wallet_code }}
			@endif
		</td>
	</tr>
	<tr>
		<td colspan = "2">Идентификатор государственного контракта, договора (соглашения) (при наличии): {{ isset($gos_idn) ? $gos_idn : '--' }} </td>
	</tr>
</table>
<table border = "1" style = "font-size:15px;">
	<thead>
		<tr>
			<td rowspan = "2" style = "text-align: center;">№ п/п</td>
			<td rowspan = "2" style = "text-align: center;">Наименование товара (описание выполненных работ, оказанных услуг), имущественного права</td>
			<td rowspan = "2" style = "text-align: center;">Код вида товара</td>
			<td colspan = "2" style = "text-align: center;">Единица измерения</td>
			<td rowspan = "2" style = "text-align: center;">Количество (объем)</td>
			<td rowspan="2" style = "text-align: center;">Цена (тариф) за единицу измерения</td>
			<td rowspan="2" style = "text-align: center;">Стоимость товаров (работ, услуг) имущественных прав без налога-всего</td>
			<td rowspan="2" style = "text-align: center;">В том числе сумма акциза</td>
			<td rowspan="2" style = "text-align: center;">Налоговая ставка</td>
			<td rowspan="2" style = "text-align: center;">Сумма налога, предъявляемая покупателю</td>
			<td rowspan="2" style = "text-align: center;">Стоимость товара (работ, услуг), имущественных прав с налогом - всего</td>
			<td colspan = "2" style = "text-align: center;">Страна-происхождение товара</td>
			<td rowspan="2" style = "text-align: center;">Регистрационный номер декларации на товары или регистрационный номер партии товара, подлежащего прослеживаемости</td>
		</tr>
		<tr style = "text-align: center;">
			<td style = "text-align: center;">Код</td>
			<td style = "text-align: center;"> Условное обозначение (национальное)</td>
			<td style = "text-align: center;">Цифровой код</td>
			<td style = "text-align: center;">Краткое наименование</td>
		</tr>
		<tr>
			<td>1</td>
			<td>1a</td>
			<td>1б</td>
			<td>2</td>
			<td>2а</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
			<td>6</td>
			<td>7</td>
			<td>8</td>
			<td>9</td>
			<td>10</td>
			<td>10a</td>
			<td>11</td>
		</tr>
	</thead>
	<tbody style = "border:none;">
		@php
		$itogSum = 0;


		@endphp
		
		@foreach ($tovs as $t)
		
		<tr>
			<td>{{ $loop->iteration-1 }}</td>
			<td>{{ $t['Naim'] }}</td>
			<td>{{ $t['TovCode'] }}</td>
			<td>{{ $t['IzmCode'] }}</td>
			<td>{{ $t['IzmObozn'] }}</td>
			<td>{{ $t['Cnt'] }} </td>
			<td>{{ $t['Price'] }}</td>
			<td>{{ $t['Cnt'] * $t['Price'] }}</td>
			@php
				$itogSum = $itogSum + $t['Cnt'] * $t['Price'];
			@endphp
			<td>{{ $t['Akc'] }}</td>
			<td>
				@if ($nds == 'none' || $nds == '0')
					Без НДС
				@else
					{{ $nds }}%
				@endif
			</td>
			<td></td>
			<td>{{ $t['CountryCode'] }}</td>
			<td>{{ $t['CountryShortName'] }}</td>
			<td> {{ $t['GTC'] }}</td>
		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr style = "border:none;">
			<td colspan = "7">Всего к оплате</td>
			<td style = "border: 1px solid #000; text-align: right;">{{ $itogSum }}</td>
			<td colspan="2" style = "border: 1px solid #000; text-align:center"></td>
			<td style = "border: 1px solid #000; text-align: right;"></td>
			<td style = "border: 1px solid #000; text-align: right;">123</td>
			<td colspan = "3" style = "border:none;"></td>
		</tr>
	</tfoot>
</table>
<br>
<table style = "width: 100%; empty-cells: show; border-spacing: 5px; border-collapse: separate;">
	<tr>
		<td style = "width: 20%;">Руководитель организации или иное уполномоченное лицо</td>
		<td style = "width: 10%; border-bottom: 1p solid #000;"></td>
		<td style = "width: 15%; border-bottom: 1p solid #000;"></td>
		<td style = "width: 20%;">Главный бухгалтер или иное уполномоченное лицо</td>
		<td style = "width: 10%; border-bottom: 1p solid #000;"></td>
		<td style = "width: 15%; border-bottom: 1p solid #000;"></td>
	</tr>
	<tr style = "/*font-size: 12px;*/ text-align: center;">
		<td></td>
		<td style = "font-size: 12px; text-align: center;"><sup>(подпись)</sup></td>)
		<td style = "font-size: 12px; text-align: center;"><sup>(ф.и.о)</sup></td>
		<td></td>
		<td style = "font-size: 12px; text-align: center;"><sup>(подпись</sup></td>)
		<td style = "font-size: 12px; text-align: center;"><sup>(ф.и.о)</sup></td>
	</tr>
	
	<tr>
		<td style = "width: 20%;">Индивидуальный предприниматель или иное уполномоченное лицо</td>
		<td style = "width: 10%; border-bottom: 1p solid #000;"></td>
		<td style = "width: 15%; border-bottom: 1p solid #000;"></td>
		<td style = "width: 20%; border-bottom: 1p solid #000;" colspan = "3"></td>
	</tr>
	<tr>
		<td style = "width: 20%; text-align: center;"></td>
		<td style = "width: 10%; text-align: center;"><sup>(подпись)</sup></td>
		<td style = "width: 15%; text-align: center;"><sup>(фио)</sup></td>
		<td style = "width: 20%; text-align: center;" colspan = "3"><sup>(реквизиты свидетельства о государственной регистрации индивидуального предпринимателя)</sup></td>
	</tr>
</table>


</body>
</html>