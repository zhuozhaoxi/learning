<!DOCTYPE html>
<html>
<head>
	<title>vue学习-props</title>
	<meta charset="utf-8">
	<script src="../vue.js"></script>
</head>
<body>
<!-- 静态 -->
<h1>静态</h1>
<div id="prop-example-1" class="demo">
  <child my-msg="hello!"></child>
</div>
<script>
new Vue({
  el: '#prop-example-1',
  components: {
    child: {
      props: ['myMsg'],
      template: '<span>{{ myMsg }}</span>'
    }
  }
});
// 关于html和JavaScript 命名的问题,因为HTML特性不区分大小写
// html中 短横线隔开,如 my-msg
// javascript需要变成驼峰,如 myMsg
</script>

<br /><hr /><br />
<h1>动态</h1>
<div id="prop-example-2" class="demo">
	<input v-model='msg'></input>
	<br />
	<child :my-msg="msg"  ></child>
</div>
<script>
	new Vue({
		el: '#prop-example-2',
		data:{
			msg: ''
		},
		components:{
			child: {
				// props: ['myMsg','test'],
				props: {
					myMsg: ['String','Number'],
					test:{
						type: Number,
						required: false
					}
				},
				template:'<b>{{ myMsg }}</b>'
			}
		}
	});
</script>
<!-- 关于大小写敏感
HTML、CSS 不敏感
JavaScript 敏感
PHP	 变量名、常量名敏感，方法和类名不敏感，魔术常量(__line__ __LINE__ ),null,true,false不敏感 -->
</body>
</html>