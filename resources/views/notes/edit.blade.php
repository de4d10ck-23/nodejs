<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Note</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            padding: 2rem;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            margin-bottom: 2rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        label {
            color: #555;
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }
        input, textarea {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            font-family: Arial, sans-serif;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        textarea {
            resize: vertical;
            min-height: 200px;
        }
        button {
            padding: 0.75rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #5568d3;
        }
        .back-link {
            display: inline-block;
            margin-top: 1rem;
            color: #667eea;
            text-decoration: none;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #5568d3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Note</h1>
        <form action="{{ route('updateNote', $note->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="{{ $note->title }}" required>
            </div>
            
            <div>
                <label for="content">Content:</label>
                <textarea id="content" name="content" required>{{ $note->content }}</textarea>
            </div>
            
            <button type="submit">Update Note</button>
        </form>
        
        <a href="{{ route('dashboard') }}" class="back-link">Back to Dashboard</a>
    </div>
</body>
</html>
