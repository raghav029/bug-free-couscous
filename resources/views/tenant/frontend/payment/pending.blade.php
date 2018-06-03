@extends('layouts_tenant.app')

@section('content')
<link rel="stylesheet" href="https://www.paytabs.com/theme/express_checkout/css/express.css">
<script src="https://www.paytabs.com/theme/express_checkout/js/jquery-1.11.1.min.js"></script>
<script src="https://www.paytabs.com/express/express_checkout_v3.js"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Payments - Pending</h1>
            <div class="col-md-8">
            <div class="card">
            <div class="PT_express_checkout"></div>
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {!! session('success') !!}</em></div>
                @endif
                <table class="table table-stripped">
                    <tr>
                    <th>Name:</th>
                    <th>Room:</th>
                    <th>Amount:</th>
                    <th>Status:</th>
                    <th>Pay:</th>
                    </tr>
                    @foreach($tenant_bills as $bill)
                    <tr>
                    <td>{{ session('tenant_name') }}</td>
                    <td>{{ $bill->room->name }}</td>
                    <td>{{ $bill->amount }}</td>
                    @if($bill->is_paid == 0)
                    <td>Pending</td>
                    @else
                    <td>Paid</td>
                    @endif
                    <td>
                    <a href="#">Pay using Paytabs</a>
                    </td>
                    </tr>

                    @endforeach

                </table>
                
                </div>
            </div>
        </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<script type="text/javascript">
//  Paytabs("#express_checkout").expresscheckout({
//  settings:{
//  merchant_id: "10029394",
//  secret_key: "00VgBjagmuoM4zKVTj63odNlP7aJrFLsFGJg0TxmoW9svTnocurBHfXwn7fOM1hsH0JHTg4hcdKH786kCyWjNTPa05ZN6ggOhZwb",
//  amount : "10.00",
//  currency : "USD",
//  title : "Mr. John Doe",
//  product_names: "Product1,Product2,Product3",
//  order_id: 25,
//  url_redirect: "http://localhost/hostalmanagement/tenant/payments/success ",
//  display_customer_info:1,
//  display_billing_fields:1,
//  display_shipping_fields:0,
//  language: "en",
//  redirect_on_reject: 0,
//  style: {
//  css: "custom",
//  linktocss: "http://localhost/hostalmanagement/public/css/styles.css",
//  },
//  is_iframe: {
//  load: "onbuttonclick", //onbodyload
//  show: 1,
//  },

//  },

// customer_info:{
//  first_name: "John",
//  last_name: "Smith",
//  phone_number: "5486253",
//  email_address: "john@test.com", 
//  country_code: "973"
//  },
//  billing_address:{
//  full_address: "Manama, Bahrain",
//  city: "Manama",
//  state: "Manama",
//  country: "BHR",
//  postal_code: "00973"
//  },
//  shipping_address:{
//  shipping_first_name: "Jane",
//  shipping_last_name: "Abdulla",
//  full_address_shipping: "Manama, Bahrain",
//  city_shipping: "Manama",
//  state_shipping: "Manama",
//  country_shipping: "BHR",
//  postal_code_shipping: "00973"
//  },
//  checkout_button:{
//  width: 150,
//  height: 30,
//  img_url: "http://localhost/hostalmanagement/public/images/card-payment.png"
//  },
//  pay_button:{
//  width: 150,
//  height: 30,
//  img_url: "http://localhost/hostalmanagement/public/images/card-payment.png"
//  }
//  });
</script>
@endsection
