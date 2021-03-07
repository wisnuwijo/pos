<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}" />
</head>
<body>
    <table border="1px" width="100%">
        <thead style="font-weight: bold;">
            <tr>
                <td>Nomor</td>
                <td>Nama Customer</td>
                <td>Tanggal</td>
                <td>Total</td>
                <td>Metode Pembayaran</td>
                <td>Jenis Pesanan</td>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach($sales as $sls)
                <tr style="font-weight:bold;background-color: rgb(221, 186, 185)">
                    <td>{{ $no++ }}</td>
                    <td>{{ $sls['customer_name']}}</td>
                    <td>{{ $sls['created_at']}}</td>
                    <td>{{ $sls['grand_total']}}</td>
                    <td>{{ $sls['payment_method_name']}}</td>
                    <td>{{ $sls['pickup_method'] }}</td>
                </tr>
                <tr style="font-weight:bold">
                    <td></td>
                    <td colspan="5">Detail Pesanan :</td>
                </tr>
                <tr>
                    <td></td>
                    <td style="font-weight:bold;background-color: rgb(221, 186, 185)">Pesanan</td>
                    <td style="font-weight:bold;background-color: rgb(221, 186, 185)">Jumlah Pesanan</td>
                    <td style="font-weight:bold;background-color: rgb(221, 186, 185)">Harga Satuan</td>
                    <td style="font-weight:bold;background-color: rgb(221, 186, 185)">Diskon</td>
                    <td style="font-weight:bold;background-color: rgb(221, 186, 185)">Harga Akhir</td>
                </tr>
                @foreach($sls['detail'] as $sld)
                    <tr>
                        <td></td>
                        <td>{{ $sld->goods_name }}</td>
                        <td>{{ $sld->qty}}</td>
                        <td>{{ $sld->goods_price}}</td>
                        <td>{{ $sld->goods_discount_percent != 0 ? $sld->goods_discount_percent : $sld->goods_discount_amount }}</td>
                        <td>{{ $sld->goods_price_after_discount}}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>