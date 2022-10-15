    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard2.min.js" integrity="sha512-/On5eFU1vz1sGgejVpebEmg91zdKYXBcm4HPzDHcKOF1icilwxSR0C1ClBcK9IodnQdow2HjmHnqxt8PdQRrAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- PAGE PLUGINS -->
    <!-- DataTables -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-OQlawZneA7zzfI6B1n1tjUuo3C5mtYuAWpQdg+iI9mkDoo7iFzTqnQHf+K5ThOWNJ9AbXL4+ZDwH7ykySPQc+A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.dataTables.min.js" integrity="sha512-fQmyZE5e3plaa6ADOXBM17WshoZzDIvo7sR4GC1VsmSKqm13Ed8cO2kPwFPAOoeF0RcdhuQQlPq46X/HnPmllg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/dataTables.buttons.min.js" integrity="sha512-QT3oEXamRhx0x+SRDcgisygyWze0UicgNLFM9Dj5QfJuu2TVyw7xRQfmB0g7Z5/TgCdYKNW15QumLBGWoPefYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.flash.min.js" integrity="sha512-Aw36UN5EXarQmpR93ZaBmbDhVs6/+4XlOd7ciDOnhPDXKEGdrxBRbX2JsrVJ8DtwA3h6TqHnVdH/31dR4Bd78w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.print.js" integrity="sha512-3De2ddws/mT13IYh3thpgnXF0b7iIdL4dMRdMB7xTn4eVLCYFJTEiFuZ0HDwSFO37KhhT1fJvuudQaQKYLXFCQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/dataTables.buttons.js" integrity="sha512-1fie3NgPkHrB/HGz+9NbPURndMZ21tJTFMEJAxQUF8wpNd6WUMOpYIaYcYZryXP0yrFGY6fXz192aBMzeD09YQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.html5.min.js" integrity="sha512-BdN+kHA7QfWIcQE3WMwSj5QAvVUrSGxJLv7/yuEEypMOZBSJ1VKGr9BSpOew+6va9yfGUACw/8Yt7LKNn3RKRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-buttons/2.2.3/js/buttons.flash.min.js" integrity="sha512-Aw36UN5EXarQmpR93ZaBmbDhVs6/+4XlOd7ciDOnhPDXKEGdrxBRbX2JsrVJ8DtwA3h6TqHnVdH/31dR4Bd78w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": true,
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true
          //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      });
    </script>