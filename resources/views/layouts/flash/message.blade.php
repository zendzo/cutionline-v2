@if(session('message'))
<script>
  swal(
    "{{ session('status') }}",
    "{{ session('message') }}",
    "{{ session('type') }}"
    )
</script>
@endif