<script setup lang="ts">
defineProps({
    title: String,
    description: String,
    submit: null,
})
</script>

<template>
    <form @submit.prevent="submit" class="bg-vue-light text-primary-dark border-2 p-4 rounded-lg space-y-8">
        <div v-if="title || description">
            <h2 class="text-sm font-semibold leading-7 text-gray-900">{{ title }}</h2>
            <p class="mt-1 text-xs leading-6 text-gray-600">{{ description }}</p>
        </div>
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <slot name="body"/>
        </div>

        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <slot name="table"/>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <slot name="footer"/>
        </div>
    </form>
</template>
