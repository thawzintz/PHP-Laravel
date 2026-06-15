<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit your message</title>
<style>
        body { font-family: sans-serif; background: #f4f6f9; padding: 40px; color: #333; }
        .edit-container { max-width: 500px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 120px; resize: vertical; }
        .btn-update { background-color: #007bff; color: white; border: none; padding: 10px 15px; cursor: pointer; border-radius: 4px; font-size: 16px; }
        .btn-update:hover { background-color: #0056b3; }
        .btn-cancel { color: #666; text-decoration: none; margin-left: 15px; font-size: 14px; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="edit-container">
    <h2>Edit Your Message</h2>
    
    <form action="/guestbook/{{ $guest->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $guest->name }}" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required>{{ $guest->Message ?? $guest->message }}</textarea>
        </div>

        <button type="submit" class="btn-update">Update</button>
        <a href="/guestbook" class="btn-cancel">Cancel</a>
    </form>
</div>
</body>
</html>