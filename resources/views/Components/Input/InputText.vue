<script setup lang="ts">

const props = defineProps({
    leading: String,
    addon: String,
    placeholder: String,
    modelValue: null,
    type: String
})

const emit = defineEmits<{
    (e: "update:modelValue", value: string | number): void
}>()

const value = useVModel(props, "modelValue", emit)
</script>

<template>
    <div class="flex flex-wrap items-stretch w-full relative">
        <div v-if="leading" class="flex -mr-px">
            <span
                class="flex items-center leading-normal bg-grey-lighter rounded-lg rounded-r-none border border-r-0 border-gray-200 px-3 whitespace-no-wrap text-grey-dark text-sm">{{
                    leading
                }}</span>
        </div>

        <input
            :type="type"
            class="leading-normal w-px flex-1 border h-8 border-grey-light px-3 relative text-xs"
            :class="{
                    'rounded-l-lg' : !leading,
                    'rounded-r-lg' : !addon
               }"
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
        >

        <div v-if="addon" class="flex -mr-px">
            <span
                class="flex items-center leading-normal bg-grey-lighter rounded-lg rounded-l-none border border-l-0 border-gray-300 px-3 whitespace-no-wrap text-grey-dark text-sm">{{
                    addon
                }}</span>
        </div>
    </div>
</template>
