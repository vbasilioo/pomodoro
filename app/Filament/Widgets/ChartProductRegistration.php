<?php

namespace App\Filament\Widgets;

use App\Models\Marketplace\Product;
use Filament\Widgets\ChartWidget;

class ChartProductRegistration extends ChartWidget
{
    protected static ?string $heading = 'Product Data';

    protected function getData(): array
    {
        $productRegisters = Product::query()
            ->get()
            ->groupBy(fn($product) => $product->created_at->format('Y-m-d'))
            ->map(fn($products, $date) => [
                'x' => $date,
                'y' => $products->count(),
            ])
            ->values()
            ->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Product Registrations',
                    'data' => $productRegisters,
                    'borderColor' => '#4CAF50',
                    'backgroundColor' => 'rgba(76, 175, 80, 0.2)',
                ]
            ]
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
