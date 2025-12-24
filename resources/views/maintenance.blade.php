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
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            color: #e2e8f0;
            overflow-x: hidden;
            position: relative;
        }

        /* Animated background */
        .bg-animated {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(79, 70, 229, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(168, 85, 247, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(236, 72, 153, 0.1) 0%, transparent 50%);
            animation: pulse 8s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        /* Grid pattern */
        .grid-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-image: 
                linear-gradient(rgba(148, 163, 184, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 163, 184, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            pointer-events: none;
        }

        /* Floating particles */
        .particle {
            position: fixed;
            border-radius: 50%;
            background: rgba(79, 70, 229, 0.3);
            pointer-events: none;
            z-index: 2;
            animation: float 15s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
                opacity: 0.3;
            }
            50% {
                transform: translate(100px, -100px) scale(1.2);
                opacity: 0.6;
            }
        }

        .maintenance-container {
            position: relative;
            z-index: 10;
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
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .maintenance-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .name {
            font-size: 2rem;
            font-weight: 700;
            color: #818cf8;
            margin-bottom: 1.5rem;
        }

        .maintenance-message {
            max-width: 600px;
            margin: 0 auto 3rem;
            font-size: 1.125rem;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .info-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 3rem;
            max-width: 500px;
        }

        .info-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: #e2e8f0;
        }

        .info-card p {
            color: #94a3b8;
            line-height: 1.6;
        }

        /* Mini Game Section */
        .game-section {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 1rem;
            padding: 2rem;
            margin-top: 2rem;
            max-width: 600px;
            width: 100%;
        }

        .game-section h3 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #e2e8f0;
        }

        .game-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: #6366f1;
        }

        #gameArea {
            width: 100%;
            height: 300px;
            background: rgba(15, 23, 42, 0.5);
            border: 2px dashed rgba(99, 102, 241, 0.3);
            border-radius: 0.5rem;
            position: relative;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .target {
            position: absolute;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
            transition: transform 0.1s;
        }

        .target:hover {
            transform: scale(1.1);
        }

        .target.clicked {
            animation: explode 0.3s ease-out;
        }

        @keyframes explode {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(2); opacity: 0; }
        }

        .game-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .game-btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 1rem;
        }

        .game-btn-start {
            background: linear-gradient(135deg, #6366f1, #a855f7);
            color: white;
        }

        .game-btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .game-btn-reset {
            background: rgba(148, 163, 184, 0.2);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .game-btn-reset:hover {
            background: rgba(148, 163, 184, 0.3);
        }

        .game-instructions {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(148, 163, 184, 0.2);
            font-size: 0.875rem;
            color: #94a3b8;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .social-link {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #818cf8;
            font-size: 1.25rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(99, 102, 241, 0.4);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        @media (max-width: 640px) {
            .maintenance-title {
                font-size: 2rem;
            }

            .name {
                font-size: 1.5rem;
            }

            .maintenance-message {
                font-size: 1rem;
            }

            .game-stats {
                flex-direction: column;
                gap: 1rem;
            }

            #gameArea {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animated"></div>
    <div class="grid-pattern"></div>

    <!-- Floating particles -->
    <div class="particle" style="left: 10%; top: 20%; width: 4px; height: 4px; animation-delay: 0s;"></div>
    <div class="particle" style="left: 80%; top: 60%; width: 6px; height: 6px; animation-delay: 2s;"></div>
    <div class="particle" style="left: 50%; top: 80%; width: 3px; height: 3px; animation-delay: 4s;"></div>
    <div class="particle" style="left: 30%; top: 40%; width: 5px; height: 5px; animation-delay: 6s;"></div>
    <div class="particle" style="left: 70%; top: 10%; width: 4px; height: 4px; animation-delay: 8s;"></div>

    <div class="maintenance-container">
        <div class="maintenance-icon">
            <i class="fas fa-tools"></i>
        </div>

        <h1 class="maintenance-title">Under Maintenance</h1>
        <p class="name">Chamikara Bandara</p>

        <div class="maintenance-message">
            <p>I'm currently working on improving my portfolio to give you the best experience possible. I'll be back soon!</p>
        </div>

        <div class="info-card">
            <h3>What's happening?</h3>
            <p>I'm making some updates and improvements to my portfolio. This won't take long, and I'll be back with an even better experience for you.</p>
        </div>

        <!-- Mini Game Section -->
        <div class="game-section">
            <h3>While You Wait - Mini Game</h3>
            
            <div class="game-stats">
                <div class="stat-item">
                    <div class="stat-label">Score</div>
                    <div class="stat-value" id="score">0</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Time</div>
                    <div class="stat-value" id="time">30</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Missed</div>
                    <div class="stat-value" id="missed">0</div>
                </div>
            </div>

            <div id="gameArea"></div>

            <div class="game-buttons">
                <button id="startBtn" class="game-btn game-btn-start">Start Game</button>
                <button id="resetBtn" class="game-btn game-btn-reset">Reset</button>
            </div>

            <div class="game-instructions">
                <p><strong>How to play:</strong> Click on the targets as they appear! You have 30 seconds to score as many points as possible. Each target gives you 10 points. Good luck!</p>
            </div>
        </div>

        <div class="social-links">
            <a href="https://github.com/chamikarab" target="_blank" class="social-link" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
            <a href="https://linkedin.com/in/chamikarab" target="_blank" class="social-link" title="LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="mailto:chami@test.com" class="social-link" title="Email">
                <i class="fas fa-envelope"></i>
            </a>
        </div>
    </div>

    <script>
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
            
            const areaWidth = gameArea.offsetWidth - 50;
            const areaHeight = gameArea.offsetHeight - 50;
            
            target.style.left = Math.random() * areaWidth + 'px';
            target.style.top = Math.random() * areaHeight + 'px';
            
            target.addEventListener('click', function() {
                if (!gameState.isPlaying) return;
                target.classList.add('clicked');
                gameState.score += 10;
                scoreEl.textContent = gameState.score;
                setTimeout(() => target.remove(), 300);
            });

            gameArea.appendChild(target);

            setTimeout(() => {
                if (target.parentNode) {
                    target.remove();
                    if (gameState.isPlaying) {
                        gameState.missed++;
                        missedEl.textContent = gameState.missed;
                    }
                }
            }, 2000);
        }

        function startGame() {
            if (gameState.isPlaying) return;
            
            gameState.isPlaying = true;
            gameState.time = 30;
            gameState.score = 0;
            gameState.missed = 0;
            
            scoreEl.textContent = gameState.score;
            timeEl.textContent = gameState.time;
            missedEl.textContent = gameState.missed;
            
            gameArea.innerHTML = '';
            startBtn.disabled = true;
            startBtn.textContent = 'Playing...';
            
            gameState.timer = setInterval(() => {
                gameState.time--;
                timeEl.textContent = gameState.time;
                
                if (gameState.time <= 0) {
                    endGame();
                }
            }, 1000);
            
            gameState.targetInterval = setInterval(createTarget, 1000);
            createTarget();
        }

        function endGame() {
            gameState.isPlaying = false;
            clearInterval(gameState.timer);
            clearInterval(gameState.targetInterval);
            gameArea.innerHTML = '';
            startBtn.disabled = false;
            startBtn.textContent = 'Start Game';
            
            alert(`Game Over!\n\nScore: ${gameState.score}\nMissed: ${gameState.missed}`);
        }

        function resetGame() {
            if (gameState.isPlaying) {
                clearInterval(gameState.timer);
                clearInterval(gameState.targetInterval);
            }
            
            gameState.isPlaying = false;
            gameState.score = 0;
            gameState.time = 30;
            gameState.missed = 0;
            
            scoreEl.textContent = gameState.score;
            timeEl.textContent = gameState.time;
            missedEl.textContent = gameState.missed;
            
            gameArea.innerHTML = '';
            startBtn.disabled = false;
            startBtn.textContent = 'Start Game';
        }

        startBtn.addEventListener('click', startGame);
        resetBtn.addEventListener('click', resetGame);
    </script>
</body>
</html>
