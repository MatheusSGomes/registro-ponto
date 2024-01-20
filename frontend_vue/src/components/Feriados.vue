<template>
  <div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Inserir novo feriado
    </button>
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">Data</th>
          <th class="px-4 py-2">Descrição</th>
          <th class="px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border px-4 py-2">25/12/2023</td>
          <td class="border px-4 py-2">Natal</td>
          <td class="border px-4 py-2">
            <div class="flex">
              <img alt="Vue logo" class="w-7" src="../assets/icons/edit.svg">
              <img alt="Vue logo" class="w-6" src="../assets/icons/delete.svg">
            </div>
          </td>
        </tr>
        <tr>
          <td class="border px-4 py-2">25/12/2023</td>
          <td class="border px-4 py-2">Natal</td>
          <td class="border px-4 py-2">
            <div class="flex">
              <img alt="Vue logo" class="w-7" src="../assets/icons/edit.svg">
              <img alt="Vue logo" class="w-6" src="../assets/icons/delete.svg">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: 'FeriadosComponent',
}
</script>

<style scoped>

</style>
