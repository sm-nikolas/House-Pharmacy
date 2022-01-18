/*******************************************************************/
function id(sId){
    return document.getElementById(sId);
}
/*******************************************************************/

// Formatação do campo de preço

String.prototype.reverse = function(){
    return this.split('').reverse().join(''); 
  };
  
  function mascaraMoeda(campo,evento){
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "##.###.###,##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = resultado.reverse();
  }
/*******************************************************************/

// Formatação do campo nome

function somente_numeros(){
    var sNum="1234567890";
    var cTecla = event.key;
    if(sNum.indexOf(cTecla)==-1){
        return false;
    }else{
        return true;
    }
}