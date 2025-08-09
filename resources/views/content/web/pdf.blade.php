<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pedido #{{ $pedidos->id }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Detalle del Pedido #{{ $pedidos->id }}</h2>
    <p><strong>Fecha:</strong> {{ $pedidos->fecha_pedido }}</p>
    <p><strong>Razón Social:</strong> {{ $pedidos->razon_social }}</p>
    <p><strong>Código Cliente:</strong> {{ $pedidos->codigo_cliente }}</p>
    <p><strong>Localidad:</strong> {{ $pedidos->localidad }}</p>
    <p><strong>Horario:</strong> {{ $pedidos->horario }}</p>
    <p><strong>Condiciones de Pago:</strong> {{ $pedidos->condiciones_pago }}</p>
    <p><strong>Observaciones:</strong> {{ $pedidos->observaciones }}</p>

    <h3>Productos</h3>
    <table>
        <thead> 
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos->productos as $producto)
                <tr>
                    <td>{{ $producto->producto_nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>