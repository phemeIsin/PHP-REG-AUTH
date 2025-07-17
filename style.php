<?php header("Content-Type: text/css"); ?>
:root {
    --background: #1a1a2e;
    --color: #ffffff;
    --primary-color: #0f3460;
    --btn-bg: #e94560;
    --btn-color: #ffffff;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: 'Poppins', sans-serif;
    background: var(--background);
    color: var(--color);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.login-container { position: relative; width: 22rem; }
.form-container {
    backdrop-filter: blur(20px);
    background: rgba(255,255,255,0.1);
    border: 1px solid hsla(0,0%,65%,0.158);
    border-radius: 10px;
    box-shadow: 0 0 36px rgba(0,0,0,0.2);
    padding: 2rem;
    position: relative;
    z-index: 2;
    text-align: center;
}
/* Avatar Doll */
.avatar {
    position: relative;
    width: 100px;
    height: 100px;
    margin: 0 auto 1rem;
}
.eye {
    position: absolute;
    width: 20px; height: 20px;
    background: #fff;
    border-radius: 50%;
    overflow: hidden;
}
.eye::after {
    content: '';
    position: absolute;
    top: 4px; left: 4px;
    width: 12px; height: 12px;
    background: #000;
    border-radius: 50%;
    transform: translate(var(--px,0), var(--py,0));
    transition: transform 0.1s;
}
.eye.left { top: 30px; left: 20px; }
.eye.right { top: 30px; right: 20px; }
.hand {
    position: absolute;
    width: 30px; height: 30px;
    background: rgba(255,255,255,0.8);
    border-radius: 50%;
    top: 60px;
    transition: top 0.2s;
}
.hand.left { left: 5px; }
.hand.right { right: 5px; }
.hand.hidden { top: 40px; }
/* Form styles */
.form-container form input {
    width:100%; padding:14px; margin:1rem 0;
    background: rgba(255,255,255,0.1);
    border:none; border-radius:5px;
    color:var(--color);
    outline: none;
    backdrop-filter: blur(15px);
}
.form-container form button {
    width:100%; padding:13px;
    background: var(--btn-bg);
    color: var(--btn-color);
    border:none; border-radius:5px;
    font-weight:bold; letter-spacing:1px;
    cursor:pointer; opacity:0.9;
    transition: transform 0.1s;
}
.form-container form button:hover { transform:scale(1.02); opacity:1; }
.register-forget { margin-top:1rem; }
.register-forget a { color: var(--btn-bg); text-decoration: none; }
.register-forget a:hover { text-decoration: underline; }
.theme-btn-container { position:absolute; bottom:2rem; left:0; display:flex; gap:0.5rem; }
.theme-btn { width:25px; height:25px; border-radius:50%; cursor:pointer; }