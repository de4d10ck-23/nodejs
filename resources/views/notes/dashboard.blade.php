<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            display: flex;
            justify-content: center;
        }
        .main-container {
            width: 100%;
            max-width: 1200px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        .header h1 {
            color: #333;
        }
        .logout-btn {
            background: #e74c3c;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .logout-btn:hover {
            background: #c0392b;
        }
        .logout-btn form {
            margin: 0;
        }
        .add-note-section {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2rem;
            max-width: 600px;
        }
        .add-note-section h2 {
            margin-bottom: 1.5rem;
            color: #333;
        }
        .add-note-section form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        input[type="text"], textarea {
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            font-family: Arial, sans-serif;
        }
        input[type="text"]:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .add-note-section button {
            padding: 0.75rem;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }
        .add-note-section button:hover {
            background: #5568d3;
        }
        .notes-container {
            display: block;
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        .note-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
        }
        .note-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .note-card h2 {
            color: #333;
            margin-bottom: 0.5rem;
            word-break: break-word;
        }
        .note-card p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1rem;
            word-break: break-word;
        }
        .note-actions {
            display: flex;
            gap: 0.5rem;
        }
        .edit-link {
            flex: 1;
            padding: 0.5rem;
            background: #3498db;
            color: white;
            text-align: center;
            border-radius: 4px;
            text-decoration: none;
            transition: background 0.3s;
        }
        .edit-link:hover {
            background: #2980b9;
        }
        .delete-form {
            flex: 1;
        }
        .delete-btn {
            width: 100%;
            padding: 0.5rem;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .delete-btn:hover {
            background: #c0392b;
        }
        .empty-message {
            text-align: center;
            color: #999;
            padding: 2rem;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="main-container">

        <div class="add-note-section">
            <h2>Add New Note</h2>
            <form action="{{ route('addNote') }}" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Note Title" required>
                <textarea name="content" placeholder="Note Content" required></textarea>
                <button type="submit">Add Note</button>
            </form>
        </div>

        @if($notes->count())
            <div class="notes-container">
                @foreach($notes as $note) 
                    <div class="note-card">
                        <h2>{{ $note->title }}</h2>
                        <p>{{ $note->content }}</p>
                        <div class="note-actions">
                            <a href="{{ route('editNote', $note->id) }}" class="edit-link">Edit</a>
                            <form action="{{ route('deleteNote', $note->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        @else
            <div class="empty-message">
                <p>No notes yet. Create your first note!</p>
            </div>
        @endif
    </div>
</body>
</html>