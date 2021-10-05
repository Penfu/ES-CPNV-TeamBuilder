<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teambuilder - Membres</title>
</head>

<body>

    <head>
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
                    <td><?= implode(', ', $this->pluck($member->teams(), 'name')) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>