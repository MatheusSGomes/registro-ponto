<template>
  <h1 v-if="id" class="text-4xl font-extrabold">Alterar Feriado</h1>
  <h1 v-else class="text-4xl font-extrabold">Inserir Feriado</h1>

  <form action="" @submit="submitFeriado">
    <div class="grid grid-flow-col gap-3 auto-cols-max">
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="data">
          Data
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" v-model="feriado.data" id="data" type="date" placeholder="Data">
      </div>
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="descricao">
          Descrição
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descricao" type="text" placeholder="Ex: Proclamação da República" v-model="feriado.descricao">
      </div>
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Salvar
    </button>
  </form>

</template>

<script>
import FeriadosDataService from '@/services/FeriadosDataService';
export default {
  name: 'FeriadosFormularioView',
  props: ['id'],
  data() {
    return {
      feriado: {
        data: null,
        descricao: null
      }
    }
  },
  methods: {
    recuperaFeriado() {
      if (this.id) {
        FeriadosDataService
          .get(this.id)
          .then((response) => {
            this.feriado = response.data;
          })
      }
    },
    submitFeriado(e) {
      e.preventDefault();

      const data = {
        data: this.feriado.data,
        descricao: this.feriado.descricao
      }

      if (this.id) {
        this.atualizarFeriado(data);
      } else {
        this.salvarFeriado(data);
      }
    },
    salvarFeriado(data) {
      FeriadosDataService
        .create(data)
        .then(() => {
          this.$router.push({ path: '/feriados' });
        })
    },
    atualizarFeriado(data) {
      FeriadosDataService
        .update(this.id, data)
        .then(() => {
          this.$router.push({ path: '/feriados' });
        })
    }
  },
  mounted() {
    this.recuperaFeriado();
  }
}
</script>

<style>

</style>