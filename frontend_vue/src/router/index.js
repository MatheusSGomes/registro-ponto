import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue';
import LoginView from '@/views/LoginView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  },
  {
    path: '/colaboradores',
    name: 'colaboradores',
    component: () => import(/* webpackChunkName: "ColaboradoresView" */ '@/views/Colaboradores/ColaboradoresView.vue'),
    children: [
      {
        path: '',
        name: 'colaboradores.lista',
        component: () => import(/* webpackChunkName: "ColaboradoresListaView" */ '@/views/Colaboradores/ColaboradoresListaView.vue')
      },
      {
        path: 'inserir',
        name: 'colaboradores.inserir',
        component: () => import(/* webpackChunkName: "ColaboradoresFormularioView" */ '@/views/Colaboradores/ColaboradoresFormularioView.vue'),
      },
      {
        path: 'alterar/:id',
        name: 'colaboradores.alterar',
        component: () => import(/* webpackChunkName: "ColaboradoresFormularioView" */ '@/views/Colaboradores/ColaboradoresFormularioView.vue'),
        props: true
      },
    ]
  },
  {
    path: '/usuarios',
    name: 'usuarios',
    component: () => import(/* webpackChunkName: "UsuariosView" */ '@/views/Usuarios/UsuariosView.vue'),
    children: [
      {
        path: '',
        name: 'usuarios.lista',
        component: () => import(/* webpackChunkName: "UsuariosListaView" */ '@/views/Usuarios/UsuariosListaView.vue'),
      },
      {
        path: 'inserir',
        name: 'usuarios.inserir',
        component: () => import(/* webpackChunkName: "UsuariosListaView" */ '@/views/Usuarios/UsuariosFormularioView.vue'),
      },
      {
        path: 'alterar/:id',
        name: 'usuarios.alterar',
        component: () => import(/* webpackChunkName: "UsuariosListaView" */ '@/views/Usuarios/UsuariosFormularioView.vue'),
        props: true
      },
    ]
  },
  {
    path: '/feriados',
    name: 'feriados',
    component: () => import(/* webpackChunkName: "FeriadosView" */ '@/views/Feriados/FeriadosView.vue'),
    children: [
      {
        path: '',
        name: 'feriados.lista',
        component: () => import(/* webpackChunkName: "FeriadosListaView" */ '@/views/Feriados/FeriadosListaView.vue'),
      },
      {
        path: 'inserir',
        name: 'feriados.inserir',
        component: () => import(/* webpackChunkName: "FeriadosFormularioView" */ '@/views/Feriados/FeriadosFormularioView.vue'),
      },
      {
        path: 'alterar/:id',
        name: 'feriados.alterar',
        component: () => import(/* webpackChunkName: "FeriadosFormularioView" */ '@/views/Feriados/FeriadosFormularioView.vue'),
        props: true
      },
    ]
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  next();
  // explicitly return false to cancel the navigation
  // return false
})

export default router
