<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teambuilder - Equipe</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="/css/team.css">
    </head>

    <div class="container" id="team-info-section">
        <h2>#<?= $team->id ?> <?= $team->name ?></h2>
    </div>

    <div class="container" id="members-list-section">
        <table>
            <tr>
                <th>Rôle</th>
                <th>Membre</th>
            </tr>

            <?php foreach ($members as $member) : ?>
                <tr>
                    <td><?= $member->role()->name ?></td>
                    <td><?= $member->name ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>