<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ResizePhotos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'photos:resize {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resizes images from img_og folder';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $file = $this->argument("file");
        $result = $this->resize($file);
        $this->line($result);
    }

    private function resize($file) 
    {
        $xs = $this->toXs($file);
        $s = $this->toS($file);
        $m = $this->toM($file);
        $l = $this->toL($file);
        return "success";
    }

    private function toXs($file) 
    {
        $v = Image::make($this->img_path("og").$file)
        ->resize(10, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($this->img_path("xs").$file, 85);
        return $v;
    }

    private function toS($file) 
    {
        $v = Image::make($this->img_path("og").$file)
        ->resize(420, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($this->img_path("s").$file, 85);
        return $v;
    }

    private function toM($file) {
        $v = Image::make($this->img_path("og").$file)
        ->resize(695, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($this->img_path("m").$file, 85);
        return $v;
    }

    private function toL($file) {
        $v = Image::make($this->img_path("og").$file)
        ->resize(900, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save($this->img_path("l").$file, 85);
        return $v;
    }



    private function img_path($par) {
        return storage_path('app/public/img_' . $par . "/");
    }
}
