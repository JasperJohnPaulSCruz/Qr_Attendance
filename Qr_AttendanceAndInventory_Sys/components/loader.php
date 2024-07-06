<div class="loading h-screen w-screen flex justify-center items-center z-10">
    <div class="container">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>
</div>

<style>
  .container {
    --uib-size: 78px;
    --uib-speed: 1.4s;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: calc(var(--uib-size) * 0.51);
    height: calc(var(--uib-size) * 0.51);
  }
  
  .dot {
    position: relative;
    display: flex;
    flex-shrink: 0;
    align-items: center;
    height: 100%;
    width: 25%;
    transform-origin: center top;
  }

  .dot::after {
    content: '';
    display: block;
    width: 100%;
    height: 25%;
    border-radius: 50%;
    background-color: black;
    transition: background-color 0.3s ease;
  }

  .dot:first-child {
    animation: swing var(--uib-speed) linear infinite;
  }

  .dot:last-child {
    animation: swing2 var(--uib-speed) linear infinite;
  }

  @keyframes swing {
    0% {
      transform: rotate(0deg);
      animation-timing-function: ease-out;
    }

    25% {
      transform: rotate(70deg);
      animation-timing-function: ease-in;
    }

    50% {
      transform: rotate(0deg);
      animation-timing-function: linear;
    }
  }

  @keyframes swing2 {
    0% {
      transform: rotate(0deg);
      animation-timing-function: linear;
    }

    50% {
      transform: rotate(0deg);
      animation-timing-function: ease-out;
    }

    75% {
      transform: rotate(-70deg);
      animation-timing-function: ease-in;
    }
  }
</style>
