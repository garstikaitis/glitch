<template>
    <div class="glitch-widget">
        <WidgetBugOverlay v-if="isInBugReportMode" @select-coords="handleClick" />
        <WidgetBugForm @submit="resetBugForm" v-if="coordinates.x && coordinates.y" :style="{top: coordinates.y + 'px', left: coordinates.x + 'px'}"/>
        <WidgetButton v-if="!isInBugReportMode" @click="handleBugReportModeToggle"/>
    </div>
</template>
<script setup>
import WidgetBugForm from '@/widget/components/WidgetBugForm.vue'
import WidgetBugOverlay from "@/widget/components/WidgetBugOverlay.vue";
import WidgetButton from "@/widget/components/WidgetButton.vue";
const isInBugReportMode = ref(false);
const coordinates = ref({x: null, y: null});
function handleClick(coords) {
    coordinates.value = coords;
    isInBugReportMode.value = false
}

function listenForClose(e) {
    if(e.key === 'Escape') resetBugForm();
}

function handleBugReportModeToggle() {
    window.addEventListener('keydown', listenForClose);
    isInBugReportMode.value = !isInBugReportMode.value
}

function resetBugForm() {
    coordinates.value = { x: null, y: null };
    isInBugReportMode.value = false
    window.removeEventListener('keydown', listenForClose);
}

</script>


<style scoped>
.glitch-widget {
    position: absolute;
    bottom: 50px;
    right: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 999;
}
</style>
