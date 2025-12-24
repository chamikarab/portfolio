<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>Under Maintenance • Chamikara Bandara</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Typography & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
            color: #e2e8f0;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated background */
        .maintenance-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .grid-pattern {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(99, 102, 241, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }

        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }

        .floating-particles {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(99, 102, 241, 0.6);
            border-radius: 50%;
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100vh) translateX(50px); opacity: 0; }
        }

        .maintenance-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
            text-align: center;
        }

        .maintenance-icon {
            font-size: 5rem;
            color: #6366f1;
            margin-bottom: 2rem;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .maintenance-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .name {
            font-size: 2rem;
            font-weight: 700;
            color: #a78bfa;
            margin-bottom: 1.5rem;
        }

        .maintenance-info {
            max-width: 600px;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 1.5rem;
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .maintenance-info p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.4);
            border-radius: 50%;
            color: #a78bfa;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(99, 102, 241, 0.4);
            border-color: #6366f1;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3);
        }

        /* Mini Game Styles */
        .game-section {
            margin-top: 3rem;
            max-width: 800px;
            width: 100%;
        }

        .game-card {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 1.5rem;
            padding: 2rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .game-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #a78bfa;
            margin-bottom: 1.5rem;
        }

        .game-stats {
            display: flex;
            justify-content: space-around;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .stat {
            text-align: center;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #94a3b8;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #6366f1;
        }

        .game-area {
            position: relative;
            width: 100%;
            height: 400px;
            background: rgba(30, 41, 59, 0.5);
            border: 2px solid rgba(99, 102, 241, 0.3);
            border-radius: 1rem;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .target {
            position: absolute;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #ec4899, #8b5cf6);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 1.5rem;
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.5);
            transition: transform 0.1s;
            animation: targetPulse 1s ease-in-out infinite;
        }

        .target:hover {
            transform: scale(1.1);
        }

        @keyframes targetPulse {
            0%, 100% { box-shadow: 0 4px 15px rgba(236, 72, 153, 0.5); }
            50% { box-shadow: 0 4px 25px rgba(236, 72, 153, 0.8); }
        }

        .game-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .game-btn {
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-start {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
        }

        .btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        .btn-reset {
            background: rgba(99, 102, 241, 0.2);
            color: #a78bfa;
            border: 1px solid rgba(99, 102, 241, 0.4);
        }

        .btn-reset:hover {
            background: rgba(99, 102, 241, 0.3);
        }

        .game-instructions {
            margin-top: 1.5rem;
            padding: 1rem;
            background: rgba(99, 102, 241, 0.1);
            border-radius: 0.75rem;
            font-size: 0.875rem;
            color: #cbd5e1;
            line-height: 1.6;
        }

        @media (max-width: 640px) {
            .maintenance-title {
                font-size: 2rem;
            }

            .name {
                font-size: 1.5rem;
            }

            .game-area {
                height: 300px;
            }

            .target {
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="maintenance-bg">
        <div class="grid-pattern"></div>
        <div class="floating-particles" id="particles"></div>
    </div>

    <div class="maintenance-container">
        <div class="maintenance-icon">
            <i class="fas fa-tools"></i>
        </div>

        <h1 class="maintenance-title">Under Maintenance</h1>
        <div class="name">Chamikara Bandara</div>

        <div class="maintenance-info">
            <p>I'm currently working on improving my portfolio to give you a better experience.</p>
            <p>I'll be back soon with exciting updates!</p>
            <p>Thank you for your patience.</p>
        </div>

        <div class="social-links">
            <a href="#" class="social-link" title="LinkedIn">
                <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#" class="social-link" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="#" class="social-link" title="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-link" title="Email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>

        <!-- Mini Game Section -->
        <div class="game-section">
            <div class="game-card">
                <h2 class="game-title">While You Wait - Mini Game</h2>
                
                <div class="game-stats">
                    <div class="stat">
                        <div class="stat-label">Score</div>
                        <div class="stat-value" id="score">0</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Time</div>
                        <div class="stat-value" id="time">30</div>
                    </div>
                    <div class="stat">
                        <div class="stat-label">Missed</div>
                        <div class="stat-value" id="missed">0</div>
                    </div>
                </div>

                <div class="game-area" id="gameArea"></div>

                <div class="game-buttons">
                    <button class="game-btn btn-start" id="startBtn">Start Game</button>
                    <button class="game-btn btn-reset" id="resetBtn">Reset</button>
                </div>

                <div class="game-instructions">
                    <strong>How to play:</strong> Click on the targets as they appear! You have 30 seconds to score as many points as possible. Each target gives you 10 points. If a target disappears before you click it, it counts as a miss.
                </div>
            </div>
        </div>
    </div>

    <script>
        // Floating particles
        const particlesContainer = document.getElementById('particles');
        const particleCount = 30;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 15 + 's';
            particle.style.animationDuration = (10 + Math.random() * 10) + 's';
            particlesContainer.appendChild(particle);
        }

        // Mini Game Logic
        let gameState = {
            score: 0,
            time: 30,
            missed: 0,
            isPlaying: false,
            timer: null,
            targetInterval: null
        };

        const gameArea = document.getElementById('gameArea');
        const scoreEl = document.getElementById('score');
        const timeEl = document.getElementById('time');
        const missedEl = document.getElementById('missed');
        const startBtn = document.getElementById('startBtn');
        const resetBtn = document.getElementById('resetBtn');

        function createTarget() {
            if (!gameState.isPlaying) return;

            const target = document.createElement('div');
            target.className = 'target';
            target.innerHTML = '🎯';
            
            const maxX = gameArea.offsetWidth - 60;
            const maxY = gameArea.offsetHeight - 60;
            const x = Math.random() * maxX;
            const y = Math.random() * maxY;
            
            target.style.left = x + 'px';
            target.style.top = y + 'px';
            
            target.addEventListener('click', function() {
                gameState.score += 10;
                scoreEl.textContent = gameState.score;
                target.remove();
            });

            gameArea.appendChild(target);

            // Remove target after 2 seconds if not clicked
            setTimeout(() => {
                if (target.parentNode) {
                    gameState.missed++;
                    missedEl.textContent = gameState.missed;
                    target.remove();
                }
            }, 2000);
        }

        function startGame() {
            if (gameState.isPlaying) return;

            gameState.isPlaying = true;
            gameState.score = 0;
            gameState.time = 30;
            gameState.missed = 0;

            scoreEl.textContent = gameState.score;
            timeEl.textContent = gameState.time;
            missedEl.textContent = gameState.missed;

            gameArea.innerHTML = '';
            startBtn.disabled = true;
            startBtn.style.opacity = '0.5';
            startBtn.style.cursor = 'not-allowed';

            // Create targets every 1.5 seconds
            gameState.targetInterval = setInterval(createTarget, 1500);

            // Countdown timer
            gameState.timer = setInterval(() => {
                gameState.time--;
                timeEl.textContent = gameState.time;

                if (gameState.time <= 0) {
                    endGame();
                }
            }, 1000);
        }

        function endGame() {
            gameState.isPlaying = false;
            clearInterval(gameState.timer);
            clearInterval(gameState.targetInterval);
            gameArea.innerHTML = '';

            startBtn.disabled = false;
            startBtn.style.opacity = '1';
            startBtn.style.cursor = 'pointer';

            alert(`Game Over!\n\nFinal Score: ${gameState.score}\nMissed: ${gameState.missed}`);
        }

        function resetGame() {
            endGame();
            gameState.score = 0;
            gameState.time = 30;
            gameState.missed = 0;

            scoreEl.textContent = gameState.score;
            timeEl.textContent = gameState.time;
            missedEl.textContent = gameState.missed;
        }

        startBtn.addEventListener('click', startGame);
        resetBtn.addEventListener('click', resetGame);
    </script>
</body>
</html>
