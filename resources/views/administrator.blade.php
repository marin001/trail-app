<?php


?>
<script>

async function logRaces() {
  const response = await fetch("http://localhost/api/races");
  const races = await response.json();
  console.log(races);
  document.write(JSON.stringify(races));
}
logRaces();

</script>
<body>
    <div id="races-container"></div>

</body>
<!-- <body><div id="output"></div></body> -->
