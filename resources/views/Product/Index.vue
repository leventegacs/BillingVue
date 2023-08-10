<script setup>
import {MagnifyingGlassIcon} from "@heroicons/vue/24/outline/index.js";

let props = defineProps({
    products: Object,
    filters: Object,
})

let search = ref(props.filters.search)

const submit = () => {
    router.get(route('admin.products.index'), {search: search.value}, {preserveState: true, preserveScroll: true})
}

</script>
<template>
    <AppLayout title="Termékek">
        <div class="flex gap-5 justify-between items-center mb-8">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-vue-dark text-2xl font-semibold mr-4">Termékek</h1>
            </div>
            <div>
                <PrimaryButton as="a" :href="route('admin.products.create')" label="Új termék létrehozása"/>
            </div>
        </div>
        <div class="grid grid-cols-8 gap-5">
            <Table>
                <template #filter>
                    <form @submit.prevent="submit" class="relative mb-4 flex w-full flex-wrap items-stretch col-span-2">
                        <input
                            v-model="search"
                            type="search"
                            class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-vue-light bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            placeholder="Keresés..."
                            aria-label="Search"
                            aria-describedby="button-addon1"/>

                        <button
                            @click="submit"
                            class="relative z-[2] flex items-center rounded-r bg-vue-green px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                            type="button"
                            id="button-addon1"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            <MagnifyingGlassIcon class="h-5 w-5"/>
                        </button>
                    </form>
                </template>
                <template #head>
                    <Column>ID</Column>
                    <Column>Megnevezés</Column>
                    <Column>Nettó ár</Column>
                    <Column>Termékkód</Column>
                    <Column align="right">Műveletek</Column>
                </template>
                <template #body>
                    <Row v-for="product in products.data">
                        <Cell>{{ product.id }}</Cell>
                        <Cell>{{ product.name }}</Cell>
                        <Cell>{{ product.net_price }}</Cell>
                        <Cell>{{ product.identifier }}</Cell>
                        <Cell align="right">
                            <PrimaryButton label="Szerkesztés"/>
                        </Cell>
                    </Row>
                </template>
            </Table>

            <Paginator v-if="products.meta.links" :links="products.meta.links" class="col-span-full"/>
        </div>
    </AppLayout>
</template>
