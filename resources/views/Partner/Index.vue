<script setup lang="ts">
import {MagnifyingGlassIcon} from "@heroicons/vue/24/outline/index.js";


let props = defineProps({
    partners: Object,
    filters: Object,
})

let search = ref(props.filters.search)

const submit = () => {
    router.get(route('admin.partners.index'), {search: search.value}, {preserveState: true, preserveScroll: true})
}

</script>
<template>
    <AppLayout title="Bevételezés">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Partnerek</h1>
            </div>
            <div>
                <Link :href="route('admin.partners.create')">
                    <PrimaryButton label="Új partner"/>
                </Link>
            </div>
        </div>
        <div class="grid grid-cols-8 gap-5">
            <Table>
                <template #filter>
                    <form @submit.prevent="submit" class="relative mb-4 flex w-full flex-wrap items-stretch col-span-2">
                        <input
                            v-model="search"
                            type="search"
                            class="text-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l-md border border-solid border-neutral-300 bg-vue-light bg-clip-padding px-3 py-[0.25rem] leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
                            placeholder="Keresés..."
                            aria-label="Search"
                            aria-describedby="button-addon1"/>

                        <button
                            @click="submit"
                            class="relative z-[2] flex items-center rounded-r-md bg-primary-green-400 px-6 py-1.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-primary-700 hover:shadow-lg focus:bg-primary-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                            type="button"
                            id="button-addon1"
                            data-te-ripple-init
                            data-te-ripple-color="light">
                            <MagnifyingGlassIcon class="h-5 w-5"/>
                        </button>
                    </form>
                </template>
                <template #head>
                    <Column>Név</Column>
                    <Column>Adószám</Column>
                    <Column>Irányítószám</Column>
                    <Column>Város</Column>
                    <Column>Utca</Column>
                    <Column>Házszám</Column>
                    <Column align="right">Műveletek</Column>
                </template>
                <template #body>
                    <Row v-for="partner in partners.data">
                        <Cell>{{ partner.name }}</Cell>
                        <Cell>{{ partner.tax_number }}</Cell>
                        <Cell>{{ partner.postal_code }}</Cell>
                        <Cell>{{ partner.city }}</Cell>
                        <Cell>{{ partner.street }}</Cell>
                        <Cell>{{ partner.house_number }}</Cell>
                        <Cell align="right">
                            <Link :href="route('admin.partners.edit', partner.id)" class="text-primary-green-400 text-xs">
                                Szerkesztés
                            </Link>
                        </Cell>
                    </Row>
                </template>

                <template #paginate>
                    <Paginator v-if="partners.meta.links" :links="partners.meta.links" class="col-span-full"/>
                </template>
            </Table>
        </div>
    </AppLayout>
</template>
