<!DOCTYPE html>
<html>
<head >
	<meta charset="utf-8" />
	<title>vue学习</title>
	<script src="vue.js"></script>
</head>
<body>

<div id="app">
    <select-components :select-data='loopContent' select-id='select1'></select-components>
</div>

<script >
	window.onload = function (argument) {
		new Vue({
		    el: '#app',
		    data: {
		        loopContent: [{value:'1',text:'一'},{value:'2',text:'二'}],
		    },
		    components: {
		    	'select-components' : {
		    		props: ['selectData','selectId'],
		    		template: "<select :id='selectId'><template v-for='item in selectData'><option>{{ item.text }}</option></template></select>"
		    	}
		    }
		});
	}
	console.log(encodeURI('天天炫斗'));
</script>
</body>
</html>

