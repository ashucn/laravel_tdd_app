@if (session('status'))
    <script>
        toastr.options.positionClass = "toast-bottom-right";
        toastr.success("{{  session('status')  }}");
    </script>
@endif