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
     mobileOpen: false,
     init: ()=>{
         const mainNav = document.getElementById("mainNav");
         mainNav.insertAdjacentHTML("afterBegin", `
            <a id="homeLink" href="./index.html">Home</a>
            <a id="galleryLink" href="./gallery.html">Gallery</a>
            <a id="scheduleLink" href="./schedule.html">Schedule</a>
            <a class="dropdown-link" id="informationLink">
                Information
                <ul class="four">
                    <li>General</li>
                    <li>How to qualify</li>
                    <li>FAQ</li>
                    <li>Hotels/Housing</li>
                </ul>
            </a>
            <a class="dropdown-link" id="curriculumLink" >
                Curriculum
                <ul class="three">
                    <li>Lessons</li>
                    <li>Certificate</li>
                    <li>Wall Chart</li>
                </ul>
            </a>
            <a id="resultsLink" href="./results.html">Results</a>
            <a id="productsLink" href="http://www.daisy.com/">Products</a>
            <a id="contactLink" href="">Contact</a>
            <a id="archivedLink" href="#" class="dropdown-link">
            Archived
            <ul class="two">
                <li>Past Winners</li>
                <li>Past Locations</li>
            </ul>
            </a>
         `);
         const bodyElem = document.getElementsByTagName("body")[0];
 
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
             };
 
             elem.addEventListener("click", ()=>{
                 dropDownObj.clicked = true;
                 if(!dropDownObj.active){
                     showDropdown();
                 }
             });
 
             elem.addEventListener("mouseenter", ()=>{
                     showDropdown();
             });
 
             elem.addEventListener("mouseleave", ()=>{
                hideDropdown(); 
             });
 
             window.addEventListener("click", ()=>{
                 if(!dropDownObj.clicked && dropDownObj.active){
                     hideDropdown();
                 }else{
                     dropDownObj.clicked = false;
                 }
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
 
         // Mobile Hamburger Menu
         const mobileNavMenu = document.getElementById("mobileNavMenu");
         mobileNavMenu.addEventListener("click", ()=>{
            // if Isn't open
            if(!navObj.mobileOpen){
                mobileNavMenu.classList.add("active");
                navObj.mobileOpen = !navObj.mobileOpen;
                mainNav.style.left = "0";
                bodyElem.style.overflowY = "hidden";
            }else{
                mobileNavMenu.classList.remove("active");
                navObj.mobileOpen = !navObj.mobileOpen;
                mainNav.style.left = "-100vw";
                bodyElem.style.overflowY = "auto";
            }
         });
     }
 }
 navObj.init();