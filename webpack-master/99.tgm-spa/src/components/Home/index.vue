<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-12 main">
				<Home-Navbar></Home-Navbar>
				
				<!-- 数据展示 -->
				<Data-List-Display v-ref:data-list :special-list="specialList"></Data-List-Display>
				<!--/.row(全部模块展示列表) -->
				<!-- pagination -->
				<Pagination :current="$route.params.page" :total=14 :page-number=5 @change-page="goPage"></Pagination>
			</div>
		</div>
	</div>
</template>

<script>
	import HomeNavbar from './navbar'
	import Pagination from "../Common/pagination";
	import DataListDisplay from "../Common/dataListDisplay";

	export default {
		data() {
			return {
				specialList: []
			}
		}
		,components: {
			HomeNavbar,Pagination,DataListDisplay
		}
		,route: {
			// 这里获取数据
			data({ to: { params: { page }}}){
				$(this.$refs.dataList.$el).fadeOut(500,() => {
					this.specialList = [{Name: '页数'+page,ProduceName: '产品名称'} ];// console.log(page);
				}).fadeIn(500);
			}
		}
		,methods: {
			goPage(pageNum) {
				router.go({name:'home',params: {page: pageNum}})
			}
		}
	}
</script>