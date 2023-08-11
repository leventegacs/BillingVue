<script setup lang="ts">

</script>

<template>
    <slot name="filter" />
    <table
        class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 min-w-full rounded-md divide-y divide-gray-300 col-span-full">
        <thead class="bg-gray-50">
        <tr class="last">
            <slot name="head" />
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
        <slot name="body" />
        </tbody>
    </table>
    <slot name="paginate" />
</template>
