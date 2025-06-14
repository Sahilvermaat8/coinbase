<?php
session_start();

// Agar user login nahi hai to login page bhejo
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cryptocurrency</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a4bf4d7b7a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    * {
      /* margin: 0; padding: 0; */
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }
    body {
      background-color: #0f172a;
      color: #fff;
      /* display: flex; */
      /* height: 100vh; */
    }

    /* Left Chart Panel */
    /* .left {
      width: 60%;
      padding: 20px;
      border-right: 2px solid #1e293b;
    } */

    /* .chart-box {
      background: #1e293b;
      height: 100%;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #94a3b8;
      font-size: 20px;
    } */

    /* Right Investment Panel */
    /* .right {
      width: 40%;
      padding: 30px;
      background-color: #0f172a;
      display: flex;
      flex-direction: column;
      gap: 20px;
    } */
    .navbar-nav{
        gap: 20px;
    }
    .navbar-light .navbar-nav .nav-link:hover{
        background-color: blue;
        color: white;
        border-radius: 5px;
    }
    .parent{
        display: flex;
        gap: 40px;
        margin-top: 50px;
    }
    .card {
      background-color: #1e293b;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    h2 {
      margin-bottom: 15px;
      font-size: 24px;
      font-weight: 600;
      color: #38bdf8;
    }

    label {
      display: block;
      margin: 10px 0 5px;
    }

    select, input {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
    }

    select {
      background-color: #334155;
      color: #fff;
    }

    input[type="text"], input[type="number"] {
      background-color: #1e293b;
      color: #fff;
      border: 1px solid #334155;
    }

    .circle-btn {
      display: inline-block;
      width: 55px;
      height: 55px;
      line-height: 55px;
      border-radius: 50%;
      background-color: #334155;
      text-align: center;
      margin: 5px;
      cursor: pointer;
      font-weight: bold;
      color: #fff;
      transition: 0.3s;
    }

    .circle-btn:hover, .circle-btn.active {
      background-color: #38bdf8;
    }

    #daysOptions button {
      margin: 5px 10px 0 0;
      padding: 8px 16px;
      background-color: #334155;
      border: none;
      color: #fff;
      border-radius: 6px;
      cursor: pointer;
    }

    #daysOptions button:hover {
      background-color: #38bdf8;
    }

    input[readonly] {
      background-color: #0f172a;
      border: 1px solid #475569;
      font-weight: bold;
    }

    .trade-btn {
      background-color: #10b981;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      margin-top: 15px;
    }
    .track{
        margin: 10px 0px 10px 0px;
    }
    .trade-btn:hover {
      background-color: #059669;
    }
    .section1{
      justify-content: space-between;
    }
    .section1-div2-heading>h4{
      margin: 110px 80px 0px 0px;
    }
        .top-movers {
      background-color: #0f172a;
      color: #fff;
      padding: 20px;
    }

    .scroll-container {
      display: flex;
      overflow-x: auto;
      gap: 16px;
      padding: 10px 0;
    }

    .coin-card {
      min-width: 160px;
      background-color: #1e293b;
      border-radius: 12px;
      padding: 12px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .coin-card img {
      width: 40px;
      height: 40px;
    }

       .new-coins {
      background-color: #0f172a;
      color: #fff;
      padding: 20px;
    }

    .scroll-container {
      display: flex;
      overflow-x: auto;
      gap: 16px;
      padding: 10px 0;
    }

    .coin-card {
      min-width: 160px;
      background-color: #1e293b;
      border-radius: 12px;
      padding: 12px;
      text-align: center;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .coin-card img {
      width: 40px;
      height: 40px;
    }

    .scroll-container::-webkit-scrollbar {
      height: 6px;
    }

    .scroll-container::-webkit-scrollbar-thumb {
      background-color: #334155;
      border-radius: 10px;
    }

    .scroll-container::-webkit-scrollbar-track {
      background: transparent;
    }
    .nav-link:hover{
      background-color: rgb(8, 8, 223);
      border-radius: 7px;
      color: white;
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand ms-lg-5" href="#" style="color: blue;"><b>Coinbase</b></a>

            <!-- Toggler button for mobile -->
            <button class="navbar-toggler me-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-5">
                    <li class="nav-item"><a href="cryptocurreny.php" class="nav-link">Cryptocurrencies</a></li>
                    <li class="nav-item"><a href="#info-scroll" class="nav-link">Trade</a></li>
                    <li class="nav-item"><a href="#instruction-scroll" class="nav-link">Wallet</a></li>
                    <li class="nav-item"><a href="#participate-scroll" class="nav-link">Security</a></li>
                    <li class="nav-item"><a href="#transaction-scroll" class="nav-link">About</a></li>
                </ul>

                <!-- Login Button (optional collapse) -->
                 <a href="#" class="d-flex"  style="color: black; text-decoration: none;">
                <h6 class="mt-2"><?php echo htmlspecialchars($username); ?>!</h6>
                <div class="ms-1 mt-1 me-2"><i class="fa-solid fa-user"></i></div>
                </a>
            </div>
        </div>
    </nav>
  <div class="container d-flex section1">
    <div class="mt-lg-5 mb-lg-2 mt-3 mb-2">
      <h3>Explore crypto</h3>
      <h6>Coinbase 200+ Index is down (24hrs)</h6>
    </div>
    <div class="section1-div2-heading d-none d-lg-block">
      <h4>Buy Coins to Get 5X</h4>
    </div>
  </div>
<!-- TradingView Widget BEGIN -->
<div class="d-flex flex-column flex-lg-row-reverse gap-5 mt-4 mt-lg-4 container">
    <div>
        <div class="card">
            <h2>Crypto Investment</h2>

            <label>Select Coin</label>
            <select id="coinSelect"></select>
            <p>Live Price: $<span id="livePrice">0.00</span></p>

            <label>Select Amount</label>
            <div id="amountOptions">
                <div class="circle-btn">20</div>
                <div class="circle-btn">50</div>
                <div class="circle-btn">100</div>
                <div class="circle-btn">250</div>
                <div class="circle-btn">1000</div>
            </div>

            <label>Or Enter Custom Amount</label>
            <input type="number" id="customAmount" placeholder="Enter amount">

            <label>Coins You Get</label>
            <input type="text" id="coinsOutput" readonly>

            <label>Select Duration</label>
            <div id="daysOptions">
                <button data-days="7" class="active">7 Days</button>
                <button data-days="14">14 Days</button>
                <button data-days="28">28 Days</button>
                <button data-days="51">51 Days</button>
            </div>

            <label>Estimated Return</label>
            <input type="text" id="returnOutput" readonly>

            <button class="trade-btn">Trade</button>
        </div>
    </div>
        <div class="tradingview-widget-container ms-4 ms-lg-0">
        <div class="tradingview-widget-container__widget"></div>
        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/" rel="noopener nofollow"
                target="_blank"></a></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js"
            async>
                {
                    "width": "90%",
                        "height": "750",
                            "defaultColumn": "overview",
                                "screener_type": "crypto_mkt",
                                    "displayCurrency": "USD",
                                        "colorTheme": "dark",
                                            "locale": "en",
                                                "isTransparent": true
                }
            </script>
    </div>
</div>
  <div class="container">
    <div>
      <h4>Crypto prices</h4>
    </div>
    <div>
      <p>The overall crypto market is growing this week. As of today, the total<br class="d-none d-lg-block">
 crypto market capitalization is 273.3 trillion,  <br class="d-none d-lg-block"> representing a 0.40% increase from last week. The 24-hour crypto market trading volume has also seen a 2.19% decrease over the past day. The top performing cryptocurrencies by price are Aerodrome Finance, Ancient8 and Kava. Bitcoin remains the largest cryptocurrency by market capitalization of ₹180,605,505,694,717.78. Its 24-hour trading volume has seen a 39.24% increase over the past day. Ethereum, the second largest cryptocurrency by market cap of ₹26,555,398,517,337.67, has seen its 24-hour trading volume increase 51.18% in the last day.</p>
    </div>
  </div>

<div class="container-fluid top-movers">
  <h4 class="mb-3">🔥 Top Movers (7d)</h4>
  <div class="scroll-container" id="topMoversContainer">
    <!-- Cards will be added by JS -->
  </div>
</div>

<!-- NEW COINS SECTION -->

  <div class="container-fluid new-coins">
    <h4 class="mb-3">🆕 New Coins</h4>
    <div class="scroll-container" id="newCoinsContainer">
      <!-- Cards will be populated via JS -->
    </div>
  </div>

<!-- TradingView Widget END -->

   <script>
    const coinSelect = document.getElementById('coinSelect');
    const livePriceSpan = document.getElementById('livePrice');
    const customAmount = document.getElementById('customAmount');
    const coinsOutput = document.getElementById('coinsOutput');
    const returnOutput = document.getElementById('returnOutput');
    let livePrice = 0;
    let investmentAmount = 0;

    async function loadCoins() {
      const res = await fetch('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd');
      const coins = await res.json();
      coins.forEach(c => {
        const opt = document.createElement('option');
        opt.value = c.id;
        opt.textContent = `${c.name} (${c.symbol.toUpperCase()})`;
        coinSelect.appendChild(opt);
      });
      coinSelect.selectedIndex = 0;
      fetchPrice();
    }

    async function fetchPrice() {
      const coin = coinSelect.value;
      const res = await fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${coin}&vs_currencies=usd`);
      const data = await res.json();
      livePrice = data[coin].usd;
      livePriceSpan.textContent = livePrice.toFixed(2);
      updateOutputs();
    }

    function updateOutputs() {
      if (investmentAmount > 0 && livePrice > 0) {
        const coins = investmentAmount / livePrice;
        coinsOutput.value = coins.toFixed(6);
      }
    }

    function updateReturn(days) {
      let multiplier = 1;
      if (days == 7) multiplier = 1.2;
      if (days == 14) multiplier = 2.0;
      if (days == 28) multiplier = 3.6;
      if (days == 51) multiplier = 5.0;

      const total = investmentAmount * multiplier;
      returnOutput.value = `$${total.toFixed(2)} (x${multiplier})`;
    }

    coinSelect.addEventListener('change', fetchPrice);
    customAmount.addEventListener('input', () => {
      investmentAmount = parseFloat(customAmount.value) || 0;
      document.querySelectorAll('.circle-btn').forEach(btn => btn.classList.remove('active'));
      updateOutputs();
    });

    document.querySelectorAll('.circle-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.querySelectorAll('.circle-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        investmentAmount = parseFloat(btn.textContent);
        customAmount.value = '';
        updateOutputs();
      });
    });

    document.querySelectorAll('#daysOptions button').forEach(btn => {
      btn.addEventListener('click', () => {
        const days = btn.getAttribute('data-days');
        updateReturn(days);
      });
    });

    loadCoins();

     async function loadTopMovers() {
    const res = await fetch('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=percent_change_7d_desc&per_page=5&page=1&price_change_percentage=7d');
    const coins = await res.json();

    const container = document.getElementById('topMoversContainer');

    coins.forEach(coin => {
      const change7d = coin.price_change_percentage_7d_in_currency?.toFixed(2);
      const card = document.createElement('div');
      card.className = 'coin-card';

      card.innerHTML = `
        <img src="${coin.image}" alt="${coin.name}">
        <h6 class="mt-2">${coin.name}</h6>
        <p>$${coin.current_price.toFixed(2)}</p>
        <p class="${change7d > 0 ? 'text-success' : 'text-danger'}">${change7d}%</p>
      `;
      container.appendChild(card);
    });
  }

  loadTopMovers();


     async function loadNewCoins() {
      try {
        const res = await fetch('https://api.coingecko.com/api/v3/coins/list?include_platform=false');
        const allCoins = await res.json();

        // Get the latest 5 coins (from end)
        const latestCoins = allCoins.slice(-5).reverse(); // newest first

        const container = document.getElementById('newCoinsContainer');

        for (let coin of latestCoins) {
          // Fetch coin details (for price, image etc.)
          const coinDataRes = await fetch(`https://api.coingecko.com/api/v3/coins/${coin.id}`);
          const coinData = await coinDataRes.json();

          const card = document.createElement('div');
          card.className = 'coin-card';

          const price = coinData.market_data?.current_price?.usd ?? "N/A";
          const img = coinData.image?.small ?? '';
          const launchDate = coinData.genesis_date ?? 'Unknown';

          card.innerHTML = `
            <img src="${img}" alt="${coin.name}">
            <h6 class="mt-2">${coin.name}</h6>
            <p>$${typeof price === "number" ? price.toFixed(2) : price}</p>
            <p class="text-muted">Launch: ${launchDate}</p>
          `;
          container.appendChild(card);
        }
      } catch (err) {
        console.error('Error loading new coins:', err);
      }
    }

    loadNewCoins();

    

  </script>


</div>



</body>
</html>
  <!-- TradingView Widget END -->

 