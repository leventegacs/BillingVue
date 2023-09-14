<script setup lang="ts">
    const props = defineProps({
        stockLogs: Object
    })
</script>

<template>
    <Table>
        <template #head>
            <Column>Azonosító</Column>
            <Column>Művelet</Column>
            <Column align="right">Mennyiség</Column>
        </template>
        <template #body>
            <Row v-for="log in props.stockLogs">
                <Cell>{{ log.identifier }}</Cell>
                <Cell>{{ log.action }}</Cell>
                <Cell align="right">{{ log.quantity }} darab</Cell>
            </Row>
        </template>

        <template #empty v-if="props.stockLogs.length === 0">
            <Empty colspan="6" />
        </template>
    </Table>
</template>
