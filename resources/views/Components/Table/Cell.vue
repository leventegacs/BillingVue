<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        align?: 'left' | 'center' | 'right'
    }>(), {
        align: 'left',
    }
)

const align = computed(() => {
    return {
        [`text-left`]: props.align === "left",
        [`text-center`]: props.align === "center",
        [`text-right`]: props.align === "right",
    };
});

</script>

<template>
    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-900 sm:px-6"
        :class="align"
        v-bind="$attrs"
    >
        <slot/>
    </td>
</template>
