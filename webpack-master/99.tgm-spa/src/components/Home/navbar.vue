<template>
	<nav class="navbar navbar-default"  id="app-navbar">
		<div class="navbar-header">
	      <span class="navbar-brand">使用产品<strong class="text-primary">{{ produceNum }}</strong>个</span>
	      <span class="navbar-brand">发布专题<strong class="text-primary">{{ specialNum }}</strong>个</span>
	      <span class="navbar-brand">页面模块<strong class="text-primary">{{ moduleNum }}</strong>个</span>
	      <span class="navbar-brand">页面皮肤<strong class="text-primary">{{ skinNum }}</strong>个</span>
	    </div>
	</nav>
</template>

<script>
	export default {
		props: {
			produceNum: {
				type : Number,
				default: 0
			}
			,specialNum: {
				type : Number,
				default: 0
			}
			,moduleNum: {
				type : Number,
				default: 0
			}
			,skinNum: {
				type : Number,
				default: 0
			}
		}
	}
</script>