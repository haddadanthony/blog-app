import Vue from 'vue';
import VueRouter from 'vue-router';
import PostDetails from './components/PostDetails';
import App from '../js/components/App';
import Posts from './components/Posts';

Vue.use(VueRouter);


const Route =  new VueRouter({
    mode: 'history',
    routes: [
        {path: '/', component: Posts},
        {path: '/details/:id', component: PostDetails}
    ]
})

export default Route;