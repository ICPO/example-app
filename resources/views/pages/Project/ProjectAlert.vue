<template>
<div class="project-alert">
    <div class="text">
        <slot />
    </div>
    <div class="closer"></div>
</div>
</template>

<script setup>
const props = defineProps({
    notUsedProp: String, // (17)
});

function closeAlert(){ // (19)
}
</script>

<style lang="scss">
.project-alert { // (18)
    background-color: var(--yellow);
}
.project-alert .text { // (20)
    // ...
}
</style>