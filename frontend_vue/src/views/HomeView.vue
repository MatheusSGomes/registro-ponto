<template>
  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
    <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
      <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Registro de Ponto</h1>
      <p class="my-2 text-lg font-normal text-gray-500 lg:text-xl">
        Data atual: <span class="font-bold">{{ data_atual }}</span>
      </p>
      <p class="mt-2 mb-10 text-lg font-normal text-gray-500 lg:text-xl">
        Hora atual: <span class="font-bold">{{ hora_atual }}</span>
      </p>

      <MapComponent @atualiza-localizacao="recebeLocalizacao" />

      <p class="mt-4 mb-10 text-md font-normal text-gray-500">
        Latitude: <strong>{{ localizacao.latitude }}</strong>,
        Longitude: <strong>{{ localizacao.longitude }}</strong>
      </p>

      <p class="mt-2 text-lg font-normal text-gray-500 lg:text-xl">
        Colaborador: <span class="font-bold">{{ colaborador.nome }}</span>
      </p>
      <p class="mt-2 mb-10 text-lg font-normal text-gray-500 lg:text-xl">
        Matricula: <span class="font-bold">{{ colaborador.id }}</span>
      </p>

      <div class="mx-auto w-full max-w-80">
        <label class="block text-gray-700 text-sm font-bold my-2" for="cpf">Para registrar o ponto digite sua matricula: </label>
        <input v-model="colaborador.matricula" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="matricula" type="text" />
        <button @click="buscaColaborador" class="bg-blue-500 hover:bg-blue-700 text-white font-bold my-4 py-2 px-4 rounded">Buscar Colaborador</button>
      </div>

      <div class="mx-auto">
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

      <button @click="registrarPonto(colaborador.id)" class="my-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Registrar
      </button>

    </div>
  </section>
</template>

<script>
import ColaboradoresDataService from '@/services/ColaboradoresDataService';
import ControlePontoDataService from '@/services/ControlePontoDataService';
import MapComponent from '@/components/MapComponent'
import { toast } from 'vue3-toastify';

export default {
  name: 'HomeView',
  components: {
    MapComponent
  },
  data() {
    return {
      showRegistrador: false,
      data_atual: new Date().toLocaleDateString('pt-br'),
      hora_atual: new Date().getHours() + ':' + new Date().getMinutes(),
      colaborador: {
        nome: null,
        matricula: null,
      },
      relogio_ponto: [],
      localizacao: {
        latitude: null,
        longitude: null,
      },
    }
  },
  methods: {
    buscaColaborador() {
      ColaboradoresDataService
        .get(this.colaborador.matricula)
        .then(response => {
          this.colaborador = response.data;
          this.showRegistrador = true;
          this.buscaPontoColaborador(response.data.id);
        })
        .catch((error) => {
          this.showRegistrador = false;
          toast(error.message, { });
        });
    },
    buscaPontoColaborador(colaborador_id) {
      ControlePontoDataService
        .getByColaboradorId(colaborador_id)
        .then(response => {
          this.relogio_ponto = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    registrarPonto(colaborador_id) {
      const data = {
        colaborador_id: colaborador_id,
        localizacao: this.localizacao
      }

      ControlePontoDataService
        .registrarPonto(data)
        .then(response => {
          this.relogio_ponto.push(response.data)
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    recebeLocalizacao(localizacao) {
      this.localizacao = localizacao;
    }
  },
  mounted() {

  }
}
</script>
