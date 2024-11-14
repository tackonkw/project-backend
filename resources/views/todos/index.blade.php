<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To Do</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
            text-align: center;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .todo-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .todo-card {
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1 1 calc(50% - 20px);
            max-width: calc(50% - 20px);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .todo-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        .todo-card h3 {
            margin: 0;
            font-size: 20px;
            color: #333;
        }
        .todo-card p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }
        .actions {
            margin-top: 10px;
            display: flex;
            gap: 10px;
        }
        .actions a, .actions button {
            font-size: 14px;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .actions a {
            background-color: #007bff;
            color: #fff;
        }
        .actions a:hover {
            background-color: #0056b3;
        }
        .actions button {
            background-color: #dc3545;
            color: #fff;
        }
        .actions button:hover {
            background-color: #b21f2d;
        }
        .alert {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>To-Do List</h1>
    <div class="container">
        
        <a href="{{ route('todos.create') }}" class="btn">Add New To-Do</a>
        @if (session('success'))
            <p class="alert">{{ session('success') }}</p>
        @endif
        <div class="todo-list">
            @foreach ($todos as $todo)
                <div class="todo-card">
                    <h3>{{ $todo->name }}</h3>
                    <p><strong>Description:</strong> {{ $todo->description }}</p>
                    <p><strong>Deadline:</strong> {{ $todo->deadline }}</p>
                    <p><strong>Status:</strong> 
                        <span style="
                            color: {{ $todo->status == 'completed' ? 'green' : ($todo->status == 'outdated' ? 'red' : 'orange') }};
                            font-weight: bold;
                        ">
                            {{ ucfirst($todo->status) }}
                        </span>
                    </p>
                    <div class="actions">
                        <a href="{{ route('todos.edit', $todo) }}">Edit</a>
                        <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
