<template>
	<nav class="text-center">
		<ul class="pagination">
			<li :class="{ disabled:current == 1 }"><a href="#" aria-label="Previous" @click="changePage(1)"><span aria-hidden="true">«</span></a></li>
			<li v-for="page in pageList" track-by="no" :class="{ active: page.current == true }">
				<a href="#" @click="changePage(page.no)" >{{page.no}} <span v-if="page.current == true" class="sr-only">(current)</span> </a>
			</li>
			<li :class="{ disabled:current == total }"><a href="#" aria-label="Next" @click="changePage(total)"><span aria-hidden="true">»</span></a></li>
		</ul>
	</nav>
</template>

<script>
	export default {
		data(){
			return {
				pageList: []
			}
		}
		,props: {
			current: {
				type: Number
				,default: 1
				,coerce(val) {
					return parseInt(val);
				}
				,validator(val){
					return val === val;
				}
			}
			,total: {
				type: Number
				,required: true
			}
			,pageNumber: {
				type: Number
				,default: 10
			}
		}
		,watch: {
			current(newV){
				this.setPageList(newV)
			}
		}
		,methods: {
			changePage(p){
				this.$dispatch('change-page',p);
			},
			setPageList(current){
				var start = this.current - Math.floor((this.pageNumber - 1)/2);
				var end = this.current + Math.ceil((this.pageNumber - 1)/2);
				start = start - (end > this.total ? (end - this.total) : 0);
				start = start >= 1 ? start : 1;
				end = start + this.pageNumber - 1;
				end = end > this.total ? this.total : end;

				var array = [];
				for (var i = start; i <= end; i++) {
					var o = { no: i};
					if (i == current) {
						o['current'] = true;
					};
					array.push(o);
				};
				this.pageList = array;
			}
		},
		ready(){
			this.setPageList(this.current);
		}
	}
</script>