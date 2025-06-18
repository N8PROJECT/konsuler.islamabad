<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Application')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="max-w-4xl mx-auto p-4">
        @yield('content')
    </div>
</body>
</html>