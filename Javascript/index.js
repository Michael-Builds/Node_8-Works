// JAVASCRIPT CODE FOR SIDEBAR EFFECTS
const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");
const sidebar = document.getElementById("sidebar");

allDropdown.forEach((item) => {
  const a = item.parentElement.querySelector("a:first-child");
  a.addEventListener("click", function (e) {
    e.preventDefault();

    if (!this.classList.contains("active")) {
      allDropdown.forEach((i) => {
        const aLink = i.parentElement.querySelector("a:first-child");

        aLink.classList.remove("active");
        i.classList.remove("show");
      });
    }

    this.classList.toggle("active");
    item.classList.toggle("show");
  });
});

// SIDEBAR CLOSING AND OPENING
const toggleSidebar = document.querySelector("nav .toggle-sidebar");
toggleSidebar.addEventListener("click", function () {
  sidebar.classList.toggle("hide");
});

sidebar.addEventListener("mouseleave", function () {
  if (this.classList.contains("hide")) {
    allDropdown.forEach((item) => {
      const a = item.parentElement.querySelector("a:first-child");
      a.classList.remove("active");
      item.classList.remove("show");
    });
  }
});

sidebar.addEventListener("mouseenter", function () {
  if (this.classList.contains("hide")) {
    allDropdown.forEach((item) => {
      const a = item.parentElement.querySelector("a:first-child");
      a.classList.remove("active");
      item.classList.remove("show");
    });
  }
});

// PROFILE EFFECTS
const profile = document.querySelector("nav .profile");
const imgProfile = profile.querySelector("img");
const dropdownProfile = profile.querySelector(".profile-link");

imgProfile.addEventListener("click", function () {
  dropdownProfile.classList.toggle("show");
});

const allMenu = document.querySelectorAll("main .content-data .head .menu");
allMenu.forEach((item) => {
  const icon = item.querySelector(".icon");
  const menuLink = item.querySelector(".menu-link");

  icon.addEventListener("click", function () {
    menuLink.classList.toggle("show");
  });
});

window.addEventListener("click", function (e) {
  if (e.target !== imgProfile) {
    if (e.target !== dropdownProfile) {
      if (dropdownProfile.classList.contains("show")) {
        dropdownProfile.classList.remove("show");
      }
    }
  }

  allMenu.forEach((item) => {
    const icon = item.querySelector(".icon");
    const menuLink = item.querySelector(".menu-link");

    if (e.target !== icon) {
      if (e.target !== menuLink) {
        if (menuLink.classList.contains("show")) {
          menuLink.classList.remove("show");
        }
      }
    }
  });
});
// The nature of the progress of each card of the 4 cards
const allProgress = document.querySelectorAll(" main .card .progress");
allProgress.forEach((item) => {
  item.style.setProperty("--value", item.dataset.value);
});

// APEXCHART JS CODES
var options = {
  series: [
    {
      name: "series1",
      data: [31, 40, 28, 51, 42, 109, 100],
    },
    {
      name: "series2",
      data: [11, 32, 45, 32, 34, 52, 41],
    },
  ],
  chart: {
    height: 350,
    type: "area",
  },
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: "smooth",
  },
  xaxis: {
    type: "datetime",
    categories: [
      "2018-09-19T00:00:00.000Z",
      "2018-09-19T01:30:00.000Z",
      "2018-09-19T02:30:00.000Z",
      "2018-09-19T03:30:00.000Z",
      "2018-09-19T04:30:00.000Z",
      "2018-09-19T05:30:00.000Z",
      "2018-09-19T06:30:00.000Z",
    ],
  },
  tooltip: {
    x: {
      format: "dd/MM/yy HH:mm",
    },
  },
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();

// JS CODE FOR QUOTE SECTIONS
const quoteText = document.querySelector(".quote"),
  authorName = document.querySelector(".author .name"),
  quoteBtn = document.querySelector("button"),
  soundBtn = document.querySelector(".sound"),
  copyBtn = document.querySelector(".copy"),
  twitterBtn = document.querySelector(".twitter");

