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
            min-height: 100vh;
            overflow-x: hidden;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            padding: 2rem 1rem;
            position: relative;
            min-height: 100vh;
        }

        /* Animated background */
        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            overflow: hidden;
        }

        .bg-animation::before {
            content: '';
            position: absolute;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(79, 70, 229, 0.25) 0%, transparent 70%);
            border-radius: 50%;
            top: -300px;
            left: -300px;
            animation: float 25s ease-in-out infinite;
        }

        .bg-animation::after {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(168, 85, 247, 0.2) 0%, transparent 70%);
            border-radius: 50%;
            bottom: -250px;
            right: -250px;
            animation: float 20s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            33% {
                transform: translate(40px, -40px) scale(1.1);
            }
            66% {
                transform: translate(-30px, 30px) scale(0.9);
            }
        }

        /* Grid pattern overlay */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(148, 163, 184, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(148, 163, 184, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            z-index: 1;
            pointer-events: none;
        }

        /* Main content */
        .maintenance-container {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
            padding-bottom: 2rem;
        }

        /* Icon animation */
        .maintenance-icon {
            font-size: 100px;
            color: #4f46e5;
            margin-bottom: 1.5rem;
            animation: pulse 2s ease-in-out infinite;
            filter: drop-shadow(0 0 40px rgba(79, 70, 229, 0.6));
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4f46e5 0%, #a855f7 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.75rem;
            letter-spacing: -0.02em;
        }

        .name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 1rem;
        }

        .subtitle {
            font-size: 1.1rem;
            color: #94a3b8;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        @media (max-width: 640px) {
            h1 {
                font-size: 1.75rem;
            }
            .name {
                font-size: 1.25rem;
            }
            .maintenance-icon {
                font-size: 70px;
                margin-bottom: 1rem;
            }
            .subtitle {
                font-size: 1rem;
                margin-bottom: 1.5rem;
            }
        }

        /* Card */
        .info-card {
            background: rgba(15, 23, 42, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 1.25rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .info-card p {
            color: #cbd5e1;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 0.75rem;
        }

        .info-card p:last-child {
            margin-bottom: 0;
        }

        /* Status indicator */
        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 9999px;
            color: #10b981;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 1.5rem;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            animation: blink 2s ease-in-out infinite;
        }

        @keyframes blink {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.3;
            }
        }

        /* Social links */
        .social-links {
            display: flex;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 1.5rem;
            margin-bottom: 3rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 45px;
            height: 45px;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            color: #cbd5e1;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: rgba(79, 70, 229, 0.2);
            border-color: rgba(79, 70, 229, 0.5);
            color: #818cf8;
            transform: translateY(-2px);
        }

        /* Mini Game Styles */
        .game-section {
            background: rgba(15, 23, 42, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 1.5rem;
            padding: 2rem;
            margin-top: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .game-title {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #4f46e5 0%, #a855f7 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1rem;
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

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #4f46e5;
            display: block;
        }

        .stat-label {
            font-size: 0.75rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        .game-area {
            position: relative;
            width: 100%;
            height: 400px;
            background: rgba(0, 0, 0, 0.3);
            border-radius: 1rem;
            border: 2px solid rgba(79, 70, 229, 0.3);
            overflow: hidden;
            margin-bottom: 1.5rem;
            cursor: crosshair;
        }

        .target {
            position: absolute;
            width: 60px;
            height: 60px;
            background: radial-gradient(circle, #4f46e5 0%, #6366f1 50%, #818cf8 100%);
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: transform 0.1s;
            box-shadow: 0 0 20px rgba(79, 70, 229, 0.6);
            animation: targetPulse 1.5s ease-in-out infinite;
        }

        .target:hover {
            transform: scale(1.1);
        }

        .target.clicked {
            animation: explode 0.3s ease-out forwards;
        }

        @keyframes targetPulse {
            0%, 100% {
                box-shadow: 0 0 20px rgba(79, 70, 229, 0.6);
            }
            50% {
                box-shadow: 0 0 30px rgba(79, 70, 229, 0.9);
            }
        }

        @keyframes explode {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .game-controls {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .game-btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.75rem;
            border: none;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-start {
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
        }

        .btn-start:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.6);
        }

        .btn-reset {
            background: rgba(148, 163, 184, 0.2);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .btn-reset:hover {
            background: rgba(148, 163, 184, 0.3);
        }

        .game-instructions {
            margin-top: 1rem;
            padding: 1rem;
            background: rgba(79, 70, 229, 0.1);
            border-radius: 0.75rem;
            border: 1px solid rgba(79, 70, 229, 0.2);
        }

        .game-instructions p {
            color: #cbd5e1;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .game-instructions p:last-child {
            margin-bottom: 0;
        }

        /* Floating particles */
        .particle {
            position: fixed;
            width: 3px;
            height: 3px;
            background: rgba(79, 70, 229, 0.4);
            border-radius: 50%;
            pointer-events: none;
            animation: float-particle 20s linear infinite;
        }

        @keyframes float-particle {
            0% {
                transform: translateY(100vh) translateX(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(100px);
                opacity: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Animated background -->
    <div class="bg-animation"></div>
    <div class="grid-overlay"></div>

    <!-- Floating particles -->
    <div id="particles"></div>

    <!-- Main content -->
    <div class="maintenance-container">
        <div class="maintenance-icon">
            <i class="fa-solid fa-screwdriver-wrench"></i>
        </div>

        <h1>I'm Making Things Better</h1>
        
        <p class="name">Chamikara Bandara</p>
        
        <p class="subtitle">
            My site is currently under maintenance.<br>
            I'll be back soon with exciting updates!
        </p>

        <div class="status-indicator">
            <span class="status-dot"></span>
            <span>Maintenance in progress</span>
        </div>

        <div class="info-card">
            <p>
                <i class="fa-solid fa-info-circle" style="color: #60a5fa; margin-right: 0.5rem;"></i>
                I'm working hard to improve your experience. Please check back shortly.
            </p>
            <p style="font-size: 0.875rem; color: #94a3b8; margin-top: 0.75rem;">
                <i class="fa-solid fa-clock" style="margin-right: 0.5rem;"></i>
                Estimated time: I'll be back as soon as possible
            </p>
        </div>

        <div class="social-links">
            <a href="https://github.com" class="social-link" target="_blank" rel="noopener" title="GitHub">
                <i class="fa-brands fa-github"></i>
            </a>
            <a href="https://linkedin.com" class="social-link" target="_blank" rel="noopener" title="LinkedIn">
                <i class="fa-brands fa-linkedin"></i>
            </a>
            <a href="https://twitter.com" class="social-link" target="_blank" rel="noopener" title="Twitter">
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a href="mailto:contact@example.com" class="social-link" title="Email">
                <i class="fa-solid fa-envelope"></i>
            </a>
        </div>

        <!-- Mini Game Section -->
        <div class="game-section">
            <h2 class="game-title">
                <i class="fa-solid fa-gamepad" style="margin-right: 0.5rem;"></i>
                While You Wait - Mini Game
            </h2>
            
            <div class="game-stats">
                <div class="stat-item">
                    <span class="stat-value" id="score">0</span>
                    <span class="stat-label">Score</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value" id="time">30</span>
                    <span class="stat-label">Time</span>
                </div>
                <div class="stat-item">
                    <span class="stat-value" id="missed">0</span>
                    <span class="stat-label">Missed</span>
                </div>
            </div>

            <div class="game-area" id="gameArea">
                <p style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #64748b; font-size: 1rem;">
                    Click "Start Game" to begin!
                </p>
            </div>

            <div class="game-controls">
                <button class="game-btn btn-start" id="startBtn">
                    <i class="fa-solid fa-play"></i>
                    <span>Start Game</span>
                </button>
                <button class="game-btn btn-reset" id="resetBtn" style="display: none;">
                    <i class="fa-solid fa-rotate"></i>
                    <span>Reset</span>
                </button>
            </div>

            <div class="game-instructions">
                <p><i class="fa-solid fa-bullseye" style="color: #4f46e5; margin-right: 0.5rem;"></i>
                    <strong>How to play:</strong> Click on the glowing targets as fast as you can! Each target gives you 10 points. You have 30 seconds to score as high as possible.
                </p>
            </div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 15;

            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 20 + 's';
                particle.style.animationDuration = (15 + Math.random() * 10) + 's';
                particlesContainer.appendChild(particle);
            }
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
            
            const maxX = gameArea.offsetWidth - 60;
            const maxY = gameArea.offsetHeight - 60;
            
            target.style.left = Math.random() * maxX + 'px';
            target.style.top = Math.random() * maxY + 'px';

            target.addEventListener('click', () => {
                target.classList.add('clicked');
                gameState.score += 10;
                scoreEl.textContent = gameState.score;
                
                setTimeout(() => {
                    target.remove();
                }, 300);
            });

            // Target disappears after 2 seconds if not clicked
            setTimeout(() => {
                if (target.parentNode) {
                    target.remove();
                    gameState.missed++;
                    missedEl.textContent = gameState.missed;
                }
            }, 2000);

            gameArea.appendChild(target);
        }

        function startGame() {
            gameState.isPlaying = true;
            gameState.score = 0;
            gameState.time = 30;
            gameState.missed = 0;
            
            scoreEl.textContent = gameState.score;
            timeEl.textContent = gameState.time;
            missedEl.textContent = gameState.missed;
            
            gameArea.innerHTML = '';
            startBtn.style.display = 'none';
            resetBtn.style.display = 'inline-flex';

            // Create targets every 1-2 seconds
            gameState.targetInterval = setInterval(() => {
                if (gameState.isPlaying) {
                    createTarget();
                }
            }, 1500);

            // Countdown timer
            gameState.timer = setInterval(() => {
                gameState.time--;
                timeEl.textContent = gameState.time;

                if (gameState.time <= 0) {
                    endGame();
                }
            }, 1000);

            // Create first target immediately
            createTarget();
        }

        function endGame() {
            gameState.isPlaying = false;
            clearInterval(gameState.timer);
            clearInterval(gameState.targetInterval);
            
            gameArea.innerHTML = `
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #cbd5e1;">
                    <h3 style="font-size: 2rem; margin-bottom: 1rem; color: #4f46e5;">Game Over!</h3>
                    <p style="font-size: 1.25rem; margin-bottom: 0.5rem;">Final Score: <strong style="color: #10b981;">${gameState.score}</strong></p>
                    <p style="font-size: 0.875rem; color: #94a3b8;">Targets Hit: ${gameState.score / 10} | Missed: ${gameState.missed}</p>
                </div>
            `;
        }

        function resetGame() {
            gameState.isPlaying = false;
            clearInterval(gameState.timer);
            clearInterval(gameState.targetInterval);
            
            gameArea.innerHTML = '<p style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: #64748b; font-size: 1rem;">Click "Start Game" to begin!</p>';
            
            scoreEl.textContent = '0';
            timeEl.textContent = '30';
            missedEl.textContent = '0';
            
            startBtn.style.display = 'inline-flex';
            resetBtn.style.display = 'none';
        }

        startBtn.addEventListener('click', startGame);
        resetBtn.addEventListener('click', resetGame);

        // Initialize on load
        document.addEventListener('DOMContentLoaded', createParticles);
    </script>
</body>
</html>
