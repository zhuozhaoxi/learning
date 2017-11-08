<template>
	<div class="top-box">
    	<Navbar></Navbar>
    	<router-view></router-view>
    </div>
</template>

<script>
	
import Navbar from './Navbar'	

export default {
	data () {
		return { msg: 'hello vue' }
	}
	,components: {
		Navbar
	},
	replace: false
}
</script>