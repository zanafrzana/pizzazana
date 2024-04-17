// select elements

const header = document.querySelector(".header");
const nav = document.querySelector(".nav");
const ul = document.querySelector(".nav__menu");

// sticky navigation using Intersection observer api for better performance

const navHeight = nav.getBoundingClientRect().height;

const stickyNav = (entries) => {
  const [entry] = entries;

  if (!entry.isIntersecting) nav.classList.add("header__sticky");
  else nav.classList.remove("header__sticky");
};

const headerObserver = new IntersectionObserver(stickyNav, {
  root: null,
  threshold: 0,
  rootMargin: `${navHeight}px`,
});

headerObserver.observe(header);

// page navigation scroll smoothly with event delegation
const sections = document.querySelectorAll("section");

ul.addEventListener("click", (e) => {
  e.preventDefault();

  if (e.target.classList.contains("nav__link")) {
    const id = e.target.getAttribute("href");

    document.querySelector(id).scrollIntoView({ behavior: "smooth" });
    sections.forEach((section) => (section.style.paddingTop = "100px"));
  }
});

// fading animation with better performance
const allSections = document.querySelectorAll(".section");

const fadingSection = (entries, observer) => {
  const [entry] = entries;
  if (!entry.isIntersecting) return;
  entry.target.classList.remove("section__hidden");
  observer.unobserve(entry.target);
};

const sectionObserver = new IntersectionObserver(fadingSection, {
  root: null,
  threshold: 0.12,
});

allSections.forEach((section) => {
  sectionObserver.observe(section);
  section.classList.add("section__hidden");
});

// mobile menu
const mobileMenu = document.querySelector(".mobile__menu");
const overlay = document.querySelector(".navigation");

const showMenu = () => {
  overlay.classList.add("show__menu");
};

const hideMenu = () => {
  overlay.classList.remove("show__menu");
};

let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'VEGETABLE MACARONI',
        image: '1.PNG',
        price: 24.00
    },
    {
        id: 2,
        name: 'BBQ CHICKEN',
        image: '2.PNG',
        price: 30.00
    },
    {
        id: 3,
        name: 'SALMON VEGESS',
        image: '3.PNG',
        price: 35.00
    },
    {
        id: 4,
        name: 'CHEEZY SAUCE',
        image: '4.PNG',
        price: 30.00
    },
    {
        id: 5,
        name: 'VEGETABLES',
        image: '5.PNG',
        price: 29.00
    },
    {
        id: 6,
        name: 'PIZZA TOMATO',
        image: '6.PNG',
        price: 40.00
    },
    {
        id: 7,
        name: 'PAPPORONI PIZZA',
        image: 'dishes-01.png',
        price: 40.00
    },
    {
        id: 8,
        name: 'PASTA',
        image: 'dishes-02.png',
        price: 25.00
    },
    {
        id: 9,
        name: 'BURGER LAMB GRILL',
        image: 'burger.png',
        price: 35.00
    }
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="image/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}

mobileMenu.addEventListener("click", showMenu);
overlay.addEventListener("click", hideMenu);
