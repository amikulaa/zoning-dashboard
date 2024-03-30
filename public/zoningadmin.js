/**
 * Onload document
 */
$(document).ready(function(){
	$('.selectpicker').selectpicker();
});

/** Get data for dashboard chart */
if($('#myChart').length > 0){
	var labels = [];
	var data = [];
	var postUrl = url + 'zoningadmin/get_counts';
	$.ajax({
        url: postUrl,
        type: 'POST',
        dataType: 'json',
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
		success: function(response){
			if(response == 0){
				document.getElementById("dashboard_error_msg").value = 'No Applications Within Last 7 Days';
			} else if(response == 'ERROR'){
				document.getElementById("dashboard_error_msg").value = 'Unexpected Error';
			} else {
				document.getElementById("dashboard_error_msg").value = '';
				for(var i = 0; i < response.length; i++){
					labels.push(response[i][0] + ', ' + response[i][1] + '');
					data.push(response[i][2]);
				}
				build(labels, data);
			}
	    }
	});	
}

/** Onchange of submitted applications length of time, change chart */
$('#site_visit_timeline').on('change', function (){
	var labels = [];
	var data = [];
	var postUrl = url + 'zoningadmin/get_special_counts';
	var postData = {amt_time : this.value};
	$.ajax({
        url: postUrl,
        type: 'POST',
        data: postData,
        dataType: 'json',
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
		success: function(response){
			if(response == 0){
				document.getElementById("dashboard_error_msg").value = 'No Applications Within Last 7 Days';
				build([], []);
			} else if(response == 'ERROR'){
				document.getElementById("dashboard_error_msg").value = 'Unexpected Error';
				build([], []);
			} else {
				document.getElementById("dashboard_error_msg").value = '';
				for(var i = 0; i < response.length; i++){
					labels.push(response[i][0] + ', ' + response[i][1] + '');
					data.push(response[i][2]);
				}
				build(labels, data);
			}
	    }
	});	
})

/** Build chart into mychart element */
function build(labels, data){
	var ctx = document.getElementById("myChart");
	var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: labels,
		datasets: [{
			data: data,
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff',
        }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
   });
}

/** Gets the applications for the selected button */
$('.permit_buttons').on('click', function (){
	var postUrl = url + 'zoningadmin/open_permit_details/' + this.id;
	$.ajax({
        url: postUrl,
        type: 'POST',
        dataType: 'html',
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
		success: function(response){
			$('#curr_permit').html(response);
	    }
	});
});

/** Gets the applications for the selected button */
$('.approval_buttons').on('click', function (){
	var postUrl = url + 'zoningadmin/open_permit_details/' + this.id;
	$.ajax({
        url: postUrl,
        type: 'POST',
        dataType: 'html',
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);
        },
		success: function(response){
			$('#curr_permit').html(response);
	    }
	});
});

if($('#sqlTable').length > 0){
	$('#sqlTable').DataTable({
		pageLength: 10
	});
}

/** onclick of checkbox, no change in value */
$('.CHECKBOX').on('click', function (){
	var id = this.id;
	if(document.getElementById(id).checked == true){
		document.getElementById(id).checked = false;
	} else {
		document.getElementById(id).checked = true;
	}
});

