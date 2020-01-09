/* 
 * Copyright (C) 2018 Ingeniero en Computación: Ricardo Presilla.
 * @version 1.1 JavaScript para agregar colaboradores a la solicitud de derechos 
 * de autor. Esta Versión es derivada del original del año 2017, creado por el
 * Ingeniero en Computación: Ricardo Presilla.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/*Definición de las variables para JSON*/
    var archivo = {
        'Aplicación': "Marcandur",
        'Fecha': '',
        'Colaborador': [],
        'estado': true
    };
    var cadena="";
    archivo.Fecha=new Date();//Toma la fecha actual del sistema
    var archivoAnterior = {
        'Aplicación': "Marcandur",
        'Fecha': '',
        'Colaborador': [],
        'estado': true
    };
/****************************Leer archivo json*********************************/        
    function LeerJSon(){
        archivoAnterior = JSON.parse(localStorage.getItem('tabla.json'));
        /**Se debe recorrer el arreglo de Colaborador e imprimir uno a la vez*/
        if(archivoAnterior!= null){
            if((archivoAnterior !== "undefined")&&(typeof archivoAnterior.Colaborador !== "undefined")){
                var n = archivoAnterior.Colaborador.length;
                for(var i=0; i<n; i++){//Agrega cada termino al objeto actual
                    archivo.Colaborador.push(archivoAnterior.Colaborador.pop());
                }
            }
            else{//No esta correcto el archivo
                localStorage.clear();
            }
        }
    }
/*********************Funcion para crear la tabla con 6 columnas***************/
    function genera_tabla() {
        LimpiarTabla();
  // Obtener la referencia del elemento div que contiene la tabla
        var div = document.getElementById("autores");
  // Crea un elemento <table> y un elemento <tbody>
        var tabla   = document.createElement("table");
        var tblBody = document.createElement("tbody"); 
/*Crea el encabezado de la tabla.*/
        var tbTitulos= document.createElement("thead");
        var hileraTitulos = document.createElement("tr");              
/*Crea las columnas*/                  
        var celda = document.createElement("th");//El numero de item
        celda.appendChild(document.createTextNode("#"));
        hileraTitulos.appendChild(celda);
        var celda2 = document.createElement("th");//El nombre del colaborador
        celda2.appendChild(document.createTextNode("Nombre"));
        hileraTitulos.appendChild(celda2);
        var celda3 = document.createElement("th");//La Fecha de nacimiento
        celda3.appendChild(document.createTextNode("Fecha Nac."));
        hileraTitulos.appendChild(celda3);
        var celda4 = document.createElement("th");//El Lugar de Nacimiento
        celda4.appendChild(document.createTextNode("Lugar Nac."));
        hileraTitulos.appendChild(celda4);
        var celda5 = document.createElement("th");//El rfc
        celda5.appendChild(document.createTextNode("RFC"));
        hileraTitulos.appendChild(celda5); 
        var celda6 = document.createElement("th");//El porcentaje de participación
        celda6.appendChild(document.createTextNode("Nacionalidad"));
        hileraTitulos.appendChild(celda6); 
        var celda7 = document.createElement("th");//El porcentaje de participación
        celda7.appendChild(document.createTextNode("% Par."));
        hileraTitulos.appendChild(celda7); 
/**Agrega la linea de titulos al encabezado de la tabla. */
        tbTitulos.appendChild(hileraTitulos);
/**Agrega la linea de titulos a la tabla*/
        tabla.appendChild(tbTitulos);
        if(typeof archivo.Colaborador !== "undefined"){
/**Cuenta cuantas filas son*/
            var n=archivo.Colaborador.length;
/*Crea las filas*/
            for (var i = 0; i < n; i++) {
/*Crea las hileras de la tabla*/
                var hilera = document.createElement("tr");
/*  Crea un elemento <td> y un nodo de texto, haz que el nodo de
texto sea el contenido de <td>, ubica el elemento <td> al final
de la hilera de la tabla**/
                var celda = document.createElement("td");
                celda.appendChild(document.createTextNode(i+1));
                hilera.appendChild(celda);
                var celda2 = document.createElement("td");      
/* Crea un nodo con el contenido del archivo*/                    
                var lista=archivo.Colaborador.pop();
                celda2.appendChild(document.createTextNode(lista.nombre));
                hilera.appendChild(celda2);
                var celda3 = document.createElement("td");
                celda3.appendChild(document.createTextNode(lista.fecha));
                hilera.appendChild(celda3);
                var celda4 = document.createElement("td");
                celda4.appendChild(document.createTextNode(lista.lugar));
                hilera.appendChild(celda4);
                var celda5 = document.createElement("td");
                celda5.appendChild(document.createTextNode(lista.rfc));
                hilera.appendChild(celda5);
                var celda6 = document.createElement("td");
                celda6.appendChild(document.createTextNode(lista.nacionalidad));
                hilera.appendChild(celda6); 
                var celda7 = document.createElement("td");
                celda7.appendChild(document.createTextNode(lista.porcentaje));
                hilera.appendChild(celda7);
/*Agrega la hilera al final de la tabla (al final del elemento tblbody)*/
                tblBody.appendChild(hilera);
            } 
/*Posiciona el <tbody> debajo del elemento <table>*/
            tabla.appendChild(tblBody);
    /*Agrega <table> en el <div>*/
            div.appendChild(tabla);
    /*modifica el atributo "border" de la tabla y lo fija a "1";*/
            tabla.setAttribute("border", "0");
    /*Asigna el estilo de la tabla con boostrap*/
            tabla.setAttribute("class","table table-striped tabla");
        }
        else{
            div.removeChild(tabla);
        }

    }    
/**Funcion para crear la tabla en pantalla.**/
function AgregarColaborador(){
    LeerJSon();//Obtiene la información anterior
    var nombre = document.getElementById("nombreColaborador").value;
    var fecha = document.getElementById("fechaNacimientoColaborador").value;
    var lugar = document.getElementById("lugarNacimiento").value;
    var rfc = document.getElementById("RFC").value;
    var nacionalidad = document.getElementById("nacionalidad").value;
    var porcentaje = document.getElementById("porcentaje").value;
    if(nombre!=null && nombre!=""){
        if(fecha!=null && fecha!=""){
            if(lugar!=null && lugar!=""){
                if(porcentaje>0){//Procede si la cantidad es positiva
                    /*Agrega un material a la lista*/
                    archivo.Colaborador.push({ "nombre":nombre , "fecha":fecha, "lugar":lugar, "rfc": rfc, "nacionalidad":nacionalidad, "porcentaje":porcentaje });
                    archivo.estado=false;//Esta en construcción
                    /**Almacena en un archivo en el localStorage*/
                    localStorage.setItem('tabla.json', JSON.stringify(archivo));
                    sessionStorage.setItem('tabla.json', JSON.stringify(archivo));
                }
                else{
                    alert("Agrege un porcentaje.");
                }
            }
            else{
                alert("Escriba el lugar de nacimiento del colaborador.");
            }
        }
        else{
            alert("Escriba la fecha de nacimiento del colaborador.");
        }
    }
    else{
        alert("Escriba un nombre completo del colaborador.");
    }
}
/******************************** Limpiar tabla ******************************/
    function LimpiarTabla(){
        // Obtener la referencia del elemento div que contiene la tabla
        var div = document.getElementById("autores");
        div.innerHTML="";
    }
