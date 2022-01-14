import { createRouter, createWebHashHistory } from 'vue-router'

import List from '../views/List.vue'
import Edit from '../views/Edit.vue'

const routes = [
  {
    path: '/',
    name:'lista',
    component: List
  },
  {
    path:'/editar/:id',
    name:'editar',
    component: Edit
  },

]

const router = createRouter({
  history: createWebHashHistory(),
  routes
})

export default router
