<script setup lang="ts">

const props = defineProps({
    links: Object
})

</script>

<template>
    <div class="flex items-center justify-between border border-gray-200 bg-white px-4 py-3 sm:px-6 rounded-md mb-10">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-end">
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <Link v-for="link in props.links"
                      v-html="link.label"
                      :href="link.url"
                      aria-current="page"
                      class="relative z-10 inline-flex items-center px-4 py-2 text-xs border border-gray-300 "
                      :class="{'text-white font-semibold bg-vue-green focus-visible:outline-indigo-600 focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2' : link.active }"
                      preserve-scroll
                />
            </nav>
        </div>
    </div>
</template>
