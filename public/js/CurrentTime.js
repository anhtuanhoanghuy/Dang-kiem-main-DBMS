//create clock
const current_time = document.getElementById('currentTime');

    setInterval(function () {
        const currentDate = new Date();
        if (currentDate.getMinutes() < 10) {
            var currentMinutes = "0" + currentDate.getMinutes();
        }
        else currentMinutes = currentDate.getMinutes();
        if (currentDate.getHours() < 10) {
            var currentHours = "0" + currentDate.getHours();
        }
        else currentHours = currentDate.getHours();
        if ((currentDate.getDay()+1) == 8) {
            var currentDay = "Chủ Nhật";
        }
        else currentDay = "Thứ " + (currentDate.getDay() + 1);
        current_time.innerHTML = currentHours + ":" + currentMinutes + ":" + currentDate.getSeconds() + " | " + currentDay + " - " + currentDate.getDate() + "/" + (currentDate.getMonth()+1) + "/" + currentDate.getFullYear() ;
    }, 1000);