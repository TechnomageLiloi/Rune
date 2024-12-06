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
        $countTested = 0;
        $countUntested = 0;

        foreach ($dirs as $path)
        {
            if(!str_contains($path, '/../'))
            {
                continue;
            }

            $part = explode('/../', $path)[1];

            $parts = explode('/', $part);

            if(in_array($parts[0], ['.git', '.idea', 'vendor', 'Tests', 'Wiki', 'Config', 'Pool', 'Install', '']))
            {
                continue;
            }

            $countTests = 0;
            $countAsserts = 0;
            if(file_exists($path . '/Test.php'))
            {
                $tested = 'tested';
                ++$countTested;

                $testContent = file_get_contents($path . '/Test.php');
                $countTests = substr_count($testContent, 'public function test');
                $countAsserts = substr_count($testContent, '->assert');
            }
            else
            {
                $tested = 'untested';
                ++$countUntested;
            }

            $files = scandir($path);

            $info[] = [
                'path' => $path,
                'part' => $part,
                'tested' => $tested,
                'countFiles' => count($files) - ($tested === 'tested' ? 3 : 0),
                'countTests' => $countTests,
                'countAsserts' => $countAsserts,
            ];
        }

        return $this->render([
            'info' => $info,
            'countTested' => $countTested,
            'countUntested' => $countUntested,
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