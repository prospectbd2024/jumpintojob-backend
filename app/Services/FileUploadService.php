<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


class FileUploadService
{
    /**
     * This function is responsible for uploading files to the storage and returns the path of the uploaded file
     * @returns bool|string
     */
    public function process(UploadedFile $file, $destination, $table, $columnName, $process = 'update', $disk = 'local', $userColumnName = 'user_id', $fileName = null, $userId = null): string
    {
        if (!$userId) {
            $userId = auth()->id();
        }
        // Generate a unique filename
        if (!$fileName) {
            $fileName = $this->generateFileName($file);
        }
        if ($process == 'upload') {
            return Storage::disk($disk)->putFileAs($destination, $file, $fileName);
        } else {
            $data = DB::table($table)->where($userColumnName, $userId)->first();
            if (Storage::disk($disk)->exists($destination . '/' . $data->$columnName)) {
                Storage::disk($disk)->move($destination . '/' . $data->$columnName, 'deleted_profile_images/' . $data->$columnName);
            }
        }

        // Upload the new file
        Storage::disk($disk)->putFileAs($destination, $file, $fileName);
        // Update the record in the database
        DB::table($table)->where($userColumnName, $userId)->update([$columnName => $fileName]);
        return $fileName;
    }

    protected function generateFileName($file): string
    {
        return time() . '_' . mt_rand(100000, 999999) . '_' . $file->getClientOriginalName();
    }
}

