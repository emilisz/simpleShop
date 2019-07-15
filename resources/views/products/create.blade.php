@extends('layouts.app')

@section('title', 'Create product')


@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-12">
      <h2 class="text-center">Create product</h2>
<hr>

<div class="container border p-3">
  <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
   
  @csrf
  <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Name</span>
  </div>
  <input type="text" name="name" class="form-control" placeholder="Enter name" aria-label="UName" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">SKU</span>
  </div>
  <input type="text" name="sku" class="form-control" placeholder="Enter SKU number" aria-label="Sku" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Description</span>
  </div>
  <textarea id="summernote" name="description" class="form-control"></textarea>
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">$ Price</span>
  </div>
  <input type="text" name="price" class="form-control" placeholder="Product price" aria-label="Price" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">$ Special price</span>
  </div>
  <input type="text" name="special_price" class="form-control" placeholder="Special price" aria-label="Special price" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="custom-control custom-checkbox">
    <input type="hidden" value="0" name="status">
  <input type="checkbox" name="status" class="custom-control-input" id="customCheck1"   value="1">
  <label class="custom-control-label" for="customCheck1">Product online if checked</label>
</div>
</div>

<div class="row border mt-2 p-3">
  
  <div class="input-group mt-2">
  <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
    <label class="custom-file-label" for="inputGroupFile04">Choose photo</label>
  </div>
</div>
</div>

<br>


<button type="submit" class="btn btn-success mt-3">Create</button>
</form>
</div>
    </div>
    <div class="col-lg-4 col-12 jumbotron mt-4">
      <h4>Instruction:</h4>
    </div>
  </div>
</div>
   
@endsection
