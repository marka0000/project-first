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
		var fail = '';

		$('#errorMessage').hide();
		if (name == '') fail = 'Введите свое имя';
		else if (name.length < 2) fail = 'Имя меньше 2 букв';
		else if (age == '') fail = 'Введите свой возраст';
		else if (age<10 || age>100) fail = 'Введите свой возраст от 10 до 100 лет';
		else if (city == 0) fail = 'Выберите свой город';
		if (fail != '') {
			$('#errorMessage').html (fail);
			$('#errorMessage').show();
			return false;
		}

		$.ajax({
			url: 'Main/ajaxForm',
			type: 'POST',
			data: {'name': name, 'age': age, 'city':city},
		}).done(function(result) {
			console.log(result);
		});
		name = $('#name').val('');	// очищаем поля ввода после сохранения
		age = $('#age').val('');
		city = $('#city').val(0);
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
		return false;
	});
});

