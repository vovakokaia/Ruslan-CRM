function get_ajax(datas,ajax_file_url,div_id = '',method,action = 'html', html = 1,succesfunction = 0) {
	
	$.ajaxSetup({cache: false});
	
	$.ajax({
		'type': method,
		'url': ajax_file_url,
		'data': {'datas': datas},
		'success': function(data) {
			
			if(!succesfunction) {
				if(html === 1) {
					if(action == 'html') {
						$(div_id).html(data);
					} else {
						$(div_id).append(data);
					}
				}
			}
		},
		'error': (error) => { console.log(JSON.stringify(error)); } 
	}); 
}

function C_LOAD(module,div = '#C_LOAD',file = 'basic.php') {
	get_ajax(true,'modules/'+module+'/'+file, div);
}

function c_s(title = '',text = '',success = 'error') {
	Swal.fire(
	  title,
	  text,
	  success
	) 
}

function isemail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function c(text) {
	console.log(text);
}

function a(text) {
	alert(text);
}

//localStorage.setItem('errors_file_size', 0);

function send_email_when_error() {
	setInterval(function() {
		get_ajax({'error_file_size' : localStorage.getItem('errors_file_size')},'/ajax/send_email_when_error_comes.php', '', 'POST');
	}, 2000);
}

//send_email_when_error();

function strengthResult(p) {
	var returned_msg = '';

	if(p.length<6 || p.length>18) {
		return 9;
	}

	var strength = checkStrength(p);
	
	switch(true) {
		case strength<=30:
			return 1;
			break;
		case strength>30 && strength<=35:
			return 2;
			break;
		case strength>35 && strength<=50:
			return 3;
			break;        
		case strength>50 && strength<=60:
			return 4;
			break; 
		case strength>60 && strength<=70:
			return 5;
			break;
		case strength>70 && strength<=80:
			return 6;
			break;
		case strength>80 && strength<=90:
			return 7;
			break;
		case strength>90 && strength<=100:
			return 8;
			break;
			default: 
					return 0;
	}
}

function strengthMap(w,arr) {
	var c = 0;
	var sum = 0;

	newArray = arr.map(function(i) {
		i = c;
		//sum += w-2*i;
		sum += w;
		c++;
		return sum;
	});
	
	return newArray[c-1];
}

function checkStrength(p) {
	var weight;
	var extra;

	switch(true) {
		case p.length<6:
			return false;
			break;
		case p.length>18:
			return false;
			break;
		case p.length>=6 && p.length<=10:
			weight = 7;
			extra = 4;
			
			break;
		case p.length>10 && p.length<=14:
			weight = 6;
			extra = 3;
			
			break;
		case p.length>14 && p.length<=18:
			weight = 5;
			extra = 2.5;

			break;
	}

	allDigits = p.replace( /\D+/g, '');
	allLower = p.replace( /[^a-z]/g, '' );
	allUpper = p.replace( /[^A-Z]/g, '' );
	allSpecial = p.replace( /[^\W]/g, '' );
	
	if(allDigits && typeof allDigits!=='undefined') {
		dgtArray = Array.from(new Set(allDigits.split('')));
		dgtStrength = strengthMap(weight,dgtArray);
	} else {
		dgtStrength = 0;
		dgtArray = [];
	}

	if(allLower && typeof allLower!=='undefined') {
		lowArray = Array.from(new Set(allLower.split('')));
		lowStrength = strengthMap(weight,lowArray);
	} else {
		lowStrength = 0;
	}

	if(allUpper && typeof allUpper!=='undefined') {
		upArray = Array.from(new Set(allUpper.split('')));
		upStrength = strengthMap(weight,upArray);
	} else {
		upStrength = 0;
		upArray = [];
	}

	if(allSpecial && typeof allSpecial!=='undefined') {
		splArray = Array.from(new Set(allSpecial.split('')));
		splStrength = strengthMap(weight,splArray);
	} else {
		splStrength = 0;
	}

	strength = dgtStrength+lowStrength+upStrength+splStrength;
	
	if(dgtArray.length>0){
		strength = strength + extra;
	}

	if(splStrength.length>0){
		strength = strength + extra;
	}

	if(p.length>=6){
		strength = strength + extra;
	}

	if(lowArray.length>0 && upArray.length>0){
		strength = strength + extra;
	}

	return strength;
}

function shf(theText) {
	output = new String;
	Temp = new Array();
	Temp2 = new Array();
	TextSize = theText.length;

	for(i = 0; i < TextSize; i++) {
		rnd = Math.round(Math.random() * 122) + 68;
		Temp[i] = theText.charCodeAt(i) + rnd;
		Temp2[i] = rnd;
	}

	for(i = 0; i < TextSize; i++) {
		output += String.fromCharCode(Temp[i], Temp2[i]);
	}

	return output;
}

function de_shf(theText) {
	output = new String;
	Temp = new Array();
	Temp2 = new Array();
	TextSize = theText.length;

	for (i = 0; i < TextSize; i++) {
		Temp[i] = theText.charCodeAt(i);
		Temp2[i] = theText.charCodeAt(i + 1);
	}

	for (i = 0; i < TextSize; i = i+2) {
		output += String.fromCharCode(Temp[i] - Temp2[i]);
	}

	return output;
}

function get_map(x = 55.751574, y = 37.573856, zoom = 9, icon_path = '/images/icon.png', icon_image_width = 48, icon_image_height = 48) {
	var sm = L.sm(),
	map = sm.map('map-id', {
		zoomControl: true,
		minZoom: 3,
		maxZoom: 19,
		themePath: '/dist/themes/sputnik_maps/'
	})
	.setView([55.75, 37.6167], 10);
	
	sm.addMarker(map, [55.85, 37.6167], {markerType: 'alt3'});
}

function exportReportToSpreadsheet(url, datasheet, columns, report, selector, date) {
 var spreadsheet = SpreadsheetApp.openByUrl(url);
 var sheet = spreadsheet.getSheetByName(datasheet);

 var report = AdWordsApp.report(
   'SELECT ' + columns + ' ' +
   'FROM ' + report + ' ' +
   'WHERE ' + selector +' ' +
   'DURING '+ date + ' '
   );
 
 report.exportToSheet(sheet);

}

function main() {
//Отчет №1

 // Параметры выгрузки
 
 var url = 'https://docs.google.com/spreadsheets/d/126oSx5zc3CfCQCttQUy2DlRViVw4m1lK6P1zuzcmQ4Y/edit?usp=sharing';
 var datasheet = 'KworkLeest';
 var columns = 'money';
 var report = 'CAMPAIGN_PERFORMANCE_REPORT';
 var selector = 'CampaignName DOES_NOT_CONTAIN "Шашлык"';
 var during = 'LAST_30_DAYS';
 
 // Функция выгрузки

 exportReportToSpreadsheet(url, datasheet, columns, report, selector, during);
}

//main();