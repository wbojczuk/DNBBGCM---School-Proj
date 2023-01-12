/*

 Program: confetti.js
 Version: 1.0 
 Creator: William Bojczuk (wiliambojczuk@gmail.com)
 License: BSD
 Github: https://github.com/wbojczuk
 Website: https://williambojczuk.com
 
 */

//  I created this framework in 2022 to make rendering confetti-like particles easy
/*
METHODS
confettiAnim.confettiAnim(elem) - Starts particle rendering relative to elem
confettiAnim.confettiHandler(event) - Sends event.target to renderer if renderer is ready.
*/

"use strict";

const confettiAnim = {

    // SETTINGS
    confettiHeight: [-7, -25],
    confettiHeightUnit: "vw",
    confettiSpread: [1, 8],
    confettiSpreadUnit: "vw",
    confettiColors: ["#e00000", "#003a62", "white"],
    confettiSize: [0.2, 0.6],
    confettiSizeUnit: "vw",
    confettiAmt: 45,
    confettiSpin: [150, 280],
    confettiSpeed: [3000, 4000],
    confettiDelay: [0, 200],

    // Setup
    setup: ()=>{
        // INJECT MAIN STYLES
        const confettiStyles = document.createElement("style");
        confettiStyles.textContent = `
        .as-confetti-piece{
            display: inline-block;
            position: absolute;
            
        }
        
        .as-confetti-wrapper{
            position: absolute;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            user-select: none;
            pointer-events: none;
        }
        
        .as-confetti-center{
            display: inline-block;
            width: 1px;
            height: 1px;
        }
        `;
        document.getElementsByTagName("head")[0].append(confettiStyles);


        if(document.querySelector(".as-confetti")){
            const elems = document.querySelectorAll(".as-confetti");
            const elemsLength = elems.length;
            for(let i = 0; i < elemsLength; i++){
               confettiAnim.confettiAnim(elems[i]); 
            }
        }

        if(document.querySelector(".as-confetti-hover")){
            const elems = document.querySelectorAll(".as-confetti-hover");
            const elemsLength = elems.length;
            for(let i = 0; i < elemsLength; i++){
               elems[i].addEventListener("mouseenter", confettiAnim.confettiHandler); 
            }
        }
        const isElementXPercentInViewport = function(el, percentVisible) {
            let
            rect = el.getBoundingClientRect(),
            windowHeight = (window.innerHeight || document.documentElement.clientHeight);
            return !(
            Math.floor(100 - (((rect.top >= 0 ? 0 : rect.top) / +-rect.height) * 100)) < percentVisible ||
            Math.floor(100 - ((rect.bottom - windowHeight) / rect.height) * 100) < percentVisible
            )
            };
            const confetElem = document.getElementById("confettiText");
            window.addEventListener("scroll", confetScroll);
            function confetScroll(){
                if(isElementXPercentInViewport(confetElem, 100)){
                    window.removeEventListener("scroll", confetScroll);
                    confettiAnim.confettiAnim(confetElem);
                    confetElem.addEventListener("mouseenter", confettiAnim.confettiHandler);
                    confetElem.addEventListener("click", confettiAnim.confettiHandler);
                }
            }

    },

    confettiAnim: (elem)=>{
        elem.style.position = "relative";
        const confettiWrapper = document.createElement("div");
        confettiWrapper.className = "as-confetti-wrapper";

        const confettiCenter = document.createElement("div");
        confettiCenter.className = "as-confetti-center";

        confettiWrapper.append(confettiCenter);
        elem.append(confettiWrapper);


        // STYLESHEET INJECTION

        // SETTINGS

        let colorSettings = confettiAnim.confettiColors;
        if(elem.hasAttribute("data-colors")){
            colorSettings = JSON.parse(elem.dataset.colors);
        }

        let heightSettings = confettiAnim.confettiHeight;
        if(elem.hasAttribute("data-height")){
            heightSettings = JSON.parse(elem.dataset.height);
        }

        let speedSettings = confettiAnim.confettiSpeed;
        if(elem.hasAttribute("data-speed")){
            speedSettings = JSON.parse(elem.dataset.speed);
        }

        let sizeSettings = confettiAnim.confettiSize;
        if(elem.hasAttribute("data-size")){
            sizeSettings = JSON.parse(elem.dataset.size);
        }

        let spinSettings = confettiAnim.confettiSpin;
        if(elem.hasAttribute("data-spin")){
            spinSettings = JSON.parse(elem.dataset.spin);
        }

        let delaySettings = confettiAnim.confettiDelay;
        if(elem.hasAttribute("data-delay")){
            delaySettings = JSON.parse(elem.dataset.delay);
        }

        let spreadSettings = confettiAnim.confettiSpread;
        if(elem.hasAttribute("data-spread")){
            spreadSettings = JSON.parse(elem.dataset.spread);
        }

        let amtSettings = confettiAnim.confettiAmt;
        if(elem.hasAttribute("data-amt")){
            amtSettings = parseFloat(elem.dataset.amt);
        }

        const confettiStyles = document.createElement("style");
        confettiStyles.id = `confettiStyles${confettiAnim.confettiInstances}`;
        
        //INJECT ANIMATIONS 
        for(let i = 0; i < amtSettings; i++){

            const pieceSize = (Math.random() * (sizeSettings[1] - sizeSettings[0]) + sizeSettings[0]); 


            let spread = Math.random() * (spreadSettings[1] - spreadSettings[0]) + spreadSettings[0];
            if(Math.round(Math.random() * (1-2)+1)==1){spread = -1 * (spread);}

            const height = Math.random() * (heightSettings[1] - heightSettings[0]) + heightSettings[0];
            
            const currentPerc  = Math.round(Math.random() * (100 - 45) + 45);

            let spin = Math.random() * (spinSettings[1] - spinSettings[0]) + spinSettings[0];
            if(Math.round(Math.random() * (2-1)+1)==1){spin = spin*-1}
            const beforePerc = Math.round(Math.random() * (20-currentPerc)+currentPerc);

            confettiStyles.textContent += `
            @keyframes confetti${confettiAnim.confettiInstances}${i}{
                0%{
                    transform: translateY(0) translateX(0) rotate(0);
                    width:0;
                    height:0;
                    
                   
                }
                20%{
                    transform: translateY(${height}${confettiAnim.confettiHeightUnit}) translateX(${spread}${confettiAnim.confettiSpreadUnit}) rotate(${spin}deg);
                    width: ${pieceSize}${confettiAnim.confettiSizeUnit};
                    height: ${pieceSize}${confettiAnim.confettiSizeUnit};
                    
                    
                }

                ${beforePerc}%{opacity:1;}

                ${currentPerc}%{
                    width:0;
                    height:0;
                opacity:0;
                }

                100%{transform: translateY(0) translateX(${spread}${confettiAnim.confettiSpreadUnit}) rotate(0);
                opacity:0;
            }
            }
            `;
        }
        
        document.getElementsByTagName("head")[0].append(confettiStyles);

        // ACTUAL CONFETTI SETUP/INJECTION

        const confettiPiece = document.createElement("div");
        confettiPiece.className = "as-confetti-piece";
        
        const colorAmt = colorSettings.length;

        for(let i = 0; i < amtSettings; i++){
            
            
            const curColor = Math.floor(Math.random() * colorAmt);

            const curSpeed = (Math.random() * (speedSettings[1] - speedSettings[0]) + speedSettings[0]); 

            const curDelay = (Math.random() * (delaySettings[1] - delaySettings[0]) + delaySettings[0]); 

            const tempPiece = confettiPiece.cloneNode(false);
            tempPiece.setAttribute("style", `
                background-color: ${colorSettings[curColor]};
                
                animation: confetti${confettiAnim.confettiInstances}${i} ${curSpeed}ms forwards;
                animation-delay: ${curDelay}ms;
            `);
            const currentShape = Math.round(Math.random() * (3-1)+1);
            if(currentShape == 2){
                tempPiece.style.border = "0px solid transparent";
                tempPiece.style.borderRadius = "50%"; 
            }

            if(currentShape == 1){
                tempPiece.style.clipPath = "polygon(0% 100%, 50% 0%, 100% 100%)";
            }

            confettiCenter.append(tempPiece);

        }

        confettiAnim.confettiInstances++;

        const endTime = speedSettings[1] + delaySettings[1];
        
            elem.setAttribute("data-confettioff", "true");
            setTimeout(()=>{
                confettiWrapper.remove();
                confettiStyles.remove();
            }, endTime);
            setTimeout(()=>{
                elem.removeAttribute("data-confettioff");
            },endTime/2);
    },

    confettiInstances: 0,

    confettiHandler: (evt)=>{
        if(!evt.target.hasAttribute("data-confettioff")){
            confettiAnim.confettiAnim(evt.target);
        }
    },

};

confettiAnim.setup();
