<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
    <p>Congrats you're logged in</p>
    <form action="/logout" method="POST">
    @csrf
        <button>Log out</button>
    </form>
    <div style="border: 3px solid black">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Post title">
            <textarea name="body" placeholder="Body content ..."></textarea>
            <button>Create new post</button>
        </form>
    </div>
        <div style="border: 3px solid black">
        <h2>All posts</h2>
        {{-- The $posts comes from web.php --}}
            @foreach($posts as $post)
            <div style="background-color: gray; padding: 10px; margin: 10px;">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                {{$post['body']}}
                <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Delete</button>
                </form>
            </div>
            @endforeach
    </div>
    @else
    <div style="border: 3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input name='name' type="text" placeholder="name">
            <input name='email' type="text" placeholder="email">
            <input name='password' type="password" placeholder="password">
            <button>Register</button>
        </form>
    </div>

    <div style="border: 3px solid black">
        <h2>Login</h2>
        <form action="/login" method="POST">
            @csrf
            <input name='loginName' type="text" placeholder="name">
            <input name='loginPassword' type="password" placeholder="password">
            <button>Log in</button>
        </form>
    </div>
    @endauth

</body>
</html>