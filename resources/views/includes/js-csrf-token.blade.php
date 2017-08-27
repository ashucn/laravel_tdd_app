  <script>
      window.Laravel = {
          csrfToken: '{{ csrf_token() }}',
          basePath: '{{ url('/') }}'
      }
      //in console, check basePath:  window.Laravel.basepath  -> http://localhost:9000
  </script>
