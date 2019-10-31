<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <div>
            <input type="text" :value="currentValue">
            <button @click="currentValue++">+</button>
            <button @click="currentValue--">-</button>
        </div>
        <input-number></input-number>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{ asset('js/v02_2.js') }}"></script>
    <script src="{{ asset('js/v02_1.js') }}"></script>
</body>
</html>
