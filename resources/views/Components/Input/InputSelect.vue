<script setup lang="ts">

const props = defineProps({
    modelValue: null,
    items: Object,
    placeholder: String
})

const emit = defineEmits<{
    (e: "update:modelValue", value: string | number): void
}>()

const value = useVModel(props, "modelValue", emit)
</script>

<template>
    <div class="flex flex-wrap items-stretch w-full relative">
        <select :value="modelValue"
                @input="$emit('update:modelValue', $event.target.value)"
                v-bind="$attrs"
                class="leading-normal w-px flex-1 border h-8 border-grey-light px-2 relative text-xs rounded-lg disabled:bg-gray-200">
            <option value="" disabled selected>{{ placeholder }}</option>
            <option v-for="item in items" :value="item.id"> {{ item.name }}</option>
        </select>
    </div>
</template>
