<?php

namespace Axel\Antivirus\Services;

use RuntimeException;
use Socket;

class ClamAvService
{
    public const CLAMAV_MAX = 20000;

    protected function getSocket(): Socket
    {
        $socket = socket_create(AF_UNIX, SOCK_STREAM, 0);
        $status = socket_connect($socket, '/var/run/clamav/clamd.ctl');
        if (!$status) {
            throw new RuntimeException('Unable to connect to ClamAV server');
        }

        return $socket;
    }

    public function infected(string $file): bool
    {
        if (env("APP_ENV", 'production') === 'local') {
            return rand(0, 1);
        }
        
        $out = $this->sendCommand('SCAN ' . $file);
        $out = \explode(':', $out);
        $stats = \end($out);
        return \trim($stats) !== 'OK';
    }

    public function ping(): bool
    {
        $return = $this->sendCommand('PING');
        return \trim($return) === 'PONG';
    }

    public function version(): string
    {
        return \trim($this->sendCommand('VERSION'));
    }

    private function sendCommand(string $command): ?string
    {
        $return = null;

        $socket = $this->getSocket();

        \socket_send($socket, $command, \strlen($command), 0);
        \socket_recv($socket, $return, self::CLAMAV_MAX, 0);
        \socket_close($socket);

        return \trim($return);
    }
}
