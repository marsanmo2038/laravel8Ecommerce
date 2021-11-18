<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Cart;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

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
       
        if($this->sorting == 'date'){
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pagesize);
        }
        else if($this->sorting == 'price'){
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pagesize);
           // dd($products, 'sort by precio');
        }
        else if($this->sorting == 'price-desc'){
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pagesize);
        }
        else{
            $products = Product::paginate($this->pagesize);
        }
        
        $popular_products = Product::inRandomOrder()->limit(4)->get();

        $categories = Category::all();

        return view('livewire.shop-component', [
            'productss' => $products,
            'popular_products' => $popular_products,
            'categories' => $categories
        ])->layout('layouts.base');
    }


    public function addToWishlist($product_id, $product_name, $product_price)
    {
        //dd(Cart::instance('whislist')->content()->pluck('id')); 
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        
        $this->emitTo('wishlist-count-component','refreshComponent');

        //session()->flash('success_message', 'Item added in Wishlist');
    }

    public function removeFromWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }

        }  
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
       
        // Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Item added in Cart');

        return redirect()->route('product.cart');
    }
}
