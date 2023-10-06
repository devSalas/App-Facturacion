<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="facturacion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <div class="container">
        <div>
            <a href="../index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" style="fill: white;"><path d="M11.999 1.993C6.486 1.994 2 6.48 1.999 11.994c0 5.514 4.486 10 10.001 10 5.514-.001 10-4.487 10-10 0-5.514-4.486-10-10.001-10.001zM12 19.994c-4.412 0-8.001-3.589-8.001-8 .001-4.411 3.59-8 8-8.001C16.411 3.994 20 7.583 20 11.994c0 4.41-3.589 7.999-8 8z"></path><path d="m12.012 7.989-4.005 4.005 4.005 4.004v-3.004h3.994v-2h-3.994z"></path></svg>
            </a>
        </div>
        <h2>Nueva Facturación</h2>
        <div>
            <?php echo $objRes ; ?>
        </div>
        <form class="formulario-facturacion grid-data">
            <div class="flex-data-producto">
                <div class="flex-row">
                    <div class="column">
                        <label for="">Producto<input class="input_producto" type="text" name="producto" list="productos" required></label>
                        <datalist class="datalist-producto" id="productos">

                        </datalist>
                    
                    </div>
                    <div>
                        <label for="">Unidad de medida: <input type="text" name="unidad_medida" required></label> 
                    </div>
                </div>

                <div class="flex-row">
                    <label for="">Detalle: <input type="text" name="descripcion" required></label>
                    <label for="">IGV: <input type="text" value="18%" id="afectacion" name="afectacion" disabled></label>
                </div>

                <div class="flex-row">
                    <label for="">Precio: <input type="text" name="precio" required></label>
                    <label for="">stock: <input type="text" name="stock" required></label>
                    <label for="">cantidad: <input type="text" name="cantidad" default="1" required></label>
                    <div class="btns_producto flex-row">
                        <input  type="submit" name="agregar_producto" class="btn_agregar agregarProducto" value="+">
                        <input type="submit" class="btn_eliminar eliminar_producto" name="eliminar_producto" value = "x">
                    </div>
                </div>
