<?php namespace Betty\Modules\Commands;

use Betty\Modules\Stub;
use Illuminate\Support\Str;
use Betty\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ModuleGenerateProviderCommand extends GeneratorCommand {

    use ModuleCommandTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'module:provider';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new service provider for the specified module.';

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name', InputArgument::REQUIRED, 'The service provider name.'),
            array('module', InputArgument::OPTIONAL, 'The name of module will be used.'),
        );
    }

    /**
     * @return mixed
     */
    protected function getTemplateContents()
    {
        return new Stub('provider', [
            'MODULE' => $this->getModuleName(),
            'NAME' => $this->getFileName()
        ]);
    }

    /**
     * @return mixed
     */
    protected function getDestinationFilePath()
    {
        $path = $this->laravel['modules']->getModulePath($this->getModuleName());

        $generatorPath = $this->laravel['config']->get('modules::paths.generator.provider');

        return $path . $generatorPath . '/' . $this->getFileName() . '.php';
    }

    /**
     * @return string
     */
    private function getFileName()
    {
        return Str::studly($this->argument('name'));
    }
}
