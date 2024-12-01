<?php

namespace Liloi\Rune;

class Check
{
    public function __construct()
    {

    }

    public function collect(): string
    {
        return $this->render([
            'title' => 'Test coverage check at ' . date('Y-m-d H:i:s')
        ]);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////

    protected function render(array $data = []): string
    {
        // @todo: assert filename

        extract($data);
        ob_start();
        include(__DIR__ . '/Check.tpl');
        $output = ob_get_clean();

        return $output;
    }
}

echo (new Check())->collect();