<head>
    <title>Teambuilder - Equipe</title>
</head>

<div class="container" id="team-info-section">
    <h2>#<?= $params['team']->id ?> <?= $params['team']->name ?></h2>
</div>

<div class="container" id="members-list-section">
    <table>
        <tr>
            <th>Rôle</th>
            <th>Membre</th>
        </tr>

        <?php foreach ($params['team']->members() as $member) : ?>
            <tr>
                <td><?= $member->role()->name ?></td>
                <td><?= $member->name ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>