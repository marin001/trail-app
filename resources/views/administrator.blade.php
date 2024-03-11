<?php


use Illuminate\Support\Facades\Http;

//$response = Http::get('http://localhost/api/races');
//$response = Http::get('http://localhost/api/races');
//$response = Http::accept('application/json')->get('http://localhost/api/races');

//print_r($response);
?>
<script>
  // ...

//   const url = 'http://localhost/api/races';
//   fetch(url)
//     .then(response => {
//         document.write(response.json());})

//     .then(data =>{
//         const racesContainer = document.getElementById("races-container");
//         racesContainer.innerHTML(data.json());
//         // data.forEach(element => {
//         //     const raceElement=document.createElement('div');
//         //     raceElement.textContent='Title: ${element.id}';
//         //     racesContainer.appendChild(element);
//         // });
//     });

async function logMovies() {
  const response = await fetch("http://localhost/api/races");
  const movies = await response.json();
  console.log(movies);
  document.write(JSON.stringify(movies));
}
logMovies();

</script>
<body>
    <div id="races-container"></div>

</body>
<!-- <body><div id="output"></div></body> -->
