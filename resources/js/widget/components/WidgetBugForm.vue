<template>
    <form @submit.prevent="submitBugReport" class="bug-form">
        <label for="description">Describe the issue</label>
        <textarea
            id="description"
            v-model="content"
            placeholder="Tell us what went wrong..."
            rows="3"
        ></textarea>
        <button type="submit" class="submit-btn">Submit Bug Report</button>
    </form>
</template>

<script setup lang="ts">
const content = ref("")
const emit = defineEmits(['submit'])
function submitBugReport() {
    emit('submit')
}
</script>

<style scoped>

.bug-form {
    display: flex;
    flex-direction: column;
    gap: 8px;
    position: fixed;
    border: 1px solid rgba(0,0,0,0.2);
    border-radius: 8px;
    padding: 16px;
}

label {
    font-weight: 400;
    color: rgba(0,0,0,0.4);
    font-size: 12px;
}

textarea {
    padding: 12px;
    border: 2px solid #e5e7eb;
    border-radius: 8px;
    font-family: inherit;
    font-size: 14px;
    resize: none;
    transition: border-color 0.2s;
}

textarea:focus {
    outline: none;
    border-color: #6366f1;
}

textarea::placeholder {
    color: #9ca3af;
}

.submit-btn {
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.2s;
}

.submit-btn {
    background: #6366f1;
    color: white;
}

.submit-btn:hover {
    background: #4f46e5;
}
</style>
