<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActionButton from "@/Components/ActionButton.vue";
import Modal from "@/Components/Modal.vue";
import Heading from "@/Components/Heading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useToast } from "vue-toastification";
import InputError from "@/Components/InputError.vue";
import {  usePage } from "@inertiajs/vue3";
import { useForm, Head } from "@inertiajs/vue3";
import { ref } from "vue";
import Projects from "@/Pages/Projects.vue";

const toast = useToast();
const page = usePage();
function SaveProject() {
    form.post(route("project.store"), {
        preserveScroll: true,
        onSuccess: () => {
            
            toast.success(page.props.success.message);
        },
    });
}
if (page.props.success.message) {
    toast.success(page.props.success.message);
}
const form = useForm({
    name: "",
    category: "frontend",
    category_other: "",
    description: "",
    skills: "html",
    preview: "",
    preview_url: "",
    source: "",
    source_url: "",
    image: "",
    share: true,
    other: "other",
});
const props = defineProps(['Projects'])
const ShowAddProject = ref(false);
</script>
<template>
    <Head title="Projects " />

    <AuthenticatedLayout>
        <div class=" flex items-center flex-col">
            <div class="bg-white w-full p-2 flex items-start justify-end">
                <ActionButton
                    @click="ShowAddProject = !ShowAddProject"
                    icon="briefcase"
                    text="Add Project"
                    class="w-48 border-purple-500 text-purple-500 hover:bg-purple-500 hover:border-purple-400 active:bg-gray-200"
                />
            </div>
            <div class="relative w-full">
                <Modal v-if="ShowAddProject" class="bg-white">
                    <form
                        @submit.prevent="SaveProject"
                        method="post"
                        class="m-auto p-6 w-10/12 sm:w-6/12 flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
                    >
                        <div class="">
                            <Heading title="Add New Project" />
                        </div>
                        <div
                            class="w-full flex flex-col justify-between items-center gap-1"
                        >
                            <!-- Project Name field Starts here  -->

                            <GradientInput
                                holder="Project Name"
                                v-model="form.name"
                                class=""
                            />
                            <InputError
                                :label="form.errors.name"
                                class="w-full"
                            />
                            <!-- Project Name field ends here  -->
                            <!-- Project Category field Starts here  -->

                            <GradientInput holder="Project Category" class="">
                                <select v-model="form.category">
                                    <option value="frontend">Frontend</option>
                                    <option value="backend">Backend</option>
                                    <option value="other">Others</option>
                                </select>
                            </GradientInput>

                            <GradientInput
                                v-if="form.category === 'other'"
                                v-model="form.category_other"
                            >
                                <input
                                    placeholder="Enter it here"
                                    v-model="form.category_other"
                                />
                            </GradientInput>
                            <InputError
                                :label="form.errors.category"
                                class="w-full"
                            />
                            <!-- Project categoory field ends here  -->
                            <!-- Project Description field Starts here  -->

                            <GradientInput
                                holder="Project Description"
                                v-model="form.description"
                                class=""
                            />
                            <InputError
                                :label="form.errors.description"
                                class="w-full"
                            />
                            <!-- Project Description field ends here  -->
                            <!-- Project Preview field Starts here  -->

                            <GradientInput
                                holder="Project Preview"
                                inputType="checkbox"
                                v-model="form.preview"
                                class=""
                            >
                            </GradientInput>
                            <InputError
                                :label="form.errors.preview"
                                class="w-full"
                            />
                            <!-- Project Preview field ends here  -->
                            <!-- Project url field Starts here  -->

                            <GradientInput
                                v-if="form.preview"
                                inputType="url"
                                holder="Project 
                                Preview Url"
                                v-model="form.preview_url"
                                class=""
                            >
                            </GradientInput>
                            <InputError
                                :label="form.errors.preview_url"
                                class="w-full"
                            />
                            <!-- Project Preview_url field ends here  -->
                            <!-- Project Source field Starts here  -->

                            <GradientInput
                                holder="Project source"
                                inputType="checkbox"
                                v-model="form.source"
                                class=""
                            >
                            </GradientInput>
                            <InputError
                                :label="form.errors.source"
                                class="w-full"
                            />
                            <!-- Project Source field ends here  -->
                            <!-- Project Source_url field Starts here  -->

                            <GradientInput
                                v-if="form.source"
                                inputType="url"
                                holder="Project Source Url"
                                v-model="form.source_url"
                                class=""
                            >
                            </GradientInput>
                            <InputError
                                :label="form.errors.source_url"
                                class="w-full"
                            />
                            <!-- Project Source_url field ends here  -->

                            <!-- Project Skills field starts here  -->
                            <GradientInput
                                v-model="form.skills"
                                holder="Project Skill List"
                                class="bg-white border-none p-2"
                            />
                            <small class="w-full px-3 text-orange-400"
                                >Enter skill seperated by comma</small
                            >

                            <InputError
                                :label="form.errors.skills"
                                class="w-full"
                            />
                            <!-- Project Image field ends here  -->
                            <!-- Project Image field starts here  -->
                            <GradientInput
                                @input="form.image = $event.target.files[0]"
                                holder="Project Image"
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
                            <!-- Project Image field ends here  -->

                            <div class="flex justify-between w-full">
                                <ActionButton
                                    @click="ShowAddProject = false"
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
        </div>
        <Projects :Projects="props.Projects"/>
    </AuthenticatedLayout>
</template>
