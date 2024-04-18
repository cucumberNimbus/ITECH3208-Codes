let icon = document.querySelector(".icon");
let ul = document.querySelector("ul");

icon.addEventListener("click", () => {
    ul.classList.toggle("showData");

    if (ul.classList.contains("showData")) {
        document.getElementById("bar").classList = "fa-solid fa-xmark";
    } else {
        document.getElementById("bar").classList = "fa-solid fa-bar";
    }
});

// // navbar
// let Search = document.querySelector(".Search");
// let User = document.querySelector(".User");
// let Cart = document.querySelector(".Cart");

// Search.addEventListener("click", () => {
//     Search.style.color = "rgb(4,219,219)";
//     User.style.color = "white";
//     Cart.style.color = "white";
// });

// User.addEventListener("click", () => {
//     User.style.color = "rgb(4,219,219)";
//     Search.style.color = "white";
//     Cart.style.color = "white";
// });

// Cart.addEventListener("click", () => {
//     Cart.style.color = "rgb(4,219,219)";
//     User.style.color = "white";
//     Search.style.color = "white";
// });

// card js
let crd = document.querySelectorAll(".crd");
let itemPage = document.querySelector(".itemPage");
let container = document.querySelector(".container");
let itemImg = document.getElementById("itemImg");
let buyBtn = document.getElementById("buyBtn");
let cross = document.querySelector(".cross");
let buyText = document.querySelector(".buyText"); // Define buyText variable

crd.forEach(function(curValue) {
    curValue.addEventListener("click", function() {
        itemPage.style.display = "flex";
        container.style.display = "none";

        let imgSrc = curValue.firstElementChild.src;
        itemImg.src = imgSrc;

        buyBtn.addEventListener("click", function() {
            document.querySelector(".buyPage").style.display = "block";
            buyText.innerHTML = `
                <h3>Enter Details:</h3>
                <input placeholder="Enter your name" id="name"><br>
                <input placeholder="Enter your Address" id="address"><br>
                <input placeholder="Enter your Mobile number id="number"><br>
                <h3>Payment Option</h3>
                <select>
                    <option value="Google-Pay">Google Pay</option>
                    <option value="Apple-Pay">Apple Pay</option>
                    <option value="After-pay">After Pay</option>
                    <option value="Cash-on-Delivery">Cash on Delivery</option>
                </select><br>
                <button id="submitBtn">Submit</button>
            `;
            
            let submitBtn = document.getElementById("submitBtn");
            submitBtn.addEventListener("click", function(){
                let name = document.getElementById("name");

                if(name.value === "" && address.value =="" && number.value == ""){
                    alert("Please enter your detail");
                 } else{
                    alert("You Response has been recorded")

                    }
                
            });
        });
    });
});

// Place the event listener for cross outside of the buyBtn event listener
cross.addEventListener("click", function() {
    document.querySelector(".buyPage").style.display = "none";
});
