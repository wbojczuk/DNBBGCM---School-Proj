/*
    Program: importeventdata.js
    Creator: William Bojczuk (wiliambojczuk@gmail.com)
    Github: https://github.com/wbojczuk
*/

// IMPORTS EVENT .JSON DATA AND STORES IN GLOBAL VARIABLE "EVENTDATA"
import data from "../eventdata.json" assert {type: 'json'};
 window.EVENTDATA = data;