<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Organic India</title>
    <!-- Invoice styling -->
    <style>
      body {
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        text-align: center;
        color: #777;
      }

      body h1 {
        font-weight: 300;
        margin-bottom: 0px;
        padding-bottom: 0px;
        color: #000;
      }

      body h3 {
        font-weight: 300;
        margin-top: 10px;
        margin-bottom: 20px;
        font-style: italic;
        color: #555;
      }

      body a {
        color: #06f;
      }

      .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
      }

      .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
        border-collapse: collapse;
      }

      .invoice-box table td {
        padding: 5px;
        vertical-align: top;
      }

      .invoice-boxx {
        text-align: right;
      }

      .invoice-box table tr.top table td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
      }

      .invoice-box table tr.information table td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
      }

      .invoice-box table tr.details td {
        padding-bottom: 20px;
      }

      .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
        border-bottom: none;
      }

      /*.invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
      }
*/
      @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
        }

        .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
        }
      }
    </style>
  </head>

  <body>
    
    <div class="invoice-box">
      <table>
        <tr class="top" align="center">
          <td align="left">
            <img src="https://divashudh.com/uploads/logo_organic_india.png" height="120px" width="200px">
          </td>
          <td align="right">
          
            ORGANIC INDIA Pvt Ltd<br/>
            C-5/10 Agro Park Phase-II UPSIDC Industrial Area,<br/>
            Kursi Road Barabanki- 225302, Uttar Pradesh
          </td>
        </tr>
      </table><br/>
      
      <table border="1">
          
        <tr class="heading">
            <td>S.N.</td>
          <td style="width:45%;">Item</td>
          <td>Qty</td>
          <td>Price</td>
          <td align="right">Total Price</td>
        </tr>
        @if(@$products and is_object(@$products))
        @php
            $total = 0;
            $i = 1;
        @endphp
          @foreach($products as $key => $value)
        <tr>
            <td>{{$i}}</td>
          <td>
            <div>
              <span style="font-size:15px;margin-left: 10px; line-height: 10px;">{{$value->prd_title}}</span>
            </div>
          </td>
          <td>{{$value->qty}}</td>
          <td><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$value->price}}</td>
          <td align="right"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$value->qty*$value->price}}</td>
        </tr>
        @php
        $total += $value->qty*$value->price;
        $i++;
        @endphp
        @endforeach
        @endif
      </table><br/>
      <table >
        <tr class="total">
          <td align="right" >Sub Total :</td>
          <td align="right" style="width: 20%;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$total}}</td>
        </tr>
        
        @if($user_information->discount)
          <tr class="total">
            <td align="right">Discount :</td>
            <td align="right">-<span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span>{{$user_information->discount?$user_information->discount:0}}</td>
          </tr>
        @endif
        <tr class="total">
          <td align="right"><strong>Grand Total:</strong></td>
          <td align="right"><strong><span style="font-family: DejaVu Sans; sans-serif;"><span style="font-family: DejaVu Sans; sans-serif;">&#8377;</span></span>{{$total-$user_information->discount}}</strong></td>
        </tr>
      </table>
    </div>
  
  </body>
</html>