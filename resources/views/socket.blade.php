<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.dev.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
</head>
<body>

    <div id="app">
        <h1>Orders List</h1>
        <ul>
            <li v-for="order in orders">@{{ order }}</li>
        </ul>
    </div>

    <script>
        var socket = io('http://127.0.0.1:3000');

        new Vue({
            el: '#app',
            data: {
                orders: []
            },

            created(){
                socket.on('orders-channel:OrderCreated', function (data) {
                    this.orders.push(data.total)
                }.bind(this));
            }
        });
    </script>

</body>
</html>