<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Snoopy Store - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header style="background: lightcoral; padding: 20px;">
        <h1>Snooyp 電商練習中</h1>
    </header>
    <div class="container" style="padding: 50px; border: 2px dashed lightgray;">
        @yield('content') {{-- 這裡會填入各頁面的內容 --}}
    </div>
</body>

</html>