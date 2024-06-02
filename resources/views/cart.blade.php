@extends('layouts.template')

@section('layout_content')
<section class="h-100 h-custom">
    <div class="container py-0 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-md-8">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Shopping Cart</h5>
                                        @if (!empty($cartItems))
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Item</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Subtotal</th>
                                                    <th scope="col">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $totalItems = 0;
                                                $subtotal = 0;
                                                @endphp
                                                @foreach ($cartItems as $index => $cartItem)
                                                <tr>
                                                    <th scope="row">{{ $index + 1 }}</th>
                                                    <td>{{ $cartItem['name'] }}</td>
                                                    <td>
                                                      @if(isset($cartItem['image']))
                                                          Image Path: {{ asset('images/' . $cartItem['image']) }}<br>
                                                          <img src="{{ asset('images/' . $cartItem['image']) }}" alt="Bean Image" style="max-width: 50px; max-height: 50px;">
                                                      @else
                                                          No Image
                                                      @endif
                                                  </td>
                                                    <td>Rp{{ $cartItem['price'] }}.000</td>
                                                    <td>
                                                        <form method="post" action="{{ route('update-cart-quantity', ['index' => $index]) }}">
                                                            @csrf
                                                            <button type="submit" name="action" value="decrease">-</button>
                                                            {{ $cartItem['quantity'] }}
                                                            <button type="submit" name="action" value="increase">+</button>
                                                        </form>
                                                    </td>
                                                    <td>Rp{{ $cartItem['price'] * $cartItem['quantity'] }}.000</td>
                                                    <td>
                                                      <form method="post" action="{{ route('remove-from-cart', ['index' => $index]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Remove</button>
                                                    </form> 
                                                    </td>
                                                </tr>
                                                @php
                                                $totalItems += $cartItem['quantity'];
                                                $subtotal += $cartItem['price'] * $cartItem['quantity'];
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        <p>No items in the cart.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                    <hr class="my-4">
    
                                    @if (!empty($cartItems))
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="text-uppercase">items {{ $totalItems }}</h5>
                                        <h5>Rp{{ $subtotal }}.000</h5>
                                    </div>
    
                                    <h5 class="text-uppercase mb-3">Shipping</h5>
    
                                    <div class="mb-4 pb-2">
                                      <option value="1">Standard-Delivery- €5.00</option>
                                        <select class="select">
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                            <option value="4">Four</option>
                                        </select>
                                    </div>
    
                                    <h5 class="text-uppercase mb-3">Give code</h5>
    
                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                            <label class="form-label" for="form3Examplea2">Enter your code</label>
                                        </div>
                                    </div>
    
                                    <hr class="my-4">
    
                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total price</h5>
                                        <h5>Rp{{ $subtotal }}.000</h5>
                                    </div>
                                    @else
                                    <p>No items in the cart.</p>
                                    @endif
    
                                    <a href="{{ route('payment') }}" class="btn btn-dark btn-block btn-lg {{ request()->routeIs('payment') ? 'active' : '' }}"
                                        data-mdb-ripple-color="dark">Payment</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
