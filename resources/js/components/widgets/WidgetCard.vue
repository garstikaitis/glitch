<template>
    <Card class="p-4">
    <template #title>
        <div class="flex items-center">
             <img class="aspect-square h-8 mr-2" :src="`https://favicon.is/${widget.domain}`" />
            <a :href="`https://${widget.domain}`" target="_blank">{{widget.name}}</a>
        </div>
    </template>
    <template #subtitle><a :href="`https://${widget.domain}`" target="_blank">{{widget.domain}}</a></template>
        <template #content>
            <div class="bg-gray-800 p-4 rounded-md">
            <code class="m-0 ">
                {{
                embedCode
                }}
            </code>
            </div>
        </template>
        <template #footer>
            <div class="flex gap-4 mt-1">
                <Button icon="pi pi-clipboard" label="Copy embed code" severity="secondary" variant="link" class="w-full" @click="copyEmbedCode" />
                <Button label="Reports" severity="secondary" variant="link" class="w-full" />
            </div>
        </template>
    </Card>
</template>
<script setup lang="ts">
import { useClipboard } from '@vueuse/core'
import {useToast} from "primevue/usetoast";

interface Props {
    widget: Widget
}
const props = defineProps<Props>()
const toast = useToast();

const embedCode = computed(() => {
    return `<script src="https://${window.location.hostname}/widgets/${props.widget.uuid}/embed" defer><\/script>`;
})
function copyEmbedCode() {
    const { copy } = useClipboard({ legacy: true });
    copy(embedCode.value);
    toast.add({
        summary: 'Copied to clipboard!',
        severity: 'success',
        life: 1000
    })
}
</script>

