let tablaStock = document.getElementById('tabla-stock');
let tsBodyRef = tablaStock.getElementsByTagName('tbody')[0];

function initApp(productos) {
    console.log(productos);
    productos?.forEach(obj => {
        producto = new Producto(obj[1], obj[6], obj[2], obj[4], obj[3]);
        producto.id = obj[0];
        console.log(producto);
        tsBodyRef.appendChild(productoToStockRow(producto));
    });
}

function productoToStockRow(producto) {
    var row = document.createElement('tr');
    var props = ['codigo', 'descripcion', 'cantidad', 'precio', 'unidadMedida'];
    props.forEach(prop => {
        console.log(`Producto: ${producto['descripcion']} -> ${prop} = ${producto[prop]}`);
        var cell = document.createElement('td');
        cell.innerText = producto[prop];
        row.appendChild(cell);
    });

    return row;
}

function formToData(formID) {
    return Array.from(document.querySelectorAll(`#${formID} input, #${formID} select, #${formID} textarea`))
        .reduce((acc, input) => ({ ...acc, [input.getAttribute('name')]: input.value }), {});
}

function agregarProducto(idEmpresa) {
    var data = formToData('form-agregarProducto');
    var producto = new Producto(data.nombre, data.cantidad, data.precio, data.medida, data.codigo);

    tsBodyRef.appendChild(productoToStockRow(producto));
    console.log(`Producto: ${producto.descripcion} agregado a la tabla stock y bd`);

    fetch("./php/insertarProductoBD.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `descripcion=${data.nombre}&codigo=${data.codigo}&cantidad=${data.cantidad}&precio=${data.precio}&unidadMedida=${parseInt(data.medida)}&idEmpresa=${idEmpresa}`,
    })
        .then((response) => response.text())
        .then((res) => (console.log(res)));
}

// initApp(productos);