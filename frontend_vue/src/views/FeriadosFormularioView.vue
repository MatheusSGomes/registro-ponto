<template>
  <h1 v-if="id" class="text-4xl font-extrabold">Alterar Feriado</h1>
  <h1 v-else class="text-4xl font-extrabold">Inserir Feriado</h1>

  <p>Parâmetro da Rota: {{ id }}</p>
</template>

<script>
export default {
  name: 'FeriadosFormularioView',
  props: ['id']
}
</script>

<style>

</style>