@extends('layouts.master')


@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

  $(function(){
      $('#otherSubjectWithLabel').hide();
     $('#stateList').change(function(){
         
         var state_val = $('#stateList').val();
         
          var city=[];
           city['Andaman and Nicobar Island (UT)']=['Alipur','Andaman Island ','Anderson Island','Arainj-Laka-Punga','Austinabad','Bamboo Flat'];
           city['Andhra Pradesh']=['Achampet','Adilabad','Adoni','Alampur','Allagadda','Alur'];
        
       
      $( "#stateList" ).each(function( i ){
       var dropdown=$('#city');
                      dropdown.empty();
                      for (var i = 0; i < city[state_val].length; i++) {
                          var cityOption = document.createElement("option");
                          cityOption.value = city[state_val][i];
                          cityOption.text = city[state_val][i];
                          dropdown.append(cityOption);
                      }
                  });
       
    
         
     });
     
     $('#subject_tution').change(function(){
         
          var subject_val = $('#subject_tution').val();
          
          if(subject_val=='Others'){
              
              $('#otherSubjectWithLabel').show();
          }
          
          else{
              
              $('#otherSubjectWithLabel').hide();
          }
     });
     
  })

</script>
<div class="col-md-3">

</div>

<div class="col-md-6">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <h2>{{ Session::get('success') }}</h2>
    </div>
@endif
     <center><h2>Student Registration Form</h2></center>
     <form method="POST" action="/saveProfile" id="register_student" novalidate>
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">State:</label>
            <select name="state" class="form-control" id="stateList" value="{{old('state')}}">
                 <option value=''>Please select a state from below:</option>
                <option value="Andaman and Nicobar Island (UT)">Andaman and Nicobar Island (UT)</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh (UT)">Chandigarh (UT)</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Haveli (UT)">Dadra and Nagar Haveli (UT)</option>
                <option value="Daman and Diu (UT)">Daman and Diu (UT)</option>
                <option value="Delhi (NCT)">Delhi (NCT)</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep (UT)">Lakshadweep (UT)</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry (UT)">Puducherry (UT)</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            @if ($errors->has('state')) <p class="text-danger">{{ $errors->first('state') }}</p> @endif
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">City:</label>
            <select name="city" id="city" class="form-control">
              
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Locality:</label>
            <input type="email" class="form-control" id="locality" placeholder="Locality" value="{{old('locality')}}" name="locality">
             @if ($errors->has('locality')) <p class="text-danger">{{ $errors->first('locality') }}</p> @endif
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Subjects You need Tution:</label>
           
            <select name="subject_tution"  class="form-control" id="subject_tution">
                <option value="city1">Please Select a Subject</option>
                <option value="city1">Physics</option>
                <option value="city2">Chemistry</option>
                <option value="city3">Mathematics</option>
                <option value="Others">Others</option>
                
            </select>
            
        </div>
        
        <div class="form-group" id="otherSubjectWithLabel">
            <label for="exampleInputEmail1">Other Subject:</label>
            <input type="text" class="form-control" id="other-subject" placeholder="Other Subject" value="{{old('other_subject')}}" name="other_subject">
             @if ($errors->has('other_subject')) <p class="text-danger">{{ $errors->first('other_subject') }}</p> @endif
        </div>
        
        
        <div class="form-group" id="otherSubjectWithLabel">
            <label for="exampleInputEmail1">Studying in:</label>
            <input type="text" class="form-control"  placeholder="Studying in" value="{{old('study_in')}}" name="study_in">
            @if ($errors->has('study_in')) <p class="text-danger">{{ $errors->first('study_in') }}</p> @endif
        </div>
        
        
        <div class="form-group">
            <label for="exampleInputEmail1">Medium:</label>
            <select name="language_medium"  class="form-control">
                <option value="English">English</option>
                <option value="Hindi">Hindi</option>
                <option value="Gujrati">Gujrati</option>
                
            </select>
             @if ($errors->has('language_medium')) <p class="text-danger">{{ $errors->first('language_medium') }}</p> @endif
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Message:</label>
            <textarea class="form-control" placeholder="Do you have any queries? Post them here" name="message" value="{{old('message')}}"></textarea>
            @if ($errors->has('message')) <p class="text-danger">{{ $errors->first('message') }}</p> @endif
        </div>

       

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<div class="col-md-3">

</div>

@endsection