<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";
import { TrashIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    inward: Object,
    items: Object,
    products: Object,
    paymentTypes: Object,
    partners: Object
})


const form = useForm({
    inward_date: props.inward.data.inward_date,
    partner_id: props.inward.data.partner_id,
    payment_type: props.inward.data.payment_type,
    comment: props.inward.data.comment,
    items: props.inward.data.items,
})

const addItem = () => {
    form.items.push({
        'id': null,
        name: null,
        net_price: null,
        quantity: null,
    })
}

const deleteItem = (index) => {
    form.items.splice(index, 1)
}

watch(form.items, () => {
    if(form.items.length == 0) {
        addItem();
    }
})

const update = () => {
    form.put(route('admin.inwards.update', props.inward.data.id), {
        preserveScroll: true,
    })
}
</script>

<template>
    <AppLayout title="Bevételezés szerkesztése">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Bevételezés szerkesztése <span class="text-xs">({{ inward.data.document_number }})</span></h1>
            </div>
        </div>
        <FormSection :submit="update">
            <template #body>
                <InputGroup class="sm:col-span-2" field="inward_date" label="Dátum" :error="form.errors.inward_date" required="true">
                    <InputText v-model="form.inward_date" type="date" />
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
                        <Column>Nettó egységár</Column>
                        <Column>Mennyiség</Column>
                        <Column align="right">Műveletek</Column>
                    </template>
                    <template #body>
                        <Row v-for="(item, index) in form.items">
                            <Cell>
                                <InputSelect v-model="item.product_id" :items="products" placeholder="Válassz a termékek közül"/>
                            </Cell>
                            <Cell>
                                <InputText v-model="item.net_price" type="number" addon="Ft" />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.quantity" type="number" addon="db" />
                            </Cell>
                            <Cell align="right">
                                <PrimaryButton :icon="TrashIcon" color="red" @click.prevent="deleteItem(index)" />
                            </Cell>
                        </Row>
                    </template>
                </Table>
            </template>
            <template #footer>
                <PrimaryButton label="Új tétel" @click.prevent="addItem()" />
                <PrimaryButton label="Mentés" :disabled="form.processing" />
            </template>
        </FormSection>
    </AppLayout>
</template>
