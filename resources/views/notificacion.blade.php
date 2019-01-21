<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de activación</title>
</head>
<body>
    <p>Hola  {{ $usuario->nombre_usuario }}! has realizado el pago de tu suscripcion de {{ $usuario->dias_activacion}} días, a continuación describimos las fechas de tu activación:  </p>

    <ul>
        <li>Fecha de activación:  {{ $usuario->fecha_activacion }} </li>
        <li>Fecha de vencimineto de activación:  {{ $usuario->fecha_vencimiento }} </li>
        <li>Cantidad de días de tu activación:  {{ $usuario->dias_activacion}} </li>
    </ul>
    <hr>
    <p>---</p>
    <h4>Saludos Cordiales</h4>
    <h4><strong>Equipo de Geomar Valdez </strong></h4>
</body>
</html>