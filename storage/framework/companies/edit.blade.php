@extends('layouts.app')

@section('title', 'Create company')


@section('content')
<h2 class="text-center">Edit company</h2>
<hr>

<div class="container border p-3">
  <form action="{{route('companies.update',['id'=> $company->id])}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
  @csrf
  <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Name</span>
  </div>
  <input type="text" name="first_name" class="form-control" value="{{$company->first_name}}" aria-label="Username" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Email</span>
  </div>
  <input type="text" name="email" class="form-control" value="{{$company->email}}" aria-label="Email" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Website</span>
  </div>
  <input type="text" name="website" class="form-control" value="{{$company->website}}" aria-label="Website" aria-describedby="addon-wrapping">
</div>
<div class="row border mt-2">
  <div class="col-4">Current logo</div>
  <div class="col-8"><img class="img-thumbnail mt-2" width="200" src="{{url('storage/logos/'.$company->logo)}}"></div>
  <div class="input-group mt-2">
  <div class="custom-file">
    <input type="file" name="logo" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
    <label class="custom-file-label" for="inputGroupFile04">Choose another photo</label>
  </div>
</div>
</div>

<br>


<button type="submit" class="btn btn-success mt-3">Atnaujinti</button>
</form>
</div>
   
@endsection
