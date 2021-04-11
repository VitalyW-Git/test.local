import Vue from 'vue'

import NewComponent from "@/components/NewComponent"
import NewComponent2 from "@/components/NewComponent2"

window.Vue = Vue
window.Vue.component(
    'new-component', NewComponent
)
window.Vue.component(
    'new-component2', NewComponent2
)

// Vue.config.productionTip = false

