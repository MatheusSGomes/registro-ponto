<template>
  <div class="">
    <table class="table-auto">
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
                modalTitle="Excluir feriado"
                :modalContent="'Tem certeza que deseja excluir o feriado de ' + feriado.data + '?'">
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
import FeriadosDataService from '@/services/FeriadosDataService'
import ModalExcluir from '../ModalExcluir.vue'

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