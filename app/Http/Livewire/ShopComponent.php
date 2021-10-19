<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;
    public $products;

    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
    }
    
    use WithPagination;    
    public function render()
    {
       
        $products = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);
        $popular_products = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);
        $categories = collect([
            ['product_id' => 'prod-100', 'name' => 'Desk'],
            ['product_id' => 'prod-200', 'name' => 'Chair'],
        ]);

        return view('livewire.shop-component', [
            'products' => $products,
            'popular_products' => $popular_products,
            'categories' => $categories
        ])->layout('layouts.base');
    }

    public function store($product_id, $product_name, $product_price)
    {
       
    }
}
