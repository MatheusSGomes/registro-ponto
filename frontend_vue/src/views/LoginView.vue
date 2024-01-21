<template>

<div class="flex flex-col justify-center itens-center">
  <h1 class="text-4xl font-extrabold my-10">Login</h1>

  <div class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" @submit.prevent="submitLogin">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
          Usuário
        </label>
        <input v-model="usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" placeholder="usuario">
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="senha">
          Senha
        </label>
        <input v-model="senha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="senha" type="password" placeholder="*********">
      </div>
      <div class="flex items-center justify-between">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
          Login
        </button>
      </div>
    </form>
  </div>
</div>

</template>

<script>
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
      console.log(this.usuario, this.senha);
    }
  }
}
</script>

<style scoped>

</style>