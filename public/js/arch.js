/*Programacion de JavaScript*/
/*
  Descripción: Rompecabezas con javascript, html y css, dificultad escalable por número de piezas.
  Autor: Carlos Medina
  https://www.facebook.com/xziolhvinvhgl
  https://twitter.com/unaexpresion
  https://plus.google.com/u/0/117195360288877972577/posts
  Imagen tomada de: http://www.dailypainters.com/paintings/223207/-324-Red-Bellied-Bandit/Jeff-Mahorney
*/

var select = false;
var c = "inc";
var pos_s = "";
var id_s = "";

var rompecabezas = {
  _arr_pos_r : new Array(),
  _arr_pos_a : new Array(),
  
  _mostrar: function(){
    rompecabezas._arr_pos_r.length = 0;
		var piezas = rompecabezas._get("piezas").value;
		var tb = document.createElement('table');
		tb.border = 1;
		tb.align = 'center';
		tb.cellPadding = 0;
		tb.cellSpacing = 0;
		var dp = document.createElement('div');
		dp.id = 'posiciones';
		dp.className = 'posic';
		var ar = Math.sqrt(piezas);
		var c = 0;
		var tam_img = 300;
		var pos_img = tam_img / ar;
		for(var fil=1;fil<=ar;fil++){
			var tr = document.createElement('tr');
			for(var cel=1;cel<=ar;cel++){
				c++;
				var td = document.createElement('td');
				td.className = 'pieza';
				td.id = 'pos_'+c;
				td.style.width = pos_img+'px';
				td.style.height = pos_img+'px';
				var dbp = document.createElement('div');
				dbp.id = 'val_bp_'+c;
				var p = Math.round(((pos_img*cel)-pos_img) * -1)+'px '+Math.round(((fil * pos_img)-pos_img) * -1)+'px';
				td.style.backgroundPosition = p;
				rompecabezas._arr_pos_r.push(p);
				dbp.innerHTML = p;
				dp.appendChild(dbp);
				td.onclick = function(){
					rompecabezas._cambiaBGP(this.id);
					rompecabezas._compruebaFin();
				}
				tr.appendChild(td);
			}
			tb.appendChild(tr);
		}
		if(!rompecabezas._get("div_content")){
			var contR = document.createElement('div');
			contR.id = 'div_content';
			contR.appendChild(tb);
			contR.appendChild(dp);
			document.body.appendChild(contR);
		}
		else{
			rompecabezas._get("div_content").innerHTML = '';
			rompecabezas._get("div_content").appendChild(tb);
			rompecabezas._get("div_content").appendChild(dp);
			rompecabezas._get("posiciones").removeClass('posic');
			rompecabezas._get("posiciones").innerHTML = '';
			rompecabezas._get("posiciones").className = 'posic';
		}
	},
	
	_barajar: function(){
		var num_alt = null;
		var arr = new Array();
		var resp = "no";
		var i = -1;
		var repite = "no";
		var pie = parseInt(rompecabezas._get("piezas").value);
		var pie1 = pie + 1;
		while(arr.length < pie){
			repite = "no";
			num_alt = Math.floor(Math.random()*pie1);
			if(num_alt != 0){
				if(arr.length == 0){
					i++;
					arr[i] = num_alt;
				}else{
					for(j=0;j<=arr.length-1;j++){
						if(arr[j] == num_alt){
							repite = "si";
						}
					}
					if(repite != "si"){
						i++;
						arr[i] = num_alt;
					}
				}
			}
		}
	
		var id = 0;	
		for(k=0; k<=arr.length-1;k++){
			id = k-(-1);
			rompecabezas._get("pos_"+id).style.backgroundPosition = rompecabezas._get("val_bp_"+arr[k]).innerHTML;
		}
	},
	
	_cambiaBGP: function(id){
		if(select == false){
			pos_s = rompecabezas._get(id).style.backgroundPosition;
			id_s = id;
			select = true;
      rompecabezas._get(id_s).style.boxShadow = '1px 1px 14px #FFF,-1px -1px 14px #FFF, 1px -1px 14px #FFF,-1px 1px 14px #FFF';
		}else{
			var pos_n =  rompecabezas._get(id).style.backgroundPosition;
			var id_n = id;
			c = "com";
			select = false;
		}
	 
		if(c == "com"){ rompecabezas._get(id_n).style.backgroundPosition = pos_s; rompecabezas._get(id_s).style.backgroundPosition = pos_n;
			c = "inc";
      rompecabezas._get(id_s).style.boxShadow = '';
		}
	},
	
	_compruebaFin: function(){
		var pie = parseInt(rompecabezas._get("piezas").value);
		var fin = false;
		rompecabezas._arr_pos_a.length = 0;
		for(var i=1;i<=pie;i++){
			rompecabezas._arr_pos_a.push(rompecabezas._get("pos_"+i).style.backgroundPosition);
		}
		for(var j=0;j<rompecabezas._arr_pos_r.length;j++){
			if(rompecabezas._arr_pos_r[j] != rompecabezas._arr_pos_a[j]){
				fin = false;
				break;
			}else{
				fin = true;
			}
		}
		
    setTimeout(function(){
      if(fin){
      	//
      	var mesesAnio = parar(); 
      	// 
			  alert("LO RESOLVISTE!! ")
		  }
    },600);
	},
	
	_get: function(id){
		return document.getElementById(id);
	}
};


