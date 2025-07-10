import HomeBoard from '@/views/HomeBoard.vue'
import Ecommerce from '@/views/page/Ecommerce.vue'
import { createRouter, createWebHistory } from 'vue-router'


// Add more routes here when needed
const routes = [
  { path: '/', name: 'Home',component: HomeBoard},
  { path: '/ecommerce', name: 'Ecommerce',component: Ecommerce}
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
