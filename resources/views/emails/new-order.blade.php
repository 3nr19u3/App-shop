<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo pedido</title>
</head>
<body>
    <p>Ud. ha realizado un nuevo pedido!</p>
    <p>Estos son los datos del cliente que realizo el pedido:</p>
    <ul>
        <li>
        <strong>Nombre:</strong>
            {{ $user->name }}
        </li>
        <li>
        <strong>Email:</strong>
            {{ $user->email }}
        </li>
        <li>
        <strong>Fecha de pedido:</strong>
            {{ $cart->order_date }}
        </li>
    </ul>
        <hr>
    <p>Detalles del pedido:</p>
            <ul>
                @foreach($cart->details as $detail)
                <li>
                    {{ $detail->product->name }} x {{ $detail->quantity }}
                    (S/. {{ $detail->quantity * $detail->product->price }})
                </li>
                @endforeach            
            </ul>
                <p>
                    <strong>Importe a pagar: </strong>{{$cart->total}}
                </p>
        <hr>
    <p>
    <a href="{{ url('/admin/order/'.$cart->id) }}">Haz click aqui para ver mnas informacion sobre este pedido</a>
    </p>
</body>
</html>