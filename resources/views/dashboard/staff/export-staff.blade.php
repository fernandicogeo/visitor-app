<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>

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
            font-size: 18px;
        }


    </style>

</head>

<body>
    <h3>Schedules - Bulan: {{ $request->bulan }}, Tahun: {{ $request->tahun }}</h3>
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
                <td style="text-align: center;">
                    @if ($schedule->status === null)
                    <span class="badge badge-info">Menunggu Staff</span>
                    @elseif ($schedule->status == "diterima")
                    <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}</span>
                    @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                      <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}</span>
                    @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                      <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out</span>
                    @else
                      <span class="badge badge-success">Check-in : Belum check-in</span>
                    @endif
                    @elseif ($schedule->status == "ditolak")
                    <span class="badge badge-danger">Ditolak</span>
                    @elseif ($schedule->status == "reschedule")
                    @if ($schedule->status_reschedule == "menerima-reschedule")
                      <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}</span>
                      <span class="badge badge-success">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                        @if ($schedule->waktu_checkin != null && $schedule->waktu_checkout != null)
                          <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : {{ $schedule->waktu_checkout }}</span>
                        @elseif ($schedule->waktu_checkin != null && $schedule->waktu_checkout == null)
                          <span class="badge badge-success">Check-in : {{ $schedule->waktu_checkin }}, Check-out : Belum check-out</span>
                        @else
                          <span class="badge badge-success">Check-in : Belum check-in</span>
                        @endif
                    @elseif ($schedule->status_reschedule == "menolak-reschedule")
                      <span class="badge badge-danger">Menolak Reschedule</span>
                      <span class="badge badge-danger">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                    @else
                      <span class="badge badge-warning">Reschedule</span>
                      <span class="badge badge-warning">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}</span>
                        
                    @endif
                  @endif
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>

</body>

</html>