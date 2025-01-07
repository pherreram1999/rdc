<script setup lang="ts">
import { ref } from "vue";
import FormLayout from "@/Pages/Layouts/FormLayout.vue";
import AppLayout from '@/Layouts/AppLayout.vue';

// Variables para datos simulados
const simulationData = ref({
    income: 0,
    expenses: 0,
    savingsGoal: 0,
    investmentAmount: 0,
    savingsDuration: 0, // Nuevo: Tiempo de ahorro en meses
    noInvestment: false, // Nuevo: Opción para no invertir
});

const simulationResults = ref<null | {
    totalSavings: number;
    monthlySavings: number; // Nuevo: Ahorro mensual necesario
    futureValue?: number;   // Modificado: Valor futuro opcional
}>(null);

// Función para calcular el escenario simulado
const calculateSimulation = () => {
    const { income, expenses, savingsGoal, investmentAmount, savingsDuration, noInvestment } = simulationData.value;
    const totalSavings = income - expenses;

    // Cálculo del ahorro mensual necesario
    const monthlySavings = savingsDuration > 0 ? savingsGoal / savingsDuration : 0;

    // Cálculo del valor futuro si se selecciona invertir
    const futureValue = !noInvestment
        ? investmentAmount * (1 + 0.05) ** 5 // Ejemplo: 5 años al 5% de retorno anual
        : undefined;

    simulationResults.value = {
        totalSavings,
        monthlySavings,
        futureValue,
    };
};

// Función para reiniciar la simulación
const resetSimulation = () => {
    simulationData.value = {
        income: 0,
        expenses: 0,
        savingsGoal: 0,
        investmentAmount: 0,
        savingsDuration: 0,
        noInvestment: false,
    };
    simulationResults.value = null;
};
</script>

<template>
    <AppLayout title="Simulación">
        <FormLayout>
            <h1>Modo Simulación Financiera</h1>
            <form @submit.prevent="calculateSimulation">
                <!-- Entrada de ingresos -->
                <div>
                    <label for="income">Ingresos Mensuales:</label>
                    <input id="income" type="number" v-model="simulationData.income" placeholder="Ej. 3000" />
                </div>

                <!-- Entrada de gastos -->
                <div>
                    <label for="expenses">Gastos Mensuales:</label>
                    <input id="expenses" type="number" v-model="simulationData.expenses" placeholder="Ej. 1500" />
                </div>

                <!-- Meta de ahorro -->
                <div>
                    <label for="savingsGoal">Meta de Ahorro:</label>
                    <input id="savingsGoal" type="number" v-model="simulationData.savingsGoal" placeholder="Ej. 10000" />
                </div>

                <!-- Tiempo de ahorro -->
                <div>
                    <label for="savingsDuration">Tiempo para Ahorro (meses):</label>
                    <input id="savingsDuration" type="number" v-model="simulationData.savingsDuration" placeholder="Ej. 12" />
                </div>

                <!-- Opción para no invertir -->
                <div>
                    <label>
                        <input type="checkbox" v-model="simulationData.noInvestment" />
                        No quiero invertir
                    </label>
                </div>

                <!-- Inversión inicial -->
                <div v-if="!simulationData.noInvestment">
                    <label for="investmentAmount">Monto de Inversión:</label>
                    <input id="investmentAmount" type="number" v-model="simulationData.investmentAmount" placeholder="Ej. 5000" />
                </div>

                <button type="submit">Calcular Simulación</button>
                <button type="button" @click="resetSimulation">Reiniciar</button>
            </form>

            <!-- Resultados -->
            <div v-if="simulationResults">
                <h2>Resultados de la Simulación</h2>
                <p>Total de Ahorros: {{ simulationResults.totalSavings }}</p>
                <p>Ahorro Mensual Necesario: {{ simulationResults.monthlySavings }}</p>
                <p v-if="simulationResults.futureValue !== undefined">
                    Valor Futuro de Inversión (5 años, 5% anual): {{ simulationResults.futureValue }}
                </p>
                <p v-else>No se realizó inversión.</p>
            </div>
        </FormLayout>
    </AppLayout>
</template>

<style scoped>
h1 {
    text-align: center;
    margin-bottom: 1rem;
}

form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    max-width: 400px;
    margin: auto;
}

label {
    font-weight: bold;
}

input {
    padding: 0.5rem;
    font-size: 1rem;
}

button {
    padding: 0.5rem 1rem;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

button[type="button"] {
    background-color: #6c757d;
}

button:hover {
    opacity: 0.9;
}

div {
    margin-bottom: 1rem;
}
</style>
