//Ustawienie daty i godziny klienta
	function dater(){
		var data = new Date();
		var day = data.getDay();
		var month = data.getMonth()+1;
		var year = data.getFullYear();
		var hour = data.getHours();
		var mint = data.getMinutes();
		
		if(day<10){
			day = "0"+day;
		}
		if(month<10){
			month = "0"+month;
		}
		if(hour<10){
			hour = "0"+hour;
		}
		if(mint<10){
			mint = "0"+mint;		
		}
		
		document.getElementById('date').value = year+"-"+month+"-"+day;
		document.getElementById('time').value = hour+":"+mint;
	}
	
//Sprawdzenie poprawnosci formatu
	function checkDate(){
		var indate = document.getElementById('date').value;
		var intime = document.getElementById('time').value;

		var year = indate.substring(0,4);
		var month = indate.substring(5,7);
		var day = indate.substring(8);
		var hour = intime.substring(0,2);
		var minutes = intime.substring(3);
		var dash1 = indate.substring(4,5);
		var dash2 = indate.substring(7,8);
		var dot = intime.substring(2,3);

		var dats = new Date();
		
		if(dash1 !== "-" || dash2 !== "-" || dot !== ":"){
			dater();
			alert("Zły format!");
		}

		if(year<1990 || year>dats.getFullYear() || isNaN(year) || month<1 || month>12 || isNaN(month)|| day<0 || day>32 || isNaN(day)){
			dater();
			alert("Zły format daty!");
		}
		if(hour<0 || hour>24 || isNaN(hour) || minutes<0 || minutes>60 || isNaN(minutes)){
			dater();
			alert("Zły format godziny!");
		}
		
	}
//Wgrywanie wielu plików
	function fileButton(){
		var fdiv = document.getElementById('fdiv');
		var no = fdiv.children.length; //ilosc linii w divie
		var fileNo = no/2; //ilosc inputów na pliki (- znaczniki br)
		
		var input = document.createElement('input');
		input.type = "file";
		input.name = "file" + fileNo;
		input.onchange = function() { fileButton(); }; //wywołanie rekurencyjne
		
		fdiv.appendChild(input);
		fdiv.appendChild(document.createElement("br"));
		
	}
//wypisywanie listy stylów
function listStyles(){
	var list = ""; 
	for (var i = 0; (styl = document.getElementsByTagName("link")[i]); i++) { 
		if (styl.getAttribute("title")) { 
			title = styl.getAttribute("title"); 
			list += "<li><a href=\"#\" onclick=\"setStyle('"+title+"'); return false;\">" + title +"</a></li>";
		}
	}
	document.getElementById('ListStyles').innerHTML = "<p>Wybierz styl:</p><ul>" + list + "</ul>";
}

// Ustawienie stylu
function setStyle(stitle) {
	var style;
	for (var i = 0; (style = document.getElementsByTagName("link")[i]); i++) { 
		if (style.getAttribute('title')) { 
			style.disabled = true; 
			if (style.getAttribute('title') == stitle){
				style.disabled = false;
			}	
		}
	}
}

//odczytaj aktualny styl
function currentStyle(){
	var cstyle;
	for(var i=0; (cstyle = document.getElementsByTagName("link")[i]); i++) {
	if(!cstyle.disabled) {
		return cstyle.getAttribute("title");
		}
	}
	return null;
}

//utwórz ciasteczko (bez daty expires - ważne do zamknięcia przeglądarki, tutaj: ważne 30 dni od daty)
function makeCookie(name, style){
	var data = new Date();
	var days = 30;
	data.setTime(data.getTime() + (days*24*60*60*1000));
	var expiration = "expires=" + data.toGMTString();
	document.cookie = name + "=" + style + ";" + expiration + ";";
}

//odczytuj ciasteczko: zwraca nazwę stylu
function readCookie(name){
	var name = name + "="; //żeby odczytać nazwe stylu
	var cookie_arr = document.cookie.split(";");
	
	for(var i=0; i<cookie_arr.length; i++){
		var word = cookie_arr[i]; //kolejne wyrazy z tablicy ciasteczek
		while (word.charAt(0) == ' ') { //pozbycie sie bialych znakow
			word = word.substring(1, word.length);
		}
		if (word.indexOf(name) == 0){
			return word.substring(name.length, word.length);
		} 
		return null;
	}
}
//ładuje ciasteczko i ustawia styl strony 
function loadCookie(){
	var cookie = readCookie("style");
	if(cookie){
		var styleTitle = cookie;
	} else {
		var styleTitle = currentStyle();
	}
	setStyle(styleTitle);
}

//przy zaladowaniu: odczytaj styl z ciasteczka i ustaw lub ustaw aktualny
window.onload = loadCookie();

//przy opuszczeniu strony
window.onunload = function(e) {
	var title = currentStyle();
	makeCookie("style", title);
}

// Zeby przy zmianie na inna podstrone pozostawal ustawiony styl
loadCookie();
