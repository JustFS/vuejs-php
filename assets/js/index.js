const root = document.getElementById("root");
const toggle = document.getElementById("toggle");
const create = document.querySelectorAll(".create");
const update = document.querySelectorAll(".update");
const admin = document.getElementById("admin");
const wineList = document.getElementById("wine-list");
let data = [];

// dark screen when navbar is deployed
if (toggle) {
  toggle.addEventListener("change", () => {
    if (toggle.checked) {
      root.style = "filter: brightness(30%)";
    } else {
      root.style = "filter: brightness(100%)";
    }
  });
}

// dynamic nav
const display = (el) => {
  fetch(`libraries/views/${el}.html.php`)
    .then(res => res.text())
    .then(res => (root.innerHTML = res));
};

if (admin) {
  admin.onclick = () => display("admin");
  create.forEach((el) => {
    el.onclick = () => display("create");
  });
  update.forEach((el) => {
    el.onclick = () => display("update");
  });
}

// get data from mySql
// const list = new XMLHttpRequest();
// list.onreadystatechange = function () {
//   if (this.readyState == 4 && this.status == 200) {
//     data = JSON.parse(this.responseText);
//     console.log(data);
//   }
// };
// list.open("GET", "libraries/controllers/getData.php", true);
// list.send();