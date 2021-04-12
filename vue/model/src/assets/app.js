import * as Vue from 'vue'
import App from "./App.vue"

var app = Vue.createApp(App);

window.vm = app.mount('#app')
// window.app.component('new-component2', NewComponent2)

// Vue.config.productionTip = false

