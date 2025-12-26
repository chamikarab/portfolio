<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#020617">
    <title>Coming Soon • Chamikara Bandara</title>

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
            overflow-x: hidden;
        }

        body {
            background: #0a0e27;
            color: #e2e8f0;
            position: relative;
        }

        /* Developer-themed animated background */
        .code-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            background: 
                linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(168, 85, 247, 0.1) 50%, rgba(236, 72, 153, 0.1) 100%),
                radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(168, 85, 247, 0.15) 0%, transparent 50%);
            overflow: hidden;
        }

        /* Code lines animation */
        .code-lines {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0.1;
            background-image: 
                repeating-linear-gradient(
                    0deg,
                    transparent,
                    transparent 2px,
                    rgba(99, 102, 241, 0.3) 2px,
                    rgba(99, 102, 241, 0.3) 4px
                );
            animation: codeScroll 20s linear infinite;
        }

        @keyframes codeScroll {
            0% { transform: translateY(0); }
            100% { transform: translateY(50px); }
        }

        /* Terminal windows in background */
        .terminal-window {
            position: absolute;
            width: 300px;
            height: 200px;
            background: rgba(15, 23, 42, 0.4);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 8px;
            backdrop-filter: blur(5px);
            padding: 12px;
            font-family: 'Courier New', monospace;
            font-size: 11px;
            opacity: 0.15;
            animation: terminalFloat 25s infinite ease-in-out;
        }

        .terminal-header {
            display: flex;
            gap: 6px;
            margin-bottom: 8px;
        }

        .terminal-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .terminal-dot.red { background: #ff5f56; }
        .terminal-dot.yellow { background: #ffbd2e; }
        .terminal-dot.green { background: #27c93f; }

        .terminal-content {
            color: #10b981;
            line-height: 1.6;
        }

        .terminal-content .prompt { color: #6366f1; }
        .terminal-content .command { color: #e2e8f0; }
        .terminal-content .output { color: #94a3b8; }

        @keyframes terminalFloat {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
            }
            25% {
                transform: translate(20px, -30px) rotate(1deg);
            }
            50% {
                transform: translate(-15px, -50px) rotate(-1deg);
            }
            75% {
                transform: translate(30px, -20px) rotate(0.5deg);
            }
        }

        /* Code brackets floating */
        .code-bracket {
            position: absolute;
            font-size: 4rem;
            color: rgba(99, 102, 241, 0.2);
            font-family: 'Courier New', monospace;
            animation: bracketFloat 15s infinite ease-in-out;
        }

        @keyframes bracketFloat {
            0%, 100% {
                transform: translate(0, 0) rotate(0deg);
                opacity: 0.2;
            }
            50% {
                transform: translate(50px, -80px) rotate(10deg);
                opacity: 0.4;
            }
        }

        /* Grid pattern overlay */
        .grid-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-image: 
                linear-gradient(rgba(99, 102, 241, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 102, 241, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }

        .coming-soon-container {
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

        .coming-soon-icon {
            font-size: 6rem;
            margin-bottom: 2rem;
            position: relative;
        }

        .icon-wrapper {
            position: relative;
            display: inline-block;
        }

        .icon-glow {
            position: absolute;
            inset: -20px;
            background: linear-gradient(135deg, #6366f1, #a855f7, #ec4899);
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0.5;
            animation: iconPulse 3s ease-in-out infinite;
        }

        .icon-main {
            position: relative;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            box-shadow: 0 10px 40px rgba(99, 102, 241, 0.4);
            animation: iconBounce 2s ease-in-out infinite;
        }

        @keyframes iconPulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.2); opacity: 0.7; }
        }

        @keyframes iconBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }

        .coming-soon-title {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .name {
            font-size: 2.5rem;
            font-weight: 700;
            color: #818cf8;
            margin-bottom: 2rem;
        }

        .coming-soon-message {
            max-width: 700px;
            margin: 0 auto 3rem;
            font-size: 1.25rem;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .info-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 1.5rem;
            padding: 2.5rem;
            margin-bottom: 2rem;
            max-width: 600px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .info-card h3 {
            font-size: 1.75rem;
            margin-bottom: 1rem;
            color: #e2e8f0;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .info-card p {
            color: #94a3b8;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .progress-card {
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(99, 102, 241, 0.3);
            border-radius: 1.5rem;
            padding: 2.5rem;
            margin-bottom: 2rem;
            max-width: 750px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        }

        .progress-card h3 {
            font-size: 1.75rem;
            margin-bottom: 1.5rem;
            color: #e2e8f0;
            background: linear-gradient(135deg, #6366f1, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .progress-bar-container {
            width: 100%;
            height: 12px;
            background: rgba(15, 23, 42, 0.8);
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 1rem;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899, #6366f1);
            background-size: 200% 100%;
            border-radius: 6px;
            width: 75%;
            animation: progressFlow 3s ease-in-out infinite;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.5);
        }

        @keyframes progressFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .progress-text {
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 500;
        }


        .social-links {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .social-link {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: rgba(99, 102, 241, 0.2);
            border: 1px solid rgba(99, 102, 241, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #818cf8;
            font-size: 1.5rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-link:hover {
            background: rgba(99, 102, 241, 0.4);
            transform: translateY(-5px) scale(1.1);
            box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        }

        @media (max-width: 640px) {
            .coming-soon-title {
                font-size: 2.5rem;
            }

            .name {
                font-size: 1.75rem;
            }

            .coming-soon-message {
                font-size: 1.1rem;
            }

            .icon-main {
                width: 100px;
                height: 100px;
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="code-background">
        <div class="code-lines"></div>
        
        <!-- Floating terminal windows -->
        <div class="terminal-window" style="top: 10%; left: 5%; animation-delay: 0s;">
            <div class="terminal-header">
                <div class="terminal-dot red"></div>
                <div class="terminal-dot yellow"></div>
                <div class="terminal-dot green"></div>
            </div>
            <div class="terminal-content">
                <div><span class="prompt">$</span> <span class="command">npm run build</span></div>
                <div class="output">Building...</div>
            </div>
        </div>

        <div class="terminal-window" style="top: 60%; right: 8%; animation-delay: 5s;">
            <div class="terminal-header">
                <div class="terminal-dot red"></div>
                <div class="terminal-dot yellow"></div>
                <div class="terminal-dot green"></div>
            </div>
            <div class="terminal-content">
                <div><span class="prompt">$</span> <span class="command">git status</span></div>
                <div class="output">On branch main</div>
            </div>
        </div>

        <div class="terminal-window" style="bottom: 15%; left: 15%; animation-delay: 10s;">
            <div class="terminal-header">
                <div class="terminal-dot red"></div>
                <div class="terminal-dot yellow"></div>
                <div class="terminal-dot green"></div>
            </div>
            <div class="terminal-content">
                <div><span class="prompt">$</span> <span class="command">code .</span></div>
                <div class="output">Opening editor...</div>
            </div>
        </div>

        <!-- Floating code brackets -->
        <div class="code-bracket" style="top: 20%; left: 10%; animation-delay: 0s;">{</div>
        <div class="code-bracket" style="top: 40%; right: 15%; animation-delay: 3s;">}</div>
        <div class="code-bracket" style="bottom: 30%; left: 20%; animation-delay: 6s;">[</div>
        <div class="code-bracket" style="bottom: 20%; right: 10%; animation-delay: 9s;">]</div>
        <div class="code-bracket" style="top: 60%; left: 5%; animation-delay: 12s;">&lt;</div>
        <div class="code-bracket" style="top: 70%; right: 5%; animation-delay: 15s;">&gt;</div>
    </div>

    <div class="grid-overlay"></div>

    <div class="coming-soon-container">
        <div class="coming-soon-icon">
            <div class="icon-wrapper">
                <div class="icon-glow"></div>
                <div class="icon-main">
                    <i class="fas fa-rocket"></i>
                </div>
            </div>
        </div>

        <h1 class="coming-soon-title">Coming Soon</h1>
        <p class="name">Chamikara's Web Portfolio</p>

        <div class="coming-soon-message">
            <p>I'm crafting something <span style="background: linear-gradient(135deg, #6366f1, #a855f7); -webkit-background-clip: text; background-clip: text; -webkit-text-fill-color: transparent;">extraordinary</span> for my portfolio. Stay tuned!</p>
        </div>

        <div class="progress-card">
            <h3><i class="fas fa-chart-line mr-2"></i>Development Progress</h3>
            <div class="progress-bar-container">
                <div class="progress-bar"></div>
            </div>
            <p class="progress-text">75% Complete • Launching Soon</p>
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
</body>
</html>
