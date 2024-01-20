<template>
  <h1 class="my-4 text-4xl font-extrabold">Colaboradores</h1>


  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    <router-link :to="{ name:'colaboradores.inserir' }">
      Inserir novo colaborador
    </router-link>
  </button>
  <ColaboradoresTable />
</template>

<script>
import ColaboradoresTable from '@/components/colaboradores/ColaboradoresTable.vue'

export default {
  name: 'ColaboradoresListaView',
  components: {
    ColaboradoresTable,
  }
}
</script>

<style scoped>

</style>