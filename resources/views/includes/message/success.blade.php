@if (session('status'))
    <script>
        toastr.success("{{  session('status')  }}");
    </script>
@endif