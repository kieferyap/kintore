// Register the service worker if available.
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('./serviceworker.js').then(function(reg) {
		console.log('Successfully registered service worker', reg);
	}).catch(function(err) {
		console.warn('Error whilst registering service worker', err);
	});
}

window.addEventListener('online', function(e) {
	// Resync data with server.
	console.log("You are online");
}, false);

window.addEventListener('offline', function(e) {
	// Queue up events for server.
	console.log("You are offline");
}, false);

// Check if the user is connected.
if (navigator.onLine) {
	console.log("Navigator is online.");
} else {
	// Show offline message
	console.log("Navigator is offline.");
}

$(document).ready(function(){
	$('.datepicker').each(function() {
		$(this).datepicker({
			dateFormat: "yy-mm-dd"
		});
	});

	$(document).on('change', '#id-exercise', function(){
		var $selectedExercise = $(this).find(':selected');
		var unit = $selectedExercise.data('unit');
		$('#form_frequency').val(1);
		$('#form_weight').val(1);
		$('#form_total').val(1);
		
		if (unit != '回') {
			$('#form_frequency').removeAttr('readonly');
		} else {
			$('#form_frequency').attr('readonly', 'readonly');
		}
		$('#basic-addon-weight').html(unit);
		$('#basic-addon-total').html(unit);
	});

	$('.btn-delete-entry').on('click', function() {
		var $row = $(this).parent().parent();
		var id = $(this).data('id');

		$(this).html('<span class="glyphicon glyphicon-hourglass"></span>');
		$(this).attr('disabled', 'true');

		$.ajax({
			url: $(this).data('url'),
			method: "POST",
			data: {'id': id },
			success: function(msg) {
				console.log(msg);
				$row.hide(300);
			},
			error: function(msg) {
				console.log(msg);
			}
		});
	});

	$('.btn-repeat-entry').on('click', function() {
		var $row = $(this).parent().parent();
		var id = $(this).data('id');
		var date = $('#form_date').val();

		$(this).html('<span class="glyphicon glyphicon-hourglass"></span>');
		$(this).attr('disabled', 'true');

		$.ajax({
			url: $(this).data('url'),
			method: "POST",
			data: {'id': id, date: date },
			success: function(msg) {
				window.location.reload();
				console.log(msg);
			},
			error: function(msg) {
				console.log(msg);
			}
		});
	});
});

var inputApp = new Vue({
	el: '#input-vue-app',
	data: {
		weight: 1,
		frequency: 1,
	},
	methods: {
		resetFields: function resetFields() {
			this.weight = 1;
			this.frequency = 1;
		}
	}
})