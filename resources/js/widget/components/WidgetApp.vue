<template>
    <div class="glitch-widget">
        <div v-if="isInBugReportMode" @click="captureClick" class="bug-overlay">
            <div class="bug-hint">Click anywhere to report a bug</div>
        </div>
        <div class="bug-form" v-if="coordinates.x && coordinates.y" :style="{top: coordinates.y + 'px', left: coordinates.x + 'px'}">
            Form
        </div>
        <button v-if="!isInBugReportMode" @click="handleOpen" class="bubble"> <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><!-- Icon from Gitlab SVGs by GitLab B.V. - https://gitlab.com/gitlab-org/gitlab-svgs/-/blob/main/LICENSE --><path fill="currentColor" fill-rule="evenodd" d="M4 1.75A.75.75 0 0 1 4.75 1h.5C6.216 1 7 1.784 7 2.75v.35a5 5 0 0 1 2 0v-.35C9 1.784 9.784 1 10.75 1h.5a.75.75 0 0 1 0 1.5h-.5a.25.25 0 0 0-.25.25v.919A5.02 5.02 0 0 1 12.584 6h1.666a.75.75 0 0 1 0 1.5h-1.275Q13 7.746 13 8v.5h1.25a.75.75 0 0 1 0 1.5H13q0 .514-.1 1h1.35a.75.75 0 0 1 0 1.5h-1.919A5 5 0 0 1 8 15a5 5 0 0 1-4.331-2.5H1.75a.75.75 0 0 1 0-1.5H3.1a5 5 0 0 1-.1-1H1.75a.75.75 0 0 1 0-1.5H3V8q0-.254.025-.5H1.75a.75.75 0 0 1 0-1.5h1.666A5.02 5.02 0 0 1 5.5 3.669V2.75a.25.25 0 0 0-.25-.25h-.5A.75.75 0 0 1 4 1.75M11.5 8v2a3.5 3.5 0 0 1-2.75 3.42V7.5h2.715q.035.245.035.5m-4.25-.5v5.92A3.5 3.5 0 0 1 4.5 10V8q0-.255.035-.5zM10.873 6H5.127A3.5 3.5 0 0 1 8 4.5c1.19 0 2.24.593 2.873 1.5" clip-rule="evenodd"/></svg>
        </button>

    </div>
</template>
<script setup>
const isInBugReportMode = ref(false)
const coordinates = ref({x: null, y: null})
function handleOpen() {
    isInBugReportMode.value = !isInBugReportMode.value
}

function captureClick(e) {
    const x = e.clientX;
    const y = e.clientY;
    const width = window.innerWidth;
    const height = window.innerHeight;

    console.log('Bug at:', { x, y, width, height });

    isInBugReportMode.value = false;
    coordinates.value = {
        x, y
    }
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
.bug-form {
    position: fixed;
    background: red;
}
.bubble {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: #6366f1;
    border: none;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}
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
</style>
