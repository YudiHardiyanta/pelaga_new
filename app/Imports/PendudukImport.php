<?php

namespace App\Imports;

use App\Models\Penduduk;
use App\Models\UploadLog;
use App\Models\UploadLogDetail;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class PendudukImport implements ToCollection
{
    protected $logId;
    protected $banjar_id;

    public function __construct($logId, $banjar_id)
    {
        $this->logId = $logId;
        $this->banjar_id = $banjar_id;
    }
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        $success = 0;
        $failed = 0;

        foreach ($rows as $index => $row) {
            if ($index > 0) {
                try {

                    if (empty($row[0])) {
                        throw new \Exception("Nama Tidak Boleh Kosong");
                    }
                    //Create User
                    $user = User::where('nik', '=', $row[2])->first();
                    if ($user) {
                        $user->update([
                            'name' => Str::upper($row[0]),
                            'email' => $row[1],
                            'kk' => $row[3],
                            'jk' => $row[4],
                            'is_active' => TRUE,
                            'password' => Hash::make($row[3])
                        ]);
                    } else {
                        User::create(
                            [
                                'name' => Str::upper($row[0]),
                                'email' => $row[1],
                                'nik' => $row[2],
                                'kk' => $row[3],
                                'jk' => $row[4],
                                'is_active' => TRUE,
                                'password' => Hash::make($row[3])
                            ]
                        );
                    }
                    $user_role = UserRole::where('nik', '=', $row[2])->first();
                    //Create Role default user
                    if ($user_role) {
                        $user_role->update([
                            'role_id' => 2 //role umum User Semua
                        ]);
                    } else {
                        UserRole::create([
                            'nik' => $row[2],
                            'role_id' => 2 //role umum User Semua
                        ]);
                    }

                    $penduduk = Penduduk::where('nik', '=', $row[2])->first();
                    if ($penduduk) {
                        $penduduk->update([
                            'kk' => $row[3],
                            'alamat' => Str::upper($row[5]),
                            'tempat_lahir' => Str::upper($row[6]),
                            'tanggal_lahir' => blank($row[7]) ? null : Carbon::createFromFormat('d-m-Y', $row[7])->format('Y-m-d'),
                            'agama' => Str::upper($row[8]),
                            'pendidikan' => Str::upper($row[9]),
                            'pekerjaan' => Str::upper($row[10]),
                            'gol_darah' => Str::upper($row[11]),
                            'status_perkawinan' => Str::upper($row[12]),
                            'tanggal_perkawinan' => blank($row[13]) ? null : Carbon::createFromFormat('d-m-Y', $row[13])->format('Y-m-d'),
                            'status_dalam_hubungan_keluarga' => Str::upper($row[14]),
                            'kewarganegaraan' => Str::upper($row[15]),
                            'banjar_id' => $this->banjar_id
                        ]);
                    } else {
                        Penduduk::create([
                            'nik' => $row[2],
                            'kk' => $row[3],
                            'alamat' => Str::upper($row[5]),
                            'tempat_lahir' => Str::upper($row[6]),
                            'tanggal_lahir' => blank($row[7]) ? null : Carbon::createFromFormat('d-m-Y', $row[7])->format('Y-m-d'),
                            'agama' => Str::upper($row[8]),
                            'pendidikan' => Str::upper($row[9]),
                            'pekerjaan' => Str::upper($row[10]),
                            'gol_darah' => Str::upper($row[11]),
                            'status_perkawinan' => Str::upper($row[12]),
                            'tanggal_perkawinan' => blank($row[13]) ? null : Carbon::createFromFormat('d-m-Y', $row[13])->format('Y-m-d'),
                            'status_dalam_hubungan_keluarga' => Str::upper($row[14]),
                            'kewarganegaraan' => Str::upper($row[15]),
                            'banjar_id' => $this->banjar_id
                        ]);
                    }

                    $success++;
                } catch (\Exception $e) {

                    UploadLogDetail::create([
                        'upload_log_id' => $this->logId,
                        'row_number' => $index + 1,
                        'error_message' => $e->getMessage(),
                        'row_data' => json_encode($row)
                    ]);

                    $failed++;
                }
            }
        }

        UploadLog::where('id', $this->logId)->update([
            'total_rows' => $success + $failed,
            'success_rows' => $success,
            'failed_rows' => $failed
        ]);
    }
}
