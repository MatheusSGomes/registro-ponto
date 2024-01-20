<template>
  <h1 class="my-4 text-4xl font-extrabold">Feriados</h1>


  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    <router-link :to="{ name:'feriados.inserir' }">
      Inserir novo feriado
    </router-link>
  </button>
  <FeriadosTable />
</template>

<script>
import FeriadosTable from '@/components/feriados/FeriadosTable.vue'

export default {
  name: 'FeriadoListaView',
  components: {
    FeriadosTable,
  }
}
</script>

<style scoped>

</style>