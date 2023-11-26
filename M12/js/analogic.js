let hour = document.getElementById("hora");
let minute = document.getElementById("minut");
let seconds = document.getElementById("segons");

let set_clock = setInterval(() => {
    let date_now = new Date();

    let hr = date_now.getHours();
    let min = date_now.getMinutes();
    let seg = date_now.getSeconds();

    let calc_hr = hr * 30 + min / 2;
    let calc_min = min * 6 + seg / 10;
    let calc_seg = seg * 6;

    hour.style.transform = `rotate(${calc_hr}deg)`;
    minute.style.transform = `rotate(${calc_min}deg)`;
    seconds.style.transform = `rotate(${calc_seg}deg)`;
}, 1000);


