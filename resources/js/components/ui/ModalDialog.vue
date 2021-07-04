<template>
  <div @click="$emit('close')"
    class="min-h-screen z-10 fixed w-full top-0 left-0 bg-gray-800 bg-opacity-25"></div>
  <dialog open
    class="fixed z-50 w-96 p-0 rounded overflow-hidden border border-gray-700">
    <header class="bg-gray-700 w-full px-2 py-1 text-white font-semibold">
        {{ title }}
    </header>
    <section class="p-2">
        <slot></slot>
    </section>
    <hr>
    <footer class="flex justify-end gap-2 p-2 border-t">
        <slot name="actions"></slot>
    </footer>
  </dialog>
</template>

<script>
export default {
    props: ['title'],

    emits: ['close']
}
</script>

<style scoped>

dialog {
    top: 20vh;
}

</style>