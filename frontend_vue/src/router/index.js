import { createRouter, createWebHistory } from 'vue-router'
import RegistroPontoView from '../views/RegistroPontoView.vue';
import LoginView from '@/views/LoginView.vue';

const routes = [
  {
    path: '/',
    name: 'login',
    component: LoginView,
    meta: { needsAuth: false }
  },
  {
    path: '/registro-ponto',
    name: 'registro',
    component: RegistroPontoView,
    meta: { needsAuth: true },
  },
  {
    path: '/colaboradores',
    name: 'colaboradores',
    meta: { needsAuth: true },
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
    meta: { needsAuth: true },
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
    meta: { needsAuth: true },
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
  if (to.meta.needsAuth) {
    const user = localStorage.getItem('access_token');
    const isAdmin = localStorage.getItem('tipo_usuario') == 1;

    // não logado
    if (!user) {
      next('/');
    }

    // logado, não administrador
    if (user && !isAdmin) {
      next('/colaboradores');
    }
  }
  next();
})

export default router
