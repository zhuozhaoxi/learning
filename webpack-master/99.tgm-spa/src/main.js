import Vue from 'vue';
import VueRouter from 'vue-router'
import App from './components/App';
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/css/bootstrap-theme.min.css'
import './assets/styles/system.css'
Vue.config.debug = true;//开启错误提示

Vue.use(VueRouter)

const router = new VueRouter({
	history: true,
	saveScrollPosition: true,
	suppressTransitionError: true
})

router.map({
	'/home/page/:page': {
		name: 'home'
		,component: require('./components/Home/index.vue')
	},
	'/list': {
		name: 'list'
		,component: require('./components/List/index.vue')
		,subRoutes: {
			'/main/:page': {
				component:{
					template: 'Default SubView for Foo'
					,route: {
						activate(transition){
							setTimeout(()=>{
								console.log('activate 2');
								transition.next();
							},2000);
						}
						,data(transition){
							console.log('data 2');	
						}
					}
				},
				name: 'listRoot',
			}
		}
	},
	'/user': {
		name: 'user',
		component: require('./components/User/index.vue')
	},
	'/manage': {
		name: 'manage',
		component: require('./components/Manage/index.vue')
	},
	'*': {
		name: 'notfound',
		component: require('./components/NotFound.vue')
	}
});

router.redirect({
	'/' : '/home/page/1'
})

router.start(Vue.extend(App), '#root')
window.router = router;