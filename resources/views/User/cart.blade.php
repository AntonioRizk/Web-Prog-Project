@extends('User.cartlayout')

@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                             
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span> 
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $total = 0;
                            ?>
                              @foreach ($cartItems as $item)
                            <tr>
                              
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->getfood->name }}</p>
                                  
                                </a>  
                              </td>  
                              <td class="justify-center mt-6 md:justify-end md:flex">   
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update',$item->id) }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="food_id" value="{{ $item->food_id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>     
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST"> 
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600">x</button>
                                 
                              </form>
                                
                              </td>
                            </tr>
                           
                            <?php
                            $total = $total + $item->quantity * $item->price;
                            ?>
                            @endforeach
                             
                          </tbody>
                        </table>  
                        <div>
                         Total: {{$total}}
                        </div>
                        <a class="btn" style="background-color: #4CAF50" href="{{route('checkout',$item->user_id)}}">Checkout</a>


                      </div>
                    </div> 
                  </div>
            </div>
        </main>
    