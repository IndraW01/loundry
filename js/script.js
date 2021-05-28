$(document).ready(function() {
  $('#keyword').on('keyup', function() {
    $('.loader').show();

    // ajax menggunakan load
    // $('#container').load('ajax/pelanggan.php?keyword=' + $('#keyword').val());

    // $.get()
    $.get('ajax/pelanggan.php?keyword=' + $('#keyword').val(), function(data) {
      $('#container').html(data);
      $('.loader').hide();
    });
  });


  $('#keyword2').on('keyup', function() {
    $('.loader').show();

    // ajax menggunakan load
    // $('#container').load('ajax/pelanggan.php?keyword=' + $('#keyword').val());

    // $.get()
    $.get('ajax/pengguna.php?keyword2=' + $('#keyword2').val(), function(data) {
      $('#container2').html(data);
      $('.loader').hide();
    });
  });
});