<!DOCTYPE html>
<html>
<head>
	<title>v-link 属性详解</title>
	<meta charset="utf-8">
</head>
<body>
	<b>链接活跃时的 class</b>
	<!-- 带有 v-link 指令的元素，如果 v-link 对应的 URL 匹配当前的路径，该元素会被添加特定的 class。
	默认添加的 class 是 .v-link-active(可以通过路由配置修改)，而判断是否活跃使用的是包含性匹配。
	举例来说，一个带有指令 v-link="/a" 的元素，只要当前路径以 /a 开头，此元素即会被判断为活跃。 -->

	<!-- 连接是否活跃的匹配也可以通过 exact 内联选项来设置为只有当路径完全一致时才匹配： -->
	<a v-link="{ path: '/a', exact: true }"></a>

	<!-- 链接活跃时的 class 名称可以通过在创建路由器实例时指定 linkActiveClass 全局选项 来自定义，也可以通过 activeClass 内联选项来单独指定： -->
	<a v-link="{ path: '/a', activeClass: 'custom-active-class' }"></a>


	<b>其他选项</b>
	<p>replace</p>
	<!-- 一个带有 replace: true 的链接被点击时将会触发 router.replace() 而不是 router.go()。由此产生的跳转不会留下历史记录： -->
	<a v-link="{ path: '/abc', replace: true }"></a>

	<p>append</p>
	<!-- 带有 append: true 选项的相对路径链接会确保该相对路径始终添加到当前路径之后。举例来说，从 /a 跳转到相对路径 b 时，如果没有 append: true 我们会跳转到 /b，但有 append: true 则会跳转到 /a/b。 -->
	<a v-link="{ path: 'relative/path', append: true }"></a>


	<b>其他注意点</b>

	<p>v-link 会自动设置 <a> 的 href 属性。</p>

	<p>根据Vue.js 1.0 binding syntax， v-link 不再支持包含 mustache 标签。可以用常规的JavaScript表达式代替 mustache 标签， 例如 v-link="'user/' + user.name" 。</p>
</body>
</html>