@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('content')
    <!-- Login Section Begin -->
    <section class="p-5" style="height: 563px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('kursis.store') }}">
                        @csrf
                            <input type="hidden" name="idFilm" value="{{$id}}">
                            <div class="form-group row">
                                <label for="bioskop" class="text-white col-sm-2 col-form-label">Bioskop</label>
                                <div class="text-dark col-sm-10">
                                    <select id="bioskop" name="bioskop" class="selectFilm">
                                        @foreach ($dataBioskop as $item)
                                            <option value="{{ $item->bioskop_name }}">{{$item->bioskop_name}} - {{$item->bioskop_type}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Studio</label>
                                <div class="text-white col-sm-10" id="studioDiv">
                                    @foreach ($dataStudio as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="radio-toolbar-input" type="radio" id="radio{{ $item->studio_id }}" name="studio" value="{{ $item->studio_id }}">
                                            <label class="radio-toolbar-label btn-ticket" for="radio{{ $item->studio_id }}">{{ $item->studio_type }} - {{ $item->studio_name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="text-white d-flex flex-column justify-content-center col-sm-2 col-form-label">Jam Tayang</label>
                                <div class="text-white col-sm-10" id="jamTayangDiv">                                    
                                    @foreach ($dataShowtime as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="radio-toolbar-input" type="radio" id="radio{{ $item->waktu }}" name="jamTayang" value="{{ $item->waktu }}">
                                            <label class="radio-toolbar-label btn-ticket" for="radio{{ $item->waktu }}">{{ $item->waktu }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="mt-5 btn btn-success">Buy Ticket</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
@endsection

@section('js')
    <script>
        alert("bisa");
        
    // $(document).ready(function($) {
    //         function takeDataStudio(tag, url) {
    //             var formData = [];
    //             var type = "GET";
    //             var ajaxurl = url;
    //             $.ajax({
    //                 type: type,
    //                 url: ajaxurl,
    //                 data: formData,
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     console.log(data);
    //                     for (let index = 0; index < data.length; index++) {
    //                         $('#studioDiv').append(`
    //                             <div class="form-check form-check-inline ">
    //                                 <input class="radio-toolbar-input" type="radio" id="studio`+ data[index].studio_id +`" name="studio" value="`+ data[index].studio_id + `">
    //                                 <label class="radio-toolbar-label btn-ticket" for="studio`+ data[index].studio_id +`">`+ data[index].studio_type +` - `+ data[index].studio_name + `</label>
    //                             </div>
    //                         `);
    //                     }
    //                 },
    //                 error: function(data) {
    //                     console.log(data);
    //                     alert(data);
    //                 }
    //             });
    //         }

    //         function takeDataJamTayang(tag, url) {
    //             var formData = [];
    //             var type = "GET";
    //             var ajaxurl = url;
    //             $.ajax({
    //                 type: type,
    //                 url: ajaxurl,
    //                 data: formData,
    //                 dataType: 'json',
    //                 success: function(data) {
    //                     console.log(data);
    //                     alert(data);
    //                     for (let index = 0; index < data.length; index++) {
    //                         $('#jamTayangDiv').append(`
    //                             <div class="form-check form-check-inline">
    //                                 <input class="radio-toolbar-input" type="radio" id="jam`+ data[index].waktu +`" name="jamTayang" value="`+ data[index].waktu +`">
    //                                 <label class="radio-toolbar-label btn-ticket" for="jam`+ data[index].waktu +`">`+ data[index].waktu +`</label>
    //                             </div>
    //                         `);
    //                     }
    //                 },
    //                 error: function(data) {
    //                     console.log(data);
    //                     alert(data);
    //                 }
    //             });
    //         }

    //         function initStudio(tag, values) {
    //             $(tag)
    //                 .remove()
    //                 .end()
    //         }
            
    //         //inisialisasi
    //         takeDataStudio('#bioskop', '/api/studio/' + this.value);
            
    //         $('#bioskop:checked').on('change', function() {
    //             initStudio('#jamTayangDiv', '');
    //             //take Data
    //             takeDataStudio('#bioskop', '/api/studio/' + this.value);
    //         });

    //         $('input[type=radio][name=studio]').change(function() {
    //             alert("bisa euy");
    //             //take Data
    //             // takeDataJamTayang('#studio', '/api/studio/' + this.value);
    //         });
    //     });
    </script>
@endsection 