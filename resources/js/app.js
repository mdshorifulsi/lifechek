import Vue from 'vue'
require('./bootstrap');
import VueRouter from 'vue-router'
Vue.use(VueRouter)


// window.Reload =new Vue();


//routes  start
import {routes} from './routes'
//routes end

const router=new VueRouter({

    routes,
    mode:'history'

})



const app = new Vue({
    el: '#app',
    router
});
