<script setup lang="ts">
defineProps({
    field: String,
    label: String,
    required: false
})
</script>

<template>
    <div>
        <label :for="field" class="block text-sm font-medium leading-6 text-gray-900">
            {{ label }}
        </label>
        <slot/>
    </div>
</template>
