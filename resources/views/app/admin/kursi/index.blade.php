@extends('app.admin.layout.master')

@section('title')
    : Role Table
@endsection

@section('custom_css')
<style>
.table-responsive{
    background-color: white;
}
form{
    display: inline-block;
    margin-left: 1em;
}
</style>
    
@endsection

@section('content')
<div class="container">
    {{Breadcrumbs::render('category', ucfirst(strtolower($table_name)))}}
    <h2 class="text-center">{{$table_name}} TABLE</h2>
    @if (session('status'))
        <div class="alert alert-success">{{session('status')}}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="container">
      <div class="row">
        <select class="form-select" aria-label="Default select example">
          <option selected>Open this select menu</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="row">
        
      </div>
    </div>
    
    <div class="page mt-2">
        <div class="d-flex justify-content-center">
        {{ $data->links() }}
        </div>
    </div>
    
</div>
@endsection