<script setup lang="ts">

const props = defineProps({
    placeholder: String,
    modelValue: null,
    color: String,
    rows: Number
})

const emit = defineEmits<{
    (e: "update:modelValue", value: string | number): void
}>()

const value = useVModel(props, "modelValue", emit)
</script>

<template>
    <div class="flex flex-wrap items-stretch">
        <textarea
            class="leading-normal w-px flex-1 border border-grey-light p-2 text-sm resize-none rounded-lg"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :rows="rows"
        />
    </div>
</template>
