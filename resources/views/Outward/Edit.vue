<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";
import { TrashIcon } from "@heroicons/vue/24/outline";

const props = defineProps({
    outward: Object,
    products: Object,
    paymentTypes: Object,
    partners: Object
})

console.log(props.outward.data)


const form = useForm({
    outward_date: props.outward.data.outward_date,
    partner_id: props.outward.data.partner_id,
    payment_type: props.outward.data.payment_type,
    comment: props.outward.data.comment,
    items: props.outward.data.items,
})

const update = () => {
    form.put(route('admin.outwards.update', props.outward.data.id), {
        preserveScroll: true,
    })
}
</script>

<template>
    <AppLayout title="Kivételezés szerkesztése">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Kivételezés szerkesztése <span class="text-xs">({{ outward.data.document_number }})</span></h1>
            </div>
        </div>
        <FormSection :submit="update">
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
                    </template>
                    <template #body>
                        <Row v-for="(item, index) in form.items">
                            <Cell>
                                <InputText v-model="item.name" disabled="true" />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.quantity" type="number" addon="db" disabled="true" />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.net_price" type="number" addon="Ft" />
                            </Cell>
                        </Row>
                    </template>
                </Table>
            </template>
            <template #footer>
                <PrimaryButton label="Mentés" :disabled="form.processing" />
            </template>
        </FormSection>
    </AppLayout>
</template>
