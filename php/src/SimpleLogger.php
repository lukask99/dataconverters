<?php
declare(strict_types=1);

namespace Leones\AdamLinkR;

class SimpleLogger
{

    /** @var string  */
    private $logFile;

    public function __construct(string $logFile)
    {
        $this->logFile = $logFile;
    }

    public function logToCsv(string $msg)
    {
        $fp = fopen($this->logFile, 'a');
        fwrite($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        fputcsv($fp, [$msg]);
        fclose($fp);
    }

    public function logToFile(string $msg)
    {
        file_put_contents($this->logFile, $msg . PHP_EOL, FILE_APPEND);
    }
}
