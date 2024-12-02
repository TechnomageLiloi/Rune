<?php

namespace Liloi\Rune;

class Check
{
    public function __construct()
    {

    }

    public function collect(): string
    {
        $dirs = $this->getActiveDirectories(__DIR__ . '/..');
        $info = [];

        foreach ($dirs as $path)
        {
            if(!str_contains($path, '/../'))
            {
                continue;
            }

            $part = explode('/../', $path)[1];

            $parts = explode('/', $part);

            if(in_array($parts[0], ['.git', '.idea', 'vendor', 'Wiki', 'Config', 'Pool', 'Install', '']))
            {
                continue;
            }

            $tested = file_exists($path . '/Test.php') ? 'tested' : 'untested';

            $info[] = [
                'path' => $path,
                'part' => $part,
                'tested' => $tested
            ];
        }

        return $this->render([
            'info' => $info,
            'title' => 'Test coverage check at ' . date('Y-m-d H:i:s')
        ]);
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////

    protected function getActiveDirectories(string $path): array
    {
        $recursiveIteratorIterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        $files = [];

        /** @var \SplFileInfo $file */
        foreach ($recursiveIteratorIterator as $file) {
            if (!$file->isDir() || in_array($file->getBasename(), ['..'])){
                continue;
            }

            $files[] = $file->getPath();
        }

        return $files;
    }

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