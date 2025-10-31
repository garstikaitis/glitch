

<template>
    <div @click="captureClick" @mousemove="updateMousePos" class="bug-overlay">
        <div class="bug-hint" :style="{ left: mouseX + 'px', top: mouseY + 'px' }">
            Click anywhere to report a bug
        </div>
    </div>
</template>
<script setup lang="ts">

const mouseX = ref(0);
const mouseY = ref(0)
const coordinates = ref({x: null, y: null})
const emit = defineEmits(['select-coords'])
function updateMousePos(e) {
    mouseX.value = e.clientX + 15;
    mouseY.value = e.clientY + 15;
};
function captureClick(e) {
    const x = e.clientX;
    const y = e.clientY;
    const width = window.innerWidth;
    const height = window.innerHeight;

    console.log('Bug at:', { x, y, width, height });
    mouseX.value = 0;
    mouseY.value = 0;

    coordinates.value = {
        x, y
    }

    emit('select-coords', { ...coordinates.value })
}
</script>
<style scoped>
.bug-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.1);
    cursor: crosshair;
    z-index: 999998;
}

.bug-hint {
    position: fixed;
    background: white;
    padding: 12px 24px;
    border-radius: 8px;
    font-weight: 600;
    pointer-events: none;
    transform: translate(-50%, -50%);
}
</style>
