<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuilderMakeController extends Command
{
    /**
     * The filesystem instance.
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    protected $signature = 'my-build:controller {name} {--model=}';

    protected $description = 'Create a CRUD controller';

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
        $slug = Str::slug($this->argument('name'),'_');
        $name = Str::studly($slug);
        $model = $this->option('model');

        $stub =  str_replace('##slug##',$slug,$stub);
        $stub =  str_replace('##name##',$name,$stub);
        $stub =  str_replace('##model##',$model,$stub);

        return $stub;
    }

    public function handle()
    {
        $slug = Str::slug($this->argument('name'),'_');
        $name = Str::studly($slug);

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
        return __DIR__.'/stubs/SampleController.plain.stub';
    }

    public function filePath($name)
    {
        $filename = str_replace('.', '/', $name) . 'Controller.php';

        return "app/Http/Controllers/{$filename}";
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }

}
