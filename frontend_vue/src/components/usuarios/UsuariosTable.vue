<template>
  <table class="mt-7 table-auto mx-auto">
    <thead>
      <tr>
        <th class="px-4 py-2">#</th>
        <th class="px-4 py-2">Usuário</th>
        <th class="px-4 py-2">E-mail</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="usuario in usuarios" :key="usuario.id">
        <td class="border px-4 py-2">{{ usuario.id }}</td>
        <td class="border px-4 py-2">{{ usuario.usuario }}</td>
        <td class="border px-4 py-2">{{ usuario.email }}</td>
        <td class="border px-4 py-2">
          <div class="flex items-center justify-center">
            <router-link :to="{ name: 'usuarios.alterar', params: { id: usuario.id } }">
              <img alt="" class="w-12 block" src="@/assets/icons/edit.svg" />
            </router-link>
            <ModalExcluir
              @btn-excluir="excluirUsuario(usuario.id)"
              modalTitle="Excluir usuario"
              :modalContent="'Tem certeza que deseja excluir o usuario ' + usuario.usuario + '?'">
              <img alt="" class="w-6" src="@/assets/icons/delete.svg">
            </ModalExcluir>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import ModalExcluir from '../ModalExcluir.vue'
import UsuariosDataService from '@/services/UsuariosDataService';
import { toast } from 'vue3-toastify';

export default {
  name: 'UsuariosTable',
  components: {
    ModalExcluir
  },
  data() {
    return {
      usuarios: [],
    }
  },
  methods: {
    recuperarUsuarios() {
      UsuariosDataService
        .getAll()
        .then((response) => {
          this.usuarios = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    excluirUsuario(usuario_id) {
      UsuariosDataService
        .delete(usuario_id)
        .then(() => {
          this.recuperarUsuarios();
        })
        .catch((error) => {
          toast(error.message, { });
        });
    }
  },
  mounted() {
    this.recuperarUsuarios();
  }
}
</script>

<style>

</style>