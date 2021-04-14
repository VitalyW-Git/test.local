import * as Vue from 'vue'
import App from "./App.vue"
import Lorem from "./components/admin/mailing/Lorem.vue";


var app = Vue.createApp(App);
window.vm = app.mount('#app')


var lorem = Vue.createApp(Lorem);
window.vm = lorem.mount('#lorem')

// window.app.component('new-component2', NewComponent2)
// Vue.config.productionTip = false

