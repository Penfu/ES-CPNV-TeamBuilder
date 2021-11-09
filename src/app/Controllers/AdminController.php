<?php

namespace App\Controllers;

use App\Databases\Connector;

class AdminController extends Controller
{
    private $teamConfig = APP_ROOT . '/config/team.json';

    public function index()
    {
        $config = json_decode(file_get_contents($this->teamConfig), true);

        return $this->render('admin', [
            'teamMemberLimit' => $config['member_limit']
        ]);
    }

    public function teamMemberLimit()
    {
        (int)$minLimit = Connector::getInstance()
            ->pdo()
            ->query("SELECT COUNT(member_id) as val FROM team_member GROUP BY team_id ORDER BY val ASC LIMIT 1")
            ->fetchAll()[0]['val'];

        (int)$maxLimit = Connector::getInstance()
            ->pdo()
            ->query("SELECT COUNT(member_id) as val FROM team_member GROUP BY team_id ORDER BY val DESC LIMIT 1")
            ->fetchAll()[0]['val'];

        (int)$newLimit = $_POST['member_limit'];

        if ($newLimit >= $minLimit && $newLimit <= $maxLimit) {
            $config = json_decode(file_get_contents($this->teamConfig), true);
            $config['member_limit'] = $newLimit;
            file_put_contents($this->teamConfig, json_encode($config));

            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(
                ['status' => 'error', 'message' => 'Invalid limit']
            );
        }
    }
}
