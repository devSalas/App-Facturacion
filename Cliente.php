<?php
class Cliente {
    private $id;
    private $nombre;
    private $direccion;
    private $contacto;
    private $historialCompras = [];

    public function __construct($id, $nombre, $direccion, $contacto) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->contacto = $contacto;
    }

    public function registrarCompra($factura) {
        // Registra la compra en el historial del cliente
        $this->historialCompras[] = $factura;
    }

    public function pagarCuenta($monto) {
        // Realiza el pago de una factura pendiente
        // Puedes implementar más lógica aquí, como gestionar cuentas por cobrar.
    }
}

?>