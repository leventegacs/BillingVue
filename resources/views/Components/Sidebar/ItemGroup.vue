<script setup>
const props = defineProps({
    headers: String
})
</script>

<template>
    <nav>
        <p v-if="props.headers" class="text-xs font-semibold leading-6 text-gray-400">{{ props.headers }}</p>

        <ul role="list" class="-mx-2 mt-2 space-y-1">
            <slot/>
        </ul>
    </nav>
</template>
