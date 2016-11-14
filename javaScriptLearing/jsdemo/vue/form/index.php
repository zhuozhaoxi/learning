<!DOCTYPE html>
<html xmlns:v-bind="http://www.w3.org/1999/xhtml">
<head >
	<meta charset="utf-8" />
	<title>vue学习-表单控件</title>
	<script src="../vue.js"></script>
	
</head>
<body>

<!-- Text -->
<h1>Text</h1>
<div id="text">
    <span>Message is: {{ message }}</span>
	<br>
	<input type="text" v-model="message" placeholder="edit me">
</div>

<br /><hr /><br />
<!-- Checkbox -->
<h1>checkbox</h1>
<div id="checkbox">
	<input type="checkbox" @keyup.enter="test" v-model="checked" />
	<!-- :true-value="a" :false-value="b" 值绑定， 选中 checkbox.checked = checkbox.a-->
	<label>{{ checked }}</label>

	<!-- 多选框 -->
	<h2>checkbox group</h2>
	<!-- 如果v-model不加.number，则必要保证checkedNames初始化为数组,加上.number可以将checkedNames自动转化为数组 -->
	<input type="checkbox" id="jack" value="Jack" v-model.number="checkedNames">
	<label for="jack">Jack</label>
	<input type="checkbox" id="john" value="John" v-model.number="checkedNames">
	<label for="john">John</label>
	<input type="checkbox" id="mike" value="Mike" v-model.number="checkedNames">
	<label for="mike">Mike</label>
	<br>
	<span>Checked names: {{ checkedNames | json}}</span>
	<br />
	<span>Checked names: {{ checkedNames }}</span>
</div>

<br /><hr /><br />
<!-- Radio -->
<h1>Radio</h1>
<div id="radio">
	<input type="radio" id="one" value="one" name="radio" v-model="picked" />
	<!-- :value='a'  选中 vm.pick === vm.a -->
	<label for="one">One</label>
	<input type="radio" id="two" value="two" name="radio" v-model="picked" />
	<label for="two">Two</label>
</div>

<br /><hr /><br />
<!-- Select -->
<h1>Select</h1>
<div id="select">
	<select v-model="selected">
		<option selected>A</option>
		<option >B</option>
		<option value="c">C</option>
		<!--关于v-model的值 有value="c" value生效，没有就innerHTML 也就是C -->
	</select>
	Selected:{{ selected }}
	<br />

	<!-- 多选 -->
	<h2>多选</h2>
	<select v-model="selectedgroup" multiple>
	  <option selected>A</option>
	  <option>B</option>
	  <option>C</option>
	</select>
	<br>
	<span>Selected: {{ selectedgroup | json }}</span>
	<br>
	<span>Selected: {{ selectedgroup }}</span>

	<br><br>
	<select v-model="selectedtest">
	  <!-- 对象字面量 -->
	  <option v-bind:value="{ number: 123 }">123</option>
	</select>
	<span>Selected: {{ selectedtest }}</span>
</div>
<script >
	window.onload = function (argument) {
		var text = new Vue({
						el: '#text',
						data: {
							message: ''
						}
					});
		var checkbox = new Vue({
			el: '#checkbox',
			data: {
				checked: false,
				checkedNames: []
			},
			methods:{
				test: function(){
					this.checked = !this.checked;
				}
			}
		});

		var radio = new Vue({
			el: '#radio',
			data: {
				picked: 'two'
			}
		});

		select = new Vue({
			el: "#select",
			data: {
				selected: 'B',
				selectedgroup: [],
				selectedtest: ''
			}
		});
	}
	
</script>
</body>
</html>
<!-- 
	<select v-model="selected">
	  <option v-for="option in options" v-bind:value="option.value">
	    {{ option.text }}
	  </option>
	</select>
	<span>Selected: {{ selected }}</span>

	new Vue({
	  el: '...',
	  data: {
	    selected: 'A',
	    options: [
	      { text: 'One', value: 'A' },
	      { text: 'Two', value: 'B' },
	      { text: 'Three', value: 'C' }
	    ]
	  }
	})
 -->

