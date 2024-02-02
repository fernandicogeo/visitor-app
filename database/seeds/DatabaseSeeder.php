<?php

use App\User;
use App\Admin;
use App\Staff;
use App\Satpam;
use App\Manager;
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

        $staffData = [
            [
                "nama" => "Staff A",
                "username" => "staffA",
                "password" => bcrypt("staffApass"),
                "divisi" => "Keuangan"
            ],
            [
                "nama" => "Staff B",
                "username" => "staffB",
                "password" => bcrypt("staffBpass"),
                "divisi" => "Pengamanan"
            ],
            [
                "nama" => "Staff C",
                "username" => "staffC",
                "password" => bcrypt("staffCpass"),
                "divisi" => "Sarana"
            ],
            [
                "nama" => "Staff D",
                "username" => "staffD",
                "password" => bcrypt("staffDpass"),
                "divisi" => "SDM"
            ],
            [
                "nama" => "Staff E",
                "username" => "staffE",
                "password" => bcrypt("staffEpass"),
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
                "nama" => "Manager Keuangan",
                "username" => "manager.keuangan",
                "password" => bcrypt("managerKeuanganPass"),
                "divisi" => "Keuangan",
            ],
            [
                "nama" => "Manager Pengamanan",
                "username" => "manager.pengamanan",
                "password" => bcrypt("managerPengamananPass"),
                "divisi" => "Pengamanan",
            ],
            [
                "nama" => "Manager SDM",
                "username" => "manager.sdm",
                "password" => bcrypt("managerSdmPass"),
                "divisi" => "SDM",
            ],
            [
                "nama" => "Manager SI",
                "username" => "manager.si",
                "password" => bcrypt("managerSiPass"),
                "divisi" => "SI",
            ],
            [
                "nama" => "Manager Sarana",
                "username" => "manager.sarana",
                "password" => bcrypt("managerSaranaPass"),
                "divisi" => "Sarana",
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
            $tanggal = $faker->dateTimeBetween('2022-01-01', '2025-12-31')->format('Y-m-d');

            // Parse the generated date using Carbon
            $parsedDate = Carbon::parse($tanggal);

            // Subtract 1 day from the parsed date
            $created_at = $parsedDate->subDay();

            $status = null;
            $status_reschedule = null;
            $tanggal_reschedule = null;
            $waktu_reschedule = null;

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
