<template>
  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
    <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
      <h1 v-if="id" class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Alterar Colaborador
      </h1>
      <h1 v-else class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
        Inserir Colaborador
      </h1>

      <form action="" @submit="submitForm">
        <div class="grid gap-3 grid-cols-3 mb-7">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="cpf">
              CPF
            </label>
            <input v-model="colaborador.cpf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cpf" type="text" />
          </div>
          <div class="flex justify-center itens-center mb-4">
            <div class="">
              <p class="block text-gray-700 text-sm font-bold mb-2">Ativo?</p>
              <input v-model="colaborador.ativo" class="block w-7" id="ativo" type="checkbox" />
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="nome">
              Nome
            </label>
            <input v-model="colaborador.nome" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nome" type="text" placeholder="Ex: Joaquim Souza" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="data_nascimento">
              Data Nascimento*
            </label>
            <input v-model="colaborador.data_nascimento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data_nascimento" type="date" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="data_admissao">
              Data Admissão*
            </label>
            <input v-model="colaborador.data_admissao" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data_admissao" type="date" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              E-mail*
            </label>
            <input v-model="colaborador.email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="cargo">
              Cargo*
            </label>
            <select required v-model="colaborador.cargo_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-white focus:outline-none focus:shadow-outline"  id="tipo-usuario">
                <option value="null" disabled selected>Selecione</option>
                <option v-for="cargo in cargos" :key="cargo.id" :value="cargo.id">
                  {{ cargo.titulo }}
                </option>
              </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="funcao">
              Função*
            </label>
            <select required v-model="colaborador.funcao_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-white focus:outline-none focus:shadow-outline"  id="tipo-usuario">
                <option value="null" disabled selected>Selecione</option>
                <option v-for="funcao in funcoes" :key="funcao.id" :value="funcao.id">
                  {{ funcao.titulo }}
                </option>
              </select>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="data_recisao">
              Data Recisão*
            </label>
            <input v-model="colaborador.data_recisao" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data_recisao" type="date" />
          </div>
          <div v-if="colaborador.usuario" class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="usuario">
              Usuário
            </label>
            <input disabled v-model="colaborador.usuario" class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" />
          </div>
        </div>

        <ColaboradoresHorariosTable :colaborador_id="id" @update-horarios="atualizaHorarios" />

        <button class="mt-7 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 my-5 rounded">
          Salvar
        </button>
      </form>
    </div>
  </section>
</template>

<script>
import ColaboradoresDataService from '@/services/ColaboradoresDataService';
import CargosDataService from '@/services/CargosDataService';
import FuncoesDataService from '@/services/FuncoesDataService';
import ColaboradoresHorariosTable from '@/components/colaboradores/ColaboradoresHorariosTable.vue';
import { toast } from 'vue3-toastify';

export default {
  name: 'ColaboradoresFormularioView',
  props: ['id'],
  components: {
    ColaboradoresHorariosTable
  },
  data() {
    return {
      cargos: [],
      funcoes: [],
      colaborador: {
        id: null,
        cpf: null,
        ativo: null,
        nome: null,
        data_nascimento: null,
        data_admissao: null,
        email: null,
        cargo_id: null,
        funcao_id: null,
        data_recisao: null,
        usuario: null,
      },
      horarios: {},
    }
  },
  methods: {
    atualizaHorarios(horarios) {
      this.horarios = horarios;
    },
    preencheCargos() {
      CargosDataService
        .getAll()
        .then(response => {
          this.cargos = response.data;
        })
        .catch((error) => {
          toast(error.message, { });
        })
        .catch((error) => {
          toast(error.message, { });
        });

    },
    preencheFuncoes() {
      FuncoesDataService
        .getAll()
        .then(response => {
          this.funcoes = response.data;
        });

    },
    recuperarColaborador() {
      if (this.id) {
        ColaboradoresDataService
          .get(this.id)
          .then(response => {
            this.colaborador = response.data;
            this.horarios = response.data.horarios;
          })
          .catch((error) => {
            toast(error.message, { });
          });
      }
    },
    submitForm(e) {
      e.preventDefault();

      const data = {
        cpf: this.colaborador.cpf,
        ativo: this.colaborador.ativo,
        nome: this.colaborador.nome,
        data_nascimento: this.colaborador.data_nascimento,
        data_admissao: this.colaborador.data_admissao,
        email: this.colaborador.email,
        cargo_id: this.colaborador.cargo_id,
        funcao_id: this.colaborador.funcao_id,
        data_recisao: this.colaborador.data_recisao,
        horarios: this.horarios,
      }

      if (this.id) {
        this.atualizarColaborador(data);
      } else {
        this.salvarColaborador(data);
      }
    },
    salvarColaborador(data) {
      ColaboradoresDataService
        .create(data)
        .then(() => {
          this.$router.push({ path: '/colaboradores' });
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
    atualizarColaborador(data) {
      ColaboradoresDataService
        .update(this.id, data)
        .then(() => {
          this.$router.push({ path: '/colaboradores' });
        })
        .catch((error) => {
          toast(error.message, { });
        });
    },
  },
  mounted() {
    this.recuperarColaborador();
    this.preencheCargos();
    this.preencheFuncoes();
  }
}
</script>

<style>

</style>