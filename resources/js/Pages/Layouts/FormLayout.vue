<script setup lang="ts">
import AppLayout from "@/Layouts/AppLayout.vue";
import {usePage} from "@inertiajs/vue3";
import {ref} from "vue";

const page = usePage()

const {url} = page.props
const formNode = ref(null)

const errorMessage =  ref<string>()
const showError = ref<boolean>(false)

async function submit(){
    try {
        const form = new FormData(formNode.value)
        const {data} = await axios.post(url,form)
    } catch (e){
        if(!e.response) return

        const {
            data:  {message}
        } = e.response

        errorMessage.value = message
        showError.value = true
    }
}

</script>

<template>
    <app-layout>
        <div class="container mx-auto mt-4">
            <Transition appear>
                <div v-if="showError" class="px-4 py-2 bg-red-500 text-white rounded my-4">
                    <h5 class="text-xl font-semibold">
                        <i class="bi bi-bug"></i>
                        Error
                    </h5>
                    {{ errorMessage}}
                </div>
            </Transition>
            <form ref="formNode" @submit.prevent="submit">
                <div class="p-4 rounded bg-white shadow">
                    <slot></slot>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="btn">
                        Procesar
                    </button>
                </div>
            </form>

        </div>
    </app-layout>
</template>

<style scoped>

</style>
