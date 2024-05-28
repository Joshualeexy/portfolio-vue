<script setup>
defineProps({
    Status: {
        type: Boolean,
        default: false
    }

})

const rotatex = '-rotate-45'

</script>



<template>
    <div class="group flex cursor-pointer items-center justify-center rounded-3xl bg-white  md:hidden ">

        <div class="space-y-2">

            <span class="block h-1 w-10 origin-center rounded-full bg-purple-700 translate-y-1.5 transition-transform ease-in-out"
                :class="{ '-rotate-45 w-8':Status}"></span>

            <span class="block h-1 w-10 origin-center rounded-full bg-blue-700 -translate-y-1.5 transition-transform ease-in-out"
                :class="{'rotate-45 w-8':Status}">
            </span>


            <span class=" block h-1 w-8 rounded-full bg-purple-700 ease-in-out -translate-y-1.5 "
                :class="{ 'hidden': Status }"></span>


        </div>

    </div>
</template>
