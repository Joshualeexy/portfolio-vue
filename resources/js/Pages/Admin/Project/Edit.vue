<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ActionButton from "@/Components/ActionButton.vue";
import Heading from "@/Components/Heading.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import GradientInput from "@/Components/GradientInput.vue";
import { useToast } from "vue-toastification";
import InputError from "@/Components/InputError.vue";
import { router, usePage } from "@inertiajs/vue3";
import { useForm, Head } from "@inertiajs/vue3";


const toast = useToast();
const page = usePage();

function SaveEditedProject() {
    router.post(route("project.update", props.Project.id), {
        name: form.name,
        category: form.category,
        category_other: form.category_other,
        description: form.description,
        skills: form.skills,
        preview: form.preview,
        preview_url: form.preview_url,
        source: form.source,
        source_url: form.source_url,
        image: form.image,
        share: true,
        other: "other",
        _method: "put",
        preserveScroll: true,
    });
}
const props = defineProps(["Project"]);
const registeredCategory = ["frontend", "backend", "other"];

const form = useForm({
    name: props.Project.name,
    category: registeredCategory.includes(props.Project.category.value)
        ? props.Project.category.value
        : "other",
    category_other: props.Project.category,
    description: props.Project.description,
    skills: props.Project.skills,
    preview: props.Project.preview,
    preview_url: props.Project.preview_url,
    source: props.Project.source,
    source_url: props.Project.source_url,
    image: props.Project.image,
    share: true,
    other: "other",
});
</script>
<template>
    <Head title="Projects " />

    <AuthenticatedLayout>
        <div class="flex w-full justify-end mb-10">
            <Link :href="route('admin.project')"
                ><ActionButton
                    @click="ShowAddProject = !ShowAddProject"
                    icon="chevron-left"
                    text="Go Back"
                    class="w-max border-purple-500 text-purple-500 hover:bg-purple-500 hover:border-purple-400 active:bg-gray-200"
            /></Link>
        </div>
        <div class="h-full w-full mb-16">
            <form
                @submit.prevent="SaveEditedProject"
                class="m-auto relative p-6 w-10/12 sm:w-6/12 flex flex-col justify-center bg-white items-center gap-2 bg-whitw rounded-xl shadow-2xl"
            >
                <div class="">
                    <Heading title="Edit Project" />
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
                        :label="page.props.errors.name"
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
                        :label="page.props.errors.category_other"
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
                        :label="page.props.errors.description"
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
                        :label="page.props.errors.preview"
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
                        :label="page.props.errors.preview_url"
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
                        :label="page.props.errors.source"
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
                        :label="page.props.errors.source_url"
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
                        :label="page.props.errors.skills"
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
                        :label="page.props.errors.image"
                        class="w-full"
                    />
                    <!-- Project Image field ends here  -->

                    <div class="flex justify-between w-full">
                        <PrimaryButton
                            v-motion-pop-visible
                            :disabled="form.processing"
                            text="Save"
                            icon="check"
                            class="rounded-lg py-3 px-10"
                        />
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
