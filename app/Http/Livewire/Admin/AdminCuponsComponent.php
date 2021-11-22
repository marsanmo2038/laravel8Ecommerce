<?php

namespace App\Http\Livewire\Admin;

use App\Models\coupon;
use Livewire\Component;

class AdminCuponsComponent extends Component
{


    public function deleteCoupon($coupon_id){
        
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        session()->flash('message','Coupon Has been deleted successfully');
    }


    public function render()
    {
        $coupons = coupon::all();
        return view('livewire.admin.admin-cupons-component',['coupons'=>$coupons])->layout('layouts.base');
    }
}
