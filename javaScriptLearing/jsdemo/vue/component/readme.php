组件选项问题

传入 Vue 构造器的多数选项也可以用在 Vue.extend() 中，不过有两个特例： data and el。试想如果我们简单地把一个对象作为 data 选项传给 Vue.extend()：

var data = { a: 1 }
var MyComponent = Vue.extend({
  data: data
})
这么做的问题是 MyComponent 所有的实例将共享同一个 data 对象！这基本不是我们想要的，因此我们应当使用一个函数作为 data 选项，函数返回一个新对象：

var MyComponent = Vue.extend({
  data: function () {
    return { a: 1 }
  }
})
同理，el 选项用在 Vue.extend() 中时也须是一个函数。
.


关于组件
<!-- 可以使用html 的template声明子组件，再用css选择器选择-->3
<template id="child-template">
  <input v-model="msg" @keyup.enter="notify">
  <button @click="notify">Dispatch Event</button>
</template>

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
</script>