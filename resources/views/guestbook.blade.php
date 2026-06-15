<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Database App</title>
    <style>
        body { font-family: sans-serif; background: #fafafa; padding: 40px; }
        .box { background: white; max-width: 500px; margin: 0 auto 20px auto; padding: 20px; border-radius: 8px; border: 1px solid #ddd; }
        input, textarea { width: 95%; padding: 8px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; resize: none;}
        button { background: #059669; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; width: 100%; }
        .entry { background: #f3f4f6; padding: 12px; margin-top: 10px; border-radius: 6px; border-left: 4px solid #059669; }
    </style>
</head>
<body>

    
    <div class="box">
    @if(session('success'))
    <div style="background-color: #d1e7dd; color: #0f5132; border: 1px solid #badbcc; padding: 12px; border-radius: 5px; margin-bottom: 20px; font-weight: bold;">
        System Notice: {{ session('success') }}
    </div>
    @endif
        <h2> Leave a Message (CRUD App Project)</h2>
        <form action="/guestbook/save" method="POST">
            @csrf <input type="text" name="name" placeholder="Your Name" required>
            <textarea name="message" placeholder="Write your message here..." required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <div class="box">
        <h3>Recent Messages:</h3>
        @if($entries->isEmpty())
            <p style="color: #666;">No messages yet. Be the first!</p>
        @else
            @foreach($entries as $item)
    <div class="entry" style="margin-bottom: 20px; padding: 15px; border-bottom: 1px solid #eee; clear: both;">
        <strong>{{ $item->name }}</strong> says:
        <p style="margin: 5px 0 5px 0; word-wrap: break-word;">{{ $item->Message }}</p>
        <small style="display: block; color: #999; margin-bottom: 12px;">{{ $item->created_at->diffForHumans() }}</small>
        
        <div style="display: flex; gap: 8px; align-items: center; margin-top: 10px;">
            
            <a href="/guestbook/{{ $item->id }}/edit" style="background-color: #007bff; color: white; text-decoration: none; padding: 6px 16px; border-radius: 4px; font-size: 14px; font-weight: 500; display: inline-block; line-height: 1.5;">
                Edit
            </a>

            <form action="/guestbook/{{ $item->id }}" method="POST" style="margin: 0; padding: 0; display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this message?')" style="background-color: #dc3545; color: white; border: none; padding: 6px 16px; cursor: pointer; border-radius: 4px; font-size: 14px; font-weight: 500; line-height: 1.5; width: auto !important; display: inline-block;">
                    Delete
                </button>
            </form>

        </div>
    </div>
@endforeach
        @endif
    </div>

</body>
</html>