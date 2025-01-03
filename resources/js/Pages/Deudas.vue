<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="monto">Monto</label>
                <input type="number" name="monto" id="monto" class="input" step="0.01">
            </div>
            <div>
                <label for="fecha_de_pago">Fecha de pago</label>
                <input type="date" name="fecha_de_pago" id="fecha_de_pago" class="input">
            </div>
            <div>
                <label for="acreditor">Acreedor</label>
                <input type="text" name="acreditor" id="acreditor" class="input">
            </div>
        </div>
        <div>
            <label for="concepto">Concepto</label>
            <textarea name="concepto" id="concepto" rows="4" class="input"></textarea>
        </div>

    </form-layout>
</template>

<style scoped>

</style>