// RandomQuote function
function randomQuote() {
  quoteBtn.classList.add("loading");
  quoteBtn.innerText = "Loading quote...";
  // Random quote API link
  fetch("http://api.quotable.io/random")
    .then((res) => res.json())
    .then((result) => {
      // console.log(result);
      quoteText.innerText = result.content;
      authorName.innerText = result.author;
      quoteBtn.innerText = "New Quote";
      quoteBtn.classList.remove("loading");
    });
}

soundBtn.addEventListener("click", () => {
  let utterance = new SpeechSynthesisUtterance(
    `${quoteText.innerText} by ${authorName.innerText}`
  );
  speechSynthesis.speak(utterance);
});

copyBtn.addEventListener("click", () => {
  navigator.clipboard.writeText(quoteText.innerText);
  alert("copied");
});

twitterBtn.addEventListener("click", () => {
  let tweetUrl = `https://twitter.com/intent/tweet?url=${quoteText.innerText} by ${authorName.innerText}`;
  window.open(tweetUrl, "_blank");
});

quoteBtn.addEventListener("click", randomQuote);

// JAVASCRIPT FOR THE SEARCH BUTTON IN THE TOP NAV BAR
// const searchBar = document.querySelector(" nav .form-group input"),
// searchBtn = document.querySelector(".form-group .icon ");
// searchBtn.onclick =()=>{
//   searchBar.classList.toggle("active");
//   searchBar.focus();
//   searchBtn.classList.toogle("active");
// }

setInterval(() => {
  //  Ajax submit
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "Php/index.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        console.log(data);
      }
    }
  };
  xhr.send();
}, 500);

// Section for the ToDo list Popup
const addBox = document.querySelector(".add-box"),
  popupBox = document.querySelector(".popup-box"),
  closeIcon = popupBox.querySelector("header i"),
  titleTag = popupBox.querySelector("input"),
  contentTag = popupBox.querySelector("textarea"),
  addBtn = popupBox.querySelector("button");

const months = [
  "January",
  "February",
  "March",
  "April",
  "May",
  "June",
  "July",
  "August",
  "September",
  "October",
  "November",
  "December",
];

//Geting localstorage tasks if it exists and parsing them to js object else passing an empty array to tasks.
const tasks = JSON.parse(localStorage.getItem("tasks") || "[]");

addBox.addEventListener("click", () => {
  popupBox.classList.add("show");
});

closeIcon.addEventListener("click", () => {
  titleTag.value = "";
  contentTag.value = "";
  popupBox.classList.remove("show");
});

function showTasks() {
  document.querySelectorAll(".note").forEach(task =>task.remove());

  tasks.forEach((task) => {
    let liTag = `  <li class="note">
           <div class="details">
                 <p>${task.title}</p>
                <span>${task.content}</span>
           </div>
        <div class="bottom-content">
                <span>${task.date}</span>
              <div class="settings">
                 <i onclick="showMenu(this)" class='bx bx-dots-horizontal-rounded'></i>
                  <ul class="menu">
                    <li><i class='bx bx-edit-alt'></i>Edit</li>
                    <li><i class='bx bx-trash'></i>Delete</li>
                   </ul>
                </div>
        </div>
    </li>`;
    addBox.insertAdjacentHTML("afterend", liTag);
  });
}
showTasks();

function showMenu(elem){
  elem.parentElement.classList.add("show");
}

addBtn.addEventListener("click", (e) => {
  e.preventDefault();
  let TaskTitle = titleTag.value,
    noteContent = contentTag.value;

  // Date function that will return the date, month and year and automically load it onto the page to show to current date the task was added
  if (TaskTitle || noteContent) {
    let dataObj = new Date(),
      month = months[dataObj.getMonth()],
      day = dataObj.getDate(),
      year = dataObj.getFullYear();

    let taskinfo = {
      title: TaskTitle,
      content: noteContent,
      date: `${month} ${day} , ${year}`,
    };
    tasks.push(taskinfo);
    // We're going to be saving the texts that come into the local storage

    localStorage.setItem("tasks", JSON.stringify(tasks));
    closeIcon.click();
    showTasks();
  }
});
