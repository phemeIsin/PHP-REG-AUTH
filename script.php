<?php header("Content-Type: application/javascript"); ?>
const themes = [
  {background:'#1A1A2E', color:'#FFFFFF', primary:'#0F3460', btn:'#E94560'},
  {background:'#461220', color:'#FFFFFF', primary:'#E94560', btn:'#F25F5C'},
];
document.addEventListener('DOMContentLoaded',()=>{
  // Theme buttons
  const container = document.querySelector('.theme-btn-container');
  themes.forEach(t=>{
    const btn = document.createElement('div'); btn.className='theme-btn'; btn.style.background=t.background;
    btn.onclick=()=>{
      document.documentElement.style.setProperty('--background',t.background);
      document.documentElement.style.setProperty('--color',t.color);
      document.documentElement.style.setProperty('--primary-color',t.primary);
      document.documentElement.style.setProperty('--btn-bg',t.btn);
    };
    container.appendChild(btn);
  });
  // Eye follow
  const avatar = document.querySelector('.avatar');
  const eyes = document.querySelectorAll('.eye');
  avatar && document.addEventListener('mousemove', e=>{
    eyes.forEach(eye=>{
      const rect = eye.getBoundingClientRect();
      const dx = e.clientX - (rect.left + rect.width/2);
      const dy = e.clientY - (rect.top + rect.height/2);
      const dist = Math.hypot(dx,dy);
      const max = 6;
      const px = (dx/dist)*max;
      const py = (dy/dist)*max;
      eye.style.setProperty('--px', px+'px');
      eye.style.setProperty('--py', py+'px');
    });
  });
  // Hands cover eyes on password focus
  const pwd = document.querySelector('input[type=password]');
  const hands = document.querySelectorAll('.hand');
  pwd && pwd.addEventListener('focus',()=>hands.forEach(h=>h.classList.add('hidden')));
  pwd && pwd.addEventListener('blur',()=>hands.forEach(h=>h.classList.remove('hidden')));
});