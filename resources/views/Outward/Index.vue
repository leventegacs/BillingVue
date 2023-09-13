<script setup lang="ts">
import {MagnifyingGlassIcon} from "@heroicons/vue/24/outline/index.js";


let props = defineProps({
    outwards: Object,
    filters: Object,
})

let search = ref(props.filters.search)

const submit = () => {
    router.get(route('admin.outwards.index'), {search: search.value}, {preserveState: true, preserveScroll: true})
}

</script>
<template>
    <AppLayout title="Bevételezés">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Kivételezés</h1>
            </div>
            <div>
                <Link :href="route('admin.outwards.create')">
                    <PrimaryButton label="Új kivételezés"/>
                </Link>
            </div>
        </div>
        <div class="grid grid-cols-8 gap-5">
            <Table class="col-span-full">
                <template #filter>
                    <form @submit.prevent="submit" class="relative mb-4 flex w-full flex-wrap items-stretch col-span-2">
                        <input
                            v-model="search"
                            type="search"
                            class="text-sm relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l-md border border-solid border-neutral-300 bg-primary-light-400 bg-clip-padding px-3 py-[0.25rem] leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary"
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
                    <Column>Dokumentum azonosító</Column>
                    <Column>Partner</Column>
                    <Column>Dátum</Column>
                    <Column>Fizetési mód</Column>
                    <Column>Státusz</Column>
                    <Column align="right">Műveletek</Column>
                </template>
                <template #body>
                    <Row v-for="outward in outwards.data">
                        <Cell>{{ outward.document_number }}</Cell>
                        <Cell>{{ outward.partner }}</Cell>
                        <Cell>{{ outward.inward_date }}</Cell>
                        <Cell>
                            <Badge :label="outward.payment_type" />
                        </Cell>
                        <Cell>
                            <Badge :color="outward.status.color" :label="outward.status.name" />
                        </Cell>
                        <Cell align="right">
                            <Link :href="outward.edit_route" class="text-primary-green-400 text-xs">
                                Szerkesztés
                            </Link>
                        </Cell>
                    </Row>
                </template>

                <template #paginate>
                    <Paginator v-if="outwards.meta.links" :links="outwards.meta.links" class="col-span-full"/>
                </template>
            </Table>
        </div>
    </AppLayout>
</template>
