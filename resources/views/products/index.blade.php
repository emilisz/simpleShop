@extends('layouts.app')

@section('title', 'Companies')


@section('content')
<div class="container">
  <div class="jumbotron">
  <h2 class="text-center">Product list</h2>
  
  <hr>
</div>
  <div class="row">
    @foreach($allProducts as $product)
    <div class="col-lg-4 col-md-6 col-12">
        <div class="card p-3 mb-3" >

    @if($product->image)
    <a href="{{route('products.show', ['id' => $product->id])}}">
        <img src="{{url('storage/'.$product->image)}}" class="card-img-top img-thumbnail" alt="...">
        </a>
      @else
      <a href="{{route('products.show', ['id' => $product->id])}}">
        <img src="{{asset('storage/no_image.png')}}" class="card-img-top img-thumbnail" alt="...">
      </a>
     
     @endif

          <div class="card-body">
            <h5 class="card-title">{{$product->name}} 
              <span class="badge badge-success float-right">
                @if($product->tax_price > 0)
                {{$product->tax_price}} 
                @else 
                0
                @endif
                $
              </span><br>
              @if($product->original_price > $product->tax_price)
              <strike class="float-right text-muted">{{$product->original_price}} $</strike>
              @endif

            </h5>
            <input disabled id="input-2-ltr-star-sm" name="input-2-ltr-star-sm" class="kv-ltr-theme-uni-star rating-loading" value="{{$product->averageRating}}" dir="ltr" data-size="sm">
            <span class="text-muted">SKU: {{$product->sku}}</span>
            @if (strlen($product->description) > 90)
            <p class="card-text">{!!substr($product->description, 0, 90) . '...'!!}</p>
            @else
            <p class="card-text">{!!$product->description!!}</p>
            @endif
            <a href="{{route('products.show', ['id' => $product->id])}}" class="btn btn-primary">Show more..</a>
          </div>
        </div>   
    </div>
    @endforeach
  </div>
</div>

  {{ $allProducts->links() }}

@endsection
