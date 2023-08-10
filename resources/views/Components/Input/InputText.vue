<script setup lang="ts">
defineProps({
    leading: String,
    addon: String,
    name: String,
    placeholder: String,
    required: false,
})
</script>

<template>
    <div class="flex flex-wrap items-stretch w-full relative">
        <div v-if="leading" class="flex -mr-px">
            <span
                class="flex items-center leading-normal bg-grey-lighter rounded-lg rounded-r-none border border-r-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">{{
                    leading
                }}</span>
        </div>

        <input
               v-model="name"
               class="leading-normal w-px flex-1 border h-10 border-grey-light px-3 relative text-sm"
               :class="{
                    'rounded-l-lg' : !leading,
                    'rounded-r-lg' : !addon
               }"
               :placeholder="placeholder"
               :required="required"
        >

        <div v-if="addon" class="flex -mr-px">
            <span
                class="flex items-center leading-normal bg-grey-lighter rounded-lg rounded-l-none border border-l-0 border-grey-light px-3 whitespace-no-wrap text-grey-dark text-sm">{{
                    addon
                }}</span>
        </div>
    </div>
</template>
