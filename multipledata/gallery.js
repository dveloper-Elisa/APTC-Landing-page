const images = [
    {
        image:"./gallery/1.jpg",
        name:"GAKO Live Stock farm"
    },
    {
        image:"./gallery/2.jpg",
        name:"GAKO Live Stock farm"
    },
    {
        image:"./gallery/3.jpg",
        name:"GAKO Live Stock farm"
    },
    {
        image:"./gallery/4.jpg",
        name:"Nyanza Milk Industries"
    },
    {
        image:"./gallery/5.jpg",
        name:"Nyanza Milk Industries"
    },
    {
        image:"./gallery/6.jpg",
        name:"Nyanza Milk Industries"
    },
    {
        image:"./gallery/7.jpg",
        name:"Fertilizers and seed destribution"
    },
    {
        image:"./gallery/8.jpg",
        name:"Fertilizers and seed destribution"
    },
    {
        image:"./gallery/9.jpg",
        name:"Fertilizers and seed destribution"
    },
    {
        image:"./gallery/10.jpg",
        name:"Fertilizers and seed destribution"
    },
    {
        image:"./gallery/11.jpg",
        name:"Fertilizers and seed destribution"
    },
    {
        image:"./gallery/12.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/13.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/14.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/15.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/16.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/17.jpg",
        name:"Rugali meet processing"
    },
    {
        image:"./gallery/18.jpg",
        name:"Rugali meet processing"
    },
]


// structureing
const grid = document.querySelector(".gridss");
const popup = document.getElementById("popup");
const popupImage = document.getElementById("popup-image");
let currentIndex = 0;
grid.innerHTML =""
images.forEach((img, index) => {
    grid.innerHTML += `
    <div class="typemeat">
        <img src="${img.image}" alt="${img.name}" title="${img.name}">
        <a href="#" class="overlay" onclick="openPopup(${index})"><i class="fa fa-eye"></i></a>
    </div>
    `;
});

function openPopup(index) {
    currentIndex = index;
    popupImage.src = images[currentIndex].image;
    popup.style.display = "flex";
}

function closePopup() {
    popup.style.display = "none";
}

function showNext() {
    currentIndex = (currentIndex + 1) % images.length;
    popupImage.src = images[currentIndex].image;
}

function showPrev() {
    currentIndex = (currentIndex - 1 + images.length) % images.length;
    popupImage.src = images[currentIndex].image;
}
