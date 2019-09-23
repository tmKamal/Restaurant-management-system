@extends('layouts.admin')
@section('content')
<div class="mb-4">
    <h2 >Registered Users</h2>  
</div>
<div class="form-group">
    <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
</div>
<h3>Total Data : <span id="total_records"></span></h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">First Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Type</th>
      </tr>
    </thead>
    <tbody>
        
    </tbody>
  </table>

  <script>
    $(document).ready(function(){
    
     fetch_customer_data();
    
     function fetch_customer_data(query = '')
     {
      $.ajax({
       url:"{{ route('live_search.action') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_customer_data(query);
     });
    });
    </script>

@endsection