<?php
//edit this to function as you like, i added a game code for the filling
// to make it more fun, you can remove it if you want
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Rock Paper Scissors</title>
  <link rel="stylesheet" href="style.php">
  <style>
  .game-container {
    max-width: 600px;
    margin: 40px auto;
    padding: 20px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 16px;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
    text-align: center;
    color: #fff;
  }
  .game-container h2 {
    font-size: 2rem;
    margin-bottom: 20px;
  }
  .choices {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
  }
  .choices button {
    background: rgba(255,255,255,0.3);
    border: 2px solid rgba(255,255,255,0.6);
    border-radius: 12px;
    padding: 10px;
    transition: transform 0.2s, box-shadow 0.2s;
    cursor: pointer;
  }
  .choices button:hover {
    transform: scale(1.1);
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
  }
  .choices img {
    width: 60px;
    height: 60px;
  }
  .choices span {
    display: block;
    margin-top: 8px;
    font-weight: bold;
    color: var(--color);
  }
  .result-display {
    display: flex;
    justify-content: space-around;
    margin: 20px 0;
  }
  .user-choice, .computer-choice {
    width: 45%;
    background: rgba(0,0,0,0.2);
    padding: 10px;
    border-radius: 10px;
    min-height: 120px;
    color: var(--color);
  }
  .game-result {
    font-size: 1.4rem;
    margin-top: 20px;
    font-weight: bold;
    color: var(--primary-color);
  }
  .reset-btn {
    margin-top: 20px;
    padding: 10px 20px;
    border: none;
    background-color: var(--primary-color);
    color: var(--color);
    font-size: 1rem;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  .reset-btn:hover {
    background-color: rgba(0,0,0,0.3);
  }
  </style>
</head>
<body>
  <section class="container">
    <div class="login-container">
      <div class="circle circle-one"></div>
      <div class="form-container">
        <h1>Welcome, <?= htmlspecialchars($_SESSION['username']) ?></h1>

        <div class="game-container">
          <h2>Rock Paper Scissors</h2>
          <div class="rps-game">
            <div class="choices">
              <button onclick="playGame('rock')">
                <img src="https://cdn-icons-png.flaticon.com/512/1162/1162499.png" alt="Rock" title="Rock">
                <span>Rock</span>
              </button>
              <button onclick="playGame('paper')">
                <img src="https://cdn-icons-png.flaticon.com/512/1162/1162513.png" alt="Paper" title="Paper">
                <span>Paper</span>
              </button>
              <button onclick="playGame('scissors')">
                <img src="https://cdn-icons-png.flaticon.com/512/1162/1162518.png" alt="Scissors" title="Scissors">
                <span>Scissors</span>
              </button>
            </div>
            <div class="result-display">
              <div class="user-choice">
                <h4>You Picked</h4>
                <div id="user-choice"></div>
              </div>
              <div class="computer-choice">
                <h4>Computer Picked</h4>
                <div id="computer-choice"></div>
              </div>
            </div>
            <div class="game-result" id="game-result"></div>
            <button class="reset-btn" onclick="resetGame()">Play Again</button>
          </div>
        </div>

        <form action="logout.php" method="post">
          <button type="submit" class="reset-btn">Logout</button>
        </form>
      </div>
      <div class="circle circle-two"></div>
      <div class="theme-btn-container"></div>
    </div>
  </section>

  <script src="script.php"></script>
  <script>
    function playGame(userChoice) {
      const choices = ['rock', 'paper', 'scissors'];
      const compChoice = choices[Math.floor(Math.random() * 3)];

      document.getElementById("user-choice").innerHTML =
        `<img src="https://cdn-icons-png.flaticon.com/512/1162/1162499.png" alt="${userChoice}" style="width:50px"> <br> <span>${userChoice}</span>`;
      document.getElementById("computer-choice").innerHTML =
        `<img src="https://cdn-icons-png.flaticon.com/512/1162/1162513.png" alt="${compChoice}" style="width:50px"> <br> <span>${compChoice}</span>`;

      const result = getWinner(userChoice, compChoice);
      document.getElementById("game-result").textContent = result;
    }

    function getWinner(user, comp) {
      if (user === comp) return "It's a draw!";
      if (
        (user === 'rock' && comp === 'scissors') ||
        (user === 'paper' && comp === 'rock') ||
        (user === 'scissors' && comp === 'paper')
      ) {
        return "You Win! 🎉";
      } else {
        return "You Lose! 😢";
      }
    }

    function resetGame() {
      document.getElementById("user-choice").innerHTML = "";
      document.getElementById("computer-choice").innerHTML = "";
      document.getElementById("game-result").textContent = "";
    }
  </script>
</body>
</html>
