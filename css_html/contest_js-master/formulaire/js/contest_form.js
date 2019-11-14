jQuery(function () {
    
    $.ajax({
        dataType: "json",
        url: "./choix_js.json",
        success: function (data) {
			let options = '';
			data.forEach((v) => {
				options += `<option value="${v.value}">${v.label}</option>`;
			});
			$('#choix').append(options);
		}
    });
    
    $('.bouton').on('click', 'button', function () {
		var name = $('#name').val();
		var choix = $('#choix').val();
		$.ajax({
			url: 'http://miw.spipha.fr:3000/api/contest_js',
			method: 'POST',
			data: {
				name: name,
				choix: choix
			}
		});
	});
});

