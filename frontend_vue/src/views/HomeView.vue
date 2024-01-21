<template>
  <div class="">
    <h1 class="text-4xl font-extrabold">Registro de Ponto</h1>

    <div class="">
      <label class="block text-gray-700 text-sm font-bold my-2" for="cpf">Digite sua matricula: </label>
      <div class="flex gap-3">
        <input v-model="colaborador.matricula" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="matricula" type="text" />
        <button @click="buscaColaborador" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Confirmar</button>
      </div>
    </div>

    <h1 class="text-4xl font-extrabold my-5">{{ data_atual }}</h1>
    <h1 class="text-2xl font-extrabold">{{ hora_atual }}</h1>

    <div class="flex justify-between my-10">
      <p><strong>Colaborador: </strong>{{ colaborador.nome }}</p>
      <p><strong>Matricula: </strong>{{ colaborador.id }}</p>
    </div>

    <div>
      <table class="table-auto">
        <tr>
          <th class="px-4 py-2">Entradas</th>
          <td class="border px-4 py-2">12:01</td>
          <td class="border px-4 py-2">12:01</td>
          <td class="border px-4 py-2">12:01</td>
        </tr>
        <tr>
          <th class="px-4 py-2">Saídas</th>
          <td class="border px-4 py-2">12:01</td>
          <td class="border px-4 py-2">12:01</td>
          <td class="border px-4 py-2"></td>
        </tr>
      </table>
    </div>

    <div>
      <p class="text-red-500 my-10">MAPA</p>
    </div>

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Registrar
    </button>
  </div>
</template>

<script>
import ColaboradoresDataService from '@/services/ColaboradoresDataService'

export default {
  name: 'HomeView',
  components: { },
  data() {
    return {
      data_atual: new Date().toLocaleDateString('pt-br'),
      hora_atual: new Date().getHours() + ':' + new Date().getMinutes(),
      colaborador: {
        nome: null,
        matricula: null,
      },
      relogio_ponto: [
        { entrada: null, saida: null },
        { entrada: null, saida: null },
      ]
    }
  },
  methods: {
    buscaColaborador() {
      ColaboradoresDataService
        .get(this.colaborador.matricula)
        .then(response => {
          this.colaborador = response.data;
        });
    }
  },
  mounted() {
    console.log();
  }
}
</script>
