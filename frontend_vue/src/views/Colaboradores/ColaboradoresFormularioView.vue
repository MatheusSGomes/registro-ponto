<template>
  <h1 v-if="id" class="text-4xl font-extrabold">Alterar Colaborador ({{ id }})</h1>
  <h1 v-else class="text-4xl font-extrabold">Inserir Colaborador</h1>

  <div class="grid gap-3 grid-cols-3">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="cpf">
        CPF
      </label>
      <input v-model="colaborador.cpf" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cpf" type="text" />
    </div>

    <div class="flex justify-center itens-center mb-4">
      <div class="flex gap-3">
        <input v-model="colaborador.ativo" class="block" id="ativo" type="checkbox" />
        <p class="block text-gray-700 text-sm font-bold mb-2">Ativo?</p>
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
          <option value="1">Administrador</option>
          <option value="2">Colaborador</option>
        </select>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="funcao">
        Função*
      </label>
      <select required v-model="colaborador.funcao_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight bg-white focus:outline-none focus:shadow-outline"  id="tipo-usuario">
          <option value="null" disabled selected>Selecione</option>
          <option value="1">Administrador</option>
          <option value="2">Colaborador</option>
        </select>
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="data_recisao">
        Data Recisão*
      </label>
      <input v-model="colaborador.data_recisao" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="data_recisao" type="date" />
    </div>

    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="usuario">
        Usuário
      </label>
      <input disabled v-model="colaborador.usuario" class="bg-gray-200 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="usuario" type="text" />
    </div>
  </div>

  <p class="text-red-500 my-10">TABELA DE HORÁRIOS</p>

  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    Salvar
  </button>


</template>

<script>
import ColaboradoresDataService from '@/services/ColaboradoresDataService'
export default {
  name: 'ColaboradoresFormularioView',
  props: ['id'],
  data() {
    return {
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
      }
    }
  },
  methods: {
    recuperarColaborador() {
      if (this.id) {
        ColaboradoresDataService
          .get(this.id)
          .then(response => {
            this.colaborador = response.data;
          });
      }
    }
  },
  mounted() {
    this.recuperarColaborador();
  }
}
</script>

<style>

</style>