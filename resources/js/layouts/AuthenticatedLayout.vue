<template>
    <Layout>
        <div class="min-h-screen bg-surface-50">
            <TheSidebar />
            <TheHeader />

            <main class="ml-64 pr-6">
                <slot></slot>
            </main>
        </div>
    </Layout>
</template>

<script setup lang="ts">

</script>
