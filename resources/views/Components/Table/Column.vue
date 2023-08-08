<script setup lang="ts">
import {mergeProps} from "vue";

const props = withDefaults(defineProps<{
    align? : 'left' | 'center' | 'right'
    sortable? : String
}>(), {
    align: 'left',
    sortable: null
})

const align = computed(() => {
    return {
        [`text-left`]: props.align === "left",
        [`text-center`]: props.align === "center",
        [`text-right`]: props.align === "right",
    };
});

const sortable = computed(() => {
    return {
        [`cursor-pointer`]: props.sortable,
    };
});




</script>

<template>
    <th
        scope="col"
        class="py-3.5 text-sm font-semibold text-gray-900 sm:px-6"
        :class="align, sortable"
    >
        <slot />
    </th>
</template>

<style scoped>

</style>
