<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-DO List</title>
</head>
<body>
    <h1>To-Do List</h1>
    @if (count($tasks) > 0)
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    @else
        <p>Tidak ada tugas yang ditambahkan.</p>
    @endif

    <form method="POST" action="/tasks">
    @csrf
        <input type="text" name="name" placeholder="Tambahkan tugas">
        <button type="submit">Tambah</button>
    </form>
</body>
</html>