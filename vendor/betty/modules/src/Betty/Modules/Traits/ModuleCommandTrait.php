<?php namespace Betty\Modules\Traits;

use Illuminate\Support\Str;

trait ModuleCommandTrait {

    /**
     * Get the module name.
     *
     * @return string
     */
    public function getModuleName()
    {
        $module = $this->argument('module') ?: $this->laravel['modules']->getUsedNow();

        if (!$module)
            return false;

        $module = Str::studly($module);

        if ( ! $this->laravel['modules']->has($module))
        {
            $this->error("Module [{$module}] does not exists.");

            exit;
        }

        return $module;
    }

}