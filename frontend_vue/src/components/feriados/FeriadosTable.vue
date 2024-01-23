<template>
  <table class="table-auto mx-auto mt-7">
    <thead>
      <tr>
        <th class="px-4 py-2">Data</th>
        <th class="px-4 py-2">Descrição</th>
        <th class="px-4 py-2">Ações</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="feriado in feriados" :key="feriado.id">
        <td class="border px-4 py-2">{{ feriado.data }}</td>
        <td class="border px-4 py-2">{{ feriado.descricao }}</td>
        <td class="border px-4 py-2">
          <div class="flex items-center justify-center">
            <router-link :to="{ name: 'feriados.alterar', params: { id: feriado.id } }">
              <img alt="" class="w-12 block" src="@/assets/icons/edit.svg" />
            </router-link>
            <ModalExcluir
              @btn-excluir="excluirFeriado(feriado.id)"
              :modalContent="'Tem certeza que deseja excluir o feriado de ' + feriado.data + '?'"
              modalTitle="Excluir feriado">
              <img alt="" class="w-6" src="@/assets/icons/delete.svg">
            </ModalExcluir>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import FeriadosDataService from '@/services/FeriadosDataService'
import ModalExcluir from '../ModalExcluir.vue'
import { toast } from 'vue3-toastify';

export default {
  name: 'FeriadosTable',
  components: {
    ModalExcluir
  },
  data() {
    return {
      feriados: [],
    }
  },
  methods: {
    getAllFeriados() {
      return FeriadosDataService.getAll()
        .then(response => {
          this.feriados = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    excluirFeriado(feriado_id) {
      FeriadosDataService
        .delete(feriado_id)
        .then(() => {
          this.getAllFeriados();
        })
        .catch((error) => {
          toast(error.message, { });
        });
    }
  },
  mounted() {
    this.getAllFeriados();
  }
}
</script>

<style>

</style>