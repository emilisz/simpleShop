@extends('layouts.app')

@section('title', 'Companies')


@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col-lg-4 col-sm-6 col-12">
      @if($product->image)
      <img src="{{url('storage/'.$product->image)}}" class="card-img-top img-thumbnail" alt="...">
      @else
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/240px-No_image_available.svg.png" class="card-img-top img-thumbnail" alt="...">
      @endif
    </div>
    <div class="col-lg-8 col-sm-6 col-12 mt-3">
      <h3>{{$product->name}}</h3>
      <span class="text-muted">SKU: {{$product->sku}}</span>
      <p class="d-none d-lg-block p-3">{!!$product->description!!}</p>
      <h3><span class="badge badge-success float-right">
        @if($product->tax_price > 0)
                {{$product->tax_price}} 
                @else 
                0
                @endif
         $</span>
       <br>
              @if($product->original_price > $product->tax_price)
              <strike class="float-right text-muted">{{$product->original_price}} $</strike>
              @endif</h3>

    </div>
    <form>
     
      <input type="text" name="id" id="id" value="{{$product->id}}" hidden>
      <input id="input-3-ltr-star-md" id="rating" name="rating" class="kv-ltr-theme-uni-star rating-loading" value="{{$product->averageRating}}" dir="ltr" data-size="md">
      <button type="submit" id="submit"  class="btn btn-success submit">Send rating</button>
    </form>
  
    <div class="col-12 mt-3 d-lg-none"><p class="p-3">{!!$product->description!!}</p></div>
  </div>
</div>

<hr>
<a href="/products" class="btn btn-dark">Go back</a>

@endsection
