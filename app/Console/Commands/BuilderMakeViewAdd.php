<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BuilderMakeViewAdd extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;
    protected $columns;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    protected $signature = 'my-build:view-add {name} {--column=}';

    protected $description = 'Create a CRUD View Add';

    /**
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function buildFile()
    {

        $stub = $this->files->get($this->getStub());

        return $this->replaceArgument($stub);

    }

    protected function replaceArgument($stub)
    {
        $name = $this->argument('name');
        $slug = Str::slug($name,'_');

        $column = '';
        foreach($this->columns as $col)
        {
            $input = $this->files->get($this->getForm($col->tipe));

            $input = str_replace('##nama_kolom##',$col->nama_kolom,$input);
            $input = str_replace('##nama_label##',$col->nama_label,$input);
            $input = str_replace('##value_edit##','',$input);
            $column .= $input;
        }

        $stub = str_replace('##slug##',$slug,$stub);
        $stub = str_replace('##name##',$name,$stub);
        $stub = str_replace('##column##',$column,$stub);

        return $stub;
    }

    public function handle()
    {
        $this->columns = json_decode($this->option('column'));

        $name = $this->argument('name');

        $path = base_path($this->filePath($name));

        if (File::exists($path))
        {
            $this->error("File {$path} already exists!");
            return;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->buildFile());

        $this->info("File {$path} created.");
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/view_add.blade.php.plain.stub';
    }

    protected function getForm($type)
    {
        return __DIR__."/stubs/forms/{$type}.plain.stub";
    }

    public function filePath($name)
    {
        $slug = Str::slug($name,'_');
        return "resources/views/{$slug}/add.blade.php";
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }
}
