<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Vocabulary</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('success') ?>
            <br>
                <a href="<?= site_url('user/download_vocab')?>" class="btn btn-light btn-icon-split">
                    <span class="icon text-gray-600">
                        <i class="fas fa-download"></i>
                    </span>
                    <span class="text">Download</span>
                </a> 
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <?php if (!empty($vocab) && !empty($wordFrequencies)): ?>
                        <p><h3>Total Vocabulary: <?php echo count($vocab) ?></h3></p>
                        <h5>Vocabulary and Word Frequencies:</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered"  id="dataTable"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Word</th>
                                        <th>Frequency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($wordFrequencies as $word => $frequency): ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $word ?></td>
                                            <td><?php echo isset($wordFrequencies[$word]) ? $wordFrequencies[$word] : 0 ?></td>
                                        </tr>
                                    <?php $i++; endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
