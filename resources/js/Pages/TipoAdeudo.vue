<script setup lang="ts">

import FormLayout from "@/Pages/Layouts/FormLayout.vue";
</script>

<template>
    <form-layout>
        <div class="grid grid-cols-4 gap-4">
            <div>
                <label for="adeudo">adeudo</label>
                <input type="number" name="adeudo" id="adeudo" class="input" step="0.01" required>
            </div>
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="input">
            </div>
        </div>
        <div>
            <label for="categoria">categoria</label>
            <textarea name="categoria" id="categoria" rows="4" class="input"></textarea>
        </div>
    </form-layout>
</template>

<style scoped>

</style>
