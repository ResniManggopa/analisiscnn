<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Word Cloud</h6>
      </div>
      <div class="card-body">
        <canvas id="wordCloudCanvas" height="600" width="1200"></canvas>
      </div>
    </div>
  </div>

  <script src="<?php echo base_url('assets/wordcloud/src/wordcloud2.js'); ?>"></script>
    <script>
        window.onload = () => {
            var vocab = <?php echo json_encode($vocab); ?>;
            var wordFrequencies = <?php echo json_encode($wordFrequencies); ?>;

            var words = vocab.map((word, index) => {
                return { text: word, size: wordFrequencies[word] };
            });

            WordCloud(document.getElementById('wordCloudCanvas'), {
                list: words.map((d) => [d.text, d.size]),
                drawOutOfBound: false,
                shrinkToFit: true,
            });
        };
    </script>


