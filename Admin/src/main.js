import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

// import and create pinia
import { createPinia } from 'pinia'

const app = createApp(App)

const pinia = createPinia()
app.use(pinia)

app.use(router)
app.mount('#app')
