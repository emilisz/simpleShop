@extends('layouts.app')

@section('title', 'Companies')


@section('content')
<div class="container">
  <div class="jumbotron pt-2 pb-2">
<h2 class="text-center">Admin panel</h2>
<hr>
<div class="row">
  <div class="col-md-6 col-12 border p-2">
    <h5>Configuration</h5>
    <form class="form-inline" action="{{route('taxes.update',['id'=> $tax->id])}}" method="POST">
      @method('PUT')
      @csrf
        <div class="border p-2">
          <label for="validationTooltip01">Tax rate %</label>
          <input type="number" name="rate" class="form-control" id="validationTooltip01"  value="{{$tax->rate}}" >
            <div class="custom-control custom-checkbox">
            <input type="hidden" value="0" name="status">
  <input type="checkbox" name="status" class="custom-control-input" id="customCheck1"  {{ old('status', $tax->status) === 1 ? 'checked' : '' }} value="1">
            <label class="custom-control-label" for="customCheck1">Include tax into product price</label>
          </div>
          <button type="submit" class="btn btn-info m-2">Save</button>
      </div>
    </form>
  </div>

  <div class="col-md-6 col-12 border p-2">
    <h5>Discount for all products</h5>
    <form class="form-inline" action="{{route('taxes.update',['id'=> $tax->id])}}" method="POST">
      @method('PUT')
      @csrf
 
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="discount_type" id="inlineRadio1" value="0" {{ old('discount_type', $tax->discount_type) === 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio1">%</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="discount_type" id="inlineRadio3" value="1" {{ old('discount_type', $tax->discount_type) === 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio2">$</label>
          </div>

          <input type="number" name="discount_size" class="form-control" id="validationTooltip01"  value="{{$tax->discount_size}}" >
            <div class="custom-control custom-checkbox">
            <input type="hidden" value="0" name="discount">
              <input type="checkbox" name="discount" class="custom-control-input" id="customCheck2"  {{ old('status', $tax->discount) === 1 ? 'checked' : '' }} value="1">
            <label class="custom-control-label ml-1" for="customCheck2"> Include discount into all product prices (except the ones with special prices)</label>
          </div>
          <button type="submit" class="btn btn-info m-2">Save</button>
    </form>
  </div>

</div>

</div>

<div class="container">
  <button style="margin: 5px;" class="btn btn-danger btn-xs delete-all" data-url="">Delete selected records</button>
  <a class="btn btn-info float-right" href="{{route('products.create')}}">Create new product</a>
</div>
<p class="muted">
  *Prices in admin panel shown without taxes and discounts
</p>
    <table  id="product"  class="display border">
  <thead>
    <tr>
      <th><input type="checkbox" id="check_all"></th>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">SKU</th>
      <th scope="col">Title</th>
      <th scope="col">Price*</th>
      <th scope="col">Special price*</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($allProducts as $product)
    <tr id="tr_{{$product->id}}">
      <td><input type="checkbox" class="checkbox" data-id="{{$product->id}}"></td>
      <th scope="row">{{$product->id}}</th>
      @if($product->image)
      <td><img width="100" height="100" src="{{url('storage/'.$product->image)}}"></td>
      @else
     <td><img width="100" height="100" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/240px-No_image_available.svg.png"></td>
     @endif
      <td>{{$product->sku}}</td>
      <td>{{$product->name}}</td>
      <td>{{$product->price}} $</td>
      <td>{{$product->special_price}} $</td>
      
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
              <a class="btn btn-success" href="{{route('products.show', ['id'=> $product->id])}}">Show </a>
              <a class="btn btn-warning" href="{{route('products.edit', ['id'=> $product->id])}}">Edit</a>


              <form  method="POST" action="{{route('products.destroy', ['id'=> $product->id])}}">
                  {!! method_field('delete') !!}
                  @csrf
                  <button type="submit" onclick="return confirm('Are you sure?')" data-toggle='confirmation' class="btn btn-danger">Delete</button>
            </form>
        </div>
    </td>
    
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection
