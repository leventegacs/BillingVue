<script setup lang="ts">
const props = defineProps({
    color: {
        type: String,
        default: 'default'
    },
    label: String
});

const color = computed(() => {
    return {
        [`bg-green-50 text-green-600 ring-green-600`]: props.color === 'success',
        [`bg-yellow-50 text-yellow-600 ring-yellow-600`]: props.color === 'warning',
        [`bg-red-50 text-red-600 ring-red-600`]: props.color === 'danger',
        [`bg-blue-50 text-blue-600 ring-blue-600`]: props.color === 'default'
    }
})
</script>

<template>
    <span class="inline-flex items-center rounded-md
                px-2 py-1 text-xs font-medium
                ring-1 ring-inset"
          :class="color">
        {{ label }}
    </span>
</template>
