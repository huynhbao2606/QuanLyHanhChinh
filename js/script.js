toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

$('#btnAdd').click(function (){
    let tenPhong = $('#tenPhong').val();
    let tenVietTat = $('#tenVietTat').val();
    let ghiChu = $('#ghiChu').val();
    $.ajax({
        url: 'api.php',
        type: 'POST',
        data: {
           tenPhong : tenPhong,
            tenVietTat : tenVietTat,
            ghiChu : ghiChu
        },
        success: function(data) {
            toastr["success"]("Thành Công", "Thêm Phòng Ban");
            $('#tablePB').append(data);
        }
    });

});

