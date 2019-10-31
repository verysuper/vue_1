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
    <div id="app1">
        <button @click="handleClick">加1</button>
        <p><input type="text" :value="date|formatDate" v-if="show"></p>
    </div>
    <div id="app2">
        <div :style="styles">
            @{{ currentText }}
        </div>
    </div>
    <div id="app">
        <table border="">
            <thead>
            <tr>
                <th></th>
                <th>name</th>
                <th>price</th>
                <th>count</th>
                <th>action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in list">
                <td>@{{ index }}</td>
                <td>@{{ item.name }}</td>
                <td>@{{ item.price }}</td>
                <td>
                    <button @click="handleReduce(index)" :disabled="item.count === 1">-</button>
                    @{{ item.count }}
                    <button @click="handleAdd(index)">+</button>
                </td>
                <td><button @click="handleRemove(index)">移除</button></td>
            </tr>
            </tbody>
        </table>
        <div>總價:$ @{{ totalPrice }}</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el:"#app",
            data:{
                list:[
                    {
                        id:1,
                        name:'iphone',
                        price:6000,
                        count:1
                    },{
                        id:2,
                        name:'ipad',
                        price:2000,
                        count:2
                    },{
                        id:3,
                        name:'macbook',
                        price:18888,
                        count:1
                    }
                ]
            },
            computed:{
                totalPrice:function () {
                    var total = 0;
                    for(var i=0;i<this.list.length;i++){
                        var item = this.list[i];
                        total += item.price * item.count;
                    }
                    return total.toString().replace(/\B(?=(\d{3})+$)/g,',');
                }
            },
            methods:{
                handleReduce:function(index){
                    if (this.list[index].count === 1) { return }
                    this.list[index].count --
                },
                handleAdd:function(index){
                    this.list[index].count ++
                },
                handleRemove:function(index){
                    this.list.splice(index,1)
                }
            }
        });

        var padDate = function (value) {
            return value<10?'0'+value:value;
        };
        var app1 = new Vue({
            el:"#app1",
            data:{
                date:new Date(),
                show:true,
                counter : 0,
            },
            filters:{
                formatDate:function (value) {
                    var date = new Date(value);
                    var year = date.getFullYear();
                    var month = padDate(date.getMonth() + 1);
                    var day = padDate(date.getDate());
                    var hours = padDate(date.getHours());
                    var minutes = padDate(date.getMinutes());
                    var seconds = padDate(date.getSeconds());
                    return year + '-' + month + '-' + day + '-' + hours + '-' + minutes + '-' + seconds;
                }
            },
            mounted:function () {
                this.timer = setInterval(()=>{
                    this.date = new Date()
                },1000)
            },
            beforeDestroy:function () {
                if(this.timer){
                    clearInterval(this.timer);
                }
            },
            methods:{
                handleClick:function () {
                    this.show = this.show === true ? false : true;
                    this.counter++;
                }
            }
        });
        var app2 = new Vue({
            el:'#app2',
            data:{
                styles:{
                    color:'red',
                    fontSize:50 + 'px'
                }
            },
            computed:{
                currentText:function(){
                    return app1.counter; // 計算屬性可依賴其他實例數據
                }
            }
        })
    </script>
</body>
</html>
