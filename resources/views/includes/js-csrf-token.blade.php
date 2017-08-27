  <script>
      window.ashucn = {
          csrfToken: '{{ csrf_token() }}',
          basePath: '{{ url('/') }}'
      }
      //in console, check basePath:  window.ashucn.basepath  -> http://localhost:9000
  </script>
