<?php
namespace App\Message;

use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class RequestHandler implements MessageHandlerInterface
{
    public function __invoke(RequestNotification $notification): void
    {
        $data = [
            'id' => $notification->getId(),
            'type' => $notification->getType(),
            'state' => 'in-progress',
        ];

        if (!self::writeContent($data)) {
            throw new \RuntimeException(sprintf('Failed to write content: %s', $notification->getId()));
        }

        if (!self::writeContent(array_merge($data, ['status' => 'done']))) {
            throw new \RuntimeException(sprintf('Failed to write content: %s', $notification->getId()));
        }
    }

    private static function writeContent(array $row): bool
    {
        $id = $row['id'];
        $filename = realpath(__DIR__ . "/../..") . "/var/result.{$id}.json";
        $data = json_encode($row, JSON_PRETTY_PRINT);

        sleep(3);
        // sleep(10);

        return file_put_contents($filename, $data) !== false;
    }
}