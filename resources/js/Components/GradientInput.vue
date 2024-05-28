<script setup>
const model = defineModel();

const props = defineProps({
    holder: String,
    inputType: String,
    parentdirection: {
        default: "flex-col",
        type:String
    },
});
</script>

<template>
    <div class="flex flex-col w-full">
        
        <label
            v-motion-pop-visible
            for=""
            class="transition-all duration-300 ease-in-out text-gray-600 py-1"
        >
            {{ holder }}
        </label>
        <div
            class="transition-all duration-500 ease-in-out flex w-full  justify-between p-[1.5px] bg-gradient-to-r from-blue-600 via-indigo-400 to-purple-400 rounded-md"
            :class="{ '!w-8': inputType === 'checkbox','flex-row':parentdirection == 'flex-row', 'flex-col':parentdirection == 'flex-col'}"
        >
            <slot>
                <input
                    :class="$attrs.class"
                    v-motion-pop-visible
                    class="transition-all duration-300 ease-in-out border-none focus:ring-0 w-full h-full py-3 rounded-md placeholder-gray-300"
                    placeholder="Type ....."
                    v-model="model"
                    :type="inputType"
                />
            </slot>
        </div>
    </div>
</template>
