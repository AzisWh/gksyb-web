<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $dok->judul_dokumen }}</title>

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 12px;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        .meta {
            margin-bottom: 20px;
        }
        .meta td {
            padding: 4px 8px;
        }
        .divider {
            margin: 20px 0;
            border-bottom: 1px solid #ddd;
        }
        iframe {
            width: 100%;
            height: 600px;
        }
    </style>
</head>
<body>

<h1>{{ $dok->judul_dokumen }}</h1>

<table class="meta" width="100%">
    <tr>
        <td width="30%">Kategori</td>
        <td>: {{ $dok->kategori->nama_kategori ?? '-' }}</td>
    </tr>
    <tr>
        <td>Keterangan</td>
        <td>: {{ $dok->keterangan ?? '-' }}</td>
    </tr>
    <tr>
        <td>Nama File</td>
        <td>: {{ $dok->file }}</td>
    </tr>
</table>

<div class="divider"></div>

<p><strong>Isi Dokumen:</strong></p>

{{-- Preview isi PDF yang diupload --}}
{{-- <object
    data="{{ public_path('storage/DokParoki/'.$dok->file) }}"
    type="application/pdf"
    width="100%"
    height="600px">
</object> --}}

</body>
</html>
