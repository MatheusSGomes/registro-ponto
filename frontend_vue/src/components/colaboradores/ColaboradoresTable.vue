<template>
  <div class="">
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Usuário</th>
          <th class="px-4 py-2">E-mail</th>
          <th class="px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="colaborador in colaboradores" :key="colaborador.id">
          <td class="border px-4 py-2">{{ colaborador.id }}</td>
          <td class="border px-4 py-2">{{ colaborador.nome }}</td>
          <td class="border px-4 py-2">{{ colaborador.email }}</td>
          <td class="border px-4 py-2">
            <div class="flex items-center justify-center">
              <router-link :to="{ name: 'colaboradores.alterar', params: { id: colaborador.id } }">
                <img alt="" class="w-12 block" src="@/assets/icons/edit.svg" />
              </router-link>
              <ModalExcluir
                @btn-excluir="excluirColaborador(colaborador.id)"
                modalTitle="Excluir colaborador"
                :modalContent="'Tem certeza que deseja excluir o colaborador ' + colaborador.nome + ',' + colaborador.id + '?'">
                <img alt="" class="w-6" src="@/assets/icons/delete.svg">
              </ModalExcluir>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ModalExcluir from '../ModalExcluir.vue';
import ColaboradoresDataService from '@/services/ColaboradoresDataService';
import { toast } from 'vue3-toastify';

export default {
  name: 'UsuariosTable',
  components: {
    ModalExcluir
  },
  data() {
    return {
      colaboradores: [],
    }
  },
  methods: {
    recuperarColaboradores() {
      ColaboradoresDataService
        .getAll()
        .then(response => {
          this.colaboradores = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    excluirColaborador(colaborador_id) {
      ColaboradoresDataService
        .delete(colaborador_id)
        .then(() => {
          this.recuperarColaboradores();
        })
        .catch((error) => {
          toast(error.message, { });
        });

    }
  },
  mounted() {
    this.recuperarColaboradores();
  }
}
</script>

<style>

</style>