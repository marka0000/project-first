$(document).ready(function() { 
	/* Сохранение пользователей в БД */
	$('#button').click(function() {
		var name = $('#name').val();
		var name_ch = name.replace(/[^А-Яа-я]/g,'')
		var age = $('#age').val();
		var city = $('#city').val();
		var cityText = $('#city :selected').text();
		var fail = '';

		$('#errorMessage').hide();
		if (name == '') fail = 'Введите свое имя';
		else if (name != name_ch) fail = 'Введите имя на кириллице';
		else if (name.length < 2) fail = 'Имя меньше 2 букв';
		else if (age == '') fail = 'Введите свой возраст';
		else if (age<10 || age>100) fail = 'Введите свой возраст от 10 до 100 лет';
		else if (city == 0) fail = 'Выберите свой город';
		if (fail) {
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
			$(".table-users").append($("<div class='cell'>" + name + "</div><div class='cell'>" + age + "</div><div class='cell'>" + cityText + "</div>"));	
			$('#errorMessage').html ('Данные сохранены').css('color', 'green');
			$('#errorMessage').show();
			$('#errorMessage').fadeOut(3000);
		});
		$('#name').val('');	// очищаем поля ввода после сохранения
		$('#age').val('');
		$('#city').val(0);
	});
});