<!--                 <div >
                    <label for="" class="flex-row">Cupon de descuento: <input type="text" name="descuento"></label>
                </div> -->
            </div>


            <div class="flex-data-comprobante">
                <div class="flex-row">

                        <label for="">cliente<input class="input_cliente" type="text" data-id_cliente="0" name="cliente" list="clientes"></label>
                        <datalist class="datalist-cliente" id="clientes">                        </datalist>
                        <label for="">Fecha de Emision: <input type="text" id="fecha" name="fecha" disabled></label>
                </div>
                <div class="flex-row">
                    <label for="">N°facturación: <input type="text" name="numero_factura" disabled></label>
                    <label for="" style="display: flex;">doc: 
                    <select name="documento" id="tipo_documento"  >
                        <option class="documento_dni" value="DNI" >DNI</option>
                        <option class="documento_ruc" value="RUC">RUC</option>
                    </select>
                    <input type="text" name="numero_documento">
                </label>
                </div>
                <div class="flex-row">
                    <label for="">Razon social <input type="text" name="razon_social"></label>
                    <label for="">Dirección : <input type="text" name="direccion"></label>

                </div>
                <div class="flex-row">
               


                </div>
            </div>

        </form>



        <table border="1" class="table-product" id="table-product">
            <thead>
                <th>item</th>
                <th>producto</th>
                <th>U. medida</th>
                <th>Cantidad</th>
                <th>Precio Unidad</th>
                <th>importe</th>
                <th>eliminar</th>
            </thead>
            <tbody class="tbody-items">
                <tr class="mensaje-item-vacio">
                    <td colspan="6">
                        <div >
                            No existe ningun registro en el carrito.
                        </div>
                    </td>
                </tr>    

                <template class="template-items"> 
                <tr>
                    <td class="uno"></td>
                    <td class="dos"></td>
                    <td class="tres"></td>
                    <td class="cuatro"></td>
                    <td class="cinco"></td>
                    <td class="seis"></td>
                    <td class="siete ">

                        <svg class="btn_eliminar_producto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:#F0F0F0;"><path class="btn_eliminar_producto" d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm4 12H8v-9h2v9zm6 0h-2v-9h2v9zm.618-15L15 2H9L7.382 4H3v2h18V4z"></path></svg>

                    </td>
                </tr>
                </template>
            </tbody>
        </table>


        <table class="tabla-precio-total">
            <tbody>
                <tr>
                    <td >Subtotal</td>
                    <td>s/ <span  class="precio-subtotal">0 </span></td>
                </tr>
                <tr>
                    <td >IGV</td>
                    <td >s/ <span class="igv">0</span></td>
                </tr>
                <tr>
                    <td >Total</td>
                    <td >s/ <span class="precio-total">0</span></td>
                </tr>
            </tbody>
        </table>

    </div>


    <div class="btns-importantes">
        <button class="btn-delete">eliminar</button>
        <button class="btn-save" >Guardar</button>
        <button class="btn-print" disabled>imprimir </button>
    </div>





    <style>
        .tabla-precio-total{
            margin-top: 20px;
            border-collapse: collapse;
            border:1px solid back;
            
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }

    </style>

    <script>
        const d = document;
        const btnAddProduct= d.querySelector(".agregarProducto");
        const tbodyItems= d.querySelector(".tbody-items");
        let $productoGlobal="";
        let todosLosDatosTemporales;

        const $formularioProducto = d.querySelector(".formulario-facturacion")
        const $inputProducto = d.querySelector(".input_producto")
        const $inputCliente = d.querySelector(".input_cliente")
        const $datalistProductos = d.querySelector(".datalist-producto")
        const $datalistClientes = d.querySelector(".datalist-cliente")
        const $inputDescripcion = d.querySelector(".input_descripcion") 
        const $inputPrecio = d.querySelector(".input_precio")
        const $inputStock = d.querySelector(".input_stock")
        const $inputCantidad = d.querySelector(".input_cantidad")
        
        let CONTADOR = 1;
        let TIPO_DOCUMENTO=0;


        $btnPrint= d.querySelector(".btn-print")

        $btnPrint.addEventListener("click",imprimir)
        function imprimir(){
            console.log(todosLosDatosTemporales)
            let objetoJSON = JSON.stringify(todosLosDatosTemporales)
            let codificarJSON = encodeURIComponent(objetoJSON)
             window.open("./imprimir_factura.html?data="+objetoJSON, "_blank");

        }


        function limpiarFormulario() {
        
            var elementos = $formularioProducto.elements;

            for (var i = 0; i < elementos.length; i++) {
                var elemento = elementos[i];
                const $inputFecha = d.getElementById("fecha").name
                const $inputAfectacion = d.getElementById("afectacion").name
                const $numeroFactura = d.getElementById("numero_factura").name
                // Verificar si el elemento es un campo de entrada o un área de texto   
                console.log($inputFecha.name, elemento.name)
                if (elemento.type == "text" || elemento.type == "email" || elemento.tagName == "TEXTAREA") {
                    if($inputFecha !=elemento.name &&  $inputAfectacion !=elemento.name && $numeroFactura != elemento.name ){
                        elemento.value = ""; // Establecer el valor en blanco

                    }
                }

                // Para elementos de radio y casillas de verificación, desmarcarlos
                if (elemento.type == "radio" || elemento.type == "checkbox") {
                elemento.checked = false;
                }

                // Para elementos de selección (select), seleccionar la primera opción
                if (elemento.tagName == "SELECT") {
                elemento.selectedIndex = 0;
                }
            }
        }
    
        function limpiarTabla(){

        }


        /* eliminar fila de la tabla  */
        document.addEventListener("DOMContentLoaded", function () {
        const tabla = document.getElementById("table-product");
        const filas = tabla.getElementsByTagName("tr");
            console.log("tabla")
            // Agregar evento de clic a los botones "Eliminar"
            tabla.addEventListener("click", function (event) {
            console.log(event.target.classList.contains("btn_eliminar_producto"))
            if (event.target.classList.contains("btn_eliminar_producto")) {
            // Obtener la fila que contiene el botón Eliminar
            const fila = event.target.closest("tr");

            // Eliminar la fila
            fila.remove();
            CONTADOR--    
            // Actualizar los números de orden en las filas restantes
            for (let i = 1; i < filas.length; i++) {
                filas[i].getElementsByTagName("td")[0].textContent = i;
            }
            }
        });
        });









        /* productos */
        $inputProducto.addEventListener("keyup",(e)=>{
            while ($datalistProductos.firstChild) {
            $datalistProductos.removeChild($datalistProductos.firstChild);
            }
            $productoGlobal="";

            e.preventDefault();
            
            async function getData(){
                try {
                    const res = await fetch("../api/index.php", {method:"POST", body:JSON.stringify({nombre:e.target.value})});
                    const json = await res.json() 
                    /* console.log(json) */
                    productoGlobal = json
                    /* console.log(json) */
                    const fragment = document.createDocumentFragment();
                   
                    json.forEach(producto => {
                        const optionElement = d.createElement("option")
                        optionElement.textContent = producto.nombre
                        optionElement.dataset.id=producto.id_producto
                        optionElement.dataset.precio = producto.precio
                        optionElement.dataset.descripcion = producto.descripcion
                        optionElement.dataset.stock = producto.stock
                        optionElement.dataset.unidad_medida = producto.unidad_medida
                        fragment.appendChild(optionElement)
                    });
                   $datalistProductos.appendChild(fragment)
                    

                } catch (error) {
                    console.log(1)
                    
                }
            }
            getData()
        }) 

        $inputProducto.addEventListener('input', function () {
            const selectedValue = $inputProducto.value;
            const opciones = d.querySelectorAll('option');
            for (const opcion of opciones) {
                if (opcion.value === selectedValue) {
                    console.log(opcion)
                let set  = opcion.dataset
                $formularioProducto.producto.dataset.id_producto = set.id
                $formularioProducto.precio.value = set.precio
                $formularioProducto.precio.disabled= true
                $formularioProducto.descripcion.value = set.descripcion
                $formularioProducto.descripcion.disabled= true
                $formularioProducto.stock.value = set.stock
                $formularioProducto.stock.disabled= true
                $formularioProducto.unidad_medida.value = set.unidad_medida
                $formularioProducto.unidad_medida.disabled= true
                break; 
                }
            }


        });


         /* clientes */


         $inputCliente.addEventListener("keyup",(e)=>{
            while ($datalistClientes.firstChild) {
            $datalistClientes.removeChild($datalistClientes.firstChild);
            }
            $productoGlobal="";

            e.preventDefault();
            
            async function getData(){
                try {
                    const res = await fetch("../api/cliente.php", {method:"POST", body:JSON.stringify({nombre:e.target.value})});
                    const json = await res.json() 
                    /* console.log(json) */
                   
                  const fragmentComprobante = document.createDocumentFragment();
                   
                    json.forEach(cliente => {
                     
                        const optionElementCliente = d.createElement("option")
                        optionElementCliente.classList.add("option-cliente")
                        optionElementCliente.textContent =cliente.nombre
                        optionElementCliente.dataset.id_cliente= cliente.id_cliente
                        optionElementCliente.dataset.dni =cliente.dni
                        optionElementCliente.dataset.direccion =cliente.direccion
                        optionElementCliente.dataset.nombre =cliente.nombre
                        optionElementCliente.dataset.razon_social =cliente.razon_social
                        optionElementCliente.dataset.ruc =cliente.ruc
                        fragmentComprobante.appendChild(optionElementCliente)
                       
                    });
                   $datalistClientes.appendChild(fragmentComprobante) 
                    

                } catch (error) {
                    console.log(1)
                    
                }
            }
            getData()
        }) 



        $inputCliente.addEventListener('input', function () {
            const selectedValue = $inputCliente.value;
            const opcionesCliente = d.querySelectorAll('.option-cliente');
            
           $tipoDocumento = d.getElementById("tipo_documento")
        

            for (const opciones of opcionesCliente){
               /*  console.log(opciones) */
                if (opciones.value === selectedValue) {
                    let set  = opciones.dataset

                    $inputCliente.dataset.id_cliente=set.id_cliente 

                    $formularioProducto.direccion.value = set.direccion
                    $formularioProducto.direccion.disabled =true
                    RUC = set.ruc 
                    
                    const $tipoDocumento = d.getElementById("tipo_documento")
                    
                    function desabilitarOpcionesDocumentos(opcionAdesabilitar){

                        let options = $tipoDocumento.options
                        for (var i = 0; i < options.length; i++) {
                            if (options[i].value === opcionAdesabilitar) {
                                options[i].disabled = true;
                                break; // Termina el bucle una vez que se deshabilita la opción
                            }
                        }

                    }
                    
                    if( set.ruc =="null"){
                        $formularioProducto.documento.value = "DNI"
                        
                        $formularioProducto.numero_documento.value = set.dni
                        $formularioProducto.razon_social.value = "no definido"
                        $formularioProducto.razon_social.disabled= true
                        /* $formularioProducto.ruc.disabled= true */
                        $documentoRuc = d.querySelector("documento_ruc")
                        desabilitarOpcionesDocumentos("RUC")

                    }else{
                        $formularioProducto.documento.value = "RUC"
                        $formularioProducto.numero_documento.value = set.ruc
                        $formularioProducto.numero_documento.disabled = true
                        $formularioProducto.razon_social.value = set.razon_social
                        $formularioProducto.razon_social.disabled= true
                        desabilitarOpcionesDocumentos("DNI")
                    }
                    break; 
                }else{
                    $inputCliente.dataset.id_cliente=0
                    $formularioProducto.razon_social.disabled=false
                }
            }


        });



        $tablaProductos =  d.querySelector(".table-product")
         
        $formularioProducto.addEventListener("submit",(e)=>{
            console.clear()
            e.preventDefault()
            
            let form =  e.target

            const btnCliqueado = e.submitter.name.trim();
            $btnAgregarProducto = d.querySelector(".btn_agregar").name.trim()
            $btnEliminarProducto = d.querySelector(".eliminar_producto").name.trim()
            console.log($btnEliminarProducto) 


            if(btnCliqueado == $btnAgregarProducto ){
                async function getProducto(){
                    try {
                        
    
                        let productosTemporales = {
                            nombre: form.producto.value,
                            descripcion:form.descripcion.value,
                            unidad_medida:form.unidad_medida.value,
                            precio:Number(form.precio.value),
                            cantidad:Number(form.cantidad.value),
                            importe:Number(form.cantidad.value)*Number(form.precio.value),
                            id_producto:Number(form.producto.dataset.id_producto)
                            
                        }
    
    
                        const $mensajeItemVacio = d.querySelector(".mensaje-item-vacio")
                        if($mensajeItemVacio){
    
                            tbodyItems.removeChild($mensajeItemVacio)
                        }
    
                        const fragment = document.createDocumentFragment();
                        const templatesProductos = d.querySelector(".template-items")
    
                        const clone = document.importNode(templatesProductos.content, true);
                        clone.querySelector(".uno").dataset.producto_id=productosTemporales.id_producto
                        clone.querySelector(".uno").textContent = CONTADOR
                        clone.querySelector(".dos").textContent = productosTemporales.nombre
                        clone.querySelector(".tres").textContent = productosTemporales.unidad_medida
                        clone.querySelector(".cuatro").textContent = productosTemporales.cantidad
                        clone.querySelector(".cinco").textContent = productosTemporales.precio
                        clone.querySelector(".seis").textContent = productosTemporales.importe
                        /* clone.querySelector(".siete").textContent = productosTemporales.importe */
                        tbodyItems.appendChild(clone)
    
                        CONTADOR++; 
    
                        const $importes = d.querySelectorAll(".seis")
                        const $subtotal = d.querySelector(".precio-subtotal")
                        const $igv = d.querySelector(".igv")
                        const $total = d.querySelector(".precio-total")
    
    
                        function obtenerPrecioFinales(){
                            let precioTotal = 0;
                            let precioSubtotal = 0;
                            let precioIGV = 0;
                            console.log($importes)
                            $importes.forEach(importe=>{
                                precioTotal += Number(importe.textContent)
                            })
                            
                            precioIGV = precioTotal *0.18
                            precioSubtotal = precioTotal-precioIGV
    
                            $subtotal.textContent = precioSubtotal.toFixed(2)
                            $igv.textContent = precioIGV.toFixed(2)
                            $total.textContent = precioTotal.toFixed(2)
                        }
                        obtenerPrecioFinales()
    
                       
    
    
    
    
    
    
    
                    } catch (error) {
                        console.log(error)
                        
                    }
                }
                getProducto()

            }
            if(btnCliqueado == $btnEliminarProducto ){
                console.log("ok eliminar")
            }
    



        })

        const selectDocumento = d.getElementById("tipo_documento")

        selectDocumento.addEventListener("change",e=>{
            valorDoc = e.target.value
            if(valorDoc =="DNI"){
                $formularioProducto.razon_social.disabled=true
            }else{
                $formularioProducto.razon_social.disabled=false
            }
        })


        function EstablecerFecha(){
            const fechaActual = new Date();

            // Formatear la fecha como "YYYY-MM-DD" (por ejemplo, "2023-10-02")
            const fechaFormateada = fechaActual.toISOString().split('T')[0];

            // Establecer el valor del input con la fecha formateada
            document.getElementById("fecha").value = fechaFormateada;
        }
        EstablecerFecha()
        

        window.addEventListener("beforeunload", async function (event) {
                // Personaliza tu mensaje de advertencia
                var mensaje = '¡Atención! Si recargas la página, podrías perder los datos no guardados. ¿Estás seguro de que deseas continuar?';

                // Asigna el mensaje al evento beforeunload
                e.returnValue = mensaje;

                // Devuelve el mensaje personalizado
                return mensaje;
        });

        /* btns importantes */

        $btnEliminar = d.querySelector(".btn-delete")
        $btnGuardar = d.querySelector(" .btn-save")
        $btnImprimir = d.querySelector(".btn-print")
        

       $btnGuardar.addEventListener("click",async function (e){

            function ValidarInputsVacios(){
                let  nombreProducto= $formularioProducto.producto.value
                let cantidad = $formularioProducto.cantidad.value
                let cliente = $formularioProducto.cliente.value
                let direccion =$formularioProducto.direccion.value
                let numDoc = $formularioProducto.numero_documento.value
                
                if(nombreProducto=="" || cantidad == "" ||  cliente == "" || direccion == "" || numDoc == "" )return true
            }

            if(ValidarInputsVacios()) return;

            const $subtotal = d.querySelector(".precio-subtotal")
            const $igv = d.querySelector(".igv")
            const $total = d.querySelector(".precio-total")



            let datos =[]
            datos= {
                cliente_id: Number($formularioProducto.cliente.dataset.id_cliente),
                nombre: $formularioProducto.cliente.value,
                fecha_emision: $formularioProducto.fecha.value,
                numero_factura: $formularioProducto.numero_factura.value,
                subtotal: Number($subtotal.textContent),
                impuestos: Number($igv.textContent),
                total:Number($total.textContent),
                documento:$formularioProducto.numero_documento.value,
                razon_social:$formularioProducto.razon_social.value,
                direccion:$formularioProducto.direccion.value,
                
            }

           let datosTablaProductos =[]
            const table = document.querySelector(".table-product");
            const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");


            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName("td");
                
                const rowData = {

                    item: cells[0].textContent,
                    producto_id: cells[0].dataset.producto_id,
                    producto: cells[1].textContent,
                    unidad_medida: cells[2].textContent,
                    cantidad: cells[3].textContent,
                    precio_unidad: cells[4].textContent,
                    importe: cells[5].textContent
                };
                datosTablaProductos.push(rowData);
            }
            
            datos ={...datos,datosTablaProductos}
            console.log(datos)
            todosLosDatosTemporales = {...datos}
            try {

                const res = await fetch("../api/guardar_todo.php", {method:"POST", body:JSON.stringify(datos)});
                const json = await res.json()
                    console.log(json)
                if(res.ok){
                    $btnPrint.disabled=false
                }
            } catch (error) {
                console.log(error)
            }
        })
 
        /* ----------- */

        $btnEliminar.addEventListener("click",()=>{
            limpiarFormulario()
            limpiarTabla()
        })
       

   
        d.addEventListener("DOMContentLoaded",()=>{
            async function getNumberFacturación(){
                const res =await fetch("../api/obtenerSerie.php");
                const json = await res.json()
                console.log(json)

                if(json.serieID>=9){
                    console.log("entr")
                    $formularioProducto.numero_factura.value ="0"+`${json.serieID+1}`
                }{
                    $formularioProducto.numero_factura.value =`0${json.serieID+1}`

                }


            }
            getNumberFacturación()
        })
   
   </script>
</body>
</html>