import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

import ColaboradoresView  from '@/views/Colaboradores/ColaboradoresView.vue';
import ColaboradoresListaView from '@/views/Colaboradores/ColaboradoresListaView.vue';
import ColaboradoresFormularioView  from '@/views/Colaboradores/ColaboradoresFormularioView.vue';

import UsuariosView  from '@/views/Usuarios/UsuariosView.vue';
import UsuariosListaView from '@/views/Usuarios/UsuariosListaView.vue';
import UsuariosFormularioView  from '@/views/Usuarios/UsuariosFormularioView.vue';

import FeriadosView  from '@/views/Feriados/FeriadosView.vue';
import FeriadosListaView from '@/views/Feriados/FeriadosListaView.vue';
import FeriadosFormularioView  from '@/views/Feriados/FeriadosFormularioView.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/colaboradores',
    name: 'colaboradores',
    component: ColaboradoresView,
    children: [
      {
        path: '',
        name: 'colaboradores.lista',
        component: ColaboradoresListaView
      },
      {
        path: 'inserir',
        name: 'colaboradores.inserir',
        component: ColaboradoresFormularioView,
      },
      {
        path: 'alterar/:id',
        name: 'colaboradores.alterar',
        component: ColaboradoresFormularioView,
        props: true
      },
    ]
  },
  {
    path: '/usuarios',
    name: 'usuarios',
    component: UsuariosView,
    children: [
      {
        path: '',
        name: 'usuarios.lista',
        component: UsuariosListaView
      },
      {
        path: 'inserir',
        name: 'usuarios.inserir',
        component: UsuariosFormularioView,
      },
      {
        path: 'alterar/:id',
        name: 'usuarios.alterar',
        component: UsuariosFormularioView,
        props: true
      },
    ]
  },
  {
    path: '/feriados',
    name: 'feriados',
    component: FeriadosView,
    children: [
      {
        path: '',
        name: 'feriados.lista',
        component: FeriadosListaView
      },
      {
        path: 'inserir',
        name: 'feriados.inserir',
        component: FeriadosFormularioView,
      },
      {
        path: 'alterar/:id',
        name: 'feriados.alterar',
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

export default router
