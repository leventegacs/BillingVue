<script setup lang="ts">

const props = withDefaults(
    defineProps<{
        as?: 'button' | 'a'
        href?: null
        label?: null,
        icon?: null,
        color?: 'success' | 'danger' | 'default'
    }>()
    , {
        as: 'button',
        color: 'success'
    }
)

const color = computed(() => {
    return {
        [`bg-primary-green-400 hover:bg-primary-green-600 text-primary-light-400`]: props.color === "success",
        [`bg-primary-red-400 hover:bg-primary-red-600 text-primary-light-400`]: props.color === "danger",
        [`bg-primary-light-400 hover:bg-primary-light-600 text-primary-dark-400`]: props.color === "default"
    };
});

</script>

<template>
    <Component :is="as"
               :href="href"
               class="px-4 py-2 text-xs rounded-md inline-flex gap-x-2"
               :class="color"
    >
        <Component :is="icon" v-if="icon" class="h-4 w-4 text-white" />
        {{ label }}
    </Component>
</template>
