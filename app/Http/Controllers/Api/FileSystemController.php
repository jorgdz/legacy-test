<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\FilesystemService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Contracts\IFileSystemController;

class FileSystemController extends Controller implements IFileSystemController
{
    private $filesystem;
    public function __construct(FilesystemService $filesystem) {
        $this->filesystem = $filesystem;
    }

    /**
     * showFile
     *
     * @param  mixed $request
     * @return void
     */
    public function showFile(Request $request) {
        return $this->filesystem->show($request);
    }
 
    /**
     * downloadFile
     *
     * @param  mixed $request
     * @return void
     */
    public function downloadFile(Request $request) {
        return $this->filesystem->download($request);
    }

    /**
     * uploadFile
     *
     * @param  mixed $request
     * @return void
     */
    public function uploadFile(Request $request) {
        return $this->filesystem->store($request);
    }
}
