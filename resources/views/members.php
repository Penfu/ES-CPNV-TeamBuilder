<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Teambuilder</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="/css/members.css">
    </head>

    <header>
    </header>

    <div id="hero">
        <h1>Teambuilder</h1>
        <p>Connecté en tant que: <?= $_SESSION['userLog']->name ?></p>
    </div>

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
                    <td>
                        <?php foreach ($member->teams() as $team) : ?>
                            <?= $team->name .  ' ,' ?>
                        <?php endforeach ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>