$(document).ready(function() {
	/* Ввывод таблицы с пользователями */
	$.ajax({
		url: 'Main/ajaxOutTable',
		type: 'POST',
		success: function(data) {
			var asd = $.parseJSON(data);
			for(var i=0; i<asd.length; ++i) {
				$("#first").append($("<div class='cell'>" + asd[i].name + "</div><div class='cell'>" + asd[i].age + "</div><div class='cell'>" + asd[i].city + "</div>"));
			}
		}
	});

	/* Сохранение пользователей в БД */
	$('#button').click(function() {
		var name = $('#name').val();
		var age = $('#age').val();
		var city = $('#city').val();

		// var fail = '';
		// if (name.length < 2) fail = 'Имя меньше 4 символов';
		// else if (age<10) fail = 'Вы ввели возраст меньше 10 лет';

		// if (fail != '') {
		// 	$('#messageShow').html (fail + "<div class='clear'><br /></div>");
		// 	$('#messageShow').show();
		// 	return false;
		// }
		$.ajax({
			url: 'Main/ajaxForm',
			type: 'POST',
			data: {'name': name, 'age': age, 'city':city},
		}).done(function(result) {
			console.log(result);
		});
		return false;
	});

	/*Вывод таблицы с пользователями*/
	$('#button').click(function() {
		$(".cell").remove(); // очишает div
		$.ajax({
			url: 'Main/ajaxOutTable',
			type: 'POST',
			success: function(data) {
				var asd = $.parseJSON(data);
				for(var i=0; i<asd.length; ++i) {
					$("#first").append($("<div class='cell'>" + asd[i].name + "</div><div class='cell'>" + asd[i].age + "</div><div class='cell'>" + asd[i].city + "</div>"));
				}
			}
		});
	});
});

