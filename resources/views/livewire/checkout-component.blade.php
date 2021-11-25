<main id="main" class="main-site">
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
                <li class="item-link"><span>Checkout</span></li>
                
            </ul>
        </div>
        <div class="main-content-area">
            <form wire:submit.prevent='placeOrder'>
                <div class="row">
                    <div class="col-md-12">

                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Addres</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname" >First name <span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your Name" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{$message}}</span> @enderror

                                </p>
            
                                <p class="row-in-form">
                                    <label for="lname" >Last name <span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="Your Last Name" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
            
                                <p class="row-in-form">
                                    <label for="email" >Email <span>*</span></label>
                                    <input type="email" name="email" value="" placeholder="Your email" wire:model="email">
                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
            
                                <p class="row-in-form">
                                    <label for="phone" >phone Number <span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="phone" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
            
                                <p class="row-in-form">
                                    <label for="add" >Address :<span>*</span></label>
                                    <input type="text" name="add" value="" placeholder="Street cp" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add" >Address :<span>*</span></label>
                                    <input type="text" name="add" value="" placeholder="Street cp" wire:model="line2">
                                </p>
            
                                <p class="row-in-form">
                                    <label for="country" >Country <span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="Your country" wire:model="country">
                                    @error('country') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="province" >Province <span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Your province" wire:model="province">
                                    @error('province') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
            
                                <p class="row-in-form">
                                    <label for="zip-code" >PostCode / ZIP<span>*</span></label>
                                    <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
            
                                <p class="row-in-form">
                                    <label for="city" >Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="Your city" wire:model="city">
                                    @error('city') <span class="text-danger">{{$message}}</span> @enderror
                                </p>
                                <p class="row-in-form fill-wife">
                                    <label class="checkbox-field">
                                        <input type="checkbox" name="different-add" id="different-add" value="1" wire:model="ship_to_different">
                                            <span>Ship to a diferent addres?</span>

                                    </label>

                                </p>
            
            
                            </div>
                        
            
                        </div>

                    </div>
                

                    @if($ship_to_different)
                        <div class="col-md-12">

                            <div class="wrap-address-billing">
                                <h3 class="box-title">Shipping Addres</h3>
                                <div class="billing-address">
                                    <p class="row-in-form">
                                        <label for="fname" >First name <span>*</span></label>
                                        <input type="text" name="fname" value="" placeholder="Your Name" wire:model="s_firstname">
                                        @error('s_firstname') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                                    <p class="row-in-form">
                                        <label for="lname" >Last name <span>*</span></label>
                                        <input type="text" name="fname" value="" placeholder="Your Last Name" wire:model="s_lastname">
                                        @error('s_lastname') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                                    <p class="row-in-form">
                                        <label for="email" >Email <span>*</span></label>
                                        <input type="email" name="email" value="" placeholder="Your email" wire:model="s_email">
                                        @error('s_email') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                                    <p class="row-in-form">
                                        <label for="phone" >phone Number <span>*</span></label>
                                        <input type="number" name="phone" value="" placeholder="phone" wire:model="s_mobile">
                                        @error('s-mobile') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                                    <p class="row-in-form">
                                        <label for="add" >Address :<span>*</span></label>
                                        <input type="text" name="add" value="" placeholder="Street cp" wire:model="s_line1">
                                        @error('s_line1') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add" >Address :<span>*</span></label>
                                        <input type="text" name="add" value="" placeholder="Street cp" wire:model="s_line2">
                                    </p>
                
                
                                    <p class="row-in-form">
                                        <label for="country" >Country  <span>*</span></label>
                                        <input type="text" name="country" value="" placeholder="Your country" wire:model="s_country">
                                        @error('s_country') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                    <p class="row-in-form">
                                        <label for="add" >Province :<span>*</span></label>
                                        <input type="text" name="province" value="" placeholder="Province" wire:model="s_province">
                                        @error('s_province') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                
                                    <p class="row-in-form">
                                        <label for="zip-code" >PostCode / ZIP<span>*</span></label>
                                        <input type="number" name="zip-code" value="" placeholder="Your postal code" wire:model="s_zipcode">
                                        @error('s_zipcode') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                
                                    <p class="row-in-form">
                                        <label for="city" >Town / Cityt<span>*</span></label>
                                        <input type="text" name="city" value="" placeholder="Your city" wire:model="s_city">
                                        @error('s_city') <span class="text-danger">{{$message}}</span> @enderror
                                    </p>
                                
                
                
                                </div>
                            
                
                            </div>

                        </div>
                    @endif
                
                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input type="radio" name="payament-method" id=".payment-method-bank" value="cod" wire:model="payamentmode">
                                <span>Cash on delivery</span>
                                <span class="payment-desc">  Order Now Pay on Delivery</span>

                            </label>
                            <label class="payment-method">
                                <input  name="payment-method" id="payment-method-visa" value="card" type="radio" wire:model="payamentmode">
                                <span>Debit /Credit Card</span>
                                <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>


                            </label>
                            <label class="payment-method">
                                <input  name="payment-method" id="payment-method-visa" value="paypal" type="radio" wire:model="payamentmode">
                                <span>Paypal</span>
                                <span class="payment-desc">You can pay with your credit</span>
                                <span class="payment-desc">card if you don´t have paypal account</span>
                            </label>
                            @error('payamentmode') <span class="text-danger">{{$message}}</span> @enderror

                            

                        </div>
                        @if(Session::has('checkout'))
                        <p class="summary-info grand-total">
                            <span>Grand Total</span>
                            <span class="grand-total-price">${{Session::get('checkout')['total']}}.</span>

                        </p>
                        @endif
                        <button type="submit" class="btn btn-medium">Place order now</button>

                    </div>
                    <div class="summary-item shipping-method">
                        <h4 class="title-box f-title">Shipping method</h4>
                        <p class="summary-info"><span class="title">Flat Rate</span></p>
                        <p class="summary-info"><span class="title">Fixed $0</span></p>

                    </div>

                </div>
            </form>
    </div>

</main>