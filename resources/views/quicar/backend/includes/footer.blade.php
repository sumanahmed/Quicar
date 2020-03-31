<script src="{{ asset('quicar/backend/js/jquery.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/feather.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/select2.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dashforge.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dashforge.aside.js')}}"></script>
<script src="{{ asset('quicar/backend/js/toastr.js')}}"></script>
<script src="{{ asset('quicar/frontend/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="{{ asset('quicar/backend/js/admin.js')}}"></script>
<script src="{{ asset('quicar/backend/js/quote.js')}}"></script>
<script src="{{ asset('quicar/backend/js/category.js')}}"></script>
<script src="{{ asset('quicar/backend/js/custom.js')}}"></script>
<script src="{{ asset('quicar/backend/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('quicar/backend/js/responsive.dataTables.min.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.13.0/standard-all/ckeditor.js"></script>
<script>
    CKEDITOR.inline('ckeditor');
    </script>
<script>
    $('.selectable').select2();
</script>
@yield('scripts')
</body>
</html>
