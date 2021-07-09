<footer class="footer">
    <span class="text-right">                
        Copyright <a target="_blank" href="#">Company</a>
    </span>
    <span class="float-right">
        Powered by <a target="_blank" href="https://bootstrap24.com" title="Download free Bootstrap templates"><b>Bootstrap24.com</b></a>
    </span>
</footer>

<script src="{{ asset('front/assets/js/modernizr.min.js') }} "></script>
<script src="{{ asset('front/assets/js/jquery.min.js') }} "></script>
<script src="{{ asset('front/assets/js/moment.min.js') }} "></script>

<script src="{{ asset('front/assets/js/popper.min.js') }} "></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }} "></script>

<script src="{{ asset('front/assets/js/detect.js') }} "></script>
<script src="{{ asset('front/assets/js/fastclick.js') }} "></script>
<script src="{{ asset('front/assets/js/jquery.blockUI.js') }} "></script>
<script src="{{ asset('front/assets/js/jquery.nicescroll.js') }} "></script>

<!-- App js -->
<script src="{{ asset('front/assets/js/admin.js') }} "></script>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<script src="{{ asset('') }} assets/plugins/chart.js/Chart.min.js"></script>
<script src="{{ asset('') }} assets/plugins/datatables/datatables.min.js"></script>

<!-- Counter-Up-->
<script src="{{ asset('') }} assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
<script src="{{ asset('') }} assets/plugins/counterup/jquery.counterup.min.js"></script>

<!-- dataTabled data -->
<script src="{{ asset('') }} assets/data/data_datatables.js"></script>

<!-- Charts data -->
<script src="{{ asset('') }} assets/data/data_charts_dashboard.js"></script>
<script>
$(document).on('ready', function() {
    // data-tables
    $('#dataTable').DataTable({
        data: dataSet,
        columns: [{
            title: "Name"
        }, {
            title: "Position"
        }, {
            title: "Office"
        }, {
            title: "Extn."
        }, {
            title: "Date"
        }, {
            title: "Salary"
        }]
    });

    // counter-up
    $('.counter').counterUp({
        delay: 10,
        time: 600
    });
});
</script>