<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teambuilder - Mes équipes</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="/css/my-teams.css">
    </head>

    <div class="container" id="teams-info-section">
        <h2>Mes équipes</h2>
    </div>
    <div class="container" id="teams-list-section">
        <table>
            <tr>
                <th>Equipe</th>
                <th>Capitaine</th>
                <th>Nombre de membres</th>
            </tr>

            <?php foreach ($teams as $team) : ?>
                <tr>
                    <td><a href="?view=equipe&equipe=<?= $team->id ?>"><?= $team->name ?></a></td>
                    <td><?= $team->captain()->name ?></td>
                    <td><?= count($team->members()) ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>