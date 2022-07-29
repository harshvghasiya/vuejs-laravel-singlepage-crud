import { createRouter, createWebHistory } from 'vue-router'
import HomeComponent from '../components/HomeComponent.vue'
import UserComponent from '../components/UserComponent.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    redirect: "/user",
    component: HomeComponent
  },
  {
    path: '/user',
    name: 'user',
    // redirect: "/contact",
    component: UserComponent
  }
  
  
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
