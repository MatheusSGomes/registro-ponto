<template>
  <h1 v-if="id" class="text-4xl font-extrabold">Alterar Usuarios</h1>
  <h1 v-else class="text-4xl font-extrabold">Inserir Usuarios</h1>

  <form action="" @submit="submitForm">
    <div class="grid grid-flow-col gap-3 auto-cols-max">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="usuario">
          Usuario
        </label>
        <input required v-model="usuario.usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" placeholder="Ex: matheus">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo-usuario">
          Tipo de usuário*
        </label>
        <select required v-model="usuario.tipousuario_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="tipo-usuario">
          <option value="null" disabled selected>Selecione</option>
          <option value="1">Administrador</option>
          <option value="2">Colaborador</option>
        </select>
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo-usuario">
          E-mail*
        </label>
        <input required v-model="usuario.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="email" placeholder="Ex: matheus@gmail.com">
      </div>
      <div class="flex gap-3">
        <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="senha">
          Senha
        </label>
        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="senha" type="password" placeholder="********">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmar-senha">
          Confirmar a senha
        </label>
        <input required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirmar-senha" type="password" placeholder="********">
      </div>
      </div>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Salvar
    </button>
  </form>

</template>

<script>
import UsuariosDataService from '@/services/UsuariosDataService'
export default {
  name: 'UsuariosFormularioView',
  props: ['id'],
  data() {
    return {
      usuario: {
        id: null,
        usuario: null,
        email: null,
        tipousuario_id: null,
        senha: null,
      }
    }
  },
  methods: {
    recuperarUsuarios() {
      if (this.id) {
        UsuariosDataService
          .get(this.id)
          .then((response) => {
            this.usuario = response.data;
          })
      }
    },
    submitForm(e) {
      e.preventDefault();

      const data = {
        usuario: this.usuario.usuario,
        tipousuario_id: this.usuario.tipousuario_id,
        email: this.usuario.email,
        password: this.usuario.senha,
      }

      if (this.id) {
        this.atualizarUsuario(data);
      } else {
        this.salvarUsuario(data);
      }
    },
    salvarUsuario(data) {
      UsuariosDataService
        .create(data)
        .then(() => {
          this.$router.push({ path: '/usuarios' });
        })
    },
    atualizarUsuario(data) {
      UsuariosDataService
        .update(data)
        .then(() => {
          this.$router.push({ path: '/usuarios' });
        })
    },
  },
  mounted() {
    this.recuperarUsuarios();
  }
}
</script>

<style>

</style>