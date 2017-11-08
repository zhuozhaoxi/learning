<template>
	here is list,{{ msg }}
	<router-view></router-view>
</template>

<script>
export default {
	data(){
		return {
			msg: 'default'
		}
	}
	,route: {
		activate(transition){
			setTimeout(()=>{
				console.log('activate 1');
				transition.next();
			},2000);
		}
		//this.$loadingRouteData 初始值为true 会在data的切换钩子函数断定后，变成false，利用这个特性，可用来为切换进来的组件展示加载效果
		,data(transition){
			console.log('data 1'+this.$loadingRouteData);	
			transition.next({msg: 'hello11'});
			setTimeout(()=>{
				console.log('data 1'+this.$loadingRouteData);
			},3000)
		}
	}
}
</script>