<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";

const props = defineProps({
    outward: Object,
})


const form = useForm({
    outward_date: props.outward.data.outward_date,
    partner: props.outward.data.partner,
    payment_type: props.outward.data.payment_type,
    comment: props.outward.data.comment,
    items: props.outward.data.items,
})
</script>

<template>
    <AppLayout title="Kivételezés szerkesztése">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Kivételezés megtekintése <span class="text-xs">({{ outward.data.document_number }})</span></h1>
            </div>
        </div>
        <FormSection>
            <template #body>
                <InputGroup class="sm:col-span-2" field="outward_date" label="Dátum" :error="form.errors.outward_date" required="true">
                    <InputText v-model="form.outward_date" type="date" disabled/>
                </InputGroup>
                <InputGroup class="sm:col-span-2" field="partner_id" label="Partner" :error="form.errors.payment_type" required="true">
                    <InputText v-model="form.partner" disabled/>
                </InputGroup>
                <InputGroup class="sm:col-span-2" field="payment_Type" label="Fizetési mód" :error="form.errors.payment_type" required="true">
                    <InputText v-model="form.payment_type" disabled />
                </InputGroup>
                <InputGroup class="sm:col-span-full" field="comment" label="Megjegyzés" :error="form.errors.comment">
                    <InputTextarea v-model="form.comment" :rows="5" disabled/>
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
                        <Row v-for="item in form.items">
                            <Cell>
                                <InputText v-model="item.name" disabled />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.quantity" type="number" addon="db" disabled />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.net_price" type="number" addon="Ft" disabled />
                            </Cell>
                        </Row>
                    </template>
                </Table>
            </template>
        </FormSection>
    </AppLayout>
</template>
