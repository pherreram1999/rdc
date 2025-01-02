<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
    <!--Cambiar para que sea ingresos en la BD-->
                <label for="Ingresos">Ingresos</label>
                <input type="number" name="Ingresos" id="Ingresos" class="input" step="0.01" min="0" required>
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
