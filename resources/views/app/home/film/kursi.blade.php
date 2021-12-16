@extends('app.home.layout.layout')

@section('title')
    Detail Film
@endsection

@section('content')
    <!-- Login Section Begin -->
    <section class="p-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="GET">
                        <div class="row">
                            <label for="exampleFormControlSelect1" class="mb-3 text-white col-sm-12 col-form-label">Kursi</label>
                        </div>
                        <div class="text-center form-group row ">
                            <div class="col-md-10">
                                <img class="mb-5 " src="{{ asset('home/img/layar.jpg')}}" alt="" style="height: 500px; width: 100%;">
                                <?php for ($j=1; $j <=1; $j++) { ?>
                                    <div class="text-white col-sm-12">
                                        <?php
                                            $char = range('A', 'H');
                                            foreach ($char as $abjad) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="radio-toolbar-input" type="radio" id="kursi<?= "$abjad-$j"; ?>" name="kursi" value="<?= "$abjad-$j"; ?>">
                                                <label class="text-center radio-toolbar-label btn-ticket-2" for="kursi<?= "$abjad-$j"; ?>"><?= "$abjad$j-Ex"; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php for ($j=1; $j <=10; $j++) { ?>
                                    <div class="text-white col-sm-12">
                                        <?php
                                            $char = range('A', 'O');
                                            foreach ($char as $abjad) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="radio-toolbar-input" type="radio" id="kursi<?= "$abjad-$j"; ?>" name="kursi" value="<?= "$abjad-$j"; ?>">
                                                <label class="text-center radio-toolbar-label btn-ticket-1" for="kursi<?= "$abjad-$j"; ?>"><?= "$abjad$j"; ?></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="text-left text-white col-md-2">
                                <h5> <b> Bioskop </b> : {{$bioskop}} </h5>
                                <h5> <b> Studio </b> : {{$studio}} </h5>
                                <h5> <b> Jam Tayang </b> : {{$jam}} </h5> 
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" class="mt-5 btn btn-success">Buy Ticket</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login Section End -->
        @endsection
        