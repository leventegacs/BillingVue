<script setup lang="ts">

import FormSection from "../Components/FormSection.vue";
import { LockClosedIcon } from "@heroicons/vue/24/solid";

const props = defineProps({
    inward: Object,
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

const update = () => {
    form.put(route('admin.inwards.update', props.inward.data.id), {
        preserveScroll: true,
    })
}

const confirmed = () => {
    router.put(route('admin.inwards.close', props.inward.data.id))
}
</script>

<template>
    <AppLayout title="Bevételezés szerkesztése">
        <div class="flex gap-5 justify-between items-center">
            <div class="flex items-center flex-wrap sm:gap-y-5">
                <h1 class="text-primary-dark text-2xl font-semibold mr-4">Bevételezés szerkesztése <span class="text-xs">({{ inward.data.document_number }})</span></h1>
            </div>
            <div>
                <CloseStockMove @confirmed="confirmed">
                    <template #trigger="{openModal}">
                        <PrimaryButton
                            @click.prevent="openModal"
                            :icon="LockClosedIcon"
                            color="danger"
                            label="Lezárás"
                        />
                    </template>
                </CloseStockMove>
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
                        <Column>Mennyiség</Column>
                        <Column>Nettó egységár</Column>
                    </template>
                    <template #body>
                        <Row v-for="item in form.items" :key="item.id">
                            <Cell>
                                <InputText v-model="item.name" disabled="true" />
                            </Cell>
                            <Cell>
                                <InputText v-model="item.quantity" type="number" addon="db" disabled />
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
