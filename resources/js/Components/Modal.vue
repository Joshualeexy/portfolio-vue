<template>
<section class="absolute bg-black  inset-0 z-10">
    <transition name="fade">
    <slot>

    </slot>
    </transition>
  </section>
</template>

<script setup>

</script>
<style scoped>
.fade-enter,
.fade-leave-to {
  opacity: 0;
}

.fade-enter-active,
.fade-leave-active {
  transition: opacity 500ms ease-out;
}
</style>
