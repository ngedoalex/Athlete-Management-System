$(document).ready(function(){	
	var a = [{name: "Csongrád",
				cities: [
					{name: "Szeged", streets: ["Csuka utca 14.","Tisza utca 1."]},
					{name: "Algyő", streets: ["Kalács vrk 1.", "Drog utca 2."]}]
			},{name: "Pest",
				cities: [
					{name: "Pesti", streets: ["Foo utca 1.", "Bazz krt. 32."]}]
			},
			{name: "Békés",
				cities: [{name: "Kécskés", streets: ["Kicsi utca 4.", "Picsi ker. 5."]}]
			}
		],
		defOption = '<option value="" disabled selected>Please select</option>';
	
	$('#sel2').add('#sel3').prop('disabled', true);
	
	for(var i = 0; i < a.length; i++) {
		$('#sel1').append('<option value="'+i+'">'+a[i].name+'</option>');
	}
	
	$('#sel1').on('change', function(){
		$('#sel3').prop('disabled', true).html(defOption);
		$('#sel2').prop('disabled', false).html(defOption);
		
		for(var i = 0; i < a[$(this).val()].cities.length; i++) {
			$('#sel2').append('<option value="'+i+'">'+a[$(this).val()].cities[i].name+'</option>');
		}
	});
	
	$('#sel2').on('change', function(){
		$('#sel3').prop('disabled', false).html(defOption);
	
		for(var i = 0; i < a[$('#sel1').val()].cities[$(this).val()].streets.length; i++) {
			$('#sel3').append('<option value="'+i+'">'+a[$('#sel1').val()].cities[$(this).val()].streets[i]+'</option>');
		}
	});
});