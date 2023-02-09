/*
    Program: importpastwinners.js
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
*/

// IMPORTS EVENT .JSON DATA AND STORES IN GLOBAL VARIABLE "EVENTDATA"
import data from "../../archived/winner.json" assert {type: 'json'};
 window.PASTWINNERS = data;