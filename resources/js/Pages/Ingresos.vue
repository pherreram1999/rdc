<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="nombre">Ingresos</label>
                <input type="text" name="nombre" id="nombre" class="input">
            </div>
        </div>
        <div>
            <label for="observaciones">Descripcion</label>
            <textarea name="observaciones" id="observaciones" rows="4" class="input"></textarea>
        </div>
        <div>
            <label for="observaciones">Concepto</label>
            <textarea name="observaciones" id="observaciones" rows="4" class="input"></textarea>
        </div>
    </form-layout>
</template>

<style scoped>

</style>
