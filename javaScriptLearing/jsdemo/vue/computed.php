<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习-计算属性</title>
	<script src="vue.js"></script>
	
</head>
<body>
<div id="demo">{{fullName}}</div>

下一个：<a href="10.php">绑定class、style</a>
<script >
	window.onload = function (argument) {
		var vm = new Vue({
			el: '#demo',
			data: {
				firstName: 'Foo',
				lastName: 'Bar'
			},
			// computed: {
			// 	fullName: function () {
			// 		return this.firstName + ' ' + this.lastName;
			// 	}
			// }
			// 计算属性默认只是 getter，不过在需要时你也可以提供一个 setter：
			computed: {
			  fullName: {
			    // getter
			    get: function () {
			      return this.firstName + ' ' + this.lastName
			    },
			    // setter
			    set: function (newValue) {
			      var names = newValue.split(' ')
			      this.firstName = names[0]
			      this.lastName = names[names.length - 1]
			    }
			  }
			}
		})
	}

	// example 只依赖msg， 只有this.msg变化会引起example改变
	var vm2 = new Vue({
	  data: {
	    msg: 'hi'
	  },
	  computed: {
	    example: function () {
	      return Date.now() + this.msg
	    }
	  }
	})
</script>
</body>
</html>

