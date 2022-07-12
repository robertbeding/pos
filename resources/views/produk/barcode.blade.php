<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Barcode</title>
    <style>
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>
    <table width= "100%">
        <tr>
            @foreach ($dataproduk as $var_produk)
            <td class="text-center" style="border: 1px solid #333;">
                
                    <p>{{ $var_produk->nama_produk }} - Rp. {{ format_uang($var_produk->harga_jual) }}</p>
                    {{-- <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($var_produk->kode_produk, 'QRCODE') }}"  --}}
                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($var_produk->kode_produk, 'C39') }}" 
                     alt="{{ $var_produk->kode_produk }}"
                     width="180"
                     height="60">
                     <br>
                    {{ $var_produk->kode_produk }}
                </td>
                {{-- // jika data yang ditampilkan lebih dari 3 maka data tersebut akan di tampilkan di bawah(KERTAS A4 ADA BATAS)  --}}
                @if ($no++ % 3 == 0) 
                </tr><tr>
                    
                @endif
            @endforeach
        </tr>
    </table>
</body>
</html>