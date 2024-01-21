<template>
  <div class="">
    <h1 class="text-4xl font-extrabold">Registro de Ponto</h1>

    <div class="">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="cpf">Digite sua matricula: </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="matricula" type="text" />
    </div>

    <h1 class="text-4xl font-extrabold my-5">20/01/2024</h1>
    <h1 class="text-2xl font-extrabold">18:05</h1>

    <div class="flex justify-between my-10">
      <p><strong>Colaborador: </strong>John Due</p>
      <p><strong>Matricula: </strong>555</p>
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

export default {
  name: 'HomeView',
  components: { },
  data() {
    return {
      data_atual: null,
      hora_atual: null,
      colaborador: {
        nome: null,
        matricula: null,
      },
      relogio_ponto: [
        { entrada: null, saida: null },
        { entrada: null, saida: null },
      ]
    }
  }
}
</script>
