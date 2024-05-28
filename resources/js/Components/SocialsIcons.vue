<script setup>

const socials = [
    {
        id: "1",
        name: "Facebook",
        icon: "square-facebook",
        color: "text-blue-600",
        link: "https://web.facebook.com/kevweJoshualee",
    },
    {
        id: "2",
        name: "Twitter",
        icon: "square-x-twitter",
        color: "",
        link: "https://x.com/codewithjoshua?s=21/",
    },
    {
        id: "3",
        name: "Linkedin",
        icon: "linkedin",
        color: "text-blue-800",
        link: "https://linkedin.com/in/joshua-oghenekevwe-560a912a0/",
    },
    {
        id: "4",
        name: "Github",
        icon: "square-github",
        color: "",
        link: "https://github.com/Joshualeexy/",
    },
    {
        id: "5",
        name: "Gmail",
        icon: "google",
        color: "text-red-700",
        link: "mailto:oghenekevwejoshualee@gmail.com",
    },
];
</script>

<template>
    <ul class="flex gap-8">
        <li v-motion-pop-visible v-for="social in socials" :key="social.id" class="flex flex-col transition-all duration-700 ease-in">
            <a :href="social.link" :class="social.color" target="_blank">
                <font-awesome-icon :icon="['fab', social.icon]" class="font-bold text-[1.5rem]" />
            </a>
        </li>
    </ul>

</template>
