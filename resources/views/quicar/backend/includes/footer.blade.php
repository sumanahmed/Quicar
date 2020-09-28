<script src="{{ asset('quicar/backend/js/jquery.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/feather.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/select2.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dashforge.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dashforge.aside.js')}}"></script>
<script src="{{ asset('quicar/backend/js/toastr.js')}}"></script>
<script src="{{ asset('quicar/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/responsive.dataTables.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    CKEDITOR.inline('ckeditor');
    $(document).ready(function(){
        $('.datePicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1990,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {
            format: 'YYYY-MM-DD'
            }
        });
    });
    
</script>
<script>
    var image_base_path = "http://localhost:8000/";
    $('.selectable').select2();
</script>
@if(Session::has('error_message'))
    <script>
        toastr.error("{{ Session::get('error_message') }}")
    </script>
@endif
@if(Session::has('message'))
    <script>
        toastr.success("{{ Session::get('message') }}")
    </script>
@endif
@yield('scripts')
</body>
</html>
