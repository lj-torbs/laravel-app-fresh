@props([
    'title' => 'My Laravel App',
])
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head> 
<style>
    body{
        background-color: #17777c;
        color: white;
        font-family: Arial, sans-serif;
    }
    nav{
        background-color:rgba(215, 211, 208, 0.36);
        padding: 10px;
        color:#000000;
        font-weight: bold;
    }
    a{
        padding: 10px;
    }
    </style>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
        <a href="/formtest">Form Test</a>
        <a href="/posts">Posts</a>
        <a href="/user-registration">Register</a>
    </nav>
{{ $slot }}

</body>
</html>