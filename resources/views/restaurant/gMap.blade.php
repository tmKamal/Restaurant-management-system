@extends('/layouts.admin')
@section('content')
<div class="mb-4">
    <h2 >Delivery Map</h2>  
</div>
@include ('layouts/footer') {{-- This is where we pass the php variable to the js (using laracast/utilities package) --}}


<div id="map"></div>
<div id="content">
   
</div>
<form action="">
    <form>
        
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="latVal">Latitude</label>
                <input type="text" class="form-control" id="latVal" placeholder="" required="">
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="langVal">Longitude</label>
                <input type="text" class="form-control" id="langVal" placeholder="" required="">

                
            </div>

        </div>
       
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</form>

@endsection


