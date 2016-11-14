<!DOCTYPE html>
<html>
<head>
	<title>混合</title>
	<meta charset="utf-8" />
	<meta name="description" content="混合以一种灵活的方式为组件提供分布复用功能。混合对象可以包含任意的组件选项。当组件使用了混合对象时，混合对象的所有选项将被“混入”组件自己的选项中。">
	<script src="vue.js"></script>
</head>
<body>
<div id="demo"></div>
<script>
	// 钩子函数都会被调用，同名函数会被覆盖
	var myMixin = {
	// 包含任意的组件选项
		created: function () {
			this.hello();
		},
		methods: {
			hello: function () {
				console.log('hello from mixin');
			}
		},
		ready: function(){
			console.log('ready from mixin')
		}
	}

	var Component = Vue.extend({
		mixins: [myMixin],
		methods: {
			hello1: function(){
				console.log('another hello')
			}
		},
		ready: function(){
			console.log('ready from Component');
		}
	});

	var component = new Component({
		el:'#demo',
		methods: {
			hello: function (){
				console.log('hello from myself');
			}
		},
		ready: function(){
			console.log('ready from myself')
			this.hello1();
		}
	});
	
	console.log('-----------------------------华丽的分割线-----------------------------')
	// 也可以全局注册混合。小心使用！
	// 一旦全局注册混合，它会影响所有之后创建的 Vue 实例。如果使用恰当，可以为自定义选项注入处理逻辑：
	// 为 `myOption` 自定义选项注入一个处理器
	Vue.mixin({
	  created: function () {
	    var myOption = this.$options.myOption
	    if (myOption) {
	      console.log(myOption)
	    }
	  }
	})

	new Vue({
	  myOption: 'hello!'
	})
	// -> "hello!"
</script>
</body>
</html>