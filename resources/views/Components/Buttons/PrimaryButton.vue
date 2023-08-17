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
        [`bg-vue-green`]: props.color === "green",
        [`bg-vue-red`]: props.color === "red",
    };
});

</script>

<template>
    <Component :is="as"
               :href="href"
               class="bg-vue-green px-2 py-2 text-vue-light text-xs rounded-md hover:bg-vue-dark inline-flex gap-x-2"
               :class="color"
    >
        <Component :is="icon" v-if="icon" class="h-4 w-4 text-white" />
        {{ label }}
    </Component>
</template>
