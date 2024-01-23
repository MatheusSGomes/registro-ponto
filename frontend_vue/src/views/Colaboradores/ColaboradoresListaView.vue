<template>
  <section class="bg-gray-100 rounded-3xl my-7 py-8 px-4">
      <div class="mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">Colaboradores</h1>

        <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
          <router-link :to="{ path:'/colaboradores/inserir' }">
            Inserir novo colaborador
          </router-link>
        </button>

        <ColaboradoresTable />
      </div>
  </section>
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