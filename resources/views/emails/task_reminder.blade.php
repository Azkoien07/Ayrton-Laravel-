
<!DOCTYPE html>
<html>
<head>
    <title>Recordatorio de Tarea</title>
</head>
<body>
    <h1>¡Hola, {{ $task->user->name }}!</h1>
    <p>Tienes un recordatorio de la tarea: <strong>{{ $task->name }}</strong></p>
    <p>Descripción: {{ $task->description }}</p>
    <p>Fecha de vencimiento: {{ \Carbon\Carbon::parse($task->f_expiration)->format('d/m/Y H:i') }}</p>
    <p><a href="{{ url('/tasks/' . $task->id) }}">Ver Tarea</a></p>
    <p>¡No olvides completarla!</p>
</body>
</html>
