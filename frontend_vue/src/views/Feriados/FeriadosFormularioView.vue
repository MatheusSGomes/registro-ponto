<template>
  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
    <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
      <h1 v-if="id" class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Alterar Feriado
      </h1>
      <h1 v-else class="mb-10 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Inserir Feriado
      </h1>

      <form action="" @submit="submitFeriado">
        <div class="mx-auto grid gap-3 grid-cols-1 w-full max-w-96">
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
        <button class="mt-7 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
          Salvar
        </button>
      </form>
    </div>
  </section>
</template>

<script>
import FeriadosDataService from '@/services/FeriadosDataService';
import { toast } from 'vue3-toastify';

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
          .catch((error) => {
            toast(error.message, { });
          });
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
        .catch((error) => {
          toast(error.message, { });
        });
    },
    atualizarFeriado(data) {
      FeriadosDataService
        .update(this.id, data)
        .then(() => {
          this.$router.push({ path: '/feriados' });
        })
        .catch((error) => {
          toast(error.message, { });
        });
    }
  },
  mounted() {
    this.recuperaFeriado();
  }
}
</script>

<style>

</style>