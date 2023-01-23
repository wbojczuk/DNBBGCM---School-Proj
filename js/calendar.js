

const calendarObj = {
    // ONLY ONE YEAR MAY BE PRESENT AT A TIME
    currentYear: new Date().getFullYear(),
    plannedEvents: [
        /*
        ****TEMPLATE****
        // Months are NOT case sensitive

        {
        month: "April",
        day: 19,
        events: [
            {
                startTime: "1:00pm",
                endTime: "2:00pm",
                eventDescription: "Pro Shop open, Rogers Convention Center"
            },
        ]
        },
        
        */
        

        ...EVENTDATA
    ],
    init: ()=>{
        // new Date(year-month-dayT00:00:00)
        // Get soonest Month
        // CONVERT MONTHS TO NUMBERS
        const monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                            ];
        const eventDaysLength = calendarObj.plannedEvents.length;
        const eventMonths = [];

        String.prototype.wordsToUpperCase = function(){
            return(this.replace(/[a-z]{1,}(?!\w)/gi, (match)=>{
            let tempStr = match.slice(1).toLowerCase();
            let tempUp = match.charAt(0).toUpperCase();
            return tempUp + tempStr;
            }));
            };

        for(let i = 0; i < eventDaysLength; ++i){
            calendarObj.plannedEvents[i].month = monthNames.indexOf(
                calendarObj.plannedEvents[i].month.wordsToUpperCase()
                );     
        }
        for(let i = 0; i < eventDaysLength; ++i){
            eventMonths.push(calendarObj.plannedEvents[i].month);
        }
        let curMonth = Math.min(...eventMonths);
        let curYear = calendarObj.currentYear;
        // Populate Calender
        if(calendarObj.plannedEvents.length !== 0){
            calendarObj.renderCalendar(curYear, curMonth);
        }else{
            const newDate = new Date();
             curMonth = newDate.getMonth();
             curYear = newDate.getFullYear();
            calendarObj.renderCalendar(curYear, curMonth);
        }
        

        document.getElementById("backMonthArrow").addEventListener("click", ()=>{
            const newDate = new Date(curYear, curMonth - 1);
            curMonth = newDate.getMonth();
            curYear = newDate.getFullYear();
            calendarObj.renderCalendar(curYear, curMonth);
        });
        document.getElementById("forwardMonthArrow").addEventListener("click", ()=>{
            const newDate = new Date(curYear, curMonth + 1);
            curMonth = newDate.getMonth();
            curYear = newDate.getFullYear();
            calendarObj.renderCalendar(curYear, curMonth);
        });
        document.getElementById('eventExpandedExit').addEventListener("click", calendarObj.expandEventsExit);
        
    },
    renderCalendar: (year, month)=>{
        // If This month is the current month
        let ourMonth = false;
        const actualDate = new Date();
        const actualDay = actualDate.getDate();
        if(actualDate.getMonth() == month){
            ourMonth = true;
        }

        const calendarHeader = document.getElementById("calendarHeader");
        const calenderContainer = document.getElementById("calendarContainer");
        const monthNames = ["January", "February", "March", "April", "May", "June",
                            "July", "August", "September", "October", "November", "December"
                            ];
        calendarHeader.textContent = `${monthNames[month]} ${year}`;
        calenderContainer.innerHTML = "";
        const daysInMonth = getDaysInMonth(year, month);
        const tempDay = document.createElement("div");
        const tempTitle = document.createElement("div");
        tempDay.className = "calendar-grid-item";
        tempTitle.className = "calendar-grid-item-title";
        const calendarFragment = document.createDocumentFragment();

        // Fill Fragment with needed blanks
        const firstOfMonth = new Date(`${monthNames[month]}/1/${year}`);
        for(let i = firstOfMonth.getDay(); i > 0; --i){
            calendarFragment.appendChild(tempDay.cloneNode(false));
        }

        // Get Month's Events
        const eventDaysLength = calendarObj.plannedEvents.length;
        const currentEvents = [];
        for(let i = 0; i < eventDaysLength; ++i){
            if(calendarObj.plannedEvents[i].month == month){
                currentEvents.push(calendarObj.plannedEvents[i]);
            }
        }

        for(let i = 0; i < daysInMonth; ++i){
            const curDay = tempDay.cloneNode(false);
            const curTitle = tempTitle.cloneNode(false);
            curTitle.textContent = (i + 1);
            curDay.appendChild(curTitle);
            
            if(ourMonth == true && (i + 1) == actualDay){
                curDay.classList.add("current-day");
            }

            currentEvents.forEach((curEvent)=>{
                if(curEvent.day == (i + 1)){
                    curDay.classList.add("has-event");
                    curDay.setAttribute("data-day", (i + 1));
                    curDay.setAttribute("data-month", month);
                    curDay.addEventListener("click", calendarObj.expandEvents);
                }
            });

            calendarFragment.appendChild(curDay);
        }
        calenderContainer.appendChild(calendarFragment);

        function getDaysInMonth(year, month){
            return(new Date(year, month + 1, 0).getDate());
        }
    },
    expandEvents: (evt)=>{
        let dayObj;
        const day = evt.target.dataset.day;
        const month = evt.target.dataset.month;
        const eventDaysLength = calendarObj.plannedEvents.length;
        for(let i = 0; i < eventDaysLength; ++i){
            if(calendarObj.plannedEvents[i].day == day && calendarObj.plannedEvents[i].month == month){
                
                dayObj = calendarObj.plannedEvents[i];
                break;
            }
        }
        const monthNames = ["January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
        ];
        const eventExpanded = document.getElementById('eventExpanded');
        const eventExpandedContent = document.getElementById('eventExpandedContent');
        eventExpandedContent.innerHTML = "";
        const eventExpandedFragment = document.createDocumentFragment();
        const tempEventItem = document.createElement("div");
        tempEventItem.className = "event-item";
        const tempEventTime = document.createElement("span");
        tempEventTime.className = "time";
        const tempEventDesc = document.createElement("span");
        tempEventDesc.className = "desc";
        const eventExpandedTitle = document.createElement("h2");
        eventExpandedTitle.textContent = `${monthNames[dayObj.month]} ${dayObj.day}`;
        eventExpandedFragment.appendChild(eventExpandedTitle);

        const eventsLength = dayObj.events.length;
        for(let i = 0; i < eventsLength; ++i){
            const curEventItem = tempEventItem.cloneNode(false);
            const curEventTime = tempEventTime.cloneNode(false);
            const curEventDesc = tempEventDesc.cloneNode(false);
            curEventTime.textContent = `${dayObj.events[i].startTime} - ${dayObj.events[i].endTime} : `;
            curEventDesc.textContent = dayObj.events[i].eventDescription;
            curEventItem.appendChild(curEventTime);
            curEventItem.appendChild(curEventDesc);
            eventExpandedFragment.appendChild(curEventItem);
        }
        eventExpandedContent.append(eventExpandedFragment);
        eventExpanded.style.display = "inline-block";
    },
    expandEventsExit: (evt)=>{
        document.getElementById('eventExpanded').style.display = "none";
    }
}
calendarObj.init();