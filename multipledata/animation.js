 // ANIMATIONS 

  // 1. ANIMATION FOR HEADER IMAGES
  const content = [
    { 
      image: "./img/combined.png", 
      text: "API Agriculture Mechanization" 
    },
    { 
      image: "./img/combined2.png", 
      text: "Empowering Farmers with Technology"
    },
    { 
      image: "./img/risha.png", 
      text: "Revolutionizing Agriculture Practices"
    },
    { 
      image: "./img/arton129.jpg", 
      text: "Sustainable Farming Solutions"
    },
  ];
  
  let currentIndex = 0;
  
  const bodyImage = document.querySelector(".bodyImage");
  const bodyText = document.querySelector("#bodyText");
  
  content.forEach((item, index) => {
    const bgDiv = document.createElement("div");
    bgDiv.className ="bg";
    bgDiv.style.backgroundImage = `url(${item.image})`;
    if (index === 0) bgDiv.classList.add("active");
    bodyImage.appendChild(bgDiv);
  });
  
  const bgDivs = document.querySelectorAll(".bodyImage .bg");
  
  function changeContent() {
    bgDivs[currentIndex].classList.remove("active");
    currentIndex = (currentIndex + 1) % content.length;
    bgDivs[currentIndex].classList.add("active");
    bodyText.textContent = content[currentIndex].text;
  }
  
  setInterval(changeContent, 10000);


//   2. ANIMATION TWO ON ABOUR US DEVISION

  
const images = [
    "./img/arton137.jpg",
    "./img/chiks.jpg",
    "./img/13.jpg",
    "./img/finished seeds.jpg"
];

let currentIndex2 = 0;
const imageElement = document.getElementById("animatedImage");


function changeImage() {
    
    imageElement.style.opacity = 0;

    
    setTimeout(() => {
        
        imageElement.src = images[currentIndex2];

        
        imageElement.style.opacity = 1;
        
        
        currentIndex2 = (currentIndex2 + 1) % images.length;
    }, 2000); 
}


setInterval(changeImage, 5000); 
