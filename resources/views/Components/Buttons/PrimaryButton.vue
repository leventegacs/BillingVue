<script setup lang="ts">


const props = withDefaults(
    defineProps<{
        as?: 'button' | 'a'
        href?: null
        label?: null,
        icon?: null,
        color?: 'green' | 'red'
    }>()
    , {
        as: 'button',
        color: 'green'
    }
)

const color = computed(() => {
    return {
        [`bg-primary-green-400 hover:bg-primary-green-600`]: props.color === "green",
        [`bg-primary-red-400 hover:bg-primary-red-600`]: props.color === "red",
    };
});

</script>

<template>
    <Component :is="as"
               :href="href"
               class="px-2 py-2 text-vue-light text-xs rounded-md inline-flex gap-x-2"
               :class="color"
    >
        <Component :is="icon" v-if="icon" class="h-4 w-4 text-white" />
        {{ label }}
    </Component>
</template>
