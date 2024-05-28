<script setup>
import NewSection from "@/Components/NewSection.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { useToast } from "vue-toastification";
const toast = useToast();
const page = usePage();

const form = useForm({
    name: "",
    subject: "",
    email: "",
    message: "",
});
function HandleForm() {
    form.post(route("processcontactform"), {
        preserveScroll: true,
        onFinish: () => {
            form.reset();
            toast.success(page.props.success.message);
        },
    });
}
</script>

<template>
    <NewSection class="">
        <h2
            v-motion-pop-visible
            class="transition-all duration-300 ease-in-out text-center text-4xl bg-clip-text text-transparent bg-gradient-to-r from-blue-800 via-purple-600 to-indigo-300 font-bold"
        >
            Contact Me
        </h2>
        <p
            v-motion-pop-visible
            class="text-center text-gray-400 transition-all duration-500 ease-in-out"
        >
            Get in touch with me for all jobs involving web development
        </p>
        <form
            @submit.prevent="HandleForm"
            method="post"
            class="w-full flex flex-col gap-4"
        >
            <div class="w-full flex justify-between items-center gap-4">
                <GradientInput holder="Enter Name" v-model="form.name" />
                <GradientInput holder="Enter Subject" v-model="form.subject" />
            </div>
            <div class="">
                <GradientInput
                    holder="Enter Email"
                    inputType="email"
                    v-model="form.email"
                    class="w-full"
                />
            </div>
            <label for="" class="text-gray-500">Message</label>
            <div
                class="p-[1.5px] bg-gradient-to-r from-blue-600 via-indigo-400 to-purple-400 flex flex-col rounded-md"
            >
                <textarea
                    v-motion-pop-visible
                    rows="4"
                    v-model="form.message"
                    class="transition-all duration-300 ease-in-out rounded-md py-4 w-full border-none outline-none placeholder-gray-300"
                ></textarea>
            </div>
            <div class="">
                <PrimaryButton
                    text="Send"
                    icon="arrow-right"
                    class="rounded-lg py-3 px-20"
                />
            </div>
        </form>
    </NewSection>
</template>
