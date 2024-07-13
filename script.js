function fetchData() {
  fetch("getData.php")
    .then((response) => response.json())
    .then((data) => {
      const tableBody = document.querySelector("#data-table tbody");
      tableBody.innerHTML = ""; // Kosongkan isi tabel

      data.forEach((row) => {
        const tr = document.createElement("tr");
        tr.innerHTML = `<td>${row.value}</td><td>${row.kata}</td>`; // Menambahkan kolom "kata"
        tableBody.appendChild(tr);
      });
    })
    .catch((error) => console.error("Error fetching data:", error));
}

setInterval(fetchData, 100); // Refresh data every 5 seconds

// Initial fetch
fetchData();
