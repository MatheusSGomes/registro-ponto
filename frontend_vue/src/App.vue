<template>
  <div class="container mx-auto px-4">
    <nav>
      <router-link to="/">Home</router-link> |
      <router-link to="/colaboradores">Colaboradores</router-link> |
      <router-link to="/usuarios">Usuários</router-link> |
      <router-link to="/feriados">Feriados</router-link>
    </nav>
    <router-view/>
  </div>
</template>

<style>

</style>
