<?php

use App\User;
use App\Admin;
use App\Staff;
use App\Satpam;
use App\Manager;
use App\SatpamName;
use App\Schedule;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                "nama" => "John Doe",
                "email" => "john.doe@example.com",
                "password" => bcrypt("johnpass"),
                "instansi" => "Instansi A",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "john_doe_ktp.jpg"
            ],
            [
                "nama" => "Jane Doe",
                "email" => "jane.doe@example.com",
                "password" => bcrypt("janepass"),
                "instansi" => "Instansi B",
                "nomor_hp" => "087654321098",
                "nik" => "0987654321",
                "foto_ktp" => "jane_doe_ktp.jpg"
            ],
            [
                "nama" => "Alice",
                "email" => "alice@example.com",
                "password" => bcrypt("alicepass"),
                "instansi" => "Instansi C",
                "nomor_hp" => "081112223344",
                "nik" => "1122334455",
                "foto_ktp" => "alice_ktp.jpg"
            ],
            [
                "nama" => "Bob",
                "email" => "bob@example.com",
                "password" => bcrypt("bobpass"),
                "instansi" => "Instansi D",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "bob_ktp.jpg"
            ],
            [
                "nama" => "Eve",
                "email" => "eve@example.com",
                "password" => bcrypt("evepass"),
                "instansi" => "Instansi E",
                "nomor_hp" => "089876543210",
                "nik" => "9876543210",
                "foto_ktp" => "eve_ktp.jpg"
            ],
            [
                "nama" => "Charlie",
                "email" => "charlie@example.com",
                "password" => bcrypt("charliepass"),
                "instansi" => "Instansi F",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "charlie_ktp.jpg"
            ],
            [
                "nama" => "David",
                "email" => "david@example.com",
                "password" => bcrypt("davidpass"),
                "instansi" => "Instansi G",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "david_ktp.jpg"
            ],
            [
                "nama" => "Frank",
                "email" => "frank@example.com",
                "password" => bcrypt("frankpass"),
                "instansi" => "Instansi H",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "frank_ktp.jpg"
            ],
            [
                "nama" => "Grace",
                "email" => "grace@example.com",
                "password" => bcrypt("gracepass"),
                "instansi" => "Instansi I",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "grace_ktp.jpg"
            ],
            [
                "nama" => "Harry",
                "email" => "harry@example.com",
                "password" => bcrypt("harrypass"),
                "instansi" => "Instansi J",
                "nomor_hp" => "081234567890",
                "nik" => "1234567890",
                "foto_ktp" => "harry_ktp.jpg"
            ],
        ];

        $satpamNameData = [
            [
                "satpam_name" => "John Doe"
            ],
            [
                "satpam_name" => "Jane Doe"
            ],
            [
                "satpam_name" => "Alice",
            ],
            [
                "satpam_name" => "Bob",
            ],
            [
                "satpam_name" => "Eve",
            ],
            [
                "satpam_name" => "Charlie",
            ],
            [
                "satpam_name" => "David",
            ],
            [
                "satpam_name" => "Frank",
            ],
            [
                "satpam_name" => "Grace",
            ],
            [
                "satpam_name" => "Harry",
            ],
        ];

        $staffData = [
            [
                "nama" => "Angkutan Barang",
                "username" => "staff.angbar",
                "password" => bcrypt("angbar123"),
                "divisi" => "Angkutan Barang"
            ],
            [
                "nama" => "Angkutan dan Fasilitas Penumpang",
                "username" => "staff.angpen",
                "password" => bcrypt("angpen123"),
                "divisi" => "Angkutan dan Fasilitas Penumpang"
            ],
            [
                "nama" => "Hukum",
                "username" => "staff.hukum",
                "password" => bcrypt("hukum123"),
                "divisi" => "Hukum"
            ],
            [
                "nama" => "Humasda",
                "username" => "staff.humasda",
                "password" => bcrypt("humasda123"),
                "divisi" => "Humasda"
            ],
            [
                "nama" => "Jalan Rel & Jembatan",
                "username" => "staff.rel",
                "password" => bcrypt("rel123"),
                "divisi" => "Jalan Rel & Jembatan"
            ],
            [
                "nama" => "Kesehatan",
                "username" => "staff.kesehatan",
                "password" => bcrypt("kesehatan123"),
                "divisi" => "Kesehatan"
            ],
            [
                "nama" => "Keuangan",
                "username" => "staff.keuangan",
                "password" => bcrypt("keuangan123"),
                "divisi" => "Keuangan"
            ],
            [
                "nama" => "Operasi",
                "username" => "staff.operasi",
                "password" => bcrypt("operasi123"),
                "divisi" => "Operasi"
            ],
            [
                "nama" => "Pengamanan",
                "username" => "staff.pengamanan",
                "password" => bcrypt("pengamanan123"),
                "divisi" => "Pengamanan"
            ],
            [
                "nama" => "Pengadaan Barang & Jasa",
                "username" => "staff.pengadaan",
                "password" => bcrypt("pengadaan123"),
                "divisi" => "Pengadaan Barang & Jasa"
            ],
            [
                "nama" => "Penjagaan Aset & Komersialisasi non-angkutan",
                "username" => "staff.penjagaan",
                "password" => bcrypt("penjagaan123"),
                "divisi" => "Penjagaan Aset & Komersialisasi non-angkutan"
            ],
            [
                "nama" => "Sarana",
                "username" => "staff.sarana",
                "password" => bcrypt("sarana123"),
                "divisi" => "Sarana"
            ],
            [
                "nama" => "SDM",
                "username" => "staff.sdm",
                "password" => bcrypt("sdm123"),
                "divisi" => "SDM"
            ],
            [
                "nama" => "Sintelis",
                "username" => "staff.sintelis",
                "password" => bcrypt("sintelis123"),
                "divisi" => "Sintelis"
            ],
            [
                "nama" => "SI",
                "username" => "staff.si",
                "password" => bcrypt("si123"),
                "divisi" => "SI"
            ],
        ];

        $faker = Faker::create();

        $namaArray = [
            "John Doe",
            "Jane Doe",
            "Alice",
            "Bob",
            "Eve",
            "Charlie",
            "David",
            "Frank",
            "Grace",
            "Harry",
        ];

        $emailArray = [
            "john.doe@example.com",
            "jane.doe@example.com",
            "alice@example.com",
            "bob@example.com",
            "eve@example.com",
            "charlie@example.com",
            "david@example.com",
            "frank@example.com",
            "grace@example.com",
            "harry@example.com",
        ];

        $managersData = [
            [
                "nama" => "Manager Angkutan Barang",
                "username" => "manager.angbar",
                "password" => bcrypt("angbar123"),
                "divisi" => "Angkutan Barang"
            ],
            [
                "nama" => "Manager Angkutan dan Fasilitas Penumpang",
                "username" => "manager.angpen",
                "password" => bcrypt("angpen123"),
                "divisi" => "Angkutan dan Fasilitas Penumpang"
            ],
            [
                "nama" => "Manager Hukum",
                "username" => "manager.hukum",
                "password" => bcrypt("hukum123"),
                "divisi" => "Hukum"
            ],
            [
                "nama" => "Manager Humasda",
                "username" => "manager.humasda",
                "password" => bcrypt("humasda123"),
                "divisi" => "Humasda"
            ],
            [
                "nama" => "Manager Jalan Rel & Jembatan",
                "username" => "manager.rel",
                "password" => bcrypt("rel123"),
                "divisi" => "Jalan Rel & Jembatan"
            ],
            [
                "nama" => "Manager Kesehatan",
                "username" => "manager.kesehatan",
                "password" => bcrypt("kesehatan123"),
                "divisi" => "Kesehatan"
            ],
            [
                "nama" => "Manager Keuangan",
                "username" => "manager.keuangan",
                "password" => bcrypt("keuangan123"),
                "divisi" => "Keuangan"
            ],
            [
                "nama" => "Manager Operasi",
                "username" => "manager.operasi",
                "password" => bcrypt("operasi123"),
                "divisi" => "Operasi"
            ],
            [
                "nama" => "Manager Pengamanan",
                "username" => "manager.pengamanan",
                "password" => bcrypt("pengamanan123"),
                "divisi" => "Pengamanan"
            ],
            [
                "nama" => "Manager Pengadaan Barang & Jasa",
                "username" => "manager.pengadaan",
                "password" => bcrypt("pengadaan123"),
                "divisi" => "Pengadaan Barang & Jasa"
            ],
            [
                "nama" => "Manager Penjagaan Aset & Komersialisasi non-angkutan",
                "username" => "manager.penjagaan",
                "password" => bcrypt("penjagaan123"),
                "divisi" => "Penjagaan Aset & Komersialisasi non-angkutan"
            ],
            [
                "nama" => "Manager Sarana",
                "username" => "manager.sarana",
                "password" => bcrypt("sarana123"),
                "divisi" => "Sarana"
            ],
            [
                "nama" => "Manager SDM",
                "username" => "manager.sdm",
                "password" => bcrypt("sdm123"),
                "divisi" => "SDM"
            ],
            [
                "nama" => "Manager Sintelis",
                "username" => "manager.sintelis",
                "password" => bcrypt("sintelis123"),
                "divisi" => "Sintelis"
            ],
            [
                "nama" => "Manager SI",
                "username" => "manager.si",
                "password" => bcrypt("si123"),
                "divisi" => "SI"
            ],
        ];

        $satpamData = [
            [
                "nama" => "Satpam 1",
                "username" => "satpam1",
                "password" => bcrypt("satpam1Pass"),
            ],
            [
                "nama" => "Satpam 2",
                "username" => "satpam2",
                "password" => bcrypt("satpam2Pass"),
            ],
            [
                "nama" => "Satpam 3",
                "username" => "satpam3",
                "password" => bcrypt("satpam3Pass"),
            ],
            [
                "nama" => "Satpam 4",
                "username" => "satpam4",
                "password" => bcrypt("satpam4Pass"),
            ],
            [
                "nama" => "Satpam 5",
                "username" => "satpam5",
                "password" => bcrypt("satpam5Pass"),
            ],
        ];

        $divisions = [
            "Angkutan Barang",
            "Angkutan dan Fasilitas Penumpang",
            "Hukum",
            "Humasda",
            "Jalan Rel & Jembatan",
            "Kesehatan",
            "Keuangan",
            "Operasi",
            "Pengamanan",
            "Pengadaan Barang & Jasa",
            "Penjagaan Aset & Komersialisasi non-angkutan",
            "Sarana",
            "SDM",
            "Sintelis",
            "SI",
        ];

        $codes = [
            "AB",
            "AFP",
            "HUK",
            "HUM",
            "JRJ",
            "KES",
            "KEU",
            "OP",
            "AMAN",
            "PBJ",
            "PAK",
            "SAR",
            "SDM",
            "SIN",
            "SI",
        ];

        // USER
        foreach ($usersData as $userData) {
            User::create($userData);
        }

        // SATPAM NAME
        foreach ($satpamNameData as $satpamName) {
            SatpamName::create($satpamName);
        }

        // STAFF
        foreach ($staffData as $staff) {
            Staff::create($staff);
        }

        // SCHEDULE
        foreach (range(1, 100) as $index) {
            $randomIndex = array_rand($namaArray);
            $nama = $namaArray[$randomIndex];
            $email = $emailArray[$randomIndex];

            // Generate random date
            if ($index <= 10)
                $tanggal = $faker->dateTimeBetween('2022-01-01', '2023-12-31')->format('Y-m-d');
            else
                $tanggal = $faker->dateTimeBetween('2024-01-01', '2024-12-31')->format('Y-m-d');

            // Parse the generated date using Carbon
            $parsedDate = Carbon::parse($tanggal);

            // Subtract 1 day from the parsed date
            $created_at = $parsedDate->subDay();

            $status = null;
            $status_reschedule = null;
            $tanggal_reschedule = null;
            $waktu_reschedule = null;

            $kendaraan = $faker->randomElement(['Pribadi', 'Umum', 'Online']);
            $jenis_kendaraan = null;
            $nopol_kendaraan = null;

            if ($kendaraan === 'Pribadi') {
                $jenis_kendaraan = $faker->randomElement(['Roda 2', 'Roda 4']);
                $nopol_kendaraan = strtoupper($faker->regexify('[A-Z]{2}\d{4}[A-Z]{2}'));
            }

            if ($index <= 20) {
                $status = 'diterima';
            } elseif ($index > 20 && $index <= 30) {
                $status = 'ditolak';
            } elseif ($index > 30 && $index <= 70) {
                $status = 'reschedule';
                $tanggal_reschedule = now()->toDateString();
                $waktu_reschedule = 'pagi (09.00 - 11.00)';
                if ($index > 30 && $index <= 40) {
                    $status_reschedule = 'menerima-reschedule';
                } else if ($index > 40 && $index <= 60) {
                    $status_reschedule = 'menolak-reschedule';
                }
            }

            DB::table('schedules')->insert([
                'nama' => $nama,
                'email' => $email,
                'tanggal' => $tanggal,
                'waktu' => $faker->randomElement(['pagi (09.00 - 11.00)', 'siang (14.00 - 16.00)']),
                'tujuan' => $faker->randomElement($divisions),
                'keperluan' => $faker->sentence,
                'keterangan' => $faker->sentence,
                'kendaraan' => $kendaraan,
                'jenis_kendaraan' => $jenis_kendaraan,
                'nopol_kendaraan' => $nopol_kendaraan,
                'tanggal_reschedule' => $tanggal_reschedule,
                'waktu_reschedule' => $waktu_reschedule,
                'status' => $status,
                'status_reschedule' => $status_reschedule,
                'created_at' => $created_at,
            ]);
        }


        $i = 0;
        foreach ($divisions as $division) {

            $schedules = Schedule::where(function ($query) use ($division) {
                $query->where('tujuan', $division)
                    ->where(function ($query) {
                        $query->where('status', 'diterima')
                            ->orWhere(function ($query) {
                                $query->where('status', 'reschedule')
                                    ->where('status_reschedule', 'menerima-reschedule');
                            });
                    });
            })->get();

            foreach ($schedules as $schedule) {
                $id_schedule = $codes[$i] . $schedule->id;
                Schedule::where('id', $schedule->id)->update(['id_schedule' => $id_schedule]);
            }

            $i++;
        }

        // MANAGER
        foreach ($managersData as $manager) {
            Manager::create($manager);
        }

        // SATPAM
        foreach ($satpamData as $satpam) {
            Satpam::create($satpam);
        }

        // DIVISION
        $j = 0;
        foreach ($divisions as $division) {
            DB::table('divisions')->insert([
                'nama' => $divisions[$j],
                'kode' => $codes[$j],
                'slug' => Str::slug($divisions[$j]), // Menggunakan helper Str untuk membuat slug
            ]);
            $j++;
        }

        // ADMIN
        Admin::create([
            "username" => "admin",
            "password" => bcrypt("admin"),
        ]);
    }
}
