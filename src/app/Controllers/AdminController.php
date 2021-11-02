<?php

namespace App\Controllers;

use App\Databases\Connector;

class AdminController extends Controller
{
    public function index()
    {
        $teamConfig = parse_ini_file(APP_ROOT . '/config/team.ini');

        return $this->render('admin', [
            'teamMemberLimit' => $teamConfig['member_limit']
        ]);
    }

    public function teamMemberLimit()
    {
        $minLimit = Connector::getInstance()
            ->pdo()
            ->query("SELECT COUNT(member_id) as val FROM team_member GROUP BY team_id ORDER BY val ASC LIMIT 1")
            ->fetchAll()[0];

        $maxLimit = Connector::getInstance()
            ->pdo()
            ->query("SELECT COUNT(member_id) as val FROM team_member GROUP BY team_id ORDER BY val DESC LIMIT 1")
            ->fetchAll()[0];

        $_POST['limit'];

        echo json_encode(
            array(
                "minLimit" => $minLimit,
                "maxLimit" => $maxLimit,
            )
        );
    }
}
