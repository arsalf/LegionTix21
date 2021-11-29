$(document).ready(function($) {

    function takeData(tag, url) {
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
                // console.log(data.results);
                for (let index = 0; index < data.length; index++) {
                    $(tag).append('<option value=' + data[index].id + '>' + data[index].name + '</option>')
                }
            },
            error: function(data) {
                alert(data.statusText);
                // $('#demo').html(data);
                console.log(data);
            }
        });
    }

    // function getLocation(provinces, tag) {
    //     if (provinces.length > 0) {
    //         for (let index = 0; index < provinces.length; index++) {
    //             $(tag).append('<option value=' + provinces[index].id + '>' + provinces[index].name + '</option>')
    //         }
    //     } else {
    //         setTimeout(getProvinsi, 500);
    //     }
    // }

    takeData('#provinsi', '/api/provinsi');

    // fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    //     .then(response => response.json())
    //     .then(provinces => getLocation(provinces, '#provinsi'));

    function initOption(tag, values) {
        $(tag)
            .find('option')
            .remove()
            .end()
            .append('<option selected>--- Pilih ' + values + ' ---</option>');
    }

    // //inisialisasi
    $("#city").prop('disabled', true); //disable
    $("#kecamatan").prop('disabled', true); //disable
    $("#kelurahan").prop('disabled', true); //disable

    $('#provinsi').on('change', function() {
        $("#city").prop('disabled', false); //enable
        $("#kecamatan").prop('disabled', true); //disable
        $("#kelurahan").prop('disabled', true); //disable

        //insialisasi
        initOption('#city', 'Kabupaten/Kota');
        initOption('#kecamatan', 'Kecamatan');
        initOption('#kelurahan', 'Kelurahan');

        //take Data
        takeData('#city', '/api/city/' + this.value);
        // fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + this.value + '.json')
        //     .then(response => response.json())
        //     .then(regencies => getLocation(regencies, '#city'));
    });

    $('#city').on('change', function() {
        $("#kecamatan").prop('disabled', false); //enable
        $("#kelurahan").prop('disabled', true); //disable

        //insialisasi
        initOption('#kecamatan', 'Kecamatan');
        initOption('#kelurahan', 'Kelurahan');

        //take data
        takeData('#kecamatan', '/api/kecamatan/' + this.value);
        // fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/` + this.value + `.json`)
        //     .then(response => response.json())
        //     .then(districts => getLocation(districts, '#kecamatan'));
    });

    $('#kecamatan').on('change', function() {
        $("#kelurahan").prop('disabled', false); //enable

        //insialisasi
        initOption('#kelurahan', 'Kelurahan');

        //take data
        takeData('#kelurahan', '/api/kelurahan/' + this.value);
        // fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + this.value + `.json`)
        //     .then(response => response.json())
        //     .then(villages => getLocation(villages, '#kelurahan'));
    });

});