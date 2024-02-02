<table style="table-layout: fixed;">
    <thead>
    <tr><th colspan="13" style="text-align:center;font-size:20px;font-weight:bold;">Data Pengajuan Pertemuan untuk Tahun: {{ $request->tahun }}, Bulan: {{ $request->bulan }}, Divisi: {{ $request->divisi }}</th></tr>
    <tr>
        <th height="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">NO</th>
        <th height="20" width="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Nama</th>
        <th height="20" width="30" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Email</th>
        <th height="20" width="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Tanggal Pengajuan</th>
        <th height="20" width="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Waktu Pengajuan</th>
        <th height="20" width="40" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Tujuan</th>
        <th height="20" width="55" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Keperluan</th>
        <th height="20" width="55" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Keterangan</th>
        <th height="20" width="60" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Status</th>
        <th height="20" width="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Waktu Check-In</th>
        <th height="20" width="20" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Waktu Check-Out</th>
        <th height="20" width="15" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">ID Pengajuan</th>
        <th height="20" width="30" valign="center" style="border:1px solid black;text-align:center;font-weight:bold;background-color:#9a95ff;">Waktu Pembuatan Pengajuan</th>
    </tr>
    </thead>
    <tbody>

    	@php
            $no = 0;
        @endphp
        @foreach($schedules as $schedule)
            <tr>
                <td valign="center" style="border:1px solid black;text-align:center;">{{ ++$no }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->nama }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->email }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->tanggal }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->waktu }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->tujuan }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->keperluan }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->keterangan }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">
                    @if ($schedule->status === null)
                        <span class="badge badge-info">Menunggu Staff</span>
                        @elseif ($schedule->status == "diterima")
                        <span class="badge badge-success">Diterima, ID : {{ $schedule->id_schedule }}</span>
                        @elseif ($schedule->status == "ditolak")
                        <span class="badge badge-danger">Ditolak</span>
                        @elseif ($schedule->status == "reschedule")
                        @if ($schedule->status_reschedule == "menerima-reschedule")
                          <span class="badge badge-success">Menerima Reschedule, ID : {{ $schedule->id_schedule }}</span>
                          <span class="badge badge-success">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                        @elseif ($schedule->status_reschedule == "menolak-reschedule")
                          <span class="badge badge-danger">Menolak Reschedule</span>
                          <span class="badge badge-danger">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}
                        @else
                          <span class="badge badge-warning">Reschedule</span>
                          <span class="badge badge-warning">{{ $schedule->tanggal_reschedule }}, {{ $schedule->waktu_reschedule }}</span>
                            
                        @endif
                      @endif
                </td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->waktu_checkin }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->waktu_checkout }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->id_schedule }}</td>
                <td valign="center" style="border:1px solid black;text-align:left;">{{ $schedule->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
