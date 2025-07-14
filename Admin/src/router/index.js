import HomeBoard from '@/views/HomeBoard.vue'
import ChatContact from '@/views/page/ChatContact.vue'
import Ecommerce from '@/views/page/Ecommerce.vue'
import UserManage from '@/views/page/UserManage.vue'
import { createRouter, createWebHistory } from 'vue-router'


// Add more routes here when needed
const routes = [
  { path: '/', name: 'Home',component: HomeBoard},
  { path: '/ecommerce', name: 'Ecommerce',component: Ecommerce},
  { path: '/users', name: 'Users',component: UserManage},
  { path: '/chats', name: 'Chats',component: ChatContact},
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
