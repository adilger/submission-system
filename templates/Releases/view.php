<div class="row">
    <div class="column-responsive">
        <div class="releases view content">
            <h2><?php echo h($release->acronym) ?> Release</h2>

            <table class="tb">
                <tr>
                    <th><?php echo __('ID') ?></th>
                    <td><?php echo $this->Number->format($release->id) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Acronym') ?></th>
                    <td><?php echo h($release->acronym) ?></td>
                </tr>
                <tr>
                    <th><?php echo __('Release Date') ?></th>
                    <td><?php echo h($release->release_date) ?></td>
                </tr>
            </table>

            <div class="related">
                <h2><?php echo __('Lists') ?></h2>

                <p>You can visualize or create the following lists for the <?php echo $release->acronym; ?> release:</p>

                <div class="list-buttons">
                    <?php
                    $found = [];
                    $id = [];

                    if (!empty($release->listings)) {
                        foreach ($release->listings as $listing) {
                            $found[] = $listing->type_id;
                            $id[$listing->type_id] = $listing->id;
                        }
                    }

                    foreach ($types as $type) {
                        if (in_array($type->id, $found)) {
                            echo $this->Html->link($type->name,
                                [
                                    'controller' => 'Listings',
                                    'action' => 'view',
                                    $id[$type->id]
                                ],
                                [
                                    'class' => 'option-complete'
                                ]
                            );
                        } else {
                            echo $this->Html->link($type->name,
                                [
                                    'controller' => 'Submissions',
                                    'action' => 'build',
                                    strtolower($release->acronym),
                                    strtolower($type->url)
                                ],
                                [
                                    'class' => 'option'
                                ]
                            );
                        }
                    }
                    ?>
                </div>

                <p>Please, notice that once created you cannot edit a list. If you need to make corrections you can open it and click on remove. You will then be able to re-build it. For already released lists, you can only make modifications by opening a public PR on GitHub.</p>
            </div>

            <div class="submissions index content">
                <h2><?php echo __('New Submissions') ?></h2>

                    <div class="submissions-action">
                    <?php
                    echo $this->Html->link('DOWNLOAD', [
                        'controller' => 'submissions',
                        'action' => 'export',
                        strtolower($release->acronym)
                    ], [
                        'class' => 'button-navigation'
                    ]);
                    ?>
                </div>

                <div class="release-information">
                    <p>These are the new submissions received for this new list release:</p>
                </div>

                <?php if (!empty($release->submissions)) { ?>
                <div class="table-responsive">
                    <table class="tb">
                        <tr>
                            <th class="tb-id"><?php echo __('ID') ?></th>
                            <th><?php echo __('System') ?></th>
                            <th><?php echo __('Institution') ?></th>
                            <th><?php echo __('Filesystem Type') ?></th>
                            <th><?php echo __('Nodes') ?></th>
                            <th class="tb-number"><?php echo __('Score') ?></th>
                            <th class="tb-center"><?php echo __('Status') ?></th>
                            <th class="tb-actions"><?php echo __('Actions') ?></th>
                        </tr>
                        <?php foreach ($release->submissions as $submission) { ?>
                        <tr>
                            <td class="tb-id"><?php echo h($submission->id) ?></td>
                            <td><?php echo h($submission->information_system) ?></td>
                            <td><?php echo h($submission->information_institution) ?></td>
                            <td><?php echo h($submission->information_filesystem_type) ?></td>
                            <td><?php echo h($submission->information_client_nodes) ?></td>
                            <td class="tb-number"><?php echo $this->Number->format($submission->io500_score, ['places' => 2, 'precision' => 2]) ?></td>
                            <td class="tb-actions">
                                <strong class="status status-<?php echo h($submission->status->id) ?>"><?php echo h($submission->status->name) ?></strong>
                            </td>
                            <td class="tb-actions">
                                <?php echo $this->Html->link('<i class="fas fa-eye"></i>', ['controller' => 'Submissions', 'action' => 'view', $submission->id], ['escape' => false]) ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
                <?php } else { ?>
                <p class="gray">No new submissions were found for the <?php echo $release->acronym; ?> release. Please, check back again soon!</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
