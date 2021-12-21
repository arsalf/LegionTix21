@if(!is_null($results))         

@foreach($results as $data)    
@php
$data = json_decode(json_encode($data));
@endphp                   
    <div class="row mb-3">
        <div class="col-sm-3">
            <img class="img-fluid" src="{{$data->image}}">
        </div>
        <div class="col-sm-9">
            <form action="{{route('film.store')}}}" method="POST">                            
                <label>Title : </label>
                <input type="text" class="form-control" name="title" value="{{$data->title}}" readonly>
                <input type="hidden" class="form-control" name="id_imdb" value="{{$data->id}}">
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endforeach
@endif