<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import Grid from "@/Pages/Grid.vue";

interface GridColumn {
    label: string,
    column: string,
    table: string
}

interface GridRow {
    data: any[]
}

type GridColumnCollection = Record<string, GridColumn>


interface Props {
    title: string
    columns: GridColumnCollection,
    rows: GridRow[]
}

defineProps<Props>()

</script>

<template>
    <app-layout>
        <div class="container mx-auto">
            <h1 class="py-2 text-2xl text-blue-800 font-semibold my-4">{{ title }}</h1>
            <div class="rounded overflow-hidden shadow">
                <table class="w-full bg-white">
                    <thead>
                    <tr class="text-left">
                        <th class="px-4 py-2 border-b border-stone-200" v-for="col of columns">
                            {{ col.label }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r of rows">
                            <td class="px-4 py-2 border-b border-slate-100" v-for="d of r.data">
                                {{ d }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

</style>
