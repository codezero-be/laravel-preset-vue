import Vue from 'vue'
import axios from 'axios'

window.Vue = Vue
window.axios = axios

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content

window.app = new Vue({
    el: '#app'
})
