<div class="submissions index content">
    <h2>SUBMISSION #<?php echo h($submission->id) ?></h2>

    <div class="both"></div>
    
    <h3><?php echo __('REPRODUCIBILITY QUESTIONNAIRE') ?></h3>
</div>

<?php echo $this->Form->create($questionnaire); ?>

<div class="row">
    <div class="column-responsive column-80">
        <div class="questionnaires form content">
            <fieldset>
                <legend>System Purpose</legend>

                <p>
                    Please describe the purpose and general usage of the submitted system.&nbsp; This would include the types of typical applications it supports (e.g., defense applications, molecular dynamics, benchmarking, system test, systems research), the general use and purpose of the data generated by the applications running on it.
                </p>

                <p>
                    <i class="fa-solid fa-circle-exclamation red-stripe"></i> All questions are <strong>mandatory</strong> and replies require a minimum of 10 words.
                </p>

                <?php
                echo $this->Form->control('system_purpose', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Availability</legend>

                <p>
                    Please provide the deployment timeframe of the submitted system, or for on-demand cloud systems, the general period over which it is deployed and destroyed.
                </p>

                <p>
                    Please describe the availability of the system to users and who are its set of most regular users.
                </p>

                <?php
                echo $this->Form->control('availability', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Storage System Software</legend>

                <p>
                    Please describe the purpose and general usage of the submitted system.&nbsp; This would include the types of typical applications it supports (e.g., defense applications, molecular dynamics, benchmarking, system test, systems research), the general use and purpose of the data generated by the applications running on it.
                </p>

                <p>
                    How is this software available? (e.g., commercially, open-source, not publicly available) Note that if the storage software is not open-source or commercially available, then a general description would be requested, but this would limit the submission’s reproducibility score.
                </p>

                <p>
                    Can anyone download/purchase this software?
                </p>

                <p>
                    List either product webpage or open-source repo of the exact software used in IO500.
                </p>

                <p>
                    Give any and all additional details of this specific storage deployment: (e.g., type of storage server product such IBM ESS or DDN SFA400X2, use of Ext4 or some other file system on each storage node, dual connected storage media to storage servers).
                </p>

                <?php
                echo $this->Form->control('storage_system_software', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Runtime Environment</legend>

                <p>
                    State here that you provided all scripts/documentation that would allow someone else to reproduce your environment and attempt to achieve a similar IO500 score as the submitted system.
                </p>

                <p>
                    <strong>NOTE</strong>: provide all files/documentation/scripts that would enable a user to build your environment and deploy the custom scripts, software, or config files once they have obtained the appropriate storage system hardware and software. These may be included into the io500.tgz or into the extraCodes upload on the submission form.
                </p>

                <p>
                    Several examples include:                    
                </p>

                <ul>
                    <li>
                        Commands used to set striping information (either for the entire system or for particular directories)
                    </li>
                    <li>
                        File system config and tuning information (or a reason why this is not available due to lack of root access, etc) on each node type (e.g., non-default config parameters on all 3 Lustre MDS, OSS, and client)
                    </li>
                    <li>
                        Any additional scripts utilized that impact IO500 execution beyond the io500 config file. For example, with IBM Spectrum Scale, the output of config, cluster, file system and fileset commands (and possibly even a dump of the configuration if possible). Each file system probably has similar type of config/tuning information that would need to be shared for a user to fully reproduce the environment.
                    </li>
                </ul>

                <?php
                echo $this->Form->control('runtime_environment', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Fault Tolerance Mechanisms</legend>

                <p>
                    Does your system have a single point of failure?  Please describe all mechanisms provide fault tolerance for the submitted storage system.  Be specific to your submission, not general storage system capabilities.
                </p>

                <ul>
                    <li>
                        Power
                    </li>
                    <li>
                        Networking (e.g., dual redundant switches)
                    </li>
                    <li>
                        Inter Storage data and metadata server (e.g., active-active servers, client-directed RAID, declustered RAID, erasure-coding, 3-way replication)
                    </li>
                    <li>
                        Intra Storage data and metadata server storage media (e.g., raid5)
                    </li>
                </ul>

                <p>
                    Please list any additional information needed to determine whether this system has a single point of failure.
                </p>

                <?php
                echo $this->Form->control('fault_tolerance_mechanisms', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Execution</legend>

                <p>
                    Please provide a description of how the IO500 benchmark was executed, e.g., via system scheduler (e.g., SLURM) to run a job on the compute cluster, which initially ran a setup process to configure the client and file system, and then started the full benchmark.
                </p>

                <p>
                    During the IO500 benchmark execution was the system entirely dedicated to running the benchmark or were there other jobs running in the same cluster and storage system?
                </p>

                <?php
                echo $this->Form->control('execution', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Caching</legend>

                <p>
                    Please describe all caching mechanisms in client/server that were utilized during the IO500 run. This could include caching in any storage medium (e.g., SSD, RAM).
                </p>

                <p>
                    A few examples would include:
                </p>

                <ul>
                    <li>Client data/metadata caching (in Linux page cache or in other memory cache)</li>
                    <li>Client side NVMe read-only data cache</li>
                    <li>Storage server metadata/data caching in RAM</li>
                    <li>Storage controller caching</li>
                    <li>RAID card caching</li>
                </ul>

                <?php
                echo $this->Form->control('caching', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Data Source</legend>

                <p>
                    Where is the source of truth of the data stored and later read back in the IO500 benchmark? This question relates to whether the submitted system is a burst buffer layered on primary storage or primary storage itself.
                </p>

                <?php
                echo $this->Form->control('data_source', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Trust</legend>

                <p>
                    Please describe any steps taken to ensure that the results are trustworthy.
                </p>

                <ul>
                    <li>Did you run the benchmark multiple times and get similar scores?</li>
                    <li>Did you validate the score is below the physical capabilities of the deployed hardware?</li>
                    <li>Did you validate that the data was persistently stored?</li>
                </ul>

                <?php
                echo $this->Form->control('trust', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Reproducibility</legend>

                <p>
                    Given the 4 possible reproducibility scores listed in the <?php echo $this->Html->link('reproducibility description', 'https://io500.org/the-lists#reproducibility-scores', ['class' => 'link', 'target' => '_blank']); ?>, what score do you believe your submission will be assigned? Please double check the definitions of each reproducibility level and ensure you have provided enough information to meet your expected score.
                </p>

                <?php
                echo $this->Form->control('reproducibility_score_id', [
                    'label' => false,
                    'required' => true,
                    'options' => $scores,
                ]);
                ?>
            </fieldset>

            <fieldset>
                <legend>Feedback</legend>

                <p>
                    Please provide feedback on this questionnaire. For example:
                </p>

                <ul>
                    <li>What additional questions would you like to see?</li>
                    <li>Were there reasons why you couldn’t complete certain questions?</li>
                    <li>Would you like to change certain questions?</li>
                </ul>

                <?php
                echo $this->Form->control('feedback', [
                    'label' => false,
                    'required' => true,
                    'class' => 'tinymce'
                ]);
                ?>
            </fieldset>
        </div>

        <div class="form-buttons">
            <?php
            echo $this->Form->button(
                __('Submit'),
                [
                    'id' => 'submit-site'
                ]
            );
            ?>
        </div>
    </div>
</div>

<?php echo $this->Form->end(); ?>

<script src="https://cdn.tiny.cloud/1/1q5sjjedyv15tfpn9b7cvojp4i72ahfneyqj7yrfu771hcu1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<script type="text/javascript">
    var t_editors;

    editors = tinymce.init({
        skin: 'outside',
        icons: 'small',
        statusbar: false,
        menubar: false,
        selector: 'textarea',
        height: 300,
        setup: function (editor) {
            editor.on('change', function (e) {
                editor.save();
            });
        },
        plugins: 'image link lists searchreplace table wordcount',
        toolbar: 'undo redo | bold italic underline strikethrough | link image table | numlist bullist indent outdent | removeformat',
        content_css: ['/io-500-hub/css/editor.css']
    }).then(function(editors) {
        t_editors = editors;
    });

    function wordCount(str) {
        return str.trim().split(/\s+/).length;
    }

    function validate() {
        var valid = true;
        var first = false;

        t_editors.forEach(function(editor) {
            var words = editor.contentDocument.body.innerHTML;

            if (wordCount(words) < 10) {
                document.getElementById(editor.id).closest('fieldset').style.border = '#d63b1e solid 1px';
                document.getElementById(editor.id).closest('fieldset').style.color = '#d63b1e';

                if (!first) {
                    editor.focus();

                    document.getElementById(editor.id).closest('fieldset').scrollIntoView({
                        behavior: 'smooth'
                    });

                    alert('All fields are mandatory and require a minimum of 10 words. Please, provide a complete response for all fields in red.')

                    first = true;
                }

                valid = false;
            } else {
                document.getElementById(editor.id).closest('fieldset').style.border = '#bbb solid 1px'; 
                document.getElementById(editor.id).closest('fieldset').style.color = '#454545';               
            }
        });

        return valid;
    }

    document.getElementById('submit-site').addEventListener('click', function(e) {
        var isValid = validate();

        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
