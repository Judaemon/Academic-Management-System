<!DOCTYPE html>
<html>
  <head> 
    <title></title> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 

    <style type="text/css"> 
h1{
  font-size: 1.5em;
  color: #222;
}

h2 { font-size: .9em; }
h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}

p {
  font-size: 0.9em;
  color: rgb(63, 63, 63);
  line-height: 0.5em;
}

.title{
  float: right;
}
.title p { text-align: right; } 

table{
  width: 100%;
  border-collapse: collapse;
}

td{
  font-size: 1em; 
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}
.tabletitle{
  padding: 5px;
  font-size: .5em;
}
.service{border-bottom: 1px solid #EEE;}
.item{width: 24mm;}
.itemtext{font-size: .5em;}
.payment { text-align: right; padding-right: 3px;}
 

    </style>
  </head>
  <body style="margin: 0 !important; padding: 0 !important;">
    
<div style="padding:2mm; width: 20rem; background: rgb(245, 242, 242);" >
    
  <div style="height: 4.65rem; width:100%; display:flex; position:relative; justify-content:space-between; border-bottom: 8px double #666; padding-bottom: 4px;">
    <div style="width: 25%; height: 4.5rem;">
      <img src="{{ $settings->logo }}" alt="logo" style="max-width: 100%; max-height: 100%;"/>
    </div>
    <div style="position:absolute; right:0; top:-0.5rem; display:flex; justify-content:center; align-items: center; width: 75%; color: #222; height: 20rem; padding: 5px; text-align:center;"> 
      <h2 style="width: 100%;">{{ $settings->institute_name }}</h2>
      <p style="font-size: 0.7rem; width: 100%;">{{ $settings->address }}</p>
    </div>
  </div>
      
  <div style="border-bottom: 8px double #666;">
    <div class="info">
      <h2 style="text-transform:uppercase;">{{ $users->first_name }} {{ $users->last_name }}</h2>
      <p style="margin-top:-2px; margin-left:8px;">Email : {{ $users->email }}</p>
      <p style="margin-top:-3px; margin-left:8px;">Address : {{ $users->address }}</p>
      <p style="margin-top:-3px; margin-left:8px;">{{ $users->address }}</p>
    </div>
  </div>

  <div style="padding-bottom: 3mm; border-bottom: 2px solid rgb(123, 123, 123);">
    <h2 style="text-transform:uppercase;">
      Or No. {{ $pay->id }}
    </h2>
    @if(!empty($school_fees))
      <h2 style="text-transform:uppercase; width: 100%";>School Fees</h2>
      <div id="table">
        <table style="color:#222; font-size: .85em;">
          @foreach($school_fees as $fee)
            <tr class="tabletitle" style="color:#222; font-size: .85em; width:100%;">
              <td style="color:#222; width:50%;">{{ $fee->fee_name }}</td>
              <td class="payment" style="color:#222; width:50%;">
                <h2>Php {{ number_format($fee->amount, 2) }}</h2>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    @endif
      
    @if(!empty($pay->balance))
      <h2 style="text-transform:uppercase;">Educational Expenses</h2>
      <div id="table">
        <table style="color:#222; font-size: .85em;">
          @foreach($payment as $payment)
            <tr class="tabletitle" style="color:#222; font-size: .85em; width:100%;">
              <td style="color:#222; width:50%;">{{ $payment->created_at->format('m-d-Y') }}</td>
              <td class="payment" style="color:#222; width:50%;">
                <h2>Php {{ number_format($payment->amount_paid, 2) }}</h2>
              </td>
            </tr>
          @endforeach
        </table>
      </div>  
    @endif

    @if(empty($pay->balance))
      <h2 style="text-transform:uppercase;">
        @if(!empty($pay->fee_id))
          {{ $pay->fee->fee_name }}
        @else
          {{ $pay->others }}
        @endif
      </h2>
      <div id="table">
        <table style="color:#222; font-size: .85em;">
          <tr class="tabletitle" style="color:#222; font-size: .85em; width:100%;">
            <td style="color:#222; width:50%;">{{ $pay->created_at->format('m-d-Y') }}</td>
            <td class="payment" style="color:#222; width:50%;">
              <h2>Php {{ number_format($pay->amount_paid, 2) }}</h2>
            </td>
          </tr>
        </table>
      </div>  
    @endif
  </div>
  <div style="margin-top: 2mm; width: 20rem;">
    <p style="text-align: center; font-size: 0.9em; line-height: 1.2em;">
      **For Any Correction and Clarification, kindly contact {{ $accountant->email }} or visit the Cashier's Office.
    </p>
  </div>
</div>

  </body>
</html>
