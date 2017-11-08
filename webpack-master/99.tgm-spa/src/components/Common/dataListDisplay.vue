<template>
	<div class="row">
		<template v-if="specialList.length > 0">
			<div class="col-md-6 col-md-2" v-for="special in specialList">
				<div class="thumbnail">
					<img :src="special.Pic" alt="...">
					<div class="caption">
						<h3>{{ special.Name }}</h3>
						<p>{{ special.ProduceName }}</p>
					</div>
				</div>
			</div>
		</template>
		<template v-else>
			<span>暂无数据</span>
		</template>
	</div>
</template>

<script>
	export default {
		props: ['specialList']
	}
</script>