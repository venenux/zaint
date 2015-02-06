
function confirmar(msg,url) {
 self.rValue = false;
 if (confirm(msg) == true) {
  window.location.href = url;
 }
}

function over(element,estilo){
	element.addClassName(estilo);
}
function out(element,estilo){
	element.removeClassName(estilo);
}

function copytext(s) {
	window.clipboardData.setData("Text", s);
}




