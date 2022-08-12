	/**** TINYMCE *******/
$(document).ready(function(){
	tinymce.init({
        selector: 'textarea#docs-comment',
        height: 200,
        menubar:false
    });

	$('body').on('focus',".dateForm", function(){
        $(this).datepicker({
			dateFormat: 'dd.mm.yy',
			setDate: new Date
		});
    });
/*
	$('table').each(function(index){
		$(this).attr('data-tag',index);
	});

*/

	/* для корректировочно сч-ф */
	iter = 0;
	$('#shfCorAddRow').on('click',function(){

		t = $(this).parents('table');
		t.find('.clone1').clone().removeAttr('class').attr('class','lastIns').appendTo(t.find('.corrBody')).show();
		t.find('.clone2').clone().removeAttr('class').attr('class','lastIns').appendTo(t.find('.corrBody')).show();
		t.find('.clone3').clone().removeAttr('class').attr('class','lastIns').appendTo(t.find('.corrBody')).show();
		t.find('.clone4').clone().removeAttr('class').attr('class','lastIns').appendTo(t.find('.corrBody')).show();

		$('textarea').each(function(index){
			if ($(this).parents('tr').attr('class') !== 'clone1' || $(this).parent().attr('class') !== 'clone2' || $(this).parent().attr('class') !== 'clone3' || $(this).parent().attr('class') !== 'clone4'){
				p = $(this).parents('tr');
				p.find('.rowCount').html(index);
				ind = index-1;
				tag = $(this).parents('table').attr('id')+'['+ind+']';
				$(this).attr('name', tag+'['+$(this).attr('data-id')+']');
				iter = index;

				$(this).find('.lastIns input').each(function(index){
					console.log('input');
					console.log('Iteration: '+iter);
					ins = $(this).find('input');
					ins.attr('name', tag+'['+$(ins).attr('data-id')+']');
					$(this).removeAttr('class');
				});


			}
		});
		$('.lastIns').find('input').each(function(){
			console.log('123');
			$(this).attr('name', tag+'['+$(this).attr('data-id')+']')
		});
		$('.lastIns').removeAttr('class');
	});


	var tblCnt = 0;
	var schfcnt = 0;
	var insCnt = 2;
	/* Final. TODO: поправить ВСЕ таблицы под это */

	$('.tableAddRows').on('click',function(){
		schfvnt = schfcnt++;
		rowCont = 0;
		t = $(this).parents('table');
		tag = t.attr('id');
		t.find('.clone').clone().removeAttr('class').appendTo(t.find('.tableBody')).show();

		t.find('.tblRowCount').each(function(index){

			if ($(this).parent().attr('class') !== 'clone'){
				$(this).text(index);
				$(this).parent().find('input').each(function(){

					$(this).attr('name',tag+'['+index+']['+$(this).attr('data-id')+']');

				});
			}
		})

		$('.tblRowCount').each(function(){

			if ($(this).text() === '' && $(this).parent().attr('id') !== 'toInsert'){
				$(this).text(insCnt);
				insCnt++;
				par = $(this).parent();
				inputs = par.find('input');

				inputs.each(function(cnt){
					thisclass = $(this).attr('id');
					$(this).attr('name','tbl['+insCnt+']['+thisclass+']');
				});
			}
		});

	});
	/* Переделать таблицу и убрать! */
	$('#schfaddTableRow').on('click',function(){
		schfvnt = schfcnt++;
		rowCont = 0;
		$('#toInsert').clone().removeAttr("id").appendTo(($('#toInsert')).parent()).show();

		$('.tblRowCount').each(function(){

			if ($(this).text() === '' && $(this).parent().attr('id') !== 'toInsert'){
				$(this).text(insCnt);
				insCnt++;
				par = $(this).parent();
				inputs = par.find('input');

				inputs.each(function(cnt){
					thisclass = $(this).attr('id');
					$(this).attr('name','tbl['+insCnt+']['+thisclass+']');
				});
			}
		});
	});

	/* Переделать таблицу и убрать! */
	$('#addTableRow').on('click',function(tblCnt){
		tblCnt = tblCnt++;
		$("#toAppend").clone().removeAttr("id").appendTo($("#toAppend").parent()).show();
		cnt = 2;
		$('.gruzRowCnt').each(function(cnt){

				if ($(this).text() === '' && $(this).parent().attr('id') !== 'toAppend'){
					$(this).text(cnt);// = cnt;
					par = $(this).parent();
					par.find('.gruzName').attr('name','table['+cnt+'][gruzName]');
					par.find('.edIzm').attr('name','table['+cnt+'][edIzm]');
					par.find('.gruzCount').attr('name','table['+cnt+'][gruzCount]');
					par.find('.gruzPrice').attr('name','table['+cnt+'][gruzPrice]');
					cnt++;
				}
		});
	});

	/* Переделать таблицу и убрать! */
	 $(document).on('click touchstart', '.delRow', function(){
            $(this).parent().parent().remove();
        	calcAll();
        });
	 function calc(el){
	 	par = el.parent().parent();
	 	col = par.find('.gruzCount').val();
	 	price = par.find('.gruzPrice').val();
	 	summ = col*price;
	 	sum = par.find('.gruzSumm');
	 	sum.html(summ);
	 	calcAll();
	 }

	 function calcAll(){
		priceRes = 0;
	 	$(".gruzSumm").each(function( index ) {
		  	sm =  ($(this).text() == '') ? 0 : $(this).text();
			priceRes = priceRes+parseFloat(sm);
		});
		$('.priceRes').html(priceRes+' руб.');
	 }
	 /* Переделать таблицу и убрать! */
	 $(document).on('input keyup keydown change','.gruzCount, .gruzPrice',function(){
	 	calc($(this));
	 });

	/* Навесить единые триггеры на радио и убрать!  */
	$('.gruzPolRadio').on('change click input',function(){
		elId = $(this).attr('data-el');
		if ($(this).val() === '0'){
			$('#'+elId).hide();
		}else{
			$('#'+elId).show();
		}
	});

	$('.sch_corrects').on('change click input',function(){
		//elId = $(this).attr('data-el');
		console.log('elId');
		if ($(this).val() === '0'){
			$('#sch_corrects_info').hide();
		}else{
			$('##sch_corrects_info').show();
		}
	});


	$('input').each(function(){
	 	$(this).attr('autocomplete','off');
	});

    $('.formClear').on('click',function(){

    	$('.docForm')[0].reset();
    	return false;
    });

    $('.saveDoc').on('click',function(){
        $.ajax(saveUrl ,{
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                Accept: "aplication/json; charset=utf-8",
                "Content-Type": "application/x-www-form-urlencoded; charset=utf-8"
            },
            cache: false,
            data: $('.docForm').serialize(),
            success : function(response) {
                $('.modal-title').html('Сохранение документа')
                $('.modal-body').html('<p>'+'Документ успешно сохранён'+'</p>');
                $('#infoModal').modal('show');
            },
            error: function (response) {
                console.log(response);
                $('.modal-title').html('Сохранение документа')
                $('.modal-body').html('<p>'+'Для охранения документа необходимо авторизоваться!'+'</p>');
                $('#infoModal').modal('show');
            }
        });
    	// $.post(
        //        '/saveDoc',
        //         $('.docForm').serialize(),
        //         function(data, status, jqXHR){
        //            console.log(data, status, jqXHR);
        //
        //         	$('.modal-title').html('Сохранение документа')
        //         	txt = (data === '1') ? '<p>Документ успешно сохранён': 'Для охранения документа необходимо авторизоваться!';
        //         	$('.modal-body').html('<p>'+txt+'</p>');
        //         	$('#infoModal').modal('show');
        //         }
        //       );
              return false;
    });

    $('.showHideEl').change(function(){
    	el =$(this).attr('data-el');
    	func = $(this).attr('data-func');
    	switch (func){
    		case 'hide':
    			$(el).hide();
    			console.log('hide');
    		break;
    		case 'show':
    			$(el).show();
    			console.log('show');
    		break;
    		case 'showhide':
    			show = $(this).attr('data-show');
    			hide = $(this).attr('data-hide');
    			$(show).show();
    			$(hide).hide();
    		break;
    	}


    });

});
