/*

 Program: nav.js
 Creator: William Bojczuk (wiliambojczuk@gmail.com)
 Github: https://github.com/wbojczuk
 
 */
"use strict";

//  Nav Object
const navObj = {
    isFixed: false,
    isDropped: false,
    init: ()=>{
        const mainNav = document.getElementById("mainNav");

        // Create Duplicate Nav
        const mainNav2 = mainNav.cloneNode(true);
        mainNav2.id="mainNav2";
        for(let i = 0; i < mainNav2.children.length; i++){
            mainNav2.children[i].id = `${mainNav2.children[i].id}2`;
        }
        mainNav.insertAdjacentElement("afterend", mainNav2);

        // Underline Navbar
        document.getElementById(`${document.getElementById("pageID").dataset.pageid}Link`).classList.add("activePageLink");
        if(document.getElementById("homeLink2")){
            document.getElementById(`${document.getElementById("pageID").dataset.pageid}Link2`).classList.add("activePageLink");
        }

 // Swap position to fixed on scroll
        window.addEventListener("scroll", ()=>{
            if(mainNav.getBoundingClientRect().top <= 0 && window.matchMedia("only screen and (min-width: 600px)").matches){
                if(!navObj.isFixed){
                    navObj.isFixed = true;
                   mainNav.style.visibility = "hidden";
                   mainNav2.style.display = "flex";
                }
            }else if(navObj.isFixed){
                navObj.isFixed = false;
                mainNav2.style.display = "none";
                mainNav.style.visibility = "visible";
            }
        });

        // Drop Down Navbar
        const dropDownElems = document.querySelectorAll(".dropdown-link");
        dropDownElems.forEach((elem)=>{
            const dropDownObj = {
                elem: elem.querySelector("ul"),
                active: false,
                clicked: false,
                mousy: false
            };

            elem.addEventListener("click", ()=>{
                dropDownObj.clicked = true;
                if(!dropDownObj.active){
                    showDropdown();
                }
            });

            elem.addEventListener("mouseenter", ()=>{
                if(!dropDownObj.active){
                    showDropdown();
                }
                dropDownObj.mousy = true;
            });

            elem.addEventListener("mouseleave", ()=>{
                dropDownObj.mousy = false;
            });

            window.addEventListener("click", ()=>{
                if(!dropDownObj.clicked && dropDownObj.active){
                    hideDropdown();
                }else{
                    dropDownObj.clicked = false;
                }
            });

            // Close when unused
            document.querySelectorAll("nav a, nav ul").forEach((elem)=>{
                elem.addEventListener("mouseenter", ()=>{
                    if(!dropDownObj.mousy){
                        hideDropdown(); 
                    }
                });
            });

            function showDropdown(){
                dropDownObj.elem.style.display = "inline-block";
                navObj.isDropped = true;
                dropDownObj.active = true;
            }
            function hideDropdown(){
                dropDownObj.elem.style.display = "none";
                navObj.isDropped = false;
                dropDownObj.active = false;
            }
        });

        // Mobile Close Button
        const mobileNavExit = document.getElementById("mobileNavExit");
        const mobileNavButton = document.getElementById("mobileNavButton");
        let mobileNavDown = true;
        mobileNavExit.addEventListener("click", ()=>{
                mainNav.style.animation = "navSlideDown 0.8s forwards";
                mobileNavDown = false;
        });
        mobileNavButton.addEventListener("click", ()=>{
            mainNav.style.animation = "navSlideUp 1s forwards";
            mobileNavDown = true;
        });
    }
}
navObj.init();