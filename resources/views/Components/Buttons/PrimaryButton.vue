<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        as? : 'a' | 'button'
        label? : string
    }>()
    , {
        as : 'button'
    }
)

</script>

<template>
    <Component :is="as" class="bg-vue-green px-4 py-1.5 text-vue-light text-sm rounded-md hover:bg-vue-dark">
        {{ label }}
    </Component>
</template>
