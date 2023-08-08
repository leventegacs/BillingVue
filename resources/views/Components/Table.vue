<script setup lang="ts">
import {MagnifyingGlassIcon} from "@heroicons/vue/24/outline";
</script>

<template>
    <slot name="filter" />
    <table
        class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg min-w-full divide-y divide-gray-300 col-span-full">
        <thead class="bg-gray-50">
        <tr class="last">
            <slot name="head" />
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200 bg-white">
        <slot name="body" />
        </tbody>
        <slot name="footer" />
    </table>
</template>
