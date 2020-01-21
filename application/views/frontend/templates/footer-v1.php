<!-- Bagian FOOTER -->
<?php if (!$title == "MyKosan - Home Page" || !$title == "MyKosan - Daftar Kosan") : ?>

  <section class="footer">
    <div class="container">
      <div class="row pt-4 justify-content-between">
        <div class="col-2">
          <img src="<?= base_url('assets/frontend/') ?>img/logo.png" alt="" class="logo">
        </div>
        <div class="col-4 text-white text-center">
          <h4>Follow Us :</h4>
          <i class="fab fa-facebook-square fa-2x"></i>
          <i class="fab fa-twitter-square fa-2x"></i>
          <i class="fab fa-instagram fa-2x"></i>
          <i class="fab fa-youtube-square fa-2x"></i>
        </div>
      </div>
      <div class="row justify-content-center pt-5">
        <div class="col text-center">
          <p class="text-white">
            Copyright ©2019 All rights reserved | This website is made rizkydarma with design from freepik
          </p>
        </div>
      </div>
    </div>

  </section>
<?php else :  ?>
  <section class="footer-simple mt-5 color-main">
    <div class="container">
      <div class="row">
        <div class="col">
          <p>
            Copyright ©2019 All rights reserved | This website is made by rizkydarma with design from freepik
          </p>
        </div>
      </div>
    </div>
  </section>

<?php endif ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="<?= base_url('assets/frontend/') ?>js/bootstrap.min.js">
</script>

<script src="<?= base_url('assets/frontend/') ?>css/font-awesome/js/fontawesome.min.js"></script>
<script src="<?= base_url('assets/frontend/') ?>css/font-awesome/js/all.min.js"></script>
<script src="<?= base_url('assets/sweetalert/') ?>sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/js/datatables/') ?>DataTables-1.10.20\js\jquery.dataTables.js"></script>
<script src="<?= base_url('assets/js/datatables/') ?>DataTables-1.10.20\js\dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/js/') ?>api-wilayah.js"></script>
<script src="<?= base_url('assets/js/') ?>manage-user.js"></script>
<script src="<?= base_url('assets/js/') ?>smooth.js"></script>
<script src="<?= base_url('assets/frontend/js/jquery-ui.js') ?>"></script>
<script>
  $(function() {
    var dateToday = new Date();
    $("#tgl_sewa").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      minDate: dateToday,
      onChange: function(selectedDate) {
        var option = this.id == "from" ? "minDate" : "maxDate",
          instance = $(this).data("datepicker"),
          date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
      }
    });
  });
</script>
</body>

</html>