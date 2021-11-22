<?php

namespace App\Http\Livewire\Admin;

use App\Models\coupon;
use Livewire\Component;

class AdminEditCuponsComponent extends Component
{

    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;
    public $expiry_date;

    public function mount($coupon_id)
    {
        
        $coupon = coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type = $coupon->type;
        $this->value = $coupon->value ;
        $this->cart_value= $coupon->cart_value;
        $this->coupon_id = $coupon->id ;
        $this->expiry_date = $coupon->expiry_date;
        
       // dd($this->coupon_id);
    }

    public function updated($fields) 
    {
       // dd($fields);
        $this->validateOnly($fields,[
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric'

        ]);
    }

    public function updateCoupon() 
    {
        $this->validate([
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'value' => 'required|numeric',
            'cart_value' => 'required|numeric'
        ]);
        

        $coupon = coupon::find($this->coupon_id);
       //dd($coupon);
       if($coupon->code === $this->code){

       }else{
        $coupon->code = $this->code;
       }
        $coupon->type = $this->type;
        $coupon->value = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('message','coupon has been created successfully');
        
    }


    public function render()
    {
        return view('livewire.admin.admin-edit-cupons-component')->layout('layouts.base');
    }
}
