@extends('User.checkoutlayout')
@section('content')
    <!-- Begin Li's Breadcrumb Area -->
    <div class="breadcrumb-area" style="height: 7%">
        <div class="container">
           
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!--Checkout Area Strat-->
{{--    <div class="checkout-area pt-60 pb-30" >--}}
    <div class="checkout-area">
        <div class="container">
                <form action="{{ route('place.order') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row" style="padding-bottom: 40px">
                        <div class="col-md-6">
                            <div class="checkbox-form">
                                <h3>Shipping Address</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkout-form-list">
                                            <label>Date<span class="required">*</span></label>
                                            <input type="date" name="datetime" value="<?php echo date('Y-m-d'); ?>" />
                                            <span class="text-danger">
                                                @error('datetime')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>            
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required"></span></label>
                                            <input type="text"
                                                   name="shippingaddress">
                                            <span class="text-danger">
                                                @error('shippingaddress')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Order number<span class="required">*</span></label>
                                            <input placeholder="Street address" value="{{random_int(100000, 999999)}}" type="text"
                                                   name="orderno">
                                            <span class="text-danger">
                                                @error('shippingaddress')
                                                {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                    </div>
                                </div>
                        <div class="col-md-6">
                            <div class="your-order">
                                <h3>Your order</h3>
                                @php
                                    $total = 0;
                                @endphp
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               
                                               
                                                <th class="cart-product-name">Food</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($carts as $c)
                                            <tr class="cart_item">
                                                <td class="cart-product-name"> {{ $c->getfood->name }}<strong    
                                                        class="product-quantity">
                                                        × {{ $c->quantity }}</strong></td>
                                                        <input type="hidden" value="{{ $c->food_id }}" name="food_id"> 
                                                        <input type="hidden" value="{{ $c->quantity }}" name="quantity">
                                                        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id"> 
                                                        <input type="hidden" value="{{ $c->restaurant_id }}" name="restaurant_id"> 
                                                <td class="cart-product-total"><span class="amount">
                                                        {{ $c->price }}</span>
                                                    @php
                                                        $total += $c->price * $c->quantity;  
                                                    @endphp
                                                </td>
                                            </tr>      
                                                   
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="cart-subtotal">  
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">
                                                     {{ $total }}</span>

                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">
                                                        {{ $total }}</span></strong>
                                            </td>
                                        </tr>
                                        <input type="hidden" value="{{ $total }}" name="total">
                                        </tfoot>
                                    </table>
                                </div>
                               
                                        <div class="order-button-payment">
                                            <input type="hidden" name="total" value="<?php echo $total; ?>">

                                            <input value="Place order" type="submit">
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </form>
            </div>
        </div>

