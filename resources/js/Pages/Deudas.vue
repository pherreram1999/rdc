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
        </div>
        <div>
            <label for="Descripcion">Descripción</label>
            <textarea name="Descripcion" id="Descripcion" rows="4" class="input"></textarea>
        </div>
    </form-layout>
</template>

<style scoped>

</style>
