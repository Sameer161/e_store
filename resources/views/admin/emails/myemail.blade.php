<!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    {{-- @dd($details['body']) --}}
    <div style="width: 800px;margin: 0px auto;">
        <h1 style="font-family: 'Google Sans';">{{ $details['title'] }}</h1>
        <header style="background: #2a2a2a;overflow: hidden;padding: 0px 14px;">
            <img src="{{ asset('assets/images/logo.png') }}" style="float: left;">
            <ul style="float: right;">
                <li style="display: block;margin-bottom: 10px;"><a href="#" style="font-size: 14px;color: #fff;transition: all .3s;text-decoration: none;font-family: 'Google Sans';">16501 Collins Ave, Sunny Isles Beach, FL 33160, United States</a></li>
                <li style="display: block;margin-bottom: 10px;"><a href="#" style="font-size: 14px;color: #fff;transition: all .3s;text-decoration: none;font-family: 'Google Sans';">hexashop@company.com</a></li>
                <li style="display: block;margin-bottom: 10px;"><a href="#" style="font-size: 14px;color: #fff;transition: all .3s;text-decoration: none;font-family: 'Google Sans';">010-020-0340</a></li>
            </ul>
        </header>
        <section style="overflow: hidden;padding: 0px 14px;border-right: 4px solid black;border-left: 4px solid black;overflow: hidden;margin: 35px 0px;border-radius: 6px;">
            <div style="float: left;">
                <p style="margin-bottom: 8px;margin-top: 0px;font-size: 16px;font-family: 'Google Sans';">{{ $details['body']['name'] }}</p>
                <p style="margin-bottom: 8px;margin-top: 0px;font-size: 16px;font-family: 'Google Sans';"><a href="" style="color: black!important;text-decoration: none !important">{{ $details['body']['email'] }}</a></p>
                <p style="margin-bottom: 8px;margin-top: 0px;font-size: 16px;font-family: 'Google Sans';">{{ $details['body']['phone'] }}</p>
            </div>
            <div style="float: right;">
                <p style="margin-bottom: 8px;margin-top: 0px;font-size: 16px;font-family: 'Google Sans';"><span><b>Invoice:</b></span> {{ $details['body']['invoice'] }}</p>
            </div>
        </section>
        <table cellspacing="5px" cellpadding="6px" style="width: 100%;margin-bottom: 35px;">
            <thead style="background: black; color: white;">
                <tr>
                    <th style="font-family: 'Google Sans'; font-size: 15px;">Name</th>
                    <th style="font-family: 'Google Sans'; font-size: 15px;">Quantity</th>
                    <th style="font-family: 'Google Sans'; font-size: 15px;">Price</th>
                </tr>
            </thead>
            <tbody style="text-align: center;background: #eaeaea;">
                <tr>
                    <td style="font-family: 'Google Sans'; font-size: 15px;">{{ $details['body']['prname'] }}</td>
                    <td style="font-family: 'Google Sans'; font-size: 15px;">{{ $details['body']['quantity'] }}</td>
                    <td style="font-family: 'Google Sans'; font-size: 15px;">{{ $details['body']['price'] }}</td>
                </tr>
            </tbody>
        </table>
        <div style="text-align:right;">
            <p style="font-family: 'Google Sans'; font-size: 15px;"><span><b>Subtotal Total: </b></span>{{ $details['body']['total'] }}</p>
            <p style="font-family: 'Google Sans'; font-size: 15px;"><span><b>Shippment Charges: </b></span>7</p>
            <p style="font-family: 'Google Sans'; font-size: 15px;"><span><b>Grand Total: </b></span>{{ $details['body']['total']+7 }}</p>
        </div>

        <p style="font-family: 'Google Sans';font-size: 16px;">Thank you</p>
    </div>
</body>
</html>