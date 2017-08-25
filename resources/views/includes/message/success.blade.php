@if (session('status'))
    <script>
        toastr.options.positionClass = "toast-top-center";
        toastr.success("{{  session('status')  }}");
    </script>
@endif