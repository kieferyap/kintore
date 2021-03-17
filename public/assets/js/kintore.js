$(document).ready(function(){
	$('#id-exercise').on('change', function(){
		var $selectedExercise = $(this).find(':selected');
		$('#basic-addon2').html($selectedExercise.data('unit'));
		$('#basic-addon3').html($selectedExercise.data('unit'));
	});
});

var inputApp = new Vue({
	el: '#input-vue-app',
	data: {
		weight: 1,
		frequency: 1,
	}
})