<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('cinema/style.css')}}" />
    <title>Movie Seat Booking</title>
  </head>
  <body>
    <div class="movie-container">
      <label>Pick a movie:</label>
      <select id="movie">
        <option value="10">Avengers: Endgame ($10)</option>
        <option value="12">Joker ($12)</option>
        <option value="8">Toy Story 4 ($8)</option>
        <option value="9">The Lion King ($9)</option>
      </select>
    </div>

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>N/A</small>
      </li>

      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>

      <li>
        <div class="seat occupied"></div>
        <small>Occupied</small>
      </li>
    </ul>
    @php
      $temp = 'A';
    @endphp
    <div class="container">
      <div class="screen"></div>
        <div class="row">
      @foreach ($data as $item)
        @if($item->k_row!=$temp)
          </div>  
          <div class="row">
              @if($item->jumlah==2)
                <div class="double-seat">{{$item->k_row.$item->k_seat}}</div>                      
              @else 
                <div class="seat">{{$item->k_row.$item->k_seat}}</div>            
              @endif          
        @else          
          @if($item->jumlah==2)        
            <div class="double-seat">{{$item->k_row.$item->k_seat}}</div>                      
          @else 
            <div class="seat">{{$item->k_row.$item->k_seat}}</div>            
          @endif
        @endif
            @php
              $temp = $item->k_row;
            @endphp        
      @endforeach
        </div>
    <p class="text">
      You have selected <span id="count">0</span> seats for a price of $<span id="total">0</span>
    </p>
    <script src="{{asset('cinema/script.js')}}"></script>
  </body>
</html>
