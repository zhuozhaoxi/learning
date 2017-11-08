<script>
    var d = {
        el:"#app",
        data:function(){
            return {
                name:"zhuozhaoxi",
                age:"2q1sa"
            }
        }
    }
    module.exports = d;
</script>
<template>
    <div>
        <h1>姓名：{{name}}</h1>
        <h2>{{age}}</h2>
    </div>
</template>
<style>
    body{
        background-color: #098;
    }
    h1{
        background-color: #eee;
        color: red;
        transform: translate(10%, 10%);/*测试自动添加前缀*/
    }
    h1:hover{
        height:100px;
    }
    h2{
        background-color: #999;
    }
</style>