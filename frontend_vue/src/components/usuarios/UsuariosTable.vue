<template>
  <div class="">
    <table class="table-auto">
      <thead>
        <tr>
          <th class="px-4 py-2">#</th>
          <th class="px-4 py-2">Usuário</th>
          <th class="px-4 py-2">E-mail</th>
          <th class="px-4 py-2">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="border px-4 py-2">2</td>
          <td class="border px-4 py-2">matheus_gomes</td>
          <td class="border px-4 py-2">math.s.gomes@gmail.com</td>
          <td class="border px-4 py-2">
            <div class="flex items-center justify-center">
              <router-link :to="{ name: 'usuarios.alterar', params: { id: 2 } }">
                <img alt="" class="w-12 block" src="@/assets/icons/edit.svg" />
              </router-link>
              <ModalExcluir
                modalTitle="Excluir usuario"
                modalContent="Tem certeza que deseja excluir o usuario matheus_gomes?">
                <img alt="" class="w-6" src="@/assets/icons/delete.svg">
              </ModalExcluir>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ModalExcluir from '../ModalExcluir.vue'

export default {
  name: 'UsuariosTable',
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