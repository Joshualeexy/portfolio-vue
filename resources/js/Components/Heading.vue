<script setup>
defineProps({

    title:{
        type:String
    }
})

</script>

<template>
    <div class="text-xl ">
        <h4 class=" text-xl font-medium text-gray-700">{{title}}</h4>
    </div>
</template>