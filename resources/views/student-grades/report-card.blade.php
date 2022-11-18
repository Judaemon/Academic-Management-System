<!DOCTYPE html>
<html>
  <head> 
    <title></title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

    <style type="text/css"> 
h5 {
    line-height: 2px;
    font-size: 0.85rem;
    text-transform: uppercase; 
    padding-left: 1.5rem;
}

.thead {
    padding:0.625rem 1rem 1rem 0.610rem;
    font-size: 1rem;
}
 

    </style>
  </head>
  <body style="margin: 0 !important; padding: 0 !important;">
    
<div style="width: 42.9rem; background: rgb(245, 242, 242);" >
    
  <div style="height: 5.5rem; width:100%; display:flex; position:relative; justify-content:space-between; border-bottom: 8px double #666;">
    <div style="width: 15%; height: 5rem; padding: 0.4rem; display:flex; justify-content:center; align-items:center; margin: 0px 10px 10px 4px;">
      <img src="{{ $settings->logo }}" alt="logo" style="max-width: 100%; max-height: 100%; align-self:center;"/>
    </div>
    <div style="position:absolute; right:0; top:0; width: 85%; color: #222; height: 100%; text-transform:uppercase; text-align:center;"> 
      <h3 style="width: 100%;">{{ $settings->institute_name }}</h3>
      <p style="font-size: 0.8rem; width: 100%;">{{ $settings->address }}</p>
    </div>
  </div>
      
  <div style="height: 6.5rem; width:100%; display:flex; position:relative; justify-content:space-between; border-bottom: 2px solid rgb(134, 134, 134);">
    <div style="width: 50%; justify-content:space-between; float:left; padding-top:0.5rem;">
      <h5>LRN : {{ $users->lrn }}</h5>
      <h5>Name: {{ $users->first_name }} {{ $users->middle_name }} {{ $users->last_name }}</h5>
      <h5>School Year: {{ $academic_year->title }}</h5>
    </div>
  </div>

  <div style="padding: 0.5rem;">
    <table style="width:100%; text-align:left; color: rgb(112, 114, 117, 2); margin-top:1rem;">
      <thead style="line-height:1rem; font-size:0.75rem; color:white; text-transform:uppercase; background:black;">
        <tr>
          <th scope="col" class="thead">Subjects</th>
          <th scope="col" class="thead">1st</th>
          <th scope="col" class="thead">2nd</th>
          <th scope="col" class="thead">3rd</th>
          <th scope="col" class="thead"">4th</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($subjects as $subject)
          <tr style="border-bottom: 1px solid black; background:white;">
            <th scope="row" style="padding:0.625rem 0rem 0rem 0.625rem; padding-left:1rem;">{{ $subject->name }}</th>
            <td style="padding:0.625rem 0rem 0rem 0.625rem; text-align:center;">{{$subject->grades->first_quarter}}</td>
            <td style="padding:0.625rem 0rem 0rem 0.625rem; text-align:center;">{{$subject->grades->second_quarter }}</td>
            <td style="padding:0.625rem 0rem 0rem 0.625rem; text-align:center;">{{$subject->grades->second_quarter }}</td>
            <td style="padding:0.625rem 0rem 0rem 0.625rem; text-align:center;">{{$subject->grades->fourth_quarter }}</td>
          </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr style="background:black;">
          <th scope="row" colspan="5" class="height:2.25rem;"></td>
        </tr>
      </tfoot>
    </table> 
  </div>

</div>

  </body>
</html>