window.onload = function(){
	visor=document.getElementById("reloj"); //cronom
	// vor=document.getElementById("supervisormail");
	var cr=empezar(); 
	 //cron
	rompecabezas._mostrar();
  	rompecabezas._barajar();
  	// rompecabezas.empezar();
  	rompecabezas._get("piezas").onchange = function(){
    	rompecabezas._mostrar();
  	}
    rompecabezas._get("barajar").onclick = function(){
      rompecabezas._barajar();
      var rc=reiniciar();
      var cr1=empezar();
    }
}

// cronom
var marcha=0; //control del temporizador
var cro=0; //estado inicial del cronómetro.
// var emp=0;
//cronometro en marcha. Empezar en 0:
function empezar() { 
         if (marcha==0) { //solo si el cronómetro esta parado
            emp=new Date(); //fecha actual
            elcrono=setInterval(tiempo,10); //función del temporizador.
            marcha=1; //indicamos que se ha puesto en marcha.
            }
         }
function tiempo() { //función del temporizador 
         actual=new Date(); //fecha en el instante
         cro=actual-emp; //tiempo transcurrido en milisegundos
         cr=new Date(); //fecha donde guardamos el tiempo transcurrido
         cr.setTime(cro); 
         cs=cr.getMilliseconds(); //milisegundos del cronómetro
         cs=cs/10; //paso a centésimas de segundo.
         cs=Math.round(cs);
         sg=cr.getSeconds(); //segundos del cronómetro
         mn=cr.getMinutes(); //minutos del cronómetro
         // ho=cr.getHours()-1; //horas del cronómetro
         if (cs<10) {cs="0"+cs;}  //poner siempre 2 cifras en los números
         if (sg<10) {sg="0"+sg;} 
         if (mn<10) {mn="0"+mn;}
         // visor.innerHTML=ho+" : "+mn+" : "+sg+" : "+cs;
         visor.innerHTML=mn+" : "+sg+" : "+cs; //pasar a pantalla.
         
         }
//reloj
$(function(){     
  var d = new Date(),        
      h = d.getMinutes(),
      m = d.getSeconds();
  if(h < 10) h = '0' + h; 
  if(m < 10) m = '0' + m; 
  $('input[type="time"][value="now"]').each(function(){ 
    $(this).attr({'value': h + ':' + m});
  });
});
//parar el cronómetro
function parar() { 
         if (marcha==1) { //sólo si está en funcionamiento
            clearInterval(elcrono); //parar el crono
            marcha=0; //indicar que está parado.
            }		
         }		 
//Continuar una cuenta empezada y parada.
function continuar() {
         if (marcha==0) { //sólo si el crono está parado
            emp2=new Date(); //fecha actual
            emp2=emp2.getTime(); //pasar a tiempo Unix
            emp3=emp2-cro; //restar tiempo anterior
            emp=new Date(); //nueva fecha inicial para pasar al temporizador 
            emp.setTime(emp3); //datos para nueva fecha inicial.
            elcrono=setInterval(tiempo,10); //activar temporizador
            marcha=1;
            }		
         }
//Volver al estado inicial
function reiniciar() {
         if (marcha==1) { //si el cronómetro está en marcha:
            clearInterval(elcrono); //parar el crono
            marcha=0;	//indicar que está parado
            }
         cro=0; //tiempo transcurrido a cero
         visor.innerHTML = "0 : 00 : 00 : 00"; //visor a cero
         }