function takeData(tag, url, typek) {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    var formData = [];
    var type = "GET";
    var ajaxurl = url;
    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        success: function(data) {
            console.log(data);
            console.log(type);
            for (let index = 0; index < data.length; index++) {
                $(tag).append('<option value=' + data[index].name + '>' + data[index].name + ' - ' + data[index].jumlah + '</option>');
            }
            $('#k_type').val(typek);
        },
        error: function(data) {
            alert(data.statusText);
            // $('#demo').html(data);
            console.log(data);
        }
    });
}

$(document).ready(function() {
    $('.layout-sheet').addClass('active-sheet');
    const container = document.querySelector('.container');
    // Seat click event
    container.addEventListener('click', (e) => {
        if ((e.target.classList.contains('single-seat') && !e.target.classList.contains('occupied')) ||
            (e.target.classList.contains('double-seat') && !e.target.classList.contains('occupied'))) {
            var arr = e.target.getAttribute("data-value");
            arr = arr.split("-");
            var row = arr[0];
            var seat = arr[1];
            var jmlh = arr[2];
            var isactive = arr[3];
            var type = arr[4];

            //buat option       
            $('.setting-kursi').html(
                `<label class="form-label">Row : </label>` +
                `<input type="text"  id="row" name="row" class="form-control" value='` + row + `'>` +
                `<input type="hidden"  id="id_row" name="id_row" class="form-control" value='` + row + `'>` +
                `<label class="form-label">Seat : </label>` +
                `<input type="text"  id="seat" name="seat" class="form-control" value='` + seat + `'>` +
                `<input type="hidden"  id="id_seat" name="id_seat" class="form-control" value='` + seat + `'>` +
                `<label class="form-label">Show : </label>` +
                `<select type="text"  id="show" name="show" class="form-select form-select-sm"> 
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>` +
                `<label class="form-label">Type : </label>` +
                `<select type="text"  id="k_type" name="type" class="form-select form-select-sm">` +
                `</select>`
            );
            $('.setting-kursi-del').html(
                `<input type="hidden"  id="id_row" name="id_row" class="form-control" value='` + row + `'>` +
                `<input type="hidden"  id="id_seat" name="id_seat" class="form-control" value='` + seat + `'>`
            );
            takeData('#k_type', '/api/typekursi', type);
            e.target.classList.toggle('selected');
            $('#show').val(isactive);
            $('#submit').css('display', 'block');
            $('#delete').css('display', 'block');
            $('#k_type').val(type);
        }
    });

});