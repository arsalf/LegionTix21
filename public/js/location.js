$(document).ready(function($) {

    function getLocation(provinces, tag) {
        if (provinces.length > 0) {
            for (let index = 0; index < provinces.length; index++) {
                $(tag).append('<option value=' + provinces[index].id + '>' + provinces[index].name + '</option>')
            }
        } else {
            setTimeout(getProvinsi, 500);
        }
    }

    fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
        .then(response => response.json())
        .then(provinces => getLocation(provinces, '#provinsi'));

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

        fetch('http://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + this.value + '.json')
            .then(response => response.json())
            .then(regencies => getLocation(regencies, '#city'));
    });

    $('#city').on('change', function() {
        $("#kecamatan").prop('disabled', false); //enable
        $("#kelurahan").prop('disabled', true); //disable

        //insialisasi
        initOption('#kecamatan', 'Kecamatan');
        initOption('#kelurahan', 'Kelurahan');

        //take data
        fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/districts/` + this.value + `.json`)
            .then(response => response.json())
            .then(districts => getLocation(districts, '#kecamatan'));
    });

    $('#kecamatan').on('change', function() {
        $("#kelurahan").prop('disabled', false); //enable

        //insialisasi
        initOption('#kelurahan', 'Kelurahan');

        //take data
        fetch(`http://www.emsifa.com/api-wilayah-indonesia/api/villages/` + this.value + `.json`)
            .then(response => response.json())
            .then(villages => getLocation(villages, '#kelurahan'));
    });

});