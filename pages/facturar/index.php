<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="container">
        <h2>Nueva Factura</h2>
        <main>
            <div class="grid-data-user ">
                <div class="column">
                    <label for="">Cliente<input type="text" name="cliente" id=""></label>
                    <label for="">Vendedor<input type="text" name="Vendedor" id=""></label>
                </div>
                <div class="column">
                    <label for="">Telefono<input type="number" name="Telefono" id=""></label>
                    <label for="">Fecha<input type="date" name="fecha" id=""></label>
                </div>
                <div class="column">
                        <label for="">Email<input type="text" name="email" id=""></label>

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
        btnAddProduct.addEventListener("click",()=>{
            let template = d.querySelector(".template-items");
            let clone = d.importNode(template.content,true);
            let contenedor =  d.querySelector(".tbody-items")
            contenedor.appendChild(clone)
        })
    </script>
</body>
</html>