/** updates the plain num the value is */
function update_property_desc_no(new_value){
	var stripped = new_value.substring(0, 3);
	$('#property_for_no').val(stripped);
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

// When the user clicks on the button, scroll to the top of the document
function topSOMEFunction() {
	window.scrollBy(0, -200);
  }

// When the user clicks on the button, scroll to the bottom of the document
function downSOMEFunction() {
	window.scrollBy(0, 200);
}

// When the user clicks on the button, scroll to the bottom of the document
function downFunction() {
	window.scrollTo(0,document.body.scrollHeight);
}

/** PERMIT FEES **********************************************************************************/
var one = [
	["Base Fee", 50, false]
];

var two = [
	["Single Family Home", 600, false],
	["Duplex & Multi-Family", 400, true],
	["Addition (HABITABLE) < 500 sq. ft.", 150, false],
	["Addition (HABITABLE) >= 500 sq. ft.", 200, false],
	["Addition (NON-HABITABLE) < 500 sq. ft.", 50, false],
	["Addition (NON-HABITABLE) >= 500 sq. ft.", 100, false],
	["Accessory Structures (ENCLOSED W/ ROOF) <= 200 sq. ft.", 30, false],
	["Accessory Structures (ENCLOSED W/ ROOF) < 500 sq. ft.", 50, false],
	["Accessory Structures (ENCLOSED W/ ROOF) >= 500 sq. ft.", 100, false],
	["Accessory Structures (NOT ENCLOSED) < 500 sq. ft.", 30, false],
	["Accessory Structures (NOT ENCLOSED) >= 500 sq. ft", 100, false],
	["Non-Structural (FLOODPLAIN FILL, PONDS, ETC.) < 250 sq. ft.", 50, false],
	["Non-Structural (FLOODPLAIN FILL, PONDS, ETC.) >= 250 sq. ft.", 100, false],
	["Viewing/Access Corridor Establishment", 100, false],
	["Navigability Determination", 100, false],
	["Waterfront Property Review", 50, false],
	["Mitigation/Impervious Surface Plan", 100, false],
	["Tree Removal", 30, false]
];

var three = [
	["+$150 TO NON-RESIDENTIAL BUILD STRUCTURE FEES.", 150, false]
];

var four = [
	["+$50 TO RESIDENTIAL BUILD STRUCTURE FEES.", 50, false]
];

var five = [
	["500 - 999 sq. ft.", 50, false],
	["1000 - 1499 sq. ft.", 80, false],
	["1500 - 1999 sq. ft.", 100, false],
	["2000 - 4999 sq. ft.", 150, false],
	["5000+ sq. ft.", 200, false]
];

var six = [
	["Principal Structure", 500, false],
	["Addition < 500 sq. ft.", 150, false],
	["Addition >= 500 sq. ft.", 300, false],
	["Accessory Structures >= 1,000", 150, false],
	["Accessory Structures < 1,000", 100, false],
	["Outside Storage in I Zone", 50, false]
];

var seven = [
	["Base Fee", 30, false]
];

var eight = [
	["Base Fee", 50, false]
];

var nine = [
	["Base Fee", 50, false]
];

var ten = [
	["Base Fee", 100, false]
];

var eleven = [
	["Principal", 300, false],
	["Additions", 150, false],
	["Accessory Structures >= 1,000 sq. ft", 100, false],
	["Accessory Structures < 1,000 sq. ft", 50, false]
];

var twelve = [
	["$25 OR $0.50 PER SQ. FT., WHICHEVER IS GREATER.", 25, true]
];

var thirteen = [
	["Preliminary Plat", 350, true],
	["Final Subdivision Plat", 200, false],
	["Condominium Plat", 200, true]
];

var fourteen = [
	["Certified Survey - Preliminary", 50, false],
	["Certified Survey - Final", 50, false]
];

var fifteen = [
	["Fill", 50, false],
	["Accessory", 50, false]
];

var sixteen = [
	["New and Class 1 Collocation", 3000, false],
	["Class 2 Collocation", 500, false]
];

/** Show the fees png for the user to see calculated fees */
function show_fees() {
	if (document.getElementById('permit_fees').hidden === false) {
		document.getElementById('permit_fees').hidden = true;
	} else {
		document.getElementById('permit_fees').hidden = false;
	}
}

/** Do math */
var CURRENT_SECTION = 0;
var curr_plat = 0;
function do_math(new_val) {
	var total_value = 0;
	switch (CURRENT_SECTION) {
		case '2':
			total_value = 400 * parseInt(new_val);
			document.getElementById('fee_answer2').value = total_value;
			break;
		case '12':
			total_value = .5 * parseFloat(new_val);
			document.getElementById('fee_answer2').value = total_value;
			break;
		case '13':
			total_value = curr_plat + (parseInt(new_val) * 10);
			document.getElementById('fee_answer2').value = total_value;
			break;
	}
}

/** Second input for calculating fee */
function add_addition(section) {
	let new_div = document.createElement('div');
	new_div.id = 'calculator_addition';
	var multiply = document.createElement('p');
	multiply.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-xmark fa-lg"></i> ';
	var note = ' UNIT COUNT';
	switch (section) {
		case '12':
			multiply.innerHTML = 'OR $0.50&nbsp;&nbsp;<i class="fa-solid fa-xmark fa-lg"></i> ';
			note = ' SQ. FT. COUNT';
			break;
		case '13':
			multiply.innerHTML = '<i class="fa-solid fa-plus fa-lg"></i>&nbsp;&nbsp;$10&nbsp;&nbsp;<i class="fa-solid fa-xmark fa-lg"></i>&nbsp;&nbsp;';
			note = ' LOT COUNT';
			break;
	}

	var new_input = document.createElement('input');
	var addition_label = document.createTextNode(note);
	new_input.type = 'number';
	new_input.min = 0;
	new_input.id = 'additional_multiplier';
	new_input.setAttribute('onChange', 'do_math(this.value);');
	CURRENT_SECTION = section;
	new_input.style.width = '100px';
	new_input.style.height = '22px';
	new_input.style.borderRadius = '5px';
	multiply.append(new_input);
	multiply.append(addition_label);
	new_div.appendChild(multiply);

	var ajoin = document.createElement('p');
	ajoin.innerHTML = '<i class="fa-solid fa-equals fa-lg text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-dollar-sign fa-lg"></i>&nbsp;';
	var additional_answer_input = document.createElement('input');
	additional_answer_input.type = 'number';
	additional_answer_input.id = 'fee_answer2';
	additional_answer_input.style.width = '100px';
	additional_answer_input.style.height = '22px';
	additional_answer_input.style.borderRadius = '5px';
	additional_answer_input.readOnly = true;
	ajoin.append(additional_answer_input);
	new_div.appendChild(ajoin);

	let div = document.getElementById('calculator');
	div.append(new_div);
}

/** Get answer for fees or additional inputs needed */
$('#fee_subsection').on('change', function() {
	if ($('#calculator_addition').length > 0) {
		$('#calculator_addition').remove();
	}
	var location = document.getElementById('fee_subsection').value;
	var loc_arr = location.split("_");
	var section = loc_arr[0];
	var subsection = loc_arr[1];
	var addition = loc_arr[2];

	var option_arr;
	switch (section) {
		case '1':
			option_arr = one;
			break;
		case '2':
			option_arr = two;
			break;
		case '3':
			option_arr = three;
			break;
		case '4':
			option_arr = four;
			break;
		case '5':
			option_arr = five;
			break;
		case '6':
			option_arr = six;
			break;
		case '7':
			option_arr = seven;
			break;
		case '8':
			option_arr = eight;
			break;
		case '9':
			option_arr = nine;
			break;
		case '10':
			option_arr = ten;
			break;
		case '11':
			option_arr = eleven;
			break;
		case '12':
			option_arr = twelve;
			break;
		case '13':
			option_arr = thirteen;
			break;
		case '14':
			option_arr = fourteen;
			break;
		case '15':
			option_arr = fifteen;
			break;
		case '16':
			option_arr = sixteen;
			break;
	}

	if (addition == 'false') {
		$('#fee_answer').val(option_arr[subsection][1]);
	} else {
		$('#fee_answer').val(option_arr[subsection][1]);
		curr_plat = option_arr[subsection][1];
		add_addition(section);
	}
});

/** Get selections for second select for fees */
$('#fee_section').on('change', function() {
	if ($('#calculator_addition').length > 0) {
		$('#calculator_addition').remove();
	}

	var fee_section = document.getElementById('fee_section').value;
	var curr_count = document.getElementById('fee_subsection_count').value;
	for (var i = 0; i < curr_count; i++) {
		document.getElementById('fee_subsection_option' + i).remove();
	}

	var option_arr;
	switch (fee_section) {
		case '1':
			option_arr = one;
			break;
		case '2':
			option_arr = two;
			break;
		case '3':
			option_arr = three;
			break;
		case '4':
			option_arr = four;
			break;
		case '5':
			option_arr = five;
			break;
		case '6':
			option_arr = six;
			break;
		case '7':
			option_arr = seven;
			break;
		case '8':
			option_arr = eight;
			break;
		case '9':
			option_arr = nine;
			break;
		case '10':
			option_arr = ten;
			break;
		case '11':
			option_arr = eleven;
			break;
		case '12':
			option_arr = twelve;
			break;
		case '13':
			option_arr = thirteen;
			break;
		case '14':
			option_arr = fourteen;
			break;
		case '15':
			option_arr = fifteen;
			break;
		case '16':
			option_arr = sixteen;
			break;
	}

	var select = document.getElementById('fee_subsection');
	for (var i = 0; i < option_arr.length; i++) {
		var option = document.createElement('option');
		option.text = option_arr[i][0];
		option.value = fee_section + "_" + i + "_" + option_arr[i][2];
		option.id = 'fee_subsection_option' + i;
		select.appendChild(option);
	}
	var option = document.createElement('option');
	option.text = 'SELECT';
	option.value = '';
	option.id = 'fee_subsection_option' + option_arr.length;
	option.selected = true;
	option.readOnly = false;
	option.hidden = true;
	select.appendChild(option);
	$('#fee_subsection_count').val(option_arr.length + 1);
	$('#fee_answer').val('');
});