/*
    Program: archived.js
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
*/
let PASTLOCATIONS;
let PASTWINNERS;
const archivedObj = {
    init: ()=>{
        document.getElementsByTagName("body")[0].style.backgroundImage = "none";
        document.querySelector(".section-two").style.display = "inline-block";
        const wrapper = document.querySelector(".dropdown-info-wrapper");
        // IF VIEWING PAST LOCATIONS
        if(document.querySelector(".page-header").textContent == "Past Locations"){
            const locLength = PASTLOCATIONS.length - 1;
            for(let i = locLength; i >= 0; --i){
                wrapper.insertAdjacentHTML("beforeend", `
                <div class="dropdown-info-item">
                <div class="dropdown-info-title">
                    <div class="dropdown-info-img"></div>
                    <span>${PASTLOCATIONS[i].date}</span>
                </div>
                <div class="dropdown-info-content">
                    ${PASTLOCATIONS[i].loc}
                </div>
            </div>
                `);
            }
            // IF VIEWING PAST WINNERS
        }else if(document.querySelector(".page-header").textContent == "Top 10 Finalists"){

            const winnerLength = PASTWINNERS.length - 1;
            for(let i = winnerLength; i >= 0; --i){
                let winnerHTML = "<ol>";
                const currentWinner = PASTWINNERS[i].winners;
                let counter = 0;
                currentWinner.forEach((winner)=>{
                    let curWinner = (winner == "") ? "Not Yet Set" : winner;
                    winnerHTML += `<li data-count="${counter + 1}" class="li${counter}">${curWinner}</li>`;
                    ++counter;
                })

                winnerHTML += `</ol>`;
                wrapper.insertAdjacentHTML("beforeend", `
                <div class="dropdown-info-item">
                <div class="dropdown-info-title">
                    <div class="dropdown-info-img"></div>
                    <span>${PASTWINNERS[i].date}</span>
                </div>
                <div class="dropdown-info-content">
                    ${winnerHTML}
                </div>
            </div>
                `);
            }
        }
        dropdownInfoObj.init();
    }
};
// Get JSON DATA
if(document.querySelector(".page-header").textContent == "Past Locations"){
    fetch("./archived/location.json").then((res)=>res.json()).then((data)=>{PASTLOCATIONS = data; archivedObj.init();})
}else{
    fetch("./archived/winner.json").then((res)=>res.json()).then((data)=>{PASTWINNERS = data; archivedObj.init();})
}