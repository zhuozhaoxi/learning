<!DOCTYPE html>
<html>
<head>
	<title>父子组件间通信 --- $dispatch派发事件，首先在实例上触发它，然后沿着父链向上冒泡在触发一个监听器后停止，除非监听器返回 true。附加参数都会传给监听器回调。</title>
	<script src="../vue.js"></script>
	<meta charset="utf-8" />
</head>
<body>
	<!-- 子组件模板 -->
	<template id="child-template">
	  <input v-model="msg" @keyup.enter="notify">
	  <button @click="notify">Dispatch Event</button>
	</template>
	<!-- 可以使用html 的template声明子组件，再用css选择器选择-->
	
	<div id="parent">
		<p>Message: {{ message | json }}</p>
		<child @child-msg="handleIt"> </child>
	</div>
	<script>
	// 注册子组件
	// 将当前消息派发出去
	Vue.component('child', {
	  template: '#child-template',
	  data: function () {
	    return { msg: 'hello' }
	  },
	  methods: {
	    notify: function () {
	      if (this.msg.trim()) {
	        this.$dispatch('child-msg', this.msg)
	        this.msg = ''
	      }
	    }
	  }
	});

	new Vue({
		el: "#parent",
		data: {
			message: []
		},
		methods: {
			handleIt: function (msg) {
				this.message.push(msg);
			}
		}
	})
	</script>
</body>
</html>
<?php
	
?>