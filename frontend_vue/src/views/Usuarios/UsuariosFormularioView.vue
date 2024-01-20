<template>
  <h1 v-if="id" class="text-4xl font-extrabold">Alterar Usuarios</h1>
  <h1 v-else class="text-4xl font-extrabold">Inserir Usuarios</h1>

  <div class="grid grid-flow-col gap-3 auto-cols-max">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="usuario">
        Usuario
      </label>
      <input required v-model="usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" placeholder="Ex: matheus">
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo-usuario">
        Tipo de usuário*
      </label>
      <select required v-model="tipo_usuario" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  id="tipo-usuario">
        <option value="" disabled selected>Selecione</option>
        <option value="1">Administrador</option>
        <option value="2">Colaborador</option>
      </select>
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

</template>

<script>
import UsuariosDataService from '@/services/UsuariosDataService'
export default {
  name: 'UsuariosFormularioView',
  props: ['id'],
  data() {
    return {
      usuario: null,
      tipo_usuario: null,
      senha: null,
    }
  },
  methods: {
    recuperarUsuarios() {
      if (this.id) {
        UsuariosDataService
          .get(this.id)
          .then((response) => {
            this.usuario = response.data.nome;
            this.tipo_usuario = response.data.tipousuario_id;
          })
      }
    }
  },
  mounted() {
    this.recuperarUsuarios();
  }
}
</script>

<style>

</style>