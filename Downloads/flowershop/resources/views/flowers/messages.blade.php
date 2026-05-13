<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header class="navbar">
    <div class="logo">BLOOMA ADMIN</div>

    <nav class="nav-links">
        <a href="/">Client Site</a>
        <a href="/admin">Products</a>
        <a href="/messages">Messages</a>
        <a href="/admin-logout">Logout</a>
    </nav>
</header>

<section class="admin-section">
    <h1>Client Messages</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="error-message">{{ session('error') }}</p>
    @endif

    <div class="messages-grid">
        @forelse($messages as $msg)
            <div class="message-card">
                <h3>{{ $msg->name }}</h3>
                <p class="email">{{ $msg->email }}</p>

                <div class="subject">{{ $msg->subject }}</div>
                <div class="text">{{ $msg->message }}</div>

                <span class="date">{{ $msg->created_at }}</span>

                <form action="{{ route('messages.reply', $msg->id) }}" method="POST" class="reply-form">
                    @csrf
                    <textarea name="reply" placeholder="Write reply to client..." required></textarea>
                    <button type="submit">Send Reply</button>
                </form>
            </div>
        @empty
            <p>No messages yet</p>
        @endforelse
    </div>
</section>

</body>
</html>