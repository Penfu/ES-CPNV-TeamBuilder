<head>
    <title>Teambuilder - Equipe</title>
</head>

<div class="container" id="team-info-section">
    <h2>#<?= $team->id ?> <?= $team->name ?></h2>
</div>

<div class="container" id="members-list-section">
    <table>
        <tr>
            <th>Membre</th>
        </tr>

        <?php foreach ($team->members() as $member) : ?>
            <tr>
                <td>
                    <?php if ($member == $team->captain()) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
                        </svg>
                    <?php endif ?>
                    <?= $member->name ?>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>