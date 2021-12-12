 <!-- Footer -->
 <footer class="content-footer">
                <div>©{{date('Y')}} - <a>SMK Wira Buana 2</a></div>
                <body onload="startTime()">
                        <div class="align-center" id="txt"></div>
                <div>
                    <nav class="nav">
                        <a class="nav-link">{{date('d M Y')}} </a>
                    </nav>
                </div>
            </footer>
            <!-- ./ Footer -->
        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="{{asset('vendors/bundle.js')}}"></script>

 <!-- Magnific popup -->
 <script src="{{asset('vendors/lightbox/jquery.magnific-popup.min.js')}}"></script>

 <!-- Isotope -->
 <script src="{{asset('vendors/jquery.isotope.min.js')}}"></script>

<script src="{{asset('assets/js/examples/pages/gallery.js')}}"></script>


    <!-- Apex chart -->
    <script src="{{asset('vendors/charts/apex/apexcharts.min.js')}}"></script>

    <!-- Daterangepicker -->
    <script src="{{asset('vendors/datepicker/daterangepicker.js')}}"></script>

    <!-- DataTable -->
    <script src="{{asset('vendors/dataTable/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/examples/datatable.js')}}"></script>

    <!-- Dashboard scripts -->
    <script src="{{asset('assets/js/examples/pages/dashboard.js')}}"></script>

<!-- App scripts -->
<script src="{{asset('assets/js/app.min.js')}}"></script>
@yield('js')

<script>
function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 1000);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
</script>

</body>

</html>
