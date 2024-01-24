<template>

  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
    <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
      <h1 class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Login
      </h1>

      <p class="my-6 text-3xl font-normal text-gray-500">Registro de ponto</p>

      <div class="w-full max-w-xs mx-auto">
        <form class="bg-white shadow-md rounded-2xl px-8 pt-6 pb-8 mb-4" @submit.prevent="submitLogin">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              Usuário
            </label>
            <input v-model="usuario" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" placeholder="Usuário">
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="senha">
              Senha
            </label>
            <input v-model="senha" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="senha" type="password" placeholder="*********">
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
import LoginDataService from '@/services/LoginDataService';
import { toast } from 'vue3-toastify';

export default {
  name: 'LoginView',
  data() {
    return {
      usuario: null,
      senha: null
    }
  },
  methods: {
    submitLogin() {
      const data = {
        usuario: this.usuario,
        password: this.senha
      }

      LoginDataService
        .login(data)
        .then(response => {
          localStorage.setItem('access_token', response.data.token);
          localStorage.setItem('tipo_usuario', response.data.tipo_usuario);
          this.$router.push({ path: '/colaboradores' });
        }).catch((error) => {
          toast(error.message, { });
        });
    }
  }
}
</script>

<style scoped>

</style>