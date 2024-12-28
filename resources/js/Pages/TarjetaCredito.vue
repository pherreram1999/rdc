<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="input">
            </div>
            <div>
                <label for="no_tarjeta">No. Tarjeta</label>
                <input type="text" name="no_tarjeta" id="no_tarjeta" class="input">
            </div>
            <div>
                <label>Limite</label>
                <input type="number" name="limite" id="limite" class="input">
            </div>
            <div>
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="input">
            </div>
        </div>
        <div>
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" rows="4" class="input"></textarea>
        </div>
    </form-layout>
</template>

<style scoped>

</style>
