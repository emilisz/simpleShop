@extends('layouts.app')

@section('title', 'Companies')


@section('content')
<div class="jumbotron">
    <div class="row">
        <div class="col-4">
    <img class="img-thumbnail" width="100%" src="{{url('storage/logos/'.$company->logo)}}">
            
        </div>
        <div class="col-8">
    <h2>{{$company->first_name}}</h2>
    <p>Email: <strong>{{$company->email}}</strong></p>
    <p>Website: <strong>{{$company->website}}</strong></p>
            
        </div>
    </div>
</div>
<hr>
<h4>Company employees </h4>
<form action="{{route('companies.employees.create', $company)}}" method="get">
    @csrf
    <input type="hidden" name="id" value="{{$company->id}}">
    <button type="submit" class="btn btn-info float-right mb-2" >Add new employee</button>
</form>
    <table id="employee"  class="display">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Last name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    @foreach($company->employees as $employee)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$employee->first_name}}</td>
      <td>{{$employee->last_name}}</td>
      <td>{{$employee->email}}</td>
      <td>{{$employee->phone}}</td>
      <td>
        <form class="float-right" method="GET" action="{{route('companies.employees.edit', ['ide'=> $company->id,'id'=> $employee->id])}}">
            @csrf
            <button type="submit"  class="btn btn-warning">Edit</button>
        </form>
        {{-- <a class="btn btn-warning" href="{{route('companies.employees.edit', $company->id, $employee->id)}}">Edit</a></td> --}}
      <td>
        <form class="float-right" method="POST" action="{{route('companies.employees.destroy', ['ide'=> $company->id,'id'=> $employee->id])}}">
            {!! method_field('delete') !!}
            @csrf
            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
        </form>
    </td>
    </tr>
    @endforeach
  </tbody>
</table>
<hr>
<a href="/companies" class="btn btn-dark">Go back</a>

@endsection
