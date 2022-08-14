<div class = "row">
			<div class = "col px-3">
				<h4>Дополнительная информация</h4>
				<div class = "row">
					<div class = "col-sm-4 text-center">
						<p>Условия (информация)</p>
					</div>
					<div class = "col-sm-8">
                        @php $dopInfo = get_if_key_exists($data, 'dopinfo') @endphp
						<textarea id = "docs-comment" name = "dopinfo" rows = "5">
                            @if($dopInfo)
                                {!! $dopInfo !!}
                            @else
							<p style = "text-align:center;">Внимание! Оплата данного счета-оферты (ст.432 ГК РФ) свидетельствует о заключении сделки купли-продажи в письменной</p>
							<p style = "text-align:center;">форме (п.3 ст.434 и п.3 ст.438 ГК РФ).</p>
							<p style = "text-align:center;">Счет действителен в течение трех банковских дней.</p>
							<p style = "text-align:center;">Уведомление об оплате обязательно, в противном случае не гарантируется наличие товара на складе. Товар отпускается по</p>
							<p style = "text-align:center;">факту прихода денег на р/с Поставщика, самовывозом, при наличии доверенности и паспорта.</p>
                            @endif

						</textarea>
					</div>
				</div>
			</div>
		</div>
