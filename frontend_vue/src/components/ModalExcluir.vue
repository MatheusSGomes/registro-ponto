<template>
  <div class="container mx-auto">
    <div class="flex justify-center">
      <button
        v-if="modalTitle || modalContent"
        @click="isOpen = true"
        class=""
        type="button">
        <slot></slot>
      </button>

      <div
        v-show="isOpen"
        class="
          absolute
          inset-0
          flex
          items-center
          justify-center
          bg-gray-700 bg-opacity-50
        "
      >
        <div class="max-w-2xl p-6 bg-white rounded-lg shadow-xl">
          <div class="flex items-center justify-between">
            <h3 class="text-2xl">{{ modalTitle }}</h3>
            <img @click="isOpen = false" class="w-8 h-8 cursor-pointer" src="@/assets/icons/close.svg" />
          </div>
          <div class="mt-4">
            <p class="mb-4 text-sm">
              {{ modalContent }}
            </p>
            <button @click="$emit('btnExcluir')" class="px-6 py-2 text-gray-100 bg-red-700 rounded">
              Sim
            </button>
            <button
              @click="isOpen = false"
              class="px-6 py-2 ml-2 text-gray-800 border border-gray-600 rounded">
              Não
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ModalComponent',
  props: ['src', 'modalTitle', 'modalContent'],
  // emits: ['btnExcluir'],
  data() {
    return {
      isOpen: false,
    };
  },
};
</script>

<style scoped>

</style>