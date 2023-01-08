<script setup>
import {useForm} from '@inertiajs/inertia-vue3'
import {Bar} from 'vue-chartjs'
import {Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale} from 'chart.js'


defineProps({
    installment: {
        type: Number,
        default: 0
    },
    possibleInstalments: {
        type: Array,
    },
    chart: {
        type: Object,
    },
})
const mortgageForm = useForm({
    sizeOfTheLoan: '',
    interestRateOnTheLoan: '',
    lengthInMonths: '',
})

function mortgageCalc() {
    mortgageForm
        .transform(data => ({
            size_of_the_loan: data.sizeOfTheLoan,
            interest_rate_on_the_loan: data.interestRateOnTheLoan,
            length_in_months: data.lengthInMonths,
        }))
        .post('/')
}
</script>
<template>
    <div>
        <div class="antialiased font-sans">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
                <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:px-6">
                    <div class="text-center">
                        <h1 class="tracking-tight font-extrabold text-gray-900 text-4xl">
                            <span class="block text-indigo-600 xl:inline">Mortgage installment calculator</span>
                        </h1>
                    </div>
                </div>
                <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
                    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                        <form @submit.prevent="mortgageCalc">
                            <div>
                                <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Amount</label>
                                <div class="mt-1">
                                    <input type="number" step="1000" v-model="mortgageForm.sizeOfTheLoan" required
                                           class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="mt-8">
                                <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Interest rate
                                    (%)</label>
                                <div class="mt-1">
                                    <input type="number" step="0.01" v-model="mortgageForm.interestRateOnTheLoan"
                                           required
                                           class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            <div class="mt-8">
                                <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Number of
                                    months (0 - 360 months)</label>
                                <div class="mt-1">
                                    <input type="number" step="1" v-model="mortgageForm.lengthInMonths" required
                                           class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                           max="360">
                                </div>
                            </div>
                            <div class="mt-8">
                                <div class="mt-1">
                                    <button type="submit"
                                            class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                        Calculate
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md" v-if="installment">
                    <div class="text-center">
                        <h1 class="tracking-tight font-extrabold text-gray-900 text-4xl">
                            <span class="block text-indigo-600 xl:inline">Installment size</span>
                        </h1>
                    </div>
                    <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 text-center">
                        <h2 class="font-bold text-2xl">{{ installment }} zł</h2>
                    </div>
                </div>
                <apexchart :width="chart.width" :height="chart.height" :type="chart.type" :options="chart.options" :series="chart.series" v-if="installment"></apexchart>
            </div>
        </div>
    </div>
</template>
