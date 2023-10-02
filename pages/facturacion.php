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
                        <datalist id="productos">

                        </datalist>
                    
                    </div>
                    <div>
                        <label for="">Unidad de medida: <input type="text" name="unidad_medida"></label> 
                    </div>
                </div>

                <div class="flex-row">
                    <label for="">Detalle: <input type="text" name="descripcion"></label>
                    <label for="">IGV: <input type="text" value="18%" name="afectacion" disabled></label>
                </div>

                <div class="flex-row">
                    <label for="">Precio: <input type="text" name="precio"></label>
                    <label for="">stock: <input type="text" name="stock"></label>
                    <label for="">cantidad: <input type="text" name="cantidad"></label>
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
                    <label for="">Tipo de comprobante: 
                        <select name="comprobante" id="comprobante">   
                            <option value="factura">Factura</option>
                            <option value="boleta">Boleta</option>
                        </select>
                    </label>
                    <label for="">Serie-correlativo: <input type="text"></label>
                    <label for="">Fecha de Emision: <input type="text" id="fecha" disabled></label>
                </div>
                <div class="flex-row">
                    <label for="">Tipo de documento: 
                        <select name="documento" id="">
                            <option value="DNI">DNI</option>
                            <option value="RUC">RUC</option>
                        </select>
                    </label>
                    <label for="">Nombre/Razon social <input type="text"></label>
                </div>
                <div class="flex-row">
                    <label for="">Dirección : <input type="text"></label>
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

        <!-- <div class="nav">
            <span class="btn">Eliminar</span>
            <span class="btn">Nuevo Producto</span>
            <span class="btn">nuevo Cliente</span>
            <span class="btn agregarProducto">Agregar Productos</span>
            <span class="btn">imprimir</span>
        </div> -->

        <table border="1" class="table-product" >
            <thead>
                <th>item</th>
                <th>producto</th>
                <th>U. medida</th>
                <th>Cantidad</th>
                <th>Precio</th>
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


        <table class="precio-total">
            <tbody>
                <tr>
                    <td>Subtotal</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>IGV</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>0</td>
                </tr>
            </tbody>
        </table>

    </div>
    <style>
        .precio-total{
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
        const $datalist = d.querySelector("datalist")
        const $inputDescripcion = d.querySelector(".input_descripcion") 
        const $inputPrecio = d.querySelector(".input_precio")
        const $inputStock = d.querySelector(".input_stock")
        const $inputCantidad = d.querySelector(".input_cantidad")
        
        let CONTADOR = 1;


        $inputProducto.addEventListener("keyup",(e)=>{
            while ($datalist.firstChild) {
            $datalist.removeChild($datalist.firstChild);
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
                   $datalist.appendChild(fragment)
                    

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

                    console.log(productosTemporales)
                    const res = await fetch("../api/productos_temporales.php", {method:"POST", body:JSON.stringify(productosTemporales)});
                    const json = await res.json()
                    console.log(json)
                    /* $productoGlobal = json */
                    

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
                    

                } catch (error) {
                    console.log(1)
                    
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
        
        function SumarTotalPrecioProducto(){

        }
        SumarTotalPrecioProducto()

        window.addEventListener("beforeunload", async function (event) {
          try {
            const res = await fetch("../api/metodos_productos_temporales.php", {method:"POST", body:JSON.stringify({methodo:"eliminar_todo"})});
            const json = await res.json()
            console.log(json)
          } catch (error) {
            
          }
        });
    </script>
</body>
</html>