<html>
<head>
<title>Доверенность (ТМЦ)</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style>
	/*
	body{
		width: 50%;
		max-width: 50%;
	}*/
	* {font-family: "DejaVu Sans", sans-serif;font-size: 12px;/*line-height: 14px;*/}
	table{
		width: 100%;
		border-spacing: 0px; border-collapse: collapse;
		empty-cells: show;
	}
</style>
</head>
<table border = "1">
	<tr style = "text-align: center;">
		<td style = "width: 15%;"> Номер доверенности </td>
		<td style = "width: 15%;"> Дата выдачи </td>
		<td style = "width: 15%;"> Срок действия</td>
		<td style = "width: 35%;"> Должность и фамилия лица, которому выдана доверенность  </td>
		<td style = "width: 20%;"> Расписка в получении доверенности </td>
	</tr>
	<tr style = "text-align: center">
		<td>1</td>
		<td>2</td>
		<td>3</td>
		<td>4</td>
		<td>5</td>
	</tr>
	<tr style = "text-align: center;">
		<td>{{ $sch_number }}</td>
		<td>{{ $sch_date }} </td>
		<td>{{ $sch_expired }}</td>
		<td>{{ $sch_dolg }}</td>
		<td></td>
	</tr> 
</table>
<table border = "1">
	<tr style = "text-align: center;">
		<td>Поставщик</td>
		<td>Номер и лата наряда (заменяющего наряд документа) или извещения</td>
		<td>Номер, дата документа, подтверждающего выполнение поручения</td>
	</tr>
	<tr style = "text-align: center;">
		<td>6</td>
		<td>7</td>
		<td>8</td>
	</tr>
	<tr>
		<td style = "width: 35%;">Получение от:</td>
		<td style = "width: 35%;">По документу:</td>
		<td></td>
	</tr>
	<tr>
		<td colspan = "3" style = "height: 15px;"></td>
	</tr>
	<tr>
		<td colspan = "3" style = "text-align: center; font-size: 10px;">Линия отреза</td>
	</tr>
</table>
<div style = "text-align: right; font-size: 12px; padding-top: 15px; padding-bottom: 15px;">
Типовая межотраслевая форма № M-2<br>
Утверждена постановлением Госкомстата России от 30.10.97 № 71a
</div>
<table style  = "border:none;">
	<tr>
		<td style = "width: 80%; min-width: 80%;"></td>
		<td style = "border: 1px solid #000; text-align: center;">Коды</td>
	</tr>
	<tr>
		<td style = "width: 80%; min-width: 80%; text-align:right;padding-right: 10px;">Форма по ОКУД </td>
		<td style = "border: 3px solid #000; text-align:center;">0315001 </td>
	</tr>
	<tr>
		<td style = "width: 80%; min-width: 80%; text-align: right;padding-right: 10px;">по ОКПО</td>
		<td style = "border: 3px solid #000;"></td>
	</tr>
</table>
<p>Организация: <span style = "text-decoration: underline;;">{{ $sch_orgname }}, {{ $sch_inn }} / {{ $sch_kpp }}, {{ $sch_adress }} </span></p>
<h3 style = "text-align: center;">Доверенность № {{ $sch_number }}</h3>
<p>Дата выдачи: {{ $sch_date }}	</p>
<p>Доверенность действительна дo : {{ $sch_expired }}</p>
<table>
	<tr>
		<td style = "border-bottom: 1px solid #000;">{{ $sch_orgname }}, {{ $sch_inn }} / {{ $sch_kpp }}, {{ $sch_adress }} </td>
	</tr>
	<tr>
		<td style = "text-align:center; font-size: 10px;">наименование потребителя и его адрес</td>
	</tr>
	<tr>
		<td style = "border-bottom: 1px solid #000;">{{ $sch_orgname }}, {{ $sch_inn}} / {{ $sch_kpp }}, {{ $sch_adress }} </td>
	</tr>
	<tr>
		<td style = "text-align:center; font-size: 10px;">наименование плательщика и его адрес</td>
	</tr>
	<tr>
		<td>Счет № {{ $sch_bankrasch }} в {{ $sch_bankname }} , БИК {{ $sch_bik }}, корр сч. {{ $sch_bankkorr }}</td>
	</tr>
</table>
<h3 style = "text-align: center;">ПЕРЕЧЕНЬ ТОВАРНО-МАТЕРИАЛЬНЫХ ЦЕННОСТЕЙ, ПОДЛЕЖАЩИХ ПОЛУЧЕНИЮ</h3>

<table border = "1">
	<tr style = "text-align: center;">
		<td style = "width: 10%;">№ П/П</td>
		<td style = "width: 50%;"> Наименование </td>
		<td style = "width: 10%;">Ед. Изм</td>
		<td style = "width: 30%;">Количество (прописью)</td>
	</tr>
	@foreach($table as $t)
	<tr>
		<td>{{ $loop->iteration }}</td>
		<td>{{ $t['gruzName'] }}</td>
		<td>{{ $t['edIzm'] }}</td>
		<td>{{ $t['gruzCol'] }}</td>
	</tr>
	@endforeach
</table>
<p style = "padding-top: 15px;">Подпись лица, получившего доверенность _________________________ удостоверяем</p>
<p style = "padding-top: 15px;">Руководитель предприятия ________________________ ({{ $sch_ruk }})</p>
<p style = "padding-left: 150px; padding-top: 15px;">М.П.</p>
<p style = "padding-top: 15px;">Главный бухгалтер: ______________________________ ({{ $sch_buh }})</p>