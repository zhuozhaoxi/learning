var Vue = require("vue");
//外部引入别的库都可以用这样的方式，比如jquery等。。
//引入我们编写的测试用vue文件。
var app = require("./components/app")
Vue.config.debug = true;//开启错误提示
new Vue(app);