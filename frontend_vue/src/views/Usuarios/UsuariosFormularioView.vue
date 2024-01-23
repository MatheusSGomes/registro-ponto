<template>
  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
    <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">

      <h1 v-if="id" class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Alterar Usuarios
      </h1>

      <h1 v-else class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Inserir Usuarios
      </h1>

      <form @submit="submitForm">
        <div class="grid gap-3 grid-cols-3">
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
            <select required v-model="usuario.tipousuario_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-white focus:outline-none focus:shadow-outline"  id="tipo-usuario">
              <option value="null" disabled selected>Selecione</option>
              <option v-for="tipousuario in tipousuarios" :key="tipousuario.id" :value="tipousuario.id">
                {{ tipousuario.titulo }}
              </option>
            </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tipo-usuario">
              E-mail*
            </label>
            <input required v-model="usuario.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="email" placeholder="Ex: matheus@gmail.com">
          </div>
        </div>
        <div class="grid gap-3 grid-cols-2">
          <div class="mb-4">
          <label class="block text-gray-700 text-sm font-bold mb-2" for="senha">
            Senha
          </label>
          <input v-model="usuario.senha" :required="!usuario.id ? true : false" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="senha" type="password" placeholder="********">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="confirmar-senha">
              Confirmar a senha
            </label>
            <input :required="!usuario.id ? true : false" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="confirmar-senha" type="password" placeholder="********">
          </div>
        </div>
        <button class="mt-7 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
          Salvar
        </button>
      </form>
    </div>
  </section>
</template>

<script>
import TipoUsuarioDataService from '@/services/TipoUsuarioDataService';
import UsuariosDataService from '@/services/UsuariosDataService';
import { toast } from 'vue3-toastify';

export default {
  name: 'UsuariosFormularioView',
  props: ['id'],
  data() {
    return {
      tipousuarios: [],
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
    preencheTipoUsuarios() {
      TipoUsuarioDataService
        .getAll()
        .then(response => {
          this.tipousuarios = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    recuperarUsuarios() {
      if (this.id) {
        UsuariosDataService
          .get(this.id)
          .then((response) => {
            this.usuario = response.data;
          })
          .catch((error) => {
            toast(error.message, { });
          });
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
        .catch((error) => {
          toast(error.message, { });
        });
    },
    atualizarUsuario(data) {
      UsuariosDataService
        .update(this.id, data)
        .then(() => {
          this.$router.push({ path: '/usuarios' });
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
  },
  mounted() {
    this.recuperarUsuarios();
    this.preencheTipoUsuarios();
  }
}
</script>

<style>

</style>