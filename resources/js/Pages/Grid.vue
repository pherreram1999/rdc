<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";
import {ref} from "vue";

interface GridColumn {
    label: string,
    column: string,
    table: string
}

interface Action {
    icon: string,
    label: string,
    url: string
}

interface GridRow {
    data: any[]
    actions: Action[]
}

interface GridToolbar {
    actions: Action[]
}

type GridColumnCollection = Record<string, GridColumn>


interface Props {
    title: string
    columns: GridColumnCollection,
    rows: GridRow[],
    toolbar: GridToolbar
}

defineProps<Props>()

const query = ref<string>('')
const timer = ref()

const delay = 700


function buscar(){


}

</script>

<template>
    <app-layout>
        <div class="container mx-auto">
            <div class="flex justify-between items-center">
                <h1 class="py-2 text-2xl text-blue-800 font-semibold my-4">{{ title }}</h1>
                <div class="w-[30rem] flex gap-4">
                    <div class="flex items-center rounded shadow">
                        <select name="columna" id="columna" class="rounded-l flex-shrink border-0 border-r border-stone-200">
                            <option v-for="col of columns">{{ col.label }}</option>
                        </select>
                        <input type="text"
                               placeholder="buscar"
                               name="buscar"
                               v-model="query"
                               class="w-full flex-grow px-4 py-2 rounded-r border border-none"
                               id="buscar">
                    </div>
                    <button
                        @click.prevent="buscar"
                        class="px-4 py-2 whitespace-nowrap bg-blue-800 rounded text-white">
                        <i class="bi bi-search"></i>
                        Buscar
                    </button>
                </div>
            </div>
            <div class="flex">
                <Link class="px-4 py-2 rounded bg-white shadow mb-2 border-b-4" v-for="l of toolbar.actions" :href="l.url">
                    <i :class="['bi',l.icon]"></i>
                    {{ l.label }}
                </Link>
            </div>
            <div class="rounded overflow-hidden shadow">
                <table class="w-full bg-white">
                    <thead>
                    <tr class="text-left">
                        <th class="px-4 py-2 border-b border-stone-200">Acciones</th>
                        <th class="px-4 py-2 border-b border-stone-200" v-for="col of columns">
                            {{ col.label }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="r of rows">
                            <td class="px-4 py-2 border-b border-slate-100">
                                <ul class="flex gap-4">
                                    <li v-for="a of r.actions">
                                        <Link :title="a.label" :href="a.url">
                                            <i :class="['bi',a.icon]"></i>
                                        </Link>
                                    </li>
                                </ul>
                            </td>
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
