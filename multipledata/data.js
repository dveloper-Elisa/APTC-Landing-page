// toggler menu
function toggleNav() {
  const navList = document.getElementById('nav-list');
  navList.classList.toggle('active');
}





const news = [
    {
      image: "./img/news1.jpg",
      day: 21,
      month: 12,
      year: 2020,
      ahref: "Government of Rwanda to provide farmers easier access to seeds and fertilizers",
      written: "The meeting focused on increasing the productivity of smallholder farmers...",
      newslink: "#"
    },
    {
      image: "./img/news2.jpg",
      day: 21,
      month: 12,
      year: 2020,
      ahref: "New model to get fertiliser to Rwanda farmers",
      written: "The Cabinet has approved a new fertiliser distribution model to replace the...",
      newslink: "#"
    },
    {
      image: "./img/news3.jpg",
      day: 12,
      month: "08",
      year: 2020,
      ahref: "Rwanda’s milk production on the rise as cattle population drop",
      written: "Figures from Rwanda Agriculture Board (RAB) show that the cattle population...",
      newslink: "#"
    },
    {
      image: "./img/news3.jpg",
      day: 12,
      month: "08",
      year: 2020,
      ahref: "Nyanza milk plant to get face-lift",
      written: "Plans to enhance the capacity of Nyanza Milk Industries are in advanced...",
      newslink: "#"
    },
    
  ];
  
  let currentPage = 1;
  const itemsPerPage = 3;
  
  const newsContainer = document.getElementById("news-container");
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  const pageInfo = document.getElementById("page-info");
  
  function renderNews() {
    newsContainer.innerHTML = "";
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const currentNews = news.slice(startIndex, endIndex);
    
    currentNews.forEach(item => {
      const card = document.createElement("div");
      card.className = "card";
      card.innerHTML += `
        <img src="${item.image}" alt="News Image">
        <p class="dates"><span>${item.day}</span><b>${item.month}</b><b>${item.year}</b></p>
        <a href="${item.newslink}">${item.ahref}</a>
        <p>${item.written}</p>
            <a href="#">READMORE...</a>
        <p></p>
      `;
      newsContainer.appendChild(card);
    });
  
    updatePagination();
  }
  
  function updatePagination() {
    pageInfo.textContent = currentPage;
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === Math.ceil(news.length / itemsPerPage);
  }
  
  prevBtn.addEventListener("click", () => {
    currentPage--;
    renderNews();
  });
  
  nextBtn.addEventListener("click", () => {
    currentPage++;
    renderNews();
  });
  
  // Initialize the news rendering
  renderNews();
  