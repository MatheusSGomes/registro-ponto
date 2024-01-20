import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import FeriadosView  from '@/views/FeriadosView.vue';
import FeriadosListaView from '@/views/FeriadosListaView.vue';
import FeriadosFormularioView  from '@/views/FeriadosFormularioView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/feriados',
    name: 'Feriados',
    component: FeriadosView,
    children: [
      {
        path: '',
        component: FeriadosListaView
      },
      {
        path: 'inserir',
        component: FeriadosFormularioView,
      },
      {
        path: 'alterar/:id',
        component: FeriadosFormularioView,
        props: true
      },
    ]
  },

  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

console.log(router.getRoutes());

export default router
