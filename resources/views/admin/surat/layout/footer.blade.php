<br><br><br>
<style>
    
    .ttd {
        width: 300px;
        margin-left: auto;
        /* membuat blok ke kanan */
        text-align: right;
        /* teks biasa rata kanan */
    }
    .ttd .jabatan {
        text-align: center;
        /* khusus nama dibuat tengah */
    }

    .ttd .nama {
        text-align: center;
        /* khusus nama dibuat tengah */
        font-weight: bold;
    }
</style>

<table style="width:100%; margin-top:80px;">
<tr>
    <td style="width:50%; text-align:center;">
        @if($jabatan_ttd_lv1)
        Mengetahui,<br>
        {{$jabatan_ttd_lv1}}
        
        <br><br><br><br><br><br>
        
        <b>{{$nama_ttd_lv1}}</b>
        @endif
    </td>
    
    <td style="width:50%; text-align:center;">
        Pelaga, {{\Carbon\Carbon::parse($tanggal_surat)->locale('id')->translatedFormat('j F Y') }}<br>
        {{$jabatan_ttd_lv2}}
        
        <br><br>
        <img src="data:image/png;base64,{{ $qr_lv2 }}">
        <br><br>
        
        <b>{{$nama_ttd_lv2}}</b>
    </td>
</tr>
</table>

</body>

</html>