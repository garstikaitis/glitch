<template>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mt-10 mx-auto w-full max-w-sm">
            <form class="space-y-6" @submit.prevent="submit">
                <FloatLabel>
                    <InputText v-model="form.email" label="E-mail" type="email" name="email" id="email" autocomplete="email" required class="w-full" />
                    <label>E-mail</label>
                    <Message v-if="props.errors.email">{{props.errors.email}}</Message>
                </FloatLabel>
                <FloatLabel>
                    <InputText v-model="form.password" type="password" name="password" id="password" autocomplete="current-password" required class="w-full" />
                    <label>Password</label>
                    <Message v-if="props.errors.password">{{props.errors.password}}</Message>
                </FloatLabel>
                <Button type="submit" class="w-full">Sign in</Button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import {router} from "@inertiajs/vue3";
import {reactive} from 'vue';
interface Props {
    errors: Record<string, string>
}
const props = defineProps<Props>();

const form = reactive({email: '', password: ''});

function submit() {
    router.post('/current-session', form)
}
</script>

<style scoped>

</style>
