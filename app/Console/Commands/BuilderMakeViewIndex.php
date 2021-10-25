<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuilderMakeViewIndex extends Command
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

    protected $signature = 'my-build:view-index {name} {--column=} {--pk=}';

    protected $description = 'Create a CRUD View Index';

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

        $table_column = '';
        $table_body = '';

        foreach($this->columns as $col)
        {
            $table_column .= "<th>{$col->nama_label}</th>\n";
            $table_body   .= '<td>{{ $item->'.$col->nama_kolom.' }}</td>'.PHP_EOL;
        }

        $stub = str_replace('##slug##',$slug,$stub);
        $stub = str_replace('##name##',$name,$stub);
        $stub = str_replace('##table_column##',$table_column,$stub);
        $stub = str_replace('##table_body##',$table_body,$stub);

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
        return __DIR__.'/stubs/view_index.blade.plain.stub';
    }

    public function filePath($name)
    {
        $slug = Str::slug($name,'_');
        return "resources/views/{$slug}/index.blade.php";
    }

    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }

        return $path;
    }

}
