<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit To-Do</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit To-Do</h1>
        <form action="{{ route('todos.update', $todo) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Name: <input type="text" name="name" value="{{ $todo->name }}" required></label>
            <label>Description: <textarea name="description">{{ $todo->description }}</textarea></label>
            <label>Deadline: <input type="date" name="deadline" value="{{ $todo->deadline }}" required></label>
            <label>Status:
                <select name="status" required>
                    <option value="ongoing" {{ $todo->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="outdated" {{ $todo->status == 'outdated' ? 'selected' : '' }}>Outdated</option>
                </select>
            </label>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</body>
</html>