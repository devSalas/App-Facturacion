<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="facturacion.css">
<!--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css"> -->
</head>

<body>
    <div class="container">
        <h2>Nueva Factura</h2>
        <form class="formulario-facturacion grid-data">
            <div class="flex-data-producto">
                <div class="flex-row">
                    <div class="column">
                        <label for="">Producto<input class="input_producto" type="text" name="producto" list="productos"></label>
                        <datalist class="datalist-producto" id="productos">

                        </datalist>
                    
                    </div>
                    <div>
                        <label for="">Unidad de medida: <input type="text" name="unidad_medida"></label> 
                    </div>
                </div>

                <div class="flex-row">
                    <label for="">Detalle: <input type="text" name="descripcion"></label>
                    <label for="">IGV: <input type="text" value="18%" id="afectacion" name="afectacion" disabled></label>
                </div>

                <div class="flex-row">
                    <label for="">Precio: <input type="text" name="precio"></label>
                    <label for="">stock: <input type="text" name="stock"></label>
                    <label for="">cantidad: <input type="text" name="cantidad" require default="1"></label>
                    <div class="btns_producto flex-row">
                        <button  type="submit" class="btn_agregar agregarProducto">+</button>
                        <button class="btn_eliminar">X</button>
                    </div>
                </div>
<!--                 <div >
                    <label for="" class="flex-row">Cupon de descuento: <input type="text" name="descuento"></label>
                </div> -->
            </div>


            <div class="flex-data-comprobante">
                <div class="flex-row">
                   <!--  <label for="">Tipo de comprobante: <br>
                        <select name="comprobante" id="comprobante">   
                            <option value="factura">Factura</option>
                            <option value="boleta">Boleta</option>
                        </select>
                    </label> -->
                        <label for="">cliente<input class="input_cliente" type="text" name="cliente" list="clientes"></label>
                        <datalist class="datalist-cliente" id="clientes">
                        </datalist>
                        <label for="">Fecha de Emision: <input type="text" id="fecha" name="fecha" disabled></label>
                </div>
                <div class="flex-row">
                    <label for="">numero de factura: <input type="text" name="numero_factura"></label>
                    <label for="">Tipo de documento: <br>
                        <select name="documento" id="tipo_documento"  >
                            <option class="documento_dni" value="DNI" >DNI</option>
                            <option class="documento_ruc" value="RUC">RUC</option>
                        </select>
                    </label>
                </div>
                <div class="flex-row">
                    <label for="">Nombre/Razon social <input type="text" name="razon_social"></label>
                    <label for="">Dirección : <input type="text" name="direccion"></label>
                   <!--  <label for="">forma de pago:
                        <select name="forma_pago">
                        <optgroup label="Forma de Pago">
                            <option value="pago_contado">Pago al Contado</option>
                            <option value="pago_plazos">Pago a Plazos</option>
                            <option value="pago_tarjeta_credito">Pago con Tarjeta de Crédito</option>
                            <option value="pago_tarjeta_debito">Pago con Tarjeta de Débito</option>
                            <option value="pago_transferencia">Transferencia Bancaria</option>
                            <option value="pago_cheque">Pago con Cheque</option>
                        </optgroup>
                        </select>
                    </label> 
                <label for="">
                    metodo de pago:
                    <select name="metodo_pago">
                        <optgroup label="Método de Pago">
                            <option value="tarjeta_credito">Tarjeta de Crédito</option>
                            <option value="tarjeta_debito">Tarjeta de Débito</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="transferencia_bancaria">Transferencia Bancaria</option>
                            <option value="cheque">Cheque</option>
                            <option value="paypal">PayPal</option>
                            <option value="pago_movil">Pago Móvil</option>

                        </optgroup>
                    </select>
                </label>       -->    

                </div>
                <div class="flex-row">
               


                </div>
            </div>

        </form>



        <table border="1" class="table-product" >
            <thead>
                <th>item</th>
                <th>producto</th>
                <th>U. medida</th>
                <th>Cantidad</th>
                <th>Precio Unidad</th>
                <th>importe</th>
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
        <button class="btn-save">Guardar</button>
     <!--    <button class="btn-print">imprimir</button> -->
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





        function limpiarFormulario() {
        
            var elementos = $formularioProducto.elements;

            for (var i = 0; i < elementos.length; i++) {
                var elemento = elementos[i];
                const $inputFecha = d.getElementById("fecha").name
                const $inputAfectacion = d.getElementById("afectacion").name
                // Verificar si el elemento es un campo de entrada o un área de texto   
                console.log($inputFecha.name, elemento.name)
                if (elemento.type == "text" || elemento.type == "email" || elemento.tagName == "TEXTAREA") {
                    if($inputFecha !=elemento.name &&  $inputAfectacion !=elemento.name ){
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
                let set  = opcion.dataset
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
            console.log($tipoDocumento.value)

            for (const opciones of opcionesCliente){
                console.log(opciones)
                if (opciones.value === selectedValue) {
                let set  = opciones.dataset

                $inputCliente.dataset.id_cliente=set.id_cliente    
                $formularioProducto.direccion.value = set.direccion
                $formularioProducto.direccion.disabled =true
                RUC = set.ruc 
  
                if( set.ruc =="null"){
                    $formularioProducto.documento.value = "DNI"
                     
                    $formularioProducto.razon_social.value = set.dni
                    $formularioProducto.razon_social.disabled= true
                    $formularioProducto.ruc.disabled= true

                    $documentoRuc = d.querySelector("documento_ruc")


                }else{
                    $formularioProducto.documento.value = "RUC"
                     
                    $formularioProducto.razon_social.value = `${set.ruc}-${set.razon_social}`
                    $formularioProducto.razon_social.disabled= true
                }
                break; 
                }
            }


        });



        $tablaProductos =  d.querySelector(".table-product")
         
        $formularioProducto.addEventListener("submit",(e)=>{

            e.preventDefault()
            let form =  e.target


            async function getProducto(){
                try {

                    let productosTemporales = {
                        nombre: form.producto.value,
                        descripcion:form.descripcion.value,
                        unidad_medida:form.unidad_medida.value,
                        precio:Number(form.precio.value),
                        cantidad:Number(form.cantidad.value),
                        importe:Number(form.cantidad.value)*Number(form.precio.value)
                    }

                    /* console.log(productosTemporales)
                    const res = await fetch("../api/productos_temporales.php", {method:"POST", body:JSON.stringify(productosTemporales)});
                    const json = await res.json() */
                    

                    const $mensajeItemVacio = d.querySelector(".mensaje-item-vacio")
                    if($mensajeItemVacio){

                        tbodyItems.removeChild($mensajeItemVacio)
                    }

                    const fragment = document.createDocumentFragment();
                    const templatesProductos = d.querySelector(".template-items")

                    const clone = document.importNode(templatesProductos.content, true);
                    clone.querySelector(".uno").textContent = CONTADOR
                    clone.querySelector(".dos").textContent = productosTemporales.nombre
                    clone.querySelector(".tres").textContent = productosTemporales.unidad_medida
                    clone.querySelector(".cuatro").textContent = productosTemporales.cantidad
                    clone.querySelector(".cinco").textContent = productosTemporales.precio
                    clone.querySelector(".seis").textContent = productosTemporales.importe
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

            const $subtotal = d.querySelector(".precio-subtotal")
            const $igv = d.querySelector(".igv")
            const $total = d.querySelector(".precio-total")

            let datos =[]
            datos= {
                cliente_id: $formularioProducto.cliente.dataset.id_cliente,
                fecha_emision: $formularioProducto.fecha.value,
                numero_factura: $formularioProducto.numero_factura.value,
                subtotal: $subtotal.textContent,
                impuestos: $igv.textContent,
                total:$total.textContent,
                documento:$formularioProducto.razon_social.value,
                direccion:$formularioProducto.direccion.value  
            }

           let datosTablaProductos =[]
            const table = document.querySelector(".table-product");
            const rows = table.getElementsByTagName("tbody")[0].getElementsByTagName("tr");


            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName("td");
                const rowData = {
                    item: cells[0].textContent,
                    producto: cells[1].textContent,
                    unidad_medida: cells[2].textContent,
                    precio_unidad: cells[3].textContent,
                    importe: cells[4].textContent,
                };
                datosTablaProductos.push(rowData);
            }
 
            datos ={...datos,datosTablaProductos}
            console.log(datos)

            try {

                const res = await fetch("../api/guardar_todo.php", {method:"POST", body:JSON.stringify(datos)});
                const json = await res.json()
                console.log(json)
            } catch (error) {
                console.log(error)
            }
        })
 
        /* ----------- */

        $btnEliminar.addEventListener("click",()=>{
            limpiarFormulario()
        })
       

   
   
   
   </script>
</body>
</html>