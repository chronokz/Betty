<?php namespace Betty\Modules\Process;

use Betty\Modules\Module;
use Betty\Modules\Contracts\RunableInterface;

class Runner implements RunableInterface {

    /**
     * The module instance.
     *
     * @var \Betty\Modules\Module
     */
    protected $module;

    /**
     * The constructor.
     *
     * @param \Betty\Modules\Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * Run the given command.
     *
     * @param  string $command
     * @return void
     */
    public function run($command)
    {
        passthru($command);
    }

}