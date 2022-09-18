<div>
    <div class="antialiased font-sans">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="mt-10 mx-auto max-w-screen-xl px-4 sm:px-6">
                <div class="text-center">
                    <h1
                        class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block text-indigo-600 xl:inline">Calculator</span>
                    </h1>
                    <h5>{{ props.installment }}</h5>
                </div>
            </div>
            <div class="mt-12 mx-auto max-w-full sm:max-w-md px-4 sm:px-6">
                <div class="mt-8">
                    <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Amount</label>
                    <div class="mt-1">
                        <input type="number" step="1000" wire:model="sizeOfTheLoan"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full text-3xl border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mt-8">
                    <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Interest</label>
                    <div class="mt-1">
                        <input type="number" step="0.01" wire:model="interestRateOnTheLoan"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full text-3xl border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mt-8">
                    <label for="rootFontSize" class="block text-sm font-medium text-gray-700">Number of months</label>
                    <div class="mt-1">
                        <input type="number" step="1" wire:model="lengthInMonths"
                               class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full text-3xl border-gray-300 rounded-md" max="360">
                    </div>
                </div>
                <div class="mt-8">
                    <div class="mt-1">
                        <button wire:click.prevent="calc()" type="button">Calc</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
