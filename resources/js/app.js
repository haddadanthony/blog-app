import Vue from 'vue';
import App from '@/js/components/App';
import Route from '@/js/router.js';


require('./bootstrap');




const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router: Route
    // render: h => h(App)
});

export default app;
