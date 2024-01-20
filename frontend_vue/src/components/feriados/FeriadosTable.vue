<template>
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
          <div class="flex gap-2">
            <img alt="Vue logo" class="w-7 cursor-pointer" src="@/assets/icons/edit.svg">
            <ModalExcluir
              modalTitle="Excluir feriado"
              modalContent="Tem certeza que deseja excluir o feriado de 25/12/2023?">
              <img alt="Vue logo" class="w-6" src="@/assets/icons/delete.svg">
            </ModalExcluir>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import ModalExcluir from '../ModalExcluir.vue'

export default {
  name: 'FeriadosTable',
  components: {
    ModalExcluir
  },
  data() {
    return {}
  }
}
</script>

<style>

</style>