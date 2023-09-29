<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="facturacion.css">
</head>

<body>
    <div class="container">
        <h2>Nueva Factura</h2>
        <main>
            <div class="grid-data-user ">
                <div class="column">
                    <label for="">Producto<input class="input_producto " type="text" name="productos" list="productos"></label>
                    <datalist id="productos">

                    </datalist>

                    <label for="">Descripcion<input class="input_descripcion" type="text" name="descripcion" id=""></label>
                </div>
                <div class="column">
                    <label for="">Precio<input class="input_precio" type="number" name="precio" id=""></label>
                    <label for="">Stock<input class="input_stock" type="number" name="stock" id=""></label>
                </div>
                <div class="column">
                        <label for="">cantidad<input type="text" class="input_cantidad" name="number" id=""></label>

                    <label for="pagos"> pago:
                        <select name="pagos" id="pagos">
                            <option value="efectivo">Efectivo</option>
                            <option value="credito">credito</option>
                        </select>
                    </label>
                </div>
            </div>
        </main>

        <div class="nav">
            <span class="btn">Eliminar</span>
            <span class="btn">Nuevo Producto</span>
            <span class="btn">nuevo Cliente</span>
            <span class="btn agregarProducto">Agregar Productos</span>
            <span class="btn">imprimir</span>
        </div>

        <table border="1" class="table-product" >
            <thead>
                <th>eliminar</th>
                <th>Codigo</th>
                <th>Cant.</th>
                <th>Description</th>
                <th>Precio unit.</th>
                <th>Precio Total</th>
            </thead>
            <tbody class="tbody-items">
                <tr>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path></svg></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>

                <template class="template-items"> 
                <tr>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M6 7H5v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7H6zm10.618-3L15 2H9L7.382 4H3v2h18V4z"></path></svg></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                </tr>
                </template>
            </tbody>
        </table>
    </div>


    <script>
        const d = document;
        const btnAddProduct= d.querySelector(".agregarProducto");
        const tbodyItems= d.querySelector(".tbody-items");
        let $productoGlobal="";


        btnAddProduct.addEventListener("click",()=>{
            let template = d.querySelector(".template-items");
            let clone = d.importNode(template.content,true);
            let contenedor =  d.querySelector(".tbody-items")
            contenedor.appendChild(clone)
        })


        const $inputProducto = d.querySelector(".input_producto")
        const $datalist = d.querySelector("datalist")
        const $inputDescripcion = d.querySelector(".input_descripcion")
        const $inputPrecio = d.querySelector(".input_precio")
        const $inputStock = d.querySelector(".input_stock")
        const $inputCantidad = d.querySelector(".input_cantidad")
        


        $inputProducto.addEventListener("keyup",(e)=>{
            while ($datalist.firstChild) {
            $datalist.removeChild($datalist.firstChild);
            }
            $productoGlobal="";

            e.preventDefault();
            
            async function getData(){
                try {
                    const res = await fetch("../api/index.php", {method:"POST", body:JSON.stringify({descripcion:e.target.value})});
                    const json = await res.json()
                    console.log(json)
                    $productoGlobal = json

                    const fragment = document.createDocumentFragment();
                   
                    json.forEach(producto => {
                        const optionElement = d.createElement("option")
                        optionElement.textContent = producto.descripcion
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
            console.log(selectedValue) 
            console.log($productoGlobal) 
            const elementFound =  $productoGlobal.find(({descripcion})=>descripcion.toLowerCase() == selectedValue.toLowerCase())
            
        

        });

      /*   const $options = d.querySelectorAll("option")
        console.log($options)
        $options.forEach(el=>{

            console.log(el)
        
        }) */
        
      /*   $datalist.addEventListener("onchange",(e)=>{
            console.log(e.target.value)
        }) */



    </script>
</body>
</html>