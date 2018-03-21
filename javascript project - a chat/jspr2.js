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
		var ctitle = cstyle.getAttribute('title');
		return ctitle; 
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
