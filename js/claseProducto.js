class Producto {
    static _id;
    static _descripcion;
    static _cantidad;
    static _precio;
    static _unidadMedida;
    static _codigo;

    constructor(descripcion, cantidad, precio, unidadMedida, codigo) {
        this.descripcion = descripcion;
        this.cantidad = cantidad;
        this.precio = precio;
        this.unidadMedida = unidadMedida;
        this.codigo = codigo;
    }

    get id() {
        return this._id;
    }
    set id(id){
        this._id = id;
    }

    get descripcion() {
        return this._descripcion;
    }
    set descripcion(descripcion){
        this._descripcion = descripcion;
    }

    get cantidad() {
        return this._cantidad;
    }
    set cantidad(cantidad){
        this._cantidad = cantidad;
    }

    get precio() {
        return this._precio;
    }
    set precio(precio){
        this._precio = precio;
    }

    get unidadMedida() {
        return this._unidadMedida;
    }
    set unidadMedida(unidadMedida){
        this._unidadMedida = unidadMedida;
    }

    get codigo() {
        return this._codigo;
    }
    set codigo(codigo){
        this._codigo = codigo;
    }
}