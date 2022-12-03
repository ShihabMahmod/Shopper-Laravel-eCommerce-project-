
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div id="content">
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
      <h5 >Order Information</h5>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-briefcase"></i> </span>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span6">
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td><h4>Company : Shopper Co.L</h4></td>
                    </tr>
                    <tr>
                      <td>Dhaka(Mirpur)</td>
                    </tr>
                    <tr>
                      <td>Mirpur-12,Block-d,Road:31</td>
                    </tr>
                    <tr>
                      <td>Mobile Phone: 018598327</td>
                    </tr>
                    <tr>
                      <td >shopper@company.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="span6">
                <table class="table table-bordered table-invoice">
                  <tbody>
                    <tr>
                    <tr>
                      <td class="width30">Invoice ID:</td>
                      <td class="width70"><strong>TD-6546</strong></td>
                    </tr>
                    <tr>
                      <td>Issue Date:</td>
                      <td><strong>March 23, 2013</strong></td>
                    </tr>
                    <tr>
                      <td>Due Date:</td>
                      <td><strong>April 01, 2013</strong></td>
                    </tr>
                  <td class="width30">Client Address:</td>
                    <td class="width70"><strong>{{$user->first_name}} {{$user->last_name}}</strong> <br>
                      {{$user->address}}<br>
                      {{$user->city}} <br>
                      Contact No : {{$user->phone}} <br>
                      Email: {{$user->email}}</td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Order ID</th>
                      <th class="head1">Product Name</th>
                      <th class="head0 right">Quantity</th>
                      <th class="head1 right">Size</th>
                      <th class="head1 right">Color</th>
                      <th class="head0 right">Total Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($orders as $order)
                        <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->product_name}}</td>
                        <td class="right">{{$order->product_quantity}}</td>
                        <td class="right">{{$order->product_size}}</td>
                        <td class="right">{{$order->product_color}}</td>
                        <td class="right"><strong>{{$order->order_price}} Tk.</strong></td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="85%"><h4>Payment method: </h4>
                        <a href="#" class="tip-bottom" title="Wire Transfer">Wire transfer</a> |  <a href="#" class="tip-bottom" title="Bank account">Bank account #</a> |  <a href="#" class="tip-bottom" title="SWIFT code">SWIFT code </a>|  <a href="#" class="tip-bottom" title="IBAN Billing address">IBAN Billing address </a></td>
                      <td class="right"><strong>Subtotal</strong> <br>
                        <strong>Tax (0%)</strong> <br>
                        <strong>Discount</strong></td>
                      <td class="right"><strong>$7,000 <br>
                        $600 <br>
                        $50</strong></td>
                    </tr>
                  </tbody>
                </table>
                <div class="pull-right">
                  <h4><span>Amount Due:</span> {{$order_amount}} Tk.</h4>
                  <br>
                  <h4>Payment Status : Done</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
</html>




