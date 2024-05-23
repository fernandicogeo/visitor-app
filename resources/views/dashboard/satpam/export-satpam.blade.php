<!DOCTYPE html>
<html lang="en">
@if ($request->status == 'divisi')
  <?php $title = 'Satpam - Jadwal Pertemuan Divisi ' . $request->divisi . ' Hari ini - ' . date('Y-m-d') ?>
@else
  <?php $title = 'Satpam - Total Jadwal Pertemuan Divisi ' . $request->divisi . ' - ' . date('Y-m-d') ?>
@endif
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>

    <style>
        table {
            width: 95%;
            border-collapse: collapse;
            margin: 50px auto;
        }

        /* Zebra striping */
        tr:nth-of-type(odd) {
            background: #eee;
        }

        th {
            background: #2D2A70;
            color: white;
            font-weight: bold;
        }

        td,
        th {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 14px;
        }


    </style>

</head>

<body>
    <h3>{{ $title }}</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Yang Diajukan</th>
            <th scope="col">Waktu</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Kendaraan</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <th scope="row">
                    {{ $loop->iteration }}</th>
                <td>{{ $schedule->nama }}</td>
                <td>{{ $schedule->tanggal }}</td>
                <td>{{ $schedule->waktu }}</td>
                <td>{{ $schedule->tujuan }}</td>
                <td>{{ $schedule->keperluan }}</td>
                <td>{{ $schedule->keterangan }}</td>
                <td>
                  {{ $schedule->kendaraan }}
                  @if ($schedule->kendaraan == 'Pribadi')
                    , {{ $schedule->jenis_kendaraan }}, {{ $schedule->nopol_kendaraan }}
                  @endif
                </td>
                
                <td style="text-align: center;">
                  @if ($schedule->status === null)
                  <span class="badge badge-info">Menunggu Staff.</span>
                  @elseif ($schedule->status == "diterima")
                  <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}.</span><br>
                  @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                    <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->satpam_checkout }}, {{ $schedule->waktu_checkout }}.</span>
                  @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                    <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
                  @else
                    <span class="badge badge-success">Check-in : Belum check-in.</span>
                  @endif
                  @elseif ($schedule->status == "ditolak")
                  <span class="badge badge-danger">Ditolak.</span>
                  @elseif ($schedule->status == "reschedule")
                  @if ($schedule->status_reschedule == "menerima-reschedule")
                    <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}.</span><br>
                    <span class="badge badge-success">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span><br>
                      @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                        <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->satpam_checkout }}, {{ $schedule->waktu_checkout }}.</span>
                      @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                        <span class="badge badge-success">Check-in : {{ $schedule->satpam_checkin }}, {{ $schedule->waktu_checkin }}, Check-out : Belum check-out.</span>
                      @else
                        <span class="badge badge-success">Check-in : Belum check-in.</span>
                      @endif
                  @elseif ($schedule->status_reschedule == "menolak-reschedule")
                    <span class="badge badge-danger">Menolak Reschedule.</span><br>
                    <span class="badge badge-danger">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                  @else
                    <span class="badge badge-warning">Reschedule.</span><br>
                    <span class="badge badge-warning">Jadwal Reschedule : {{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}.</span>
                  @endif
                @endif
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>

</body>

</html>