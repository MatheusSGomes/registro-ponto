<template>
  <div class="">
    <h1 class="text-4xl font-extrabold my-10">Registro de Ponto</h1>

      <h1 class="text-3xl font-extrabold mb-3">{{ data_atual }}</h1>
      <h1 class="text-2xl font-extrabold mb-10">{{ hora_atual }}</h1>

      <div class="">
        <label class="block text-gray-700 text-sm font-bold my-2" for="cpf">Digite sua matricula: </label>
        <div class="flex gap-3">
          <input v-model="colaborador.matricula" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="matricula" type="text" />
          <button @click="buscaColaborador" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Confirmar</button>
        </div>
      </div>

    <div class="registrador" v-if="showRegistrador">
      <div class="flex justify-between my-10">
        <p><strong>Colaborador: </strong>{{ colaborador.nome }}</p>
        <p><strong>Matricula: </strong>{{ colaborador.id }}</p>
      </div>
      <div>
        <table>
          <thead>
            <th v-for="ponto in relogio_ponto" :key="ponto.id"></th>
          </thead>
          <tbody>
            <tr v-for="(ponto, index) in relogio_ponto" :key="ponto.id" >
              <td v-if="index % 2 === 0" class="font-bold px-4 py-2">Entrada</td>
              <td v-if="index % 2 !== 0" class="font-bold px-4 py-2">Saída</td>
              <td class="border px-4 py-2">{{ ponto.horario }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div>
        <p class="text-red-500 my-10">MAPA</p>
      </div>
      <button @click="registrarPonto(colaborador.id)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Registrar
      </button>
    </div>
  </div>
</template>

<script>
import ColaboradoresDataService from '@/services/ColaboradoresDataService';
import ControlePontoDataService from '@/services/ControlePontoDataService';

export default {
  name: 'HomeView',
  components: { },
  data() {
    return {
      showRegistrador: false,
      data_atual: new Date().toLocaleDateString('pt-br'),
      hora_atual: new Date().getHours() + ':' + new Date().getMinutes(),
      colaborador: {
        nome: null,
        matricula: null,
      },
      relogio_ponto: []
    }
  },
  methods: {
    buscaColaborador() {
      ColaboradoresDataService
        .get(this.colaborador.matricula)
        .then(response => {
          this.colaborador = response.data;
          this.showRegistrador = true;
          this.buscaPontoColaborador(1);
        })
        .catch(() => {
          this.showRegistrador = false;
        });
    },
    buscaPontoColaborador(colaborador_id) {
      ControlePontoDataService
        .getByColaboradorId(colaborador_id)
        .then(response => {
          this.relogio_ponto = response.data;
        });
    },
    registrarPonto(colaborador_id) {
      const data = {
        colaborador_id: colaborador_id,
        localizacao: null
      }

      ControlePontoDataService
        .registrarPonto(data)
        .then(response => {
          this.relogio_ponto.push(response.data)
        });
    }
  },
  mounted() {

  }
}
</script>
