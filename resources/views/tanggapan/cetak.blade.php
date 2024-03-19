<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>cetak data</title>
        <style>
            table.static {
                position: relative;
                border: 1px solid #543535;
            }
        </style>
    </head>
    <body>
        <div class="form-group">
            <p align="center"><b>Laporan Data Pengaduan</b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tanggapan</th>
                </tr>
                @foreach ($pengaduan as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->user->created_at->format('Y-m-d')}}</td>
                    <td>{{$item->judul_laporan}}</td>
                    <td>{{$item->kategori->nama_kategori}}</td>
                    <td>
                        @if ($item->tanggapan->count() > 0)
                            <ul>
                                @foreach ($item->tanggapan as $tanggapan)
                                    <li>{{ $tanggapan->tanggapan }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>Belum ada tanggapan untuk laporan ini.</p>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</html>
