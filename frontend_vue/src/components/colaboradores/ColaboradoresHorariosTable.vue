<template>
  <table class="table-auto" @change="changeTable">
    <thead>
      <tr>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2">Segunda-feira</th>
        <th class="px-4 py-2">Terça-feira</th>
        <th class="px-4 py-2">Quarta-feira</th>
        <th class="px-4 py-2">Quinta-feira</th>
        <th class="px-4 py-2">Sexta-feira</th>
        <th class="px-4 py-2">Sábado</th>
        <th class="px-4 py-2">Domingo</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="px-4 py-2">Entrada</th>
        <td class="border px-4 py-2">
          <input v-model="horarios.seg_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.ter_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qua_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qui_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sex_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sab_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.dom_p1_entrada" class="w-full" type="time" id="seg_p1_entrada" name="seg_p1_entrada" />
        </td>
      </tr>
      <tr>
        <th class="px-4 py-2">Saída</th>
        <td class="border px-4 py-2">
          <input v-model="horarios.seg_p1_saida" class="w-full" type="time" id="seg_p1_saida" name="seg_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.ter_p1_saida" class="w-full" type="time" id="ter_p1_saida" name="ter_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qua_p1_saida" class="w-full" type="time" id="qua_p1_saida" name="qua_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qui_p1_saida" class="w-full" type="time" id="qui_p1_saida" name="qui_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sex_p1_saida" class="w-full" type="time" id="sex_p1_saida" name="sex_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sab_p1_saida" class="w-full" type="time" id="sab_p1_saida" name="sab_p1_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.dom_p1_saida" class="w-full" type="time" id="dom_p1_saida" name="dom_p1_saida" />
        </td>
      </tr>
      <tr>
        <th class="px-4 py-2">Entrada</th>
        <td class="border px-4 py-2">
          <input v-model="horarios.seg_p2_entrada" class="w-full" type="time" id="seg_p2_entrada" name="seg_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.ter_p2_entrada" class="w-full" type="time" id="ter_p2_entrada" name="ter_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qua_p2_entrada" class="w-full" type="time" id="qua_p2_entrada" name="qua_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qui_p2_entrada" class="w-full" type="time" id="qui_p2_entrada" name="qui_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sex_p2_entrada" class="w-full" type="time" id="sex_p2_entrada" name="sex_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sab_p2_entrada" class="w-full" type="time" id="sab_p2_entrada" name="sab_p2_entrada" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.dom_p2_entrada" class="w-full" type="time" id="dom_p2_entrada" name="dom_p2_entrada" />
        </td>
      </tr>
      <tr>
        <th class="px-4 py-2">Saída</th>
        <td class="border px-4 py-2">
          <input v-model="horarios.seg_p2_saida" class="w-full" type="time" id="seg_p2_saida" name="seg_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.ter_p2_saida" class="w-full" type="time" id="ter_p2_saida" name="ter_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qua_p2_saida" class="w-full" type="time" id="qua_p2_saida" name="qua_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.qui_p2_saida" class="w-full" type="time" id="qui_p2_saida" name="qui_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sex_p2_saida" class="w-full" type="time" id="sex_p2_saida" name="sex_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.sab_p2_saida" class="w-full" type="time" id="sab_p2_saida" name="sab_p2_saida" />
        </td>
        <td class="border px-4 py-2">
          <input v-model="horarios.dom_p2_saida" class="w-full" type="time" id="dom_p2_saida" name="dom_p2_saida" />
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import HorariosDataService from '@/services/HorariosDataService';

export default {
  name: 'ColaboradoresHorarioTableComponent',
  props: ['colaborador_id'],
  data() {
    return {
      horarios: {
        seg_p1_entrada: null,
        seg_p1_saida: null,
        seg_p2_entrada: null,
        seg_p2_saida: null,

        ter_p1_entrada: null,
        ter_p1_saida: null,
        ter_p2_entrada: null,
        ter_p2_saida: null,

        qua_p1_entrada: null,
        qua_p1_saida: null,
        qua_p2_entrada: null,
        qua_p2_saida: null,

        qui_p1_entrada: null,
        qui_p1_saida: null,
        qui_p2_entrada: null,
        qui_p2_saida: null,

        sex_p1_entrada: null,
        sex_p1_saida: null,
        sex_p2_entrada: null,
        sex_p2_saida: null,

        sab_p1_entrada: null,
        sab_p1_saida: null,
        sab_p2_entrada: null,
        sab_p2_saida: null,

        dom_p1_entrada: null,
        dom_p1_saida: null,
        dom_p2_entrada: null,
        dom_p2_saida: null,
      }
    }
  },
  methods: {
    changeTable(e) {
      e.preventDefault();
      this.$emit('updateHorarios', this.horarios);
    },
    preencheHorarios() {
      if (this.colaborador_id) {
        HorariosDataService
          .getByColaboradorId(this.colaborador_id)
          .then(response => {
            this.horarios = response.data;
          })
      }
    }
  },
  mounted() {
    this.preencheHorarios();
  }
}
</script>

<style scoped>

</style>