<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulation Result</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/@phosphor-icons/web"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1 class="title">Simulation Result</h1>
    <p class="subtitle">08 July 2025 &ndash; Simulation Test</p>

    <div class="result-section">
      <div class="score-box">
        <h3>Result</h3>
        <div class="score-circle">481</div>
        <p class="score-text">Great! You have excellent listening and reading skills.</p>
      </div>

      <div class="summary-box">
        <h3>Summary</h3>
        <div class="summary-item">
          <i class="ph ph-book-open"></i>
          <span>Reading</span>
          <div class="bar">
            <div class="fill blue" style="width: 80%"></div>
          </div>
          <span class="score">38/50</span>
        </div>
        <div class="summary-item">
          <i class="ph ph-pencil-simple"></i>
          <span>Structure</span>
          <div class="bar">
            <div class="fill yellow" style="width: 73%"></div>
          </div>
          <span class="score">27/50</span>
        </div>
        <div class="summary-item">
          <i class="ph ph-headphones"></i>
          <span>Listening</span>
          <div class="bar">
            <div class="fill blue" style="width: 85%"></div>
          </div>
          <span class="score">40/50</span>
        </div>
        <div class="level-indicator">
          <span class="label">Level: Intermediate</span>
          <div class="level-bar">
            <div class="level-segment beginner">0–400</div>
            <div class="level-segment intermediate active">401–500</div>
            <div class="level-segment advance">501–600</div>
          </div>
          <div class="level-labels">
            <span>0-400</span>
            <span>401-500</span>
            <span>501-600</span>
          </div>
        </div>
      </div>

      <div class="tips-box">
        <div class="tip">
          <i class="ph ph-book-open"></i>
          <div>
            <h4>Reading</h4>
            <ul>
              <li>Focus on identifying main ideas and supporting details.</li>
              <li>Practice with academic articles 10 mins/day.</li>
            </ul>
          </div>
        </div>
        <div class="tip">
          <i class="ph ph-pencil-simple"></i>
          <div>
            <h4>Structure</h4>
            <ul>
              <li>Review grammar rules: tenses, agreement, and word order. </li>
              <li>Do 10 structure questions per day.</li>
            </ul>
          </div>
        </div>
        <div class="tip">
          <i class="ph ph-headphones"></i>
          <div>
            <h4>Listening</h4>
            <ul>
              <li>Practice active listening with TED-Ed or BBC Learning.</li>
              <li>Summarize what you hear in 1-2 sentences.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="actions">
      <button class="btn retake"><i class="ph ph-arrow-counter-clockwise"></i>Retake Test</button>
      <button class="btn review"><i class="ph ph-list"></i>Review Answers</button>
      <button class="btn download"><i class="ph ph-download-simple"></i>Download PDF</button>
    </div>
  </div>
</body>
</html>
