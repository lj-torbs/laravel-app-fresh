@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            background-color: #1c3056;
            color: white;
            font-family: Arial, sans-serif;
            /* Ensures the body takes up the full screen height */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        nav {
            background-color: rgb(252, 248, 242);
            padding: 10px;
            color: #000000;
            font-weight: bold;
            /* Keeps nav at the top */
            width: 100%;
        }
        nav a {
            padding: 10px;
            color: #000000;
            text-decoration: none;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head> 
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/formtest">Form Test</a>
        <a href="/posts">Posts</a>
        <a href="/register">Register</a>
        <a href="/users">View Users</a>
    </nav>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="w-full flex justify-center">
            {{ $slot }}
        </div>
    </main>

</body>
</html>