<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="Monto">Monto</label>
                <input type="number" name="Monto" id="Monto" class="input" step="0.001" min="0" required>
            </div>
            <div>
                <label for="Fecha">Fecha</label>
                <input type="date" name="Fecha" id="Fecha" class="input" required>
            </div>
        </div>
        <div>
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" id="Descripcion" rows="4" class="input"></textarea>
        </div>
        <div>
            <label for="Concepto">Concepto</label>
            <textarea name="Concepto" id="Concepto" rows="4" class="input"></textarea>
        </div>
    </form-layout>
</template>

<style scoped>

</style>
