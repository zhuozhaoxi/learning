<template>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">模块化系统</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li :class="{ 'active':$route.path == '/' }"><a v-link="{path: '/'}">首页</a></li>
					<li :class="{ 'active': $route.path.indexOf('/list') == 0 }"><a v-link="'/list/main'">专题列表</a></li>
					<li :class="{ 'active': $route.path.indexOf('/user') == 0 }"><a v-link="'/user'">个人中心</a></li>
					<li :class="{ 'active': $route.path.indexOf('/manage') == 0 }"><a v-link="'/manage'">系统管理</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><button type="button" class="btn btn-warning navbar-btn" >新建专题</button></li>
					<!-- 未登录时显示 -->
					<!--<li><a href="#">请先登录</a></li>-->
					<!-- 登录后显示 -->
					
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
							欢迎你，游客
						</a>
						<ul class="dropdown-menu">
							<li><a v-link="'/user/main'">个人中心</a></li>
							<li role="separator" class="divider"></li>
							<li><a v-link="'/main/logout'">退出</a></li>
						</ul>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
</template>

<script>
	export default {
		methods: {
			sayHi() {
				alert('hello for vue,es6');
			}
		}
	}
</script>