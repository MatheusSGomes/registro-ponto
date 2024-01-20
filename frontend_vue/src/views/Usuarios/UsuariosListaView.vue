<template>
  <h1 class="my-4 text-4xl font-extrabold">Usuarios</h1>


  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    <router-link :to="{ name:'usuarios.inserir' }">
      Inserir novo usuário
    </router-link>
  </button>
  <UsuariosTable />
</template>

<script>
import UsuariosTable from '@/components/usuarios/UsuariosTable.vue'

export default {
  name: 'UsuariosListaView',
  components: {
    UsuariosTable,
  }
}
</script>

<style scoped>

</style>