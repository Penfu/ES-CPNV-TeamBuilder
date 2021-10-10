<head>
    <title>Teambuilder - Modérateurs</title>
</head>


<div class="container" id="moderators-list-section">
    <h2>Liste des modérateurs</h2>
    <table>
        <tr>
            <th>Modérateurs</th>
        </tr>

        <?php foreach ($params['moderators'] as $moderator) : ?>
            <tr>
                <td><?= $moderator->name ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>