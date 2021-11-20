@extends('app.admin.layout.master')

@section('title')
    : Location Table
@endsection

@section('custom_css')
<style>
form{
    display: inline-block;
    margin-left: 1em;
}
</style>
    
@endsection

@section('content')
<div class="container">
    {{Breadcrumbs::render('category', 'location')}}
    <h1 class="text-center">Location Table</h1>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    <div class="row">
        <div class="col-sm-2">
            <button type="button" class="btn btn-primary"><a class="text-light" style="text-decoration: none" href="{{route('role.create')}}">Add</a></button>
        </div>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">City</th>
            <th scope="col">Province</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
    </table>
</div>
@endsection