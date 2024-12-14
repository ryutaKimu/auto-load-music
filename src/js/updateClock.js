const clockElement = document.getElementById("currentTime");
let initialTime = clockElement.getAttribute("data-initial-time");
let newDateTime = new Date(initialTime);
let defaultTimezone = "Asia/Tokyo";

function updateClock() {
  newDateTime.setSeconds(newDateTime.getSeconds() + 1);

  const options = { timezone: defaultTimezone, hour12: false };
  const formattedTime = new Intl.DateTimeFormat("ja-JP", {
    ...options,
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
    hour: "2-digit",
    minute: "2-digit",
    second: "2-digit",
  }).format(newDateTime);
  clockElement.textContent = formattedTime;
}

setInterval(updateClock, 1000);

export function setTimezone(timezone, newTime) {
  defaultTimezone = timezone;
  initialTime = newTime;
  newDateTime = new Date(initialTime);
  newDateTime.setSeconds(newDateTime.getSeconds());
  updateClock();
}
