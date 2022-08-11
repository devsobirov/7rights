$(document).ready(function(){
	console.log('Custom functions loaded');

	$('#addTableRow').on('click',function(){
		console.log('Add row into table');
		$('#gruzList').appendTo(
			+'<tr>'+		
				+'<td><input type = "text"></td>'+
				+'<td><input type = "number"></td>'+
				+'<td><input type = "number"></td>'+
				+'<td><input type = "number"></td>'+
				+'<td><input type = "number"></td>'+
				+'<td><i class="fa-solid fa-trash"></i></td>'+
			+'</tr>'
			);
	});


});