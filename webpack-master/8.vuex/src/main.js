import Vue from "vue"
import VueRouter from "vue-router"
import App from "./components/App"
Vue.use(VueRouter);
Vue.config.debug = true;//开启错误提示

const router = new VueRouter({
	history: true,
	saveScrollPosition: true,
	suppressTransitionError: true
})

// 路由
// router.map({
// });
// 路由重定向
// router.redirect({
// 	'/' : '/home/page/1'
// })
router.start(Vue.extend(App), '#app')
window.router = router;
