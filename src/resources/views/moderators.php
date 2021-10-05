<!DOCTYPE html>
<html lang="en">

<head>
    <title>Teambuilder - Modérateurs</title>
</head>

<body>

    <head>
        <link rel="stylesheet" href="/css/moderators.css">
    </head>

    <div class="container" id="moderators-list-section">
        <h2>Liste des modérateurs</h2>
        <table>
            <tr>
                <th>Modérateurs</th>
            </tr>

            <?php foreach ($moderators as $moderator) : ?>
                <tr>
                    <td><?= $moderator->name ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>