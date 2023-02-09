const archivedObj = {
    init: ()=>{
        const additionalWinners = [
            /* ADD IN THE FORMAT
            
            {date: 0000, winners: ["1st place" , "2nd place"]},

            */

        ];
        const additionalLocations = [
            /* ADD IN THE FORMAT
            
            {date: 0000, loc: "Location"},

            */
        ];

        const wrapper = document.querySelector(".dropdown-info-wrapper");
        if(document.querySelector(".page-header").textContent == "Past Locations"){
            if(additionalLocations.length > 0){
                additionalLocations.forEach((loc)=>{
                    pastLocations.push(loc);
                })
            }
            const locLength = pastLocations.length - 1;
            for(let i = locLength; i >= 0; --i){
                wrapper.insertAdjacentHTML("beforeend", `
                <div class="dropdown-info-item">
                <div class="dropdown-info-title">
                    <div class="dropdown-info-img"></div>
                    <span>${pastLocations[i].date}</span>
                </div>
                <div class="dropdown-info-content">
                    ${pastLocations[i].loc}
                </div>
            </div>
                `);
            }
        }else if(document.querySelector(".page-header").textContent == "Top 10 Finalists"){
            if(additionalWinners.length > 0){
                additionalWinners.forEach((winner)=>{
                    pastWinners.push(winner);
                })
            }

            const winnerLength = pastWinners.length - 1;
            for(let i = winnerLength; i >= 0; --i){
                let winnerHTML = "<ol>";
                const currentWinner = pastWinners[i].winners;

                currentWinner.forEach((winner)=>{
                    winnerHTML += `<li>${winner}</li>`;
                })
                winnerHTML += `</ol>`;
                wrapper.insertAdjacentHTML("beforeend", `
                <div class="dropdown-info-item">
                <div class="dropdown-info-title">
                    <div class="dropdown-info-img"></div>
                    <span>${pastWinners[i].date}</span>
                </div>
                <div class="dropdown-info-content">
                    ${winnerHTML}
                </div>
            </div>
                `);
            }
        }
    }
};
archivedObj.init();