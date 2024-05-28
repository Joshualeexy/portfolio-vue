<script setup>
import Section from "@/Components/NewSection.vue";
import { ref,computed } from "vue";
import GradientHeading from "@/Components/GradientHeading.vue";
import SkillList from "@/Components/SkillList.vue";
import TabNav from "@/Components/TabNav.vue";
const TabNavList = ["Frontend", "Backend", "Others"];
const activeTab = ref("Frontend");

const props = defineProps(['skills'])
const Skills = computed(() => {
    return props.skills.filter(
        (arr) => arr.category.toLowerCase() == activeTab.value.toLowerCase()
    );
});

function setActiveTab(i) {
    activeTab.value = i;
}
</script>

<template>
    <Section>
        <div class="flex flex-col justify-center items-center p-0">
            <GradientHeading text="SKILLS" v-motion-pop-visible />
            <!--Tabs navigation-->
            <TabNav
                :TabNavList="TabNavList"
                :selected="activeTab"
                @makeActive="setActiveTab"
            />

            <SkillList :Skills="Skills" />
        </div>
    </Section>
</template>
