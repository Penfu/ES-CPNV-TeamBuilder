<head>
    <title>Teambuilder - Membres</title>
    <link rel="stylesheet" href="/css/members.css">
</head>

<div class="container" id="members-list-section">
    <h2>Liste des membres</h2>
    <table>
        <tr>
            <th>Membre</th>
            <th>Equipes</th>
        </tr>

        <?php foreach ($members as $member) : ?>
            <tr>
                <td><?= $member->name ?></td>
                <td><?= implode(', ', array_map(fn($obj) => $obj->name, $member->teams())) ?></td>            </tr>
        <?php endforeach ?>
    </table>
</div>