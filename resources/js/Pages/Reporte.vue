<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
import {reactive} from "vue";


const fechas = reactive({
    fecha_inicio: undefined,
    fecha_fin: undefined
})



</script>

<template>
    <app-layout>
        <div class="container mx-auto">
            <h1 class="text-2xl font-semibold text-blue-800 my-4">
                Exportar Datos
            </h1>
            <div class="p-4 rounded bg-white shadow mt-4">
                <div class="grid grid-cols-6 gap-4">
                    <div>
                        <label for="fecha_inicial">Fecha Inicial</label>
                        <input v-model="fechas.fecha_inicio" class="input" type="date" name="fecha" id="fecha_inicial">
                    </div>
                    <div>
                        <label for="fecha_final">Fecha Final</label>
                        <input v-model="fechas.fecha_fin" class="input" type="date" name="fecha" id="fecha_inicial">
                    </div>
                    <div class="flex items-end mb-0.5">
                        <a target="_blank"
                           :href="`reporte/pdf?fecha_inicio=${fechas.fecha_inicio}&fecha_fin=${fechas.fecha_fin}`"
                            class="px-4 py-2 rounded bg-red-500 w-full text-white flex items-center justify-center"
                            :class="{ 'opacity-50 cursor-not-allowed': !fechas.fecha_inicio || !fechas.fecha_fin }"
                            :disabled="!fechas.fecha_inicio || !fechas.fecha_fin">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Expotar PDF
                        </a>
                    </div>
                    <div class="flex items-end mb-0.5">
                        <a target="_blank"
                           :href="`/reporte/exportar-csv?fecha_inicio=${fechas.fecha_inicio}&fecha_fin=${fechas.fecha_fin}`"
                           class="px-4 py-2 rounded bg-slate-500 w-full text-white flex items-center justify-center"
                           :class="{ 'opacity-50 cursor-not-allowed': !fechas.fecha_inicio || !fechas.fecha_fin }"
                           :disabled="!fechas.fecha_inicio || !fechas.fecha_fin">
                            <i class="bi bi-file-earmark-excel"></i>
                            Exportar CSV
                        </a>
                    </div>

                    <div class="flex items-end mb-0.5">
                        <a target="_blank"
                           :href="`/reporte/exportar-xlsx?fecha_inicio=${fechas.fecha_inicio}&fecha_fin=${fechas.fecha_fin}`"
                                class="px-4 py-2 rounded bg-green-600 w-full text-white"
                            :class="{ 'opacity-50 cursor-not-allowed': !fechas.fecha_inicio || !fechas.fecha_fin }"
                           :disabled="!fechas.fecha_inicio || !fechas.fecha_fin">
                            <i class="bi bi-file-earmark-excel"></i>
                            Expotar Excel
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

</style>
