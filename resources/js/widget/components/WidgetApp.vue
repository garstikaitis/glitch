<template>
    <div class="glitch-widget">
        <WidgetBugOverlay v-if="isInBugReportMode" @select-coords="handleClick" />
        <WidgetBugForm @submit="resetBugForm" v-if="coordinates.x && coordinates.y" :style="{top: coordinates.y + 'px', left: coordinates.x + 'px'}"/>
        <WidgetButton v-if="!isInBugReportMode" @click="handleBugReportModeToggle"/>
    </div>
</template>
<script setup lang="ts">
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

function resetBugForm(comment: string) {
    fetch('https://glitch.test/api/widgets/bb2b7323-c4d1-40db-9afc-ddbee6ef987b/submits', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            comment,
            coordinate_x: coordinates.value.x,
            coordinate_y: coordinates.value.y,
            page_url: window.location.href,
            user_agent: navigator.userAgent,
        })
    })
    coordinates.value = { x: null, y: null };
    isInBugReportMode.value = false;
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
