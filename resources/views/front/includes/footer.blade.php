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
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</div>
<!-- END main -->
@stack('js')
