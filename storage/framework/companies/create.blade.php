@extends('layouts.app')

@section('title', 'Create company')


@section('content')
<h2 class="text-center">Create new company</h2>
<hr>

<div class="container border p-3">
  <form action="{{route('companies.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="input-group flex-nowrap">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Pavadinimas</span>
  </div>
  <input type="text" name="first_name" class="form-control" placeholder="..." aria-label="Username" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Email</span>
  </div>
  <input type="text" name="email" class="form-control" placeholder="..." aria-label="Email" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="input-group-prepend">
    <span class="input-group-text" id="addon-wrapping">Website</span>
  </div>
  <input type="text" name="website" class="form-control" placeholder="..." aria-label="Website" aria-describedby="addon-wrapping">
</div>

<div class="input-group mt-2">
  <div class="custom-file">
    <input type="file" name="logo" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
  </div>
</div>

<button type="submit" class="btn btn-success mt-3">Sukurti</button>
</form>
</div>
   
@endsection
