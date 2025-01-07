<script setup lang="ts">

import AppLayout from "@/Layouts/AppLayout.vue";
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
                        <input class="input" type="date" name="fecha" id="fecha_inicial">
                    </div>
                    <div>
                        <label for="fecha_final">Fecha Final</label>
                        <input class="input" type="date" name="fecha" id="fecha_inicial">
                    </div>
                    <div class="flex items-end mb-0.5">
                        <button @click.prevent
                                class="px-4 py-2 rounded bg-red-500 w-full text-white">
                            <i class="bi bi-file-earmark-pdf"></i>
                            Expotar PDF
                        </button>
                    </div>
                    <div class="flex items-end mb-0.5">
                        <button @click.prevent
                                class="px-4 py-2 rounded bg-green-600 w-full text-white">
                            <i class="bi bi-file-earmark-excel"></i>
                            Expotar Excel
                        </button>
                    </div>
                    <div class="flex items-end mb-0.5">
                        <button @click.prevent
                                class="px-4 py-2 rounded bg-slate-500 w-full text-white">
                            <i class="bi bi-file-earmark-excel"></i>
                            Expotar CSV
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<style scoped>

</style>
