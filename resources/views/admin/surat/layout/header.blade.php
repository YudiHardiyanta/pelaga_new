<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Title Permohonan</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('build/assets/images/favicon.ico')}}">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            margin-right: 40px;
            margin-left: 60px;
        }

        .center {
            text-align: center;
        }

        .judul {
            font-weight: bold;
            font-size: 16px;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        h2,
        h3,
        h4 {
            margin: 0;
            padding: 0;
            line-height: 1.2;
        }

        td {
            padding: 2px 0;
        }

        .hr-3line {
            border: none;
            border-top: 3px solid black;
            position: relative;
            margin: 10px 0;
        }

        .hr-3line::before,
        .hr-3line::after {
            content: "";
            position: absolute;
            left: 0;
            width: 100%;
            border-top: 1px solid black;
        }

        .hr-3line::before {
            top: -3px;
        }

        .hr-3line::after {
            top: 3px;
        }
    </style>
</head>

<body>

    <div class="center">
        <table>
            <tr>
                <td rowspan="4" width="10%"><img src="{{public_path('/img/logo-badung.png')}}" alt="" width="100px"></td>
                <td width="90%" align="center">
                    <h3>PEMERINTAH KABUPATEN BADUNG</h3>
                </td>
                <td rowspan="4" width="10%"><img src="{{public_path('/img/logo-icon.png')}}" alt="" width="100px"></td>
            </tr>
            <tr>
                <td width="90%" align="center">
                    <H4>KECAMATAN PETANG</H4>
                </td>
            </tr>
            <tr>
                <td width="90%" align="center">
                    <H2>DESA PELAGA</H2>
                </td>
            </tr>
            <tr>
                <td width="90%" align="center">
                    <H4>Jl. Bima No. 2, Pelaga, Petang, Kabupaten Badung, Bali. tlp.0812345678</H4>
                </td>
            </tr>
        </table>
        <hr class="hr-3line">
    </div>

    <br><br>