<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Languages from "@/Components/Languages.vue";
import ActionButton from "@/Components/ActionButton.vue";
import Modal from "@/Components/Modal.vue";
import Heading from "@/Components/Heading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useToast } from "vue-toastification";
import InputError from "@/Components/InputError.vue";
import { usePage } from "@inertiajs/vue3";
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";

const toast = useToast();
const page = usePage()
function SaveLanguage() {
    form.post(route("language.store"), {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
            toast.success(page.props.success.message);
        },
    });
}
const form = useForm({
    name: "",
    image: "",
    other: "other",
});

const ShowAddLanguage = ref(false);
</script>
<template>
    <Head title="All Languages" />

    <AuthenticatedLayout>
        <div class="h-screen flex items-center flex-col">
            <div class="bg-white w-full p-2 flex items-start justify-end">
                <ActionButton
                    @click="ShowAddLanguage = !ShowAddLanguage"
                    icon="language"
                    text="Add Language"
                    class="w-48 border-purple-500 text-purple-500 hover:bg-purple-500 hover:border-purple-400 active:bg-gray-200"
                />
            </div>
            <div class="relative w-full">
                <Modal v-if="ShowAddLanguage" class="bg-white">
                    <form
                        @submit.prevent="SaveLanguage"
                        method="post"
                        class="m-auto p-6 w-10/12 sm:w-6/12 flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
                    >
                        <div class="">
                            <Heading title="Add New Language" />
                        </div>
                        <div
                            class="w-full flex flex-col justify-between items-center gap-1"
                        >
                            <!-- Language Name field Starts here  -->

                            <GradientInput
                                holder="Language Name"
                                v-model="form.name"
                                class=""
                            />
                            <InputError
                                :label="form.errors.name"
                                class="w-full"
                            />
                            <!-- Language Name field ends here  -->

                            <!-- Language Image field starts here  -->
                            <GradientInput
                                @input="form.image = $event.target.files[0]"
                                holder="Language Image"
                                inputType="file"
                                class="bg-white border-none p-2"
                            />
                            <progress
                                class="w-full"
                                v-if="form.progress"
                                :value="form.progress.percentage"
                                max="100"
                            ></progress>

                            <InputError
                                :label="form.errors.image"
                                class="w-full"
                            />
                            <!-- Language Image field ends here  -->

                            <div class="flex justify-between w-full">
                                <ActionButton
                                    @click="ShowAddLanguage = false"
                                    icon="close"
                                    text="Close "
                                    class="rounded-lg w-24 !border-2 border-red-500 text-red-500 hover:bg-red-500 active:bg-gray-200"
                                    :disabled="form.processing"
                                />
                                <PrimaryButton
                                    v-motion-pop-visible
                                    :disabled="form.processing"
                                    text="Save"
                                    icon="check"
                                    class="w-48 rounded-lg py-3 px-10"
                                />
                            </div>
                        </div>
                    </form>
                </Modal>
            </div>
            <Languages />
        </div>
    </AuthenticatedLayout>
</template>
