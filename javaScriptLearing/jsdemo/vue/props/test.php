<!-- 如何使用vue异步 -->
<script>
var Vue = require("vue");
var vueResource = require('vue-resource');
var VueAsyncData = require('vue-async-data')
Vue.use(vueResource);
Vue.use(VueAsyncData);

var vm = new Vue({
    el: 'body',
    asyncData: function (resolve, reject) {
        this.$http.get('./someurl', {??}, {
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            },
            emulateJSON: true
        }).then(function(response) {
            var data = response.data;
            resolve({
                msg: data
            });
        }, function(response) {
            // handle error
        });
    },
    data: {
        msg: "hello",
        dom: "body"
    }
});
</script>