<?php

namespace App\Actions;

use Phue\Client;
use Phue\Command\SetGroupState;

class HueChangeGroupScene
{
    public function __construct($groupName, $sceneName)
    {
        $client = new Client(config('auto.hue.ip'), config('auto.hue.user'));

        $groups = $client->getGroups();
        $scenes = $client->getScenes();
        foreach ($groups as $group) {
            foreach ($scenes as $scene) {
                if ($group->getName() === $groupName && $scene->getName() === $sceneName) {
                    $command = (new SetGroupState($group))->scene($scene);
                    $client->sendCommand($command);
                }
            }
        }
    }
}
