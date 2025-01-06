<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Presupuestos">

    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="Ingreso_futuro">Ingreso futuro</label>
                <input type="number" name="Ingreso_futuro" id="Ingreso_futuro" class="input" step="0.01" min="0" required>
            </div>
            <div>
                <label for="Gasto_futuro">Gasto futuro</label>
                <input type="number" name="Gasto_futuro" id="Gasto_futuro" class="input" step="0.01" min="0" required>
            </div>
            <div>
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" class="input" rows="3" placeholder="Escribe las observaciones" required></textarea>
            </div>
            <div>
                <label for="fecha_estimada">Fecha estimada</label>
                <input type="date" name="fecha_estimada" id="fecha_estimada" class="input" required>
            </div>
        </div>


    </form-layout>
    </AppLayout>
</template>

<style scoped>

</style>
