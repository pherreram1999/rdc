<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Quincenas">

    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="Monto">Monto</label>
                <input type="number" name="Monto" id="Monto" class="input" step="0.001" min="0" required>
            </div>
            <div>
                <!--Monto apartado siempre debe ser menor al monto -->
                <label for="Monto_apartado">Monto apartado</label>
                <input type="number" name="Monto_apartado" id="Monto_apartado" class="input" step="0.001" min="0" required>
            </div>
        </div>

    </form-layout>
    </AppLayout>

</template>

<style scoped>

</style>
