<?php

declare(strict_types=1);

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class PossibleInstallmentSizesChart
{
    public function __construct(
        protected LarapexChart $chart,
    ) {}

    public function build(array $data): array
    {
        ksort($data);

        return $this->chart->barChart()
            ->setTitle("Possible installments sizes.")
            ->addData("Installment size", array_values($data))
            ->setXAxis(array_map(fn(float $value): string => "{$value}%", array_keys($data)))
            ->toVue();
    }
}
