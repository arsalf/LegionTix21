<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Seat Selection</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img
          class="headerLogo"
          src="../../images/LegionTix3TypoHeaderWeb.png"
          alt="headerLogo"
        />
        <div class="employeeProfile">
          <div class="textInfoProfile">
            <div class="employeeName">userEmployee</div>
            <div class="bioskopLocation">UBERTOS</div>
            <div class="bioskopCompany">XXI</div>
          </div>
          <img
            class="profilePict"
            src="../../images/profilePict.jpg"
            alt="profilePict"
          />
        </div>
      </div>
      <div class="seatSelect">
        <div class="seatSelectNavigation">
          <a href="../../index.html" class="backButton">BACK</a>
          <div class="judul">JUDUL FILM</div>
        </div>
        <div class="seatsScreen">
          <ul class="showCase">
            <li>
              <div class="seat"></div>
              <small>n/a</small>
            </li>
            <li>
              <div class="seat selected"></div>
              <small>selected</small>
            </li>
            <li>
              <div class="seat occupied"></div>
              <small>occupied</small>
            </li>
          </ul>
          <div class="screenContainer">
            <div class="screen"></div>
            <div class="row">
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
            </div>
            <div class="row">
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
            </div>
            <div class="row">
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat occupied"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
            </div>
            <div class="row">
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
            </div>
            <div class="row">
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
            </div>
            <div class="row">
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat"></div>
              <div class="seat occupied"></div>
              <div class="seat occupied"></div>
              <div class="seat"></div>
              <div class="seat"></div>
            </div>
          </div>
          <p class="text">
            Anda telah memilih <span id="count">0</span> tiket dengan total
            harga Rp
            <span id="total">0</span>
          </p>
        </div>
        <!-- Trigger/Open The Modal -->
    <button id="myBtn">Pesan</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <div class="modalPembayaran">
          <div class="judulModalPembayaran">REKAP PEMESANAN TIKET</div>
        <div class="isiModalPembayaran">anda telah memesan 
          <span id="count">0</span> tiket untuk seat di 
          <span id="seatTerpilih">A0-A0</span> dengan total pembayaran
          <span class="totalHarga">0000</span>. Klik konfirmasi untuk mengkonfirmasi pesanan anda.</div>
        </div>
        <button class="confirmButton">Konfirmasi</button>
      </div>
    </div>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>
