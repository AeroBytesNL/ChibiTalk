@extends('layouts.before_login')

@section('title', 'Invite for ' . $homeName)

@section('content')
  <div class="flex justify-center items-center min-h-screen">
    <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-full max-w-sm md:ml-2 md:mr-2">
      <div class="flex justify-center mb-6">
        <img src="/media/app/ChibiTalk_logo.png" alt="ChibiTalk Logo" class="h-32 w-auto object-contain rounded-xl" />
      </div>

      <h2 class="text-2xl font-semibold mb-6 text-center">Invite for <br> {{ $homeName }}!</h2>

      <div id="sign-up" class="text-center">
        <form action="{{ $homeUrl }}" method="POST">
          @csrf
          <button type="submit" class="px-6 py-3 ml-2 bg-indigo-600 rounded hover:bg-indigo-500 transition font-semibold">
            Join Home
          </button>
        </form>
        <button type="submit" class="mt-6">
          <a href="{{ route('users.create') }}" class="px-6 py-3 ml-2 bg-indigo-600 rounded hover:bg-indigo-500 transition font-semibold">
            Sign up
          </a>
        </button>
      </div>
    </div>
  </div>
  <canvas id="confetti-canvas"></canvas>

  <style>
    canvas {
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
    }
  </style>

  <script>
    const canvas = document.getElementById("confetti-canvas");
    const ctx = canvas.getContext("2d");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let confetti = [];
    const colors = ["#fce18a", "#ff726d", "#b48def", "#f4306d"];

    function random(min, max) {
      return Math.random() * (max - min) + min;
    }

    function createConfetti() {
      for (let i = 0; i < 150; i++) {
        confetti.push({
          x: random(0, canvas.width),
          y: random(-canvas.height, 0),
          r: random(2, 6),
          d: random(10, 30),
          color: colors[Math.floor(Math.random() * colors.length)],
          tilt: random(-10, 10),
          tiltAngle: 0,
          tiltAngleIncrement: random(0.05, 0.12)
        });
      }
    }

    function drawConfetti() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      for (let i = 0; i < confetti.length; i++) {
        let c = confetti[i];
        ctx.beginPath();
        ctx.lineWidth = c.r;
        ctx.strokeStyle = c.color;
        ctx.moveTo(c.x + c.tilt + c.r, c.y);
        ctx.lineTo(c.x + c.tilt, c.y + c.tilt + c.r);
        ctx.stroke();
      }
      updateConfetti();
    }

    function updateConfetti() {
      for (let i = 0; i < confetti.length; i++) {
        let c = confetti[i];
        c.y += Math.cos(c.d) + 1 + c.r / 2;
        c.x += Math.sin(c.d);
        c.tiltAngle += c.tiltAngleIncrement;
        c.tilt = Math.sin(c.tiltAngle) * 15;

        if (c.y > canvas.height) {
          confetti[i] = {
            ...c,
            x: random(0, canvas.width),
            y: random(-20, 0)
          };
        }
      }
    }

    let animationFrame;
    function startConfetti() {
      confetti = [];
      createConfetti();
      function animate() {
        drawConfetti();
        animationFrame = requestAnimationFrame(animate);
      }
      animate();
    }

    document.addEventListener('DOMContentLoaded', () => {
      startConfetti();
    });
  </script>
@stop
