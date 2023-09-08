<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";
import { TrashIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    products: Object,
    paymentTypes: Object,
    partners: Object,
    flash: Object
})


const form = useForm({
    outward_date: null,
    partner_id: null,
    payment_type: null,
    comment: null,
    items: [],
})

const addItem = () => {
    form.items.push({
        name: null,
        net_price: null,
        quantity: null,
    })
}

const deleteItem = (index) => {
    form.items.splice(index, 1)
}

onMounted(() => {
    addItem()
})

watch(form.items, () => {
    if(form.items.length == 0) {
        addItem();
    }
})

const create = () => {
    form.post(route('admin.outwards.store'), {
        onSuccess: () => form.reset()
    })
}
</script>

<template>
    <AppLayout title="Új bevételezés">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Új kivételezés</h1>
            </div>
        </div>

        Teszt: {{ $page.props.flash.message }}

        <FormSection :submit="create">
            <template #body>
                <InputGroup class="sm:col-span-2" field="outward_date" label="Dátum" :error="form.errors.outward_date" required="true">
                    <InputText v-model="form.outward_date" type="date" />
                </InputGroup>
                <InputGroup class="sm:col-span-2" field="partner_id" label="Partner" :error="form.errors.payment_type" required="true">
                    <InputSelect v-model="form.partner_id" :items="partners" placeholder="Válassz a partnerek közül"/>
                </InputGroup>
                <InputGroup class="sm:col-span-2" field="payment_Type" label="Fizetési mód" :error="form.errors.payment_type" required="true">
                    <InputSelect v-model="form.payment_type" :items="paymentTypes" placeholder="Válassz a fizetési módok közül"/>
                </InputGroup>
                <InputGroup class="sm:col-span-full" field="comment" label="Megjegyzés" :error="form.errors.comment">
                    <InputTextarea v-model="form.comment" :rows="5"/>
                </InputGroup>
            </template>

            <template #table>
                <Table class="col-span-full">
                    <template #head>
                        <Column>Termék</Column>
                        <Column>Mennyiség</Column>
                        <Column>Nettó egységár</Column>
                        <Column align="right">Műveletek</Column>
                    </template>
                    <template #body>
                        <Row v-for="(item, index) in form.items">
                            <Cell>
                                <InputSelect v-model="item.product_id" :items="products" placeholder="Válassz a termékek közül"/>
                            </Cell>
                            <Cell>
                                <InputText v-model="item.quantity" type="number" />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.net_price" type="number" addon="Ft" />
                            </Cell>
                            <Cell align="right">
                                <PrimaryButton :icon="TrashIcon" color="red" @click.prevent="deleteItem(index)" />
                            </Cell>
                        </Row>
                    </template>
                </Table>
            </template>
            <template #footer>
                <PrimaryButton label="Hozzzáadás" @click.prevent="addItem()" /><PrimaryButton label="Létrehozás" :disabled="form.processing" />
            </template>
        </FormSection>
    </AppLayout>
</template>
