<script setup lang="ts">
defineProps({
    field: String,
    label: String,
    required: false,
    error: null
})
</script>

<template>
    <div>
        <label :for="field" class="block text-sm font-medium leading-6 text-gray-900">
            {{ label }} <span v-if="required" class="text-red-600">*</span>
        </label>
        <slot/>
       <span v-if="error" class="relative text-xs text-red-600">{{ error }}</span>
    </div>
</template>
