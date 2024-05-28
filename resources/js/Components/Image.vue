<script setup>
defineProps({
name:{
    type:String,
    default:"placeholder.png"
}
})
</script>

<template>
    <img :src="`/storage/assets/images/${name}`" :alt="`${name}`">

</template>